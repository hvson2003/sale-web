<?php 
session_start();
require_once('./controller/cart.php');
$controller = new Controller();
$task = isset($_GET['task']) ? $_GET['task'] : 'index';
switch ($task) {
	case 'error':
		$controller->error();
		break;
	case 'index':
		$controller->index();
		break;
	case 'addtocart':
		$controller->addtocart();
		break;
	case 'addtocartajax':
		$controller->addtocartajax();
		break;
	case 'removeitem':
		$controller->removeitem();
		break;
	case 'updatecart':
		$controller->updatecart();
		break;
	default:
		$controller->index();
		break;
}

 ?>