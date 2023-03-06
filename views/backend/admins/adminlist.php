<div class="container-fluid">
    <!-- Page Heading -->
    <div class="mb-4">
        

        <h1 class="h3 my-5 text-gray-800 my-5"><i class="fas fa-list me-2"></i>Admin List</h1>

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
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 1;
                    foreach($admins as $admin){ ?>

                        <tr>
                        <th scope="row"><?php echo $no; ?></th>
                        <td><?php echo $admin['name'] ?></td>
                        <td><?php echo $admin['email'] ?></td>
                        <td>
                            <?php if($admin['user_status']=="approved"){ ?>
                                <span class="badge badge-success">Active</span>
                                <?php if($_SESSION['value']==1){ ?>
                                    <span class="btn">
                                        <form action="../../controllers/AdminController.php" method="POST">
                                            <input type="hidden" name="id" value="<?= $admin['id'] ?>">
                                            <input type="hidden" name="user_status" value="pending">
                                            <input type="hidden" name="action" value="permission">
                                            <button type="submit" class="btn btn-sm btn-danger">User Ban</button>
                                        </form>
                                    </span>
                                <?php } ?>
                            <?php }else{ ?>
                                <span class="badge badge-warning">Pending . . .</span>
                                <?php if($_SESSION['value']==1){ ?>
                                <span class="btn">
                                    <form action="../../controllers/AdminController.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $admin['id'] ?>">
                                        <input type="hidden" name="user_status" value="approved">
                                        <input type="hidden" name="action" value="permission">
                                        <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                    </form>
                                </span>
                                <?php } ?>
                            <?php } ?>
                        </td>
                        <td><?php echo $admin['phone'] ?></td>
                        <td><?php echo $admin['roleName'] ?></td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="admin.php?page=detail&id=<?php echo $admin['u_id'] ?>">Detail</a>
                            <?php if($_SESSION['value']==1){ ?>
                                <a href="admin.php?page=adminedit&id=<?php echo $admin['u_id'] ?>" class="btn btn-sm btn-success">Edit</a>
                                <button class="btn btn-sm btn-danger delete_id" data-id="<?php echo $admin['u_id'] ?>" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                            <?php } ?>
                        </td>
                        </tr>
                        <tr>
                <?php $no++; } ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>






<!-- Modal -->
<div class="modal fade" id="deleteModal">
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
        <form action="../../controllers/AdminController.php" method="GET">
            <input type="hidden" name="id" id="delete_id" value="">
            <button class="btn btn-success" type="submit"><i class="fas fa-check me-2"></i>Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>