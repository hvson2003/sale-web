<?php require_once('header.php') ?>
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
                            Để theo dõi đơn hàng
                            <a class="Returning" href="user.php">Hãy đăng nhập</a>

                        </h3>
                </div>
            </div>
        <?php endif ?>
        <div class="checkout_form">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <form action="checkout.php?task=addorder" method="POST">
                        <h3>Thông tin người đặt</h3>
                        <div class="row">

                            <div class="col-lg-12 mb-20">
                                <label>Họ Tên <span>*</span></label>
                                <input type="text" name="fullname" value="<?php echo (isset($_SESSION['nmb_userdata'])) ? $_SESSION['nmb_userdata']['fullname'] : ''; ?>" placeholder="nhập họ và tên" required>
                            </div>
                            <div class="col-12 mb-20">
                                <label>Email <span>*</span></label>
                                <input type="email" name="email" value="<?php echo (isset($_SESSION['nmb_userdata'])) ? $_SESSION['nmb_userdata']['email'] : ''; ?>" placeholder="nhập email" required>
                            </div>
                            <div class="col-12 mb-20">
                                <label>Địa chỉ <span>*</span></label>
                                <input type="text" name="address" value="<?php echo (isset($_SESSION['nmb_userdata'])) ? $_SESSION['nmb_userdata']['address'] : ''; ?>" placeholder="nhập địa chỉ" required>
                            </div>
                            <div class="col-lg-6 mb-20">
                                <label>Số điện thoại <span>*</span></label>
                                <input type="number" name="phone" min="0" value="<?php echo (isset($_SESSION['nmb_userdata'])) ? $_SESSION['nmb_userdata']['phone'] : ''; ?>" placeholder="nhập số điện thoại" required>
                            </div>
                            <div class="col-12">
                                <div class="order-notes">
                                    <label for="order_note">Ghi chú thêm</label>
                                    <textarea row="5" id="order_note" placeholder="Ghi chú thích cho đơn hàng" name="note"></textarea>
                                </div>
                            </div>
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
                                    <?php $allProducts = $this->cart->getItems();
                                    foreach ($allProducts as $products): ?>
                                        <?php foreach ($products as $product): ?>
                                            <tr>
                                            <td>
                                                <a href="product.php?id=<?php echo $product['id'] ?>"><?php echo $product['attributes']['name'].'<b> ('.$this->model->get('colors','id='.$product['attributes']['color'])['name'].')'.' ('.$this->model->get('memories','id='.$product['attributes']['memory'])['name'].')'.' ('.$this->model->get('rams','id='.$product['attributes']['ram'])['name'].')</b>' ?></a> <strong> × <?php echo $product['quantity'] ?></strong></a>
                                            </td>
                                            <td><?php echo number_format($product['attributes']['sale_price']*$product['quantity'], 0, '.', ','); ?>đ</td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Tiền sản phẩm</th>
                                        <td><?php echo number_format($this->cart->getAttributeTotal('sale_price'), 0, '.', ',');?>đ</td>
                                    </tr>
                                    <tr>
                                        <th>Phí vận chuyển</th>
                                        <td><strong>0đ</strong></td>
                                    </tr>
                                    <tr class="order_total">
                                        <th>Tổng cộng</th>
                                        <td><strong><?php echo number_format($this->cart->getAttributeTotal('sale_price'), 0, '.', ',');?>đ</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment_method">
                            <div class="panel-default">
                                <input name="payment" type="radio" value="0" checked/>
                                <label for="payment">Thanh toán khi nhận hàng</label>
                            </div>
                            <div class="panel-default">
                                <input name="payment" type="radio" value="1"/>
                                <label for="payment">Thanh toán online <img src="https://huewaco.net.vn/Images/icon/vnpay_qr.png" class="mw-100" alt=""></label>
                            </div>
                            <div class="order_button">
                                <?php if (!$this->cart->isEmpty()): ?>
                                <button type="submit">XÁC NHẬN ĐẶT HÀNG</button>    
                                <?php else: ?>
                                <button type="button" disabled>XÁC NHẬN ĐẶT HÀNG</button>
                                <?php endif ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Checkout page section end-->
<?php require_once('footer.php'); ?>