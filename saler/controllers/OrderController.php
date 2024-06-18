<?php
include("models/order.php");

class OrderController
{
    public function index()
    {
        $pdo = pdo_connect_mysql();
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

        $records_per_page = 5;
        $stmt = $pdo->prepare('SELECT * FROM orders ORDER BY id DESC LIMIT :current_page, :record_per_page');
        $stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
        $stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
        $stmt->execute();

        $order = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $num_orders = $pdo->query('SELECT COUNT(*) FROM orders')->fetchColumn();
        $number_page = $num_orders/$records_per_page;

        $order = Order::getAll();
        require 'views/order/index.php'; //them index view ram
    }

    public function create()
    {
        require 'views/order/create.php'; // them create view ram
    }

    public function store()
    {
        $order = new Order();
        $order->setFullname(isset($_POST['fullname']) ? $_POST['fullname'] : '');
        $order->setEmail(isset($_POST['email']) ? $_POST['email'] : '');
        $order->setPhone(isset($_POST['phone']) ? $_POST['phone'] : '');
        $order->setAddress(isset($_POST['address']) ? $_POST['address'] : '');
        $order->setNote(isset($_POST['note']) ? $_POST['note'] : '');
        $order->setCreatedAt(isset($_POST['created_at']) ? $_POST['created_at'] : '');
        $order->setPayment(isset($_POST['payment']) ? $_POST['payment'] : '');
        $order->setTotal(isset($_POST['total']) ? $_POST['total'] : '');
        $order->setQuantity(isset($_POST['quantity']) ? $_POST['quantity'] : '');
        $order->setItem(isset($_POST['item']) ? $_POST['item'] : '');
        $order->setPayed(isset($_POST['payed']) ? $_POST['payed'] : '');
        $order->setActive(isset($_POST['active']) ? $_POST['active'] : '');
        $order->setUserId(isset($_POST['user_id']) ? $_POST['user_id'] : '');
        $order->save();
        header('Location: index.php?controller=order&action=index');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $order = Order::getById($id);
        require 'views/order/edit.php';
    }

    public function detail()
    {
        $id = $_GET['id'];
        $order = Order::getById($id);
        require 'views/order/detail.php';
    }

    public function update()
    {
        $id = $_POST['id'];
        $order = new Order();
        $order->setFullname(isset($_POST['fullname']) ? $_POST['fullname'] : '');
        $order->setEmail(isset($_POST['email']) ? $_POST['email'] : '');
        $order->setPhone(isset($_POST['phone']) ? $_POST['phone'] : '');
        $order->setAddress(isset($_POST['address']) ? $_POST['address'] : '');
        $order->setNote(isset($_POST['note']) ? $_POST['note'] : '');
        $order->setCreatedAt(isset($_POST['created_at']) ? $_POST['created_at'] : '');
        $order->setPayment(isset($_POST['payment']) ? $_POST['payment'] : '');
        $order->setTotal(isset($_POST['total']) ? $_POST['total'] : '');
        $order->setQuantity(isset($_POST['quantity']) ? $_POST['quantity'] : '');
        $order->setItem(isset($_POST['item']) ? $_POST['item'] : '');
        $order->setPayed(isset($_POST['payed']) ? $_POST['payed'] : '');
        $order->setActive(isset($_POST['active']) ? $_POST['active'] : '');
        $order->setUserId(isset($_POST['user_id']) ? $_POST['user_id'] : '');
        $order->update($id);
        header('Location: index.php?controller=order&action=index');
    }
    public function delete()
    {
        $id = $_GET['id'];
        Order::delete($id);
        header('Location: index.php?controller=order&action=index');
    }
}
?>
