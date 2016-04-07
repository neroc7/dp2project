<!DOCTYPE html>
<html>
<head>
	<title>People Health Pharmacy Sales Reporting System</title>
	<link href="css/style.css" rel="stylesheet" />
	<!-- <link href="css/theme.css" rel="stylesheet" /> -->
	<script src="script/jquery.js"></script>
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
						<tr>
							<td>1</td>
							<td>Panadol</td>
							<td>$5.99</td>
							<td>120</td>
							<td><button class="btn btn-success btn-xs" onclick="add_quantity('Panadol');">Add Quantity</button>
								<button class="btn btn-primary btn-xs">Update</button>
								<button class="btn btn-danger btn-xs">Delete</button></td>
						</tr>
						<tr>
							<td>2</td>
							<td>Sleep Pill</td>
							<td>$34.99</td>
							<td>70</td>
							<td><button class="btn btn-success btn-xs" onclick="add_quantity('Sleep Pill');">Add Quantity</button>
								<button class="btn btn-primary btn-xs">Update</button>
								<button class="btn btn-danger btn-xs">Delete</button></td>
						</tr>
						<tr>
							<td>3</td>
							<td>Fever Relif</td>
							<td>$14.99</td>
							<td>50</td>
							<td><button class="btn btn-success btn-xs" onclick="add_quantity('Fever Relif');">Add Quantity</button>
								<button class="btn btn-primary btn-xs">Update</button>
								<button class="btn btn-danger btn-xs">Delete</button></td>
						</tr>
					</table>
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

		function add_quantity(item_name) {
			localStorage.setItem("add_item_name", item_name);
			window.location.href="../add_stock_item_quantity.php";
		}

	</script>
</body>
</html>