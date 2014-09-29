<!DOCTYPE html>
<html>
	<head>
		<title>All Orders</title>
		<meta name="Author" value="Chris Card">
		<link rel="stylesheet" type="text/css" href="view_all_orders.css">
	</head>
	<body>
		<?php
			$orders = load_orders();

			function load_orders(){
				$orders = array();
				ini_set('auto_detect_line_endings',true);
				$DB_NAME = 'mysql';
				$DB_HOST = 'localhost';
				$DB_USER = 'root';
				$DB_PASS = 'test';
		
				$mysqli = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
				if (mysqli_connect_errno()) {
					die ("Connection faild: ".mysqli_connect_errno()."\n");
					trigger_error("Failed to connect ot sql db");
					exit;
				}
		
				$query = "SELECT Name, Customer, Orders.Price as Price, Quantity, D as Date FROM Orders INNER JOIN Products on Orders.Prod = Products.ID";
		
				$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

				if($result->num_rows > 0){
					while ($row = $result->fetch_assoc()) {
						if(array_key_exists($row['Customer'], $orders)){
							$tmp = array("Date"=>$row['Date'], "Drinks"=>$row['Quantity'],
								"Drink"=>$row['Name'],"Price"=>$row['Price']);
							array_push($orders[$row['Customer']],$tmp);
						} else {
							$tmp = array("Date"=>$row['Date'], "Drinks"=>$row['Quantity'],
								"Drink"=>$row['Name'],"Price"=>$row['Price']);
							$tmp_array2 = array();
							array_push($tmp_array2, $tmp);
							$orders[$row['Customer']] = $tmp_array2;
						}
					}
				}
				mysqli_close($mysqli);
				ksort($orders);
				return $orders;
			}

			function generate_detail_page($orders) {
				if(sizeof($orders) == 0){
					echo "<p style=\"font-size: 200%; color: #FF0000;
								margin-left: 20px;\">There are no orders to load!</p>";
					return;
				}
				$grand_total = 0;
				foreach ($orders as $key => $value) {
					$total = 0;
					echo "<div class=\"cust_order\">";
					echo "<p class=\"cust_title\"> Orders for: "."<span class=\"name_sp\">".$key."</span></p>";
					echo "<ul>";
					for ($i=0; $i < sizeof($value); $i++) { 
						$total += $value[$i]["Price"];
						$tmp = "On ".$value[$i]["Date"]." ordered ".$value[$i]["Drinks"]." ".$value[$i]["Drink"]." Total: \$".number_format($value[$i]["Price"],2);
						echo "<li class=\"order_item\">".$tmp."</li>";
					}
					echo "</ul>";
					echo "<p class=\"customer_total\">Customer total: \$".number_format($total,2)."</p><br>";
					$grand_total += $total;
					echo "</div>";
				}
				echo "<p class=\"grand_total\">Grand total: \$".number_format($grand_total,2)."</p>";
			}
		?>
		<h1>Chris's Coffee Shop</h1>
		<p id="order_head">Customer Orders:</p>
		<div id="order_detail">
			<?php generate_detail_page($orders); ?>
		</div>
	</body>
</html>