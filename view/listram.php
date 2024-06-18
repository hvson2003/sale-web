<?php require_once('header_quanly.php'); ?> 
    <div id="content-container">
        <div id="page-head">
            
            <!--Page Title-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <div id="page-title">
                <h1 class="page-header text-overflow">Quản Lý / Ram</h1>

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
                                <span>/ Danh sách ram</span>
                            </div>
                            <div class="col-sm-6 table-toolbar-right">
                                <a href="admin.php?task=addram" class="btn btn-primary p-2"><i class="demo-pli-plus"></i> Thêm thông số ram mới cho sản phẩm</a>
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
                            <?php if (!is_null($ram_list)): ?>
                                <?php $i = 1; while($ram = $ram_list->fetch_assoc()){ ?>
                                <tr>
                                    <td><?php echo $ram['name'] ?></td>
                                    <td><?php echo $ram['value'] ?></td>
                                    <td>
                                        <a href="admin.php?task=editram&id=<?php echo $ram['id'] ?>"class="btn btn-warning">Sửa</a>
                                        <a onclick="return confirm('bạn có chắc muốn xóa thông số ram này ?')" href="admin.php?task=deleteram&id=<?php echo $ram['id'] ?>"class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            <?php else: ?>
                                <b>Chưa có thông số ram nào ! Bạn cần thêm thông số ram mới</b>
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