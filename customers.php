<!DOCTYPE html>
<html>
<head>
	<title>Customer Interface</title>
</head>
<body>
	// return all
	<button>Browse Catalog</button>
	<p>or</p>
	<div id="cust_search">
		<p>Search for a Product:</p>
		// return things that meet these parameters
		<div>
		<label for="prod_name">Name:</label>
		<input type="text" name="prod_name" />
		</div>
		<div>
		<label for="prod_id">Product ID:</label>
		<input type="text" name="prod_id" />
		</div>
		<div>
		<label for="price">Price:</label>
		<input type="text" name="price" />
		</div>
		<div>
		<label for="type">Type:</label>
		<select id="type">
			<option value="option1">Option 1</option>
			<option value="option2">Option 2</option>
			<option value="option3">Option 3</option>
		</select>
		</div>
		<div>
		<input type="submit" name="sub_cust" value="Submit" />
		</div>
	</div>
</body>
</html>