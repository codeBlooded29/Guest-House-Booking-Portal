<html>
    <head>
        <title>DBMS_PHP_PROJECT</title>
    </head>
    <body>
	<?php
		#$name=$_POST["name"];
		#echo "$name <br>";
		#$email=$_POST["email"];
		#echo "$email <br>";
		#$mobile=$_POST["mobile"];
		#echo "$mobile <br>";
		$in_date=$_POST["in_date"];
		#echo "$date <br>";
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
		$row = mysqli_fetch_assoc($result);?>
		<?php if($row['total']>0): ?>
		<?php #echo "Accomodation available!<br>";?>
			<a href="login.php">Accomodation available! Click here to book!</a>
		<?php else:
			echo "Sorry! No accomodation available for this period try for other dates.<br>";
		?>
	<?php endif;?>
    </body>
</html>
	

