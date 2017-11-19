<?php
session_start();

function displayItems(){
    foreach($_SESSION['shoppingCart'] as $itemss){
        echo "<div>";
        echo $itemss;
        echo "</div>";
        echo "<br>";
    }
   
}
if(isset($_GET['Checkout'])){
        $_SESSION['shoppingCart'] = array();
        header("Location: login.php");
}


?>


<!DOCTYPE html>
<html>
    <head>
        <title>Checkout Page </title>
        <style>
        body{
            font-family: 'Lobster', cursive;
            color: white;
            background-color: #000000;
            text-align:center;
        }
        div{
            background-color: white;
            text-align: center;
            width: 300px;
            border-style: solid;
            border-width: 5px;
            border-radius: 25px;
            margin: 0 auto;
            color: black;
            font-size: 3em;
        }
        h1{
            font-size: 400%;
        }
            
        </style>
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    </head>
    <body>
        <a href = "main.php"><bold>Get more Items</bold></a>
            <h1>Checkout Items</h1>
            <?=displayItems()?>
        <form method='GET'>
            <input type="submit" name = "Checkout" value ="Checkout">
        </form>
    </body>
</html>