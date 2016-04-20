<?/*
Шаблон вывода одной статьи
=======================
$title - заголовок
$content - содержание
*/?>

<a href="index.php">Главная</a> |

<hr/>
<b><?=$article["title"]?></b><br />
<p><?=str_replace("\n", "<br />", $article['content'])?></p>

<b>Оставить отзыв:</b>
<br />
<form method="post">
	Ваше имя:
	<input type="text" name="name">
	<br /><br />
	Ваш отзыв:
	<textarea name="feedback"></textarea>
	<br />
	<input type="submit" value="Отправить" />
</form>