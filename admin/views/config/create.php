<?=template_header('Create Config')?>

<body>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold title_create">Create Config</h3>
                <form class="form_create" action="index.php?controller=config&action=store" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">config_key</span>
                        <input type="text" class="form-control" value=1 required name="config_key">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">config_value</span>
                        <input type="text" class="form-control" value=1 required name="config_value">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">config_desc</span>
                        <input type="text" class="form-control" value=1 required name="config_desc">
                    </div>
                    <div class="form-group  float-end ">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="index.php?controller=config&action=index" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

<?=template_footer()?>