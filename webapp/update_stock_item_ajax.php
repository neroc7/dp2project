<?php

	if (isset($_POST['quantity']) && isset($_POST['price']) && isset($_POST['name'])) {

		require_once "settings.php";

		$quantity = $_POST['quantity'];
		$price = $_POST['price'];
		$name = $_POST['name'];
		$conn = @mysqli_connect($host, $user, $pwd, $sql_db);


		if (isset($_POST['id'])) {
			$id = $_POST['id'];

			if (!$conn) {
				echo "database_fail";
			} else {

				$query = "UPDATE product SET price = '$price', name='$name' WHERE id = '$id';";
				$result = mysqli_query($conn, $query);

				if (!$result) {
					echo "database_fail";
					die();
				}

				$query = "INSERT INTO stock (id, quantity) VALUES ($id, $quantity) ON DUPLICATE KEY UPDATE quantity=VALUES(quantity)";
				$result = mysqli_query($conn, $query);

				if (!$result) {
					echo "database_fail";
				}

				echo "ok";
			}
		}
	} else {
		echo "no!";
	}

?>