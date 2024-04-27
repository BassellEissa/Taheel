
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Mti Restaurant</title>
</head>

<body>

<?php


$database = mysqli_connect("localhost","root", "","mti_restaurant_db");
	if(isset($_POST['reservation']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$date=$_POST['book_date'];
	$time=$_POST['book_time'];
	$persons=$_POST['persons'];
		
	$reservation = "INSERT INTO reservations (reservation_id,	name, 	phone,	email,	date,	time,	persons)
	VALUES ('NULL', '$name', '$phone', '$email','$date','$time' ,'$persons')";

	$result = mysqli_query($database, $reservation);
	
	if (!($result))
		die( "Could not connect to database </body></html>" );
		else{
			echo '<script>alert("Reservation Is Done Successfully");</script>';
            echo '<script> window.history.go(-1); </script>' ;
		}
		
}
?>
</body>
</html>