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
    else {$variable ='<a href="/profile">'.$_SESSION["USER_NICKNAME"].'</a>';}
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
function showAdminMenu() {
  echo '
  <div id="sidebar" style="background-color: #0d0d0d; width: 14%; height: 96%; padding: 1%;  float: left;">
    <p><h2>Меню администрации: </h2></p>
    <ul style="margin-top: 35px;">
      <li style="margin-bottom: 25px; font-size: 1.2em;"><a href="/admin">Главная меню администрации</a></li>
      <li style="margin-bottom: 25px; font-size: 1.2em;"><a href="/admin/state_manager">Менеджер статей</a></li>
      <li style="margin-bottom: 25px; font-size: 1.2em;"><a href="/admin/user_manager">Менеджер пользователей</a></li>
      <li style="margin-bottom: 25px; font-size: 1.2em;"><a href="/">Выйти</a></li>
    </ul>
  </div>
  ';
}
function head() {
    echo '
    <head>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
        <link rel="stylesheet" href="http://engineteach.com/style/style.css">
        <link rel="stylesheet" href="http://engineteach.com/style/antroslider.css">
        <link rel="stylesheet" href="http://engineteach.com/style/buttons.css">
        <meta charset="utf-8">
        <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://engineteach.com/js/ajax.js"></script>
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
          foreach ($Row as $item) {
            echo '<div class="content_state"><a href="/state/'.$item["id"].'"><h1>'.$item["title"].'</h1></a><p>'.$item["primary_text"].'</p><span>'.$item["create_date"].'</span></div>';
          }
    }
}
function ShowStatesForSlider($p1) {
    $Row = mysqli_query($p1, "SELECT * FROM `states` ORDER BY `create_date` DESC limit 5");
    return $Row;
}
function ShowState($p1,$p2) {
    $Row = mysqli_fetch_assoc(mysqli_query($p1, "SELECT * FROM `states` WHERE `id` = '$p2'"));
    if (!$Row) exit('<h1>Статья не найдена!</h1>');
    echo '
    <div class="content_wrapper"><h1>'.$Row["title"].'</h1><p><img src="http://engineteach.com/resources/images/'.$Row["image"].'" alt="" /></p><p>'.$Row["text"].'</p><span>'.$Row["create_date"].'</span><p>Tags: '.$Row["tags"].'</p></div>
    ';
}

