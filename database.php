<?php
// Add argument for a different database or copy and paste everything needed for the exam
function getDatabaseConnection() {
    //mysql://b1d658c6df74b0:b5716444@us-cdbr-iron-east-05.cleardb.net/heroku_85e92cedc98a377?reconnect=true
    // Username: b1d658c6df74b0
    // Password: b5716444
    // Host: us-cdbr-iron-east-05.cleardb.net
    // Database name: heroku_85e92cedc98a377
    
    // Connect to Heroku Database
    $host = 'us-cdbr-iron-east-05.cleardb.net';
    $dbname = 'heroku_85e92cedc98a377';
    $username = 'b1d658c6df74b0';
    $password = 'b5716444';
    
    // //using different database variables in Heroku
    // if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
    //     $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    //     $host = $url["host"];
    //     $dbname = substr($url["path"], 1);
    //     $username = $url["user"];
    //     $password = $url["pass"];
    // } 
    
    //creates db connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    //display errors when accessing tables
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn;
}
?>