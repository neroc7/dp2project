<?php
	
	$conn = mysqli_connect("pingchengtech.com", "dp2user", "dp2user", "dp2");

	if (!$conn) {
		echo "<p>fail</p>";
	} else {
		echo "<p>ok</p>";
	}

	$query = "select * from product;";
	$result = mysqli_query($conn, $query);

	if (!$result) {
		echo "<p>query failed</p>";
	} else {
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<p>ID: " . $row['id'];
			echo "\nname: " . $row['name'];
			echo "\nprice: $" .$row['price'] . "</p>";
		}
	}
?>