<div class="container-fluid m-0 p-0">
        <div class="">
            <div class="row">
                <div class="col-12">
                        <div class="m-auto px-5 pt-5 pb-5 text-white shadow" style="background: rgb(232,162,247);
background: linear-gradient(0deg, rgba(232,162,247,1) 0%, rgba(0,146,255,1) 100%);">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img class="rounded-circle" width="150px" height="150px" src="../../assets/profileImages/<?php echo $admin['image'] ?>" alt="">
                                </div>
                                <div class="col-lg-4">
                                    <h3><?php echo $admin['name'] ?></h3>
                                    <div class="badge badge-success"><?php echo $admin['roleName'] ?></div>
                                    <div class="mt-3"><i class="fas fa-location-dot me-1"></i> <?php echo $admin['address'] ?></div>
                                    <a href="admin.php?page=adminedit&id=<?php echo $admin['u_id'] ?>" class="badge badge-primary mt-3 shadow">Edit Profile</a>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row px-5 mt-3">
                                <div class="col-lg-4 text-dark">
                                    <h3 class="my-3 ms-2">Personal Information</h3>
                                    
                                    <table class="table table-borderless text-dark">
                                        <tr>
                                            <td>Name:</td>
                                            <td><?php echo $admin['name'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td><?php echo $admin['email'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Phone:</td>
                                            <td><?php echo $admin['phone'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Address:</td>
                                            <td><?php echo $admin['address'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Role:</td>
                                            <td><?php echo $admin['roleName'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Birthday:</td>
                                            <td>
                                            <?php
                                                $dobstr = strtotime($admin['dob']);
                                                echo date('F d, Y', $dobstr);
                                            ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Gender:</td>
                                            <td><?php echo $admin['gender'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Skills:</td>
                                            <td><?php echo $admin['skills'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Hobbies:</td>
                                            <td><?php echo $admin['hobbies'] ?></td>
                                        </tr>
                                    </table>
                                    
                                    
                                </div>
                                <div class="col-lg-8 text-dark">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h3 class="my-3">Education Background</h3>
                                            <div class="table-responsive">
                                                <table class="table table-borderless text-dark">
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
                                                                <td>
                                                                <?php
                                                                    $started_str = strtotime($education['started_date']);
                                                                    echo date('d-M-Y', $started_str);
                                                                ?>
                                                                </td>
                                                                <td>
                                                                <?php
                                                                    $ended_str = strtotime($education['ended_date']);
                                                                    echo date('d-M-Y', $ended_str);
                                                                ?>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <h3 class="my-3 mt-5 mb-3">Working Experience </h3>
                                            <?php foreach($experiences as $experience){ ?>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h4><?php echo $experience['company'] ?></h4>
                                                        <p style="color: orange"><?php echo $experience['position'] ?></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="text-end">
                                                            <?php $started_str = strtotime($experience['started_date']);
                                                                        echo date('d-M-Y', $started_str);
                                                                ?>
                                                            To <?php $ended_str = strtotime($experience['ended_date']);
                                                                    echo date('d-M-Y', $ended_str);
                                                                ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="jd">
                                                    <h6>Job Description</h6>
                                                    <p align="justify"><?php echo $experience['jobDesc'] ?></p>
                                                </div>
                                                <hr style="border: 1px dashed grey">
                                            

                                            <?php } ?>
                                            
                                        </div>
                                    </div>
                                </div>
                        </div>
                        
                </div>
            </div>
        </div>
</div>
