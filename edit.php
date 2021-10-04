<?php 
	include('./partials/connection.php');
	if(!$con)
	{
		die("coonection to this databse failed due to".mysql_connect_error());
	}
	$id = $_GET['id'];
	$sql = "SELECT * FROM `cars` WHERE(`carID`='$id')";
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	if(isset($_GET['Submit']) && $_GET['Submit']=='Done')
	{
		$model=$_GET["model"];
		$number=$_GET["number"];
		$capacity=$_GET["capacity"];
		$rent=$_GET["rent"];

		$sql = "UPDATE `cars` SET `carModel`='$model',`carNumber`='$number', `carCapacity`='$capacity',`carRent`='$rent' WHERE `carID`='$id'";
		$query = mysqli_query($con,$sql);
		if($query)
		{
            header('location:./agency.php');
        }
        else
        {
            echo "Error: $sql <br> $con->error";
        }
	}
?>
<html>
<head>
	<title>
		Edit Car Information
	</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body class="bg-danger">
	<div class="container-fluid py-5">
		<div class="container bg-light p-5">
			<h1>Edit Information</h1>
			<br>
			<form method="GET">
				<div class="mb-3 row">
				    <label for="model" class="col-sm-2 col-form-label">Car Model : </label>
				    <div class="col-sm-3">
				      <input type="text" class="form-control-plaintext" id="model" value="<?php echo $row['carModel'] ?>">
				    </div>
				</div>
				<div class="mb-3 row">
				    <label for="number" class="col-sm-2 col-form-label">Car Number : </label>
				    <div class="col-sm-3">
				      <input type="text" class="form-control-plaintext" id="number" value="<?php echo $row['carNumber'] ?>">
				    </div>
				</div>
				<div class="mb-3 row">
				    <label for="capacity" class="col-sm-2 col-form-label">Car Capacity : </label>
				    <div class="col-sm-3">
				      <input type="text" class="form-control-plaintext" id="capacity" value="<?php echo $row['carCapacity'] ?>">
				    </div>
				</div>
				<div class="mb-3 row">
				    <label for="rent" class="col-sm-2 col-form-label">Car Rent : </label>
				    <div class="col-sm-3">
				      <input type="text" class="form-control-plaintext" id="rent" value="<?php echo $row['carRent'] ?>">
				    </div>
				</div>
				<div class="d-grid gap-3 d-md-flex justify-content-md-end">
					<a class="btn btn-outline-danger" href="agency.php">Discard</a>
					<button class="btn btn-outline-info" type="submit" name="Submit" id="Submit" value="Done">Done</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>