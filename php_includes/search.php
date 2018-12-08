<?php
//Config Vars
include dirname(__FILE__)."/../config.php";

// Database details
include DIR_BASE."/php_includes/secretInfo.php";
$db_password = PASSWORD;  //defined in secretInfo.php
$db_server   = SERVERNAME;
$db_username = USERNAME;
$db_name     = DBNAME;
$charset     = 'utf8';

$pdo = new PDO(
  "mysql:host=$db_server;dbname=$db_name;charset=$charset", $db_username, $db_password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
  ]
);

// FETCH & DATA
$stmt = $pdo->prepare("SELECT * FROM `lg_city` WHERE `name` LIKE ?");
$stmt->execute(["%" . $_GET['term'] . "%"]);
$data = [];
while ($row = $stmt->fetch(PDO::FETCH_NAMED)) {
  $data[] = $row['name'];
}
$pdo = null;
echo json_encode($data);
?>
