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
      <p><button name="search_user" class="button button-pill button-primary"><i class="fas fa-search"></i></button></p> <br><br>
    <div class="results"></div>
    </div>
  </body>
</html>
