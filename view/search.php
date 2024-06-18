<?php require_once('header.php'); ?>
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.php">Trang chủ</a></li>
                            <li>Tìm kiếm </li>
                            <li><?php echo $_GET['keyword'] ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--shop  area start-->
    <div class="shop_area shop_fullwidth mt-60 mb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--shop wrapper start-->

                    <div class="row shop_wrapper">
                        <?php if (is_null($result)): ?>
                            <p>Không tìm thấy sản phẩm nào với từ khóa <b><?php echo $_GET['keyword'] ?></b></p>
                        <?php else: ?>
                            <?php while($data = $result->fetch_assoc()){ ?>
                            <div class="col-lg-3 col-md-4 col-12 ">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product.php?id=<?php echo $data['id'] ?>"><img
                                                    src="<?php echo $data['thumbnail'] ?>" alt=""></a>
                                            <a class="secondary_img" href="product.php?id=<?php echo $data['id'] ?>"><img src="<?php echo $data['thumbnail'] ?>" alt=""></a>
                                            <div class="add_to_cart">
                                                <a href="#" onclick="addtocart(this)" data-product="<?php echo $data['id'] ?>" title="thêm vào giỏ hàng">Thêm vào giỏ</a>
                                            </div>
                                        </div>
                                        <div class="product_content grid_content">
                                            <div class="price_box">
                                                <span class="old_price"><?php echo number_format($data['price'], 0, '', ',') ?>đ</span>
                                                <span class="current_price"><?php echo number_format($data['sale_price'], 0, '', ',') ?>đ</span>
                                            </div>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                </ul>
                                            </div>
                                            <h3 class="product_name grid_name"><a href="product.php?id=<?php echo $data['id'] ?>"><?php echo $data['name'] ?></a></h3>
                                        </div>
                                        <div class="product_content list_content">
                                            <div class="left_caption">
                                                <div class="price_box">
                                                    <span class="old_price"><?php echo number_format($data['price'], 0, '', ',') ?>đ</span>
                                                    <span class="current_price"><?php echo number_format($data['sale_price'], 0, '', ',') ?>đ</span>
                                                </div>
                                                <h3 class="product_name"><a href="product.php?id=<?php echo $data['id'] ?>"><?php echo $data['name'] ?></a></h3>
                                                <div class="product_ratings">
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product_desc">
                                                    <p><?php echo $data['product_desc'] ?></p>
                                                </div>
                                            </div>
                                            <div class="right_caption">
                                                <div class="add_to_cart">
                                                    <a href="#" onclick="addtocart(this)" data-product="<?php echo $data['id'] ?>" title="thêm vào giỏ hàng">Thêm vào giỏ</a>
                                                </div>
                                            </div>
                                        </div>
                                    </figure>
                                </article>
                            </div>
                            <?php } ?>
                        <?php endif ?>
                    </div>
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
    <!--shop  area end-->
<?php require_once('footer.php'); ?>