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
				<h1>PHP Sales Review <small>Statistics</small></h1>
			</div>
		</div>
	</div>

		<!-- welcome information -->
		<div class="row">
			<div class="col-md-12">
				<!-- body panel -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Sales review</h3>
					</div>
					<div class="panel-body">
						<div class="btn-group btn-group-justified" role="group" >
							<div class="btn-group" role="group">
								<button id="btn_record" type="button" class="btn btn-default">Record</button>
							</div>
							<div class="btn-group" role="group">
								<button id="add_record" type="button" class="btn btn-info">Statistics</button>
							</div>
						</div>
					</div>
					<!-- 	sample of table 
							****This part should be created by program (js or jquery or php), you may need to add more attribute and event to button to achieve the function -->
						<table class="table table-bordered table-hover table-striped">
							<tr>
								<th>Name</th>
								<th>Percentage</th>
								<th>Sold</th>
							</tr>
							<tr>
								<td style="width: 15%">Panadol</td>
								<td style="width: 70%">
									<div class="progress">
									  <div class="progress-bar" style="width:6%"></div>
									</div>
								</td>
								<td class="text-right" style="width: 15%">1</td>
							</tr>
							<tr>
								<td style="width: 15%">Panadol Child</td>
								<td style="width: 70%">
									<div class="progress">
									  <div class="progress-bar" style="width:12%"></div>
									</div>
								</td>
								<td class="text-right" style="width: 15%">2</td>
							</tr>
							<tr>
								<td style="width: 15%">Fever Pill</td>
								<td style="width: 70%">
									<div class="progress">
									  <div class="progress-bar" style="width:18%"></div>
									</div>
								</td>
								<td class="text-right" style="width: 15%">3</td>
							</tr>
							<tr>
								<td style="width: 15%">Panamax 100</td>
								<td style="width: 70%">
									<div class="progress">
									  <div class="progress-bar" style="width:12%"></div>
									</div>
								</td>
								<td class="text-right" style="width: 15%">2</td>
							</tr>
							<tr>
								<td style="width: 15%">Sleep Pill 150</td>
								<td style="width: 70%">
									<div class="progress">
									  <div class="progress-bar" style="width:29%"></div>
									</div>
								</td>
								<td class="text-right" style="width: 15%">5</td>
							</tr>
							<tr>
								<td style="width: 15%">Bandit 25</td>
								<td style="width: 70%">
									<div class="progress">
									  <div class="progress-bar" style="width:24%"></div>
									</div>
								</td>
								<td class="text-right" style="width: 15%">4</td>
							</tr>
						</table>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		
		$("#btn_record").click(function(){
			window.location.href="../review.php";
		});

		$("#add_record").click(function(){
			window.location.href="../statistics.php";
		});

	</script>
</body>
</html>