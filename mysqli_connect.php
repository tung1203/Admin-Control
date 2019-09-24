<?php
require_once ("config.php");
$conn = null;
try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME,DB_PORT);

    $conn->set_charset("utf8");
} catch (PDOException $e) {
     print "An Exception occurred. Message: " . $e->getMessage();
    print "The system is busy please try later";
}
catch (Error $e){
    print "An Error occurred. Message: " . $e->getMessage();
    print "The system is busy please try again later.";
}