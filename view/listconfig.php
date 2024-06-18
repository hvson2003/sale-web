<?php require_once('header_quanly.php'); ?> 
    <div id="content-container">
        <div id="page-head">
            
            <!--Page Title-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <div id="page-title">
                <h1 class="page-header text-overflow">Quản Lý / Cấu Hình Trang Web</h1>

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
                                <span>/ Danh sách cấu hình</span>
                            </div>
                            <div class="col-sm-6 table-toolbar-right">
                                <a href="admin.php?task=addconfig" class="btn btn-primary p-2"><i class="demo-pli-plus"></i> Thêm cấu hình mới</a>
                            </div>
                        </div>
                    </div>
                    <table id="demo-dt-addrow" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên cấu hình</th>
                                <th>Mô tả</th>
                                <th>Giá trị</th>
                                <th>Tác vụ</th>
                        </thead>
                        <tbody>
                            <?php if (!is_null($config_list)): ?>
                                <?php $i = 1; while($cauhinh = $config_list->fetch_assoc()){ ?>
                                <tr>
                                    <td><?php echo $cauhinh['id'] ?></td>
                                    <td><?php echo $cauhinh['config_key'] ?></td>
                                    <td><?php echo $cauhinh['config_desc'] ?></td>
                                    <td><?php echo $cauhinh['config_value'] ?></td>
                                    <td>
                                        <a href="admin.php?task=editconfig&id=<?php echo $cauhinh['id'] ?>"class="btn btn-warning">Sửa</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            <?php else: ?>
                                <b>Chưa có cấu hình nào ! Bạn cần thêm cấu hình</b>
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