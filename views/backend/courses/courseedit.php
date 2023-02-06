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

                <h1 class="h3 my-5 text-gray-800"><i class="fas fa-plus-circle me-2"></i>Edit Course</h1>

                <form action="../../controllers/CourseController.php" method="post">
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $course['title'] ?>">
                        <label for="title">Course Title</label>
                        <?php if(isset($_SESSION['title'])){ ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['title']; ?>
                                </p>
                        <?php } ?>
                    </div>
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="outline" name="outline" value="<?php echo $course['outline'] ?>">
                        <label for="outline">Course Outlines</label>
                        <?php if(isset($_SESSION['outline'])){ ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['outline']; ?>
                                </p>
                        <?php } ?>
                    </div>
                    <div class="form-floating my-3">
                        <input type="number" class="form-control" id="duration" name="duration" value="<?php echo $course['duration'] ?>">
                        <label for="duration">Duration</label>
                        <?php if(isset($_SESSION['duration'])){ ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['duration']; ?>
                                </p>
                        <?php } ?>
                    </div>
                    <div class="form-floating my-3">
                        <select class="form-select" id="class_id" name="class_id">
                            <option selected value="">Select Class Type</option>
                            <?php foreach($classes as $class){ ?>
                                <option value="<?php echo $class['id'] ?>"><?php echo $class['name'] ?></option>
                            <?php } ?>
                        </select>
                        <label for="course">Select Your Class Type</label>
                        <?php if(isset($_SESSION['class_id'])){ ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['class_id']; ?>
                                </p>
                        <?php } ?>
                    </div>
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id" value="<?php echo $course['id'] ?>">
                    <div class="form-group text-end">
                        <button class="btn btn-outline-secondary my-3 me-2" type="submit"><i class="fas fa-pen-to-square me-2"></i>Edit Course</button>
                        <button class="btn btn-outline-secondary my-3" type="reset"><i class="fa-solid fa-arrows-rotate me-2"></i>Reset</button>
                    </div>
                    

                </form>

            </div>
        </div>
    </div>
    
</div>