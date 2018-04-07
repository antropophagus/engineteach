<html>
  <head>
    <? head(); ?>
  </head>
  <body>
    <h2 style="margin-bottom: 15px;">Поиск пользователя: </h2>
    <input placeholder="Nickname" type="text" name="nickname"> или <input placeholder="Email" type="text" name="email"> <br>
    <input id="done" type="submit" name="search" value="Поиск">
    <div id="wrapper">

    </div>
  </body>
</html>
<script type="text/javascript">
  $('#done').click(function(){
    $.ajax ({
      url: "/admin/manager",
      type: "POST",
      data: ({nickname: $("input[name=nickname]").val(), email: $("input[name=email]").val()}),
      dataType: "html",
      success: function(data) {
        if(data == 'fail') {
          var error = '<p style="color: red;">Пользователь не найден!</p>';
          $("#wrapper").html(error);
        }
        else {
          var myarray = data.split ('&');
          //alert (myarray[1]);
          var user = '<p>ID: ' + myarray[0] + '</p><p>Email: ' + myarray[1] + '</p><p>Nickname: ' + myarray[2] + '</p><p>Reg.Date: ' + myarray[3] + '</p><p>Root: ' + myarray[4] + '</p>';
          $("#wrapper").html(user);
        }
        }

    });
  });
</script>
