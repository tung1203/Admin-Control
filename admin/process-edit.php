<?php
$error = array();
if (!empty($_POST['edit'])) {
    $userId = trim($_POST['userid']);
    $firstname = test_input($_POST['editFirstname']);
    if (empty($firstname)) {
        $error[] = 'You forgot enter your first name';
    }

    $lastname = test_input($_POST['editLastname']);
    if (empty($lastname)) {
        $error[] = 'You forgot enter your last name';
    }

    $password1 = trim($_POST['editPassword1']);
    $password2 = trim($_POST['editPassword2']);
    if (!empty($password1)) {
        if ($password1 !== $password2) {
            $error[] = 'Your two passwords did not match.';
        }
    } else {
        $error[] = 'You forgot to enter your password.';
    }
    if (empty($error)) {
        try {
            $hashed_passcode = password_hash($password1, PASSWORD_DEFAULT);
            require('../mysqli_connect.php');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $query = "UPDATE users SET first_name = ?, last_name = ?, password = ? where userid = ? LIMIT 1";
            $stmt = $conn->stmt_init();
            $stmt->prepare($query);
            $stmt->bind_param("ssss", $firstname, $lastname, $hashed_passcode, $userId);
            $stmt->execute();
            if ($stmt->affected_rows == 1) {
                header("Location: admin.php");
                exit();
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
