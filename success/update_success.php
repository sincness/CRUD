
<?php
ini_set('display_errors', 1);
error_reporting('E_ALL');
include('../alternate/db.php');

$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];


$query = 'UPDATE users SET username = :username, email = :email, password = :password WHERE id = :id';




$stmt = $dbConn->prepare($query);
$stmt->execute(array(':id' => $id, ':username' => $username, ':email' => $email, ':password' => $password));
echo 'UPDATE FULDTFØRT <br />';
echo '<a href="/01-CRUD/./index.php" style="color:yellowgreen;">Back to index</a>';
// header('location:index.php');

?>
