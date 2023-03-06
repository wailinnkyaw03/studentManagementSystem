<div class="container-fluid py-4 shadow" style="background-color: #f3681d">
    <h1 class="text-center my-5 text-white">WELCOME TO OUR COURSES</h1>
</div>
<div class="container">
    <div class="row">
        <?php 
        foreach($courses as $course){
        ?>
        <div class="col-md-4">
            <div class="card my-5 shadow">
                <img src="./assets/profileImages/<?= $course['image'] ?>" alt="" class="card-img-top">
                <div class="card-body">
                    <h5><?= $course['title'] ?></h5>
                    <em class="text-secondary d-block mb-3">
                        Posted:
                    <?php 
                        $post_str = strtotime($course['posted_date']);
                        echo date('M d, Y', $post_str); 
                        ?>
                    </em>
                    <p><?= $course['description'] ?></p>
                    <p>Started From: 
                        <?php 
                        $date_str = strtotime($course['started_date']);
                        echo date('M d, Y', $date_str); 
                        ?>
                    </p>
                    <p>Course Fee: <?= $course['feeamount'] ?> Kyats</p>
                    <p>Teacher: <?= $course['tutor_name'] ?></p>
                    <em class="d-block text-end text-secondary">Posted By <?= $course['admin_name'] ?></em>
                    <a href="" class="btn btn-outline-orange d-block mt-3">Enroll Now</a>
                </div>
            </div>
        </div>
        <?php 
        }
        ?>
    </div>
</div>