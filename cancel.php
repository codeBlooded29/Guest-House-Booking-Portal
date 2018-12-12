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
		if(mysqli_query($conn,"DELETE FROM Booking_Info WHERE booking_id='$id'")){
			Print '<script>alert("Successfully cancelled!");</script>'; 
		}
		header("location: home.php");
	}
?>