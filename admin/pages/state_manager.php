<html>
  <head>
    <? head(); ?>
  </head>
  <body>
<? showAdminMenu();?>
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
    $('.forms').html('<p><input class="input_createstate" name="title" type="text" required placeholder="Заголовок"></p><p><input class="input_createstate" name="primary_text" type="text" required placeholder="Вступительный текст"></p><p><textarea class="input_createstate" name="text" cols="30" rows="10" placeholder="Текст"></textarea></p><p><select name="cat"><option value="1" selected>IT</option><option value="2">News</option><option value="3">Games</option><option value="4">Hacking</option></select></p><p><button name="createstate" class="button button-pill button-primary">Создать статью</button></p>');
  });
  $(".button-group button:eq(1)").click(function(){
    $('.forms').html('<p><input type="text" name="title"  placeholder="Заголовок"/></p><p><button name="search" class="button button-pill button-primary"><i class="fas fa-search"></i></button></p>');
  });
  $(".button-group button:last").click(function(){
    $.ajax({
      url: "/admin/manager",
      type: "POST",
      data: ({action: 'showstates'}),
      dataType: "html",
      success: function(data) {
        if (data == 'fail') {
          var error = '<h2 style="color: red;">Не удалось вывести статью</h2>';
          $(".results").html(error);
        }
        else {
          $(".results").html(data);
        }
      }
    })
  });
  $("button[name=createstate]").live('click', function(){
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
  $("button[name=search]").live('click', function(){
    if ($("input[name=title]").val() == '') alert ('Ошибка валидации формы!');
    else {
      $.ajax({
        url: "/admin/manager",
        type: "POST",
        data: ({action: 'searchstate', title: $("input[name=title]").val() }),
        dataType : "html",
        success: function(data) {
          if (data == "fail") {
            var error = '<h2 style="color: red;">Статья не найдена!</h2>';
            $(".results").html(error);
          }
          else {
            myarray = data.split ('&');
            var state = '<a href="/state/'+ myarray[0] + '"><h2>' + myarray[1] + '</h2></a><p>' + myarray[2] + '</p>';
            $(".results").html(state);
          }
        }
      })
    }
  });
</script>
