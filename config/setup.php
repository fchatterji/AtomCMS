<?php 
// Setup file:

# Database connection
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
	
	$slug = $_GET['page'];
	
} else {
	
	$slug = 'home'; //Home Page
	
}

# Page Setup
$page = data_get_page($connection, $slug);



?>