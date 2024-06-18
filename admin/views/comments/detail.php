<?=template_header('Detail Comment')?>

<body>
    <main class="container mt-5 mb-5 ">
        <div class="row ">
            <div class="col-sm ">
                <h3 class="text-center text-uppercase fw-bold title_detail">Chi tiết bình luận</h3>
                <form class="form_detail" action="index.php?controller=comment&action=update" method="post">
                    <div class="input-group mt-3 mb-3">
                        <input type="text" class="form-control" required name="id" value="<?= $comment["id"] ?>" hidden>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Name</span>
                        <input type="text" class="form-control" required name="name" value="<?= $comment["name"] ?>">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Email</span>
                        <input type="text" class="form-control" required name="email" value="<?= $comment["email"] ?>">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Content</span>
                        <textarea type="text" style="width: 300px; height: 150px;" class="form-control" name="content" required><?= $comment["content"] ?></textarea>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Created At</span>
                        <input type="datetime-local" class="form-control" required name="created_at" value="<?= $comment["created_at"] ?>">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Product</span>
                        <input type="text" class="form-control" required name="product_id" 
                            value="<?php                   
                                foreach($products as $product){
                                    if($product['id']==$comment['product_id']){
                                        echo $product['name'];
                                    }
                                } 
                            ?>">
                    </div>
                    <div class="form-group  float-end ">
                        <a href="index.php?controller=comment&action=index" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

<?=template_footer()?>