<!DOCTYPE html>
<html>
<head>
	<title>Add/Edit User</title>
</head>
<body>
	<div>
		<label for="sales_id">Sales ID: </label>
		<input type="text" name="sales_id" />
		<button onclick="<?php echo $sales_id;?>">Generate</button> // get next index for sales_id
	</div>
	<div>
		<label for="sales_name">Name: </label>
		<input type="text" name="sales_name" />
	</div>
	<div>
		<label for="sales_email">Email: </label>
		<input type="text" name="sales_email" />
	</div>
	<div>
		<label for="sales_title">Title: </label>
		<input type="text" name="sales_title" />
	</div>
	<div>
		<label for="store_id">Store ID: </label>
		<input type="text" name="store_id" />
	</div>
	<div>
		<label for="sales_salary">Salary: </label>
		<input type="text" name="sales_salary" />
	</div>
	<div>
		<button>Submit</button> 
		<button>Delete User</button> // drop user from table, DO NOT DELETE related transactions
	</div>
</body>
</html>