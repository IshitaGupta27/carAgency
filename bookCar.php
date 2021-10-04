<?php session_start(); ?>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link rel="stylesheet" href="css/main.css">
	<title>Book a Car</title>
</head>
<body style="background-image: url(images/about_1.jpg); background-size: cover;">
	<?php 
		include('./partials/navbar.php'); 
		include('./partials/connection.php');

		if(!$con)
		{
			die("connection to this databse failed due to".mysql_connect_error());
		}
		$sql = "SELECT * FROM `cars`";
		$query = mysqli_query($con,$sql);
		if(mysqli_num_rows($query)>0)
		{
			while($row = mysqli_fetch_assoc($query))
			{
				echo '<div class="row m-5">
      						<div class="col-md-3 col-sm-12 col-lg-3 cars_data">
				        		<span>'.$row['carModel'] .'</span><br>
								<span>'.$row['carNumber'] .'</span><br>
								<span>'.$row['carCapacity'] .'</span><br>
								<span>'.$row['carRent'] .'</span><br>
								<a class="btn btn-outline-info" href="rent.php?id='.$row['carID'].'">Rent Car</a>
				      		</div>
				    	</div>';
			}
		}
    ?>
</body>
</html>