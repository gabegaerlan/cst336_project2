<?php
session_start();

function loginProcess() {

    if (isset($_POST['loginForm'])) {
    
        include './database.php';
        $conn = getDatabaseConnection();
      
            $username = $_POST['username'];
            $password = sha1($_POST['password']);
            
            $sql = "SELECT *
                    FROM users
                    WHERE userName = :username 
                    AND   password = :password ";
            
            $namedParameters = array();
            $namedParameters[':username'] = $username;
            $namedParameters[':password'] = $password;

            $stmt = $conn->prepare($sql);
            $stmt->execute($namedParameters);
            $record = $stmt->fetch();
            
            if (empty($record)) {
                
                echo "Wrong Username or password";
                
            } else {
                
               $_SESSION['username'] = $record['userName'];
               $_SESSION['adminName'] = $record['firstName'] . "  " . $record['lastName'];
               //echo $record['firstName'];
               header("Location: main.php"); 
                
            }
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> OTTER LOGIN  </title>
        <link href="css/main.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
        <style>
            body{
                text-align:center;
            }
            .loginBtn{
                color:black;
                font-family:'Lobster',cursive;
                font-size:20px;
                border:solid;
                background-color:gray;
                
            }
            
        </style>
    </head>
    <body>
        <span class="login">

            <h1> OTTER LOGIN </h1>
            
            <form method="post">
                
                Username: <input type="text" name="username"/> <br />
                
                Password: <input type="password" name="password" /> <br />
                <input type="submit" class="loginBtn" name="loginForm" value="Login!"/>
                
            </form>

            <br />
            
            <?=loginProcess()?>
            </span>
    </body>
</html>