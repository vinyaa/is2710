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
	if(isset($_POST['search'])){
		$id = $_POST['customer_id'];
		$customer_query = "SELECT * FROM Customer WHERE customer_id = $id";
		
		$customer_result = mysqli_query($connection, $customer_query);
		if (!$customer_result) {
			die("Database query failed."); // bad query syntax error
		}
		
		$customer_row = mysqli_fetch_assoc($customer_result);
		$id = $customer_row['customer_id'];
		$name = $customer_row['customer_name'];
		$street = $customer_row['customer_address_street'];
		$city = $customer_row['customer_address_city'];
		$state = $customer_row['customer_address_state'];
		$zip = $customer_row['customer_address_zip'];
		$type = $customer_row['customer_type'];
	}
?>
<?php
	if(isset($_POST['submit'])) {
		$id2 = $_POST['customer_id'];
		$name2 = $_POST['customer_name'];
		$street2 = $_POST['customer_address_street'];
		$city2 = $_POST['customer_address_city'];
		$state2 = $_POST['customer_address_state'];
		$zip2 = $_POST['customer_address_zip'];
		$type2 = $_POST['customer_type'];
		
		$update_query = "UPDATE Customer SET customer_name = '$name2', customer_address_street = '$street2', customer_address_city = '$city2', customer_address_state = '$state2', customer_address_zip = '$zip2', customer_type = '$type2' WHERE customer_id = '$id2'";
		
		$update_result = mysqli_query($connection, $update_query);
		
		if ($update_result) {
			echo "Success!";
		} else {
			print_r($_POST);
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
	<title>Edit Customer</title>
</head>
<body>

	<h2>Edit Customer</h2>
	<form action="editCust.php" method="post">
		<div>
			<label for="customer_id">Customer ID: </label>
			<input type="text" name="customer_id" value="<?php echo $id; ?>" />
		</div>
		<div>
			<label for="customer_name">Name: </label>
			<input type="text" name="customer_name" value="<?php echo $name; ?>" />
		</div>
		<div>
			<label for="customer_address_street">Street: </label>
			<input type="text" name="customer_address_street" value="<?php echo $street; ?>" /><br/>
			<label for="customer_address_city">City: </label>
			<input type="text" name="customer_address_city" value="<?php echo $city; ?>" /><br/>
			<label for="customer_address_state">State Abbr.: </label>
			<input type="text" name="customer_address_state" value="<?php echo $state; ?>" /><br/>
			<label for="customer_address_zip">Zip: </label>
			<input type="text" name="customer_address_zip" value="<?php echo $zip; ?>" />
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
</body>
</html>

<?php
	// 5. Close database connection
	mysqli_close($connection);
?>
