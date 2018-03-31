<?php
include_once 'settings.php';
    //Убирает теги html
function FormChars ($p1) {
    return htmlspecialchars(trim($p1), ENT_QUOTES);
}
    //Шифровка пароля
function EncrPass ($p1) {
    return md5($p1);
}

    //Вывод элементов сайта (head ,header, footer)
function headerr() {
    if (!$_SESSION["USER_LOG_IN"]) {$variable = '<a href="authorization">Авторизация</a> | <a href="register">Регистрация</a>';}
    else {$variable ='<a href="profile">'.$_SESSION["USER_NICKNAME"].'</a>';}
    echo '
        <header id="header">
            <div class="logo"><h1>Blog</h1></div>
            <div class="account">'.$variable.'</div>
        </header>
        <nav id="nav">
            <ul id="main_menu">
        <li><a href="/">Главная</a></li>
        <li><a href="#">Железо</a></li>
        <li value="states"><a href="#">Статьи</a></li>
        <li><a href="about">О сайте</a></li>
    </ul>
        </nav>
    ';
}


function head() {
    echo '
    <head>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet"> 
        <link rel="stylesheet" href="http://engineteach.com/style/style.css">
        <meta charset="utf-8">
        <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://engineteach.com/js/js.js"></script>
        <title>Главная</title>
    </head>
    ';
}

function footer() {
    echo '
    <footer id="footer">
        <p>Все права защищены! &copy; '.date (Y).'</p>
    </footer>
    ';
}


//Разделение доступа для авторизированных пользователей и гостей
function root($p1) {
    if ($_SESSION["USER_LOG_IN"] != $p1) {header("Location: /");}
}
// Сообщение пользователю: 1 - Оповещение, 2 - Успешность действия, 3 - Ошибка
function MessageToUser($p1, $p2) {
    if($p1 == 1) {$p1 = 'Внимание!';$p3 = 'warning';}
    else if($p1 == 2) {$p1 = 'Успешно!';$p3 = 'success';}
    else if($p1 == 3) {$p1 = 'Ошибка!';$p3 = 'error';}
    $_SESSION["MESSAGE_TO_USER"] = '<div class="messagetouser_'.$p3.'"><p title="Закрыть сообщение"><a class="close_message" href="javascript://0"><i class="fas fa-times"></i></a></p><h2>'.$p1.'</h2><p>'.$p2.'</p></div>';
}
function ErrorToUser ($p2) {
    $_SESSION["MESSAGE_TO_USER"] = '<div class="messagetouser_error"><p title="Закрыть сообщение"><a class="close_message" href="javascript://0"><i class="fas fa-times"></i></a></p><h2>Ошибка!</h2><p>'.$p2.'</p></div>';
    exit(header('Location: '.$_SERVER['HTTP_REFERER']));
}
function MessageToUserShow () {
    if ($_SESSION["MESSAGE_TO_USER"]) $Message = $_SESSION["MESSAGE_TO_USER"];
    echo $Message;
    $_SESSION["MESSAGE_TO_USER"] = array ();
}
function ShowStates($p1) {
    $Row = mysqli_query ($p1, "SELECT * FROM `states` ORDER BY `create_date` DESC");
    while ($NewRow = mysqli_fetch_assoc($Row)) {
        echo '
        <div class="content_state"><a href="state/'.$NewRow["id"].'"><h1>'.$NewRow["title"].'</h1></a><p>'.$NewRow["primary_text"].'</p><span>'.$NewRow["create_date"].'</span></div>
        ';
    }
}
function ShowState($p1,$p2) {
    $id = $p2;
    $Row = mysqli_fetch_assoc(mysqli_query($p1, "SELECT * FROM `states` WHERE `id` = '$id'"));
    if (!$Row) exit('<h1>Статья не найдена!</h1>');
    echo '
    <div class="content_wrapper"><h1>'.$Row["title"].'</h1><p>'.$Row["text"].'</p><span>'.$Row["create_date"].'</span><p>Tags: '.$Row["tags"].'</p></div>
    ';
}
?>