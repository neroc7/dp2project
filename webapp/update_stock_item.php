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

	<?php require_once "nav.php"; ?>
	<?php

		$load = false;
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			require_once "settings.php";
			$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

			if (!$conn) {} else {
				$query  = "SELECT p.id, p.name, p.price, s.quantity FROM product p LEFT JOIN stock s ON p.id = s.id WHERE p.id=$id;";
				$result = mysqli_query($conn, $query);

				if (!$result) {} else {
					$row_number = mysqli_num_rows($result);
					if ($row_number > 0) {
						$load = true;
						$row = mysqli_fetch_assoc($result);
						$item_name = $row['name'];
						$item_price = $row['price'];
						$item_quantity = $row['quantity'];
					}
				}
			}
		} else {
			echo "<p>Access denied</p>";
			die();
		}
	?>

	<br/>
	<br/>
	<div class="container">
		<div class="page-header">
		<!-- title of the page -->
		<div class="row">
			<div class="col-md-12">
				<h1>PHP Stock <small>Update a stock item</small></h1>
			</div>
		</div>
	</div>

		<!-- welcome information -->
		<div class="row">
			<div class="col-md-12">
				<!-- body panel -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Update a stock item</h3>
					</div>
					<div class="panel-body">
						<!-- nav -->
						<div class="btn-group btn-group-justified" role="group" >
							<div class="btn-group" role="group">
								<button id="btn_stock_review" type="button" class="btn btn-default">Stock Review</button>
							</div>
							<div class="btn-group" role="group">
								<button id="btn_add_stock_item" type="button" class="btn btn-default">Add a Stock Item</button>
							</div>
						</div>
						<br/>

						<!-- form -->
						<form id="new_record">
							<fieldset>
								<legend>You are editing the information of [<?php echo $item_name;?>]</legend>

								<div class="alert alert-success">Please fill the item name and the new information with the quantity and price. <strong>If system can't find a record matchs the item name, nothing would be changed.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>

								<input type="hidden" id="item_id" value="<?php if($load){echo $id;}else{echo -10;}?>" />

								<!-- product select -->
								<table class="table table-hover">
								<!-- quantity select -->
								<tr>
									<div class="form-group">
										<td>
											<label for="stockitem" class="col-lg-2 control-label">Item name</label>
										</td>
										<td>
											<div class="col-lg-10">
												<input type="text" class="form-control" id="stockitem" placeholder="Panadol" value="<?php if($load){echo $item_name;}?>"/>
											</div>
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label for="quantity" class="col-lg-2 control-label">Quantity</label>
										</td>
										<td>
											<div class="col-lg-10">
												<input type="number" class="form-control" id="quantity" placeholder="e.g. 1 or 2" value="<?php if($load){echo $item_quantity;}?>"/>
											</div>
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label for="price" class="col-lg-2 control-label">Price</label>
										</td>
										<td>
											<div class="col-lg-10">
												<input type="number" class="form-control" id="price" placeholder="e.g. 14 for $14" value="<?php if($load){echo $item_price;}?>"/>
											</div>
										</td>
									</div>
								</tr>
								</table>
								<button class="btn btn-primary" type="submit">Update Stock item</button>
								<button class="btn btn-warning" type="reset">Cancel</button>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
	        		<button id="btn_modal_close_title" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        		<h4 class="modal-title" id="myModalLabel">Update the Item Information?</h4>
	      		</div>
	      		<div class="modal-body">
	        		<p id="delete_text">Click Update to update the item information. Or you can press cancel  to close this panel.</p>
	      		</div>
	      		<div class="modal-footer">
	        		<button id="btn_modal_close" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        		<button id="btn_update_confirm" type="button" class="btn btn-primary">Update!</button>
	      		</div>
	    	</div>
	  	</div>
	</div>

	<script type="text/javascript">

		$("#btn_stock_review").click(function(){
			window.location.href="../check_stock.php";
		});

		$("#btn_add_stock_item").click(function(){
			window.location.href="../add_stock_item.php";
		});

		$("#btn_update_stock_item").click(function(){
			window.location.href="../update_stock_item.php";
		});

		$("#new_record").submit(function (e) {
			e.preventDefault();
			$('#myModal').modal({
			  backdrop: 'static',
			  keyboard: false
			});
		});

		$('#btn_update_confirm').click(function() {
			$('#btn_update_confirm').html("Updating...");
			disable_modal_button();

			var item_id = $('#item_id').val();
			var item_name = $('#stockitem').val();
			var item_quantity = $('#quantity').val();
			var item_price = $('#price').val();

			if (item_id != -10) {
				$.post("update_stock_item_ajax.php", {id: item_id, quantity: item_quantity, price:item_price, name: item_name}, function (data) {
					if (data == "ok") {
						window.location.href="../check_stock.php";
					} else if (data == "database_fail") {
						alert("database connection failed");
						location.reload();
					} else {
						alert("unknown error: " + data);
						location.reload();
					}
				});
			}
		});

		function disable_modal_button() {
			$('#btn_modal_close_title').prop("disabled", true);
			$('#btn_update_confirm').prop("disabled", true);
			$('#btn_modal_close').prop("disabled", true);
		}

	</script>

</body>
</html>