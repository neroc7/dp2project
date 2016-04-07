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
							<div class="btn-group" role="group">
								<button id="btn_update_stock_item" type="button" class="btn btn-info">Update a Stock Item</button>
							</div>
						</div>
						<br/>

						<!-- form -->
						<form id="new_record">
							<fieldset>
								<legend>New information</legend>

								<div class="alert alert-success">Please fill the item name and the new information with the quantity and price. <strong>If system can't find a record matchs the item name, nothing would be changed.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>

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
												<input type="text" class="form-control" id="stockitem" placeholder="Panadol" />
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
												<input type="number" class="form-control" id="quantity" placeholder="e.g. 1 or 2" />
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
												<input type="number" class="form-control" id="price" placeholder="e.g. 14 for $14" />
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

	</script>

</body>
</html>