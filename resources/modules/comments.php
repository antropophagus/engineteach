<div id="comments_block">
  <h1>Комментарии: </h1>
  <div class="create_comment">
  <? if ($_SESSION["USER_LOG_IN"] == 1) echo '
        <p><textarea name="comment_text" placeholder="Ваш комментарий..."></textarea></p>
        <p><button name="create_comment" type="button" class="button button-primary">Оставить комментарий</button></p>
        <br /><br />
  ';
    else echo '<h2>Оставлять комментарии могут только авторизированные пользователи!</h2>';
    ?>
  </div>
  <div id="comments_items">
  <?
    showComments($CONNECT, $Module);
  ?>
  </div>
</div>
<script>

$("button[name=create_comment]").click(function(){
  createComment(<? echo $_SESSION["USER_ID"]?>, <? echo $Module ?>);
});
</script>
