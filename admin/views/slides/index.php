<?=template_header('Slides')?>

<div class="content read">
    <div class="content-create">
        <a href="index.php?action=create&controller=slide" class="create-contact">Create Slide</a>
    </div>
   
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Title</td>
                <td>Sub Title</td>
                <td>Slide Description</td>
                <td>Image Url</td>
                <td>Button Title</td>
                <td>Button Url</td>
                <td colspan="3">Action</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($slides as $slide): ?>
            <tr>
                <td><?=$slide['id']?></td>
                <td><?=$slide['title']?></td>
                <td><?=$slide['sub_title']?></td>
                <td><?=$slide['slide_desc']?></td>
                <td><img src="../<?=$slide['image_url']?>" width="200"></td>
                <td><?=$slide['button_title']?></td>
                <td><?=$slide['button_url']?></td>
                <td class="actions">
                    <a href="index.php?action=detail&controller=slide&id=<?=$slide['id']?>" class="detail"><i class="fas fa-eye fa-xs"></i></a>
                </td>
                <td class="actions">
                    <a href="index.php?action=edit&controller=slide&id=<?=$slide['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                </td>
                <td class="actions">
                    <a href="#" class="trash" onclick="confirmDelete(<?=$slide['id']?>)"><i class="fas fa-trash fa-xs"></i></a>                    
                    <form id="deleteForm-<?=$slide['id']?>" action="index.php?action=delete&controller=slide&id=<?=$slide['id']?>" method="post" style="display: none;">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <a class="page-link" href="index.php?action=index&controller=slide&page=<?= ($page>1) ? $page-1 : 1 ?>">Previous</a>
            <?php for($index_page=1; $index_page <= $number_page+1; $index_page++){ ?>
                <a class="page-link" href="index.php?action=index&controller=slide&page=<?= $index_page ?>"> <?= $index_page ?> </a>
            <?php } ?>
            <a class="page-link" href="index.php?action=index&controller=slide&page=<?= ($page<$number_page) ? $page+1 : $number_page ?>">Next</a>
        </ul>
    </nav>
</div>
<script>
    function confirmDelete(id) {
        if (confirm("Bạn có chắc chắn muốn xóa slide có id là " + id + " không?")) {
            document.getElementById('deleteForm-' + id).submit();
        }
    }
</script>
<?=template_footer()?>