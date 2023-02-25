<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="align-items-center mb-4">
                <h1 class="h3 my-5 text-gray-800"><i class="fas fa-graduation-cap me-2"></i>Create Student Account</h1>

                <form action="../../controllers/StudentController.php" method="post">
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="name">
                        <label for="name">Student Name</label>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        <label class="input-group-text" for="image">Profile Picture</label>
                    </div>
                    <div class="form-floating my-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="email">
                        <label for="email">Email Address</label>
                    </div>
                    <div class="form-floating my-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="password">
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating my-3">
                        <input type="date" class="form-control" id="dob" name="dob" placeholder="dob">
                        <label for="dob">Date of Birth</label>
                    </div>
                    <div class="my-3">
                        <label for="">Gender</label><br>
                        <label for="male">Male</label>
                        <input type="radio" id="male" name="gender" value="Male">
                        <label for="female" class="ms-5">Female</label>
                        <input type="radio" id="female" name="gender" value="Female">
                    </div>
                    <div class="form-floating my-3">
                        <input type="number" class="form-control" id="phone" name="phone" placeholder="phone">
                        <label for="phone">Phone Number</label>
                    </div>
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="education" name="education" placeholder="education">
                        <label for="education">Education Background</label>
                    </div>
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="address" name="address" placeholder="address">
                        <label for="address">Address</label>
                    </div>
                    <div class="form-floating my-3">
                        <select class="form-select" id="classType" name="classType">
                            <option selected>Select Class Type</option>
                            <?php foreach($classes as $class){ ?>
                                <option value="<?php echo $class['id'] ?>"><?php echo $class['type'] ?></option>
                            <?php } ?>
                        </select>
                        <label for="course">Select Your Class Type</label>
                    </div>
                    <div class="form-floating my-3">
                        <select class="form-select" id="course" name="course">
                            <option selected>Select Courses</option>
                            <?php foreach($courses as $course){ ?>
                                <option value="<?php echo $course['course_id'] ?>"><?php echo $course['title'] ?></option>
                            <?php } ?>
                        </select>
                        <label for="course">Select Courses</label>
                    </div>
                    <div class="form-group text-end">
                        <button class="btn btn-outline-secondary my-3 me-2" type="submit"><i class="fas fa-user-plus me-2"></i>Add Student</button>
                        <button class="btn btn-outline-secondary my-3" type="reset"><i class="fa-solid fa-arrows-rotate me-2"></i>Reset</button>
                    </div>
                    

                </form>

            </div>
        </div>
    </div>
    
</div>