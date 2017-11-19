<?php
include 'database.php';
function getAllTypes() {
    
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Otter Pharmacy</title>
    </head>
    <body>
        <form>
            <input type="text" name="storeSearch" placeholder="storeSearch">
            <select>
                <option value>Choose a type</option>
                <?=getAllTypes?>
            </select>
            <input type="submit" name="submit" value="Create Itinerary">
        </form>
    </body>
</html>