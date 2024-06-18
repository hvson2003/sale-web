<!--footer area start-->
    <footer class="footer_widgets">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widgets_container contact_us">
                            <div class="footer_logo">
                                <a href="#">HE COMPUTER</a>
                            </div>
                            <div class="footer_contact">
                                <p>HE Computer - Máy Tính Chất Lượng Số 1 Thái nguyên</p>
                                <p><span>Địa chỉ</span> <?php echo $configs[2]['config_value'] ?></p>
                                <p><span>Số điện thoại: </span><a href="tel:<?php echo $configs[1]['config_value'] ?>"><?php echo $configs[1]['config_value'] ?></a></p>
                                <p><span>Email: </span><a href="mailto:<?php echo $configs[3]['config_value'] ?>"><?php echo $configs[3]['config_value'] ?></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>Thông Tin</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="index.php?task=aboutus">Giới thiệu</a></li>
                                    <li><a href="index.php?task=contactus">Liên hệ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>Tài Khoản</h3>
                            <div class="footer_menu">
                                <ul>
                                    <?php if (isset($_SESSION['nmb_userdata'])): ?>
                                    <li><a href="user.php">Cài đặt</a></li>
                                    <li><a href="admin.php">Quản lý</a></li>
                                    <li><a href="user.php?task=logout">Đăng xuất</a></li>
                                    <?php else: ?>
                                    <li><a href="user.php">Đăng ký</a></li>
                                    <li><a href="user.php">Đăng nhập</a></li>
                                    <?php endif ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="widgets_container newsletter">
                            <h3>Theo dõi</h3>
                            <div class="footer_social_link">
                                <ul>
                                    <li><a class="facebook" href="<?php echo $configs[4]['config_value'] ?>" title="Facebook"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a class="bg-danger" href="<?php echo $configs[5]['config_value'] ?>" title="Youtube"><i class="fa fa-youtube-play"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="subscribe_form">
                                <h3>Nhận khuyến mãi mới nhất</h3>
                                <form id="mc-form" class="mc-form footer-newsletter">
                                    <input id="mc-email" type="email" autocomplete="off"
                                        placeholder="Nhập email của bạn..." />
                                    <button id="mc-submit">Đăng ký!</button>
                                </form>
                                <!-- mailchimp-alerts Start -->
                                <div class="mailchimp-alerts text-centre">
                                    <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                    <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                    <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                                </div><!-- mailchimp-alerts end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright_area">
                            <p class="copyright-text">&copy; <?php echo date('Y') ?> HE PC </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer_payment text-right">
                            <a href="#"><img style="max-width: 80px" src="https://huewaco.net.vn/Images/icon/vnpay_qr.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer area end-->


    <!-- JS ============================================ -->
    <script>
        $(document).ready(function(){
            addtocart = function(product){
                var id_product = product.dataset.product;

                $.ajax({
                    url : "ajax.php?task=addtocart",
                    type : "post",
                    dataType:"text",
                    data : {
                         id : id_product
                    },
                    success : function (result){
                        alert(result);
                    }
                });
            }
        });
    </script>
    <!-- Plugins JS -->
    <script src="assets/frontend2/plugins.js"></script>

    <!-- Main JS -->
    <script src="assets/frontend2/main.js"></script>



</body>
</html>