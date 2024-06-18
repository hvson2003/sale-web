<?php
include("models/memory.php");

class MemoryController
{
    public function index()
    {
        $pdo = pdo_connect_mysql();
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

        $records_per_page = 5;
        $stmt = $pdo->prepare('SELECT * FROM memories ORDER BY id DESC LIMIT :current_page, :record_per_page');
        $stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
        $stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
        $stmt->execute();

        $memory = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $num_memory = $pdo->query('SELECT COUNT(*) FROM memories')->fetchColumn();
        $number_page = $num_memory/$records_per_page;

        $memory = Memory::getAll();
        require 'views/memory/index.php'; //them index view ram
    }

    public function create()
    {
        require 'views/memory/create.php'; // them create view ram
    }

    public function store()
    {
        $memory = new Memory();
        $memory->setMemoryName(isset($_POST['name']) ? $_POST['name'] : '');
        $memory->setMemoryValue(isset($_POST['value']) ? $_POST['value'] : '');
        $memory->save();
        header('Location: index.php?controller=memory&action=index');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $memory = Memory::getById($id);
        require 'views/memory/edit.php';
    }

    public function detail()
    {
        $id = $_GET['id'];
        $memory = Memory::getById($id);
        require 'views/memory/detail.php';
    }

    public function update()
    {
        $id = $_POST['id'];
        $memory = new Memory();
        $memory->setMemoryName(isset($_POST['name']) ? $_POST['name'] : '');
        $memory->setMemoryValue(isset($_POST['value']) ? $_POST['value'] : '');
        $memory->update($id);
        header('Location: index.php?controller=memory&action=index');
    }
    public function delete()
    {
        $id = $_GET['id'];
        Memory::delete($id);
        header('Location: index.php?controller=memory&action=index');
    }
}
?>
