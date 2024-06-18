<?php 
session_start();
require_once('./controller/blog.php');
$controller = new Controller();
$task = isset($_GET['id']) ? 'id' : 'index';
switch ($task) {
	case 'index':
		$controller->index();
		break;
	case 'id':
		$controller->detail();
		break;
}

 ?>