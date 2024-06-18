<?php require_once('header.php') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-rnGEa4tD/WtpJNEOFEAmpV2ZYHK70RIOYOFOm0ZMZCpWnJVeAKmBmKrPpxG5jzfM9O9XaDLJduWI1h9xj2RB9Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.php">trang chủ</a></li>
                        <li>đăng nhập / đăng ký</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!-- customer login start -->
<div class="customer_login mt-60">
    <div class="container">
        <div class="row">
            <!--login area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form">
                    <h2>Đăng nhập</h2>
                    <form action="user.php?task=login" method="POST">
                        <?php if (isset($_GET['task']) && $_GET['task'] == 'login'): ?>
                            <p style="color: red;">
                                <?php if ($error_empty || $error_login): ?>
                                    <i class="fa fa-exclamation-circle"></i> <b>Các trường nhập liệu không được bỏ trống hoặc tên đăng nhập/mật khẩu không chính xác!</b>
                                <?php endif ?>
                            </p>
                        <?php endif; ?>
                        <p>
                            <label>Tên đăng nhập <span>*</span></label>
                            <input type="text" name="username" required>
                        </p>
                        <p>
                            <label>Mật khẩu <span>*</span></label>
                            <input type="password" name="password" required>
                        </p>
                        <div class="login_submit">
                            <a href="#">Quên mật khẩu?</a>
                            <label for="remember">
                                <input id="remember" type="checkbox">
                                Nhớ tài khoản
                            </label>
                            <button type="submit">đăng nhập</button>
                        </div>

                    </form>
                </div>
            </div>
            <!--login area start-->

           
            <!--register area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form register">
                    <h2>Đăng ký</h2>
                    <form name="registrationForm" action="user.php?task=register" onsubmit="return validateForm()" method="POST">
                        <?php if (isset($_GET['task']) && $_GET['task'] == 'register'): ?>
                            <!-- error -->
                            <p style="color:red">
                                <?php if ($error_register): ?>
                                    <i class="fa fa-exclamation-circle"></i> <b>Đăng ký không thành công!</b>
                                <?php endif ?>
                                <?php if ($error_empty): ?>
                                    <i class="fa fa-exclamation-circle"></i> <b>Các trường nhập liệu không được bỏ trống!</b>
                                <?php endif ?>
                                <?php if ($error_re_password): ?>
                                    <i class="fa fa-exclamation-circle"></i> <b>Mật khẩu xác nhận không khớp!</b>
                                <?php endif ?>
                                <?php if ($error_unique): ?>
                                    <i class="fa fa-exclamation-circle"></i> <b>Tên đăng nhập đã có người sử dụng!</b>
                                <?php endif ?>
                            </p>
                            <!-- success -->
                            <p style="color:green">
                                <?php if ($success): ?>
                                    <i class="fa fa-check-circle"></i> <b>Đăng ký thành công!</b>
                                <?php endif ?>
                            </p>
                        <?php endif ?>
                        <p>
                            <label>Tên đăng nhập <span>*</span></label>
                            <input type="text" name="username" required value="<?php echo (isset($_POST['username'])) ? $_POST['username'] : ''; ?>">
                        </p>
                        <p>
                            <label>Email <span>*</span></label>
                            <input type="email" name="email" required value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : ''; ?>">
                        </p>
                        <p>
                            <label>Mật khẩu <span>*</span></label>
                            <input type="password" name="password" required>
                        </p>
                        <p>
                            <label>Nhập lại mật khẩu <span>*</span></label>
                            <input type="password" name="re_password" required>
                        </p>
                        <p>
                            <label>Họ và tên <span>*</span></label>
                            <input type="text" name="fullname" required value="<?php echo (isset($_POST['fullname'])) ? $_POST['fullname'] : ''; ?>">
                        </p>
                        <p>
                            <label>Số điện thoại <span>*</span></label>
                            <input type="number" min="0" name="phone" required value="<?php echo (isset($_POST['phone'])) ? $_POST['phone'] : ''; ?>">
                        </p>
                        <p>
                            <label>Địa chỉ <span>*</span></label>
                            <input type="text" name="address" required value="<?php echo (isset($_POST['address'])) ? $_POST['address'] : ''; ?>">
                        </p>
                        <div class="login_submit">
                            <button type="submit">đăng ký</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--register area end-->
        </div>
    </div>
</div>
<!-- customer login end -->
<!--script for dki-->
<script>
    function validateForm() {
        var username = document.forms["registrationForm"]["username"].value;
        var fullname = document.forms["registrationForm"]["fullname"].value;
        var address = document.forms["registrationForm"]["address"].value;
        var email = document.forms["registrationForm"]["email"].value;
        var password = document.forms["registrationForm"]["password"].value;
        var phone = document.forms["registrationForm"]["phone"].value;
        
    // Kiểm tra ký tự đặc biệt và độ dài tên đăng nhập
    if (/[^a-zA-Z0-9_\s]/.test(username) || username.length > 255 || /\s/.test(username)) {
        alert("Tên đăng nhập không được chứa ký tự đặc biệt và không quá 255 ký tự.");
        return false;
    }


        // Kiểm tra cú pháp email
    if (!/^\w+([\.-]?\w+)*@(gmail\.com|yahoo\.com|hotmail\.com|outlook\.com|aol\.com|icloud\.com|me\.com|protonmail\.com|yandex\.com|live\.com|qq\.com|163\.com)$/.test(email)) {
        alert("Email phải có định dạng hợp lệ và đuôi phổ biến như @gmail.com, @yahoo.com, v.v.");
        return false;
    }

    // Kiểm tra chiều dài mật khẩu
    if (password.length <= 5 || password.length >= 255) {
        alert("Mật khẩu phải dài ít nhất 6 kí tự và không quá 255 kí tự");
        return false;
    }

    // Kiểm tra khoảng trắng mật khẩu
    if (/\s/.test(password)) {
        alert("Mật khẩu không được chứa khoảng trắng.");
        return false;
    }

    // Kiểm tra họ và tên
    if (!/^[a-zA-Z\sÀ-ỹ]{1,255}$/.test(fullname)) {
        alert("Họ và tên không được chứa ký tự đặc biệt và không quá 255 ký tự");
        return false;
    }
    // Kiểm tra xem fullname có chứa khoảng trắng không
    if (!/\s/.test(fullname)) {
        alert("Dữ liệu nhập vào không chứa khoảng trắng.");
        return false;
    }

    // Kiểm tra số điện thoại
    if (!(phone.startsWith('0') && (phone.length === 10 ))) {
        alert("Số điện thoại phải bắt đầu bằng số 0 và có độ dài là 10 ");
        return false;
    }

   //Kiểm tra địa chỉ
    if (/[@!#$%^&*()+\=\[\]{};':"\\|<>?]/g.test(address.replace('/', '')) || address.length > 255) {
        alert("Địa chỉ không được chứa ký tự đặc biệt và không quá 255 ký tự");
        return false;
    }
    // Kiểm tra xem địa chỉ có chứa ít nhất một ký tự số không
    if (!/\d/.test(address)) {
        alert("Dữ liệu nhập vào phải có ký tự số");
        return false;
    }

    if (!/\s/.test(address)) {
        alert("Dữ liệu nhập vào phải có khoảng trắng");
        return false;
    }

    // Kiểm tra xem địa chỉ chỉ chứa số và không có chữ cái
    if (/^\d+$/.test(address) || !/[a-zA-Z]/.test(address)) {
        alert("Dữ liệu nhập vào phải có chữ cái");
        return false;
    }

        return true; 
    }
</script>
<?php require_once('footer.php') ?>
