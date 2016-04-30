<!DOCTYPE html>
<?php require_once "connection.php"; ?>
<html>
<head>
	<title>People Health Pharmacy Sales Reporting System</title>
	<link href="css/style.css" rel="stylesheet" />
	<!-- <link href="css/theme.css" rel="stylesheet" /> -->
	<script src="script/jquery.js"></script>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a href="../" class="navbar-brand">PHP-SRS</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="../">Home Page</a></li>
					<li><a href="../review.php">Sale Record</a></li>
					<li><a href="#">Stock</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<br/>
	<br/>
	<div class="container">
		<div class="page-header">
		<!-- title of the page -->
		<div class="row">
			<div class="col-md-12">
				<h1>PHP Sales Review <small>Record</small></h1>
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
								<button id="btn_record" type="button" class="btn btn-info">Record</button>
							</div>
							<div class="btn-group" role="group">
								<button id="add_record" type="button" class="btn btn-default">Statistics</button>
							</div>
						</div>
					</div>
					<!-- 	sample of table 
							****This part should be created by program (js or jquery or php), you may need to add more attribute and event to button to achieve the function -->
					<table class="table table-hover table-striped table-condensed">    
							<tr>
								<th>Order ID</th>
								<th>Date</th>
								<th>Item</th>
								<th>Cost</th>
								<th>Action</th>
							</tr>
							<tr>
								<td>1001</td>
								<td>03/01/2016 20:12</td>
								<td>Panadol *1<br/>
									Panadol Child *2</td>
								<td>$27</td>
								<td><button class="btn btn-primary btn-xs">Update</button>
									<button class="btn btn-danger btn-xs">Delete</button></td>
							</tr> 


						 					<?php
						 						   //query products to drop down list   
													$query = "select s_id,date from sales;";
													$result = mysqli_query($conn, $query);
													while ($row = mysqli_fetch_assoc($result))  {
													                   echo "<tr>";
													                   echo "<td>".$row['s_id']."</td>";
													                   echo "<td>".$row['date']."</td>"; 
													                   echo "</tr>";
													               }
 
											?>
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