<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="description" content="Program"/>
<meta name="keywords" content="PHP"/>
<meta name="author" content="WoiChongLim"/>
<title>  SHS</title>

</head>

<body>

<?php
/*conection to sql*/

// $stockitem =$_POST["stockitem"];
// $price =$_POST["price"];
// /*special input validation*/
// if(isset($_POST["stockitem"])){
// 	$stockitem = $_POST["stockitem"];
// 	$stockitem = sanitise_input($stockitem);
// }


// if(isset($_POST["price"])){
// 	$quantity = $_POST["price"];
// 	$quantity = sanitise_input($quantity);
// }

// /*function to check special chars*/
// function sanitise_input($data){
// 	$data = trim($data);
// 	$data = stripslashes($data);
// 	$data = htmlspecialchars($data);
// 	return $data;
// }

// $errMsg = "";

// 	if($errMsg != ""){
// 		echo "<p>$errMsg</p>";
// 	}else {
// 		echo '<p>item is add</p>'
// 	}

require_once ("settings.php");
$conn = @mysqli_connect($host, $user, $pwd, $sql_db );

$stockitem =$_POST["stockitem"];
$price =$_POST["price"];

if (!$conn) {
     echo "<p>Database connection failure</p>";
} else {


 	$query = "insert into product (name, price) values ('$stockitem','$price')";
	$result = mysqli_query($conn, $query);
		if(!$result) {
	     echo "<p>Something is wrong with ", $query, "</p>";
		} else {
   		   echo "<p>$stockitem had add into database  </p>";
   		}

	mysqli_close($conn); 
}
	
?>

</body>

</html>
