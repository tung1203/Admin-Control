<?php
if (!empty($_POST['adduser'])) {
    $firstname = test_input($_POST['addFirstname']);
    if (empty($firstname)) {
        $errors[] = 'You forgot enter your first name <br>';
    }

    $lastname = test_input($_POST['addLastname']);
    if (empty($lastname)) {
        $errors[] = 'You forgot enter your last name <br>';
    }
    $email = test_input($_POST['addEmail']);
    if (empty($email)) {
        $errors[] = 'You forgot enter your email name <br>';
    }
    $password1 = trim($_POST['addPassword1']);
    $password2 = trim($_POST['addPassword2']);
    if (!empty($password1)) {
        if ($password1 !== $password2) {
            $errors[] = 'Your two passwords did not match. <br>';
        }
    } else {
        $errors[] = 'You forgot to enter your password. <br>';
    }
    
    $privilege = (int) $_POST['addPrivilege'];
    if (!is_numeric($privilege) || $privilege !== 1 & $privilege !== 2) {
        $errors[] = 'Error privilege <br>';
    }

    

    if (empty($errors)) {
        try {
            $hashed_passcode = password_hash($password1, PASSWORD_DEFAULT);
            require('../mysqli_connect.php');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);;
            }
            $query = "INSERT INTO users (first_name, last_name, email, password, registration_date, user_level) ";
            $query .= "VALUES (? ,? ,? ,? ,NOW() ,?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssssi", $firstname, $lastname, $email, $hashed_passcode, $privilege);
            $stmt->execute();

            if ($stmt->affected_rows == 1) {
                header("Location: admin.php");
            } else {
                $errors[] = "Email already exists";
                header("Location: admin.php");
            }
            $conn->close();
            exit();
        } catch (Exception $e) {
            print "An Exception occurred. Message: " . $e->getMessage();

        }
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

