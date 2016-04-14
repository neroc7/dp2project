<!DOCTYPE html>
<html>
<head>
	<title>People Health Pharmacy Sales Reporting System</title>
	<link href="css/style.css" rel="stylesheet" />
	<!-- <link href="css/theme.css" rel="stylesheet" /> -->
	<script src="script/jquery.js"></script>
	<script src="script/bs.js"></script>
</head>
<body>
	<?php require "nav.php"; ?>

	<br/>
	<br/>
	<div class="container">
		<div class="page-header">
		<!-- title of the page -->
		<div class="row">
			<div class="col-md-12">
				<h1>PHP Stock Review <small>Record</small></h1>
			</div>
		</div>
	</div>

		<!-- welcome information -->
		<div class="row">
			<div class="col-md-12">
				<!-- body panel -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Stock review</h3>
					</div>
					<div class="panel-body">
						<div class="btn-group btn-group-justified" role="group" >
							<div class="btn-group" role="group">
								<button id="btn_stock_review" type="button" class="btn btn-info">Stock Review</button>
							</div>
							<div class="btn-group" role="group">
								<button id="btn_add_stock_item" type="button" class="btn btn-default">Add a Stock Item</button>
							</div>
							<div class="btn-group" role="group">
								<button id="btn_update_stock_item" type="button" class="btn btn-default">Update a Stock Item</button>
							</div>
						</div>
					</div>
					<!-- 	sample of table 
							****This part should be created by program (js or jquery or php), you may need to add more attribute and event to button to achieve the function -->
					<table class="table table-hover table-striped table-condensed">
						<tr>
							<th>Item ID</th>
							<th style="width:60%;">Item Name</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Action</th>
						</tr>
						<?php 

							require_once "settings.php";
							$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
							
							if (!$conn) {
								echo "<p>Database connection failure</p>";
							} else {
								$query = "SELECT p.id, p.name, p.price, s.quantity FROM product p LEFT JOIN stock s ON p.id = s.id ORDER BY p.id;";
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
										?>

										<td><button class="btn btn-success btn-xs" onclick="add_quantity(<?php echo "'$item_name', $item_id";?>);">Add Quantity</button>
											<button class="btn btn-primary btn-xs">Update</button>
											<button id=<?php echo "'btn_delete_$item_id'";?> class="btn btn-danger btn-xs" onclick="delete_item(<?php echo "'$item_id'";?>)" data-toggle="modal" data-target="#myModal">Delete</button></td>

										<?php
										echo "</tr>";
									}
								}

								mysqli_free_result($result);
							}

							mysqli_close($conn);

						?>
						
					</table>
					<!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">Delete the Item</h4>
					      </div>
					      <div class="modal-body">
					        <p id="delete_text">Are you sure to delete this item? All related stock information and sales records would delete too!!!</p>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        <button id="btn_delete_confirm" type="button" class="btn btn-danger" onclick="delete_confirmed();">Delete!</button>
					      </div>
					    </div>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">

		var delete_item_id = 0;
		
		$("#btn_stock_review").click(function(){
			window.location.href="../check_stock.php";
		});

		$("#btn_add_stock_item").click(function(){
			window.location.href="../add_stock_item.php";
		});

		$("#btn_update_stock_item").click(function(){
			window.location.href="../update_stock_item.php";
		});

		function add_quantity(item_name, item_id) {
			localStorage.setItem("add_item_name", item_name);
			localStorage.setItem("add_item_id", item_id);			
			window.location.href="../add_stock_item_quantity.php";
		}

		function delete_item(item_id) {
			delete_stock_item = item_id;
		}

		function delete_confirmed() {
			$.post("delete_stock_item.php", {id: delete_stock_item}, function(data) {
				if (data == "ok") {
					location.reload();
				}
			});
		}

	</script>
</body>
</html>