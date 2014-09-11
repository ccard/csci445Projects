<!DOCTYPE html>
<html>
	<head>
		<meta name="Author" value="Chris Card">
		<title>Your order</title>
		<link rel="stylesheet" type="text/css" href="processed_form.css">
	</head>
	<?php
		require_once 'products.php';
		$products = load_products();
		$name = $drinks = $drink = "";
		$tax = 0.04;
		$price_tx = 0.0;
		if ($_SERVER["REQUEST_METHOD"] == "GET") {
			$name = clean_input($_GET["name"]);
			$drinks = clean_input($_GET["drinks"]);
			$drink = clean_input($_GET["drink"]);
			$price = get_price($products,$drink);
			$price = $price*$drinks;
			$price_tx = round($price*(1+$tax),2);
			date_default_timezone_set("America/Denver");
			$date = date("l")." ".date("M d")." at ".date("h:m a");
			$date = clean_input($date);
		}
		function clean_input($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		function save_order($name,$date,$drinks,$drink,$price){
			$newline = (file_exists("orders.txt") ? "\n" : "");
			$file = fopen("orders.txt", "a");
			$string = $newline.$name."\t".$date."\t".$drinks."\t".$drink."\t".round($price,2);
			$result = fwrite($file, $string);
			fclose($file);
			return $result;
		}
	?>
	<body>
		<h1>Chris's Coffe Shop</h1>
		<div id="content">
			<p> <?php echo $name?> thank you for visiting Chris's Coffe shop. Thank you for odering
			<?php echo "\"$drink\"";?> we hope you have a great day!</p>
			<p>Subtotal: $<?php echo number_format($price,2);?>
			<br>
			Total including tax: $<?php echo number_format($price_tx,2);?></p>
			<p>Order processed on <?php echo $date?></p>
			<?php echo "<p>".(save_order($name,$date,$drinks,$drink,$price_tx) === false ? "Failed to Save!" : "Order Saved!")."</p>"; ?>
			<a id="all_orders_link" href="view_all_orders.php">View All Orders</a>
		</div>
	</body>
</html>