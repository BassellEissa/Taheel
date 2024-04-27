<?php
	session_start();
	if(isset($_SESSION['adminLoggedIn']) && $_SESSION['adminLoggedIn'] === true){
		$name = "Logout";
		$link = "logout.php";
        $display = ""; 
	}else{
		$name = "Login";
		$link = "login.php";
        $display = "none"; 
	}

    

    if(isset($_POST['submit_button'])){
        $t = $_POST['submit_button'];
        BlogDetails($t);
    }

    

    if(isset($_POST['page_button'])){
        $submitButtonValue = $_POST['submitButton'];
        if($submitButtonValue != 1){
            $_SESSION["rest"] = ($_POST['page_button'] - 1) * 9;
            $_SESSION["clicked"] = 'p' . $_POST['page_button'];
            header("Location: blog.php");
        }else{
            $_SESSION["clicked"] = 'p1';
            $_SESSION["rest"] = (1 - 1) * 9;
        }
        //echo $rest;
    }

    $conn = mysqli_connect("localhost", "root", "", "taheel");
    $sql = "Select ID From blogs";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    $_SESSION["ALL"] = $count;
    
    
    function GetBlogs(){
        $rest =  $_SESSION["rest"];
        $conn = mysqli_connect("localhost", "root", "", "taheel");
        $sql = "Select Title, Thumbnail, datee From blogs where blogs.ID > $rest";
        $result = mysqli_query($conn, $sql);

        $titles = array();
        $thumbnails = array();
        $datee = array();
        $count = mysqli_num_rows($result);

        if (mysqli_num_rows($result) > 0) {
            // Fetch rows and store the data in arrays
            while ($row = mysqli_fetch_assoc($result)) {
                $titles[] = $row['Title'];
                $thumbnails[] = $row['Thumbnail'];
                $datee[] = $row['datee'];

            }
        }
        return array($titles, $thumbnails, $count, $datee);
    }
    if (isset($_POST['delete'])){
        $query="Delete From Blogs where Title='$titles'";
    }

    function BlogDetails($t) {
        //global $title, $thumb, $images, $videos, $body, $size;
        $conn = mysqli_connect("localhost", "root", "", "taheel");
        mysqli_set_charset($conn, "utf8");

        $sql = "Select * From blogs where blogs.Title = '$t'";
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows(($result)) > 0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['title'] = $row['Title'];
            $_SESSION['thumb'] = $row['Thumbnail'];
            $_SESSION['images'] = explode(",", $row['Images']);
            $_SESSION['videos'] = $row['Video'];
            $_SESSION['body'] = $row['Body'];
            $_SESSION['size'] = count($_SESSION['images']);
            
            header("Location: blog-single.php");
        }else{
            echo "<script> alert('5ara'); </script>";
        }
    }

    // function GetBlogs() {
    //     $conn = mysqli_connect("localhost", "root", "", "taheel");
    //     $sql = "Select Title, Thumbnail From blogs";
    //     $result = mysqli_query($conn, $sql);

    //     $titles = array();
    //     $thumbnails = array();
    //     $count = mysqli_num_rows($result);

    //     if (mysqli_num_rows($result) > 0) {
    //         // Fetch rows and store the data in arrays
    //         while ($row = mysqli_fetch_assoc($result)) {
    //             $titles[] = $row['Title'];
    //             $thumbnails[] = $row['Thumbnail'];
    //         }
    //     }
    //     return array($titles, $thumbnails, $count);
    // }



    if (isset($_POST['insert'])) {
        $title = $_POST['title'];
        $thumbnail = $_FILES['thumbnail']['name'];
        $video = $_FILES['video']['name'];
        $imagePaths = [];
    
        if (!empty($_FILES['images']['name'][0])) {
            $fileCount = count($_FILES['images']['name']);
            for ($i = 0; $i < $fileCount; $i++) {
                $imageName = $_FILES['images']['name'][$i];
                $imagePaths[] = './images/' . $imageName;
            }
        }

        $body = $_POST['Bbody'];
    
        $conn = mysqli_connect("localhost", "root", "", "taheel");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        mysqli_set_charset($conn, "utf8");
    
        $title = mysqli_real_escape_string($conn, $title);
        $thumbnail = "./images/" . mysqli_real_escape_string($conn, $thumbnail);
        $video = "./" . mysqli_real_escape_string($conn, $video);

        $imageString = implode(', ', $imagePaths);

        $images = mysqli_real_escape_string($conn, $imageString);
        $body = mysqli_real_escape_string($conn, $body);
    
        $sql = "INSERT INTO blogs (Title, Thumbnail, Images, Video, Body) VALUES ('$title', '$thumbnail', '$images', '$video', '$body')";
        if (mysqli_query($conn, $sql)) {
            echo "Form data saved successfully.";
            header("Location: blog.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    
        mysqli_close($conn);
    }
        


	?>