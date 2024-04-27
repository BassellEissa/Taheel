<?php include 'adminpanel.php' ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Taheel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lovers+Quarrel" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/a1983178b4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
 
	
  </head>
  <body>
    
  <?php include 'header.php'; ?>
  <script src="js/ip.js"></script>
    <!-- END nav -->
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg2.png');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Stories</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
	
		<section class="ftco-section">
          <button id="add-blog" class="btn btn-primary px-4 py-3 mt-3" style="display: flex; justify-content: space-evenly;margin: auto;margin-bottom: 5%;color:#fff;display: <?php echo $display; ?>;">
            Add a New Story
          </button>
     
            <div id="upload1" style="display: none;">
              <style>
                label {
                color: #fff;
                  }

                  input {
                      width: 50%;
                  }
              </style>
              <form method="post" action="adminpanel.php" enctype="multipart/form-data">
                  <label> Blog title:</label>
                  <input type="text" name="title" placeholder="Title" required>
                  <br>
                  <label> Blog thumbnail</label>
                  <input type="file" name="thumbnail" required>
                  <br>
                  <label> Blog video</label>
                  <input type="file" name="video">
                  <br>
                  <label> Blog images</label>
                  <input type="file" id="upload" name="images[]" multiple>
                  <div id="imageContainer"></div>
                  <br>
                  <label> Blog body</label>
                  <br><br>
                  <textarea rows = "5" cols = "60" name = "Bbody" required>
                  </textarea><br>
                  <input type="submit" name="insert" value="insert" class="btn btn-primary px-4 py-3 mt-3" 
                  style="
                  display: flex;
                  justify-content: space-evenly;
                  margin: auto;
                  color:#fff;">
          
                </form>
              <div class="upload__img-wrap"></div>
        </div>    
    
			<div class="container" id="myDiv">
				<div class="row">

        <?php list($titles, $thumbnails, $count, $datee) = GetBlogs();
          if($count > 9){
            $count = 9; 
          }
          for($i = 0; $i < $count; $i++): ?>

          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a class="block-20" style="background-image: url('<?php echo $thumbnails[$i];?>');">
              </a>
              <div class="text px-4 pt-3 pb-4">
                <div class="meta">
                  <div><a><?php echo $datee[$i]; ?></a></div>
                  <div><a>Admin</a></div>
                </div>
                <h3 class="heading"><a><?php echo $titles[$i];?></a></h3>
                <p class="clearfix">
                  <form method="post" action="adminpanel.php">
                    <input type="hidden" class="float-left read" name="tt">
                    <button type="submit" class="btn btn-info px-4 py-3 mt-3" name="submit_button" value="<?php echo $titles[$i];?>">Read More</button>
                    <button type="button" class="btn btn-danger px-2 py-3 mt-3" onclick="deleteBlog();" style="display: <?php echo $display; ?>; color: black;">
                      <i class="fa-solid fa-trash" style="color: #000;"></i> Delete
                    </button>
                    <button type="button" class="btn btn-warning px-2 py-3 mt-3" style="display:<?php echo $display; ?> ;">
                    <i class="fa-solid fa-pen-to-square" style="color: #000;"></i> Edit
                    </button>
                  </form>
                </p>
              </div>
            </div>
          </div>

        <?php endfor; ?>

        </div>
        <div class="row no-gutters my-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li>
                    <form method="post" action="adminpanel.php">
                          <input type="hidden" class="float-left read" name="tt">

                          <button type="submit" name="page_button" value="1" id='p1' style="border: 1px solid #f34949;
                              text-align: center;
                              display: inline-block;
                              width: 40px;
                              height: 40px;
                              line-height: 40px;
                              border-radius: 50%;
                              background-color:#f34949;
                              color: white;
                              cursor: pointer;">1
                          </button>
                          
                    </form>
                  </li>

              <?php 
                  $number_of_pages = 1;
                  $count = $_SESSION["ALL"];
                  if($count > 9){
                    $number_of_pages = ceil($count / 9);
                  }                
                  for($i = 2; $i <= $number_of_pages; $i++):
              ?>

                  <li>
                    <form method="post" action="adminpanel.php">
                          <input type="hidden" class="float-left read" name="tt">

                          <button type="submit" name="page_button" 
                            value="<?php echo $i; ?>" id="<?php echo "p".$i ?>"
                             style="border: 1px solid #f34949;
                                text-align: center;
                                display: inline-block;
                                width: 40px;
                                height: 40px;
                                line-height: 40px;
                                border-radius: 50%;
                                background-color: #f34949;
                                color: white;
                                cursor: pointer;"><?php echo $i;?>
                          </button>
                        
                    </form>
                  </li>
                  
              <?php endfor; ?>

              <script>
                  const button = document.getElementById("<?php echo $_SESSION["clicked"]; ?>");
                  button.style.backgroundColor = 'transparent';
                  button.style.color = '#f34949';
              </script>

                <li><a href="#">&gt;</a></li>
              </ul>

            </div>
          </div>
        </div>
			</div>
		</section>

    <?php include 'footer.php'; ?>
    <script src="js/ip.js"></>
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