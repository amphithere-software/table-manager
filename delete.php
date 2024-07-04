<?php
session_start();
$id = $_GET['id'];
echo $id;
echo $_SESSION['username'];
$mysqli = new mysqli($_SESSION['servername'], $_SESSION['username'], $_SESSION['password'], $_SESSION['database'], 3306);

if ($mysqli->connect_error) {
    /* Use your preferred error logging method here */
    error_log('Connection error: ' . $mysqli->connect_error);
}
echo "test";
$sql = $mysqli->prepare("DELETE FROM servers WHERE id = ?");
$sql->bind_param("s", $id);

echo "test2";
if($sql->execute()) {

    $mysqli->close();
    header("Location: dbconnect.php");
    exit;
} else {
    echo "Error deleting record";
}

?>
