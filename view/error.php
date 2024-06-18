<?php require_once('header.php') ?>
<!--error section area start-->
<div class="error_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="error_form">
                    <h1>404</h1>
                    <h2>Opps! PAGE NOT BE FOUND</h2>
                    <p>Xin lỗi nhưng trang bạn đang tìm kiếm không tồn tại, đã bị xóa, tên đã thay đổi hoặc tạm thời không khả dụng.</p>
                    <form action="search.php">
                        <input name="keyword" placeholder="Tìm kiếm..." type="text">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <a href="index.php">Trở lại trang chủ</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--error section area end-->
<?php require_once('footer.php') ?>