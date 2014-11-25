<!DOCTYPE html>
<html>
<head>
	<title>Data Aggregation</title>
</head>
<body>
	<div>
		<label for="all_data">All Product Data</label>
		<br/>
		// present various summaries of transactions
		<select id="all_data">
			<option value="option1">Option 1</option>
			<option value="option2">Option 2</option>
			<option value="option3">Option 3</option>
		</select>
		<br/>
		<input type="submit" name="sub_all_data" value="Submit" />
	</div>
	<br/>
	<div>
		<label for="prod_data">By Product</label>
		// transaction summaries for a selected product
		<br/>
		<input type="text" name="prod_req" />
		<br/>
		<select id="prod_data">
			<option value="option1">Option 1</option>
			<option value="option2">Option 2</option>
			<option value="option3">Option 3</option>
		</select>
		<br/>
		<input type="submit" name="sub_prod_data" value="Submit" />
	</div>
</body>
</html>