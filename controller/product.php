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
		if(!isset($_GET['id'])){
			require_once('./view/error.php');
		} else {
			//Lấy dữ liệu từ DB để đổ ra view
			$category_list = $this->model->getArray('categories','');
			$product_list = $this->model->getArray('products','');
			$color_product_list = $this->model->getArray('colors_products','product_id='.$_GET['id']);
			$memory_product_list = $this->model->getArray('memories_products','product_id='.$_GET['id']);
			$ram_product_list = $this->model->getArray('rams_products','product_id='.$_GET['id']);
			$product = $this->model->get('products','id='.$_GET['id']);
			$title = $product['name'];
			$images_product = $this->model->getArray('images_product','product_id='.$_GET['id']);
			$comment_list = $this->model->getArray('comments','product_id='.$_GET['id']);
			//kiểm tra xem sản phẩm có tồn tại hay không ?
			if(is_null($product)){
				require_once('./view/error.php');
			} else {
				$related_products = $this->model->getArray('products','amount>0 AND category_id='.$product['category_id'].' ORDER BY RAND()');
				$category = $this->model->get('categories','id='.$product['category_id']);
				require_once('./view/product.php');
			}
		}		
	}

	public function addcomment(){
		if(!empty($_POST['product'])){
			if (!empty($_SESSION['nmb_userdata'])){
				$name = $_SESSION['nmb_userdata']['username'];
				$email = $_SESSION['nmb_userdata']['email'];
			} else {
				$name = $_POST['name'];
				$email = $_POST['email'];
			}
			$result = $this->model->insert('comments',array(
				'name' => $name,
				'email' => $email,
				'content' => $_POST['content'],
				'created_at' => date('Y-m-d H:i:s'),
				'product_id' => $_POST['product'],
			));
			if($result)
				header('location: product.php?id='.$_POST['product'].'&status=true#comment');
			else
				header('location: product.php?id='.$_POST['product'].'&status=false#comment');
		} else {
			$this->error();
		}
	}

	public function error(){
		$category_list = $this->model->getArray('categories','');
		require_once('./view/error.php');
	}
}

 ?>