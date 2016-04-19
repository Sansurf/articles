<?php

//
// Конттроллер страницы чтения
//

class C_Page extends C_Base
{

	// Подключение левой колонки
	public function left_view()
	{
		$articles = $this->articles_all();
		$this->left = $this->Template('v/v_left_view.php', array('articles'=>$articles));	
	}

	// Получение списка статей
	public function action_index()
	{
		$articles = $this->articles_all();
		$this->content = $this->Template('v/v_index.php', array('articles'=>$articles));	
	}
	
	// Получение одной статьи
	public function action_article()
	{
		if($this->isGet())
		{
			$article = $this->articles_get($_GET['id']);
			$this->title .= "::" .$article['title'];
			$this->h1 .= "::" .$article['title'];
			$this->content = $this->Template('v/v_article.php', array('article'=>$article));
		}	
	}
}

?>