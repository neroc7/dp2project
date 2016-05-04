<!DOCTYPE html>
<html>
<head>
	<title>People Health Pharmacy Sales Reporting System</title>
	<link href="css/style.css" rel="stylesheet" />
	<!-- <link href="css/theme.css" rel="stylesheet" /> -->
	<script src="script/jquery.js"></script>
</head>
<body>
	<?php require_once "nav.php"; ?>

	<br/>
	<br/>
	<div class="container">
		<!-- title of the page -->
		<div class="page-header">
			<div class="row">
				<div class="col-md-12">
					<h1>PHP Sales Reporting System</h1>
				</div>
			</div>
		</div>

		<!-- welcome information -->
		<div class="row">
			<div class="col-md-12">
				<!-- body panel -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Control Panel<small> v0.01</small></h3>
					</div>
					<div class="panel-body">
						<p>Quick Link: </p>
						<div class="btn-group btn-group-justified" role="group" >
							<div class="btn-group" role="group">
								<button id="sale_history" type="button" class="btn btn-default">Sale History</button>
							</div>
							<div class="btn-group" role="group">
								<button id="add_record" type="button" class="btn btn-default">Add a sale record</button>
							</div>
							<div class="btn-group" role="group">
								<button id="btn_check_stock" type="button" class="btn btn-default">Check Stock</button>
							</div>
						</div>
						<br/><p><strong>Sale History: </strong>Review the sale history by listing, you also can update a record, or delete a record.<br/><br/><strong>Add a sale record: </strong>Adding a sale record to the database.</p>



					</div>
				</div>
			</div>
		</div>

	</div>
						<?php 

							require_once "settings.php";
							$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
							
							if (!$conn) {
								echo "<p>Database connection failure</p>";
							} else {
								$query = "SELECT p.id, p.name, p.price, s.quantity FROM product p LEFT JOIN stock s ON p.id = s.id where s.quantity < 10 ORDER BY p.id;";
								$result = mysqli_query($conn, $query);

								if (!$result) {
									echo "<p>Qeury failed: " + $result + "</p>";
								} else {
									while ($row = mysqli_fetch_assoc($result)) {

										if ($row['quantity'] == null) {
											$row['quantity'] = 0;
										}
										$item_id = $row['id'];
										$item_name = $row['name'];

										echo "<tr>";
										echo "<td>", $row['id'], "</td>";
										echo "<td>", $row['name'],"</td>";
										echo "<td>", $row['price'],"</td>";
										echo "<td>", $row['quantity'],"</td>";
										echo "</tr>";

									}
								}

								mysqli_free_result($result);
							}

							mysqli_close($conn);

						?>

	<script type="text/javascript">
		
		$("#sale_history").click(function(){
			window.location.href="review.php";
		});

		$("#add_record").click(function(){
			window.location.href="add.php";
		});

		$("#btn_check_stock").click(function(){
			window.location.href="check_stock.php";
		});

	</script>
</body>
</html>