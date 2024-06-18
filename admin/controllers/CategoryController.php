<?php
include("models/category.php");

class CategoryController
{
    public function index()
    {
        $pdo = pdo_connect_mysql();
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

        $records_per_page = 5;
        $stmt = $pdo->prepare('SELECT * FROM categories ORDER BY id DESC LIMIT :current_page, :record_per_page');
        $stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
        $stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
        $stmt->execute();

        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $num_categories = $pdo->query('SELECT COUNT(*) FROM categories')->fetchColumn();
        $number_page = $num_categories/$records_per_page;

        $categories = Category::getAll();
        require 'views/categories/index.php';
    }

    public function create()
    {
        require 'views/categories/create.php';
    }

    public function store()
    {
        $category = new Category();
        $category->setName(isset($_POST['name']) ? $_POST['name'] : '');
        $category->setCateDesc(isset($_POST['cate_desc']) ? $_POST['cate_desc'] : '');
        $category->setThumbnail(isset($_POST['thumbnail']) ? $_POST['thumbnail'] : '');
        $category->save();
        header('Location: index.php?controller=category&action=index');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $category = category::getById($id);
        require 'views/categories/edit.php';
    }

    public function detail()
    {
        $id = $_GET['id'];
        $category = category::getById($id);
        require 'views/categories/detail.php';
    }

    public function update()
    {
        $id = $_POST['id'];

        $category = new Category();
        $category->setName(isset($_POST['name']) ? $_POST['name'] : '');
        $category->setCateDesc(isset($_POST['cate_desc']) ? $_POST['cate_desc'] : '');
        $category->setThumbnail(isset($_POST['thumbnail']) ? $_POST['thumbnail'] : '');
        $category->update($id);

        header('Location: index.php?controller=category&action=index');
    }

    public function delete()
    {
        $id = $_GET['id'];
        Category::delete($id);
        header('Location: index.php?controller=category&action=index');
    }
}
?>
