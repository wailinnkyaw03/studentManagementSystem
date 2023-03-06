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
                <h1 class="h3 my-5 text-gray-800"><i class="fas fa-graduation-cap me-2"></i>Create Student Account</h1>

                <form action="../../controllers/StudentController.php" method="post" enctype="multipart/form-data">
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="name">
                        <label for="name">Student Name</label>
                        <?php if(isset($_SESSION['name'])){ ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['name']; ?>
                                </p>
                        <?php } ?>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        <label class="input-group-text" for="image">Profile Picture</label>

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
                        <input type="date" class="form-control" id="dob" name="dob" placeholder="dob">
                        <label for="dob">Date of Birth</label>
                        <?php if(isset($_SESSION['dob'])){ ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['dob']; ?>
                                </p>
                        <?php } ?>
                    </div>
                    <div class="my-3">
                        <label for="">Gender</label><br>
                        <label for="male">Male</label>
                        <input type="radio" id="male" name="gender" value="Male">
                        <label for="female" class="ms-5">Female</label>
                        <input type="radio" id="female" name="gender" value="Female">
                        <?php if(isset($_SESSION['gender'])){ ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['gender']; ?>
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
                    <!-- <div class="form-floating my-3">
                        <input type="text" class="form-control" id="education" name="education" placeholder="education">
                        <label for="education">Education Background</label>
                    </div> -->
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="address" name="address" placeholder="address">
                        <label for="address">Address</label>
                        <?php if(isset($_SESSION['address'])){ ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['address']; ?>
                                </p>
                        <?php } ?>
                    </div>
                    <div class="form-floating my-3">
                        <select class="form-select" id="class_id" name="class_id">
                            <option selected>Select Class Type</option>
                            <?php foreach($classes as $class){ ?>
                                <option value="<?php echo $class['id'] ?>"><?php echo $class['type'] ?></option>
                            <?php } ?>
                        </select>
                        <label for="course">Select Your Class Type</label>
                        <?php if(isset($_SESSION['class_id'])){ ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['class_id']; ?>
                                </p>
                        <?php } ?>
                    </div>
                    <div class="form-floating my-3">
                        <select class="form-select" id="course_id" name="course_id">
                            <option selected>Select Courses</option>
                            <?php foreach($courses as $course){ ?>
                                <option value="<?php echo $course['id'] ?>"><?php echo $course['title'] ?></option>
                            <?php } ?>
                        </select>
                        <label for="course">Select Courses</label>
                        <?php if(isset($_SESSION['course_id'])){ ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['course_id']; ?>
                                </p>
                        <?php } ?>
                    </div>
                    <input type="hidden" name="action" value="add">
                    <div class="form-group text-end">
                        <button class="btn btn-outline-secondary my-3 me-2" type="submit"><i class="fas fa-user-plus me-2"></i>Add Student</button>
                        <button class="btn btn-outline-secondary my-3" type="reset"><i class="fa-solid fa-arrows-rotate me-2"></i>Reset</button>
                    </div>
                    

                </form>

            </div>
        </div>
    </div>
    
</div>