<?php 
	session_start();
	include('./partials/connection.php');
	if(!$con)
		{
			die("coonection to this databse failed due to".mysql_connect_error());
		}
	if(isset($_GET['Submit']) && $_GET['Submit'] =='Add Car' )
	{

		$model=$_GET["model"];
		$number=$_GET["number"];
		$capacity=$_GET["capacity"];
		$rent=$_GET["rent"];
		$agen_id = $_SESSION['id'];

		$sql = "SELECT `carNumber` from `cars` where `carNumber`='$number'";
        $result = $con->query($sql);
        if(mysqli_num_rows($result)==0)
        {
			// table name - > cars
            $sql = "INSERT INTO `cars`(`carModel`,`carNumber`,`carCapacity`,`carRent`,`agencyID`) VALUES ('$model','$number','$capacity','$rent','$agen_id')";

            if($con->query($sql)){
                header('location:./agency.php');
            }
            else
            {
                echo "Error: $sql <br> $con->error";
            }
        }
        else
        {
            echo "Car already exists";
        }
	}
?>
<html>
<head>
	<title>
		Add New Car
	</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body class="bg-danger">
	<div class="container-fluid py-5">
		<div class="container bg-light p-5">
			<h1>Add New Car</h1>
			<p>Please provide relevant information about the car</p>
			<br>
			<form method="GET">
				<div class="mb-3 row">
				    <label for="name" class="col-sm-2 col-form-label">Agency Name : </label>
				    <div class="col-sm-3">
				      <input type="text" readonly class="form-control-plaintext" id="name" value="<?php echo $_SESSION['username'] ?>">
				    </div>
				</div>
				<div class="mb-3 row">
				   	<label for="model" class="col-sm-2 col-form-label">Vehicle Model : </label>
				    <div class="col-sm-3">
				      <input type="text" class="form-control" id="model" name="model" placeholder="Maruti Suzuki Swift Dzire">
				    </div>
				</div>
				<div class="mb-3 row">
				    <label for="number" class="col-sm-2 col-form-label">Vehicle Number : </label>
				    <div class="col-sm-3">
				      <input type="text" class="form-control" id="number" name="number" placeholder="DL12AC6598">
				    </div>
				</div>
				<div class="mb-3 row">
				    <label for="capacity" class="col-sm-2 col-form-label">Seating capacity : </label>
				    <div class="col-sm-3">
				      <input type="number" class="form-control" id="capacity" name="capacity" placeholder="5">
				    </div>
				</div>
				<div class="mb-3 row">
				    <label for="rent" class="col-sm-2 col-form-label">Rent per day : </label>
				    <div class="col-sm-3">
				      <input type="text" class="form-control" id="rent" name="rent" placeholder="5000">
				    </div>
				</div>
				<div class="d-grid gap-3 d-md-flex justify-content-md-end">
					<a class="btn btn-outline-danger" href="agency.php">Discard</a>
					<button class="btn btn-outline-info" type="submit" name="Submit" id="Submit" value="Add Car">Add Car</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>