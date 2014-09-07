<!DOCTYPE html>
<html>
	<head>
		<title>Coffe</title>
		<meta name="Author" content="Chris Card">
		<style>
			.error {color: #ff0000;}
		</style>
	</head>
	<?php
		$nameErr = $drinksErr = "";
		$name = $drinks = $drink = "";
		if ($_POST) {
			$name = clean_input($_POST["name"]);
			$drinks = clean_input($_POST["drinks"]);
			$drink = clean_input($_POST["drink"]);
			if(empty($name) && !preg_match("/^[a-zA-Z]*\'?[a-zA-Z]*$/", $name)){
				$nameErr = "Customer Name Required";
			}
			if(empty($drinks) && !preg_match("/^[+]?\d+$/", $drinks)){
				$drinksErr = "I am sorry but you can't give us drinks";
			}
			if(!empty($drinksErr) && !empty($nameErr)){
				$destination="processed_form.php?name=$name&drinks=$drinks&drink=$drink";
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
	?>
	<body>
		<h1> Chris's Coffee Shop </h1>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
			Name: <input type="text" name="name" value="<?php echo $name;?>" required>
			<span class="error">* <?php echo $nameErr;?></span>
			<br>
			Drink: <input type="number" min="1" name="drinks" value="<?php echo $drinks;?>" required>
			<span class="error">* <?php echo $drinksErr?></span>
			<select name="drink" value="<?php echo $drink;?>">
				<option selected="selected">Coffee</option>
				<option>Ripple Fire Water</option>
				<option>ER espresso shot</option>
				<option>Troll snot</option>
			</select>
			<br>
			<input type="submit" name="submit" value="Submit">
		</form>
	</body>
</html>