<?php
include("models/ram.php");

class RamController
{
    public function index()
    {
        $pdo = pdo_connect_mysql();
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

        $records_per_page = 5;
        $stmt = $pdo->prepare('SELECT * FROM rams ORDER BY id DESC LIMIT :current_page, :record_per_page');
        $stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
        $stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
        $stmt->execute();

        $ram = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $num_ram = $pdo->query('SELECT COUNT(*) FROM rams')->fetchColumn();
        $number_page = $num_ram/$records_per_page;

        $ram = Ram::getAll();
        require 'views/ram/index.php'; //them index view ram
    }

    public function create()
    {
        require 'views/ram/create.php'; // them create view ram
    }

    public function store()
    {
        $ram = new Ram();
        $ram->setRamName(isset($_POST['name']) ? $_POST['name'] : '');
        $ram->setRamValue(isset($_POST['value']) ? $_POST['value'] : '');
        $ram->save();
        header('Location: index.php?controller=ram&action=index');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $ram = Ram::getById($id);
        require 'views/ram/edit.php';
    }

    public function detail()
    {
        $id = $_GET['id'];
        $ram = Ram::getById($id);
        require 'views/ram/detail.php';
    }

    public function update()
    {
        $id = $_POST['id'];
        $ram = new Ram();
        $ram->setRamName(isset($_POST['name']) ? $_POST['name'] : '');
        $ram->setRamValue(isset($_POST['value']) ? $_POST['value'] : '');
        $ram->update($id);
        header('Location: index.php?controller=ram&action=index');
    }
    public function delete()
    {
        $id = $_GET['id'];
        Ram::delete($id);
        header('Location: index.php?controller=ram&action=index');
    }
}
?>
