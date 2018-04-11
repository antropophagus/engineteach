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
    if (!$_SESSION["USER_LOG_IN"]) {$variable = '<a href="/authorization">Авторизация</a> | <a href="/register">Регистрация</a>';}
    else {$variable ='<a href="profile">'.$_SESSION["USER_NICKNAME"].'</a>';}
    echo '
        <header id="header">
            <div class="logo"><h1>Blog</h1></div>
            <div class="account">'.$variable.'</div>
        </header>
        <nav id="nav">
            <ul id="main_menu">
        <li><a href="/">Главная</a></li>
        <li value="states"><a href="/cat/all">Статьи</a></li>
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
        <link rel="stylesheet" href="http://engineteach.com/style/antroslider.css">
        <meta charset="utf-8">
        <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://engineteach.com/js/js.js"></script>
        <script type="text/javascript" src="http://engineteach.com/js/antroslider.js"></script>
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
    if ($p1 == 0 and $_SESSION["USER_ROOT_RULES"]) MessageToUser(3, 'Эта страница доступна только гостям!', '/');
    if (($p1 == 3 or $p1 == 2) and $_SESSION["USER_ROOT_RULES"] < $p1) exit('<h1>404 Page not found...</h1>');
    if ($p1 == 1 and !$_SESSION["USER_ROOT_RULES"]) MessageToUser(3, 'Эта страница доступна только авторизированным пользователям!', '/');
}
// Сообщение пользователю: 1 - Оповещение, 2 - Успешность действия, 3 - Ошибка
function MessageToUser($p1, $p2, $p4) {
    if($p1 == 1) {$p1 = 'Внимание!';$p3 = 'warning';}
    else if($p1 == 2) {$p1 = 'Успешно!';$p3 = 'success';}
    else if($p1 == 3) {$p1 = 'Ошибка!';$p3 = 'error';}

    $_SESSION["MESSAGE_TO_USER"] = '<div class="messagetouser_'.$p3.'"><p title="Закрыть сообщение"><a class="close_message" href="javascript://0"><i class="fas fa-times"></i></a></p><h2>'.$p1.'</h2><p>'.$p2.'</p></div>';
    if ($p4 == '') exit(header('Location: '.$_SERVER['HTTP_REFERER']));
    else exit(header('Location: '.$p4.''));
}
function MessageToUserShow () {
    if ($_SESSION["MESSAGE_TO_USER"]) $Message = $_SESSION["MESSAGE_TO_USER"];
    echo $Message;
    $_SESSION["MESSAGE_TO_USER"] = array ();
}
function ShowStates($p1, $p2, $p3) {

    if ($p2 == '') $Row = mysqli_query ($p1, "SELECT * FROM `states` ORDER BY $p3");
    else {
      $cat_ar = mysqli_fetch_assoc(mysqli_query($p1, "SELECT * FROM `category` WHERE `title` = '$p2'"));
      $title = $cat_ar["title"];
      $id = $cat_ar["id"];
      $Row = mysqli_query($p1, "SELECT * FROM `states` WHERE `category_id` = '$id' ORDER BY $p3");
    }
    if (!mysqli_fetch_assoc($Row)) echo '<h1>В данной категории пока что нет статей!</h1>';
    else {
          while ($NewRow = mysqli_fetch_assoc($Row)) {
          echo '<div class="content_state"><a href="/state/'.$NewRow["id"].'"><h1>'.$NewRow["title"].'</h1></a><p>'.$NewRow["primary_text"].'</p><span>'.$NewRow["create_date"].'</span></div>';
      }
    }
}
function ShowState($p1,$p2) {
    $Row = mysqli_fetch_assoc(mysqli_query($p1, "SELECT * FROM `states` WHERE `id` = '$p2'"));
    if (!$Row) exit('<h1>Статья не найдена!</h1>');
    echo '
    <div class="content_wrapper"><h1>'.$Row["title"].'</h1><p>'.$Row["text"].'</p><span>'.$Row["create_date"].'</span><p>Tags: '.$Row["tags"].'</p></div>
    ';
}

function SortLogic($p1, $p2, $p3) {
$Row = mysqli_query($p3, "SELECT * FROM `category`");
$array_cat = array();

while ($NewRow = mysqli_fetch_array($Row)) {
    $old = $NewRow['title'];
    $array_cat[] = $old;
}
if ($p1 == 'engine' or $p1 == 'all') {$cat = ''; $p1 = 'all';}
else if (in_array($p1, $array_cat)) $cat = $p1;
else MessageToUser(3, 'Ошибка категории!','/');
if (!$p2["sort"]) {$sort = '`create_date` DESC';}
else {
    switch ($p2["sort"]) {
        case 'date_desc': $sort = '`create_date` DESC'; break;
        case 'date_asc': $sort = '`create_date` ASC'; break;
        case 'title_desc': $sort = '`title` DESC'; break;
        case 'title_asc': $sort = '`title` ASC'; break;
        default: MessageToUser(3, 'Ошибка сортировки!','/'); break;
    }
}
    $array = array($cat, $sort, $p1);
    return $array;
}
function Show_Cat_Nav ($p1) {
   $Row = mysqli_query($p1, "SELECT * FROM `category`");
   while ($NewRow = mysqli_fetch_assoc($Row)) {
     echo '<li><a href="/cat/'.$NewRow['title'].'">'.$NewRow['title'].'</a></li>';
   }
}
?>
