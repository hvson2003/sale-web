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
                            <li><a href="blog.php">Tin tức</a></li>
                            <li><?php echo $blog['title'] ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--blog body area start-->
    <div class="blog_details mt-60">
        <div class="container">
            <div class="row">

                <div class="col-lg-9 col-md-12">
                    <!--blog grid area start-->
                    <div class="blog_wrapper">
                        <article class="single_blog">
                            <figure>
                                <div class="post_header">
                                    <h3 class="post_title"><?php echo $blog['title'] ?></h3>
                                    <div class="blog_meta">
                                        <span class="author">Đăng bởi : <a href="#"><?php echo $this->model->get('users','id='.$blog['user_id'])['username'] ?></a> / </span>
                                        <span class="post_date">Lúc : <a href="#"><?php echo date_format(date_create($blog['created_at']),'d/m/Y') ?></a></span>
                                    </div>
                                </div>
                                <div class="blog_thumb">
                                    <a href="<?php echo $blog['thumbnail'] ?>"><img src="<?php echo $blog['thumbnail'] ?>" alt=""></a>
                                </div>
                                <figcaption class="blog_content">
                                    <div class="post_content">
                                        <blockquote>
                                            <p><?php echo $blog['blog_desc'] ?></p>
                                        </blockquote>
                                        <?php echo $blog['content'] ?>
                                    </div>
                                    <div class="entry_content">
                                        <div class="post_meta">
                                            <span>Từ khóa: </span>
                                            <?php $clouds = explode(' ', $blog['title']) ?>
                                            <?php foreach ($clouds as $value): ?>
                                            <span><a href="search.php?keyword=<?php echo $value ?>">, <?php echo $value ?></a></span>
                                            <?php endforeach ?>
                                        </div>

                                        <div class="social_sharing">
                                            <p>Chia sẻ bài viết:</p>
                                            <ul>
                                                <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#" title="google+"><i class="fa fa-google-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </article>
                        <div class="related_posts">
                            <h3>Bài viết ngẫu nhiên</h3>
                            <div class="row">
                                <?php while($bvnn = $random_blog->fetch_assoc()){ ?>
                                <div class="col-lg-4 col-md-6">
                                    <article class="single_related">
                                        <figure>
                                            <div class="related_thumb">
                                                <img src="<?php echo $bvnn['thumbnail'] ?>" alt="">
                                            </div>
                                            <figcaption class="related_content">
                                                <div class="blog_meta">
                                                    <span class="author">Bởi : <a href="#"><?php echo $this->model->get('users','id='.$bvnn['user_id'])['username'] ?></a> / </span>
                                                    <span class="post_date"> <?php echo date_format(date_create($bvnn['created_at']),'d/m/Y') ?></span>
                                                </div>
                                                <h4><a href="blog.php?id=<?php echo $bvnn['id'] ?>"><?php echo $bvnn['title'] ?></a></h4>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="comments_box">
                            <h3>Bình luận </h3>
                            <div class="comment_list">
                                <div class="fb-comments" data-href="http://thucmobile.com/idbv/<?php echo $blog['id'] ?> " data-width="100%" data-numposts="5"></div>
                            </div>
                        </div>

                    </div>
                    <!--blog grid area start-->
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="blog_sidebar_widget">
                        <div class="widget_list widget_search">
                            <h3>Tìm kiếm</h3>
                            <form action="search.php">
                                <input name="keyword" placeholder="Nội dung tìm kiếm..." type="text">
                                <button type="submit">tìm kiếm</button>
                            </form>
                        </div>
                        <div class="widget_list widget_post">
                            <h3>Bài đăng gần đây</h3>
                            <?php while($bvgd = $blog_list->fetch_assoc()){ ?>
                            <div class="post_wrapper">
                                <div class="post_thumb">
                                    <a href="<?php echo $bvgd['thumbnail'] ?>"><img src="<?php echo $bvgd['thumbnail'] ?>" alt=""></a>
                                </div>
                                <div class="post_info">
                                    <h3><a href="blog.php?id=<?php echo $bvgd['id'] ?>"><?php echo $bvgd['title'] ?></a></h3>
                                    <span><?php echo date_format(date_create($bvgd['created_at']),'d/m/Y') ?></span>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="widget_list widget_categories">
                            <h3>Danh mục sản phẩm</h3>
                            <ul>
                                <?php foreach($dms as $dm): ?>
                                <li><a href="category.php?id=<?php echo $dm['id'] ?>"><?php echo $dm['name'] ?></a></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <div class="widget_list widget_tag">
                            <h3>Từ khóa bài viết</h3>
                            <div class="tag_widget">
                                <ul>
                                    <?php $clouds = explode(' ', $blog['title']) ?>
                                    <?php foreach ($clouds as $value): ?>
                                    <li><a href="search.php?keyword=<?php echo $value ?>"><?php echo $value ?></a></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--blog section area end-->
<?php require_once('footer.php'); ?>