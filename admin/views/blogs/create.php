<?=template_header('Create Blog')?>

<body>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold title_create">Create Blog</h3>
                <form class="form_create" action="index.php?controller=blog&action=store" method="post" enctype="multipart/form-data">
                    <input type="text" class="form-control" value="<?= (isset($_SESSION['id'])) ? $_SESSION['id'] : '' ?>" name="user_id" hidden>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Title</span>
                        <input type="text" class="form-control" required value="1" name="title" style="width: 1000px; height: 30px;">
                    </div>
                    </br>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Content</span>
                        <textarea id="content" type="text" style="width: 500px; height: 300px;" class="form-control" name="content" required>1</textarea>
                    </div>
                    </br>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Blog Description</span>
                        <input type="text" class="form-control" required value="1" name="blog_desc">
                    </div>
                    </br>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Thumbnail</span>
                        <input type="file" class="form-control" accept=".jpg, .png, .jpeg" required name="thumbnail">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Blog Description</span>
                        <input type="text" class="form-control" required value="1" name="blog_desc">
                    </div>
                    </br>
                    <div class="form-group  float-end ">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="index.php?controller=blog&action=index" class="btn btn-warning ">Quay lại</a>
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