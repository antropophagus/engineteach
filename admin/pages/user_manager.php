<html>
  <head>
    <? head(); ?>
  </head>
  <body>
    <? showAdminMenu();?>
    <br>
    <div id="wrapper" style="width: 40%;">
      <h2 style="margin-bottom: 15px;">Поиск пользователя: </h2>
      <input placeholder="Nickname" type="text" name="nickname"><p>или</p><input placeholder="Email" type="text" name="email"> <br>
      <p><button name="search" class="button button-pill button-primary"><i class="fas fa-search"></i></button></p> <br><br>
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
        var user = '<p>ID: ' + myarray[0] + '</p><p>Email: ' + myarray[1] + '</p><p>Nickname: ' + myarray[2] + '</p><p>Reg.Date: ' + myarray[3] + '</p><p>Root: ' + myarray[4] + ' <select style="float: none;" id="root" name="root"><option disabled selected>root</option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option></select></p>';
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
  $("button[name=search]").click(function(){
    ShowUser();
  });

  $("#root").live('change', function(){
    ChangeUserRoot();
  });
</script>
