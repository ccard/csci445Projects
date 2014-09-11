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
				$file = fopen("orders.txt","r") or die("The oders.txt file doesn't exist or cant be opened");
				while (!feof($file)) {
					$line = fgetcsv($file,0,"\t");
					if(sizeof($line) === 0) continue;
					if(array_key_exists($line[0], $orders)){
						$tmp = array("Date"=>$line[1], "Drinks"=>$line[2],
							"Drink"=>$line[3],"Price"=>$line[4]);
						array_push($orders[$line[0]],$tmp);
					} else {
						$tmp = array("Date"=>$line[1], "Drinks"=>$line[2],
							"Drink"=>$line[3],"Price"=>$line[4]);
						$tmp_array2 = array();
						array_push($tmp_array2, $tmp);
						$orders[$line[0]] = $tmp_array2;
					}
				}
				fclose($file);
				ksort($orders);
				return $orders;
			}

			function generate_detail_page($orders) {
				if(sizeof($orders) == 0){
					trigger_error("No orders have been loaded!");
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
						$tmp = "On ".$value[$i]["Date"]." ordered ".$value[$i]["Drinks"]." ".$value[$i]["Drink"]." Total: \$".$value[$i]["Price"];
						echo "<li class=\"order_item\">".$tmp."</li>";
					}
					echo "</ul>";
					echo "<p class=\"customer_total\">Customer total: \$".$total."</p><br>";
					$grand_total += $total;
					echo "</div>";
				}
				echo "<p class=\"grand_total\">Grand total: \$".$grand_total."</p>";
			}
		?>
		<h1>Chris's Coffee Shop</h1>
		<p id="order_head">Customer Orders</p>
		<div id="order_detail">
			<?php generate_detail_page($orders); ?>
		</div>
	</body>
</html>