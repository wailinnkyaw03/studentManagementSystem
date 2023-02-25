<div class="container-fluid mb-5">
        <div class="">
            <div class="row">
                <div class="col-md-3">
                    <div class="card mb-5 shadow">
                        <div class="card-header py-5" style="background-image: url(https://ipadizate.com/hero/2022/01/macbook-pro-13.3-m1.jpeg?width=1200); background-repeat: no repeat; background-size: cover;">
                            <img style="border: 3px solid white; position:relative; top: 80px" class="rounded-circle m-auto d-block" width="150px" height="150px" src="../../assets/profileImages/<?php echo $tutor['image'] ?>" alt="">
                        </div>
                        <div class="card-body pt-5 text-center">
                            <h3 class="text-dark" ><?php echo $tutor['name'] ?></h3>
                            <div class="badge badge-success"><?php echo $tutor['roleName'] ?></div>
                            <div class="mt-3 text-dark"><i class="fas fa-location-dot me-1"></i> <?php echo $tutor['address'] ?></div>
                            <a href="admin.php?page=tutoredit&id=<?php echo $tutor['u_id'] ?>" class="badge badge-primary mt-3 shadow">Edit Profile</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card p-5">
                        <div class="">
                            <h3 class="my-3 ms-2"><i class="fas fa-user me-3"></i>About</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-borderless text-dark table-sm">
                                        <tr>
                                            <td>Name:</td>
                                            <td><?php echo $tutor['name'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td><?php echo $tutor['email'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Phone:</td>
                                            <td><?php echo $tutor['phone'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Address:</td>
                                            <td><?php echo $tutor['address'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Role:</td>
                                            <td><?php echo $tutor['roleName'] ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-borderless text-dark table-sm">
                                        
                                        <tr>
                                            <td>Birthday:</td>
                                            <td>
                                                <?php
                                                $dobstr = strtotime($tutor['dob']);
                                                echo date('F d, Y', $dobstr);
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Gender:</td>
                                            <td><?php echo $tutor['gender'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Skills:</td>
                                            <td><?php echo $tutor['skills'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Hobbies:</td>
                                            <td><?php echo $tutor['hobbies'] ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>     
                        </div>
                        <div class="">
                            <h3 class="my-3"><i class="fas fa-graduation-cap me-3"></i>Education Background</h3>
                            <div class="table-responsive">
                                <table class="table table-borderless text-dark">
                                    <thead>
                                        <tr>
                                            <th>University</th>
                                            <th>Major</th>
                                            <th>From - To</th>
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
                                            to
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
                        <div class="experience ">
                            <h3 class="mt-5 mb-4"><i class="fas fa-screwdriver-wrench me-3"></i>Working Experience </h3>
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

