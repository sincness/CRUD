<?php

include "alternate/db.php";

$result = $dbConn->query('SELECT * FROM users ORDER BY id DESC');
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a class="create" href="create.php">Create new user</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<th>Username</th>
		<th>Email</th>
		<th>Password</th>
		<th>Update</th>
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo '<tr>';
		echo '<td>'.$row['username'].'</td>';
		echo '<td>'.$row['email'].'</td>';
		echo '<td>'.$row['password'].'</td>';	
		echo "<td><a class='update' href=\"update.php?id=$row[id]\">Edit</a> | <a class='delete' href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>

