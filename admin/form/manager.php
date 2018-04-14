<?
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
    case searchstate:
      search_state($CONNECT, $_POST["title"]);
    break;
    case showstates:
      ShowStates($CONNECT, '', '`create_date` DESC');
    break;

    default:
      MessageToUser(3, 'Ошибка запроса!', '/admin');
      break;
  }



?>
