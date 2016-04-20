<?php

// check VCS

function __autoload($classname){
	include_once("c/$classname.php");
}

$action = 'action_';
$action .= (isset($_GET['act'])) ? $_GET['act'] : 'index';

$left = 'left_';
$left .= (isset($_GET['l'])) ? $_GET['l'] : 'view';

if (isset($_GET['c']))
{
	switch ($_GET['c'])
	{
		case 'C_Page':
			$controller = new C_Page();
			break;
		case 'C_Edit':
			$controller = new C_Edit();
			break;
		default:
			$controller = new C_Page();
	}
}
else
{
	$controller = new C_Page();
}
$controller->Request($action, $left);


?>
