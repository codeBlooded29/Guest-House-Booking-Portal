<?php
	session_start(); //starts the session
	if($_SESSION['user']){ //checks if user is logged in
	}
	else{
		header("location:index.php"); // redirects if user is not logged in
	}
	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		$conn=mysqli_connect("localhost", "root","","GUESTROOM") or die(mysqli_error()); //Connect to server & database
		$id = $_GET['booking_id'];
		if(mysqli_query($conn,"UPDATE Booking_Info SET approval_status=1 WHERE booking_id='".$id."'")){
			Print '<script>alert("Successfully approved!");</script>'; 
		}
		header("location: adminHome.php");
	}
?>