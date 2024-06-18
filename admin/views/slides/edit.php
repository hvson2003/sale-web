<?=template_header('Edit Silde')?>

<body>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold title_edit">Edit Slide</h3>
                <form class="form_edit" action="index.php?controller=slide&action=update" method="post">
                    <div class="input-group mt-3 mb-3">
                        <input type="text" class="form-control" value="<?= $slide['id'] ?>" required name="id" hidden>
                    </div>
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
                        <textarea id="content" type="text" style="width: 300px; height:50px;" class="form-control" name="slide_desc" required><?= $slide['slide_desc'] ?></textarea>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Image Url</span>
                        <input type="file" class="form-control" value="<?= $slide['image_url'] ?>" name="image_url">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <img src="../<?=$slide['image_url']?>" width="200">
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
                        <input type="submit" value="Đồng ý" class="btn btn-success">
                        <a href="index.php?controller=slide&action=index" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
<script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<?=template_footer()?>