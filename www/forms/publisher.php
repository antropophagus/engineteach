<?php
if ($Module == 'createstate' and $_POST["submit"]) {
    $title = FormChars($_POST["title"]);
    $tags = FormChars($_POST["tags"]);
    $primary_text = FormChars($_POST["primary_text"]);
    $text = FormChars($_POST["text"]);
    mysqli_query ($CONNECT, "INSERT INTO `states` VALUES ('','$title','$tags','$primary_text','$text', NOW())");
    MessageToUser(2, 'Статья успешно создана!');
    header('Location: /createstate');
}




?>