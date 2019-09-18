
<?php include("filter.php"); ?>
<?php

if (!empty($_SESSION['user'])) {
    if ($_SESSION['user']['user_level'] == 1) {
        header("Location: admin/admin.php");
    }
}
?>
<?php include("header.php"); ?>
<?php echo '<h1 class="text-center">Hello ' . $_SESSION['user']["firstname"] . '</h1>' ?>
<h3 class="text-center"><a href="logout.php"> Logout</a></h3>
<?php include("footer.php"); ?>
