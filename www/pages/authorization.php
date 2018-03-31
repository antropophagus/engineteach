<?php root(0); ?>
<html>
    <?php head(); ?>
    <body>
        <?php headerr(); ?>
        <?php MessageToUserShow(); ?>
        <div id="wrapper">
            <form method="POST" action="account/authorization">
            <p><label for="login">Логин: </label><input name="login" type="text" required></p>
            <p><label for="password">Пароль: </label><input name="password" type="password" required></p>
            <p><label for="remember_me">Запомнить меня: </label><input name="remember_me" type="checkbox"></p>
            <p><input name="submit" type="submit"></p>
        </form>
        </div>
        <?php footer(); ?>
    </body>
</html>