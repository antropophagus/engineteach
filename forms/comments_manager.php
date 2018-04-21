<?php

switch ($_POST["action"]) {
  case create_comment:
    create_comment($CONNECT, $_POST["id_state"], $_POST["id_user"], $_POST["text"]);
    break;
  default:
    MessageToUser(3, 'Ошибка запроса!', '');
    break;
}




?>
