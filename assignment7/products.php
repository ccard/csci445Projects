<?php
	
	function load_products() {
		$products = array();
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
	
		
		$query = "SELECT ID, Name, Price FROM Products";
		
		$result = $mysqli->query($query) or die($mysql->error.__LINE__);

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$tmp = array();
				$tmp['ID'] = $row['ID'];
				$tmp['Price'] = $row['Price'];
				$products[$row['Name']] = $tmp;
			}
		} else {
			echo 'no results';
		}
		mysqli_close($mysqli);
		return $products;
	}

	function getID($products, $name)
	{
		if(!array_key_exists($name, $products)) trigger_error("The product doesn't exsist or the file has not been opened");
		return $products[$name]['ID'];
	}

	function get_price($products,$name) {
		if(!array_key_exists($name, $products)) trigger_error("The product doesn't exsist or the file has not been opened");
		return $products[$name]['Price'];
	}

	function get_products_and_price($products){
		$htm = "<p align=\"center\">";
		$keys = array_keys($products);
		for ($i=0; $i < sizeof($keys); $i++) { 
			$htm .= "|".$keys[$i]." | \$".get_price($products,$keys[$i])."| <br>";
		}
		$htm .= "</p>";
		echo $htm;
	}

	function get_product_options($products,$drink){
		$keys = array_keys($products);
		if(sizeof($keys) === 0) trigger_error("The products haven't been loaded");
		for ($i=0; $i < sizeof($keys); $i++) { 
			if($i === 0 && $drink === ""){
				echo "<option selected=\"selected\" value=\"".$keys[$i]."\">".$keys[$i]."</option>";
			} elseif ($drink === $keys[$i]) {
				echo "<option value=\"".$keys[$i]."\" selected=\"selected\">".$keys[$i]."</option>";
			} else {
				echo "<option value=\"".$keys[$i]."\">".$keys[$i]."</option>";
			}
		}
	}
?>