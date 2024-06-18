<?=template_header('Detail Blog')?>

<body>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold title_detail">Detail Blog</h3>
                <form class="form_detail" action="index.php?controller=blog&action=update" method="post">
                    <div class="input-group mt-3 mb-3">
                        <input type="text" class="form-control" value="<?= $blog['id'] ?>" required name="id" hidden>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Tile</span>
                        <input type="text" class="form-control" value="<?= $blog['title'] ?>" required name="title">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Content</span>
                        <textarea type="text" class="form-control" name="content" required><?= $blog['content'] ?></textarea>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Blog Description</span>
                        <textarea  type="text" class="form-control" name="blog_desc" required><?= $blog['blog_desc'] ?></textarea>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Created</span>
                        <input type="date-time" class="form-control" value="<?= $blog['created_at'] ?>" required name="created_at" readonly>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="">User</span>
                        <select class="form-select" aria-label="" name="user_id">
                            <?php for ($i = 0; $i < count($users); $i++): ?>
                                <option value="<?= $users[$i]['id'] ?>" <?= ($blog['user_id'] == $users[$i]['id']) ? "selected" : '' ?> >
                                    <?= $users[$i]['fullname'] ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Thumbnail</span>
                        <img src="../<?=$blog['thumbnail']?>" width="200">
                    </div>
                    <div class="form-group  float-end ">
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