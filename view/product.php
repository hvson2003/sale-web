<?php require_once('header.php'); ?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0"></script>
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.php">Trang chủ</a></li>
                            <li><?php echo $category['name'] ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--product details start-->
    <div class="product_details variable_product mt-60 mb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-tab">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="<?php echo $product['thumbnail'] ?>"
                                    data-zoom-image="<?php echo $product['thumbnail'] ?>" alt="<?php echo $product['name'] ?>" style="width: 568px;height: 568px">
                            </a>
                        </div>
                        <div class="single-zoom-thumb">
                            <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                <?php while($imageItem = $images_product->fetch_assoc()){ ?>
                                <li>
                                    <a href="#" class="elevatezoom-gallery active" data-update=""
                                        data-image="<?php echo $imageItem['link'] ?>"
                                        data-zoom-image="<?php echo $imageItem['link'] ?>">
                                        <img src="<?php echo $imageItem['link'] ?>" style="width: 102.75px;height: 102.75px" alt="zo-th-1" />
                                    </a>

                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                        <form action="cart.php?task=addtocart" method="POST">
                            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                            <h1><?php echo $product['name'] ?></h1>
                            <div class=" product_ratting">
                                <ul>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="review"><a href="#"> (đánh giá) </a></li>
                                </ul>

                            </div>
                            <div class="price_box">
                                <span class="current_price"><?php echo number_format($product['sale_price'], 0, '.', ','); ?>đ</span>
                                <span class="old_price"><?php echo number_format($product['price'], 0, '.', ','); ?>đ</span>

                            </div>
                            <div class="product_desc">
                                <p><?php echo $product['product_desc'] ?></p>
                            </div>
                            <div class="product_variant color">
                                <h3>Tùy chọn</h3>
                                <label>Màu sắc :</label>
                                <!-- colors -->
                                <br>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <?php $color_array = array();while($colorItem = $color_product_list->fetch_assoc()){ $cl = $colorItem['color_id'];$color_array[] = $cl;?>
                                    <label class="btn" title="Chọn màu <?php echo $this->model->get('colors','id='.$cl)['name'] ?>" style="width: 30px;height: 30px;display: block;border:1px solid #ccc;background-color: <?php echo $this->model->get('colors','id='.$cl)['value'] ?>">
                                    <input <?php echo (count($color_array)==1) ? 'checked' : '' ?> type="radio" name="color" value="<?php echo $cl ?>">
                                    </label>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="product_variant size">
                                <label>Bộ nhớ :</label>
                                <select class="niceselect_option" id="color2" name="memory">
                                    <option selected> Chọn bộ nhớ</option>
                                    <?php $memory_array = array();$i1=0;
                                    while($memoryItem = $memory_product_list->fetch_assoc()){$i1++; $memory = $this->model->get("memories","id=".$memoryItem['memory_id']);$memory_array[]=$memory['id'];?>
                                    <option <?php echo $i1==1 ? 'selected' : '' ?> value="<?php echo $memory['id'] ?>"><?php echo $memory['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="product_variant size">
                                <label>Dung lượng ram :</label>
                                <select class="niceselect_option" id="color2" name="ram">
                                    <option selected> Chọn dung lượng ram</option>
                                    <?php $ram_array = array();$i2=0;
                                    while($ramItem = $ram_product_list->fetch_assoc()){$i2++; $ram = $this->model->get("rams","id=".$ramItem['ram_id']);$ram_array[]=$ram['id'];?>
                                    <option <?php echo $i2==1 ? 'selected' : '' ?> value="<?php echo $ram['id'] ?>"><?php echo $ram['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="product_variant quantity">
                                <label>Số lượng</label>
                                <input min="1" max="<?php echo $product['amount'] ?>" value="1" type="number" name="quantity">
                                <button class="button" type="submit">thêm vào giỏ</button>

                            </div>

                        </form>

                        <div class="product_d_meta">
                            <span>Danh mục: <a href="#"><?php echo $category['name'] ?></a></span>
                        </div>
                        <div class="priduct_social">
                            <ul>
                                <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i>
                                        Like</a></li>
                                <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a>
                                </li>
                                <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i>
                                        share</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--product details end-->

    <!--product info start-->
    <div class="product_d_info mb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">
                        <div class="product_info_button">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info"
                                        aria-selected="false">Mô tả sản phẩm</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"
                                        aria-selected="false">Thông số</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel">
                                <div class="product_info_content">
                                    <?php echo $product['detail_desc'] ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sheet" role="tabpanel">
                                <div class="product_d_table">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="first_child">Màu sắc</td>
                                                <td><?php foreach ($color_array as $value) {
                                                    echo $this->model->get('colors','id='.$value)['name'].', ';
                                                } ?></td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Bộ nhớ</td>
                                                <td><?php foreach ($memory_array as $value) {
                                                    echo $this->model->get('memories','id='.$value)['name'].', ';
                                                } ?></td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Dung lượng ram</td>
                                                <td><?php foreach ($ram_array as $value) {
                                                    echo $this->model->get('rams','id='.$value)['name'].', ';
                                                } ?></td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Vi xử lý</td>
                                                <td><?php echo $product['chipset'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Kích thước</td>
                                                <td><?php echo $product['size'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Màn hình</td>
                                                <td><?php echo $product['screen'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Camera</td>
                                                <td><?php echo $product['camera'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Hãng điện thoại</td>
                                                <td><?php echo $product['company'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Xuất xứ</td>
                                                <td><?php echo $product['origin'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product info end-->

    <!-- comment -->
    <div class="container">
        <div class="row mb-5">
            <div class="col-12"><h4>Bình luận :</h4></div>
            <div class="col-12">
                <!-- <div class="fb-comments" data-href="http://thucmobile.com/idsp/" data-width="100%" data-numposts="5"></div> -->
                <div class="reviews_wrapper">
                    <h2 id="comment">Bình luận cho sản phẩm</h2>
                    <?php if (!empty($_GET['status'])): ?>
                        <?php if ($_GET['status']==true): ?>
                            <div class="alert alert-success">Bình luận thành công</div>
                        <?php endif; ?>
                        <?php if ($_GET['status']==false): ?>
                            <div class="alert alert-danger">Bình luận không thành công</div>
                        <?php endif ?>
                    <?php endif ?>
                    <?php if (is_null($comment_list)): ?>
                        <p>Chưa có bình luận nào</p>
                    <?php else: ?>
                        <?php while($cm = $comment_list->fetch_assoc()){ ?>
                        <div class="reviews_comment_box">
                            <div class="comment_thmb">
                                <img src="https://demo.hasthemes.com/junko-preview/junko/assets/img/blog/comment2.jpg" alt="">
                            </div>
                            <div class="comment_text">
                                <div class="reviews_meta">
                                    <p><strong><?php echo $cm['name'] ?> </strong>- <?php echo $cm['created_at'] ?></p>
                                    <span><?php echo $cm['content'] ?></span>
                                </div>
                            </div>

                        </div>
                        <?php } ?>
                    <?php endif ?>
                    <div class="comment_title">
                        <h2>Thêm bình luận </h2>
                        <p>Những bình luận tiêu cực sẽ bị lọc khỏi hệ thống </p>
                    </div>
                    <div class="product_review_form">
                        <form action="product.php?task=addcomment" method="POST">
                            <input type="hidden" name="product" value="<?php echo $product['id'] ?>">
                            <div class="row">
                                <div class="col-12">
                                    <label for="review_comment">Nội dung </label>
                                    <textarea name="content" id="review_comment"></textarea>
                                </div>
                                <?php if (empty($_SESSION['nmb_userdata'])): ?>
                                <div class="col-lg-6 col-md-6">
                                    <label for="author">Tên</label>
                                    <input name="name" id="author" type="text">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <label for="email">Email </label>
                                    <input name="email" id="email" type="text">
                                </div>
                                <?php endif ?>
                            </div>
                            <button type="submit">Gửi bình luận</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product area start-->
    <section class="product_area related_products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Sản phẩm tương tự </h2>
                    </div>
                </div>
            </div>
            <div class="product_carousel product_column5 owl-carousel">
                <?php if (is_null($related_products)): ?>
                    <b>Không có sản phẩm nào !</b>
                <?php else: ?>
                    <?php while($productItem = $related_products->fetch_assoc()){ ?>
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product.php?id=<?php echo $productItem['id'] ?>"><img
                                            src="<?php echo $productItem['thumbnail'] ?>" alt=""></a>
                                    <a class="secondary_img" href="product.php?id=<?php echo $productItem['id'] ?>"><img
                                            src="<?php echo $productItem['thumbnail'] ?>" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">sale</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="thêm vào giỏ hàng">Thêm vào giỏ</a>
                                    </div>
                                </div>
                                <figcaption class="product_content">
                                    <div class="price_box">
                                        <span class="old_price"><?php echo number_format($productItem['price'], 0, '.', ','); ?>đ</span>
                                        <span class="current_price"><?php echo number_format($productItem['sale_price'], 0, '.', ','); ?>đ</span>
                                    </div>
                                    <h3 class="product_name"><a href="product.php?id=<?php echo $productItem['id'] ?>"><?php echo $productItem['name'] ?></a></h3>
                                </figcaption>
                            </figure>
                        </article>
                    <?php } ?>
                <?php endif ?>
            </div>
        </div>
    </section>
    <!--product area end-->

<?php require_once('footer.php') ?>