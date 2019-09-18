<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
   require ("process-change-password.php");
} ?>
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    Email: <input type="email" name="email" value="<?php if (isset($_POST['last_name'])) echo $_POST['email'] ?>"><br>
    Current Password: <input type="password" name="password"
                             value="<?php if (isset($_POST['password'])) echo $_POST['password'] ?>"><br>
    New Password: <input type="password" name="password1"
                         value="<?php if (isset($_POST['password1'])) echo $_POST['password1'] ?>"><br>
    Confirm Password: <input type="password" name="password2"
                             value="<?php if (isset($_POST['password2'])) echo $_POST['password2'] ?>"><br>
    <input type="submit" value="Change Password">
</form>
</body>
</html>