<?=template_header('Categories')?>

<div class="content read">
    <div class="content-create">
    <a href="index.php?action=create&controller=category" class="create-contact">Create Category</a>
    </div>
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Category Description</td>
                <td>Thumbnail</td>
                <td colspan="3">Action</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
            <tr>
                <td><?=$category['id']?></td>
                <td><?=$category['name']?></td>
                <td><?=$category['cate_desc']?></td>
                <td><?=$category['thumbnail']?></td>
                <td class="actions">
                    <a href="index.php?action=detail&controller=category&id=<?=$category['id']?>" class="detail"><i class="fas fa-eye fa-xs"></i></a>
                </td>
                <td class="actions">
                    <a href="#" class="trash" onclick="confirmDelete(<?=$category['id']?>)"><i class="fas fa-trash fa-xs"></i></a>                    
                    <form id="deleteForm-<?=$category['id']?>" action="index.php?action=delete&controller=category&id=<?=$category['id']?>" method="post" style="display: none;">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <a class="page-link" href="index.php?action=index&controller=category&page=<?= ($page>1) ? $page-1 : 1 ?>">Previous</a>
            <?php for($index_page=1; $index_page <= $number_page+1; $index_page++){ ?>
                <a class="page-link" href="index.php?action=index&controller=category&page=<?= $index_page ?>"> <?= $index_page ?> </a>
            <?php } ?>
            <a class="page-link" href="index.php?action=index&controller=category&page=<?= ($page<$number_page) ? $page+1 : $number_page ?>">Next</a>
        </ul>
    </nav>
</div>
<script>
    function confirmDelete(id) {
        if (confirm("Bạn có chắc chắn muốn xóa danh mục có id là " + id + " không?")) {
            document.getElementById('deleteForm-' + id).submit();
        }
    }
</script>
<?=template_footer()?>