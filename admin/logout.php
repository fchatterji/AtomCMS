<?php

# Start session
session_start();

# Delete all session variables
session_destroy();

# Redirect to login.php
header('location: login.php');

?>