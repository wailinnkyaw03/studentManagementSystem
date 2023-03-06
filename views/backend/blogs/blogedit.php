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

                <h1 class="h3 my-5 text-gray-800"><i class="fas fa-blog me-2"></i>Edit Blog</h1>

                <form action="../../controllers/BlogController.php" method="post" enctype="multipart/form-data">
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="title" name="title" placeholder="title" value="<?= $blog['title'] ?>">
                        <label for="title">Blog Title</label>
                        <?php if(isset($_SESSION['title'])){ ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['title']; ?>
                                </p>
                        <?php } ?>
                    </div>
                    <div class="form-floating my-3">
                        <input type="file" class="form-control" id="image" name="image" placeholder="image">
                        <label for="image">Blog Image</label>
                        <?php if(isset($_SESSION['image'])){ ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['image']; ?>
                                </p>
                        <?php } ?>
                    </div>
                    <div class="form-floating my-3">
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10"><?= $blog['description'] ?></textarea>
                        <?php if(isset($_SESSION['description'])){ ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['description']; ?>
                                </p>
                        <?php } ?>
                    </div>
                    
                    
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id" value="<?= $blog['id'] ?>">
                    <input type="hidden" name="updated_by" value="<?= $_SESSION['user_id'] ?>">
                    <div class="form-group text-end">
                        <button class="btn btn-outline-secondary my-3 me-2" type="submit"><i class="fas fa-pen-to-square me-2"></i>Edit Blog</button>
                        <button class="btn btn-outline-secondary my-3" type="reset"><i class="fa-solid fa-arrows-rotate me-2"></i>Reset</button>
                    </div>
                    

                </form>

            </div>
        </div>
    </div>
    
</div>