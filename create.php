<html>
<head>
    <title>Create user</title>
</head>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link rel="stylesheet" href="alternate/create.css">
<form action="create.php" method="post" name="form1">
        <tr>
          <label class="first">Username</label>
          <input type="text" name="name" />
        </tr>
        <tr>
          <label>Email</label>
          <input type="text" name="email" />
        </tr>
        <tr>
          <label>Password</label>
          <input type="text" name="pass" />
        </tr>
        <tr class="buttons">
          <td><button title="Create a user" id="create" type="submit" name="Submit"><i class="material-icons">create</i></button></td>
          <td><button title="Head back to index" id="cancel" type="button" value="Cancel" onclick="window.location='index.php';"><i class="material-icons">cancel</i></button></td>
        </tr>
    </form>

<body>
<?php
//including the database connection file
include_once "alternate/class.php";
if (isset($_POST['Submit'])) {
  DB::createUser();
}
?>
</body>
</html>
