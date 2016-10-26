<?php

# Start the session
session_start();

if(!isset($_SESSION['email'])) {
	header('location: login.php');
}
?>

<?php include('config/setup.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo $site_title.' | '.$page['title'] ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include('config/css.php'); ?>
    <?php include('config/js.php'); ?>
</head>

<body>
    <!-- Main navigation-->
    <?php include(DEFAULT_TEMPLATE_PATH.'/navigation.php'); ?>
    <?php 

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$title = mysqli_real_escape_string($connection, $_POST['title']);

		$user_id = mysqli_real_escape_string($connection, $_POST['user_id']);

		$label = mysqli_real_escape_string($connection, $_POST['label']);

		$header = mysqli_real_escape_string($connection, $_POST['header']);

		$body = mysqli_real_escape_string($connection, $_POST['body']);

		$query = "INSERT INTO pages (title, user_id, label, header, body) VALUES ('$title', '$user_id', '$label', '$header', '$body')";

		$result = mysqli_query($connection, $query);

		if ($result) {

			$message =  '<p>Page was added!</p>';

		} else {

			$message = '<p>Pages could not be added because: '.mysqli_error($connection).'</p>';
			$message .= '<p>'.$query.'</p>';
		}
	}
	?>
	
        <h1>Admin dashboard</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <?php

			$query = "SELECT * FROM pages ORDER BY title ASC";
			$result = mysqli_query($connection, $query);

			while($row = mysqli_fetch_assoc($result)) { 

				$extract = strip_tags(substr($row['body'], 0, 140));

				?>
                        <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading">
						<?php echo $row['title']; ?>
					</h4>
                            <p class="list-group-item-text">
                                <?php echo $extract ?>
                            </p>
                        </a>
                        <?php } ?>
                </div>
            </div>
            <div class="col-md-9">
                <?php  if (isset($message)) { echo $message; } ?>
                <form action="index.php" method="post">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="user">user:</label>
                        <select class="form-control" name="user_id" id="user">
                            <option value="0">
                                No user
                            </option>
                        
                            <?php 
    						$query = "SELECT * FROM users ORDER BY first_name ASC";
    						$result = mysqli_query($connection, $query);

    						while($user_list = mysqli_fetch_assoc($result)) { 

    							$user_data = data_get_user_data($connection, $user_list['email']);
    							?>
                                <option value="<?php echo $user_data['id']?>">
                                    <?php echo $user_data['full_name'] ?>
                                </option>

                            <?php } ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="user">User:</label>
                        <input type="text" class="form-control" name="user" id="user" placeholder="User">
                    </div>

                    <div class="form-group">
                        <label for="label">Label:</label>
                        <input type="text" class="form-control" name="label" id="label" placeholder="Label">
                    </div>
                    <div class="form-group">
                        <label for="header">Header:</label>
                        <input type="text" class="form-control" name="header" id="header" placeholder="Header">
                    </div>
                    <div class="form-group">
                        <label for="body">Body:</label>
                        <textarea class="form-control" name="body" id="body" placeholder="Body" rows="8"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
        <!-- Footer -->
        <?php include(DEFAULT_TEMPLATE_PATH.'/footer.php'); ?>
        <!-- Debug button and console -->
        <?php if ($debug_status=='active') { include('widgets/debug_console.php'); } ?>
</body>

</html>

