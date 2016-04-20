<?php

/**
 *
 * Драйвер БД
 *
 */

/**
 * Определение констант
 */
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "my_blog");

class M_DriverDB
{
	private $link;
	private static $instance;

	/**
	 * В конструкторе создаем подключение к БД,
	 * задаем языковые настройки и локаль
	 */
	private function __construct()
	{
		// Языковая настройка.
		setlocale(LC_ALL, 'ru_RU.UTF-8'); // Устанавливаем нужную локаль (для дат, денег, запятых и пр.)
		mb_internal_encoding('UTF-8'); // Устанавливаем кодировку строк
		
		// Подключение к БД.
		$this->link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Error: ". mysqli_error($this->link));

		mysqli_query($this->link, 'SET NAMES utf8');
	}

	/**
	 * Проверка на существование экземпляра класса
	 * и если не существует, то
	 * Получение экземпляра класса
	 */

	public static function GetInstance()
	{
		if (self::$instance == null) self::$instance = new M_DriverDB();
		return self::$instance;
	}

	/**
	 * Шаблон запроса SELECT
	 */
	public function All_records($table)
	{
		$result = mysqli_query($this->link, "SELECT * FROM " .$table);
		if (!$result) die("Error: " .mysqli_error($this->link));

		$count = mysqli_num_rows($result);
		$rows = array();
		for ($i=0; $i < $count; $i++) { 
			$rows[] = mysqli_fetch_assoc($result);
		}

		return $rows;
	}

	public function One_article($sql)
	{
		$result = mysqli_query($this->link, $sql);
		if (!$result) die("Error: " .mysqli_error($this->link));

		$article = mysqli_fetch_assoc($result);
		return $article;
	}

	/**
	 * Шаблон запроса INSERT
	 */
	public function Insert($table, $object)
	{
		$result = mysqli_query($this->link, $sql);
		if (!$result) die("Error: " .mysqli_error($link));

		$object = array($key=>$value);
		$sql = "INSERT INTO $table ($key) VALUES ($value)";


	}
}

?>