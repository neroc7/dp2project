<!DOCTYPE html>

<html>

<head>

	<title>People Health Pharmacy Sales Reporting System</title>

	<link href="css/style.css" rel="stylesheet" />

	<!-- <link href="css/theme.css" rel="stylesheet" /> -->

	<script src="script/jquery.js"></script>
	<script src="script/bs.js"></script>
	<script src="script/add_stock_item_validation.js"></script>


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
				<h1>PHP Stock <small>Add a new item</small></h1>
			</div>
		</div>
	</div>

		<!-- welcome information -->
		<div class="row">
			<div class="col-md-12">
				<!-- body panel -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Add a Stock Item</h3>
					</div>
					<div class="panel-body">
						<!-- nav -->
						<div class="btn-group btn-group-justified" role="group" >
							<div class="btn-group" role="group">
								<button id="btn_stock_review" type="button" class="btn btn-default">Stock Review</button>
							</div>
							<div class="btn-group" role="group">
								<button id="btn_add_stock_item" type="button" class="btn btn-info">Add a Stock Item</button>
							</div>
						</div>
						<br/>

						<!-- form -->
						<form id="new_record" method="post" action="addsi_process.php">
							<fieldset>
								<legend>New Stock Item</legend>
								<div class="alert alert-success">Please fill the item name and price in the table, after you added the record, you can <strong>add the quantity in the stock review.</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
								<!-- product select -->
								<table class="table table-hover">
								<!-- quantity select -->
								<tr>
									<div class="form-group">
										<td>
											<label for="stockitem" class="col-lg-2 control-label">Stock item</label>
										</td>
										<td>
											<div class="col-lg-10">
												<input type="text" class="form-control" name="stockitem" id="stockitem" placeholder="Panadol" />
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
												<input type="text" class="form-control" id="price" name="price" placeholder="e.g. enter 14 for $14" />
											</div>
										</td>
									</div>
								</tr>
								</table>
								<button class="btn btn-primary" type="submit">Add Stock item</button>
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