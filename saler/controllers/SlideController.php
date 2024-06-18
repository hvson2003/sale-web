<?php
include("models/slide.php");

class SlideController
{
    public function index()
    {
        $pdo = pdo_connect_mysql();
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

        $records_per_page = 5;
        $stmt = $pdo->prepare('SELECT * FROM slides ORDER BY id DESC LIMIT :current_page, :record_per_page');
        $stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
        $stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
        $stmt->execute();

        $slides = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $num_slides = $pdo->query('SELECT COUNT(*) FROM slides')->fetchColumn();
        $number_page = $num_slides/$records_per_page;

        $slides = Slide::getAll();
        require 'views/slides/index.php';
    }

    public function create()
    {
        require 'views/slides/create.php';
    }

    public function store()
    {
        $slide = new Slide();
        $slide->setTitle(isset($_POST['title']) ? $_POST['title'] : '');
        $slide->setSubTitle(isset($_POST['sub_title']) ? $_POST['sub_title'] : '');
        $slide->setSlideDesc(isset($_POST['slide_desc']) ? $_POST['slide_desc'] : '');
        $slide->setImageUrl(isset($_POST['image_url']) ? $_POST['image_url'] : '');
        $slide->setButtonTitle(isset($_POST['button_title']) ? $_POST['button_title'] : '');
        $slide->setButtonUrl(isset($_POST['button_url']) ? $_POST['button_url'] : '');
        $slide->save();
        header('Location: index.php?controller=slide&action=index');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $slide = Slide::getById($id);
        require 'views/slides/edit.php';
    }

    public function detail()
    {
        $id = $_GET['id'];
        $slide = Slide::getById($id);
        require 'views/slides/detail.php';
    }

    public function update()
    {
        $id = $_POST['id'];

        $slide = new Slide();
        $slide->setTitle(isset($_POST['title']) ? $_POST['title'] : '');
        $slide->setSubTitle(isset($_POST['sub_title']) ? $_POST['sub_title'] : '');
        $slide->setSlideDesc(isset($_POST['slide_desc']) ? $_POST['slide_desc'] : '');
        $slide->setImageUrl(isset($_POST['image_url']) ? $_POST['image_url'] : '');
        $slide->setButtonTitle(isset($_POST['button_title']) ? $_POST['button_title'] : '');
        $slide->setButtonUrl(isset($_POST['button_url']) ? $_POST['button_url'] : '');
        $slide->update($id);

        header('Location: index.php?controller=slide&action=index');
    }

    public function delete()
    {
        $id = $_GET['id'];
        Slide::delete($id);
        header('Location: index.php?controller=slide&action=index');
    }
}
?>
