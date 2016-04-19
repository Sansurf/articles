<!-- Левая колонка в режиме просмотра статей -->
<ul>
<?php foreach ($articles as $article):?>
    <li>
        <a href="index.php?id=<?=$article['id_article']?>&act=article&c=C_Page">
            <?=$article['title'];?>
        </a><br /><br />
    </li>
<?php endforeach; ?>
</ul><br /><hr />
<a href="index.php?l=edit&act=new&c=C_Edit">Консоль редактора</a>