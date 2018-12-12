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
  <?php
  session_start(); //starts the session
  if($_SESSION['user']){ //checks if user is logged in
  }
  else{
    header("location:login.php"); // redirects if user is not logged in
  }
  $user = $_SESSION['user']; //assigns user value
  ?>
  <body>
    <h1>Home Page</h1>
    <p>Hello <?php Print "$user"?>!</p> <!--Displays user's name-->
    <a href="logout.php">Logout!</a><br/><br/>
    <h2 align="center">My bookings</h2>
    <table border="1px" width="100%">
      <tr>
        <th>Booking Id</th>
        <th>Room No.</th>
        <th>CheckIn Date</th>
        <th>CheckOut Date</th>
        <th>Approval Status</th>
        <th>Print Reciept</th>
      </tr>
      <?php
        $conn = mysqli_connect("localhost","root","","GUESTROOM");
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
          $sql="SELECT guest_mno, guest_name, booking_id, room_number, checkIn_date, checkOut_date, approval_status FROM Booking_Info WHERE webmail_id='$user'";
          $query = mysqli_query($conn,$sql); // SQL Query
          if($query){
            while($row = mysqli_fetch_array($query))
            {
              Print "<tr>";
                Print '<td align="center">'. $row['booking_id'] . "</td>";
                Print '<td align="center">'. $row['room_number'] . "</td>";
                Print '<td align="center">'. $row['checkIn_date']."</td>";
                Print '<td align="center">'. $row['checkOut_date']."</td>";
                Print '<td align="center">'. $row['approval_status']."</td>";
                Print '<td align="center"><a href="#" onclick="printReciept('.$row['booking_id'].')">PRINT!</a> </td>';
              Print "</tr>";
            }
          }
      ?>
    </table>
    <script>
      function printReciept(booking_id)
      {
        var r=confirm("Are you sure you want to PRINT this booking?");
        if (r==true){
          window.location.assign("printReciept.php?booking_id="+booking_id);
        }
      }
    </script>

    <!--Booking Room-->
    <br><a href="book.php">Click Here for New Booking</a><br/><br/>
    </body>
</html>