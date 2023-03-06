<div class="container-fluid py-4 shadow" style="background-color: #f3681d">
    <h1 class="text-center my-5 text-white">ABOUT US</h1>
</div>
<div class="container my-5">
    <h3 class="text-center mb-5">OUR TEACHERS</h3>
    <div class="row">
        <?php foreach($tutors as $tutor){ ?>
        <div class="col-md-4">
            <div class="card mb-5 shadow">
                <div class="card-header py-5" style="background-image: url(https://ipadizate.com/hero/2022/01/macbook-pro-13.3-m1.jpeg?width=1200); background-repeat: no repeat; background-size: cover;">
                    <img style="border: 3px solid white; position:relative; top: 80px" class="rounded-circle m-auto d-block" width="150px" height="150px" src="./assets/profileImages/<?php echo $tutor['image'] ?>" alt="">
                </div>
                <div class="card-body pt-5 text-center mb-3">
                    <h3 class="text-dark" ><?php echo $tutor['name'] ?></h3>
                    <p><?= $tutor['subject'] ?></p>
                    <p>from <?= $tutor['university'] ?></p>
                    <p><?= $tutor['skills'] ?></p>
                    <div class="text-dark"><i class="fas fa-location-dot me-1"></i> <?php echo $tutor['address'] ?></div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>