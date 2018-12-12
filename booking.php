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
	$room_number;
	$in_date;
	$out_date;
	session_start(); //starts the session
	if($_SESSION['user']){ //checks if user is logged in
	}
	else{
		header("location:index.php"); // redirects if user is not logged in
	}
	if($_SERVER['REQUEST_METHOD'] == "GET"):
	{
		$conn=mysqli_connect("localhost", "root","","GUESTROOM") or die(mysqli_error()); //Connect to server & database
		if(isset($_GET['room_number']))
			$room_number = $_GET['room_number'];
		if(isset($_GET['in_date']))
			$in_date = $_GET['in_date'];
		if(isset($_GET['out_date']))
			$out_date = $_GET['out_date'];

		$_SESSION['room_number']=$room_number;
		$_SESSION['in_date']=$in_date;
		$_SESSION['out_date']=$out_date;
		//echo "$room_number\n";
		//echo "$in_date\n";
		//echo "$out_date\n";
		echo "<h1><br>Fill below details to request booking</h1><br><br>"?>

		<form action="booking_insert.php" method="post">
		    Guest Name : <input type="text" name="guest_name" required="required"><br><br>
		    Guest's Mobile Number : <input type="text" name="guest_mno" required="required"><br><br>
		    Guest's relation with You : <input type="text" name="relation" required="required"><br><br>
		    Guest Coming From : <input type="text" name="coming_from" required="required"><br><br>
		    Reason for booking : <input type="text" name="reason" required="required"><br><br>
		    <input type="submit" name="sub_button">
		</form>
		<?php
			/*echo "$room_number\n";
			echo "$in_date\n";
			echo "$out_date\n";
			if(isset($_POST["sub_button"])){
				echo "Now Here!\n";
				$sql="INSERT INTO `Booking_Info`(`username`, `room_number`, `checkIn_date`, `checkOut_date`, `guest_name`, `guest_mno`, `relationship`, `coming_from`) VALUES ('".$_SESSION['user']."','".$room_number."','".$in_date."','".$out_date."','".$_POST['guest_name']."','".$_POST['guest_mno']."','".$_POST['relation']."','".$_POST['coming_from']."')";
				$result=mysqli_query($conn,$sql);
				if($result)
					echo "Booking Request Succesful!";
				else
					echo "Error!";
			}*/
	}endif;
?>