<?php require_once('header.php'); ?>

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.php">Trang chủ</a></li>
                        <li>Tài khoản</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!-- my account start  -->
<section class="main_content_area">
    <div class="container">
        <?php if (isset($result)&&$result): ?>
        <div class="row"><b>Cập nhật thông tin thành công !</b></div>
        <?php endif ?>
        <?php if (isset($result)&&!$result): ?>
        <div class="row"><b>Cập nhật thông tin thất bại !</b></div>   
        <?php endif ?>
        <div class="account_dashboard">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li><a href="#dashboard" data-toggle="tab" class="nav-link active">Tổng quan</a></li>
                            <li> <a href="#orders" data-toggle="tab" class="nav-link">Hóa đơn</a></li>
                            <li><a href="#account-details" data-toggle="tab" class="nav-link">Thông tin tài khoản</a>
                            </li>
                            <li><a href="user.php?task=logout" class="nav-link">Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade show active" id="dashboard">
                            <h3>Tổng quan </h3>
                            <p>Từ trang tổng quan tài khoản của bạn. bạn có thể dễ dàng kiểm tra và xem các đơn đặt hàng gần đây của mình, quản lý địa chỉ giao hàng và thanh toán cũng như Chỉnh sửa mật khẩu và chi tiết tài khoản của bạn.</p>
                        </div>
                        <div class="tab-pane fade" id="orders">
                            <h3>Orders</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Mã hóa đơn</th>
                                            <th>Ngày đặt</th>
                                            <th>Trạng thái</th>
                                            <th>Tổng tiền</th>
                                            <th>Tác vụ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!is_null($order_list)): ?>
                                            <?php while($orderItem = $order_list->fetch_assoc()){ ?>
                                            <tr>
                                                <td>#<?php echo $orderItem['id'] ?></td>
                                                <td><?php echo $orderItem['created_at'] ?></td>
                                                <td>
                                                    <?php if ($orderItem['active']): ?>
                                                        <span class="success">Đã duyệt</span>
                                                    <?php else: ?>
                                                        <span class="success">Chưa duyệt</span>
                                                    <?php endif ?>
                                                </td>
                                                <td><?php echo $orderItem['total'] ?>đ x <?php echo $orderItem['quantity'] ?> sản phẩm </td>
                                                <td><a href="#" class="view">xem</a></td>
                                            </tr>
                                            <?php } ?>
                                        <?php else: ?>
                                            <b>Không có đơn hàng nào !</b>
                                        <?php endif ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-details">
                            <h3>Thông tin chi tiết </h3>
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                        <form action="" method="POST">
                                            <label>Họ và tên</label>
                                            <input type="text" name="fullname" value="<?php echo $_SESSION['nmb_userdata']['fullname'] ?>">
                                            <label>Email</label>
                                            <input type="email" name="email" value="<?php echo $_SESSION['nmb_userdata']['email'] ?>">
                                            <label>Địa chỉ</label>
                                            <input type="text" name="address" value="<?php echo $_SESSION['nmb_userdata']['address'] ?>">
                                            <label>Số điện thoại</label>
                                            <input type="number" name="phone" value="<?php echo $_SESSION['nmb_userdata']['phone'] ?>">
                                            <!-- <label>Mật khẩu hiện tại</label>
                                            <input type="password" name="password" placeholder="điền vào đây nếu bạn muốn thay đổi mật khẩu">
                                            <label>Mật khẩu mới</label>
                                            <input type="password" name="password" placeholder="điền vào đây nếu bạn muốn thay đổi mật khẩu">
                                            <label>Xác nhận mật khẩu mới</label>
                                            <input type="password" name="password" placeholder="điền vào đây nếu bạn muốn thay đổi mật khẩu"> -->
                                            <div class="save_button primary_btn default_button">
                                                <button type="submit">Lưu</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- my account end   -->

<?php require_once('footer.php'); ?>