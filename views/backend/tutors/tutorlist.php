<div class="container-fluid">
    <!-- Page Heading -->
    <div class="mb-4">

        <h1 class="h3 mb-0 text-gray-800 my-5"><i class="fas fa-list me-2"></i>Tutor List</h1>
        <?php if(isset($_SESSION['expire'])){
            $diff = time() - $_SESSION['expire'];
            if($diff > 2){
                unset($_SESSION['status']);
                unset($_SESSION['expire']);
            }
            }
        ?>
        <?php if(isset($_SESSION['status'])){ ?>   
            <div class="alert alert-success alert-dismissible fade show py-3" role="alert">

            <?php echo $_SESSION['status'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php }?>
        <div class="table-responsive mt-3">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Role</th>
                        <th>Joining Date</th>
                        <th>Salary</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($tutors as $tutor){
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $tutor['name'] ?></td>
                        <td><?= $tutor['email'] ?></td>
                        <td><?= $tutor['phone'] ?></td>
                        <td><?= $tutor['address'] ?></td>
                        <td>
                            <?php if($tutor['user_status']=="approved"){ ?>
                                <span class="badge badge-success">Active</span>
                                <span class="btn">
                                    <form action="../../controllers/TutorController.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $tutor['id'] ?>">
                                        <input type="hidden" name="user_status" value="pending">
                                        <input type="hidden" name="action" value="permission">
                                        <button type="submit" class="btn btn-sm btn-danger">User Ban</button>
                                    </form>
                                </span>
                                
                            <?php }else{ ?>
                                <span class="badge badge-warning">Pending . . .</span>
                                <span class="btn">
                                    <form action="../../controllers/TutorController.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $tutor['id'] ?>">
                                        <input type="hidden" name="user_status" value="approved">
                                        <input type="hidden" name="action" value="permission">
                                        <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                    </form>
                                </span>
                                
                            <?php } ?>
                        </td>
                        <td><?= $tutor['roleName'] ?></td>
                        <td><?= $tutor['joiningDate'] ?></td>
                        <td><?= $tutor['salary'] ?></td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="admin.php?page=tutordetail&id=<?= $tutor['u_id'] ?>">Detail</a>
                            <a class="btn btn-sm btn-success" href="admin.php?page=tutoredit&id=<?= $tutor['u_id'] ?>">Edit</a>
                            <button class="btn btn-sm btn-danger delete_id" data-id="<?= $tutor['u_id'] ?>" data-bs-toggle="modal" data-bs-target="#tutorDelete">Delete</button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tutorDelete">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center">
        <i class="fas fa-warning text-danger fa-2x mb-3"></i>
        <h1 class="modal-title fs-5" id="deleteModalLabel">Are you sure "Delete"?</h1>
      </div>
      <div class="modal-footer m-auto">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fas fa-xmark me-2"></i>Cancle</button>
        <form action="../../controllers/TutorController.php" method="GET">
            <input type="hidden" name="id" id="delete_id" value="">
            <button class="btn btn-success" type="submit"><i class="fas fa-check me-2"></i>Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>