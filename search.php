<?php 
session_start();
require_once('./controller/search.php');
$controller = new Controller();
$task = isset($_GET['keyword']) ? $_GET['keyword'] : 'error';
switch ($task) {
	case 'error':
		$controller->error();
		break;
	default:
		$controller->index();
		break;
}

 ?>