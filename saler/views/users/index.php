<?=template_header('Users')?>

<div class="content read">
    <div class="contents-create">
         <a href="index.php?action=create&controller=user" class="create-contact">Create user</a>
    </div>
	
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Username</td>
                <td>Fullname</td>
                <td>Email</td>
                <td>Address</td>
                <td>Phone</td>
                <td>Role</td>
                <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?=$user['id']?></td>
                <td><?=$user['username']?></td>
                <td><?=$user['fullname']?></td>
                <td><?=$user['email']?></td>
                <td><?=$user['address']?></td>
                <td><?=$user['phone']?></td>
                <td><?= ($user['role']==2) ? 'Người dùng thường' : 'Nguời bán hàng' ?></td>
                <td class="actions">
                    <a href="index.php?action=edit&controller=user&id=<?=$user['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                </td>
                <td class="actions">
                    <a href="#" class="trash" onclick="confirmDelete(<?=$user['id']?>)"><i class="fas fa-trash fa-xs"></i></a>                    
                    <form id="deleteForm-<?=$user['id']?>" action="index.php?action=delete&controller=user&id=<?=$user['id']?>" method="post" style="display: none;">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <a class="page-link" href="index.php?action=index&controller=user&page=<?= ($page>1) ? $page-1 : 1 ?>">Previous</a>
            <?php for($index_page=1; $index_page <= $number_page+1; $index_page++){ ?>
                <a class="page-link" href="index.php?action=index&controller=user&page=<?= $index_page ?>"> <?= $index_page ?> </a>
            <?php } ?>
            <a class="page-link" href="index.php?action=index&controller=user&page=<?= ($page<$number_page) ? $page+1 : $number_page ?>">Next</a>
        </ul>
    </nav>
</div>
<script>
    function confirmDelete(id) {
        if (confirm("Bạn có chắc chắn muốn xóa người dùng có id là " + id + " không?")) {
            document.getElementById('deleteForm-' + id).submit();
        }
    }
</script>
<?=template_footer()?>