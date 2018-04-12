<?php root(0); ?>
<html>
    <?php head(); ?>
    <body>
        <?php headerr(); ?>
        <?php MessageToUserShow(); ?>
        <div id="wrapper">
            <form method="POST" action="account/register">
            <p><label for="login">Логин: </label><input name="login" type="text" required></p>
            <p><label for="email">E-mail: </label><input name="email" type="email" required></p>
            <p><label for="password">Пароль: </label><input name="password" type="password" required></p>
            <p><label for="sec_password">Повторите пароль: </label><input name="sec_password" type="password" required></p>
            <p><label for="nickname">Nickname: </label><input name="nickname" type="text" required></p>
            <p><input name="submit" type="submit"></p>
        </form>
        </div>
        <?php footer(); ?>
    </body>
</html>
