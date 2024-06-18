<?php $configArr = $this->model->getArray('configs',''); $configs=array(); while($configs[] = $configArr->fetch_assoc());?>
<!doctype html>
<html class="no-js" lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo isset($title) ? $title : $configs[0]['config_value']; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/p.png">

    <!-- CSS 
    ========================= -->
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif !important;
        }
    </style>
    <!--Font Awesome [ OPTIONAL ]-->
    <link href="assets/backend/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/frontend2/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/frontend2/style.css">
    <!-- JS -->
    <!--jQuery [ REQUIRED ]-->
    <script src="assets/backend/js/jquery.min.js"></script>
<style>
    .logo{
        background-color: #a92525;
        border: 1px solid #a92525;
        border-radius: 5px;
        padding: 12px;
        font-size: 30px;
        color: white;
    }
    .logo a{
        color: white;
    }
    .footer_logo a {
        background-color: #a92525;
        border: 1px solid #a92525;
        border-radius: 5px;
        padding: 2px;
        font-size: 19px;
        color:  white;
    }


</style>
</head>

<body>


    <!--Offcanvas menu area start-->
    <div class="off_canvars_overlay">

    </div>
    <div class="Offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <a href="javascript:void(0)"><i class="fa fa-navicon"></i></a>
                    </div>
                    <div class="Offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a href="javascript:void(0)"><i class="fa fa-times"></i></a>
                        </div>
                        <div class="support_info">
                            <p>CSKH: <a href="tel:<?php echo $configs[1]['config_value'] ?>"><?php echo $configs[1]['config_value'] ?></a></p>
                        </div>
                        <div class="top_right text-right">
                            <?php if (is_null($_SESSION['nmb_userdata'])): ?>
                                <ul>
                                    <li><a href="index.php?task=user"> Đăng nhập </a></li>
                                    <li><a href="index.php?task=user"> Đăng ký </a></li>
                                </ul>
                            <?php else: ?>
                                <ul>
                                    <li><a href="user.php"> <?php echo $_SESSION['nmb_userdata']['username'] ?> </a></li>
                                    <li><a href="admin.php"> Quản lý </a></li>
                                </ul>
                            <?php endif ?>
                        </div>
                        <div class="search_container">
                            <div class="search_box">
                                <form action="search.php">
                                <input placeholder="Tìm kiếm sản phẩm..." type="text" name="keyword">
                                <button type="submit">Tìm kiếm</button>
                                </form>
                            </div>
                        </div>

                        <div class="middel_right_info">
                            <div class="mini_cart_wrapper">
                                <a href="javascript:void(0)"><i class="fa fa-shopping-bag"
                                        aria-hidden="true"></i></span>
                                            <span class="price"><?php 
                                                    echo number_format($this->cart->getAttributeTotal('sale_price'), 0, '.', ',');
                                                     ?>đ <i class="fa fa-angle-down"></i></a>
                                <span class="cart_quantity"><?php echo $this->cart->getTotalItem(); ?></span>
                                <!--mini cart-->
                                <div class="mini_cart">
                                    <?php if ($this->cart->isEmpty()){ echo 'Chưa có sản phẩm nào trong giỏ hàng';} ?>
                                    <?php $allProducts = $this->cart->getItems();
                                    foreach ($allProducts as $product_carts): ?>
                                        <?php foreach ($product_carts as $product_cart): ?>
                                        <div class="cart_item">
                                            <div class="cart_img">
                                                <a href="product.php?id=<?php echo $product_cart['id'] ?>"><img src="<?php echo $product_cart['attributes']['thumbnail'] ?>" alt="<?php echo $product_cart['attributes']['name'] ?>" /></a>
                                            </div>
                                            <div class="cart_info">
                                                <a href="product.php?id=<?php echo $product_cart['id'] ?>"><?php echo $product_cart['attributes']['name'].'<b> ('.$this->model->get('colors','id='.$product_cart['attributes']['color'])['name'].')'.' ('.$this->model->get('memories','id='.$product_cart['attributes']['memory'])['name'].')'.' ('.$this->model->get('rams','id='.$product_cart['attributes']['ram'])['name'].')</b>' ?></a>
                                                <p>SL: <?php echo $product_cart['quantity'] ?> X <span> <?php echo $product_cart['attributes']['sale_price'] ?> đ </span></p>
                                            </div>
                                            <div class="cart_remove">
                                                <a href="cart.php?task=removeitem&id=<?php echo $product_cart['id'] ?>&cl=<?php echo $product_cart['attributes']['color']; ?>&m=<?php echo $product_cart['attributes']['memory']; ?>&r=<?php echo $product_cart['attributes']['ram']; ?>" title="Xóa sản phẩm này trong giỏ"><i class="fa fa-times"></i></a>
                                            </div>
                                        </div>
                                        <?php endforeach ?>
                                    <?php endforeach ?>
                                    <div class="mini_cart_table">
                                        <div class="cart_total">
                                            <span>Tiền sản phẩm:</span>
                                            <span class="price"><?php 
                                                    echo number_format($this->cart->getAttributeTotal('sale_price'), 0, '.', ',');
                                                     ?> đ</span>
                                        </div>
                                        <div class="cart_total mt-10">
                                            <span>Tổng chi phí:</span>
                                            <span class="price"><?php 
                                                    echo number_format($this->cart->getAttributeTotal('sale_price'), 0, '.', ',');
                                                     ?> đ</span>
                                        </div>
                                    </div>

                                    <div class="mini_cart_footer">
                                        <div class="cart_button">
                                            <a href="cart.php">Xem giỏ hàng</a>
                                        </div>
                                        <div class="cart_button">
                                            <a href="checkout.php">Thanh toán</a>
                                        </div>

                                    </div>

                                </div>
                                <!--mini cart end-->
                            </div>
                        </div>
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active">
                                    <a href="index.php">Trang chủ</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Danh mục </a>
                                    <?php if (!is_null($category_list)): ?>
                                        <ul class="sub_menu">
                                            <?php $dms = array();while($data = $category_list->fetch_assoc()){ $dms[] = $data; ?>
                                            <li><a href="category.php?id=<?php echo $data['id'] ?>"><?php echo $data['name'] ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    <?php endif ?>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="blog.php">Tin tức</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="index.php?task=aboutus">Giới thiệu</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="index.php?task=contactus">Liên hệ</a>
                                </li>
                            </ul>
                        </div>

                        <div class="Offcanvas_footer">
                            <span><a href="#"><i class="fa fa-envelope-o"></i> info@yourdomain.com</a></span>
                            <ul>
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Offcanvas menu area end-->

    <!--header area start-->
    <header>
        <div class="main_header">
            <!--header top start-->
            <div class="header_top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="support_info">
                                <p>Chăm sóc khách hàng : <a href="tel:<?php echo $configs[1]['config_value'] ?>"><?php echo $configs[1]['config_value'] ?></a></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="top_right text-right">
                                <?php if (empty($_SESSION['nmb_userdata'])): ?>
                                    <ul>
                                        <li><a href="user.php"> Đăng nhập / Đăng ký </a></li>
                                    </ul>
                                <?php else: ?>
                                    <ul>
                                        <li><a href="user.php"> <?php echo $_SESSION['nmb_userdata']['username'] ?> </a></li>
                                        <?php if($_SESSION['nmb_userdata']['role']==1): ?>
                                            <li><a href="admin.php"> Quản lý </a></li>
                                        <?php else: ?>
                                            <li><a href="user.php?task=logout"> Đăng xuất </a></li>
                                        <?php endif; ?>
                                    </ul>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--header top start-->
            <!--header middel start-->
            <div class="header_middle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-6">
                            <div class="logo">
                                <a href="index.php">HE COMPUTER</a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-6">
                            <div class="middel_right">
                                <div class="search_container">
                                    <form action="search.php">
                                        <div class="search_box">
                                            <input placeholder="Tìm kiếm sản phẩm..." type="text" name="keyword">
                                            <button type="submit">Tìm kiếm</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="middel_right_info">
                                    <div class="header_wishlist">
                                        <a href="user.php"><i class="fa fa-user-o" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="mini_cart_wrapper">
                                        <a href="javascript:void(0)"><i class="fa fa-shopping-bag"
                                                aria-hidden="true"></i><?php 
                                                    echo number_format($this->cart->getAttributeTotal('sale_price'), 0, '.', ',');
                                                     ?>đ <i class="fa fa-angle-down"></i></a>
                                        <span class="cart_quantity"><?php echo $this->cart->getTotalItem(); ?></span>
                                        <!--mini cart-->
                                        <div class="mini_cart">
                                            <?php if ($this->cart->isEmpty()){ echo 'Chưa có sản phẩm nào trong giỏ hàng';} ?>
                                    <?php $allProducts = $this->cart->getItems();
                                    foreach ($allProducts as $product_carts): ?>
                                        <?php foreach ($product_carts as $product_cart): ?>
                                            <div class="cart_item">
                                                <div class="cart_img">
                                                    <a href="product.php?id=<?php echo $product_cart['id'] ?>"><img src="<?php echo $product_cart['attributes']['thumbnail'] ?>" alt="<?php echo $product_cart['attributes']['name'] ?>" /></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="product.php?id=<?php echo $product_cart['id'] ?>"><?php echo $product_cart['attributes']['name'].'<b> ('.$this->model->get('colors','id='.$product_cart['attributes']['color'])['name'].')'.' ('.$this->model->get('memories','id='.$product_cart['attributes']['memory'])['name'].')'.' ('.$this->model->get('rams','id='.$product_cart['attributes']['ram'])['name'].')</b>' ?></a>
                                                    <p>SL: <?php echo $product_cart['quantity'] ?> X <span> <?php echo $product_cart['attributes']['sale_price'] ?> đ </span></p>
                                                </div>
                                                <div class="cart_remove">
                                                    <a href="cart.php?task=removeitem&id=<?php echo $product_cart['id'] ?>&cl=<?php echo $product_cart['attributes']['color']; ?>&m=<?php echo $product_cart['attributes']['memory']; ?>&r=<?php echo $product_cart['attributes']['ram']; ?>" title="Xóa sản phẩm này trong giỏ"><i class="fa fa-times"></i></a>
                                                </div>
                                            </div>
                                            <?php endforeach ?>
                                    <?php endforeach ?>
                                            <div class="mini_cart_table">
                                                <div class="cart_total">
                                                    <span>Tiền sản phẩm:</span>
                                                    <span class="price"><?php 
                                                    echo number_format($this->cart->getAttributeTotal('sale_price'), 0, '.', ',');
                                                     ?> đ</span>
                                                </div>
                                                <div class="cart_total mt-10">
                                                    <span>Tổng chi phí:</span>
                                                    <span class="price"><?php 
                                                    echo number_format($this->cart->getAttributeTotal('sale_price'), 0, '.', ',');
                                                     ?> đ</span>
                                                </div>
                                            </div>

                                            <div class="mini_cart_footer">
                                                <div class="cart_button">
                                                    <a href="cart.php">Xem giỏ hàng</a>
                                                </div>
                                                <div class="cart_button">
                                                    <a href="checkout.php">Thanh toán</a>
                                                </div>

                                            </div>

                                        </div>
                                        <!--mini cart end-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--header middel end-->
            <!--header bottom satrt-->
            <div class="main_menu_area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-md-12">
                            <div class="main_menu menu_position">
                                <nav>
                                    <ul>
                                        <li><a class="active" href="index.php">Trang chủ</a></li>
                                        <li><a href="blog.html">Danh mục<i class="fa fa-angle-down"></i></a>
                                            <?php if (!is_null($category_list)): ?>
                                                <ul class="sub_menu pages">
                                                    <?php foreach($dms as $data){ ?>
                                                    <li><a href="category.php?id=<?php echo $data['id'] ?>"><?php echo $data['name'] ?></a></li>
                                                    <?php } ?>
                                                </ul>
                                            <?php endif ?>
                                        </li>
                                        <li><a href="blog.php">Tin tức</a></li>
                                        <li><a href="index.php?task=aboutus">Giới thiệu</a></li>
                                        <li><a href="index.php?task=contactus">Liên hệ</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--header bottom end-->
        </div>
    </header>
    <!--header area end-->

    <!--sticky header area start-->
    <div class="sticky_header_area sticky-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="index.php">HE COMPUTER</a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="sticky_header_right menu_position">
                        <div class="main_menu">
                            <nav>
                                <ul>
                                    <li><a class="active" href="index.php">Trang chủ</a></li>
                                    <li><a href="blog.html">Danh mục<i class="fa fa-angle-down"></i></a>
                                        <?php if (!is_null($category_list)): ?>
                                            <ul class="sub_menu pages">
                                                <?php foreach($dms as $data){ ?>
                                                <li><a href="category.php?id=<?php echo $data['id'] ?>"><?php echo $data['name'] ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        <?php endif ?>
                                    </li>
                                    <li><a href="blog.php">Tin tức</a></li>
                                    <li><a href="index.php?task=aboutus">Giới thiệu</a></li>
                                    <li><a href="index.php?task=contactus">Liên hệ</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="middel_right_info">
                            <div class="header_wishlist">
                                <a href="user.php"><i class="fa fa-user-o" aria-hidden="true"></i></a>
                            </div>
                            <div class="mini_cart_wrapper">
                                <a href="javascript:void(0)"><i class="fa fa-shopping-bag"
                                        aria-hidden="true"></i><?php 
                                                    echo number_format($this->cart->getAttributeTotal('sale_price'), 0, '.', ',');
                                                     ?>đ <i class="fa fa-angle-down"></i></a>
                                <span class="cart_quantity"><?php echo $this->cart->getTotalItem(); ?></span>
                                <!--mini cart-->
                                <div class="mini_cart">
                                    <?php if ($this->cart->isEmpty()){ echo 'Chưa có sản phẩm nào trong giỏ hàng';} ?>
                                    <?php $allProducts = $this->cart->getItems();
                                    foreach ($allProducts as $product_carts): ?>
                                        <?php foreach ($product_carts as $product_cart): ?>
                                    <div class="cart_item">
                                        <div class="cart_img">
                                            <a href="product.php?id=<?php echo $product_cart['id'] ?>"><img src="<?php echo $product_cart['attributes']['thumbnail'] ?>" alt="<?php echo $product_cart['attributes']['name'] ?>" /></a>
                                        </div>
                                        <div class="cart_info">
                                            <a href="product.php?id=<?php echo $product_cart['id'] ?>"><?php echo $product_cart['attributes']['name'].'<b> ('.$this->model->get('colors','id='.$product_cart['attributes']['color'])['name'].')'.' ('.$this->model->get('memories','id='.$product_cart['attributes']['memory'])['name'].')'.' ('.$this->model->get('rams','id='.$product_cart['attributes']['ram'])['name'].')</b>' ?></a>
                                            <p>SL: <?php echo $product_cart['quantity'] ?> X <span> <?php echo $product_cart['attributes']['sale_price'] ?> đ </span></p>
                                        </div>
                                        <div class="cart_remove">
                                            <a href="cart.php?task=removeitem&id=<?php echo $product_cart['id'] ?>&cl=<?php echo $product_cart['attributes']['color']; ?>&m=<?php echo $product_cart['attributes']['memory']; ?>&r=<?php echo $product_cart['attributes']['ram']; ?>" title="Xóa sản phẩm này trong giỏ"><i class="fa fa-times"></i></a>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                    <?php endforeach ?>
                                    <div class="mini_cart_table">
                                        <div class="cart_total">
                                            <span>Tiền sản phẩm:</span>
                                            <span class="price"><?php 
                                                    echo number_format($this->cart->getAttributeTotal('sale_price'), 0, '.', ',');
                                                     ?> đ</span>
                                        </div>
                                        <div class="cart_total mt-10">
                                            <span>Tổng chi phí:</span>
                                            <span class="price"><?php 
                                                    echo number_format($this->cart->getAttributeTotal('sale_price'), 0, '.', ',');
                                                     ?> đ</span>
                                        </div>
                                    </div>

                                    <div class="mini_cart_footer">
                                        <div class="cart_button">
                                            <a href="cart.php">Xem giỏ hàng</a>
                                        </div>
                                        <div class="cart_button">
                                            <a href="checkout.php">Thanh toán</a>
                                        </div>

                                    </div>

                                </div>
                                <!--mini cart end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--sticky header area end-->