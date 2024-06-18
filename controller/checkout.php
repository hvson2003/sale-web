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
		// if(empty($_SESSION['user_data']))
		// 	header('location:index.php');
		$category_list = $this->model->getArray('categories','');
		if(isset($_GET['id'])){
			$product = $this->model->get('products','id='.$_GET['id']);
		}
		
		require_once('./view/checkout.php');
	}

	public function error(){
		require_once('./view/error.php');
	}

	public function onlinebanking($order_id, $amount){
        //config.
        $vnp_TmnCode = "B3WTJZL9"; //Mã website tại VNPAY
        $vnp_HashSecret = "LJJWUDCNRGHKCUFCJCAECXEUDCXXKPPU"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost/thientruong/checkout.php?task=bkss";

        $vnp_TxnRef = $order_id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $amount*100; //giá tiền thanh toán
        $vnp_Locale = 'vn';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        //echo $vnp_Url;
        header('location: '.$vnp_Url);
	}

	public function addorder(){
		if(!empty($_POST)){
			$result = false;
			$data = array(
			'fullname' => $_POST['fullname'],
			'email' => $_POST['email'],
			'phone' => $_POST['phone'],
			'address' => $_POST['address'],
			'created_at' => date('Y-m-d'),
			'note' => $_POST['note'],
			'payment' => $_POST['payment'],
			'total' => $this->cart->getAttributeTotal('sale_price'),
			'quantity' => $this->cart->getTotalQuantity(),
			'item' => $this->cart->getTotalItem(),
			'active' => 0,
			'user_id' => $_SESSION['nmb_userdata']['id'],
			);
			if($this->model->insert('orders',$data)){
				$result = true;
				//thêm hóa đơn thành công
				$idLastOrder = $this->model->get('orders','active=0 ORDER BY id DESC')['id'];
				$allItems = $this->cart->getItems();

				foreach ($allItems as $items) {
				  foreach ($items as $item) {
				  	$datahdsp = array(
				  		'product_id' => $item['id'],
				  		'order_id' => $idLastOrder,
				  		'color_id' => $item['attributes']['color'],
				  		'memory_id' => $item['attributes']['memory'],
				  		'ram_id' => $item['attributes']['ram'],
				  		'quantity' => $item['quantity'],
				  		'total' => $item['attributes']['sale_price']*$item['quantity'],
				  	);
				    if($this->model->insert('orders_products',$datahdsp)){
				    	$result = true;
				    } else {
				    	$result = false;
				    }
				  }
				}
			}
			if($result){
				if($_POST['payment']==1){
					$order_idn = $this->model->get('orders','PAYMENT = 1 ORDER BY id DESC')['id'];
					$this->onlinebanking($order_idn, $data['total']);
				} else {
					header('location: checkout.php?task=success');
				}
			} else {
				header('location: checkout.php');
			}
		} else {
			header('location: checkout.php');
		}
	}

	public function success(){
		$category_list = $this->model->getArray('categories','');
		$order = $this->model->get('orders','active=0 ORDER BY id DESC');
		$list_order = $this->model->getArray('orders_products','order_id='.$order['id']);
		require_once('./view/bill.php');
		$this->cart->destroy();
	}

	public function bkss(){
		if(isset($_GET['vnp_TxnRef'])){
			$this->model->update('orders',array(
				'payed' => 1,
			), 'id='.$_GET['vnp_TxnRef']);
			header('location: checkout.php?task=success');
		} else {
			header('location: checkout.php');
		}
	}
}

 ?>