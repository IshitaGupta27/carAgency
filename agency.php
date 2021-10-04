<?php 
    session_start(); 
    include('./partials/navbar.php');
    include('./partials/connection.php');
?>
<html>
<head>
    <title>
        Agency
    </title>
    <link rel="stylesheet" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body class="bg-danger">
    <div class="row m-5">
    <?php 
        if(!$con)
        {
            die("connection to this databse failed due to".mysql_connect_error());
        }
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM `cars` WHERE `agencyID`='$id'";
        $query = mysqli_query($con,$sql);
        if(mysqli_num_rows($query)>0)
        {
            while($row = mysqli_fetch_assoc($query))
            {
                echo '  
                            <div class="col-md-3 col-sm-12 col-lg-3 cars_data">
                                <span>'.$row['carModel'] .'</span><br>
                                <span>'.$row['carNumber'] .'</span><br>
                                <span>'.$row['carCapacity'] .'</span><br>
                                <span>'.$row['carRent'] .'</span><br>
                                <a class="btn btn-outline-info" href="edit.php?id='.$row['carID'].'">Edit</a>
                            </div>
                       ';
            }
        }
    ?>
     </div>
</body>
</html>