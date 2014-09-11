<!DOCTYPE html>
<html>
	<head>
		<title>Coffee</title>
		<meta name="Author" content="Chris Card">
		<link rel="stylesheet" type="text/css" href="order_form.css">
	</head>
	<?php
		require_once 'products.php';
		$products = load_products();
		$nameErr = $drinksErr = "";
		$name = $drinks = $drink = "";
		$price = 0.0;
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$name = clean_input($_POST["name"]);
			$drinks = clean_input($_POST["drinks"]);
			$drink = clean_input($_POST["drink"]);
			if($name === "" || !preg_match("/^[a-zA-Z ]*\'?[a-zA-Z ]*$/", $name)){
				$nameErr = "Only letters, whitespace and ' allowed";
			} else {
				$nameErr = "";
			}
			if($drinks === "" || !preg_match("/^[+]?\d+$/", $drinks)){
				$drinksErr = "I am sorry but you can't give us drinks";
			} else {
				$drinksErr = "";
			}
			if($drinksErr == "" && $nameErr == ""){
				$drinksErr="working";
				$destination = "processed_form.php?name=$name&drink=$drink&drinks=$drinks";
				header("Location:$destination");
				exit();
			}
		}
		function clean_input($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		function set_random_images()
		{
			$images = array("coffee1.jpg","coffee2.jpg","coffee3.jpg","coffee3X.jpg",
				"muffin.jpg","muffin2.jpg","tea1.jpg");
			$keys = array_rand($images,3);
			echo $images[$keys[rand(0,2)]];
		}
	?>
	<body>
		<h1> Chris's Coffee Shop </h1>
		<header id="images">
			<image class="imgs" id="img1" src="<?php set_random_images(); ?>" width="200px" height="150px">
			<image class="imgs" src="<?php set_random_images(); ?>" width="200px" height="150px">
			<image class="imgs" src="<?php set_random_images(); ?>" width="200px" height="150px">
		</header>
		<div id="menu">
			<?php get_products_and_price($products) ?>
		</div>
		<div id="order_form">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			Name: <input type="text" name="name" value="<?php echo $name;?>" required>
			<span class="error">* <?php echo $nameErr;?></span>
			<br><br>
			Drink: <input type="number" min="1" name="drinks" value="<?php echo $drinks;?>" required>
			<span class="error">* <?php echo $drinksErr?></span>
			<select name="drink" value="<?php echo $drink;?>">
				<?php get_product_options($products,$drink); ?>
			</select>
			<br><br>
			<input type="submit" name="submit" value="Place Order">
		</form>
	</div>
	</body>
</html>