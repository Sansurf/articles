<?php

/**
 *
 * Базовый контроллер сайта.
 *
 */

abstract class C_Base extends C_Controller
{
	protected $title;		// Title страницы
	protected $content;		// содержание страницы
	protected $h1;			// Заголовок страницы
	protected $left;		// Левая колонка

	/**
	 * В конструкторе создаем подключение к БД,
	 * задаем языковые настройки и локаль
	 */
	function __construct()
	{
		// Настройки подключения к БД.
		$hostname = 'localhost'; 
		$username = 'root'; 
		$password = '';
		$dbName = 'my_blog';
		
		// Языковая настройка.
		setlocale(LC_ALL, 'ru_RU.UTF-8'); // Устанавливаем нужную локаль (для дат, денег, запятых и пр.)
		mb_internal_encoding('UTF-8'); // Устанавливаем кодировку строк
		
		// Подключение к БД.
		mysql_connect($hostname, $username, $password) or die('No connect with data base'); 
		mysql_query('SET NAMES utf8');
		mysql_select_db($dbName) or die('No data base');

		// Открытие сессии.
		session_start();
	}
	/**
	 * Запрос в БД на вывод всех статей
	 */
	protected function articles_all()
	{
		// Запрос.
		$query = "SELECT * FROM articles";
		$result = mysql_query($query);
								
		if (!$result)
			die(mysql_error());
		
		// Извлечение из БД.
		$n = mysql_num_rows($result);
		$articles = array();

		for ($i = 0; $i < $n; $i++)
		{
			$row = mysql_fetch_assoc($result);		
			$articles[] = $row;
		}
		return $articles;
	}

	/**
	 * Получение одной статьи из БД
	 */
	protected function articles_get($id)
	{
	// Запрос.
		$query = "SELECT * FROM articles WHERE id_article =" .$id;
		$result = mysql_query($query);
								
		if (!$result) 
			die(mysql_error());
		
		$article = mysql_fetch_assoc($result);		
			
		return $article;
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