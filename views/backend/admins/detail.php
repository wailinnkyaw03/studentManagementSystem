<div class="container my-5">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card shadow rounded">
                <div class="m-auto pt-5">
                    <img class="rounded-circle" width="150px" src="../../assets/profileImages/<?php echo $admin['image'] ?>" alt="">
                </div>
                <div class="card-body mt-3 mx-3">
                    <p>Name : <?php echo $admin['name'] ?></p>
                    <p>Email : <?php echo $admin['email'] ?></p>
                    <p>Phone : <?php echo $admin['phone'] ?></p>
                    <p>Address : <?php echo $admin['address'] ?></p>
                    <p>Role : <?php echo $admin['roleName'] ?></p>
                </div>
                <div class="text-center mb-5">
                    <a href="admin.php?page=adminedit&id=<?php echo $admin['id'] ?>" class="text-de"><i class="fas fa-user-pen text-success"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>