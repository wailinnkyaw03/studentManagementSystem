<div class="container my-5">
    <div class="row">
        <div class="col-12">
                <div class="m-auto pt-5 pb-5">
                    <img class="rounded-circle" width="150px" src="../../assets/profileImages/<?php echo $admin['image'] ?>" alt="">
                </div>
                <div class="row">
                        <div class="col-lg-4">
                            <h4 class="my-3">Personal Information:</h4>
                            <p>Name : <?php echo $admin['name'] ?></p>
                            <p>Email : <?php echo $admin['email'] ?></p>
                            <p>Phone : <?php echo $admin['phone'] ?></p>
                            <p>Address : <?php echo $admin['address'] ?></p>
                            <p>Role : <?php echo $admin['roleName'] ?></p>
                            <p>Date Of Birth : <?php echo $admin['dob'] ?></p>
                            <p>Gender : <?php echo $admin['gender'] ?></p>
                            <p>Skills : <?php echo $admin['skills'] ?></p>
                            <p>Hobbies : <?php echo $admin['hobby'] ?></p>
                            
                        </div>
                        <div class="col-lg-8">
                            <h4 class="my-3">Education: </h4>
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
                                    <?php foreach($educations as $education){ ?>
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
                </div>
                <div class="text-center mb-5">
                    <a href="admin.php?page=adminedit&id=<?php echo $admin['id'] ?>" class="text-de"><i class="fas fa-user-pen text-success"></i></a>
                </div>
        </div>
    </div>
</div>