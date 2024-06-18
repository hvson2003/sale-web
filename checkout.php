<?php 
session_start();
require_once('./controller/checkout.php');
$controller = new Controller();
$task = isset($_GET['task']) ? $_GET['task'] : 'index';
switch ($task) {
	case 'error':
		$controller->error();
		break;
	case 'index':
		$controller->index();
		break;
	case 'addorder':
		$controller->addorder();
		break;
	case 'success':
		$controller->success();
		break;
	case 'bkss':
		$controller->bkss();
		break;
	default:
		$controller->index();
		break;
}

 ?>