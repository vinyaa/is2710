<?php
	// 1. Create a database connection
	$dbhost = "localhost";
    $dbuser = "username"; // your username here
    $dbpass = "password"; // your password here
    $dbname = "database name"; // your db name here
	t($dbhost, $dbuser, $dbpass, $dbname);
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
	<title>Data Aggregation</title>
</head>
<body>
	<header>
		<h3 style="display:inline">Rick's Sports</h3>&nbsp;&nbsp;
		<a href="customers.php">Customer Interface</a>&nbsp;&nbsp;
		<a href="data.php">Data Aggregation</a>&nbsp;&nbsp;
		<a href="employees.php">Employee Login</a>&nbsp;&nbsp;
	</header>
	<h2>Data Aggregation</h2>
	<p>
		Some data aggregations are available for viewing. 
		Click the buttons below to view the most recent data.
	</p>
	<ul>
		<li>
			<form action="data_results.php" method="post">
				<label for="company_sales">Total Company Sales and Profits</label>
				<input type="submit" name="company_sales" value="Go"/>
			</form>
		</li>
		<br/>
		<li>
			<form action="data_results.php" method="post">
				<label for="product_categories">Top 5 Product Categories by Sales</label>
				<input type="submit" name="product_categories" value="Go"/>
			</form>
		</li>
		<br/>
		<li>
			<form action="data_results.php" method="post">
				<label for="region_sales">Sales by Region</label>
				<input type="submit" name="region_sales" value="Go"/>
			</form>
		</li>
		<br/>
		<li>
			<form action="data_results.php" method="post">
				<label for="business_products">Most Purchased Product by Each Business</label>
				<input type="submit" name="business_products" value="Go"/>
			</form>
		</li>
		<br/>
		<li>
			<form action="data_results.php" method="post">
				<label for="top_customers">Top 10 Customers by Sales</label>
				<input type="submit" name="top_customers" value="Go"/>
			</form>
		</li>
	</ul>
</body>
</html>

<?php
// 5. Close database connection
mysqli_close($connection);
?>