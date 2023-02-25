<div class="container-fluid mt-5" style="margin-bottom:220px">
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

                <h1 class="h3 my-5 text-gray-800"><i class="fas fa-home-user me-2"></i>Create Admin Account</h1>

                <form action="../../controllers/AdminController.php" method="POST">
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="name">
                        <label for="name">Username</label>

                        <?php if(isset($_SESSION['name'])){ ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['name']; ?>
                                </p>
                        <?php } ?>

                    </div>
                    <div class="form-floating my-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="email">
                        <label for="email">Email Address</label>

                        <?php if(isset($_SESSION['email'])){ ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['email']; ?>
                                </p>
                        <?php } ?>

                    </div>
                    <div class="form-floating my-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="password">
                        <label for="password">Password</label>

                        <?php if(isset($_SESSION['password'])){ ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['password']; ?>
                                </p>
                        <?php } ?>

                    </div>
                    <div class="form-floating my-3">
                        <input type="number" class="form-control" id="phone" name="phone" placeholder="phone">
                        <label for="phone">Phone Number</label>

                        <?php if(isset($_SESSION['phone'])){ ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['phone']; ?>
                                </p>
                        <?php } ?>

                    </div>

                    <input type="hidden" name="action" value="add">
                    <div class="form-group text-end">
                        <button class="btn btn-outline-secondary my-3 me-2" type="submit"><i class="fas fa-user-plus me-2"></i>Add Admin</button>
                        <button class="btn btn-outline-secondary my-3" type="reset"><i class="fa-solid fa-arrows-rotate me-2"></i>Reset</button>
                    </div>
                    

                </form>

            </div>
        </div>
    </div>
    
</div>