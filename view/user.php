<?php require_once('header.php'); ?>

    <!-- main wrapper start -->
    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area bg-img" data-bg="assets/img/breadcrumb-banner.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap text-center">
                            <nav aria-label="breadcrumb">
                                <h1 class="breadcrumb-title">Đăng nhập / Đăng ký</h1>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Đăng nhập / Đăng ký</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- login register wrapper start -->
        <div class="login-register-wrapper section-padding">
            <div class="container">
                <div class="member-area-from-wrap">
                    <div class="row">
                        <!-- Login Content Start -->
                        <div class="col-lg-6">
                            <div class="login-reg-form-wrap">
                                <h2>Đăng nhập</h2>
                                <?php if(isset($error3)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    Đăng nhập thất bại !
                                </div>
                                <?php } ?>
                                <form action="quanly.php?task=dangnhap" method="post">
                                    <div class="single-input-item">
                                        <input type="text" placeholder="Điền tên đăng nhập"  name="tendangnhap" required />
                                    </div>
                                    <div class="single-input-item">
                                        <input type="password" placeholder="Điền mật khẩu" name="matkhau" required />
                                    </div>
                                    <div class="single-input-item">
                                        <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                            <div class="remember-meta">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="rememberMe">
                                                    <label class="custom-control-label" for="rememberMe">Nhớ mật khẩu</label>
                                                </div>
                                            </div>
                                            <a href="#" class="forget-pwd">Quên mật khẩu?</a>
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                        <button class="btn">Đăng nhập</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Login Content End -->
    
                        <!-- Register Content Start -->
                        <div class="col-lg-6">
                            <div class="login-reg-form-wrap signup-form">
                                <h2>Đăng ký</h2>
                                <?php if(isset($error2)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    Đăng ký thất bại !
                                </div>
                                <?php } ?>
                                <form action="quanly.php?task=dangky" method="post">
                                    <div class="single-input-item">
                                        <input type="text" name="tendangnhap" placeholder="Điền tên đăng nhập" required />
                                    </div>
                                    <div class="single-input-item">
                                        <input type="text" name="hoten" placeholder="Điền họ và tên" required />
                                    </div>
                                    <div class="single-input-item">
                                        <input type="email" name="email" placeholder="Điền email" required />
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <input type="password" name="matkhau" placeholder="Điền mật khẩu" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <input type="password" name="re_matkhau" placeholder="Nhập lại mật khẩu" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                        <input type="number" min="0" name="sodienthoai" placeholder="Điền số điện thoại" required />
                                    </div>
                                    <div class="single-input-item">
                                        <input type="text" name="diachi" placeholder="Điền địa chỉ" required />
                                    </div>
                                    <div class="single-input-item">
                                        <button class="btn">Đăng ký</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Register Content End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- login register wrapper end -->
    </main>
    <!-- main wrapper end -->

<?php require_once('footer.php'); ?>