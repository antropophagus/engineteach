<?php root(0); ?>
<html>
    <?php head(); ?>
    <body>
        <?php headerr(); ?>
        <?php MessageToUserShow(); ?>
        <div id="wrapper">
            <form method="POST" action="account/register">
            <p><input name="login" type="text" required placeholder="Login"></p>
            <p><input name="email" type="email" required placeholder="E-mail"></p>
            <p><input name="password" type="password" required placeholder="Password"></p>
            <p><input name="sec_password" type="password" required placeholder="Repeat Password"></p>
            <p><input name="nickname" type="text" required placeholder="Nickname"></p>
            <p><input class="button button-pill button-primary" name="submit" type="submit" value="Registration"></p>
        </form>
        </div>
        <?php footer(); ?>
    </body>
</html>
