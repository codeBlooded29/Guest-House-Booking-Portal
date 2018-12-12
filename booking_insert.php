<?php
	session_start(); //starts the session
	include 'booking.php';
	//echo $_SESSION['room_number'];
	$room_number=$_SESSION['room_number'];
	$in_date=$_SESSION['in_date'];
	$out_date=$_SESSION['out_date'];
	if($_SESSION['user']){ //checks if user is logged in
	}
	else{
		header("location:index.php"); // redirects if user is not logged in
	}
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$conn=mysqli_connect("localhost", "root","","GUESTROOM") or die(mysqli_error()); //
		$sql="INSERT INTO `Booking_Info`(`webmail_id`, `room_number`, `checkIn_date`, `checkOut_date`, `guest_name`, `guest_mno`, `relationship`, `coming_from`,`booking_reason`) VALUES ('".$_SESSION['user']."','".$room_number."','".$in_date."','".$out_date."','".$_POST['guest_name']."','".$_POST['guest_mno']."','".$_POST['relation']."','".$_POST['coming_from']."','".$_POST['reason']."')";
		/*$sql="INSERT INTO `Booking_Info`(`username`, `room_number`, `checkIn_date`, `checkOut_date`, `guest_name`, `guest_mno`, `relationship`, `coming_from`) VALUES ('".$_SESSION['user']."','021A','2018-11-30','2018-12-05','".$_POST['guest_name']."','".$_POST['guest_mno']."','".$_POST['relation']."','".$_POST['coming_from']."')";*/
		$result=mysqli_query($conn,$sql);
		$result1=mysqli_query($conn,"SELECT * FROM Users WHERE webmail_id='".$_SESSION['user']."'");
		$row = mysqli_fetch_assoc($result1);
		//echo $row['webmail_id'];
		//echo $row['isAdmin'];
		if($result){
			//echo $row['webmail_id'];
			//echo $row['isAdmin'];
			if($row['isAdmin']==0){
				echo "Your Booking Successful!";
				Print '<script>alert("Your Booking Successful!");</script>'; //Prompts the user
				Print '<script>window.location.assign("home.php");</script>'; // redirects to home.php
			}
			else{
				Print '<script>alert("Booking Successful!");</script>'; //Prompts the user
				Print '<script>window.location.assign("adminHome.php");</script>'; // redirects to login.php
			}
		}
		else{
			echo "Error!";
		}
	}
?>