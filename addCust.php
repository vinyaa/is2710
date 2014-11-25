<!DOCTYPE html>
<html>
<head>
	<title>Add Customers</title>
</head>
<body>
	<div>
		<label for="cust_id">Customer ID: </label>
		<input type="text" name="cust_id" />
		<button>Generate</button>
	</div>
	<div>
		<label for="cust_name">Name: </label>
		<input type="text" name="cust_name" />
	</div>
	<div>
		<label for="cust_addr">Address: </label>
		<input type="text" name="cust_addr_st" /><br/>
		<input type="text" name="cust_addr_city" />
		<select id="cust_addr_state">
			<option value="option1">option1</option>
			<option value="option2">option2</option>
			<option value="option3">option3</option>
		</select><br/>
		<input type="text" name="cust_addr_zip" />
	</div>
	<div>
		<label for="cust_type">Type: </label>
		<select id="cust_type">
			<option value="home">Home</option>
			<option value="business">Business</option>
		</select>
	</div>
	<div>
		add some divs here to include type specific information
	</div>
	<div><button>Submit</button></div>
</body>
</html>
