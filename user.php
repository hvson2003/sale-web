<?php 
session_start();
require_once('./controller/user.php');
$controller = new Controller();
$task = isset($_GET['task']) ? $_GET['task'] : 'index';
switch ($task) {
	case 'index':
		$controller->index();
		break;
	case 'login':
		$controller->login();
		break;
	case 'register':
		$controller->register();
		break;
	case 'setting':
		$controller->setting();
		break;
	case 'logout':
		$controller->logout();
		break;
	default:
		$controller->index();
		break;
}

 ?>