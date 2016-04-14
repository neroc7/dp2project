<?php

	if (isset($_POST['id'])) {
		$id = $_POST['id'];
		require_once "settings.php";
		$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

		if (!$conn) {
			echo "fail_connect";
		} else {
			$pass = true;

			$query = "update stock set quantity = '$quantity' where id='$id';";
			$result = mysqli_query($conn, $query);
			if (!$result) {
				$pass = false;
			}

			$query = "update stock set quantity = '$quantity' where id='$id';";
			$result = mysqli_query($conn, $query);
			if (!$result) {
				$pass = false;
			}

			if ($pass) {
				echo "ok";
			} else {
				echo "fail query";
			}
		}
	}

?>