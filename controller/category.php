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
		//config pagination
		$total_records = $this->model->count('products','category_id='.$_GET['id']);
		$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
		$limit = 5;
		// tổng số trang
		$total_page = ceil($total_records / $limit);
		 
		// Giới hạn current_page trong khoảng 1 đến total_page
		if ($current_page > $total_page){
		    $current_page = $total_page;
		}
		else if ($current_page < 1){
		    $current_page = 1;
		}
		 
		// Tìm Start
		$start = ($current_page - 1) * $limit;


		$category_list = $this->model->getArray('categories','');
		if(isset($_GET['id'])){

		}
		$category = $this->model->get('categories','id='.$_GET['id']);
		$title = $category['name'].' - HE PC';
		$product_list = $this->model->getArray('products','category_id='.$_GET['id'],$start.', '.$limit);
		if(is_null($category)){
			require_once('./view/error.php');
		} else {
			require_once('./view/category.php');
		}
	}

	public function error(){
		$category_list = $this->model->getArray('categories','');
		require_once('./view/error.php');
	}
}

 ?>