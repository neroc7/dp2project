<!DOCTYPE html>

	<?php require_once "connection.php"; ?>


 <?php 

if(isset($_POST['addrecord']))
{
	echo $_POST['name'];
	$name = $_POST['name'];
	$sql = "INSERT INTO sales (s_id,p_id, quantity) VALUES (DEFAULT,1, $name)"; 
	if (mysqli_query($conn, $sql)) {
		echo "New record created successfully";
	} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
};
  
?>


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
						<h3 class="panel-title">Add a Sale Record</h3>
					</div>
					<div class="panel-body">
				  <form id="newrecord" method="POST" action="">
							<fieldset>
								<legend>New Sales</legend>
								<!-- product select -->
								<table class="table table-hover">
								<tr>
									<div class="form-group">
										<td>
											<label for="product" class="col-lg-2 control-label">Product</label>
											</td>
										<td>
											<div class="col-lg-10">

						 					<?php
						 						//query products to drop down list   
													$query = "select name,id from product;";
													$result = mysqli_query($conn, $query);

													 
													echo "<select name='name'>";
													while ($row = mysqli_fetch_assoc($result)) {
													    echo "<option  value='" . $row['id'] . "' id='" . $row['id'] . "'>" . $row['name'] . "</option>";
													}
													echo "</select>";
											?>
							 

											</div>
										</td>
									</div>
								</tr>
								<!-- quantity select -->
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
								</table>
								<button class="btn btn-primary" name="addrecord" id="addrecord"  type="submit">Add this Recrod</button>
								<button class="btn btn-warning" type="reset">Cancel</button>
							</fieldset>
						</form>
					</div>
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