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

	<br/>
	<br/>
	<div class="container">
		<div class="page-header">
		<!-- title of the page -->
		<div class="row">
			<div class="col-md-12">
				<h1>PHP Stock <small>Add item quantity</small></h1>
			</div>
		</div>
	</div>

		<!-- welcome information -->
		<div class="row">
			<div class="col-md-12">
				<!-- body panel -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Add item quantity</h3>
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
							<div class="btn-group" role="group">
								<button id="btn_update_stock_item" type="button" class="btn btn-default">Update a Stock Item</button>
							</div>
						</div>
						<br/>

						<!-- form -->
						<form id="new_record">
							<fieldset>
								<legend>Add Quantity</legend>
								<div class="alert alert-success">Hint: you can use negative number to descrease the stock quantity!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
								<!-- product select -->
								<table class="table table-hover">
								<!-- quantity select -->
								<input type="hidden" name="itemid" id="itemid" />								
								<tr>
									<div class="form-group">
										<td>
											<label for="stockitem" class="col-lg-2 control-label">Item name</label>
										</td>
										<td>
											<div class="col-lg-10">
												<input type="text" class="form-control" id="stockitem" placeholder="Panadol" disabled/>
											</div>
										</td>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<td>
											<label for="quantity" class="col-lg-2 control-label">Quantity (current:100)</label>
										</td>
										<td>
											<div class="col-lg-10">
												<input type="number" class="form-control" id="quantity" placeholder="e.g. 10" />
											</div>
										</td>
									</div>
								</tr>
								</table>
								<button class="btn btn-primary" type="submit">Add quantity</button>
							</fieldset>
						</form>
					</div>
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

		$(document).ready(function(){
			var item_name = localStorage.getItem("add_item_name");
			$("#stockitem").val(item_name);
			var item_id = localStorage.getItem("add_item_id");
			$("#itemid").val(item_id);
		});


	</script>

</body>
</html>