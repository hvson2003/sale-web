<?=template_header('Products')?>

<div class="content read">
    <div class="content-create">
    <a href="index.php?action=create&controller=product" class="create-contact">Create Product</a>
    </div>
	
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Price</td>
                <td>Sale Price</td>
                <td>Thumbnail</td>
                <!-- <td>Product Desc</td> -->
                <!-- <td>Detail Desc</td> -->
                <!-- <td>Chipset</td>
                <td>Size</td>
                <td>Screen</td>
                <td>Camera</td> -->
                <td>Origin</td>
                <td>Company</td>
                <td>Sold</td>
                <td>Amount</td>
                <td>Category</td>
                <td colspan="3">Action</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?=$product['id']?></td>
                <td><?=$product['name']?></td>
                <td><?=$product['price']?></td>
                <td><?=$product['sale_price']?></td>
                <td><img src="../<?=$product['thumbnail']?>" width="200"></td>
                <!-- <td><?=$product['product_desc']?></td> -->
                <!-- <td><?=$product['detail_desc']?></td> -->
                <!-- <td><?=$product['chipset']?></td>
                <td><?=$product['size']?></td>
                <td><?=$product['screen']?></td>
                <td><?=$product['camera']?></td> -->
                <td><?=$product['origin']?></td>
                <td><?=$product['company']?></td>
                <td><?=$product['sold']?></td>
                <td><?=$product['amount']?></td>
                <td>
                    <?php
                        for ($i = 0; $i < count($categories); $i++){
                            if($product['category_id'] == $categories[$i]['id']) echo $categories[$i]['name'];
                        }
                    ?>
                </td>
                <td class="actions">
                    <a href="index.php?action=detail&controller=product&id=<?=$product['id']?>" class="detail"><i class="fas fa-eye fa-xs"></i></a>
                </td>
                <td class="actions">
                    <a href="index.php?action=edit&controller=product&id=<?=$product['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                </td>
                <td class="actions">
                    <a href="#" class="trash" onclick="confirmDelete(<?=$product['id']?>)"><i class="fas fa-trash fa-xs"></i></a>                    
                    <form id="deleteForm-<?=$product['id']?>" action="index.php?action=delete&controller=product&id=<?=$product['id']?>" method="post" style="display: none;">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <a class="page-link" href="index.php?action=index&controller=product&page=<?= ($page>1) ? $page-1 : 1 ?>">Previous</a>
            <?php for($index_page=1; $index_page <= $number_page+1; $index_page++){ ?>
                <a class="page-link" href="index.php?action=index&controller=product&page=<?= $index_page ?>"> <?= $index_page ?> </a>
            <?php } ?>
            <a class="page-link" href="index.php?action=index&controller=product&page=<?= ($page<$number_page) ? $page+1 : $number_page ?>">Next</a>
        </ul>
    </nav>
</div>
<script>
    function confirmDelete(id) {
        if (confirm("Bạn có chắc chắn muốn xóa sản phẩm có id là " + id + " không?")) {
            document.getElementById('deleteForm-' + id).submit();
        }
    }
</script>
<?=template_footer()?>