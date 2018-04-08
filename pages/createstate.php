<?php root(2); ?>
<html>
    <?php head(); ?>
    <body>
        <?php headerr(); ?>
        <?php MessageToUserShow(); ?>
        <div id="wrapper">
            <form method="POST" action="publisher/createstate">
            <p><label for="title">Заголовок: </label><input name="title" type="text" required></p>
            <p><label for="tags">Теги: </label><input name="tags" type="text" required></p>
            <p><label for="primary_text">Вступительный текст: </label><input name="primary_text" type="text" required></p>
            <p><label for="text">Текст: </label><textarea name="text" cols="30" rows="10"></textarea></p>
            <p><label for="cat">Выберете категорию: </label><select name="cat">
                   <option value="News" selected>News</option>
                   <option value="IT">IT</option>
                   <option value="Computer">Computer</option>
               </select>
            </p>
            <p><input name="submit" type="submit"></p>
        </form>
        </div>
        <?php footer(); ?>
    </body>
</html>
