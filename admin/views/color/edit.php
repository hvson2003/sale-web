<?=template_header('Edit Color')?>

<body>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold title_edit">Edit Color</h3>
                <form class="form_edit" action="index.php?controller=color&action=update" method="post">
                    <div class="input-group mt-3 mb-3">
                        <input type="text" class="form-control" required name="id" value="<?= $color["id"] ?>" hidden>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Name</span>
                        <input type="text" class="form-control" required name="color_id" value="<?= $color["name"] ?>">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Value</span>
                        <textarea type="text" class="form-control" name="product_id" required><?= $color["value"] ?></textarea>
                    </div>
                    <div class="form-group  float-end ">
                        <input type="submit" value="Đồng ý" class="btn btn-success">
                        <a href="index.php?controller=color&action=index" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

<?=template_footer()?>