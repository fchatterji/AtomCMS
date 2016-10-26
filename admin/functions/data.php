<?php

function data_get_settings_value($connection, $settings_id) {

	$query = "SELECT * FROM settings WHERE id = '$settings_id'";
	$result = mysqli_query($connection, $query);
	
	$settings_value = mysqli_fetch_assoc($result);
	
	return $settings_value['value'];
	
}


function data_get_page($connection, $page_id) {

	$query = "SELECT * FROM pages WHERE id = $page_id";
	$result = mysqli_query($connection, $query);
	
	$page = mysqli_fetch_assoc($result);
	
	$page['body_no_html'] = strip_tags($page['body']);
	
	if ($page['body'] == $page['body_no_html']) {
		$page['body_formatted'] = '<p>'.$page['body'].'</p>';	
	} else {
		$page['body_formatted'] = $page['body'];	
	}
	
	
	return $page;
}

function data_get_user_data($connection, $email) {
	$query = "SELECT * FROM users WHERE email = '$email'";
	$result = mysqli_query($connection, $query);

	$user = mysqli_fetch_assoc($result);

	$user['full_name'] = $user['first_name'].' '.$user['last_name'];

	return $user;	
}

?>

