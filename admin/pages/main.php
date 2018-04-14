<html>
    <? head(); ?>
    <body>
        <? MessageToUserShow(); ?>
        <? showAdminMenu();?>
        <div id="wrapper" style="width: 80%;  float: right;">
          <h1>Добро пожаловать, <? echo $_SESSION["USER_NICKNAME"]; ?></h1>
        </div>

    </body>
</html>
