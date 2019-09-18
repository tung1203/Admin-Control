<?php
require("../mysqli_connect.php");
$query = "UPDATE users SET status = 0 WHERE userid = ?";
$stmt = $conn->stmt_init();
$stmt->prepare($query);
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();


if ($stmt->affected_rows > 0) {
   $a = "a";
}else{
    $error[] = "Lỗi";

}
header("Location: admin.php");
