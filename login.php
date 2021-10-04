<?php
    include('./partials/connection.php');
	if(!$con)
		{
			die("connection to this databse failed due to".mysql_connect_error());
		}

	if(isset($_GET['login']) && $_GET['login'] =='Login' )
    {
		$email=$_GET["email"];
		$password=$_GET["pass"];

		// table name - > customers
		$sql = "SELECT * FROM `customers`WHERE (`Email_ID`='$email' and `Password`='$password')";
        $query = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($query);
	    $rowcount=mysqli_num_rows($query);
		if($rowcount>0){
			session_start();
			$_SESSION['username'] = $row['Name'];
            $_SESSION['userType'] = "customer";
            $_SESSION['id'] = $row['custID'];
			header('location:./index.php');
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
                                <input type="submit" name="login" id="login" class="form-submit" value="Login"/>
                                <a href="index.php" class="backbtn">Home</a>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <a href="register.php" class="signup-image-link">I am a new member</a>
                        <a href="agencyLogin.php" class="signup-image-link">Agency Login</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    
</body>
</html>