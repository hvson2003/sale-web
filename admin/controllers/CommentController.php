<?php
include("models/comment.php");
include("models/product.php");

class CommentController
{
    public function index()
    {
        $pdo = pdo_connect_mysql();
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

        $records_per_page = 5;
        $stmt = $pdo->prepare('SELECT * FROM comments ORDER BY id DESC LIMIT :current_page, :record_per_page');
        $stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
        $stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
        $stmt->execute();

        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $num_comments = $pdo->query('SELECT COUNT(*) FROM comments')->fetchColumn();
        $number_page = $num_comments/$records_per_page;

        $products = Product::getAll();
        $comments = Comment::getAll();
        require 'views/comments/index.php';
    }

    public function create()
    {
        require 'views/comments/create.php';
    }

    public function store()
    {
        $comment = new Comment();
        $comment->setName(isset($_POST['name']) ? $_POST['name'] : '');
        $comment->setEmail(isset($_POST['email']) ? $_POST['email'] : '');
        $comment->setContent(isset($_POST['content']) ? $_POST['content'] : '');
        $comment->setCreatedAt(isset($_POST['created_at']) ? $_POST['created_at'] : '');
        $comment->setProductId(isset($_POST['product_id']) ? $_POST['product_id'] : '');
        $comment->save();
        header('Location: index.php?controller=comment&action=index');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $comment = Comment::getById($id);
        require 'views/comments/edit.php';
    }

    public function detail()
    {
        $id = $_GET['id'];
        $products = Product::getAll();
        $comment = Comment::getById($id);
        require 'views/comments/detail.php';
    }

    public function update()
    {
        $id = $_POST['id'];

        $comment = new Comment();
        $comment->setName(isset($_POST['name']) ? $_POST['name'] : '');
        $comment->setEmail(isset($_POST['email']) ? $_POST['email'] : '');
        $comment->setContent(isset($_POST['content']) ? $_POST['content'] : '');
        $comment->setCreatedAt(isset($_POST['created_at']) ? $_POST['created_at'] : '');
        $comment->setProductId(isset($_POST['product_id']) ? $_POST['product_id'] : '');
        $comment->update($id);

        header('Location: index.php?controller=comment&action=index');
    }

    public function delete()
    {
        $id = $_GET['id'];
        Comment::delete($id);
        header('Location: index.php?controller=comment&action=index');
    }
}
?>
