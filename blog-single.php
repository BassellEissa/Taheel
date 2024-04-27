<?php include 'adminpanel.php' ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Taheel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lovers+Quarrel" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/blog-single.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	
      <!-- Include Fancybox CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Include Fancybox library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="js/ip.js"></script>
    <script src="js/blog-single.js"></script>
  </head>
  <body>
    
  <?php 
    include 'header.php'; 
    $title = $_SESSION['title'];
    $thumb = $_SESSION['thumb'];
    $images = $_SESSION['images'];
    $videos = $_SESSION['videos'];
    $body = $_SESSION['body'];
    $size = $_SESSION['size'];
  ?>

    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo $thumb; ?>');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Stories</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="blog.php">Blog <i class="ion-ios-arrow-forward"></i></a></span> <span><?php echo $title;?> <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
	
		<section class="ftco-section">
			<div class="container">
				<div class="row align-items-start">
          <div class="col-lg-8 ftco-animate">
            <h2 class="mb-3"><?php echo $title; ?></h2>
              <p><?php echo $body; ?> </p>
           </div>
            <!-- .col-md-8 -->
            <div class="col-lg-4 sidebar ftco-animate">
                <video width="530" height="260" poster="./images/000.png" preload="none" controls playsinline webkit-playsinline controlsList="nodownload">
                  <source src="<?php echo $videos; ?>">
                </video>
              <div class="gallery">
                <main class="main">
                <div class="gallery">

                <?php for($i = 0; $i < $size; $i++): ?>
                  <div class="card">
                      <div class="card-image">
                          <a href="<?php echo $images[$i]; ?>" data-fancybox="gallery" data-caption="Caption Images 1">
                              <img src="<?php echo $images[$i]; ?>" alt="Image Gallery">
                          </a>
                      </div>
                  </div>
                <?php endfor; ?>

                </div>
              </main>
              </div>
            </div>
        </div>
      </div>
		</section>

    <?php include 'footer.php'; ?>
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
</body>
</html>