<!DOCTYPE html>
<html>
<head>
<title>Add/Edit Inventory</title>
</head>
<body>
	<div>
		<label for="prod_id">Product ID: </label>
		<input type="text" name="prod_id" value=""/> 
		<button onclick="">Generate</button> // make prod_id value the next index for inventory
		<button onclick="">Find</button> // load info for prod_id
	</div>
	<div>
		<label for="prod_name">Name: </label>
		<input type="text" name="prod_name" />
	</div>
	<div>
		<label for="prod_quant">Quantity: </label>
		<input type="text" name="prod_quant" />
	</div>
	<div>
		<label for="prod_price">Price: </label>
		<input type="text" name="prod_price" />
	</div>
	<div>
		<label for="prod_type">Type: </label>
		<select id="prod_type">
			<option value="option1">option1</option>
			<option value="option2">option2</option>
			<option value="option3">option3</option>
		</select>
	</div>
	<div><button>Submit</button></div>
</body>
</html>