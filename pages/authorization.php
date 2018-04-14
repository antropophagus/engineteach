<?php root(0); ?>
<html>
    <?php head(); ?>
    <body>
        <?php headerr(); ?>
        <?php MessageToUserShow(); ?>
        <div id="wrapper">
            <form method="POST" action="account/authorization">
            <p><input name="login" type="text" required placeholder="Login"></p>
            <p><input name="password" type="password" required placeholder="Password"></p>
            <p><label for="remember_me">Remember me: </label><input name="remember_me" type="checkbox"></p>
            <p><input class="button button-pill button-primary" name="submit" type="submit" value="Login"></p>
        </form>
        </div>
        <?php footer(); ?>
    </body>
</html>
