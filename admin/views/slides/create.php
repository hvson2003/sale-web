<?=template_header('Create Slide')?>

<body>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <h3 class="text-center text-uppercase fw-bold title_create">Create Slide</h3>
                <form class="form_create" action="index.php?controller=slide&action=store" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Title</span>
                        <input type="text" class="form-control" required name="title">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Sub Title</span>
                        <input type="text" class="form-control" required name="sub_title">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Slide Description</span>
                        <textarea type="text" style="width: 300px; height: 150px;" class="form-control" name="slide_desc" required>1</textarea>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Image Url</span>
                        <input type="file" class="form-control" required name="image_url">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Button Title</span>
                        <input type="text" class="form-control" required name="button_title">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Button Url</span>
                        <input type="text" class="form-control" required name="button_url">
                    </div>
                    <div class="form-group  float-end ">
                        <input type="submit" value="Tạo" class="btn btn-success">
                        <a href="index.php?controller=slide&action=index" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

<?=template_footer()?>