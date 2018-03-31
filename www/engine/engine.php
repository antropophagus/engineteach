<?php
include_once 'settings.php';
include_once 'functions.php';
session_start();

$CONNECT = mysqli_connect(HOST_DB, USER_DB, PASSWORD_DB, NAME_DB);

if ($_SESSION["USER_LOG_IN"] and $_COOKIE['c_user_remember']) {
    $Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT * FROM `users` WHERE `password` = '$_COOKIE[c_user_remember]'"));
    $_SESSION["USER_LOG_IN"] = 1;
    $_SESSION["USER_LOGIN"] = $Row["login"];
    $_SESSION["USER_EMAIL"] = $Row["email"];
    $_SESSION["USER_PASSWORD"] = $Row["password"];
    $_SESSION["USER_NICKNAME"] = $Row["nickname"];
    $_SESSION["USER_REGDATE"] = $Row["reg_date"];
}



//Разбор URL

if ($_SERVER['REQUEST_URI'] == '/') {
$Page = 'engine';
$Module = 'engine';
} else {
$URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$URL_Parts = explode('/', trim($URL_Path, ' /'));
$Page = array_shift($URL_Parts);
$Module = array_shift($URL_Parts);


if (!empty($Module)) {
$Param = array();
for ($i = 0; $i < count($URL_Parts); $i++) {
$Param[$URL_Parts[$i]] = $URL_Parts[++$i];
}
}
}

//Подключение файлов в зависимости от URL

if ($Page == 'engine') include '../pages/index.php';
else if ($Page == 'register') include '../pages/register.php'; 
else if ($Page == 'account') include '../forms/account.php';
else if ($Page == 'authorization') include '../pages/authorization.php';
else if ($Page == 'profile') include '../pages/profile.php';
else echo '<h1>404 Page not found...</h1>';




?>