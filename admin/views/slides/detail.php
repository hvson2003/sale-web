<?=template_header('Detail Silde')?>

<body>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold title_detail">Detail Slide</h3>
                <form class="form_detail" action="" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Title</span>
                        <input type="text" class="form-control" value="<?= $slide['title'] ?>" required name="title">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Sub Title</span>
                        <input type="text" class="form-control" value="<?= $slide['sub_title'] ?>" required name="sub_title">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Slide Description</span>
                        <textarea type="text" style="width: 300px; height: 50px;" class="form-control" name="slide_desc" required><?= $slide['slide_desc'] ?></textarea>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Image Url</span>
                        <input type="text" class="form-control" value="<?= $slide['image_url'] ?>" required name="image_url">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Button Title</span>
                        <input type="text" class="form-control" value="<?= $slide['button_title'] ?>" required name="button_title">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Button Url</span>
                        <input type="text" class="form-control" value="<?= $slide['button_url'] ?>" required name="button_url">
                    </div>
                    <div class="form-group  float-end ">
                        <a href="index.php?controller=slide&action=index" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

<?=template_footer()?>