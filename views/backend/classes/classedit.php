<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="align-items-center mb-4">
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
                <h1 class="h3 my-5 text-gray-800">Edit Class Type</h1>

                <form action="../../controllers/ClassController.php" method="post">
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="type" name="type" value="<?php echo $class['type'] ?>">
                        <label for="type">Type Name</label>
                        <?php if(isset($_SESSION['type'])){ ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['type']; ?>
                                </p>
                        <?php } ?>
                    </div>
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id" value="<?php echo $class['id'] ?>">
                    <input type="text" name="created_by" value="<?php echo $_SESSION['user_id'] ?>">
                    <div class="form-group text-end">
                        <button class="btn btn-outline-secondary my-3 me-2" type="submit"><i class="fas fa-pen me-2"></i>Edit Class</button>
                        <button class="btn btn-outline-secondary my-3" type="reset"><i class="fa-solid fa-arrows-rotate me-2"></i>Reset</button>
                    </div>
                    

                </form>

            </div>
        </div>
    </div>
    
</div>