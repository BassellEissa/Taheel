<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/login.css">
<?php 
    include 'header.php';
  ?>
<body>
  <div class="wrapp">
    <div class="box">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <div class="wrapper">
          <canvas id="introduction-canvas" width="auto" height="400px"></canvas>
          <div class="introduction-canvas--overflow"></div>
  </div>
  <div class="login-box">
  <form method="post">
    <img src="./images/logo.png" style="width: 100%;" >
    <div class="user-box">
      <input type="text" name="username" required="">
      <label>Username</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" required="">
      <label>Password</label>
    </div>
    <button type="submit" class="login-btn" value="login" name="login">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Login
    </button>
  </form>
</div>
</body>
<?php
  if(isset($_POST['login']) == 'login'){
    $conn = mysqli_connect("localhost","root", "","taheel");
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "Select * From admin where Username = '$user' and Password = '$pass'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows(($result)) > 0){
        session_start();
        $_SESSION['adminLoggedIn'] = true;
        header('Location:index.php');
    }else{
        echo "<script> alert('wrong credintals') </script>";
    }
  }
?>