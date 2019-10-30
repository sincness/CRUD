<html>
<head>
    <title>Create user</title>
</head>

<form action="create.php" method="post" name="form1">
      <table width="25%">
        <tr>
          <td>Name</td>
          <td><input type="text" name="name" /></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><input type="text" name="email" /></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="text" name="pass" /></td>
        </tr>
        <tr>
          <td><input type="submit" name="Submit" value="Create" /></td>
        </tr>
        <tr>
          <td><input type="reset" name="Submit" value="Cancel" /></td>
        </tr>
      </table>
    </form>

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
