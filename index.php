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
	</style>
    <body>
        <h1>Welcome to IIT Patna GuestHouse Booking Portal</h1>
        <a href="login.php">Sign In!</a><br><br>
        <a href="register.php">Sign Up!</a><br><br><br>
        <p>Enter below details to check for room availability<br><br></p>
        <form action="index.php" method="post">
            CheckIn Date : <input type="date" name="in_date" required="required"><br><br>
            CheckOut Date : <input type="date" name="out_date" required="required"><br><br>
            <input type="submit" name="Check!"><br>
        </form>
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$in_date=$_POST["in_date"];
			$out_date=$_POST["out_date"];

			$datediff = $out_date - $in_date;
			$days=round($datediff / (60 * 60 * 24));

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "GUESTROOM";

			$conn = mysqli_connect($servername, $username, $password, $dbname);
			// Check connection
			if (!$conn) {
			    die("Connection failed: " . mysqli_connect_error());
			}
			#echo "Connected successfully";
			$sql = "SELECT COUNT(*) AS total FROM Rooms R
					WHERE R.maintenance_required=false AND R.room_number NOT IN (SELECT room_number FROM Booking_Info B
	                    WHERE $in_date BETWEEN B.checkIn_date AND B.checkOut_date 
	                        OR $out_date BETWEEN B.checkIn_date AND B.checkOut_date)";
	    
			$result = $conn->query($sql);
			$row = mysqli_fetch_assoc($result);
			if($row['total']>0): ?>
			<?php #echo "Accomodation available!<br>";?>
				<a href="login.php">Accomodation available! Click here to book!</a>
			<?php else:
				echo "Sorry! No accomodation available for this period try for other dates.<br>";
			?>
		<?php endif;}?>
    </body>
</html>
