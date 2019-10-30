<?php

include "alternate/db.php";

$result = $dbConn->query('SELECT * FROM users ORDER BY id DESC');
?>

<html>
<head>	
	<title>Homepage</title>
	<script src="https://kit.fontawesome.com/3e052f9cf3.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="alternate/style.css">
</head>

<body>
<main>
<h1>Users</h1>
	<table cellspacing="0">

	<tr>
		<th>Username</th>
		<th>Email</th>
		<th>Password</th>
		<th>Update</th>
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo '<tr class="table-rows">';
		echo '<td>'.$row['username'].'</td>';
		echo '<td>'.$row['email'].'</td>';
		echo '<td>'.$row['password'].'</td>';	
		echo "<td class='td-edit' ><a class='update' href=\"update.php?id=$row[id]\"><i class='fas fa-edit'></i></a>  <a class='delete' href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class='fas fa-trash'></i></a></td>";		
		echo '</tr>';
	}
	?>
	</table>
	<br>
	<a class="create" href="create.php">Create new user</a><br/><br/>
</main>
</body>
</html>



