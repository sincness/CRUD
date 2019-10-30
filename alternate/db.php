
<!-- contains database connection code.
This file is included in all PHP pages where database connection is necessary. -->

<?php
$host = 'localhost';
$dbname = 'crud';
$user = 'root';
$pass = '';

try {
    // http://php.net/manual/en/pdo.connections.php
    $dbConn = new PDO("mysql:host={$host};dbname={$dbname}", $user, $pass);

    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Setting Error Mode as Exception
    // More on setAttribute: http://php.net/manual/en/pdo.setattribute.php
} catch (PDOException $e) {
    echo $e->getMessage();
}
