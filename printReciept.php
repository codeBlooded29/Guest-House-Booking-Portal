<html>
  <head>
    <title>GUESTROOM Booking Portal</title>
  </head>
  <link rel="stylesheet" type="text/css" href="mystyle.css">
  <style>
    body {
        background-color: lightblue;
    }

    h1{
        color: black;
        text-align: center;
    }
    h2{
      font-family: verdana
      text-align: center;
    }
    p {
        font-family: verdana;
        font-size: 20px;
        text-align: center;
    }
    form{
      font-family: "Comic Sans MS", cursive, sans-serif;
        font-size: 20px;
        text-align: center;
    }
    a:link, a:visited {
        background-color: #f44336;
        color: white;
        padding: 14px 25px;
        text-align: center; 
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
    }

    a:hover, a:active {
        background-color: red;
    }
    tr:hover {background-color: #f5f5f5;}
    tr:nth-child(even) {background-color: #f2f2f2;}
    th {
      background-color: #4CAF50;
      color: white;
    }
  </style>
</html>
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
		echo "<h1>IIT Patna Guestroom Booking Confirmation Receipt!</h1><br><br>";
		echo "<h1>Booking Id = '".$_GET['booking_id']."'</h1><br>";
		$result=mysqli_query($conn,"SELECT * FROM Booking_Info WHERE booking_id='".$_GET['booking_id']."'");
		$row=mysqli_fetch_assoc($result);
		echo "<h1>Guest Name = '".$row['guest_name']."'</h1><br>";
		echo "<h1>Guest Contact Number = '".$row['guest_mno']."'</h1><br>";
		echo "<h1>Approval Status = '".$row['approval_status']."'</h1><br>";

		$result=mysqli_query($conn,"SELECT * FROM Users WHERE webmail_id='".$_SESSION['user']."'");
		$row=mysqli_fetch_assoc($result);
		if($row['isAdmin']==0){
			echo '<br><br><a href="home.php">Home</a><br>';
		}
		else{
			echo '<br><br><a href="adminHome.php">Home</a><br>';
		}
	}
?> 
