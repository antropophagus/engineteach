<?php root(1); ?>
<html>
    <?php head(); ?>
    <body>
        <?php headerr(); ?>
        <?php MessageToUserShow(); ?>
        <div id="wrapper">
            <h2 style="margin-bottom: 30px;">Ваши данные:</h2>
            <p>Логин: <?php echo $_SESSION["USER_LOGIN"] ?></p>
            <p>Email: <?php echo $_SESSION["USER_EMAIL"] ?></p>
            <p>Nickname: <?php echo $_SESSION["USER_NICKNAME"] ?></p>
            <p>Дата регистрации: <?php echo $_SESSION["USER_REGDATE"] ?></p>
            <a class="button button-3d button-caution" href="account/logout">Выйти</a>
        </div>
        <?php footer(); ?>
    </body>
</html>
