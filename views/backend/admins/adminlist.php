
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
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
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
                        <td><?php echo $admin['phone'] ?></td>
                        <td><?php echo $admin['roleName'] ?></td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="admin.php?page=detail&id=<?php echo $admin['u_id'] ?>">Detail</a>
                            <a href="admin.php?page=adminedit&id=<?php echo $admin['u_id'] ?>" class="btn btn-sm btn-success">Edit</a>
                            <!-- <a href="../../controllers/AdminController.php?action=delete&id=" class="btn btn-sm btn-danger">Delete</a> -->
                            <button class="btn btn-sm btn-danger delete_id" data-id="<?php echo $admin['u_id'] ?>" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
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