function SortLogic($p1, $p2, $p3) {
$Row = mysqli_query($p3, "SELECT * FROM `category`");
$array_cat = array();
foreach ($Row as $item) {
  $array_cat[] = $item['title'];
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
   foreach ($Row as $item) {
     echo '<li><a href="/cat/'.$item['title'].'">'.$item['title'].'</a></li>';
   }
}
function search_user($p1, $email, $nickname) {
  $Row = mysqli_fetch_assoc(mysqli_query($p1, "SELECT `id`, `email`, `nickname`, `reg_date`, `root_rules` FROM `users` WHERE `email` = '$email'"));
  if (!$Row) $Row = mysqli_fetch_assoc(mysqli_query($p1, "SELECT `id`, `email`, `nickname`, `reg_date`, `root_rules` FROM `users` WHERE `nickname` = '$nickname'"));
  if (!$Row) echo 'fail';
  else echo $Row = implode ('&', $Row);
}
function change_root($p1, $id, $root) {
$q = mysqli_query($p1, "UPDATE `users` SET `root_rules` = $root WHERE `id` = $id");
if ($q) echo 'success';
else echo 'error';
}
function createstate($p1, $title, $primary_text, $text, $category, $url) {
  $title = FormChars($title);
  $primary_text = FormChars($primary_text);
  $text = FormChars($text);
  if ($url == '') $name = 'default_image.png';
  else {
// Проверим HTTP в адресе ссылки
if (!preg_match("/^https?:/i", $url) && filter_var($url, FILTER_VALIDATE_URL)) {
    die('Укажите корректную ссылку на удалённый файл.');
}
if (strpos($url, 'https://') !== false) $url = substr($url,8);

// Запустим cURL с нашей ссылкой
$ch = curl_init($url);
// Укажем настройки для cURL
curl_setopt_array($ch, [
    // Укажем максимальное время работы cURL
    CURLOPT_TIMEOUT => 60,
    // Разрешим следовать перенаправлениям
    CURLOPT_FOLLOWLOCATION => 1,
    // Разрешим результат писать в переменную
    CURLOPT_RETURNTRANSFER => 1,
    // Включим индикатор загрузки данных
    CURLOPT_NOPROGRESS => 0,
    // Укажем размер буфера 1 Кбайт
    CURLOPT_BUFFERSIZE => 1024,
    // Напишем функцию для подсчёта скачанных данных
    // Подробнее: http://stackoverflow.com/a/17642638
    CURLOPT_PROGRESSFUNCTION => function ($ch, $dwnldSize, $dwnld, $upldSize, $upld) {
        // Когда будет скачано больше 5 Мбайт, cURL прервёт работу
        if ($dwnld > 1024 * 1024 * 5) {
            return -1;
        }
    },
    // Включим проверку сертификата (по умолчанию)
    CURLOPT_SSL_VERIFYPEER => 1,
    // Проверим имя сертификата и его совпадение с указанным хостом (по умолчанию)
    CURLOPT_SSL_VERIFYHOST => 2,
    // Укажем сертификат проверки
    // Скачать: https://curl.haxx.se/docs/caextract.html
    CURLOPT_CAINFO => __DIR__ . '/cacert.pem',
]);
$raw   = curl_exec($ch);    // Скачаем данные в переменную
$info  = curl_getinfo($ch); // Получим информацию об операции
$error = curl_errno($ch);   // Запишем код последней ошибки
// Завершим сеанс cURL
curl_close($ch);
// Проверим ошибки cURL и доступность файла
if ($error === CURLE_OPERATION_TIMEDOUT)  die('Превышен лимит ожидания.');
if ($error === CURLE_ABORTED_BY_CALLBACK) die('Размер не должен превышать 5 Мбайт.');
if ($info['http_code'] !== 200)           die('Файл не доступен.');
// Создадим ресурс FileInfo
$fi = finfo_open(FILEINFO_MIME_TYPE);
// Получим MIME-тип используя содержимое $raw
$mime = (string) finfo_buffer($fi, $raw);
// Закроем ресурс FileInfo
finfo_close($fi);
// Проверим ключевое слово image (image/jpeg, image/png и т. д.)
if (strpos($mime, 'image') === false) die('Можно загружать только изображения.');
// Возьмём данные изображения из его содержимого
$image = getimagesizefromstring($raw);
// Зададим ограничения для картинок
$limitWidth  = 1280;
$limitHeight = 768;
// Проверим нужные параметры
if ($image[1] > $limitHeight) die('Высота изображения не должна превышать 768 точек.');
if ($image[0] > $limitWidth)  die('Ширина изображения не должна превышать 1280 точек.');
// Сгенерируем новое имя из MD5-хеша изображения
$name = md5($raw);
// Сгенерируем расширение файла на основе типа картинки
$extension = image_type_to_extension($image[2]);
// Сократим .jpeg до .jpg
$format = str_replace('jpeg', 'jpg', $extension);
// Сохраним картинку
if (!file_put_contents(__DIR__ . '/../resources/images/' . $name . $format, $raw)) {
    die('При сохранении изображения на диск произошла ошибка.');
}
  }
  $Row = mysqli_query ($p1, "INSERT INTO `states` VALUES ('','$title','$primary_text','$text','$category', NOW(), '$name$format')");
  if (!$Row) echo 'fail';
  else echo 'success';
}

function create_comment ($p1, $id_state, $id_user, $text){
  $Row = mysqli_query($p1, "INSERT INTO `comments` VALUES ('', '$id_user', '$id_state', '$text', NOW())");
  if (!$Row) echo $id_state, $id_user;
  else echo 'success';
}

function search_state($p1, $title)
{
  $title = FormChars($title);
  $Row = mysqli_fetch_assoc(mysqli_query ($p1, "SELECT * FROM `states` WHERE `title` = '$title'"));
  if (!$Row) echo 'fail';
  else echo $Row = implode ('&', $Row);
}

function getUserName($p1, $id) {
  $Row = mysqli_fetch_assoc(mysqli_query($p1, "SELECT `nickname` FROM `users` WHERE `id` = $id"));
  return $Row["nickname"];
}

function showComments ($p1, $id_state) {
  $Row = mysqli_query($p1, "SELECT * FROM `comments` WHERE `id_state` = $id_state ORDER BY `create_date` DESC");
  if ($Row == '') echo '<h2>Комментариев пока нет! </h2>';
  else {
    foreach ($Row as $comment) {
      echo '
      <div class="comment_item">
        <h2>'.$username = getUserName($p1, $comment["id_user"]).'</h2>
        <p>'.$comment["text"].'</p>
        <span>'.$comment["create_date"].'</span>
      </div>
      ';
    }
  }
}
?>
