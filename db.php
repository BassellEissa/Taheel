<?php
    $conn = mysqli_connect("localhost","root", "","taheel");
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "Select * From admin where Username = '$user' and Password = '$pass'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows(($result)) > 0){
        header('Location: adminpanel.php');
    }else{
        header('Location: login.html');
    }
?>