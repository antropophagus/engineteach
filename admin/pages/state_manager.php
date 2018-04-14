<html>
  <head>
    <? head(); ?>
  </head>
  <body>
    <div id="sidebar" style="background-color: #0d0d0d; width: 14%; height: 96%; padding: 1%;  float: left;">
      <p><h2>Меню администрации: </h2></p>
      <ul style="margin-top: 35px;">
        <li style="margin-bottom: 25px; font-size: 1.2em;"><a href="/<? echo $Page; ?>">Главная меню администрации</a></li>
        <li style="margin-bottom: 25px; font-size: 1.2em;"><a href="/<? echo $Page; ?>/state_manager">Менеджер статей</a></li>
        <li style="margin-bottom: 25px; font-size: 1.2em;"><a href="/<? echo $Page; ?>/user_manager">Менеджер пользователей</a></li>
      </ul>
    </div>

    <br>
    <div id="wrapper" style="width: 40%;">
        <h2 style="margin-bottom: 15px;">Менеджер статей: </h2>
        <div class="button-group">
            <button type="button" class="button button-primary">Создать статью</button>
            <button type="button" class="button button-primary">Поиск статей</button>
            <button type="button" class="button button-primary">Вывод всех статей</button>
        </div>
    </div>
    <div class="forms">

    </div>
    <div class="results">

    </div>
  </body>
</html>
<script type="text/javascript">

  $(".button-group button:first").click(function(){
    $('.forms').html('<p><input class="input_createstate" name="title" type="text" required placeholder="Заголовок"></p><p><input class="input_createstate" name="primary_text" type="text" required placeholder="Вступительный текст"></p><p><textarea class="input_createstate" name="text" cols="30" rows="10" placeholder="Текст"></textarea></p><p><select name="cat"><option value="1" selected>IT</option><option value="2">News</option><option value="3">Games</option><option value="4">Hacking</option></select></p><p><button name="submit" class="button button-pill button-primary">Создать статью</button>');
  });
  $("button[name=submit]").live('click', function(){
    if (($("input[name=title]").val() == '') || ($("input[name=primary_text]").val() == '') || ($("textarea[name=text]").val() == '') || ($("select[name=cat]").val() == '')) alert('Ошибка валидации');
    else {
    $.ajax({
      url: "/admin/manager",
      type: "POST",
      data: ({title: $("input[name=title]").val(), primary_text: $("input[name=primary_text]").val(), text: $("textarea[name=text]").val(), category: $("select[name=cat]").val(), action: 'createstate'}),
      dataType: "html",
      success: function(data) {
        if (data == 'success') {alert('Статья успешно создана!'); $('.input_createstate').val('');}
        else alert('Ошибка!');
      }
    })
  }
});
</script>
