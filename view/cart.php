<?php require_once('header.php') ?>
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.php">Trang chủ</a></li>
                            <li>Giỏ hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--shopping cart area start -->
    <div class="shopping_cart_area mt-60">
        <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="cart.php?task=updatecart" method="POST">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Xóa</th>
                                            <th class="product_thumb">Ảnh sản phẩm</th>
                                            <th class="product_name">Tên sản phẩm</th>
                                            <th class="product-price">Giá</th>
                                            <th class="product_quantity">Số lượng</th>
                                            <th class="product_total">Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($this->cart->isEmpty()){ echo 'Chưa có sản phẩm nào trong giỏ hàng';} ?>
                                        <?php $allProducts = $this->cart->getItems();
                                        foreach ($allProducts as $products): ?>
                                            <?php foreach ($products as $product): ?>   
                                        <tr>
                                            <td class="product_remove">
                                                <a href="cart.php?task=removeitem&id=<?php echo $product['id'] ?>&cl=<?php echo $product['attributes']['color']; ?>&m=<?php echo $product['attributes']['memory']; ?>&r=<?php echo $product['attributes']['ram']; ?>" title="Xóa sản phẩm này trong giỏ"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                            <td class="product_thumb"><a href="product.php?id=<?php echo $product['id'] ?>"><img src="<?php echo $product['attributes']['thumbnail'] ?>" alt="<?php echo $product['attributes']['name'] ?>" /></a></td>
                                            <td class="product_name">
                                                <a href="product.php?id=<?php echo $product['id'] ?>"><?php echo $product['attributes']['name'].'<b> ('.$this->model->get('colors','id='.$product['attributes']['color'])['name'].')'.' ('.$this->model->get('memories','id='.$product['attributes']['memory'])['name'].')'.' ('.$this->model->get('rams','id='.$product['attributes']['ram'])['name'].')</b>' ?></a>
                                            </td>
                                            <td class="product-price"><?php echo number_format($product['attributes']['sale_price'], 0, '.', ','); ?>đ</td>
                                            <td class="product_quantity">
                                                <label>Số lượng</label> 
                                                <input type="number" name="quantity[<?php echo $product['id'] ?>]" min="1" max="100" value="<?php echo $product['quantity'] ?>">
                                                <input type="hidden" name="color[<?php echo $product['id'] ?>]" value="<?php echo $product['attributes']['color'] ?>">
                                                <input type="hidden" name="memory[<?php echo $product['id'] ?>]" value="<?php echo $product['attributes']['memory'] ?>">
                                                <input type="hidden" name="ram[<?php echo $product['id'] ?>]" value="<?php echo $product['attributes']['ram'] ?>">
                                            </td>
                                            <td class="product_total"><?php echo number_format($product['attributes']['sale_price']*$product['quantity'], 0, '.', ','); ?>đ</td>


                                        </tr>
                                        <?php endforeach ?>
                                        <?php endforeach ?>

                                    </tbody>
                                </table>
                            </div>
                            <div class="cart_submit">
                                <button type="submit">cập nhật giỏ hàng</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code left">
                                <h3>Mã giảm giá</h3>
                                <div class="coupon_inner">
                                    <p>Nhập mã giảm giá mà bạn có.</p>
                                    <input placeholder="Coupon code" type="text">
                                    <button type="submit">Áp dụng mã</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Thống kê</h3>
                                <div class="coupon_inner">
                                    <div class="cart_subtotal">
                                        <p>Tiền sản phẩm</p>
                                        <p class="cart_amount"><?php 
                                                    echo number_format($this->cart->getAttributeTotal('sale_price'), 0, '.', ',');
                                                     ?> đ</p>
                                    </div>
                                    <div class="cart_subtotal ">
                                        <p>Phí vận chuyển</p>
                                        <p class="cart_amount"> 0 đ</p>
                                    </div>

                                    <div class="cart_subtotal">
                                        <p>Tổng chi phí</p>
                                        <p class="cart_amount"><?php 
                                                    echo number_format($this->cart->getAttributeTotal('sale_price'), 0, '.', ',');
                                                     ?> đ</p>
                                    </div>
                                    <div class="checkout_btn">
                                        <?php if (!$this->cart->isEmpty()): ?>
                                            <a href="checkout.php">Tiến hành thanh toán</a>
                                        <?php else: ?>
                                            <a href="#">Chưa có sản phẩm!</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
        </div>
    </div>
    <!--shopping cart area end -->

<?php require_once('footer.php') ?>