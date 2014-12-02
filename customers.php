<?php
  // 1. Create a database connection
  $dbhost = "localhost";
  $dbuser = "username"; // your username here
  $dbpass = "password"; // your password here
  $dbname = "database name"; // your database name here
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
	<title>Customer Interface</title>
</head>
<body>
	<h2>Welcome to Rick's Sports!</h2>
	
	<form action="account.php" method="post">
		<p>
			<b>View Account:</b>
		</p>
		<label for="customer_id">Customer ID: </label>
		<input type="text" name="customer_id" />
		<input type="submit" name="submit">
	</form>
	<p>
		<b>View Merchandise:</b>
	</p>
	<form action="prod_results.php" method="post">
		<input type="submit" name="browse" value="Browse">
	</form>
	<p>or</p>
	<form action="prod_results.php" method="post">
		<p>Search for a Product:</p>
		<div>
			<label for="product_name">Name:</label>
			<input type="text" name="product_name" />
		</div>
		<div>
			<label for="product_id">Product ID:</label>
			<input type="text" name="product_id" />
		</div>
		<div>
			<label for="price">Price:</label>
			<input type="text" name="price" />
		</div>
		<div>
			<label for="product_type">Type:</label>
			<select name="product_type">
				<option value="">Select Type</option>
				<option value="baseball">Baseball</option>
				<option value="basketball">Basketball</option>
				<option value="cycling">Cycling</option>
				<option value="football">Football</option>
				<option value="hockey">Hockey</option>
				<option value="skiing">Skiing</option>
				<option value="soccer">Soccer</option>
				<option value="tennis">Tennis</option>
				<option value="volleyball">Volleyball</option>
			</select>
		</div>
		<div>
			<input type="submit" name="search" value="Search" />
		</div>
	</form>
</body>
</html>

<?php
	// 5. Close database connection
	mysqli_close($connection);
?>
