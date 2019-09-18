<?php
session_start();
if (empty($_SESSION['user']) || $_SESSION['user']['user_level'] != 1) {
    header("Location: ../login.php");

}