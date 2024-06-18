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
		//config pagination
		$total_records = $this->model->count('blogs','');
		$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
		$limit = 3;
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
		$blog_list_recent = $this->model->getArray('blogs','',8);
		$blog_list = $this->model->getArray('blogs','',$start.', '.$limit);

		require_once('./view/blog.php');
	}

	public function detail(){
		if(!isset($_GET['id'])){
			require_once('./view/error.php');
		} else {
			//Lấy dữ liệu từ DB để đổ ra view
			$category_list = $this->model->getArray('categories','');
			$blog_list = $this->model->getArray('blogs','');
			$random_blog = $this->model->getArray('blogs','id > 0 ORDER BY RAND()',3);
			$blog = $this->model->get('blogs','id='.$_GET['id']);
			$title = $blog['title'];
			//kiểm tra xem sản phẩm có tồn tại hay không ?
			if(is_null($blog)){
				require_once('./view/error.php');
			} else {
				require_once('./view/blogdetail.php');
			}
		}		
	}

	public function error(){
		require_once('./view/error.php');
	}
}

 ?>