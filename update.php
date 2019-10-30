
<?php

include ('alternate/db.php');


$id = $_GET['id'];



$stmt = $dbConn->query("SELECT * FROM users WHERE id=".$id);



echo'
<table width="80%" border="0">

	<tr bgcolor="#CCCCCC">
		<th>Username</th>
		<th>Email</th>
		<th>Password</th>
		<th>Update</th>
    </tr>
';
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
{ 		
    echo '<tr>';
    echo '<form action="success/update_success.php" method="POST">';
    echo '<td><input name="username" type="text" value="'.$row['username'].'"/></td>';
    echo '<td><input name="email" type="text" value="'.$row['email'].'"/></td>';
    echo '<td><input name="password" type="text" value="'.$row['password'].'"/></td>';
    echo '<input type="hidden" id="id" name="id" value="'.$id.'"/>';
    echo "<td><input name='send' value='Confirm' type='submit' class='update' onClick=\"return confirm('Are you sure you want to confirm?')\" href=\"success/update_success.php?id=$row[id]\" /> | <a class='delete' href=\"index.php\">Cancel</a></td>";		
    echo '</form>';
} 

?>
