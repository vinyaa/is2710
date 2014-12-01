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
		$id = $_POST['product_id'];
		$product_query = "SELECT * FROM Product WHERE product_id = $id";
		
		$product_result = mysqli_query($connection, $product_query);
		if (!$product_result) {
			die("Database query failed."); // bad query syntax error
		}
		
		$product_row = mysqli_fetch_assoc($product_result);
		$id = $product_row['product_id'];
		$name = $product_row['product_name'];
		$quant = $product_row['quantity'];
		$price = $product_row['price'];
		$cost = $product_row['unit_cost'];
		$type = $product_row['product_type'];
	}
?>
<?php
	if(isset($_POST['submit'])) {
		$id2 = $_POST['product_id'];
		$name2 = $_POST['product_name'];
		$quant2 = $_POST['quantity'];
		$price2 = $_POST['price'];
		$cost2 = $_POST['unit_cost'];
		$type2 = $_POST['product_type'];
		
		$update_query = "UPDATE Product SET product_name = '$name2', quantity = '$quant2', price = '$price2', unit_cost = '$cost2', product_type = '$type2' WHERE product_id = '$id2'";
		
		$update_result = mysqli_query($connection, $update_query);
		
		echo "Debugging: ";
		print_r($_POST);
		
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
	<title>Edit Inventory</title>
</head>
<body>
	<h2>Edit Inventory</h2>
	<form action="editInv.php" method="post">
		<div>
			<label for="product_id">Product ID: </label>
			<input type="text" name="product_id" value="<?php echo $id;?>" /> 
		</div>
		<div>
			<label for="product_name">Name: </label>
			<input type="text" name="product_name" value="<?php echo $name;?>" />
		</div>
		<div>
			<label for="quantity">Quantity: </label>
			<input type="text" name="quantity" value="<?php echo $quant;?>" />
		</div>
		<div>
			<label for="price">Price: </label>
			<input type="text" name="price" value="<?php echo $price;?>" />
		</div>
		<div>
			<label for="unit_cost">Unit Cost: </label>
			<input type="text" name="unit_cost" value="<?php echo $cost;?>" />
		</div>
		<div>
			<label for="product_type">Type: </label>
			<select name="product_type">
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
		<div><input type="submit" name="submit" value="Submit"></div>
	</form>
</body>
</html>

<?php
	// 5. Close database connection
	mysqli_close($connection);
?>


