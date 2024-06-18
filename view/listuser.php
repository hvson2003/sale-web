<?php require_once('header_quanly.php'); ?> 
    <div id="content-container">
        <div id="page-head">
            
            <!--Page Title-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <div id="page-title">
                <h1 class="page-header text-overflow">Quản Lý / Thành Viên</h1>

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
            <div class="panel panel">
                <div class="panel-body">
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                <span>/ Danh sách thành viên</span>
                            </div>
                            <div class="col-sm-6 table-toolbar-right">
                                <a href="admin.php?task=adduser" class="btn btn-primary p-2"><i class="demo-pli-plus"></i> Thêm thành viên mới</a>
                            </div>
                        </div>
                    </div>
                    <table id="demo-dt-addrow" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên đăng nhập</th>
                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Vai trò</th>
                                <th>Tác vụ</th>
                        </thead>
                        <tbody>
                            <?php $i = 1; while($tv = $user_list->fetch_assoc()){ ?>
                            <tr>
                                <td><?php echo $tv['id'] ?></td>
                                <td><?php echo $tv['username'] ?></td>
                                <td><?php echo $tv['fullname'] ?></td>
                                <td><?php echo $tv['email'] ?></td>
                                <td><?php echo $tv['phone'] ?></td>
                                <td><?php if($tv['role']==1){echo "Admin";}else{echo "Thành viên";} ?></td>
                                <td>
                                    <a href="admin.php?task=edituser&id=<?php echo $tv['id'] ?>" class="btn btn-warning">Sửa</a>
                                    <a href="admin.php?task=deleteuser&id=<?php echo $tv['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                                </td>
                            </tr>
                            <?php } ?>
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