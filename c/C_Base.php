<?php

/**
 *
 * Базовый контроллер сайта.
 *
 */

/**
 * Подключение драйвера БД
 */
require_once('m/M_DriverDB.php');


abstract class C_Base extends C_Controller
{
	protected $title;		// Title страницы
	protected $content;		// содержание страницы
	protected $h1;			// Заголовок страницы
	protected $left;		// Левая колонка
	
	/**
	 * Запрос в БД на вывод всех статей
	 */
	protected function articles_all()
	{

		$sql = M_DriverDB::GetInstance();
		$articles = $sql->All_records("articles");
		return $articles;
		
	}

	/**
	 * Получение одной статьи из БД
	 */
	protected function article_get($id)
	{
		$sql = M_DriverDB::GetInstance();
		$article = $sql->One_article("SELECT * FROM articles WHERE id_article =" .$id);
		return $article;

		// $query = "SELECT * FROM articles WHERE id_article =" .$id;
		// $result = mysql_query($query);
								
		// if (!$result) 
		// 	die(mysql_error());
		
		// $article = mysql_fetch_assoc($result);		
			
		// return $article;
	}
	
	protected function before()
	{
		$this->title = 'Мой блог';
		$this->h1 = 'Мой блог';
		$this->content = '';
		$this->left = '';
	}
	
	//
	// Генерация базового шаблона
	//	
	public function render()
	{
		$vars = array('title'=>$this->title, 'content'=>$this->content, 'h1'=>$this->h1, 'left'=>$this->left);	
		$page = $this->Template('v/v_main.php', $vars);				
		echo $page;

	}	
}

?>