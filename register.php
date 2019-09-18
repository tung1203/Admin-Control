<?php
session_start();
if (!empty($_SESSION['user'])) {
    if ($_SESSION['user']['user_level'] == 1) {
        header("Location: admin/admin.php");
    } elseif ($_SESSION['user']['user_level'] == 2) {
        header("Location: index.php");
    }
}
?>

<?php include("header.php"); ?>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require("process_register.php");

}
?>
    <div class="container">
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="form-row">
            <div class="form-group col-md-6">
                <label for="first_name">Firstname :</label>
                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First name"
                       value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name'] ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="lastname">Lastname :</label>
                <input type="text" name="last_name" class="form-control" id="lastname" placeholder="Last name"
                       value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name'] ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="password1">Password :</label>
                <input type="password" name="password1" class="form-control" id="password1" placeholder="Password"
                       value="<?php if (isset($_POST['password1'])) echo $_POST['password1'] ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="password2">Re-Password :</label>
                <input type="password" name="password2" class="form-control" id="password2" placeholder="Re-Password"
                       value="<?php if (isset($_POST['password2'])) echo $_POST['password2'] ?>">
            </div>
            <div class="form-group col-md-12">
                <label for="email">Email :</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Email"
                       value="<?php if (isset($_POST['last_name'])) echo $_POST['email'] ?>">
            </div>
            <p class="col-md-12 error"><?php if (!empty($errors)) foreach ($errors as $v) echo $v ?></p>
            <input type="submit" value="Register" class="btn btn-success">
            <a href="login.php" class="ml-2 btn">Login</a>
        </form>

    </div>

<?php include("footer.php"); ?>