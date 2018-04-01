<?php
    //Выход из уч. записи
if ($Module == 'logout' and $_SESSION["USER_LOG_IN"]) {
    if ($_COOKIE['c_user_remember']) {
        setcookie('c_user_remember', '', strtotime('-30 days'), '/');
        unset($_COOKIE['c_user_remember']);
    }
    session_unset();
    MessageToUser(1, 'Вы вышли из своей учетной записи!', '/');
}
    //Регистрация
if ($Module == 'register' and $_POST["submit"]) {
$login = FormChars($_POST["login"]);
$email = FormChars($_POST["email"]);
$password = EncrPass($_POST["password"]);
$sec_password = EncrPass($_POST["sec_password"]);
$nickname = FormChars($_POST["nickname"]);
    //Валидация форм
$Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `login` FROM `users` WHERE `login` = '$login'"));
if ($Row['login']) MessageToUser(3 ,'Данный логин уже используется!', '');
$Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `email` FROM `users` WHERE `email` = '$email'"));
if ($Row['email']) MessageToUser(3 ,'Данный Email уже используется!', '');
$Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `nickname` FROM `users` WHERE `nickname` = '$nickname'"));
if ($Row['nickname']) MessageToUser(3,'Данный никнэйм уже используется!','');    
if ($password != $sec_password) ErrorToUser('Введенные пароли не совпадают!');
    //Запись в БД
mysqli_query ($CONNECT, "INSERT INTO `users` VALUES ('','$login','$email','$password','$nickname', NOW())");
MessageToUser(2, 'Вы успешно зарегистрировались!', '/authorization');   
}



    //Авторизация
if ($Module == 'authorization' and $_POST["submit"]) {
    $login = FormChars($_POST["login"]);
    $password = EncrPass($_POST["password"]);
    $Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `password` FROM `users` WHERE `login` = '$login'"));
    if (!$Row['password'] or $Row['password'] != $password) MessageToUser(3, 'Вы ввели неверный логин или пароль!', '');
    else {
        $Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT * FROM `users` WHERE `login` = '$login'"));
        $_SESSION["USER_LOG_IN"] = 1;
        $_SESSION["USER_LOGIN"] = $Row["login"];
        $_SESSION["USER_EMAIL"] = $Row["email"];
        $_SESSION["USER_PASSWORD"] = $Row["password"];
        $_SESSION["USER_NICKNAME"] = $Row["nickname"];
        $_SESSION["USER_REGDATE"] = $Row["reg_date"];
        if ($_REQUEST['remember_me']) {
            setcookie('c_user_remember', $password, strtotime('+30 days'), '/');
        }
        MessageToUser(2, 'Вы успешно авторизировались!', '/profile');
    } 
        
    
}
?>