<html>
<head>
    <title>Create user</title>
</head>

<!-- Adding data
validation of checking if the entered name, email & password fields are empty or not.
If they are all filled then the data will be inserted into database table. -->

<body>
<?php
//including the database connection file
include_once "alternate/db.php";

if (isset($_POST['Submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // checking empty fields
    if (empty($name) || empty($email) || empty($pass)) {

        if (empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }

        if (empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }

        if (empty($pass)) {
            echo "<font color='red'>Password field is empty.</font><br/>";
        }

        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty)

        //insert data to database
        $sql = "INSERT INTO users(username, email, password) VALUES(:name, :email, :pass)";
        $query = $dbConn->prepare($sql);

        $query->bindparam(':name', $name);
        $query->bindparam(':email', $email);
        $query->bindparam(':pass', $pass);
        $query->execute();

        // Alternative to above bindparam and execute
        // $query->execute(array(':name' => $name, ':email' => $email, ':pass' => $pass));

        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>
