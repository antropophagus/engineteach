<?
$email = $_POST["email"];
$nickname = $_POST["nickname"];
$Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `id`, `email`, `nickname`, `reg_date`, `root_rules` FROM `users` WHERE `email` = '$email'"));
if (!$Row) $Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `id`, `email`, `nickname`, `reg_date`, `root_rules` FROM `users` WHERE `nickname` = '$nickname'"));
if (!$Row) echo 'fail';
else echo $Row = implode ('&', $Row);



?>
