<?php
include("models/user.php");

class UserController
{
    public function index()
    {
        $pdo = pdo_connect_mysql();
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

        $records_per_page = 5;
        $stmt = $pdo->prepare('SELECT * FROM users WHERE role != 0 ORDER BY id DESC LIMIT :current_page, :record_per_page');
        $stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
        $stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
        $stmt->execute();

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $num_users = $pdo->query('SELECT COUNT(*) FROM users WHERE role != 0')->fetchColumn();
        $number_page = $num_users/$records_per_page;
        require 'views/users/index.php';
    }

    public function create()
    {
        require 'views/users/create.php';
    }

    public function store()
    {
        $user = new User();
        $user->setUsername(isset($_POST['username']) ? $_POST['username'] : '');
        $user->setPassword(isset($_POST['password']) ? $_POST['password'] : '');
        $user->setFullname(isset($_POST['fullname']) ? $_POST['fullname'] : '');
        $user->setEmail(isset($_POST['email']) ? $_POST['email'] : '');
        $user->setAddress(isset($_POST['address']) ? $_POST['address'] : '');
        $user->setPhone(isset($_POST['phone']) ? $_POST['phone'] : '');
        $user->setRole(isset($_POST['role']) ? $_POST['role'] : '');
        $user->save();

        header('Location: index.php?controller=user&action=index');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $user = User::getById($id);
        require 'views/users/edit.php';
    }

    public function detail()
    {
        $id = $_GET['id'];
        $user = User::getById($id);
        require 'views/users/detail.php';
    }

    public function update()
    {
        $id = $_POST['id'];

        $user = new User();
        $user->setUsername(isset($_POST['username']) ? $_POST['username'] : '');
        $user->setPassword(isset($_POST['password']) ? $_POST['password'] : '');
        $user->setFullname(isset($_POST['fullname']) ? $_POST['fullname'] : '');
        $user->setEmail(isset($_POST['email']) ? $_POST['email'] : '');
        $user->setAddress(isset($_POST['address']) ? $_POST['address'] : '');
        $user->setPhone(isset($_POST['phone']) ? $_POST['phone'] : '');
        $user->setRole(isset($_POST['role']) ? $_POST['role'] : '');

        $user->update($id);

        header('Location: index.php?controller=user&action=index');
    }

    public function delete()
    {
        $id = $_GET['id'];
        User::delete($id);
        header('Location: index.php?controller=user&action=index');
    }

    public function getInforUser()
    {
        $id = $_GET['id'];
        $user = User::getById($id);
        require 'views/info/index.php';
    }

    public function update_profile()
    {
        $id = $_POST['id'];

        $user = new User();
        $user->setUsername(isset($_POST['username']) ? $_POST['username'] : '');
        $user->setPassword(isset($_POST['password']) ? $_POST['password'] : '');
        $user->setFullname(isset($_POST['fullname']) ? $_POST['fullname'] : '');
        $user->setEmail(isset($_POST['email']) ? $_POST['email'] : '');
        $user->setAddress(isset($_POST['address']) ? $_POST['address'] : '');
        $user->setPhone(isset($_POST['phone']) ? $_POST['phone'] : '');
        $user->setRole(isset($_POST['role']) ? $_POST['role'] : '');

        $user->update($id);

        header('Location: index.php?controller=user&action=getInforUser&id=' . $id);
    }
}
?>
