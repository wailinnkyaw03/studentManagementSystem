<div class="container-fluid">
    <!-- Page Heading -->
    <div class="mb-4">
        <h1 class="h3 mb-0 text-gray-800">Student List</h1>
        
        <div class="table-responsive mt-3">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Profile</th>
                        <th>Email</th>
                        <th>Birth-Date</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>ClassTypes</th>
                        <th>Course</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Wai Linn Kyaw</td>
                        <td><img src="../../assets/img/logo.png" width="30px" alt=""></td>
                        <td>wailinnkyaw03@gmail.com</td>
                        <td>1997-08-29</td>
                        <td>Male</td>
                        <td>09421023714</td>
                        <td>28, KayThuMarLar West 2nd Street, 4th Ward, South Okkalarpa Tsp, Yangon.</td>
                        <td>Zoom Class</td>
                        <td>PHP(Backend Course)</td>
                        <td>
                            <a href="admin.php?page=studentedit" class="text-decoration-none text-success"><i class="fas fa-user-plus me-1"></i></a>
                            <a href="../../controllers/StudentController.php?action=delete" class="text-decoration-none text-danger"><i class="fas fa-user-minus"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>