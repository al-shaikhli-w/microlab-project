<?php
require_once 'config/Database.php';
require_once 'classes/User.php';

$user = new User();
$user->logout();

session_start();
session_destroy();
setcookie('user_token', '', time() - 3600, "/");

header('Location: login.php');
exit();