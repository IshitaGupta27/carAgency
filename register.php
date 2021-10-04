<?php
    include('./partials/connection.php');
	if(!$con)
		{
			die("coonection to this databse failed due to".mysql_connect_error());
		}

	if(isset($_GET['signup']) && $_GET['signup'] =='Register' ){

		$name=$_GET["name"];
		$phoneNo=$_GET["phoneNo"];
		$email=$_GET["email"];
		$password=$_GET["pass"];

        $sql = "SELECT `Email_ID` from `customers` where `Email_ID`='$email'";
        $result = $con->query($sql);
        if(mysqli_num_rows($result)==0)
        {
		    // table name - > customers
            $sql = "INSERT INTO `customers`(`Name`,`PhoneNo`,`Email_ID`,`Password`) VALUES ('$name','$phoneNo','$email','$password')";

            if($con->query($sql)==true){
                header('location:./login.php');
            }
            else
            {
                echo "Error: $sql <br> $con->error";
            }
        }
        else
        {
            echo "User already exists";
        }
	}
?>
<html>
<head>
    <link rel="stylesheet" href="css/login_style.css">
</head>
<body>
    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="GET" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name">Name : </label>
                                <input type="text" name="name" id="name" required />
                            </div>
                            <div class="form-group">
                                <label for="phoneNo">Phone No : </label>
                                <input type="text" name="phoneNo" id="phoneNo" required />
                            </div>
                            <div class="form-group">
                                <label for="email">Email ID : </label>
                                <input type="text" name="email" id="email" required />
                            </div>
                            <div class="form-group">
                                <label for="pass">Password : </label>
                                <input type="password" name="pass" id="pass" required />
                            </div>
                            <div class="form-group form-button">
                                <button type="submit" name="signup" id="signup" class="form-submit" value="Register"> Register </button>
                                <a href="index.php" class="backbtn">Home</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>    
</body>
</html>