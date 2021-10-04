<nav class="navbar bg-light px-5">
    Car Rental Agency
    <?php 
    if(isset($_SESSION['username']))
    {
    	if(isset($_SESSION['userType']) && $_SESSION['userType']=='agency')
    	{
    		echo '	<ul class="nav">
    					<li class="nav-item nav-link">Welcome, '.$_SESSION['username'].'</li>
	        			<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
					    <li class="nav-item"><a href="addCars.php" class="nav-link">Add a Car</a></li>
					    <li class="nav-item"><a href="./partials/logout.php" class="nav-link">Logout</a></li>
			    	</ul>';
    	}
    	else
    	{
    		echo '	<ul class="nav">
    					<li class="nav-item nav-link">Welcome, '.$_SESSION['username'].'</li>
	        			<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
						<li class="nav-item"><a href="bookCar.php" class="nav-link">Book a Car</a></li>
					    <li class="nav-item"><a href="./partials/logout.php" class="nav-link">Logout</a></li>
			    	</ul>';
    	}
    }
    else
    {
    	echo '	<ul class="nav">
	        			<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
						<li class="nav-item"><a href="bookCar.php" class="nav-link">Book a Car</a></li>
					    <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
		    	</ul>';
    }
    ?>
    
</nav>