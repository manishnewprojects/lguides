<?php
//Config Vars
include dirname(__FILE__)."/../config.php";

// Database details
include DIR_BASE."/php_includes/secretInfo.php";
$db_password = PASSWORD;  //defined in secretInfo.php
$db_server   = SERVERNAME;
$db_username = USERNAME;
$db_name     = DBNAME;


// Get parameters from URL
$place = $_GET["args"];

error_log(print_r($place, TRUE), 3, '/Users/newprojects/CodeDirectories/logs/lantern_guides_php_errors.log');


// Connect to database
$db_connection = mysqli_connect($db_server, $db_username, $db_password, $db_name);

if (mysqli_connect_errno()){
  $result  = 'error';
  $message = 'Failed to connect to database: ' . mysqli_connect_error();
  exit();
 }

// Search the rows in the markers table
$query = sprintf("SELECT * from lg_city where name='%s'",$place);


$result = mysqli_query($db_connection,$query);

error_log(print_r($result, TRUE), 3, '/Users/newprojects/CodeDirectories/logs/lantern_guides_php_errors.log');

 
if (!$result) {
  die("Invalid query: " . mysqli_error());
}

while($row = $result->fetch_array(1)) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);

?>