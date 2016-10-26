<?php 
// Setup file:

# Database connection
# TODO add another connection file in admin
include('config/connection.php');

# Constants
DEFINE('DEFAULT_TEMPLATE_PATH', 'template');

# Functions
include('functions/data.php');
include('functions/template.php');

# Site setup
$debug_status = data_get_settings_value($connection, 'debug_status');

$site_title = 'AtomCMS 2.0';
$page_title = 'Home';

if(isset($_GET['page'])) {
	
	$page_id = $_GET['page'];
	
} else {
	
	$page_id = 1; //Home Page
	
}

# Page Setup
$page = data_get_page($connection, $page_id);

# User setup
$user = data_get_user_data($connection, $_SESSION['email'])

?>