<?php require_once('header_quanly.php'); ?> 
    <div id="content-container">
        <div id="page-head">
            
            <!--Page Title-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <div id="page-title">
                <h1 class="page-header text-overflow">Quản Lý / Sản Phẩm</h1>

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
                                <span>/ Danh sách sản phẩm</span>
                            </div>
                            <div class="col-sm-6 table-toolbar-right">
                                <a href="admin.php?task=addproduct" class="btn btn-primary p-2"><i class="demo-pli-plus"></i> Thêm sản phẩm mới</a>
                            </div>
                        </div>
                    </div>
                    <table id="dtable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Số lượng</th>
                                <th>Tác vụ</th>
                        </thead>
                        <tbody>
                            <?php if (is_null($product_list)): ?>
                                <b>Chưa có sản phẩm nào !</b>
                            <?php else: ?>
                                <?php $i = 1; while($sanpham = $product_list->fetch_assoc()){ ?>
                                <tr>
                                    <td><?php echo $sanpham['id'] ?></td>
                                    <td><?php echo $sanpham['name'] ?></td>
                                    <td><img src="<?php echo $sanpham['thumbnail'] ?>" class="img-md" alt=""></td>
                                    <td><?php echo $sanpham['amount'] ?></td>
                                    <td>
                                        <a href="admin.php?task=editproduct&id=<?php echo $sanpham['id'] ?>" class="btn btn-warning">Sửa</a>
                                        <a href="admin.php?task=deleteproduct&id=<?php echo $sanpham['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
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