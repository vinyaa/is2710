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
<?php
	if(isset($_POST['search'])){
		$id = $_POST['emp_id'];
		
		$emp_query = "SELECT * FROM Employees WHERE emp_id = '$id'";
		$emp_result = mysqli_query($connection, $emp_query);
		if (!$emp_result) {
			die("Database query failed."); // bad query syntax error
		}
		
		$emp_row = mysqli_fetch_assoc($emp_result);
		$name = $emp_row['emp_name'];
		$street = $emp_row['emp_address_street'];
		$city = $emp_row['emp_address_city'];
		$state = $emp_row['emp_address_state'];
		$zip = $emp_row['emp_address_zip'];
		$email = $emp_row['email'];
		
		$sales_query = "SELECT * FROM Salesperson WHERE emp_id = '$id'";
		$sales_result = mysqli_query($connection, $sales_query);
		if (!$sales_result) {
			die("Database query failed."); // bad query syntax error
		}
		
		$sales_row = mysqli_fetch_assoc($sales_result);
		$store = $sales_row['store_id'];
		$title = $sales_row['title'];
		$salary = $sales_row['salary'];
	}
?>
<?php
	if(isset($_POST['submit'])) {
		$id2 = $_POST['emp_id'];
		$name2 = $_POST['emp_name'];
		$street2 = $_POST['emp_address_street'];
		$city2 = $_POST['emp_address_city'];
		$state2 = $_POST['emp_address_state'];
		$zip2 = $_POST['emp_address_zip'];
		$email2 = $_POST['email'];
		
		$title2 = $_POST['title'];
		$store2 = $_POST['store_id'];
		$salary2 = $_POST['salary'];
		
		$update_emp_query = "UPDATE Employees SET emp_name = '$name2', emp_address_street = '$street2', emp_address_city = '$city2', emp_address_state = '$state2', emp_address_zip = '$zip2', email = '$email2' WHERE emp_id = '$id2'";
		
		$update_emp_result = mysqli_query($connection, $update_emp_query);
		
		if ($update_emp_result) {
			echo "Successfully updated employee " . $id . "; ";
		} else {
			print_r($_POST);
			die("Database query failed. " . mysqli_error($connection) . " ");
		}
		
		$update_sales_query = "UPDATE Salesperson SET store_id = '$store2', title = '$title2', salary = '$salary2'";
		
		$update_sales_result = mysqli_query($connection, $update_sales_query);
		
		if ($update_sales_result) {
			echo "Successfully updated salesperson " . $id;
		} else {
			die("Database query failed. " . mysqli_error($connection));
		}
		
	}
?>
<?php
	if(isset($_POST['delete'])){
		print_r($_POST);
		$delete_id = $_POST['delete_id'];
		echo $delete_id;
	
		// Delete from Employees table
		$delete_emp_query = "DELETE FROM Employees WHERE emp_id = '$delete_id'";
		$delete_emp_result = mysqli_query($connection, $delete_emp_query);
		if ($delete_emp_result) {
			echo "Successfully deleted employee #" . $delete_id . "; ";
		} else {
			die("Database query failed. " . mysqli_error($connection));
		}
		
		// Delete from Salesperson table
		$delete_sales_query = "DELETE FROM Salesperson WHERE emp_id = '$delete_id'";
		$delete_sales_result = mysqli_query($connection, $delete_sales_query);
		if ($delete_sales_result) {
			echo "Successfully deleted salesperson #" . $delete_id;
		} else {
			die("Database query failed. " . mysqli_error($connection));
		} 
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="ricks.css" />
	<script src="js/jquery-2.1.0.js"></script>
	<script src="js/ricks.js"></script>
	<title>Edit Employee</title>
</head>
<body>
	<header>
		<h3 style="display:inline">Rick's Sports</h3>&nbsp;&nbsp;
		<a href="customers.php">Customer Interface</a>&nbsp;&nbsp;
		<a href="data.php">Data Aggregation</a>&nbsp;&nbsp;
		<a href="employees.php">Employee Login</a>&nbsp;&nbsp;
	</header>
	<h2>Edit Employee</h2>
	<form action="editUser.php" method="post">
		<p>
			Employee Details: 
		</p>
		<div>
			<label for="emp_id">Employee ID: </label>
			<input type="text" name="emp_id" value="<?php echo $id;?>" />
		</div>
		<div>
			<label for="emp_name">Name: </label>
			<input type="text" name="emp_name" value="<?php echo $name;?>" />
		</div>
		<div>
			<label for="emp_address_street">Street: </label>
			<input type="text" name="emp_address_street" value="<?php echo $street;?>" />
		</div>
		<div>
			<label for="emp_address_city">City: </label>
			<input type="text" name="emp_address_city" value="<?php echo $city;?>" />
		</div>
		<div>
			<label for="emp_address_state">State: </label>
			<input type="text" name="emp_address_state" value="<?php echo $state;?>" />
		</div>
		<div>
			<label for="emp_address_zip">Zip: </label>
			<input type="text" name="emp_address_zip" value="<?php echo $zip;?>" />
		</div>
		<div>
			<label for="email">Email: </label>
			<input type="text" name="email" value="<?php echo htmlentities($email);?>" />
		</div>
		<p>
			Assignment:
		</p>
		<div>
			<label for="title">Title: </label>
			<input type="text" name="title" value="<?php echo $title;?>" />
		</div>
		<div>
			<label for="store_id">Store ID: </label>
			<input type="text" name="store_id" value="<?php echo $store;?>" />
		</div>
		<div>
			<label for="salary">Salary: </label>
			<input type="text" name="salary" value="<?php echo $salary;?>" />
		</div>
		<div><input type="submit" name="submit" value="Submit"></div>
	</form>
	<form action="editUser.php" method="post">
		<p>Please retype Employee ID to confirm Delete. This action is PERMANENT.</p>
		<div>
			<label for="delete_id">Delete ID: </label>
			<input type="text" name="delete_id" />
		</div>
		<input type="submit" name="delete" value="Delete User">
	</form>
</body>
</html>

<?php
	// 5. Close database connection
	mysqli_close($connection);
?>
