<?php
include_once 'config.php';
?>
<?=template_footer()?>

<?php
session_start();
if($_SESSION["logined"] != true || $_SESSION['role'] != 1){ header("Location: index.html"); }

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'dashboard';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controllerClass = ucfirst($controller) . 'Controller';
$controllerFile = "controllers/$controllerClass.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerInstance = new $controllerClass();
    $controllerInstance->$action();
} else {
    echo "Controller not found.";
}
?>