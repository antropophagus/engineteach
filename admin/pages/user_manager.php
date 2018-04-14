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

    <!-- <div id="wrapper2" style="padding: 2%; width:auto; float: left; height: calc(79% - 71px); background-color:#171717;"> -->

    <!-- </div> -->
    <br>
    <div id="wrapper" style="width: 40%;">
      <h2 style="margin-bottom: 15px;">Поиск пользователя: </h2>
      <input placeholder="Nickname" type="text" name="nickname"> или <input placeholder="Email" type="text" name="email"> <br>
      <input type="submit" name="search" value="Поиск">
    <div class="results"></div>
    </div>
  </body>
</html>
<script type="text/javascript">
var myarray;
function ShowUser() {
  $.ajax ({
    url: "/admin/manager",
    type: "POST",
    data: ({nickname: $("input[name=nickname]").val(), action: 'search', email: $("input[name=email]").val()}),
    dataType: "html",
    success: function(data) {
      if(data == 'fail') {
        var error = '<h2 style="color: red;">Пользователь не найден!</h2>';
        $(".results").html(error);
      }
      else {
        myarray = data.split ('&');
        var user = '<p>ID: ' + myarray[0] + '</p><p>Email: ' + myarray[1] + '</p><p>Nickname: ' + myarray[2] + '</p><p>Reg.Date: ' + myarray[3] + '</p><p>Root: ' + myarray[4] + '<select id="root" name="root"><option disabled selected>root</option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option></select></p>';
        $(".results").html(user);
      }
      }
  });
}
function ChangeUserRoot () {
  $.ajax ({
      url: "/admin/manager",
      type: "POST",
      data: ({root: $("#root").val(), action: 'change', id: myarray[0]}),
      dataType: "html",
      success: function(data) {
        if (data == 'success') ShowUser();
        else alert("Error!");
      }
  });
}
  $("input[name=search]").click(function(){
    ShowUser();
  });

  $("#root").live('change', function(){
    ChangeUserRoot();
  });
</script>
