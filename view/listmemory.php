<?php require_once('header_quanly.php'); ?> 
    <div id="content-container">
        <div id="page-head">
            
            <!--Page Title-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <div id="page-title">
                <h1 class="page-header text-overflow">Quản Lý / Bộ Nhớ</h1>

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
                                <span>/ Danh sách bộ nhớ</span>
                            </div>
                            <div class="col-sm-6 table-toolbar-right">
                                <a href="admin.php?task=addmemory" class="btn btn-primary p-2"><i class="demo-pli-plus"></i> Thêm bộ nhớ mới cho sản phẩm</a>
                            </div>
                        </div>
                    </div>
                    <table id="dtable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Giá trị</th>
                                <th>Tác vụ</th>
                        </thead>
                        <tbody>
                            <?php if (!is_null($memory_list)): ?>
                                <?php $i = 1; while($memory = $memory_list->fetch_assoc()){ ?>
                                <tr>
                                    <td><?php echo $memory['name'] ?></td>
                                    <td><?php echo $memory['value'] ?></td>
                                    <td>
                                        <a href="admin.php?task=editmemory&id=<?php echo $memory['id'] ?>"class="btn btn-warning">Sửa</a>
                                        <a onclick="return confirm('bạn có chắc muốn xóa bộ nhớ sản phẩm này ?')" href="admin.php?task=deletememory&id=<?php echo $memory['id'] ?>"class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            <?php else: ?>
                                <b>Chưa có bộ nhớ sản phẩm nào ! Bạn cần thêm bộ nhớ mới</b>
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
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
<?php require_once('footer_quanly.php'); ?> 