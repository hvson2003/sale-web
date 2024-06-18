<?php require_once('header.php'); ?>

    <!--slider area start-->
    <section class="slider_section slider_section_five mb-70 mt-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="slider_area owl-carousel">
                        <?php if (is_null($slide_list)): ?>
                            <b>Chưa có slide nào !</b>
                        <?php else: ?>
                            <?php $i=0;while ($slide = $slide_list->fetch_assoc()) { $i++;?>
                            <div class="single_slider d-flex align-items-center"
                                data-bgimg="<?php echo $slide['image_url'] ?>">
                                <div class="slider_content slider_c_four">
                                    <h1><?php echo $slide['title'] ?></h1>
                                    <h2><?php echo $slide['sub_title'] ?></h2>
                                    <p><?php echo $slide['slide_desc'] ?></p>
                                    <a class="button" href="<?php echo $slide['button_url'] ?>"><?php echo $slide['button_title'] ?></a>
                                </div>
                            </div>
                            <?php } ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--slider area end-->


    <!--shipping area start-->
    <section class="shipping_area shipping_four mb-70">
        <div class="container">
            <div class="shipping_inner">
                <div class=" row no-gutters">
                    <div class="col-lg-3 col-md-6">
                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <img src="assets/img/shipping1.png" alt="">
                            </div>
                            <div class="shipping_content">
                                <h2>Miễn phí vận chuyển</h2>
                                <p>Cho tất cả đơn hàng</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <img src="assets/img/shipping2.png" alt="">
                            </div>
                            <div class="shipping_content">
                                <h2>Thanh toán an toàn</h2>
                                <p>Bảo mật thông tin 100%</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <img src="assets/img/shipping3.png" alt="">
                            </div>
                            <div class="shipping_content">
                                <h2>Hoàn tiền x5</h2>
                                <p>Nếu sản phẩm có vấn đề</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single_shipping last_child">
                            <div class="shipping_icone">
                                <img src="assets/img/shipping4.png" alt="">
                            </div>
                            <div class="shipping_content">
                                <h2>Hỗ trợ 24/7</h2>
                                <p>Tổng đài CSKH 24/7</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--shipping area end-->

    <!--banner area start-->
    <div class="banner_area mt-35">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="single_banner mb-30">
                        <div class="banner_thumb">
                            <a href="#"><img src="assets/img/banner/banner1.jpg" style="width: 750px;height: 220px" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_banner mb-30">
                        <div class="banner_thumb">
                            <a href="#"><img style="width: 750px;height: 220px" src="assets/img/banner/banner2.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--banner area end-->

    <!--product area start-->
    <div class="product_area mb-46">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_tab_btn3">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#Bestseller" role="tab"
                                    aria-controls="Bestseller" aria-selected="true">
                                    Sản phẩm mới
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#Products3" role="tab" aria-controls="Products3"
                                    aria-selected="false">
                                    Sản phẩm bán chạy
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="Bestseller" role="tabpanel">
                    <div class="product_carousel product_column5 owl-carousel">
                        <?php if (is_null($product_list)): ?>
                            <b>Chưa có sản phẩm nào !</b>
                        <?php else: ?>
                            <?php while($data = $product_list->fetch_assoc()){ ?>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product.php?id=<?php echo $data['id'] ?>"><img
                                                    src="<?php echo $data['thumbnail'] ?>" alt=""></a>
                                            <a class="secondary_img" href="product.php?id=<?php echo $data['id'] ?>"><img
                                                    src="<?php echo $data['thumbnail'] ?>" alt=""></a>
                                            <div class="label_product">
                                                <span class="label_sale">sale</span>
                                            </div>
                                            <div class="add_to_cart">
                                                <a href="#" onclick="addtocart(this)" data-product="<?php echo $data['id'] ?>" title="thêm vào giỏ hàng">Thêm vào giỏ</a>
                                            </div>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price"><?php echo number_format($data['price'], 0, '', ',') ?>đ</span>
                                                <span class="current_price"><?php echo number_format($data['sale_price'], 0, '', ',') ?>đ</span>
                                            </div>
                                            <h3 class="product_name"><a href="product.php?id=<?php echo $data['id'] ?>"><?php echo $data['name'] ?></a></h3>
                                        </figcaption>
                                    </figure>
                                </article>
                            <?php } ?>
                        <?php endif ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="Products3" role="tabpanel">
                    <div class="product_carousel product_column5 owl-carousel">
                        <?php if (is_null($product_best)): ?>
                            <b>Chưa có sản phẩm nào !</b>
                        <?php else: ?>
                            <?php while($data = $product_best->fetch_assoc()){ ?>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product.php?id=<?php echo $data['id'] ?>"><img src="<?php echo $data['thumbnail'] ?>" alt=""></a>
                                            <a class="secondary_img" href="product.php?id=<?php echo $data['id'] ?>"><img src="<?php echo $data['thumbnail'] ?>" alt=""></a>
                                            <div class="label_product">
                                                <span class="label_sale">sale</span>
                                            </div>
                                            <div class="add_to_cart">
                                                <a href="#" onclick="addtocart(this)" data-product="<?php echo $data['id'] ?>" title="thêm vào giỏ hàng">Thêm vào giỏ</a>
                                            </div>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price"><?php echo number_format($data['price'], 0, '', ',') ?>đ</span>
                                                <span class="current_price"><?php echo number_format($data['sale_price'], 0, '', ',') ?>đ</span>
                                            </div>
                                            <h3 class="product_name"><a href="product.php?id=<?php echo $data['id'] ?>"><?php echo $data['name'] ?></a></h3>
                                        </figcaption>
                                    </figure>
                                </article>
                            <?php } ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product area end-->

    <!--featured product area start-->
    <section class="featured_product_area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Sản phẩm ngẫu nhiên</h2>
                    </div>
                </div>
            </div>
            <div class="row featured_container featured_column3">
                <?php if (is_null($product_random)): ?>
                    <b>Chưa có sản phẩm nào !</b>
                <?php else: ?>
                    <?php while($data = $product_random->fetch_assoc()){ ?>
                        <div class="col-lg-4">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product.php?id=<?php echo $data['id'] ?>"><img
                                                src="<?php echo $data['thumbnail'] ?>" alt=""></a>
                                        <a class="secondary_img" href="product.php?id=<?php echo $data['id'] ?>"><img
                                                src="<?php echo $data['thumbnail'] ?>" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">sale</span>
                                        </div>
                                    </div>
                                    <figcaption class="product_content">
                                        <div class="price_box">
                                            <span class="current_price"><?php echo number_format($data['sale_price'], 0, '', ',') ?>đ</span>
                                        </div>
                                        <h3 class="product_name"><a href="product.php?id=<?php echo $data['id'] ?>"><?php echo $data['name'] ?></a></h3>
                                        <div class="add_to_cart">
                                            <a href="#" onclick="addtocart(this)" data-product="<?php echo $data['id'] ?>" title="thêm vào giỏ hàng">Thêm vào giỏ</a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                    <?php } ?>
                <?php endif ?>
            </div>
        </div>
    </section>
    <!--featured product area end-->

    <!--top- category area start-->
    <section class="top_category_product mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3">
                    <div class="top_category_header">
                        <h3>Danh mục sản phẩm</h3>
                        <p>Một vài danh mục nổi bật.</p>
                        <a href="category.php">Tất cả danh mục</a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-9">
                    <div class="top_category_container category_column5 owl-carousel">
                        <?php foreach($dms as $value): ?>
                        <div class="col-lg-2">
                            <article class="single_category">
                                <figure>
                                    <div class="category_thumb">
                                        <a href="category.php?id=<?php echo $value['id'] ?>"><img src="<?php echo $value['thumbnail'] ?>" alt=""></a>
                                    </div>
                                    <figcaption class="category_name">
                                        <h3><a href="category.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h3>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--top- category area end-->

    <!--banner area start-->
    <div class="banner_area banner_fullwidth5  mb-68">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="single_banner">
                        <div class="banner_thumb">
                            <a href="#"><img src="assets/img/banner8.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--banner area end-->

    <!--product area start-->
    <section class="product_area mb-46">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Macbook & Asus</h2>
                    </div>
                </div>
            </div>
            <div class="product_slick product_slick_column5">
                <?php if (is_null($applesamsung)): ?>
                    <b>Chưa có sản phẩm nào !</b>
                <?php else: ?>
                    <?php while($data = $applesamsung->fetch_assoc()){ ?>
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product.php?id=<?php echo $data['id'] ?>"><img
                                            src="<?php echo $data['thumbnail'] ?>" alt=""></a>
                                    <a class="secondary_img" href="product.php?id=<?php echo $data['id'] ?>"><img
                                            src="<?php echo $data['thumbnail'] ?>" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">sale</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="#" onclick="addtocart(this)" data-product="<?php echo $data['id'] ?>" title="thêm vào giỏ hàng">Thêm vào giỏ</a>
                                    </div>
                                </div>
                                <figcaption class="product_content">
                                    <div class="price_box">
                                        <span class="old_price"><?php echo number_format($data['price'], 0, '', ',') ?>đ</span>
                                        <span class="current_price"><?php echo number_format($data['sale_price'], 0, '', ',') ?>đ</span>
                                    </div>
                                    <h3 class="product_name"><a href="product.php?id=<?php echo $data['id'] ?>"><?php echo $data['name'] ?></a></h3>
                                </figcaption>
                            </figure>
                        </article>
                    <?php } ?>
                <?php endif ?>
            </div>
        </div>
    </section>
    <!--product area end-->

    <!--blog area start-->
    <section class="blog_section mb-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Tin tức mới nhất</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if (is_null($blog_list)): ?>
                    <b>Chưa có bài viết nào !</b>
                <?php else: ?>
                <div class="blog_carousel blog_column4 owl-carousel">
                    <?php while($baiviet = $blog_list->fetch_assoc()){ ?>
                        <div class="col-lg-3">
                            <article class="single_blog">
                                <figure>
                                    <div class="blog_thumb">
                                        <a href="blog.php?id=<?php echo $baiviet['id'] ?>"><img src="<?php echo $baiviet['thumbnail'] ?>" alt=""></a>
                                    </div>
                                    <figcaption class="blog_content">
                                        <p class="post_author">Bởi <a href="#"><?php echo $this->model->get('users','id='.$baiviet['user_id'])['username'] ?></a> <?php echo date_format(date_create($baiviet['created_at']),'d M, Y') ?></p>
                                        <h3 class="post_title"><a href="blog.php?id=<?php echo $baiviet['id'] ?>"><?php echo mb_substr($baiviet['title'], 0,110) ?>...</a></h3>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                    <?php } ?>
                </div>
                <?php endif ?>
            </div>
        </div>
    </section>
    <!--blog area end-->
<?php require_once('footer.php') ?>