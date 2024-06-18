<?php require_once('header_quanly.php'); ?> 
    <div id="content-container">
        <div id="page-head">
            
            <!--Page Title-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <div id="page-title">
                <h1 class="page-header text-overflow">Quản Lý / Hóa Đơn</h1>

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
                <div class="panel-heading">
                </div>
            
                <div class="panel-body">
                    <table id="dtable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Mã hóa đơn</th>
                                <th>Danh sách mặt hàng</th>
                                <th>Tổng tiền</th>
                                <th>Người đặt</th>
                                <th>Ngày đặt hàng</th>
                                <th>Tình trạng</th>
                                <th>Tác vụ</th>
                        </thead>
                        <tbody>
                            <?php $i = 1; if(is_null($order_list)){ echo '<tr><td>Chưa có hóa đơn nào !</td></tr>';
                            } else {
                            while($hd = $order_list->fetch_assoc()){ ?>
                            <tr>
                                <td>#<?php echo $hd['id']; ?></td>
                                <td><?php $sanphams = $this->model->getArray('orders_products','order_id='.$hd['id']);
                                    while($sp = $sanphams->fetch_assoc()){ ?>
                                        <p>- <?php echo $this->model->get('products','id='.$sp['product_id'])['name'].'<b> ('.$this->model->get('colors','id='.$sp['color_id'])['name'].')'.' ('.$this->model->get('memories','id='.$sp['memory_id'])['name'].')</b> x '.$sp['quantity']; ?> </p>
                                    <?php } ?></td>
                                <td><?php echo number_format($hd['total'], 0, '.', ',');?>đ</td>
                                <td>
                                    <?php if($hd['user_id']!=0){ ?>
                                        <a href="user.php?id=<?php echo $hd['user_id'] ?>"><?php echo $this->model->get('users','id='.$hd['user_id'])['fullname'] ?></a>
                                    <?php } else { ?>
                                        <?php echo $hd['fullname'] ?>
                                    <?php } ?>
                                </td>
                                <td><?php echo date_format(date_create($hd['created_at']),"d-m-Y"); ?></td>
                                <td>
                                    <?php if($hd['active']==0) echo '<span class="btn btn-danger">Chưa duyệt</span>';if($hd['active']==1) echo '<span class="btn btn-success">Đã duyệt</span>';  ?>
                                </td>
                                <td>
                                    <a href="admin.php?task=detailorder&id=<?php echo $hd['id'] ?>" class="btn btn-success">Xem đơn</a>
                                    <a href="admin.php?task=deleteorder&id=<?php echo $hd['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            <?php }} ?>
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