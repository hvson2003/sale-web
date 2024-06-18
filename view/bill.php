<?php require_once('header.php') ?>
<style>
    .order_button a {
        cursor: pointer;
        font-size: 16px;
        line-height: 30px;
        padding: 5px 10px;
        text-transform: capitalize;
        color: #ffffff;
        background: #0063d1;
        font-weight: 500;
        -webkit-transition: 0.3s;
        transition: 0.3s;
        margin-bottom: 0;
        border-radius: 5px;
    }
</style>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.php">Trang chủ</a></li>
                        <li>Thanh toán</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--Checkout page section-->
<div class="Checkout_section mt-60">
    <div class="container">
        <?php if (!isset($_SESSION['nmb_userdata'])): ?>
            <div class="row">
                <div class="col-12">
                    <div class="user-actions">
                        <h3>
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            Đặt hàng thành công ! Chúng tôi sẽ sớm liên hệ theo thông tin bạn để lại.
                        </h3>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="row">
                <div class="col-12">
                    <div class="user-actions">
                        <h3>
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            Đặt hàng thành công ! Chúng tôi sẽ sớm liên hệ theo thông tin bạn để lại.
                            <a class="Returning" href="user.php">Theo dõi hóa đơn</a>
                        </h3>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <div class="checkout_form">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h3>Thông tin người đặt</h3>
                    <div class="order_table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Mục</th>
                                    <th>Nội dung</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mã hóa đơn</td>
                                    <td>#<?php echo $order['id'] ?></td>
                                </tr>
                                <tr>
                                    <td>Họ và tên</td>
                                    <td><?php echo $order['fullname'] ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $order['email'] ?></td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại</td>
                                    <td><?php echo $order['phone'] ?></td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td><?php echo $order['address'] ?></td>
                                </tr>
                                <tr>
                                    <td>Phương thức thanh toán</td>
                                    <td><?php echo ($order['payment']==0) ? 'ShipCOD' : 'Banking' ?></td>
                                </tr>
                                <tr>
                                    <td>Ghi chú</td>
                                    <td><?php echo $order['note'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                        <h3>Hóa đơn</h3>
                        <div class="order_table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Đơn giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        <?php while ($orderItem = $list_order->fetch_assoc()){ ?>
                                            <tr>
                                            <td>
                                                <a href="product.php?id=<?php echo $orderItem['product_id'] ?>"><?php echo $this->model->get('products','id='.$orderItem['product_id'])['name'].'<b> ('.$this->model->get('colors','id='.$orderItem['color_id'])['name'].')'.' ('.$this->model->get('memories','id='.$orderItem['memory_id'])['name'].')'.' ('.$this->model->get('rams','id='.$orderItem['ram_id'])['name'].')</b>' ?></a> <strong> × <?php echo $orderItem['quantity'] ?></strong></a>
                                            </td>
                                            <td><?php echo number_format($this->model->get('products','id='.$orderItem['product_id'])['sale_price']*$orderItem['quantity'], 0, '.', ','); ?>đ</td>
                                            </tr>
                                        <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Tiền sản phẩm</th>
                                        <td><?php echo number_format($order['total'], 0, '.', ',');?>đ</td>
                                    </tr>
                                    <tr>
                                        <th>Phí vận chuyển</th>
                                        <td><strong>0đ</strong></td>
                                    </tr>
                                    <tr class="order_total">
                                        <th>Tổng cộng</th>
                                        <td><strong><?php echo number_format($order['total'], 0, '.', ',');?>đ</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="order_button">
                            <a href="index.php">TRỞ VỀ TRANG CHỦ</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Checkout page section end-->
<?php require_once('footer.php'); ?>