<?php 
session_start();
require_once('./controller/index.php');
$controller = new Controller();
$task = isset($_GET['task']) ? $_GET['task'] : 'index';
switch ($task) {
	case 'index':
		$controller->index();
		break;
	case 'aboutus':
		$controller->aboutus();
		break;
	case 'contactus':
		$controller->contactus();
		break;
	default:
		$controller->index();
		break;
}

 ?>