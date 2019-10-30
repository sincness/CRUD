<?php

include ('alternate/db.php');

// Her sætter vi variablen id til at være det svar fra GET
$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

header('location:index.php');

?>
