<?=template_header('Comments')?>

<div class="content read">
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Email</td>
                <td>Content</td>
                <td>Created At</td>
                <td>Product</td>
                <td colspan="3">Action</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comments as $comment): ?>
            <tr>
                <td><?=$comment['id']?></td>
                <td><?=$comment['name']?></td>
                <td><?=$comment['email']?></td>
                <td><?=$comment['content']?></td>
                <td><?=$comment['created_at']?></td>
                <td>
                    <?php 
                    foreach($products as $product){
                        if($product['id']==$comment['product_id']){
                            echo $product['name'];
                        }
                    }    
                    ?>
                </td>
                <td class="actions">
                    <a href="index.php?action=detail&controller=comment&id=<?=$comment['id']?>" class="detail"><i class="fas fa-eye fa-xs"></i></a>
                </td>
                <td class="actions">
                    <a href="#" class="trash" onclick="confirmDelete(<?=$comment['id']?>)"><i class="fas fa-trash fa-xs"></i></a>                    
                    <form id="deleteForm-<?=$comment['id']?>" action="index.php?action=delete&controller=comment&id=<?=$comment['id']?>" method="post" style="display: none;">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <a class="page-link" href="index.php?action=index&controller=comment&page=<?= ($page>1) ? $page-1 : 1 ?>">Previous</a>
            <?php for($index_page=1; $index_page <= $number_page+1; $index_page++){ ?>
                <a class="page-link" href="index.php?action=index&controller=comment&page=<?= $index_page ?>"> <?= $index_page ?> </a>
            <?php } ?>
            <a class="page-link" href="index.php?action=index&controller=comment&page=<?= ($page<$number_page) ? $page+1 : $number_page ?>">Next</a>
        </ul>
    </nav>
</div>
<script>
    function confirmDelete(id) {
        if (confirm("Bạn có chắc chắn muốn xóa bình luận có id là " + id + " không?")) {
            document.getElementById('deleteForm-' + id).submit();
        }
    }
</script>
<?=template_footer()?>