<div class="container-fluid py-4 shadow" style="background-color: rgb(243, 104, 29)">
    <div class="my-5">
        <h1 class="text-center text-white"><i class="fas fa-blog me-2"></i>BLOGS</h1>
        <em class="text-white text-center d-block">"Sharing is making network strong and Knowledge is power."</em>
    </div>
</div>
<div class="container">
    <div class="row">
        <?php foreach($blogs as $blog){ ?>
        <div class="col-md-8 offset-md-2 my-3">
            <div class="card shadow">
                <img src="./assets/profileImages/<?= $blog['p_img'] ?>" class="card-img-top" alt="">
                <div class="card-body ms-2">
                    <em class="text-secondary"><?php $posted_date = strtotime($blog['posted_date']); echo date('F d, Y', $posted_date); ?></em>
                    <h3><?= $blog['title'] ?></h3>
                    <em class="badge text-bg-secondary">By <?= $blog['admin_name'] ?></em>
                </div>
                <div class="btn text-end mb-3 me-3">
                    <a href="" class="btn btn-outline-orange">Read More <i class="fas fa-arrow-circle-right ms-2"></i></a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>