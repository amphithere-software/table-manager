<!DOCTYPE html>
<head>
<link rel="icon" href="cat-avatar.png">
<link rel="stylesheet" type="text/css" href="stylesheet.css" />
</head>
<h1 id="headerTitle">Manage Servers</h1>

<?php
session_start();
    
if(isset($_POST['login'])) {
$_SESSION['servername'] = htmlspecialchars($_POST['servername']);
$_SESSION['database'] = htmlspecialchars($_POST['database']);
$_SESSION['username'] = htmlspecialchars($_POST['username']);
$_SESSION['password'] = htmlspecialchars($_POST['password']);
}

ini_set('display_errors', 1);

$mysqli = new mysqli($_SESSION['servername'], $_SESSION['username'], $_SESSION['password'], $_SESSION['database'], 3306);

if ($mysqli->connect_error) {
    /* Use your preferred error logging method here */
    error_log('Connection error: ' . $mysqli->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS `servers` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `status` tinyint DEFAULT NULL,
  `ip_address` varchar(255) NOT NULL,
  `memory` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`ip_address`)
)";

if ($mysqli->query($sql) === TRUE) {

} else {
  echo "Error creating table: " . $mysqli->error;
}
?>

<?php

if(isset($_POST['submit'])) { 
$ip_address = $_POST['ip_address'];

$result = $mysqli->prepare("SELECT * FROM servers WHERE ip_address = ?");
$result->bind_param("s", $ip_address);
$result->execute();

$row_count = $result->get_result();

if($row_count->num_rows > 0) {

} else {
$status = htmlspecialchars($_POST['status']);
$memory = htmlspecialchars($_POST['memory']);
$name = htmlspecialchars($_POST['name']);
$type = htmlspecialchars($_POST['type']);

$insert = "INSERT INTO `servers` VALUES (0, ?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($insert);
$stmt->bind_param("sssss", $status, $ip_address, $memory, $name, $type);
$stmt->execute();
echo 'submitted';
}

}
?>

<?php

$query = $mysqli->query("SELECT * FROM servers");
   

echo "<div id='actionButtons'>

<div class='dropdown'>
  <button>Filter</button>
  <div class='dropdown-content'>
    <a href='#'>All</a>
    <a href='#'>Server Up</a>
    <a href='#'>Server Down</a>
  </div>
</div>

<button onclick='window.location.href=`newserver.php`'>New Server</button><button onclick='window.location.href=`export.php`'>Export</button></div><br>";

echo "<div id='serverTable'><table>";
echo "<tr><th>id</th><th>status</th><th>ip_address</th><th>memory</th><th>name</th><th>type</th><th>delete</th></tr>";
while ($row = $query->fetch_assoc()) {

  printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td><a href='delete.php?id=".$row['id']."' onclick='return confirmDelete()'>Del</a></td></tr>", $row["id"], $row["status"], $row["ip_address"], $row["memory"], $row["name"], $row["type"]);
    
}
echo "</table></div>";

?>

<script>

function confirmDelete() {
  return confirm("Delete row?");
}

</script>




