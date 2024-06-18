<?php 
session_start();
require_once('./controller/product.php');
$controller = new Controller();
$task = isset($_GET['task']) ? $_GET['task'] : 'index';
switch ($task) {
	case 'error':
		$controller->error();
		break;
	case 'addcomment':
		$controller->addcomment();
		break;
	default:
		$controller->index();
		break;
}

 ?>