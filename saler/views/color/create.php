<?=template_header('Create Color')?>

<body>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold title_create">Create Color</h3>
                <form class="form_create" action="index.php?controller=color&action=store " method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Name</span>
                        <input type="text" class="form-control" value=1 required name="color_id">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Value</span>
                        <input type="text" class="form-control" value=1 required name="product_id">
                    </div>
                    <div class="form-group  float-end ">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="index.php?controller=color&action=index" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

<?=template_footer()?>