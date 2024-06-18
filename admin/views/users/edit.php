<?=template_header('Edit User')?>

<body>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm form_edit">
                <h3 class="text-center text-uppercase fw-bold title_edit">Edit User</h3>
                <form action="index.php?controller=user&action=update" method="post">
                    <input type="text" class="form-control" value="<?= $user['id'] ?>" required name="id" hidden>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Username</span>
                        <input type="text" class="form-control" value="<?= $user['username'] ?>" required name="username">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Password</span>
                        <input type="password" class="form-control" value="<?= $user['password'] ?>" required name="password" readonly>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Fullname</span>
                        <input type="text" class="form-control" value="<?= $user['fullname'] ?>"  required name="fullname">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Email</span>
                        <input type="text" class="form-control" value="<?= $user['email'] ?>"  required name="email">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Address</span>
                        <input type="text" class="form-control" value="<?= $user['address'] ?>"  required name="address">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Phone</span>
                        <input type="text" class="form-control" value="<?= $user['phone'] ?>" required name="phone">
                    </div>
                    <div class="input-group mt-3 mb-3 ">
                        <div >
                            <label   for="role">Role</label>
                            <select   name="role" id="role">
                                <option value="2" <?= ($user['role']==2) ? "selected" : "" ?>>Người dùng thường</option>
                                <option value="1" <?= ($user['role']==1) ? "selected" : "" ?>>Người bán hàng</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group  float-end ">
                        <input type="submit" value="Đồng ý" class="btn btn-success">
                        <a href="index.php?controller=user&action=index" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

<?=template_footer()?>