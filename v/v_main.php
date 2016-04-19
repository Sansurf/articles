<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title><?=$title?></title>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">	
	<link rel="stylesheet" type="text/css" media="screen" href="v/style.css" /> 
</head>
    <body>
        <h1><?=$h1?></h1>
        <hr />

        <!-- Левая колонка -->
    	<div class="left">
            <b>Список статей:</b>
            <?=$left?>
        </div>
        <!-- /Левая колонка -->
        

        <!-- Основной контент -->
        <div class="content"><?=$content?></div>
        <!-- /Основной контент -->


        <!-- Подвал -->
        <hr />
        <footer>
           <small><a href="http://prog-school.ru">Школа Программирования</a> &copy;</small>		
        </footer>
    </body>
</html>