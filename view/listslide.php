<?php require_once('header_quanly.php'); ?> 
    <div id="content-container">
        <div id="page-head">
            
            <!--Page Title-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <div id="page-title">
                <h1 class="page-header text-overflow">Quản Lý / Slide</h1>

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
                                <span>/ Danh sách slide</span>
                            </div>
                            <div class="col-sm-6 table-toolbar-right">
                                <a href="admin.php?task=addslide" class="btn btn-primary p-2"><i class="demo-pli-plus"></i> Thêm slide mới</a>
                            </div>
                        </div>
                    </div>
                    <table id="demo-dt-addrow" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <th>Tiêu đề phụ</th>
                                <th>Mô tả</th>
                                <th>Link ảnh</th>
                                <th>Tiêu đề button</th>
                                <th>Link button</th>
                                <th>Tác vụ</th>
                        </thead>
                        <tbody>
                            <?php if (!is_null($slide_list)): ?>
                                <?php $i = 1; while($slide = $slide_list->fetch_assoc()){ ?>
                                <tr>
                                    <td><?php echo $slide['id'] ?></td>
                                    <td><?php echo $slide['title'] ?></td>
                                    <td><?php echo $slide['sub_title'] ?></td>
                                    <td><?php echo $slide['slide_desc'] ?></td>
                                    <td><?php echo $slide['image_url'] ?></td>
                                    <td><?php echo $slide['button_title'] ?></td>
                                    <td><?php echo $slide['button_url'] ?></td>
                                    <td>
                                        <a href="admin.php?task=editslide&id=<?php echo $slide['id'] ?>"class="btn btn-warning">Sửa</a>
                                        <a onclick="return confirm('bạn có chắc muốn xóa slide này ?')" href="admin.php?task=deleteslide&id=<?php echo $slide['id'] ?>"class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            <?php else: ?>
                                <b>Chưa có slide nào ! Bạn cần tạo silde mới</b>
                            <?php endif; ?>
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