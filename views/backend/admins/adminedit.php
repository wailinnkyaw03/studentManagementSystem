<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <div class="align-items-center mt-4">
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

                <h1 class="h3 mt-5 mb-3 text-gray-800">Update Admin Profile</h1>

                <form enctype="multipart/form-data" action="../../controllers/AdminController.php" method="post">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $admin['name'] ?>">
                                <label for="name">Username</label>
                                <?php if(isset($_SESSION['name'])){ ?>
                                    <p class="text-danger">
                                        <?php echo $_SESSION['name']; ?>
                                    </p>
                                <?php } ?>
                            </div>
                            <div class="form-floating my-3">
                                <input type="file" class="form-control" id="image" name="image">
                                <label for="image">Profile Image</label>
                                
                            </div>
                            <div class="form-floating my-3">
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $admin['email'] ?>">
                                <label for="email">Email Address</label>
                                <?php if(isset($_SESSION['email'])){ ?>
                                        <p class="text-danger">
                                            <?php echo $_SESSION['email']; ?>
                                        </p>
                                <?php } ?>
                            </div>
                            <div class="form-floating my-3">
                                <input type="password" class="form-control" id="password" name="password" value="<?php echo $admin['password'] ?>">
                                <label for="password">Password</label>
                                <?php if(isset($_SESSION['password'])){ ?>
                                        <p class="text-danger">
                                            <?php echo $_SESSION['password']; ?>
                                        </p>
                                <?php } ?>
                            </div>
                            <div class="form-floating my-3">
                                <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $admin['phone'] ?>">
                                <label for="phone">Phone Number</label>
                                <?php if(isset($_SESSION['phone'])){ ?>
                                        <p class="text-danger">
                                            <?php echo $_SESSION['phone']; ?>
                                        </p>
                                <?php } ?>
                            </div>
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" id="address" name="address" value="<?php echo $admin['address'] ?>">
                                <label for="address">Address</label>
                                <?php if(isset($_SESSION['address'])){ ?>
                                        <p class="text-danger">
                                            <?php echo $_SESSION['address']; ?>
                                        </p>
                                <?php } ?>
                            </div>
                            <div class="my-3">
                                <div>
                                    <label class="form-label" for="">Gender</label>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <input type="radio" name="gender" id="male" value="Male" <?php if($admin['gender']=="Male"){ echo "checked"; } ?>>
                                        <label for="male" class="form-label">Male</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="radio" name="gender" id="female" value="Female" <?php if($admin['gender']=="Female"){ echo "checked"; } ?>>
                                        <label for="female" class="form-label">Female</label>
                                    </div>
                                </div>
                                <?php if(isset($_SESSION['gender'])){ ?>
                                        <p class="text-danger">
                                            <?php echo $_SESSION['gender']; ?>
                                        </p>
                                <?php } ?>
                            </div>
                            <div class="form-floating my-3">
                                <input type="date" class="form-control" id="dob" name="dob" placeholder="dob" value="<?php echo $admin['dob'] ?>">
                                <label for="dob">Date Of Birth</label>
                                <?php if(isset($_SESSION['dob'])){ ?>
                                        <p class="text-danger">
                                            <?php echo $_SESSION['dob']; ?>
                                        </p>
                                <?php } ?>
                            </div>
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" id="skills" name="skills" placeholder="HTML, CSS, JavaScript, Bootstrap" value="<?php echo $admin['skills'] ?>">
                                <label for="skills">Skills (eg. HTML, CSS, JavaScript, Bootstrap, or Some Skills ...)</label>
                                <?php if(isset($_SESSION['skills'])){ ?>
                                        <p class="text-danger">
                                            <?php echo $_SESSION['skills']; ?>
                                        </p>
                                <?php } ?>
                            </div>
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" id="hobbies" name="hobbies" placeholder="HTML, CSS, JavaScript, Bootstrap" value="<?php echo $admin['hobbies'] ?>">
                                <label for="hobbies">Hobbies (eg. Swimming, Football, ...)</label>
                                <?php if(isset($_SESSION['hobbies'])){ ?>
                                        <p class="text-danger">
                                            <?php echo $_SESSION['hobbies']; ?>
                                        </p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="my-3">
                                <div class="label">
                                    <label for="" class="form-label">Education Background</label>
                                    <a href="admin.php?page=eduadd&id=<?php echo $admin['id'] ?>" class="btn btn-sm btn-secondary float-end">Edit</a>
                                </div>
                                <div class="table-responsive mt-3">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>University</th>
                                                <th>Major</th>
                                                <th>Started Date</th>
                                                <th>Ended Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($educations as $education) { ?>
                                                <tr>
                                                    <td><?php echo $education['university'] ?></td>
                                                    <td><?php echo $education['subject'] ?></td>
                                                    <td><?php echo $education['started_date'] ?></td>
                                                    <td><?php echo $education['ended_date'] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                            </div>

                            <div class="my-3">
                                <div class="label">
                                    <label for="" class="form-label">Working Experience</label>
                                    <a href="admin.php?page=expadd&id=<?php echo $admin['id'] ?>" class="btn btn-sm btn-secondary float-end">Edit</a>
                                </div>
                                <div class="table-responsive mt-3">
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
                                            <?php foreach($experiences as $experience) { ?>
                                                <tr>
                                                    <td><?php echo $experience['company'] ?></td>
                                                    <td><?php echo $experience['position'] ?></td>
                                                    <td><?php echo $experience['jobDesc'] ?></td>
                                                    <td><?php echo $experience['started_date'] ?></td>
                                                    <td><?php echo $experience['ended_date'] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
    
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id" value="<?php echo $admin['u_id'] ?>">
                    <div class="form-group text-center">
                        <button class="btn btn-outline-secondary my-3 me-2" type="submit"><i class="fas fa-user-pen me-2"></i>Edit Admin</button>
                        <!-- <button class="btn btn-outline-secondary my-3" type="reset"><i class="fa-solid fa-arrows-rotate me-2"></i>Reset</button> -->
                        <a class="btn btn-outline-secondary my-3" href="admin.php?page=adminlist">Back To List</a>
                    </div>
                    

                </form>

            </div>
        </div>
    </div>
    
</div>