<?/*
Шаблон страницы редактирования
=======================

*/?>

<a href="index.php">Главная</a> | <a href="index.php?l=edit&act=new&c=C_Edit">Добавление новой статьи</a>
<hr/>
	<h3 style="color:red">Исходная статья:</h3>
	<b><?=$article['title']?></b><br />
	<p><?php echo str_replace("\n", "<br />", $article['content'])?></p><hr/>

<h4 style="color:red">Внесите поправки в существующую статью:</h4>
<form method="post">
	Название:
	<br/>
	<input type="text" name="title" value="<?=htmlspecialchars($article['title'])?>" size=60 />
	<br/>
	<br/>
	Содержание:
	<br/>
	<textarea name="content"><?=$article['content']?></textarea>
	<br/>
	<input type="submit" value="Редактировать" />
</form>
	