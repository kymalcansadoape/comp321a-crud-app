<?php 
session_start();
session_destroy();
unset($_SESSION['id']);
unset($_SESSION['username']);
header('location:login.php');
exit();