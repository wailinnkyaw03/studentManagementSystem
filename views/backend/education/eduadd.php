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

                <h1 class="h3 my-5 text-gray-800"><i class="fas fa-graduation-cap me-2"></i>Add Education Background</h1>

                <form action="../../controllers/EduController.php" method="POST">
                    <div class="form-floating my-3">
                        <div class="row">
                            <div class="col-sm-3 my-1">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="university" name="university" placeholder="university">
                                    <label for="university">School/University</label>
                                    <?php if(isset($_SESSION['university'])){ ?>
                                            <p class="text-danger">
                                                <?php echo $_SESSION['university']; ?>
                                            </p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-sm-3 my-1">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="subject">
                                    <label for="subject">Subject/Major</label>
                                    <?php if(isset($_SESSION['subject'])){ ?>
                                            <p class="text-danger">
                                                <?php echo $_SESSION['subject']; ?>
                                            </p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-sm-3 col-6 my-1">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="started_date" name="started_date">
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
                                    <input type="date" class="form-control" id="ended_date" name="ended_date">
                                    <label for="ended_date">Ended Date</label>
                                    <?php if(isset($_SESSION['ended_date'])){ ?>
                                            <p class="text-danger">
                                                <?php echo $_SESSION['ended_date']; ?>
                                            </p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <input type="hidden" name="user_id" value="<?php echo $user['u_id'] ?>">
                    <input type="hidden" name="action" value="add">
                    <div class="form-group text-end">
                        <button class="btn btn-outline-secondary my-3 me-2" type="submit"><i class="fas fa-plus me-2"></i>Add Education</button>
                        
                    </div>
                </form>

            </div>
        </div>

        <div class="col-lg-8 offset-lg-2">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>University</th>
                            <th>Major</th>
                            <th>Started Date</th>
                            <th>Ended Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($educations as $education){
                        ?>
                        <tr>
                            <td><?php echo $education['university'] ?></td>
                            <td><?php echo $education['subject'] ?></td>
                            <td><?php echo $education['started_date'] ?></td>
                            <td><?php echo $education['ended_date'] ?></td>
                            <td>
                                <a href="admin.php?page=eduedit&edu_id=<?php echo $education['id'] ?>&id=<?php echo $user['u_id'] ?>" class="btn btn-sm btn-success">Edit</a>
                                <!-- <a href="../../controllers/EduController.php?action=delete&id=" class="btn btn-sm btn-danger">Delete</a> -->
                                <button class="btn btn-sm btn-danger delete_id" data-id="<?php echo $education['id'] ?>" data-bs-toggle="modal" data-bs-target="#eduDelete">Delete</button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>

<!-- Modal -->
<div class="modal fade" id="eduDelete">
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
        <form action="../../controllers/EduController.php" method="GET">
            <input type="hidden" name="id" id="delete_id" value="">
            <button class="btn btn-success" type="submit"><i class="fas fa-check me-2"></i>Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>