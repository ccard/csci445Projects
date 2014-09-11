<?php
	function load_products() {
		$products = array();
		ini_set('auto_detect_line_endings',true);
		$file = fopen("products.txt","r") or die("The products.txt file doesn't exist or cant be opened");
		while (!feof($file)) {
			$line = fgetcsv($file);
			$products[$line[0]] = $line[1];
		}
		fclose($file);
		return $products;
	}

	function get_price($products,$name) {
		if(!array_key_exists($name, $products)) trigger_error("The product doesn't exsist or the file has not been opened");
		return $products[$name];
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
		$htm = "";
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