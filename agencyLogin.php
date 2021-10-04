<?php
    include('./partials/connection.php');
	if(!$con)
		{
			die("coonection to this databse failed due to".mysql_connect_error());
		}

	if(isset($_GET['agencyLogin']) && $_GET['agencyLogin'] =='Login' ){

		$email=$_GET["email"];
		$password=$_GET["pass"];

		// table name - > customers
		$sql = "SELECT * FROM `agencies`WHERE (`agencyEmail_ID`='$email' and `agencyPassword`='$password')";
        $query = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($query);
	    $rowcount=mysqli_num_rows($query);
		if($rowcount>0){
			session_start();
			$_SESSION['username'] = $row['agencyName'];
            $_SESSION['id'] = $row['agencyID'];
            $_SESSION['userType'] = "agency";
			header('location:./agency.php');
		}
		else
		{
            //echo "<script>alert('Incorrect Username or Password.')</script>";
            header('location:./login.php');
			//echo "Error: $sql <br> $con->error";
		}
	}
?>
<html>
<head>
    <title>
        Login
    </title>
    <link rel="stylesheet" href="css/login_style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Login</h2>
                        <form method="GET" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="agencyLogin" id="agencyLogin" class="form-submit" value="Login"/>
                                <a href="index.php" class="backbtn">Home</a>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <a href="agencyRegister.php" class="signup-image-link">I am a new member</a>
                        <a href="login.php" class="signup-image-link">Customer Login</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    
</body>
</html>