<?php require_once('header_quanly.php'); ?> 
    <div id="content-container">
        <div id="page-head">
            
            <!--Page Title-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <div id="page-title">
                <h1 class="page-header text-overflow">Quản Lý / Bài Viết</h1>

                <!--Searchbox-->
                <div class="searchbox">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search..">
                        <span class="input-group-btn">
                            <button class="text-muted" type="button"><i class="demo-pli-magnifi-glass"></i></button>
                        </span>
                    </div>
                </div>
            </div>
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <!--End page title-->
        </div>

        
        <!--Page content-->
        <!--===================================================-->
        <div id="page-content">
			<!-- Add Row -->
            <!--===================================================-->
            <div class="panel">
                <div class="panel-body">
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                <span>/ Danh sách bài viết</span>
                            </div>
                            <div class="col-sm-6 table-toolbar-right">
                                <a href="admin.php?task=addblog" class="btn btn-purple">
                                    <i class="demo-pli-add icon-fw"></i> Thêm bài viết mới
                                </a>
                            </div>
                        </div>
                    </div>
                    <table id="demo-dt-addrow" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <th>Tác giả</th>
                                <th>Hình ảnh</th>
                                <th>Tác vụ</th>
                        </thead>
                        <tbody>
                            <?php if (is_null($blog_list)): ?>
                                <b>Chưa có bài viết nào</b>
                            <?php else: ?>
                                <?php $i = 1; while($baiviet = $blog_list->fetch_assoc()){ ?>
                                <tr>
                                    <td><?php echo $baiviet['id'] ?></td>
                                    <td><?php echo $baiviet['title'] ?></td>
                                    <td><?php echo $this->model->get('users','id='.$baiviet['user_id'])['username'] ?></td>
                                    <td><img src="<?php echo $baiviet['thumbnail'] ?>" class="img-lg" alt=""></td>
                                    <td>
                                        <a href="blog.php?&id=<?php echo $baiviet['id'] ?>"class="btn btn-primary">Xem chi tiết</a>
                                        <a href="admin.php?task=editblog&id=<?php echo $baiviet['id'] ?>"class="btn btn-warning">Sửa</a>
                                        <a href="admin.php?task=deleteblog&id=<?php echo $baiviet['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            <?php endif ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <!--===================================================-->
            <!-- End Add Row -->
        </div>
        <!--===================================================-->
        <!--End page content-->

    </div>
    <!--===================================================-->
    <!--END CONTENT CONTAINER-->
<?php require_once('footer_quanly.php'); ?> 