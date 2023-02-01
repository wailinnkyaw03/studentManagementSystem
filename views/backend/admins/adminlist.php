<div class="container-fluid">
    <!-- Page Heading -->
    <div class="mb-4">
        

        <h1 class="h3 my-5 text-gray-800">Admin List</h1>

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
                        <td>
                            <a href="admin.php?page=adminedit&id=<?php echo $admin['id'] ?>" class="text-decoration-none text-success"><i class="fas fa-user-plus me-1"></i></a>
                            <a href="../../controllers/AdminController.php?action=delete&id=<?php echo $admin['id'] ?>" class="text-decoration-none text-danger"><i class="fas fa-user-minus"></i></a>
                        </td>
                        </tr>
                        <tr>
                <?php $no++; } ?>
                    
                </tbody>
            </table>
        </div>

    </div>
</div>