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

	public function uploadimage(){
		if (isset($_POST) && !empty($_FILES['file'])) {
		    $duoi = explode('.', $_FILES['file']['name']); // tách chuỗi khi gặp dấu .
		    $duoi = $duoi[(count($duoi) - 1)]; //lấy ra đuôi file
		    // Kiểm tra xem có phải file ảnh không
		    if ($duoi === 'jpg' || $duoi === 'png' || $duoi === 'gif') {
		    	$filenameNew = mt_rand(1000000000,9999999999).'.'.$duoi;
		        // tiến hành upload
		        if (move_uploaded_file($_FILES['file']['tmp_name'], 'assets/uploads/' . $filenameNew)) {
		            // Nếu thành công
		            //echo('Upload thành công file: ' . $_FILES['file']['name']); //in ra thông báo + tên file
		            //var_dump($_FILES);
		        	$link = 'assets/uploads/'.$filenameNew;

		        	$kq1 = '<img src="'.$link.'" width="300px" height="250px" class="mw-100 img-thumbnail" />';

		        	$kq = array();
		        	array_push($kq, $kq1);
		        	array_push($kq, $link);

		        	echo json_encode($kq);
		        } else { // nếu không thành công
		            echo('Có lỗi!'); // in ra thông báo
		        }
		    } else { // nếu không phải file ảnh
		        echo('Chỉ được upload ảnh'); // in ra thông báo
		    }
		} else {
		    echo('Lock'); // nếu không phải post method
		}
	}

	public function removeimage(){
		if(!empty($_GET['id'])){
			if($this->model->delete('images_product','id='.$_GET['id'])){
				echo 'xóa thành công';
			} else {
				echo 'xóa thất bại';
			}
		}
	}

	public function addtocart(){
		//var_dump($_POST);
		if(!empty($_POST)){
			$data = $_POST;
			$sp = $this->model->get('products','id='.$data['id']);
			$this->cart->add(
				$data['id'],
				1,
				[
					'name' => $sp['name'],
					'thumbnail' => $sp['thumbnail'],
					'price' => $sp['price'],
					'sale_price' => $sp['sale_price'],
					'color' => $this->model->get('colors_products','product_id='.$data['id'])['color_id'],
					'memory' => $this->model->get('memories_products','product_id='.$data['id'])['memory_id'],
					'ram' => $this->model->get('rams_products','product_id='.$data['id'])['ram_id'],
				]
			);
			echo 'Thêm sản phẩm '.$sp['name'].' vào giỏ hàng thành công !';
		} else {
			echo 'Thêm thất bại';
		}
	}

	public function checksoluong($id,$slm){
		if(!empty($_GET['id'])){
			$id = $_GET['id'];
		}
		if(!empty($_GET['slm'])){
			$slm = $_GET['slm'];
		}
		$sltk = $this->model->getSoLuongSanPham($id);
		if($sltk<$slm)
			echo 'false';
		else
			echo 'true';
	}

	public function error(){
		require_once('./view/error.php');
	}
}

 ?>