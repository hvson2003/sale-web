<?php 
class Controller
{
	protected $model;
	public function __construct(){
		require_once('./model/model.php');
		require_once('./library/class.Cart.php');
		$this->cart = new Cart();
		$this->model = new Model();
	}

	public function index(){
		$category_list = $this->model->getArray('categories','');
		//check userlogin
		if(isset($_SESSION['nmb_userdata'])){
			header('location:user.php?task=setting');
		} else {
			require_once('./view/login_register.php');
		}
	}

	public function setting(){
		$order_list = $this->model->getArray('orders','user_id='.$_SESSION['nmb_userdata']['id']);
		$category_list = $this->model->getArray('categories','');
		if (!empty($_POST)) {
			$result = $this->model->update('users',$_POST,'id='.$_SESSION['nmb_userdata']['id']);
			$_SESSION['nmb_userdata'] = $this->model->get('users','id='.$_SESSION['nmb_userdata']['id']);
		}
		require_once('./view/setting.php');
	}

	public function login(){
		$category_list = $this->model->getArray('categories','');
		if(!empty($_POST)){ //user send request
			$error_empty = false;
			$error_login = false;
			//check empty input
			if(in_array('', $_POST))
				$error_empty = true;
			//check username && password
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			if(!$error_empty){
				if($this->model->count("users","username = '$username' AND password = '$password'")>0){
				//get userdata from DB
					$_SESSION['nmb_userdata'] = $this->model->get("users","username = '$username' AND password = '$password'");
					header('location:index.php');
				} else {
					$error_login = true;
				}
			}
			require_once('./view/login_register.php');
		} else {
			header('location:user.php');
		}
	}

	public function register(){
		$category_list = $this->model->getArray('categories','');
		if(!empty($_POST)){ //user send request post
			$error_empty = false;
			$error_re_password = false;
			$error_unique = false;
			$error_register = false;
			$success = false;
			//check empty input
			if(in_array('', $_POST)){
				$error_empty = true;
			}
			//check password == re_password
			if($_POST['password']!=$_POST['re_password']){
				$error_re_password = true;
			}
			//check user unique
			$username = $_POST['username'];
			if($this->model->count("users","username = '$username'")>0){
				$error_unique = true;
			}
			//check condition
			if(!$error_empty&&!$error_unique&&!$error_re_password){
				$pass_encode = md5($_POST['re_password']);
				unset($_POST['re_password']);
				$_POST['password'] = $pass_encode;
				$result_register = $this->model->insert('users',$_POST);
				if($result_register)
					$success = true;
			} else {
				$error_register = true;
			}
			require_once('./view/login_register.php');
		} else {
			header('location:user.php');
		}
	}

	public function logout(){
		unset($_SESSION['nmb_userdata']);
		$this->cart->destroy();
		header('location:index.php');
	}

	public function error(){
		require_once('./view/error.php');
	}
}

 ?>