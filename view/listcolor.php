<?php require_once('header_quanly.php'); ?> 
    <div id="content-container">
        <div id="page-head">
            
            <!--Page Title-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <div id="page-title">
                <h1 class="page-header text-overflow">Quản Lý / Màu Sắc</h1>

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
                                <span>/ Danh sách màu sắc</span>
                            </div>
                            <div class="col-sm-6 table-toolbar-right">
                                <a href="admin.php?task=addcolor" class="btn btn-primary p-2"><i class="demo-pli-plus"></i> Thêm màu sắc sản phẩm mới</a>
                            </div>
                        </div>
                    </div>
                    <table id="dtable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Giá trị</th>
                                <th>Hiển thị</th>
                                <th>Tác vụ</th>
                        </thead>
                        <tbody>
                            <?php if (!is_null($color_list)): ?>
                                <?php $i = 1; while($mausac = $color_list->fetch_assoc()){ ?>
                                <tr>
                                    <td><?php echo $mausac['id'] ?></td>
                                    <td><?php echo $mausac['name'] ?></td>
                                    <td><?php echo $mausac['value'] ?></td>
                                    <td><button class="btn btn-default" style="color:#fff;background-color: <?php echo $mausac['value'] ?>"><?php echo $mausac['name'] ?></button></td>
                                    <td>
                                        <a href="admin.php?task=editcolor&id=<?php echo $mausac['id'] ?>"class="btn btn-warning">Sửa</a>
                                        <a onclick="return confirm('bạn có chắc muốn xóa màu sản phẩm này ?')" href="admin.php?task=deletecolor&id=<?php echo $mausac['id'] ?>"class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            <?php else: ?>
                                <b>Chưa có màu sản phẩm nào ! Bạn cần tạo màu mới</b>
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