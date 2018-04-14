<?
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
  switch ($_POST["action"]) {
    case change:
      change_root($CONNECT, $_POST["id"], $_POST["root"]);
      break;
    case search:
      search_user($CONNECT, $_POST["email"], $_POST["nickname"]);
      break;
    case createstate:
      createstate($CONNECT, $_POST["title"], $_POST["primary_text"], $_POST["text"], $_POST["category"]);
    break;

    default:
      MessageToUser(3, 'Ошибка запроса!', '/admin');
      break;
  }
  function createstate($p1, $title, $primary_text, $text, $category) {
    $title = FormChars($title);
    $primary_text = FormChars($primary_text);
    $text = FormChars($text);
    $Row = mysqli_query ($p1, "INSERT INTO `states` VALUES ('','$title','$primary_text','$text','$category', NOW())");
    if (!$Row) echo 'fail';
    else echo 'success';
  }


?>
