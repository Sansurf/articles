<!-- Левая колонка в режиме редактора -->

<?php foreach ($articles as $article):?>
    <li>
        <a href="index.php?id=<?=$article['id_article']?>&l=edit&act=edit&c=C_Edit">
            <?=$article['title'];?>
        </a>
        <br />

        <a href="index.php?id=<?=$article['id_article']?>&l=edit&act=edit&c=C_Edit"
        	style="color:red; font-size:x-small;">Редактировать</a> |

        <a href="index.php?del=<?=$article['id_article']?>&l=edit&act=del&c=C_Edit"
        	style="color:red; font-size:x-small; text-align:right">Удалить</a>
        	
        <br /><br />
    </li>
<?php endforeach; ?>
</ul><br /><hr />