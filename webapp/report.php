<!DOCTYPE html>
<html>
<head>
	<title>Report - People Health Pharmacy Sales Reporting System</title>
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
					<h1>PHP Report</h1>
				</div>
			</div>
		</div>

		<!-- welcome information -->
		<div class="row">
			<div class="col-md-12">
				<!-- body panel -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Sales Report</h3>
					</div>
					<div class="panel-body">
						<form class="form-inline" id="report_date_form" method="get" action="report.php">
							<div class="input-group">
								<div class="form-group">
									<label>Please select a month: </label>
								</div>
								<div class="form-group">
									<select class="form-control" name="year" id="year-select">
										<option value="2015">2015</option>
										<option value="2016">2016</option> 
										<option value="2017">2017</option>
									</select>
								</div>
								<div class="form-group">
									<select class="form-control" name="month" id="month-select">
										<option value="01">Jan</option>
										<option value="02">Feb</option>
										<option value="03">Mar</option>
										<option value="04">Apr</option>
										<option value="05">May</option>
										<option value="06">Jun</option>
										<option value="07">Jul</option>
										<option value="08">Aug</option>
										<option value="09">Sept</option>
										<option value="10">Oct</option>
										<option value="11">Nov</option>
										<option value="12">Dec</option>
									</select>
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-sm btn-primary" value="View" />
								</div>
							</div>
						</form>
					</div>
					<?php

						if (isset($_GET['year']) && isset($_GET['month'])) {
							require_once "settings.php";

							$conn = mysqli_connect($host, $user, $pwd, $sql_db);

							if (!$conn) {} else {
								$target_date = $_GET['year'] . "-" . $_GET['month'];
								$query = "SELECT s.*, p.name, p.price FROM sales s LEFT JOIN product p ON p.id=s.p_id WHERE DATE_FORMAT(FROM_UNIXTIME(s.date), '%Y-%m') = '$target_date';";

								$result = mysqli_query($conn, $query);

								if (!$result) {
									echo "no";
								} else {

									if (mysqli_num_rows($result) == 0) {
										echo "<hr/>";
										echo "<p>No records found</p>";
									} else {

										?>
										<table class="table">
										<tr>
											<th>ID</th>
											<th>Item</th>
											<th>Quantity</th>
											<th>Date</th>
											<th>Unit Price</th>
											<th>Total Cost</th>
										</tr>

										<?php

										$total_cost = 0;
										while ($row = mysqli_fetch_assoc($result)) {
											$cost = $row['price'] * $row['quantity'];
											$total_cost += $cost;
											$row_date = date("Y-m-d h:i", $row['date']);

											echo "<tr>";
											echo "<td>", $row['s_id'], "</td>";
											echo "<td>", $row['name'], "</td>";
											echo "<td>", $row['quantity'], "</td>";
											echo "<td>", $row_date, "</td>";
											echo "<td>$", $row['price'], "</td>";
											echo "<td>$", $cost, "</td>";
											echo "</tr>";
										}
										?>

										</table>
										<div class="panel-body">
											<p class="text-right"><span class="pull-left"><button class="btn btn-info btn-xs">Export to CSV</button></span><strong>Total cost: $<?php echo $total_cost; ?></strong></p>
										</div>
										<?php
									}
								}
							}
						} else {
						}

					?>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		
		// $("#sale_history").click(function(){
		// 	window.location.href="review.php";
		// });

		// $("#add_record").click(function(){
		// 	window.location.href="add.php";
		// });

		// $("#btn_check_stock").click(function(){
		// 	window.location.href="check_stock.php";
		// });

	</script>
</body>
</html>