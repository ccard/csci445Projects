<!DOCTYPE html>
<html>
	<head>
		<meta name="Author" value="Chris Card">
		<title>Your order</title>
	</head>
	<?php
		$name = $drinks = $drink = "";
		$tax = 0.04;
		if ($_SERVER["REQUEST_METHOD"] == "GET") {
			$name = clean_input($_GET["name"]);
			$drinks = clean_input($_GET["drinks"]);
			$drink = clean_input($_GET["drink"]);
			$price = clean_input($_GET["price"]);
			$price = $price*$tax;
		}
		function clean_input($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>
	<body>
		<h1>Chris's Coffe Shop</h1>
		<p> <?php echo $name?> thank you for visiting Chris's Coffe shop. Since you odered
		<?php echo "\"$drink\"";?> you <?php if($drink == "ER espresso shot"){
		echo " may want to call 911 and please take your crazy reaction else where.";}
		else{ echo " will be awake for awhile.";}?></p>
		<p>Subtotal: $<?php echo $price;?>
		<br>
		Total including tax: $<?php echo $price_tx;?></p>
		<p>Oder processed on <?php date_default_timezone_set("America/Denver"); echo date("l")." ".date("M d Y")." at ".date("h:m a");?></p>
	</body>
</html>