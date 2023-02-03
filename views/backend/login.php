<?php 
session_start();


include "header.php";

if(isset($_SESSION['auth'])){
    header("location: admin.php");
}

?>
<div class="container" style="margin-top:100px;">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-4 offset-lg-4">
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

                <img src="../../assets/img/k-logo.png" alt="" class="d-block m-auto" width="150px">
                <h1 class="h4 mb-5 text-gray-800 text-center"><i class="fa-solid fa-house-lock me-2"></i> Admin Login</h1>

                <form action="../../controllers/AdminLoginController.php" method="POST">
                    
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
                    

                    <input type="hidden" name="id" value="<?php $login['id'] ?>">
                    <div class="form-group text-end">
                        <button class="btn logo-border logo-color btn-block my-5 me-2" type="submit"><i class="fas fa-user me-2"></i>Login</button>
                        <!-- <button class="btn btn-outline-secondary my-3" type="reset"><i class="fa-solid fa-arrows-rotate me-2"></i>Reset</button> -->
                    </div>
                    

                </form>

            </div>
        </div>
    </div>
    
</div>

<?php 
include "footer.php";
?>