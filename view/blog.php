<?php require_once('header.php') ?>
<!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.php">Trang chủ</a></li>
                            <li>Tin tức</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--blog area start-->
    <div class="blog_page_section blog_reverse mt-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="blog_sidebar_widget">
                        <div class="widget_list widget_search">
                            <h3>Tìm kiếm</h3>
                            <form action="search.php">
                                <input name="keyword" placeholder="Nội dung..." type="text">
                                <button type="submit">Tìm kiếm</button>
                            </form>
                        </div>
                        <div class="widget_list widget_post">
                            <h3>Bài đăng gần đây</h3>
                            <?php while($bvgd = $blog_list_recent->fetch_assoc()){ ?>
                            <div class="post_wrapper">
                                <div class="post_thumb">
                                    <a href="<?php echo $bvgd['thumbnail'] ?>"><img src="<?php echo $bvgd['thumbnail'] ?>" alt=""></a>
                                </div>
                                <div class="post_info">
                                    <h3><a href="blog.php?id=<?php echo $bvgd['id'] ?>"><?php echo mb_substr($bvgd['title'], 0, 75); ?>..</a></h3>
                                    <span><?php echo date_format(date_create($bvgd['created_at']),'d/m/Y') ?></span>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="widget_list widget_categories">
                            <h3>Danh mục sản phẩm</h3>
                            <ul>
                                <?php foreach ($dms as $value) : ?>
                                <li><a href="category.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></li>    
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <div class="widget_list widget_tag">
                            <h3>Từ khóa</h3>
                            <div class="tag_widget">
                                <ul>
                                    <li><a href="#">iphone</a></li>
                                    <li><a href="#">xiaomi</a></li>
                                    <li><a href="#">thucmobile</a></li>
                                    <li><a href="#">dienthoaididong</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="blog_wrapper blog_wrapper_sidebar">
                        <div class="blog_header">
                            <h1>Bài đăng</h1>
                        </div>
                        <div class="row">
                            <?php if (is_null($blog_list)): ?>
                                <b>Chưa có bài viết nào !</b>
                            <?php else: ?>
                                <?php while($blog = $blog_list->fetch_assoc()){ ?>
                                    <div class="col-lg-6 col-md-6">
                                        <article class="single_blog mb-60">
                                            <figure>
                                                <div class="blog_thumb">
                                                    <a href="<?php echo $blog['thumbnail'] ?>"><img src="<?php echo $blog['thumbnail'] ?>" alt=""></a>
                                                </div>
                                                <figcaption class="blog_content">
                                                    <h3><a href="blog.php?id=<?php echo $blog['id'] ?>"><?php echo $blog['title'] ?></a></h3>
                                                    <div class="blog_meta">
                                                        <span class="author">Đăng bởi : <a href="#"><?php echo $this->model->get('users','id='.$blog['user_id'])['username'] ?></a> / </span>
                                                        <span class="post_date">Lúc : <?php echo date_format(date_create($blog['created_at']),'d/m/Y') ?></span>
                                                    </div>
                                                    <div class="blog_desc">
                                                        <p><?php echo $blog['blog_desc'] ?></p>
                                                    </div>
                                                    <footer class="readmore_button">
                                                        <a href="blog.php?id=<?php echo $blog['id'] ?>">xem thêm</a>
                                                    </footer>
                                                </figcaption>
                                            </figure>
                                        </article>
                                    </div>
                                <?php } ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--blog area end-->

    <!--blog pagination area start-->
    <div class="blog_pagination">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pagination">
                            <ul>
                                <?php if ($current_page > 1 && $total_page > 1): ?>
                                <li><a href="blog.php?page=<?php echo $current_page-1 ?>"><i class="fa fa-angle-left"></i></a></li>   
                                <?php endif ?>
                                <?php for ($i=1; $i<$total_page; $i++) { 
                                   if ($i == $current_page){
                                        echo '<li class="current">'.$i.'</li>';
                                    }
                                    else{
                                        echo '<li><a href="blog.php?page='.$i.'">'.$i.'</a></li>';
                                    }
                                } ?>
                                <?php if ($current_page < $total_page && $total_page > 1): ?>
                                <li><a href="blog.php?page=<?php echo $current_page+1 ?>"><i class="fa fa-angle-right"></i></a></li>    
                                <?php endif ?>
                            </ul>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!--blog pagination area end-->
<?php require_once('footer.php') ?>