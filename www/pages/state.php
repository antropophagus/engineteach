<html>
    <?php head(); ?>
    <body>
        <?php headerr(); ?>
        <?php MessageToUserShow(); ?>
        <div id="wrapper">
            <? 
            ShowState($CONNECT, $Module);
            ?>
        </div>
        <?php footer(); ?>
    </body>
</html>