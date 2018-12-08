<html>
  <head>
    <title>My first PHP website</title>
  </head>
  <body>
    <h2>Registration Page</h2>
    <a href="index.php">Click here to go back</a><br/><br/>
    <?php echo "Enter below details to register\n"?><br>
    <form action="register.php" method="post">
      Name : <input type="text" name="name" required="required"/> <br/>
      Webmail ID : <input type="email" name="email" required="required"/> <br/>
      Mobile : <input type="number" name="mobile" required="required"/><br/>
      DOB : <input type="date" name="dob" required="required"/><br/>
      Roll No. / Employee Id : <input type="varchar" name="id" required="required"/><br/>
      Password : <input type="password" name="password" required="required"/> <br/>
      <input type="submit" value="Register"/>
    </form>
  </body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = $_POST['name'];
  $webmail=$_POST['email'];
  $mobile=$_POST['mobile'];
  $dob=$_POST['dob'];
  $password=$_POST['password'];
  $person_id=$_POST['id'];

  $conn = mysqli_connect("localhost","root","","GUESTROOM");
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  #echo "Connected successfully";
  $sql="SELECT * FROM Users";
  $result = $conn->query($sql);
  $bool=true;
  while($row = mysqli_fetch_array($result)) //display all rows from query
  {
    $table_users = $row['webmail_id']; // the first username row is passed on to $table_users, and so on until the query is finished
    if($webmail == $table_users) // checks if there are any matching fields
    {
      $bool = false; // sets bool to false
      Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
      Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
    }
  }
  if($bool) // checks if bool is true
  {
    $sql="INSERT INTO Users(password,dob,name,mobile_number,webmail_id,person_id) VALUES('$password','$dob','$name','$mobile','$webmail','$person_id')"; //Inserts the value to table users
    $result=$conn->query($sql);
    if($result){
      Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
      Print '<script>window.location.assign("login.php");</script>'; // redirects to register.php
    }
    else
      echo "Not successfull";
  }
}
?>