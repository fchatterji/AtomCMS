<?php

# Start the session
session_start();

# Database connection
include('../config/connection.php');

if($_POST) {
	
	$query = "SELECT * FROM users WHERE email = '$_POST[email]' AND password = SHA1('$_POST[password]') ";
	$result = mysqli_query($connection, $query);
	
	$num = mysqli_num_rows($result);

	if($num == 1) {
		
		$_SESSION['email'] = $_POST['email'];
		header('location: index.php');
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<?php include('config/css.php'); ?>
	<?php include('config/js.php'); ?>

</head>
	
<body>

	<!-- Main navigation-->
	<?php //include(DEFAULT_TEMPLATE_PATH.'/navigation.php'); ?>
	
	<div class="container">	

		
		
		<div class="row">
		    
		  <div class="col-md-4 col-md-offset-4">
			  
			</div>
			
			<div class="panel panel-info">
				
			  <div class="panel-heading">
			    <h3>Login</h3>
			  </div>
			  
			  <div class="panel-body">

				<form action="login.php" method="post">
					
				  <div class="form-group">
				    <label for="email1">Email address</label>
				    <input type="email" class="form-control" name="email" id="email1" placeholder="Email">
				  </div>
				  
				  <div class="form-group">
				    <label for="password">Password</label>
				    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
				  </div>
				  
				  <!--
				  <div class="checkbox">
				    <label>
				      <input type="checkbox"> Check me out
				    </label>
				  </div>
				  -->
				  
				  <button type="submit" class="btn btn-default">Submit</button>
				
				</form> 
			
			  </div>
			</div>

	
		
		  </div>
		 
		</div>
	

	
		<!-- Footer -->
		<?php //include(DEFAULT_TEMPLATE_PATH.'/footer.php'); ?>
	
		<!-- Debug button and console -->
		<?php //if ($debug_status=='active') { include('widgets/debug_console.php'); } ?>
	

	</div>

	
</body>
	
</html>
