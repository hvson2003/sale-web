<?=template_header('Rams')?>

<div class="content read">
    <div class="content-create">
        <a href="index.php?action=create&controller=ram" class="create-contact">Create ram</a>
    </div>
	
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Value</td>
                <td colspan="1">Action</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ram as $a): ?>
            <tr>
                <td><?=$a['id']?></td>
                <td><?=$a['name']?></td>
                <td><?=$a['value']?></td>
                <td class="actions">
                    <a href="index.php?action=edit&controller=ram&id=<?=$a['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                </td>
                <td class="actions">
                    <a href="#" class="trash" onclick="confirmDelete(<?=$a['id']?>)"><i class="fas fa-trash fa-xs"></i></a>                    
                    <form id="deleteForm-<?=$a['id']?>" action="index.php?action=delete&controller=ram&id=<?=$a['id']?>" method="post" style="display: none;">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <a class="page-link" href="index.php?action=index&controller=ram&page=<?= ($page>1) ? $page-1 : 1 ?>">Previous</a>
            <?php for($index_page=1; $index_page <= $number_page+1; $index_page++){ ?>
                <a class="page-link" href="index.php?action=index&controller=ram&page=<?= $index_page ?>"> <?= $index_page ?> </a>
            <?php } ?>
            <a class="page-link" href="index.php?action=index&controller=ram&page=<?= ($page<$number_page) ? $page+1 : $number_page ?>">Next</a>
        </ul>
    </nav>
</div>
<script>
    function confirmDelete(id) {
        if (confirm("Bạn có chắc chắn muốn xóa ram có id là " + id + " không?")) {
            document.getElementById('deleteForm-' + id).submit();
        }
    }
</script>
<?=template_footer()?>