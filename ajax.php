<?php 
session_start();
require_once('./controller/ajax.php');
$controller = new Controller();
$task = isset($_GET['task']) ? $_GET['task'] : 'index';
switch ($task) {
	case 'uploadimage':
		$controller->uploadimage();
		break;
	case 'removeimage':
		$controller->removeimage();
		break;
	case 'addtocart':
		$controller->addtocart();
		break;
	case 'checksoluong':
		$controller->checksoluong();
		break;
	default:
		$controller->error();
		break;
}

 ?>