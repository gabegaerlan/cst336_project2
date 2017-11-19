<?php
session_start();
include 'database.php';
$conn = getDatabaseConnection();

function getAllTypes() {
    global $conn;
    $sql = "SELECT * 
            FROM types";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $classes = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($classes as $cl) {
      echo "<option value='" . $cl['typeName'] . "'>" . $cl['typeName'] . "</option>";
    }
}

function getItems() {
    global $conn;
    $namedParameters = array();
    
    $sql = "SELECT itemName, typeName
            FROM items 
            WHERE 1";
            
    if(isset($_GET['submit'])) {
        if (isset($_GET['storeSearch'])) {
            $sql .= " AND itemName LIKE :itemName";
            $namedParameters[':itemName'] = "%" . $_GET['storeSearch'] . "%";
        }
        if (isset($_GET['typeType'])) {
            $sql .= " AND typeName = :typeName ";
            $namedParameters[':typeName'] = $_GET['typeType'];
        }

        if ($_GET['sort'] == 'desc') {
            $sql .= " ORDER BY itemName desc";
        }
        if ($_GET['sort'] == 'asc') {
            $sql .= " ORDER BY itemName asc";
        }
    }
            
    
    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($records as $r) {
        echo "<div class='pharmacy'>";
        echo    "<details>";
        echo        "<summary>" . $r['itemName'] . "</summary>";
        echo        "<p> Category: " . $r['typeName'] . "</p>";
        echo        "<form action='addToCart.php' method='GET'>";
        echo            "<input type='hidden' name='val' value='".$r['itemName']."'>";
        echo            "<input type='submit' value='Add to cart' style='position:relative; top:-10px'>";
        echo        "</form>";
        echo    "</details>";
        echo "</div>";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>OTTER PHARMACY</title>
        <h>WELCOME TO THE OTTER PHARMACY</h>
        <p>Welcome to the Otter Pharmacy, we have many popular medications from <br/>
            prescription drugs to non-prescription, to allergy medication. <br/>
            Please just choose which one you would like to browse through <br/>
            by clicking on any of the links.</p>
        <style>
            body {
                text-align: center;
                background-color: #002351;
                font-family: 'Lobster', cursive;
                color:#ffffff;
                font-size: 125%;
                background-image:url('img/csumb.png');
                background-repeat:no-repeat;
                background-attachment:fixed;
                background-position:center;
            }
        </style>
        <link href="css/main.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet"><!--<link href="https://fonts.googleapis.com/css?family=Cuprum:400i" rel="stylesheet">-->
    </head>
    <body>
        <h1>Items List</h1>
        <a href="checkout.php">Shopping Cart</a>
        <form>
            <fieldset style='border-radius:35px;
                             width:300px;
                             margin: 0 auto;'>
            <input type="text" name="storeSearch" placeholder="Search Product">
            <select name="typeType">
                <option disabled selected value value>Choose a type</option>
                <?=getAllTypes()?>
            </select></br>

            Sort names by:</br>
            <input type="radio" name="sort" value="desc" class="rad" checked> Descending </br>
            <input type="radio" name="sort" value="asc" class="rad"> Ascending </br></br>
            <input type="submit" name="submit" value="Go">
            </fieldset>        
        </form>
        <?=getItems()?>
    </body>
</html>