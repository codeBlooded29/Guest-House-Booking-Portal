<?php
	session_start(); //starts the session
	if($_SESSION['user']){ //checks if user is logged in
	}
	else{
		header("location:index.php"); // redirects if user is not logged in
	}
	// echo "<br>Enter below details to check for room availability<br><br>";
?>
<html>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
    <head>
        <title>GUESTROOM BOOKING</title>
    </head>
    <style>
		body {
		    background-color: lightblue;
		}

		h1{
		    color: black;
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
	<h1>Enter below details to check for room availability</h1><br>
	<form action="book.php" method="post">
	    CheckIn Date: <input type="date" name="in_date" required="required"><br><br>
	    CheckOut Date: <input type="date" name="out_date" required="required"><br><br>
	    <input type="submit">
	</form>
</html>
<?php
	$user = $_SESSION['user'];
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$in_date=$_POST['in_date'];
		$out_date=$_POST['out_date'];

		$datediff = $out_date - $in_date;
		$days=round($datediff / (60 * 60 * 24));

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "GUESTROOM";

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn){
			die("Connection failed: " . mysqli_connect_error());
		}
		#echo "Connected successfully";
		$sql = "SELECT room_number FROM Rooms R
					WHERE R.maintenance_required=0 AND R.room_number NOT IN (SELECT room_number FROM Booking_Info B
					WHERE '".$in_date."' BETWEEN B.checkIn_date AND B.checkOut_date 
					OR '".$out_date."' BETWEEN B.checkIn_date AND B.checkOut_date)";

		$result=mysqli_query($conn,$sql);
			echo '<table>
		    <tr>
		        <th>Room Number</th>
		        <th>Book</th>
		    </tr>';
			while ($row = mysqli_fetch_assoc($result)) {
				$room_number=$row['room_number'];
			    echo '
			        <tr>
			            <td>'.$row['room_number'].'</td>
			            <td><a href="booking.php?room_number='.$room_number.'&in_date='.$in_date.'&out_date='.$out_date.'">BOOK!</a> </td>
			        </tr>';
			    //echo "here";
			}
			echo '
			</table>';
		//}
	}
?>
<script>
	function booking(room_number,in_date,out_date){
		var r=confirm("Are you sure you want to request this booking?");
		if (r==true)
		{
		  window.location.assign("booking.php?room_number="+room_number+"&in_date="+in_date+"&out_date"+out_date);
		}
	}
</script>