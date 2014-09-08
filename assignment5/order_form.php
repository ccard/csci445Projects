<!DOCTYPE html>
<html>
	<head>
		<title>Coffee</title>
		<meta name="Author" content="Chris Card">
		<style>
			.error {color: #ff0000;}
		</style>
	</head>
	<?php
		$nameErr = $drinksErr = "";
		$name = $drinks = $drink = "";
		$price = 0.0;
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$name = clean_input($_POST["name"]);
			$drinks = clean_input($_POST["drinks"]);
			$drink = clean_input($_POST["drink"]);
			if(empty($name) || !preg_match("/^[a-zA-Z ]*\'?[a-zA-Z ]*$/", $name)){
				$nameErr = "Only letters, whitespace and ' allowed";
			} else {
				$nameErr = "";
			}
			if(empty($drinks) || !preg_match("/^[+]?\d+$/", $drinks)){
				$drinksErr = "I am sorry but you can't give us drinks";
			} else {
				$drinksErr = "";
			}

			switch ($drink) {
				case 'Coffe':
					$price = 3.30;
					break;
				case 'Ripple Fire Water':
					$price = 4.50;
					break;
				case 'ER espresso shot':
					$price = 6.50;
					break;
				case 'Troll snot':
					$price = 0.5;
					break;
				default:
					$price = 0.1;
					break;
			}

			if($drinksErr == "" && $nameErr == ""){
				$drinksErr="working";
				$destination = "processed_form.php?name=$name&drink=$drink&drinks=$drinks&price=$price";
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
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			Name: <input type="text" name="name" value="<?php echo $name;?>" required>
			<span class="error">* <?php echo $nameErr;?></span>
			<br><br>
			Drink: <input type="number" min="1" name="drinks" value="<?php echo $drinks;?>" required>
			<span class="error">* <?php echo $drinksErr?></span>
			<select name="drink" value="<?php echo $drink;?>">
				<option>Coffee</option>
				<option>Ripple Fire Water</option>
				<option>ER espresso shot</option>
				<option>Troll snot</option>
			</select>
			<br>
			<input type="submit" name="submit" value="Submit">
		</form>
	</body>
</html>