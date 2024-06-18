<?php 
session_start();
require_once('./controller/category.php');
$controller = new Controller();
$task = isset($_GET['id']) ? $_GET['id'] : 'error';
switch ($task) {
	case 'error':
		$controller->error();
		break;
	default:
		$controller->index();
		break;
}

 ?>