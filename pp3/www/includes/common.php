<?php

require_once("login.php");
require_once("auth.php");
require_once("navigation.php");
require_once("sqlite.php");
// Allow users to use the back button without reposting data
header ("Cache-Control: private");

// Init global variables
$db = new Database("/var/zoobar/db/zoobar.db");
$user = new User($db);

// Check for logout and maybe display login page
if($_GET['action'] == 'logout') { 
  $user->_logout();
  display_login();
  exit();
}

// Validate user and maybe display login page
if(!validate_user($user)) {
  display_login();
  exit();
}

?>
