<!DOCTYPE html>
<?php require_once "connection.php"; ?>

  
<html>
<head>
	<title>People Health Pharmacy Sales Reporting System</title>
	<link href="css/style.css" rel="stylesheet" />
	<!-- <link href="css/theme.css" rel="stylesheet" /> -->
	<script src="script/jquery.js"></script>
	<script src="script/popup.js"></script>
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/ui-darkness/jquery-ui.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>

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
		 


						 					<?php 
						 						   //query products to drop down list   
													$query = "SELECT a.s_id, a.date, b.name,b.price FROM sales a, product b where a.p_id = b.id";
													$result = mysqli_query($conn, $query);
													while ($row = mysqli_fetch_assoc($result))  {
													                   echo "<tr>";
													                   echo "<td>".$row['s_id']."</td>";
													                   echo "<td>".gmdate("Y-m-d H:i:s", $row['date'])."</td>"; 
													                   echo "<td>".$row['name']."</td>"; 
													                   echo "<td>"."$" . $row['price']."</td>"; 
													                   echo "<td><button id="."update"." class=btn btn-primary btn-xs".">Update</button>
									<button id="."delete"." class="."btn btn-danger btn-xs".">Delete</button></td>
							</tr> "; 
													               }
 
											?>
						</table>
				</div>
			</div>
		</div>
	</div>

 
<div class="container">
	<div class="main">
	<div id="dialog" title="Update Form">
		<form action="" method="post"> 
		<label>Cost:</label>
		<input style="color:blue" id="costValue" name="costValue" type="text">
		<input  class="btn btn-danger btn-xs" id="newcost" name="newcost" type="submit" value="Submit">
	</form>
</div> 

	<script type="text/javascript">
		$("#update").click(function(){
			var saleId = $('td:first', $(this).parents('tr')).text();
				

			alert(saleId)

			$.ajax({ url: 'http://localhost/dp2project-master/webapp/updateSaleItem.php',
	         data: {action:'update', saleId:saleId},
	         type: 'POST',
	         dataType:'JSON', 
	         success: function(output) {
	                      alert(output);
	                  }
			}); 

		});

		$("#delete").click(function(){
			var saleId = $('td:first', $(this).parents('tr')).text();
			alert(saleId)

			$.ajax({ url: 'http://localhost/dp2project-master/webapp/updateSaleItem.php',
	         data: {action:'delete', saleId:saleId},
	         type: 'POST',
	         dataType:'JSON', 
	         success: function(output) {
	                      alert(output);
	                  }
			}); 
 
		});	


		$("#btn_record").click(function(){
			window.location.href="../review.php";
		});

		$("#add_record").click(function(){
			window.location.href="../statistics.php";
		});

	</script>
</body>
</html>