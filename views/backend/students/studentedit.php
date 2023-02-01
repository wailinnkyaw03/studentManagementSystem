<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="align-items-center mb-4">
                <h1 class="h3 my-5 text-gray-800">Edit Student Account</h1>

                <form action="../../controllers/StudentController.php" method="post">
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="name" name="name" value="Wai Linn Kyaw">
                        <label for="name">Student Name</label>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        <label class="input-group-text" for="image">Profile Picture</label>
                    </div>
                    <div class="form-floating my-3">
                        <input type="email" class="form-control" id="email" name="email" value="wailinnkyaw03@gmail.com">
                        <label for="email">Email Address</label>
                    </div>
                    <div class="form-floating my-3">
                        <input type="password" class="form-control" id="password" name="password" value="123456">
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating my-3">
                        <input type="date" class="form-control" id="dob" name="dob" value="1997-08-29">
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
                        <input type="number" class="form-control" id="phone" name="phone" value="09421023714">
                        <label for="phone">Phone Number</label>
                    </div>
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="address" name="address" value="28, KayThuMarLar West 2nd Street, 4th Ward, South Okkalarpa Tsp, Yangon.">
                        <label for="address">Address</label>
                    </div>
                    <div class="form-floating my-3">
                        <select class="form-select" id="classType" name="classType">
                            <option selected>Select Class Type</option>
                            <option value="Zoom Class">Zoom Class</option>
                            <option value="Video Class">Video Class</option>
                        </select>
                        <label for="course">Select Your Class Type</label>
                    </div>
                    <div class="form-floating my-3">
                        <select class="form-select" id="course" name="course">
                            <option selected>Select Courses</option>
                            <option value="ReactJS(Frontend Course)">ReactJS(Frontend Course)</option>
                            <option value="Bootstrap(Frontend Course)">Bootstrap(Frontend Course)</option>
                            <option value="VueJS(Frontend Course)">VueJS(Frontend Course)</option>
                            <option value="PHP(Backend Course)">PHP(Backend Course)</option>
                            <option value="Java(Backend Course)">Java(Backend Course)</option>
                            <option value="NodeJS(Backend Course)">NodeJS(Backend Course)</option>
                        </select>
                        <label for="course">Select Courses</label>
                    </div>
                    <div class="form-group text-end">
                        <button class="btn btn-outline-secondary my-3 me-2" type="submit"><i class="fas fa-user-plus me-2"></i>Edit Student</button>
                        <button class="btn btn-outline-secondary my-3" type="reset"><i class="fa-solid fa-arrows-rotate me-2"></i>Reset</button>
                    </div>
                    

                </form>

            </div>
        </div>
    </div>
    
</div>