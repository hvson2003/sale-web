<?php
include("models/config.php");

class ConfigController
{
    public function index()
    {
        $pdo = pdo_connect_mysql();
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

        $records_per_page = 5;
        $stmt = $pdo->prepare('SELECT * FROM configs ORDER BY id DESC LIMIT :current_page, :record_per_page');
        $stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
        $stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
        $stmt->execute();

        $config = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $num_config = $pdo->query('SELECT COUNT(*) FROM configs')->fetchColumn();
        $number_page = $num_config/$records_per_page;

        $config = Config::getAll();
        require 'views/config/index.php';
    }

    public function create()
    {
        require 'views/config/create.php'; 
    }

    public function store()
    {
        $config = new Config();
        $config->Setconfigkey(isset($_POST['config_key']) ? $_POST['config_key'] : '');
        $config->SetconfigValue(isset($_POST['config_value']) ? $_POST['config_value'] : '');
        $config->Setconfigdesc(isset($_POST['config_desc']) ? $_POST['config_desc'] : '');

        $config->save();
        header('Location: index.php?controller=config&action=index');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $config = Config::getById($id);
        require 'views/config/edit.php';
    }

    public function detail()
    {
        $id = $_GET['id'];
        $config = Config::getById($id);
        require 'views/config/detail.php';
    }

    public function update()
    {
        $id = $_POST['id'];
        $config = new Config();
        $config->Setconfigkey(isset($_POST['config_key']) ? $_POST['config_key'] : '');
        $config->SetconfigValue(isset($_POST['config_value']) ? $_POST['config_value'] : '');
        $config->Setconfigdesc(isset($_POST['config_desc']) ? $_POST['config_desc'] : '');
        $config->update($id);
        header('Location: index.php?controller=config&action=index');
    }
    public function delete()
    {
        $id = $_GET['id'];
        Config::delete($id);
        header('Location: index.php?controller=config&action=index');
    }
}
?>
