<?=template_header('Detail Order')?>

<body>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold title_detail">Detail Order</h3>
                <form class="form_detail" action="index.php?controller=order&action=update" method="post">
                    <div class="input-group mt-3 mb-3">
                        <input type="text" class="form-control" value="<?= $order['id'] ?>" required name="id" hidden>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">fullname</span>
                        <input type="text" class="form-control" value="<?= $order['fullname'] ?>" required name="fullname">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">email</span>
                        <input type="text" class="form-control" value="<?= $order['email'] ?>" required name="email">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">phone</span>
                        <input type="text" class="form-control" value="<?= $order['phone'] ?>" required name="phone">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">address</span>
                        <input type="text" class="form-control" value="<?= $order['address'] ?>" required name="address">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">note</span>
                        <input type="text" class="form-control" value="<?= $order['note'] ?>" required name="note">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">created_at</span>
                        <input type="text" class="form-control" value="<?= $order['created_at'] ?>" required name="created_at">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">payment</span>
                        <input type="text" class="form-control" value="<?= $order['payment'] ?>" required name="payment">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">total</span>
                        <input type="text" class="form-control" value="<?= $order['total'] ?>" required name="total">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">quantity</span>
                        <input type="text" class="form-control" value="<?= $order['quantity'] ?>" required name="quantity">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">item</span>
                        <input type="text" class="form-control" value="<?= $order['item'] ?>" required name="item">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">payed</span>
                        <input type="text" class="form-control" value="<?= $order['payed'] ?>" required name="payed">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">active</span>
                        <input type="text" class="form-control" value="<?= $order['active'] ?>" required name="active">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">user_id</span>
                        <input type="text" class="form-control" value="<?= $order['user_id'] ?>" required name="user_id">
                    </div>
                    <div class="form-group  float-end ">
                        <a href="index.php?controller=category&action=index" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

<?=template_footer()?>