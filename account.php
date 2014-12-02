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
<?php
	$id = $_POST['customer_id'];

	$get_account = "SELECT * FROM Accounts WHERE customer_id = '$id'";

	$account_result = mysqli_query($connection, $get_account);
	if (!$account_result) {
		die("Database query failed."); // bad query syntax
	}

	$account_row = mysqli_fetch_assoc($account_result);
	$balance = $account_row['balance'];
?>
<?php
	if(isset($_POST['pay'])){
		$bal = $_POST['balance'];
		$pay = $_POST['payment'];
		$new_bal = $bal - $pay;
		
		$payment_query = "UPDATE Accounts SET balance = '$new_bal' WHERE customer_id = '$id'";
		
		$payment_result = mysqli_query($connection, $payment_query);
		if ($payment_result) {
			echo "Successfully updated balance. Current Balance: $" . $new_bal;
		} else {
			die("Database query failed."); // bad query syntax
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="ricks.css" />
	<script src="js/jquery-2.1.0.js"></script>
	<script src="js/ricks.js"></script>
	<title>Customer Account</title>
</head>
<body>
	<h2>Account for Customer <?php echo $id;?>:</h2>
	<form action="account.php" method="post">
		<div>
			<label for="balance">Account Balance: </label>
			<input type="text" name="balance" value="<?php echo $balance;?>" />
		</div>
		<div>
			<label for="payment">Enter Payment Amount: </label>
			<input type="text" name="payment" />
		</div>
		<div><input type="submit" name="pay" value="Make Payment"></div>
	</form>
</body>
</html>

<?php
	// 5. Close database connection
	mysqli_close($connection);
?>
