<html>
<head>	
	<title>Homepage</title>
	<script src="https://kit.fontawesome.com/3e052f9cf3.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	<link rel="stylesheet" href="alternate/main.css">
</head>

<body>
<main>
	<br/>
	<a style="background-color: #1B0C81;" class="create" href="create.php">Create new user</a>
	<h1>Users</h1>
	<br/>
	<table cellspacing="0">
	<tr>
		<th>Username</th>
		<th>Email</th>
		<th>Password</th>
		<th>Actions</th>
	</tr>
	<?php 	
	include "alternate/class.php";

	DB::retrieveAllUsers();
	?>
	<tfoot><tr><th>.</th><th></th><th></th><th></th></tr></tfoot>
	</table>
	<br>
	<br/><br/>
</main>
</body>
</html>
