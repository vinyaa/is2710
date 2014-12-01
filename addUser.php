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
	$max_query = "SELECT MAX(emp_id) FROM Employees";
	
	$max_result = mysqli_query($connection, $max_query);
	if (!$max_result) {
		die("Database query failed."); // bad query syntax error
	}
	
	$max_row = mysqli_fetch_assoc($max_result);
	$max = $max_row["MAX(emp_id)"];
	$new_id = $max + 1;
?>
<?php
	if(isset($_POST['submit'])){
		$id = $_POST['emp_id'];
		$name = $_POST['emp_name'];
		$street = $_POST['emp_address_street'];
		$city = $_POST['emp_address_city'];
		$state = $_POST['emp_address_state'];
		$zip = $_POST['emp_address_zip'];
		$email = $_POST['email'];
		
		$title = $_POST['title'];
		$store = $_POST['store_id'];
		$salary = $_POST['salary'];
		
		$add_emp = "INSERT INTO Employees VALUES ('$id', '$name', '$street', '$city', '$state', '$zip', '$type')";
		
		$add_emp_result = mysqli_query($connection, $add_emp);
		if ($add_emp_result) {
			echo "Successfully added employee " . $id . "; "; 
		} else {
			die("Database query failed. " . mysqli_error($connection));
		}
		
		$add_sales = "INSERT INTO Salesperson VALUES ('$id', '$store', '$title', '$salary')";
		$add_sales_result = mysqli_query($connection, $add_sales);
		if ($add_sales_result) {
			echo "Successfully added salesperson " . $id; 
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
	<title>Add Employee</title>
</head>
<body>
	<h2>Add Employee</h2>
	<form action="addUser.php" method="post">
		<p>
			Employee Details: 
		</p>
		<div>
			<label for="emp_id">Employee ID: </label>
			<input type="text" name="emp_id" value="<?php echo $new_id;?>" />
		</div>
		<div>
			<label for="emp_name">Name: </label>
			<input type="text" name="emp_name" />
		</div>
		<div>
			<label for="emp_address_street">Street: </label>
			<input type="text" name="emp_address_street" />
		</div>
		<div>
			<label for="emp_address_city">City: </label>
			<input type="text" name="emp_address_city" />
		</div>
		<div>
			<label for="emp_address_state">State: </label>
			<input type="text" name="emp_address_state" />
		</div>
		<div>
			<label for="emp_address_zip">Zip: </label>
			<input type="text" name="emp_address_zip" />
		</div>
		<div>
			<label for="email">Email: </label>
			<input type="text" name="email" />
		</div>
		<p>
			Assignment:
		</p>
		<div>
			<label for="title">Title: </label>
			<input type="text" name="title" />
		</div>
		<div>
			<label for="store_id">Store ID: </label>
			<input type="text" name="store_id" />
		</div>
		<div>
			<label for="salary">Salary: </label>
			<input type="text" name="salary" />
		</div>
		<div><input type="submit" name="submit" value="Submit"></div>
	</form>
	<p>
		To edit or delete an employee, enter the 
		employee ID below and click "Search"
	</p>
	<form action="editUser.php" method="post">
		<label for="emp_id">Employee ID: </label>
		<input type="text" name="emp_id" />
		<input type="submit" name="search" value="Search">
	</form>
</body>
</html>

<?php
	// 5. Close database connection
	mysqli_close($connection);
?>
