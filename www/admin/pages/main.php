<html>
    <? head(); ?>
    <body>
        <? MessageToUserShow(); ?>
        <div id="wrapper" style="width: 80%;  float: right;">
          <h1>Добро пожаловать, <? echo $_SESSION["USER_NICKNAME"]; ?></h1>
        </div>
        <div id="sidebar" style="background-color: #0d0d0d; width: 14%; height: 96%; padding: 1%;  float: left;">
          <p><h2>Меню администрации: </h2></p>
          <ul style="margin-top: 35px;">
            <li style="margin-bottom: 25px; font-size: 1.2em;"><a href="/<? echo $Page; ?>">Главная меню администрации</a></li>
            <li style="margin-bottom: 25px; font-size: 1.2em;"><a href="/<? echo $Page; ?>/state_manager">Менеджер статей</a></li>
            <li style="margin-bottom: 25px; font-size: 1.2em;"><a href="/<? echo $Page; ?>/user_manager">Менеджер пользователей</a></li>
          </ul>
        </div>
    </body>
</html>
