<html>
	<head>
		<title>Login Page</title>
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
		<h1>Login Page</h1>
		<br><a href="index.php">Click here to go back</a><br><br>
    <a href="register.php">Not registered yet! Click here</a><br><br>
		<form action="checklogin.php" method="post">
			Enter Webmail_Id : <input type="text" name="webmail" required="required"/> <br><br>
			Enter Password : <input type="password" name="password" required="required" /> <br>
			<input type="submit" value="Login"/>
		</form>
	</body>
</html>