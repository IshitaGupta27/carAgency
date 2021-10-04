<?php
    include('./partials/connection.php');
	if(!$con)
		{
			die("coonection to this databse failed due to".mysql_connect_error());
		}

	if(isset($_GET['agencySignup']) && $_GET['agencySignup'] =='Register' ){

		$name=$_GET["name"];
		$address=$_GET["address"];
		$phoneNo=$_GET["phoneNo"];
		$email=$_GET["email"];
		$password=$_GET["pass"];

        $sql = "SELECT `agencyEmail_ID` from `agencies` where `agencyEmail_ID`='$email'";
        $result = $con->query($sql);
        if(mysqli_num_rows($result)==0)
        {
		    // table name - > customers
            $sql = "INSERT INTO `agencies`(`agencyName`,`agencyAddress`,`agencyPhoneNo`,`agencyEmail_ID`,`agencyPassword`) VALUES ('$name','$address','$phoneNo','$email','$password')";

            if($con->query($sql)==true){
                header('location:./agencyLogin.php');
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
                        <!-- action="./php/register.php" -->
                            <div class="form-group">
                                <label for="name">Name : </label>
                                <input type="text" name="name" id="name" required />
                            </div>
                            <div class="form-group">
                                <label for="address">Address : </label>
                                <input type="text" name="address" id="address" required />
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
                            <!-- <div class="form-group">
                                <label for="dob"></label>
                                <input type="date" id="dob" class = "dob" name="dob" required />
                            </div>
                            <div class="form-group">
                                <input type="radio" name="radiogen" id="radiogen" class="radiogen" value="Male"/>
                                <label for="radiogen" class="label-radiogen"><span><span></span></span>Male </label>
                                <input type="radio" name="radiogen" id="radiogen" value="Female" class="radiogen" />
                                <label for="radiogen" class="label-radiogen"><span><span></span></span>Female </label>
                                <input type="radio" name="radiogen" id="radiogen" class="radiogen" value="Transgender" />
                                <label for="radiogen" class="label-radiogen"><span><span></span></span>Transgender</label>
                            </div>           -->
                            <div class="form-group form-button">
                                <button type="submit" name="agencySignup" id="agencySignup" class="form-submit" value="Register"> Register </button>
                                <a href="index.php" class="backbtn">Home</a>
                            </div>
                        </form>
                    </div>
                    <!-- <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.html" class="signup-image-link">I am already a member</a>
                    </div> -->
                </div>
            </div>
        </section>
    </div>    
</body>
</html>