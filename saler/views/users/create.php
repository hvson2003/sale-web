<?=template_header('Create User')?>

<body>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold title_create">Create User</h3>
                <form class="form_create" action="index.php?controller=user&action=store" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Username</span>
                        <input type="text" class="form-control" required name="username">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Password</span>
                        <input type="password" class="form-control" required name="password">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Fullname</span>
                        <input type="text" class="form-control" required name="fullname">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Email</span>
                        <input type="text" class="form-control" required name="email">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Address</span>
                        <input type="text" class="form-control" required name="address">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Phone</span>
                        <input type="text" class="form-control" required name="phone">
                    </div>
                    <div class="input-group mt-3 mb-3 ">
                        <div>
                        <label for="role" >Role</label>
                        <select  name="role" id="role">
                            <option value="2">Người dùng thường</option>
                            <option value="1">Người bán hàng</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group  float-end ">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="index.php?controller=category&action=index" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

<?=template_footer()?>