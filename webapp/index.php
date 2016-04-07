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