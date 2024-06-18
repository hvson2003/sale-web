<?php 
class Controller
{
	protected $model;
	protected $cart;
	public function __construct(){
		require_once('./model/model.php');
		require_once('./library/class.Cart.php');
		// Khởi tạo instance Cart và Model
		$this->cart = new Cart();
		$this->model = new Model();
	}

	public function index(){
		$category_list = $this->model->getArray('categories','');
		
		$result = $this->model->searchSP($_GET['keyword']);
		if(is_null($result)){
			$empty_result = true;
		}
		require_once('./view/search.php');
		
	}

	public function error(){
		require_once('./view/error.php');
	}
}

 ?>