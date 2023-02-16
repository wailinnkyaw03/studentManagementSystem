<div class="container-fluid">
    <!-- Page Heading -->
    <div class="mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-list me-2 my-5"></i>Class Types</h1>
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
                        <th>Type Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach($classes as $class){ ?>

                            <tr>
                            <th scope="row"><?php echo $no; ?></th>
                            <td><?php echo $class['className'] ?></td>
                            <td>
                                <a href="admin.php?page=classedit&id=<?php echo $class['class_id'] ?>" class="text-decoration-none text-success"><i class="fas fa-pen-to-square me-1"></i></a>
                                <a href="../../controllers/ClassController.php?action=delete&id=<?php echo $class['class_id'] ?>" class="text-decoration-none text-danger"><i class="fas fa-trash"></i></a>
                            </td>
                            </tr>
                            <tr>
                    <?php $no++; } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>