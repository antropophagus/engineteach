<?php
$array = SortLogic($Module, $Param, $CONNECT);
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
            <? Show_Cat_Nav($CONNECT); ?>
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
                ShowStates($CONNECT, $array[0], $array[1]);
             ?>
        </div>

        <?php footer(); ?>
    </body>
</html>
