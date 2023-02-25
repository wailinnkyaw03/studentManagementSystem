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
                <h1 class="h3 my-5 text-gray-800"><i class="fas fa-chalkboard-user me-3"></i>Create Tutor Account</h1>

                <form action="../../controllers/TutorController.php" method="post" enctype="multipart/form-data">
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="name">
                        <label for="name">Tutor Name</label>
                        <?php if(isset($_SESSION['name'])){ ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['name']; ?>
                                </p>
                        <?php } ?>
                    </div>
                    <div class="input-group">
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        <label class="input-group-text" for="image">Profile Picture</label>
                        
                    </div>
                    <?php if(isset($_SESSION['image'])){ ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['image']; ?>
                                </p>
                    <?php } ?>
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
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="phone">
                        <label for="phone">Phone Number</label>
                        <?php if(isset($_SESSION['phone'])){ ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['phone']; ?>
                                </p>
                        <?php } ?>
                    </div>
                    
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="skills" name="skills" placeholder="skills">
                        <label for="skills">Skills</label>
                        <?php if(isset($_SESSION['skills'])){ ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['skills']; ?>
                                </p>
                        <?php } ?>
                    </div>
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="hobbies" name="hobbies" placeholder="hobbies">
                        <label for="hobbies">Hobbies</label>
                        <?php if(isset($_SESSION['hobbies'])){ ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['hobbies']; ?>
                                </p>
                        <?php } ?>
                    </div>
                    
                    <div class="form-floating my-3">
                        <input type="date" class="form-control" id="joiningDate" name="joiningDate" placeholder="joiningDate">
                        <label for="joiningDate">Joining Date</label>
                        <?php if(isset($_SESSION['joiningDate'])){ ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['joiningDate']; ?>
                                </p>
                        <?php } ?>
                    </div>
                    <div class="form-floating my-3">
                        <input type="int" class="form-control" id="salary" name="salary" placeholder="salary">
                        <label for="salary">Salary</label>
                        <?php if(isset($_SESSION['salary'])){ ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['salary']; ?>
                                </p>
                        <?php } ?>
                    </div>
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="address" name="address" placeholder="address">
                        <label for="address">Address</label>
                        <?php if(isset($_SESSION['address'])){ ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['address']; ?>
                                </p>
                        <?php } ?>
                    </div>
                    <input type="hidden" name="action" value="add">
                    <div class="form-group text-end">
                        <button class="btn btn-outline-secondary my-3 me-2" type="submit"><i class="fas fa-user-plus me-2"></i>Add Tutor</button>
                        <button class="btn btn-outline-secondary my-3" type="reset"><i class="fa-solid fa-arrows-rotate me-2"></i>Reset</button>
                    </div>
                    

                </form>

            </div>
        </div>
    </div>
    
</div>