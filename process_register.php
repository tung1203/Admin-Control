<?php

$errors = array();
$firstname = test_input($_POST['first_name']);
if (empty($firstname)) {
    $errors[] = 'You forgot enter your first name <br>';
}

$lastname = test_input($_POST['last_name']);
if (empty($lastname)) {
    $errors[] = 'You forgot enter your last name <br>';
}
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
if ((empty($email)) || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
    $errors[] = 'You forgot enter your email name <br>';
}
$password1 = filter_var($_POST['password1'],FILTER_SANITIZE_STRING);
$password1 = filter_var($_POST['password2'],FILTER_SANITIZE_STRING);

if (!empty($password1)) {
    if ($password1 !== $password2) {
        $errors[] = 'Your two passwords did not match. <br>';
    }
} else {
    $errors[] = 'You forgot to enter your password. <br>';
}


if (empty($errors)) {
    try {
        $hashed_passcode = password_hash($password1, PASSWORD_DEFAULT);
        require('mysqli_connect.php');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);;
        }
        $query = "INSERT INTO users (first_name, last_name, email, password, registration_date, user_level) ";
        $query .= "VALUES (?,?,?,?,NOW(),2 )";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssss", $firstname, $lastname, $email, $hashed_passcode);
        $stmt->execute();

        if ($stmt->affected_rows == 1) {
            header("Location: index.php");
            $conn->close();
            exit();
        } else {
            $errors[] = "Email already exists";
        }
        $conn->close();
    } catch (Exception $e) {
        print "An Exception occurred. Message: " . $e->getMessage();

    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
