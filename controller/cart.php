<?php 
class Controller
{
	protected $model;
	protected $cart;
	public function __construct(){
		require_once('./model/model.php');
		require_once('./library/class.Cart.php');
		$this->cart = new Cart();
		$this->model = new Model();
	}

	public function index(){
		$category_list = $this->model->getArray('categories','');
		require_once('./view/cart.php');
	}

	public function addtocart(){
		if(!empty($_POST)){
			$data = $_POST;
			$sp = $this->model->get('products','id='.$data['id']);
			$this->cart->add(
				$data['id'],
				$data['quantity'],
				[
					'name' => $sp['name'],
					'thumbnail' => $sp['thumbnail'],
					'price' => $sp['price'],
					'sale_price' => $sp['sale_price'],
					'color' => $data['color'],
					'memory' => $data['memory'],
					'ram' => $data['ram'],
				]
			);
		}
		
		header('location:cart.php');
	}

	public function removeitem(){
		if(!empty($_GET['id'])&&!empty($_GET['cl'])&&!empty($_GET['m'])&&!empty($_GET['r'])){
			$sp = $this->model->get('products','id='.$_GET['id']);
			//$this->cart->remove($_GET['id']);
			//print("<pre>".print_r($_SESSION,true)."</pre>");
			$rs = $this->cart->remove($_GET['id'], [
				'name' => $sp['name'],
				'thumbnail' => $sp['thumbnail'],
				'price' => $sp['price'],
				'sale_price' => $sp['sale_price'],
				'color'  => $_GET['cl'],
			  	'memory'  => $_GET['m'],
			  	'ram' => $_GET['r']
			]);
			//var_dump($rs);
			header('location:cart.php');
		}
	}

	public function updatecart(){
		//var_dump($_POST);
		foreach ($_POST['quantity'] as $key => $value) {
			$sp = $this->model->get('products','id='.$key);
			$this->cart->update($key,$value,[
				'name' => $sp['name'],
				'thumbnail' => $sp['thumbnail'],
				'price' => $sp['price'],
				'sale_price' => $sp['sale_price'],
				'color'  => $_POST['color'][$key],
			  	'memory'  => $_POST['memory'][$key],
			  	'ram'  => $_POST['ram'][$key],
			]);
		}
		header('location:cart.php');
	}

	public function error(){
		require_once('./view/error.php');
	}
}
 ?>