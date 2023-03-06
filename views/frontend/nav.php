<!-- nav start -->
<nav class="navbar navbar-expand-md bg-light navbar-light shadow sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="./assets/img/k-logo.png" width="40px" alt="">
            <span>Education</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=about">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=courses">COURSES</a>
                </li>  
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=blog">BLOGS</a>
                </li> 
                <li class="nav-item me-3">
                    <a class="nav-link" href="#contact">CONTACT</a>
                </li>   
                <li class="nav-item">
                    <a class="btn btn-outline-orange" href="#">ENROLL NOW</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="offcanvas offcanvas-end" style="width: 280px;" id="demo">
    <div class="offcanvas-header">
      <h3 class="offcanvas-title">
        <a class="navbar-brand" href="index.php">
            <img src="./assets/img/k-logo.png" width="40px" alt="">
            <span>Education</span>
        </a>
      </h3>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <div class="list-group list-group-flush">
            <a class="list-group-item" href="index.php"><i class="fas fa-house me-2 logo-color"></i>HOME</a>
            <a class="list-group-item" href="index.php?page=about"><i class="fas fa-globe me-2 logo-color"></i>ABOUT</a>
            <a class="list-group-item" href="index.php?page=courses"><i class="fas fa-graduation-cap me-2 logo-color"></i>COURSES</a>
            <a class="list-group-item" href="index.php?page=blog"><i class="fas fa-blog me-2 logo-color"></i>BLOG</a>
            <a class="list-group-item" href="#contact"><i class="fas fa-phone-volume me-2 logo-color"></i>CONTACT</a>
        </div>
        <!-- <hr class="logo-color"> -->
        <a href="" class="btn btn-outline-orange d-block mt-3">ENROLL NOW</a>
        
    </div>
</div>
<!-- nav end -->  