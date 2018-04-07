<?php
$array = SortLogic($Module, $Param);
?>
<html>
    <?php head(); ?>
    <body>
        <?php headerr(); ?>
        <?php MessageToUserShow(); ?>
        <div id="wrapper">
            <div class="cat"><h2>Категории: </h2>
            <ul class="cat_list">
            <li><a href="/cat/all">Все</a></li>
            <li><a href="/cat/news">Новости</a></li>
            <li><a href="/cat/computer">Компьютеры</a></li>
            <li><a href="/cat/it">IT</a></li>
            </ul>
            </div>
            <div class="sort">
            <h2>Сортировать: </h2>
            <ul class="cat_list">
            <li><a href="/cat/<? echo $array[2]; ?>/sort/date_desc">Сначало новые</a></li>
            <li><a href="/cat/<? echo $array[2]; ?>/sort/date_asc">Сначало старые</a></li>
            <li><a href="/cat/<? echo $array[2]; ?>/sort/title_asc">А-Я</a></li>
            <li><a href="/cat/<? echo $array[2]; ?>/sort/title_desc">Я-А</a></li>
            </ul>
            </div>
            <?php
                echo $_SESSION["USER_ROOT_RULES"];
                ShowStates($CONNECT, $array[0], $array[1]);
             ?>
        </div>

        <?php footer(); ?>
    </body>
</html>
