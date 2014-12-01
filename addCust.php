<?php
  // 1. Create a database connection
  $dbhost = "localhost";
  $dbuser = "username"; // your username goes here
  $dbpass = "password"; // your password goes here
  $dbname = "database name"; // whatever you called your db on mySQL goes here
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  // Test if connection succeeded
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
?>
<?php
	$max_query = "SELECT MAX(customer_id) FROM Customer";
	
	$max_result = mysqli_query($connection, $max_query);
	if (!$max_result) {
		die("Database query failed."); // bad query syntax error
	}
	
	$max_row = mysqli_fetch_assoc($max_result);
	$max = $max_row["MAX(customer_id)"];
	$new_id = $max + 1;
?>
<?php
	if(isset($_POST['submit'])){
		$id = $_POST['customer_id'];
		$name = $_POST['customer_name'];
		$street = $_POST['customer_address_street'];
		$city = $_POST['customer_address_city'];
		$state = $_POST['customer_address_state'];
		$zip = $_POST['customer_address_zip'];
		$type = $_POST['customer_type'];
		
		$add_cust = "INSERT INTO Customer VALUES ('$id', '$name', '$street', '$city', '$state', '$zip', '$type')";
		
		$add_result = mysqli_query($connection, $add_cust);
		if ($add_result) {
			echo "Successfully added customer " . $id; 
		} else {
			die("Database query failed. " . mysqli_error($connection));
		}
		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="ricks.css" />
	<script src="jquery-2.1.0.js"></script>
	<script src="ricks.js"></script>
	<title>Add Customer</title>
</head>
<body>
	<h2>Add Customer</h2>
	<form action="addCust.php" method="post">
		<div>
			<label for="customer_id">Customer ID: </label>
			<input type="text" name="customer_id" value="<?php echo $new_id; ?>" readonly />
		</div>
		<div>
			<label for="customer_name">Name: </label>
			<input type="text" name="customer_name" />
		</div>
		<div>
			<label for="customer_address_street">Street: </label>
			<input type="text" name="customer_address_street" /><br/>
			<label for="customer_address_city">City: </label>
			<input type="text" name="customer_address_city" /><br/>
			<label for="customer_address_state">State Abbr.: </label>
			<input type="text" name="customer_address_state" /><br/>
			<label for="customer_address_zip">Zip: </label>
			<input type="text" name="customer_address_zip" />
		</div>
		<div>
			<label for="customer_type">Type: </label>
			<select name="customer_type">
				<option value="home">Home</option>
				<option value="business">Business</option>
			</select>
		</div>
		<div>
			add some divs here to include type specific information
		</div>
		<div><input type="submit" name="submit" value="Submit" /></div>
	</form>
	<p>
		To edit a customer profile, enter the customer 
		ID below and click "Search"
	</p>
	<form action="editCust.php" method="post">
		<label for="customer_id">Customer ID: </label>
		<input type="text" name="customer_id" />
		<input type="submit" name="search" value="Search">
	</form>
</body>
</html>

<?php
	// 5. Close database connection
	mysqli_close($connection);
?>
