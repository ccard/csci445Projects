<!DOCTYPE html>
<html>
<head>
	<meta name="Author" value="Chris Card">
	<title>Your order</title>
</head>

<?php
	$name = $drinks = $drink = "";
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		$name = clean_input($_GET["name"]);
		$drinks = clean_input($_GET["drinks"]);
		$drink = clean_input($_GET["drink"]);
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
	<p> Thank you for visiting Chris's Coffe shop. Since you odered 
	<?php echo $drink;?> you <?php if($drink == "ER espresso shot"){
		echo " may want to call 911 and please take your crazy reaction else where.";}
		else{ echo " will be awake for awhile.";}?></p>
</body>
</html>