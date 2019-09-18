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
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include("process_login.php");

}
?>
    <div class="container">
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="form-row">
            <div class="form-group col-md-12">
                <label for="username">Email :</label>
                <input type="text" name="email" class="form-control w-25" id="email" placeholder="Email"
                       value="<?php if (isset($_POST['email'])) echo $_POST['email'] ?>">
            </div>
            <div class="form-group col-md-12">
                <label for="password ">Password :</label>
                <input type="password" name="password" class="form-control w-25" id="password"
                       value="<?php if (isset($_POST['password'])) echo $_POST['password'] ?>"
                       placeholder="Password">
            </div>
            <p class="col-md-12 error"><?php if (!empty($errors)) foreach ($errors as $v) echo $v ?></p>

            <input type="submit" value="Login" class="btn btn-success mr-2">
            <a href="register.php" class="btn">Register</a>
        </form>
    </div>

<?php include("footer.php"); ?>