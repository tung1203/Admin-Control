<?php
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_NAME', 'onlineshopdb');
$conn = null;
try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);

    $conn->set_charset("utf8");
} catch (PDOException $e) {
     print "An Exception occurred. Message: " . $e->getMessage();
    print "The system is busy please try later";
}
catch (Error $e){
    print "An Error occurred. Message: " . $e->getMessage();
    print "The system is busy please try again later.";
}