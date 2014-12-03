<?php
  // 1. Create a database connection
  $dbhost = "localhost";
  $dbuser = "username"; // your username here
  $dbpass = "password"; // your password here
  $dbname = "database name"; // your db name here
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  // Test if connection succeeded
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="ricks.css" />
	<script src="js/jquery-2.1.0.js"></script>
	<script src="js/ricks.js"></script>
	<title>Employee Login</title>
</head>
<body>
	<header>
		<h3 style="display:inline">Rick's Sports</h3>&nbsp;&nbsp;
		<a href="customers.php">Customer Interface</a>&nbsp;&nbsp;
		<a href="data.php">Data Aggregation</a>&nbsp;&nbsp;
		<a href="employees.php">Employee Login</a>&nbsp;&nbsp;
	</header>
	<h2>Employee Login</h2>
	<p>Please supply your employee ID.</p>
	<form action="addTrans.php" method="post">
		<input type="text" name="emp_id" />
		<input type="submit" name="login" value="Add Transaction" />
	</form>
	<br/>
	<form action="addCust.php" method="post">
		<input type="text" name="emp_id" />
		<input type="submit" name="login" value="Add/Edit Customer"/>
	</form>
	<br/>
	<form action="addInv.php" method="post">
		<input type="text" name="emp_id" />
		<input type="submit" name="login" value="Add/Edit Inventory"/>
	</form>
	<br/>
	<form action="addUser.php" method="post">
		<input type="text" name="emp_id" />
		<input type="submit" name="manager_login" value="Add/Edit Employee"/>
	</form>
</body>
</html>

<?php
	// 5. Close database connection
	mysqli_close($connection);
?>
