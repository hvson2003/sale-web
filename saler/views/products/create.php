<?=template_header('Create Product')?>

<body>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold title_create">Create Product</h3>
                <form class="border shadow p-5 form_create" action="index.php?controller=product&action=store" method="post" enctype="multipart/form-data">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Name</span>
                        <input type="text" class="form-control" required value="1" name="name">
                    </div>
                    </br>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Price</span>
                        <input type="text" class="form-control" required value="1" name="price">
                    </div>
                    </br>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Sale Price</span>
                        <input type="text" class="form-control" required value="1" name="sale_price">
                    </div>
                    </br>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Thumbnail</span>
                        <input type="file" class="form-control" accept=".jpg, .png, .jpeg" required value="1" name="thumbnail">
                    </div>
                    </br>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Product Description</span>
                        <textarea type="text" style="width: 300px; height: 150px;" class="form-control" name="product_desc" required>1</textarea>
                    </div>
                    </br>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Detail Description</span>
                        <textarea id="content" type="text" style="width: 300px; height: 150px;" class="form-control" name="detail_desc" required>1</textarea>
                    </div>
                    </br>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Chipset</span>
                        <input type="text" class="form-control" required value="1" name="chipset">
                    </div>
                    </br>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Size</span>
                        <input type="text" class="form-control" required value="1" name="size">
                    </div>
                    </br>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Screen</span>
                        <input type="text" class="form-control" required value="1" name="screen">
                    </div>
                    </br>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Camera</span>
                        <input type="text" class="form-control" required value="1" name="camera">
                    </div>
                    </br>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Origin</span>
                        <input type="text" class="form-control" required value="1" name="origin">
                    </div>
                    </br>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Company</span>
                        <input type="text" class="form-control" required value="1" name="company">
                    </div>
                    </br>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Sold</span>
                        <input type="text" class="form-control" required value="1" name="sold">
                    </div>
                    </br>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Amount</span>
                        <input type="text" class="form-control" required value="1" name="amount">
                    </div>
                    </br>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="">Category</span>
                        <select class="form-select" aria-label="" name="category_id">
                            <?php for ($i = 0; $i < count($categories); $i++): ?>
                                <option value="<?= $categories[$i]['id'] ?>">
                                    <?= $categories[$i]['name'] ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    </br>
                    <div class="form-group  float-end ">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="index.php?controller=product&action=index" class="btn btn-warning ">Quay lại</a>
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