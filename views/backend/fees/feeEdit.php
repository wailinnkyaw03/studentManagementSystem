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

                <h1 class="h3 my-5 text-gray-800"><i class="fas fa-dollar me-2"></i> Edit Fee </h1>

                <form action="../../controllers/FeeController.php" method="post">
                    <div class="form-floating my-3">
                        <input type="number" class="form-control" id="feeamount" name="feeamount" placeholder="feeamount" value="<?= $fee['feeamount'] ?>">
                        <label for="feeamount">Fee Amount (MMK)</label>
                        <?php if(isset($_SESSION['feeamount'])){ ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['feeamount']; ?>
                                </p>
                        <?php } ?>
                    </div>
                    <input type="hidden" name="created_by" value="<?= $_SESSION['user_id'] ?>">
                    <input type="hidden" name="id" value="<?= $fee['id'] ?>">
                    <input type="hidden" name="action" value="update">
                    <div class="form-group text-end">
                        <button class="btn btn-outline-secondary my-3 me-2" type="submit"><i class="fas fa-dollar me-2"></i>Edit Fee</button>
                        <button class="btn btn-outline-secondary my-3" type="reset"><i class="fa-solid fa-arrows-rotate me-2"></i>Reset</button>
                    </div>
                    

                </form>

            </div>
        </div>
    </div>
    
</div>