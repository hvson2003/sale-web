<?php require_once('header.php') ?>
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.php">trang chủ</a></li>
                            <li>danh mục </li>
                            <li><?php echo $category['name'] ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--shop  area start-->
    <div class="shop_area shop_reverse mt-60 mb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <!--sidebar widget start-->
                    <aside class="sidebar_widget">
                        <div class="widget_inner">
                            <div class="widget_list widget_categories">
                                <h2>Danh sách danh mục</h2>
                                <ul>
                                    <?php foreach ($dms as $dm): ?>
                                    <li><a href="category.php?id=<?php echo $dm['id'] ?>"><?php echo $dm['name'] ?></a></li>    
                                    <?php endforeach ?>
                                </ul>
                            </div>
                            <div class="widget_list tags_widget">
                                <h2>Từ khóa</h2>
                                <div class="tag_cloud">
                                    <?php $clouds = explode(' ', $category['name']) ?>
                                    <?php foreach ($clouds as $key => $value): ?>
                                    <a href="search.php?keyword=<?php echo $value ?>"><?php echo $value ?></a>
                                    <?php endforeach ?>
                                    
                                </div>
                            </div>
                        </div>
                    </aside>
                    <!--sidebar widget end-->
                </div>
                <div class="col-lg-9 col-md-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">
                            <button data-role="grid_3" type="button" class="btn-grid-3" data-toggle="tooltip"
                                title="3"></button>
                            <button data-role="grid_4" type="button" class="btn-grid-4" data-toggle="tooltip"
                                title="4"></button>
                            <button data-role="grid_list" type="button" class="active btn-list" data-toggle="tooltip"
                                title="List"></button>
                        </div>
                        <div class=" niceselect_option">
                            <form class="select_option" action="#">
                                <select name="orderby" id="short">
                                    <option selected value="0">Sắp xếp theo</option>
                                </select>
                            </form>
                        </div>
                        <div class="page_amount">
                            <p>Hiển thị <?php echo $start ?>–<?php echo $start+$limit ?> của <?php echo $total_records ?> sản phẩm</p>
                        </div>
                    </div>
                    <!--shop toolbar end-->

                    <div class="row shop_wrapper grid_list">
                        <?php if (is_null($product_list)): ?>
                            <div class="col">
                                <b>Danh mục này chưa có sản phẩm nào !</b>
                            </div>
                        <?php else: ?>
                            <?php while($productItem = $product_list->fetch_assoc()){ ?>
                            <div class="col-12 ">
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
                                                <a href="#" onclick="addtocart(this)" data-product="<?php echo $productItem['id'] ?>" title="thêm vào giỏ hàng">Thêm vào giỏ</a>
                                            </div>
                                        </div>
                                        <div class="product_content grid_content">
                                            <div class="price_box">
                                                <span class="old_price"><?php echo $productItem['price'] ?></span>
                                                <span class="current_price"><?php echo $productItem['sale_price'] ?></span>
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
                                            <h3 class="product_name grid_name"><a href="product.php?id=<?php echo $productItem['id'] ?>"><?php echo $productItem['name'] ?></a></h3>
                                        </div>
                                        <div class="product_content list_content">
                                            <div class="left_caption">
                                                <div class="price_box">
                                                    <span class="old_price"><?php echo number_format($productItem['price'], 0, '.', ','); ?>đ</span>
                                                    <span class="current_price"><?php echo number_format($productItem['sale_price'], 0, '.', ','); ?>đ</span>
                                                </div>
                                                <h3 class="product_name"><a href="product.php?id=<?php echo $productItem['id'] ?>"><?php echo $productItem['name'] ?></a></h3>
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
                                                    <p><?php echo $productItem['product_desc'] ?></p>
                                                </div>
                                            </div>
                                            <div class="right_caption">
                                                <div class="add_to_cart">
                                                    <a href="#" onclick="addtocart(this)" data-product="<?php echo $productItem['id'] ?>" data-original-title="add to cart">Thêm vào giỏ</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </figure>
                                </article>
                            </div>
                            <?php } ?>
                        <?php endif; ?>
                    </div>

                    <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                            <ul>
                                <?php if ($current_page > 1 && $total_page > 1): ?>
                                <li><a href="category.php?id=<?php echo $_GET['id'] ?>&page=<?php echo $current_page-1 ?>"><i class="fa fa-angle-left"></i></a></li>   
                                <?php endif ?>
                                <?php for ($i=1; $i<$total_page; $i++) { 
                                   if ($i == $current_page){
                                        echo '<li class="current">'.$i.'</li>';
                                    }
                                    else{
                                        echo '<li><a href="category.php?id='.$_GET['id'].'&page='.$i.'">'.$i.'</a></li>';
                                    }
                                } ?>
                                <?php if ($current_page < $total_page && $total_page > 1): ?>
                                <li><a href="category.php?id=<?php echo $_GET['id'] ?>&page=<?php echo $current_page+1 ?>"><i class="fa fa-angle-right"></i></a></li>    
                                <?php endif ?>
                            </ul>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
    <!--shop  area end-->

<?php require_once('footer.php') ?>