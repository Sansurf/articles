<?php

/*Шаблон главной страницы
=======================
$articles - список статей

статья:
id_article - идентификатор
title - заголвок
content - текст*/

?>

<b>Главная страница</b>
<ul>
    <?php foreach ($articles as $article): ?>
        <li>
            <b><u><?=$article['title'];?></u></b>
            <br />
            <?php
	            $str = explode (" ", $article['content']);
	            $arr = array_slice($str, 0, 15);
	            echo implode(" ", $arr). "...";
            ?>
            <br />
            <i><a href="index.php?id=<?=$article['id_article']?>&l=view&act=article&c=C_Page">
            	Читать далее...</a></i>
            <br /><br />
        </li>
    <?php endforeach; ?>
</ul><br />
