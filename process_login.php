<?php
$errors = array();
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
if ((empty($email)) || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
    $errors[] = 'You forgot enter your email <br>';
}
$password = test_input($_POST['password']);
if (empty($password)) {
    $errors[] = 'You forgot enter your password';
}
if (empty($errors)) {
    require("mysqli_connect.php");
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->stmt_init();
    $stmt->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            if (($row['email'] == $email) && (password_verify($password, $row['password']))) {
                session_start();
                $_SESSION['user'] = array(
                    firstname => $row['first_name'],
                    lastname => $row['last_name'],
                    email => $row['email'],
                    user_level => $row['user_level']
                );
                $url = ((int)$_SESSION[user]['user_level'] === 1) ? 'admin/admin.php' : 'index.php';
                header("Location: $url");
                $conn->close();
                exit();
            } else {
                $errors[] = 'Your email or password is incorrect';
            }
        }

    } else {
        $errors[] = 'Your email or password is incorrect';
    }
    $conn->close();
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>