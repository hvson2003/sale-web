<?=template_header('Edit Category')?>

<body>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold title_edit">Edit Category</h3>
                <form class="form_edit" action="index.php?controller=category&action=update" method="post">
                    <div class="input-group mt-3 mb-3">
                        <input type="text" class="form-control" required name="id" value="<?= $category["id"] ?>" hidden>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Name</span>
                        <input type="text" class="form-control" required name="name" value="<?= $category["cate_desc"] ?>">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Category Description</span>
                        <textarea type="text" style="width: 300px; height: 150px;" class="form-control" name="cate_desc" required><?= $category["cate_desc"] ?></textarea>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Thumbnail</span>
                        <input type="text" class="form-control" required name="thumbnail" value="<?= $category["thumbnail"] ?>">
                    </div>
                    <div class="form-group  float-end ">
                        <input type="submit" value="Đồng ý" class="btn btn-success">
                        <a href="index.php?controller=category&action=index" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

<?=template_footer()?>