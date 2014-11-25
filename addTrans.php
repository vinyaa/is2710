<!DOCTYPE html>
<html>
<head>
	<title>Add Transactions</title>
</head>
<body>
	<div>
		<label for="trans_id">Order #: </label>
		<input type="text" name="trans_id" value="<?php echo $trans_id; ?>"/> // return next index for transaction table <br/>
	</div>
	<div>
		<label for="trans_date">Date: </label>
		<input type="text" name="trans_date" />
	</div>
	<div>
		<label for="sales_id">Salesperson: </label>
		<input type="text" name="sales_id" value="<?php echo $sales_id;?>"/> // return name associated with the sales id used to log in
	</div>
	<div>
		<label for="cust_id">Customer ID: </label>
		<input type="text" name="cust_id" />
	</div>
	<br/>
	<div id="product">
		<div>
			<label for="prod_id">Item ID: </label>
			<input type="text" name="prod_id" />
		</div>
		<div>
			<label for="quant">Quantity: </label>
			<input type="text" name="quantity" />
		</div>
		<div>
			<label for="price">Price: </label>
			<input type="text" name="price" value="<?php echo $price;?>"/>
		</div>
	</div>
	<div id="">php to add additional items here, use id=product as template</div>
	<div><button>Submit</button></div>
</body>
</html>