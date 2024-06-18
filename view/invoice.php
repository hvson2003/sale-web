<?php 
require_once('header_quanly.php'); ?>

<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">
        
    </div>

    
    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        
		<div class="panel">
		    <div class="panel-body">
		        <div class="invoice-masthead">
		            <div class="invoice-text">
		                <h3 class="h1 text-uppercase text-thin mar-no text-primary">HÓA ĐƠN</h3>
		            </div>
		            <div class="invoice-brand" style="white-space:nowrap">
		                <div class="invoice-logo">
		                    <img src="assets/img/logo.png">
		                </div>
		            </div>
		        </div>
		
		        <div class="invoice-bill row">
		            <div class="col-sm-6 text-xs-center">
		                <address>
		                    <strong class="text-main"><?php echo $order['fullname'] ?></strong><br>
		                    <?php echo $order['email'] ?><br>
		                    <?php echo $order['phone'] ?><br>
		                    <?php echo $order['address'] ?>
		               </address>
		            </div>
		            <div class="col-sm-6 text-xs-center">
		                <table class="invoice-details">
		                    <tbody>
		                        <tr>
		                            <td class="text-main text-bold">Mã HĐ #</td>
		                            <td class="text-right text-primary text-bold">#<?php echo $order['id'] ?></td>
		                        </tr>
		                        <tr>
		                            <td class="text-main text-bold">Hình thức</td>
		                            <td class="text-right">
		                            	<?php if($order['payment']==0): ?>
		                            		<span class="badge badge-success">Ship COD</span>
	                            		<?php else: ?>
	                            			<span class="badge badge-danger">Banking</span>
		                            	<?php endif ?>
		                            </td>
		                        </tr>
		                        <tr>
		                            <td class="text-main text-bold">Trạng thái</td>
		                            <td class="text-right">
		                            	<?php if($order['payed']==1): ?>
		                            		<span class="badge badge-success">Đã thanh toán</span>
	                            		<?php else: ?>
	                            			<span class="badge badge-danger">Chưa thanh toán</span>
		                            	<?php endif ?>
		                            </td>
		                        </tr>
		                        <tr>
		                            <td class="text-main text-bold">Ngày đặt</td>
		                            <td class="text-right">
		                            	<?php echo $order['created_at'] ?>
		                            </td>
		                        </tr>
		                    </tbody>
		                </table>
		            </div>
		        </div>
		
		        <hr class="new-section-sm bord-no">
		
		        <div class="row">
		            <div class="col-lg-12 table-responsive">
		                <table class="table table-bordered invoice-summary">
		                    <thead>
		                        <tr class="bg-gray">
		                            <th class="text-uppercase">Sản phẩm</th>
		                            <th class="min-col text-center text-uppercase">Số lượng</th>
		                            <th class="min-col text-center text-uppercase">Giá</th>
		                            <th class="min-col text-right text-uppercase">Tổng</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                        <?php $sanphams = $this->model->getArray('orders_products','order_id='.$order['id']);
                                while($sp = $sanphams->fetch_assoc()){ ?>
                                	<tr>
			                            <td>
			                                <strong><?php echo $this->model->get('products','id='.$sp['product_id'])['name'] ?></strong>
			                                <small><?php echo '('.$this->model->get('colors','id='.$sp['color_id'])['name'].')'.' ('.$this->model->get('memories','id='.$sp['memory_id'])['name'].')'.' ('.$this->model->get('rams','id='.$sp['ram_id'])['name'].')' ?></small>
			                            </td>
			                            <td class="text-center"><?php echo $sp['quantity'] ?></td>
			                            <td class="text-center"><?php echo $this->model->get('products','id='.$sp['product_id'])['sale_price'] ?>đ</td>
			                            <td class="text-right"><?php echo $sp['total'] ?>đ</td>
			                        </tr>
                                <?php } ?>
		                    </tbody>
		                </table>
		            </div>
		        </div>
		
		        <div class="clearfix">
		            <table class="table invoice-total">
		                <tbody>
		                    <tr>
		                        <td><strong>Sản phẩm :</strong></td>
		                        <td><?php echo $order['total'] ?></td>
		                    </tr>
		                    <tr>
		                        <td><strong>Ship :</strong></td>
		                        <td>0 đ</td>
		                    </tr>
		                    <tr>
		                        <td><strong>Tổng :</strong></td>
		                        <td class="text-bold h4"><?php echo $order['total'] ?>đ</td>
		                    </tr>
		                </tbody>
		            </table>
		        </div>
		
		        <div class="text-right no-print">
		            <a href="javascript:window.print()" class="btn btn-default"><i class="demo-pli-printer icon-lg"></i></a>
		            <?php if($order['active']==0){ ?>
                    <a onclick="return confirm('Bạn có chắc chắn muốn duyệt đơn hàng này?')" href="admin.php?task=activeorder&id=<?php echo $order['id'] ?>" class="btn btn-success">Duyệt đơn</a>
                    <?php } ?>
		            <a href="admin.php?task=deleteorder&id=<?php echo $order['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn?')" class="btn btn-danger">Hủy đơn</a>
		        </div>
		
		        <hr class="new-section-sm bord-no">
		
		        <div class="well well-sm">
		            <p class="text-bold text-main text-uppercase">Ghi Chú</p>
		            <p><?php echo $order['note'] ?></p>
		        </div>
		    </div>
		</div>
		
		
		
		
    </div>
    <!--===================================================-->
    <!--End page content-->

</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->

<?php require_once('footer_quanly.php');
 ?>