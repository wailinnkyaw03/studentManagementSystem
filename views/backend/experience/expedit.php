<div class="container-fluid mt-5">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
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

                <h1 class="h3 my-5 text-gray-800"><i class="fas fa-home-user me-2"></i>Edit Working Experience</h1>

                <form action="../../controllers/ExpController.php" method="POST">
                    <div class="form-floating my-3">
                        <div class="row">
                            <div class="col-sm-3 my-1">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="company" name="company" value="<?php echo $experience['company'] ?>">
                                    <label for="company">Company Name</label>
                                    <?php if(isset($_SESSION['company'])){ ?>
                                            <p class="text-danger">
                                                <?php echo $_SESSION['company']; ?>
                                            </p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-sm-3 my-1">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="position" name="position" value="<?php echo $experience['position'] ?>">
                                    <label for="position">Position</label>
                                    <?php if(isset($_SESSION['position'])){ ?>
                                            <p class="text-danger">
                                                <?php echo $_SESSION['position']; ?>
                                            </p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-sm-3 col-6 my-1">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="started_date" name="started_date" value="<?php echo $experience['started_date'] ?>">
                                    <label for="started_date">Started Date</label>
                                    <?php if(isset($_SESSION['started_date'])){ ?>
                                            <p class="text-danger">
                                                <?php echo $_SESSION['started_date']; ?>
                                            </p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-sm-3 col-6 my-1">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="ended_date" name="ended_date" value="<?php echo $experience['ended_date'] ?>">
                                    <label for="ended_date">Ended Date</label>
                                    <?php if(isset($_SESSION['ended_date'])){ ?>
                                            <p class="text-danger">
                                                <?php echo $_SESSION['ended_date']; ?>
                                            </p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-sm-12 my-1">
                                <div class="form-floating">
                                    <textarea name="jobDesc" id="jobDesc" cols="30" rows="10"><?php echo $experience['jobDesc'] ?></textarea>
                                    <?php if(isset($_SESSION['jobDesc'])){ ?>
                                            <p class="text-danger">
                                                <?php echo $_SESSION['jobDesc']; ?>
                                            </p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="exp_id" value="<?php echo $experience['e_id'] ?>">
                    <input type="hidden" name="user_id" value="<?php echo $experience['u_id'] ?>">
                    <div class="form-group text-end">
                        <button class="btn btn-outline-secondary my-3 me-2" type="submit"><i class="fas fa-plus me-2"></i>Edit Experience</button>
                        
                    </div>
                </form>

            </div>
        </div>

        <div class="col-lg-8 offset-lg-2">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Company</th>
                            <th>Position</th>
                            <th>Job Description</th>
                            <th>Started Date</th>
                            <th>Ended Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td><?php echo $experience['company'] ?></td>
                            <td><?php echo $experience['position'] ?></td>
                            <td><?php echo $experience['jobDesc'] ?></td>
                            <td><?php echo $experience['started_date'] ?></td>
                            <td><?php echo $experience['ended_date'] ?></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>