<html>
    <?php head(); ?>
    <body>
        <?php headerr(); ?>
        <?php MessageToUserShow(); ?>
        <div id="wrapper">
            <?
            ShowState($CONNECT, $Module);
            include '../resources/modules/comments.php';
            ?>

        </div>
        <?php footer(); ?>
    </body>
</html>
