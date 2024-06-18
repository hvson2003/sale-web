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
		$product_list = $this->model->getArray('products','');
		$product_best = $this->model->getArray('products','sold>0');
		$applesamsung = $this->model->getArray('products','category_id=1 OR category_id=2');
		$product_random = $this->model->getArray('products','amount > 0 ORDER BY RAND()');
		$blog_list = $this->model->getArray('blogs','');
		$slide_list = $this->model->getArray('slides','');

		require_once('./view/index.php');
	}

	public function aboutus(){
		$category_list = $this->model->getArray('categories','');

		require_once('./view/aboutus.php');
	}

	public function contactus(){
		$category_list = $this->model->getArray('categories','');

		require_once('./view/contactus.php');
	}
}

 ?>