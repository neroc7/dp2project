<?php

	if (isset($_POST['itemid'])) {
		echo "<p>yes</p>";
		$id = $_POST['itemid'];
		$quantity =$_POST['quantity'];
		require_once "settings.php";
		$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

		echo "id = $itemid";
		echo "quantity = $quantity";
		if (!$conn) {
			echo "fail_connect";
		} else {
			$pass = true;

			$query = "update orders set quantity = '$quantity' where id= $id;";
			$result = mysqli_query($conn, $query);
			if (!$result) {
				$pass = false;
			}

	
			}

			if ($pass) {
				echo "ok";
			} else {
				echo "fail query";
			}
		}
	 else {
		echo "<p>no</p>";
	}

	echo "<p>go</p>";
?>