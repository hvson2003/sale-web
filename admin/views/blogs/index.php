<?=template_header('Blogs')?>

<div class="content read">
	<div class="content-create">
        <a href="index.php?action=create&controller=blog" class="create-contact">Create blog</a>
    </div>
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Title</td>
                <td>Blog Description</td>
                <td>Thumbnail</td>
                <td>User</td>
                <td colspan="3">Action</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($blogs as $blog): ?>
            <tr>
                <td><?=$blog['id']?></td>
                <td><?=$blog['title']?></td>
                <td><?=$blog['blog_desc']?></td>
                <td><img src="../<?=$blog['thumbnail']?>" width="200"></td>
                <td>
                    <?php
                        for ($i = 0; $i < count($users); $i++){
                            if($blog['user_id'] == $users[$i]['id']) echo $users[$i]['fullname'];
                        }
                    ?>
                </td>
                <td class="actions">
                    <a href="index.php?action=detail&controller=blog&id=<?=$blog['id']?>" class="detail"><i class="fas fa-eye fa-xs"></i></a>
                </td>
                <td class="actions">
                    <a href="index.php?action=edit&controller=blog&id=<?=$blog['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                </td>
                <td class="actions">
                    <a href="#" class="trash" onclick="confirmDelete(<?=$blog['id']?>)"><i class="fas fa-trash fa-xs"></i></a>                    
                    <form id="deleteForm-<?=$blog['id']?>" action="index.php?action=delete&controller=blog&id=<?=$blog['id']?>" method="post" style="display: none;">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <a class="page-link" href="index.php?action=index&controller=blog&page=<?= ($page>1) ? $page-1 : 1 ?>">Previous</a>
            <?php for($index_page=1; $index_page <= $number_page+1; $index_page++){ ?>
                <a class="page-link" href="index.php?action=index&controller=blog&page=<?= $index_page ?>"> <?= $index_page ?> </a>
            <?php } ?>
            <a class="page-link" href="index.php?action=index&controller=blog&page=<?= ($page<$number_page) ? $page+1 : $number_page ?>">Next</a>
        </ul>
    </nav>
</div>
<script>
    function confirmDelete(id) {
        if (confirm("Bạn có chắc chắn muốn xóa blog có id là " + id + " không?")) {
            document.getElementById('deleteForm-' + id).submit();
        }
    }
</script>
<?=template_footer()?>