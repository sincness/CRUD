<?php

class DB {
    // Connecting to the database - Connect Method
    private static function connect () {
        $server = "localhost";
        $db = "crud";
        $username = "testuser";
        $password = "rbyjrzyhoH9r2xdP";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        $dbConn = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $username, $password, $options);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConn;
    }

    // Queries to the database - Query Function
    public static function query($query, $param = array()) {
        $statement = self::connect()->prepare($query);
        $statement->execute($param);

        if (explode(' ', $query)[0] == 'SELECT') {
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

    }

    // Creates a user - Create Method
    public static function createUser(){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

    
        // checking empty fields
        if (empty($name) || empty($email) || empty($pass)) {
            echo '<section class="errors">';
            if (empty($name)) {
                echo "<font color='red'>Name field is empty.</font>";
            }
            if (empty($email)) {
                echo "<font color='red'>Email field is empty.</font>";
            }
            if (empty($pass)) {
                echo "<font color='red'>Password field is empty.</font>";
            }
        } else {
            
            // if all the fields are filled (not empty)
            //insert data to database
            DB::query("INSERT INTO users VALUES(id, :username, :email, :password)", array(':username' => $name, ':email' => $email, ':password' => $pass));
            //display success message
            echo '<section class="messages">';
            echo "<font style='padding: 5px 0 0 0;'>Data added successfully!</font>
                  <a style='padding: 0 0 1% 0;' href='index.php'>View Added Record</a>";
    
        }
        echo '</section>';
        }
    
    // Update user info - Update Method
    public static function updateUser(){
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        echo '
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
        <link rel="stylesheet" href="/01-CRUD/alternate/success.css">';
        // checking empty fields
        if (empty($username) || empty($email) || empty($password)) {
            echo '<section class="errors">';
            if (empty($username)) {
                echo "<font color='red'>Username cannot be set as empty.</font>";
            }
            if (empty($email)) {
                echo "<font color='red'>Email cannot be set as empty.</font>";
            }
            if (empty($password)) {
                echo "<font color='red'>Password cannot be set as empty.</font>";
            }
            echo '<br/><a href="../update.php?id='.$id.'">Return to try again!</a>
                  </section>';
        } else {
            
            // if all the fields are filled (not empty)
            //update data to database
            DB::query("UPDATE users SET username = :username, email = :email, password = :password WHERE id = :id", array(':username' => $username, ':email' => $email, ':password' => $password, ':id' => $id));        
            //display success message

            echo '<section class="wrapper"><br /><br /><p>Update was commited<p> <br />
                    <a href="/01-CRUD/./index.php">Back to index</a></section>';
    
        }


    }


    // Get user info for updating - User info Method
    public static function updateGetUser($id){
        $stmt = DB::query("SELECT * FROM users WHERE id=".$id);
        
        echo'
        <script src="https://kit.fontawesome.com/3e052f9cf3.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="alternate/update.css">
        <table width="80%" border="0">

            <tr bgcolor="#CCCCCC">
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Actions</th>
            </tr>
        ';
        foreach($stmt as $row) 
        { 		
            echo '<tr>';
            echo '<form action="success/update_success.php" method="POST">';
            echo '<td><input name="username" type="text" value="'.$row['username'].'"/></td>';
            echo '<td><input name="email" type="text" value="'.$row['email'].'"/></td>';
            echo '<td><input name="password" type="text" value="'.$row['password'].'"/></td>';
            echo '<input type="hidden" id="id" name="id" value="'.$id.'"/>';
            echo "<td><button title='Update user info' name='send' type='submit' class='update' onClick=\"return confirm('Are you sure you want to confirm?')\" href=\"success/update_success.php?id=$row[id]\"><i style='color:green;' class='fas fa-check'></i></button></button> <a title='Head back to index' style='color:darkred;' class='delete' href=\"index.php\"><i class='fas fa-window-close'></i></a></td>";		
            echo '</form>';
            echo '<tfoot><tr><td>1</td><td>1</td><td>1</td><td>1</td></tr></tfoot>';
        }

    }

    // Retrieves all users - Retrieve Method
    public static function retrieveAllUsers(){
        $result = DB::query('SELECT * FROM users ORDER BY id DESC');
        foreach($result as $row) {
            echo '<tr class="table-rows">';
            echo '<td>'.$row['username'].'</td>';
            echo '<td>'.$row['email'].'</td>';
            echo '<td>'.$row['password'].'</td>';
            echo "<td class='td-edit' ><a title='Update user' class='update' href=\"update.php?id=$row[id]\"><i class='fas fa-edit'></i></a>  <a class='delete' title='Delete user' href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class='fas fa-trash'></i></a></td>";		
            echo '</tr>';
        }

    }

    // Deletes a user - Delete Method
    public static function deleteUser() {
        // Her sætter vi variablen id til at være det svar fra GET
        $id = $_GET['id'];
        DB::query("DELETE FROM users WHERE id=:id", array(':id' => $id));
        header('location:index.php');

    }

}
