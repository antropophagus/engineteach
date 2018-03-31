<?php root(1); ?>
<html>
    <?php head(); ?>
    <body>
        <?php headerr(); ?>
        <?php MessageToUserShow(); ?>
        <div id="wrapper">
            <h3>Ваши данные:</h3>
            Логин: <?php echo $_SESSION["USER_LOGIN"] ?> <br>
            Email: <?php echo $_SESSION["USER_EMAIL"] ?> <br>
            Nickname: <?php echo $_SESSION["USER_NICKNAME"] ?> <br>
            Дата регистрации: <?php echo $_SESSION["USER_REGDATE"] ?> <br>
            <a href="account/logout">Выйти</a>
        </form>
        </form>
        </div>
        <?php footer(); ?>
    </body>
</html>