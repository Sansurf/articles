<?php

//
// Конттроллер страницы редактирования
//

class C_Edit extends C_Base
{

	public function left_edit()
	{
		$articles = $this->articles_all();
		$this->left = $this->Template('v/v_left_edit.php', array('articles'=>$articles));	
	}

	// Получение списка статей
	public function action_editor()
	{
		$this->title .= '::Консоль редактора';
		$this->h1 .= '::Консоль редактора';
		$articles = $this->articles_all();
		$this->content = $this->Template('v/v_editor.php', array('articles'=>$articles));	
	}
	
	// Добавление статьи
	public function action_new()
	{
		$this->title .= "::Добавление новой статьи";
		$this->h1 .= "::Добавление новой статьи";	
		$this->content = $this->Template('v/v_new.php', array());
		if (isset($_POST['title']))
		{
			header('Location: index.php?l=edit&act=new&c=C_Edit');
						
			$title = trim($_POST['title']);
			$content = trim($_POST['content']);

			$t = "INSERT INTO articles (title, content) VALUES ('%s', '%s')";
			$query = sprintf($t, 
				mysql_real_escape_string($title),
			    mysql_real_escape_string($content));
			$result = mysql_query($query);
			if (!$result) die(mysql_error());
		}
		else
		{
			$title = '';
			$content = '';
		}
	}

	// Редактирование статьи
	public function action_edit()
	{
		$this->title .= "::Редактирование статьи";
		$this->h1 .= "::Редактирование статьи";
		
		// Получение статьи
		if (isset($_GET['id'])) 
		{
			$article = $this->articles_get($_GET['id']);
			$this->content = $this->Template("v/v_edit.php", array('article'=>$article));
		}

		// Обработка отправки формы.
		if (isset($_POST['title']))
		{
			header('Location: index.php?l=edit&act=new&c=C_Edit');

			$title = trim($_POST['title']);
			$content = trim($_POST['content']);
			$id_article = $_GET['id'];
			
			$t = "UPDATE articles SET title = '%s', content = '%s' WHERE id_article =" .$id_article;
			
			$query = sprintf($t, 
			                 mysql_real_escape_string($title),
			                 mysql_real_escape_string($content));
			
			$result = mysql_query($query);
									
			if (!$result) die(mysql_error());
		}
		else
		{
			$title = '';
			$content = '';
		}
	}

	// Удаление статьи
	public function	action_del()
	{ 
		if (isset($_GET['del']))
		{
			$del = $_GET['del'];
			$q = 'DELETE FROM articles WHERE `id_article` = ' .$del;
			mysql_query($q);
			header("Location: index.php?l=edit&act=new&c=C_Edit");
		}
	}
}

?>