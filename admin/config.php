<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'he');
define('DB_USER', 'root');
define('DB_PASS', '');

function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'he';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}
function template_header($title) {
    echo '
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>' . $title . '</title>
            <link href="style.css" rel="stylesheet" type="text/css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">

        </head>
        <body>
        
        <nav class="navtop">
            <div>
                <div><h1>ADMIN</h1></div>
                <div class="navtop-div-textname-admin">
                
                <a  href="index.php?action=getInforUser&controller=user&id=' . (isset($_SESSION['id']) ? $_SESSION['id'] : '') . '"> <i class="bi bi-person-square"></i>  ' . (isset($_SESSION['name']) ? $_SESSION['name'] : '') . '
                </div>
                <div class="navtop-div-textname-dangxuat" ><a href="logout.php"> <i class="bi bi-person-circle"></i> Đăng xuất</a></div>
            </div>
        </nav> 
        
      <div class="sidebar">
            <div>
                <a href="index.php?action=index&controller=dashboard">   <i class="bi bi-house fa-inverse"></i> Dashboard</a>
            </div>
            <div>
                <a href="index.php?action=index&controller=blog"> <i class="bi bi-bootstrap fa-inverse"></i> Blogs</a>
            </div>
            <div>
                <a href="index.php?action=index&controller=category"> <i class="bi bi-border-all fa-inverse"></i> Categories</a></div>
            <div>
           
                <a href="index.php?action=index&controller=color">     <i class="bi bi-magic fa-inverse"></i> Colors</a>
            </div>
            <div>
                
                <a href="index.php?action=index&controller=comment"> <i class="bi bi-chat-left-dots fa-inverse"></i> Comments</a>
            </div>
            <div>
                
                <a href="index.php?action=index&controller=config"> <i class="bi bi-gear fa-inverse"></i> Configs</a>
            </div>
            <div>
                
                <a href="index.php?action=index&controller=memory"> <i class="bi bi-memory fa-inverse"></i> Memories</a>
            </div>
            <div>
               
                <a href="index.php?action=index&controller=order">  <i class="bi bi-memory fa-inverse"></i> Orders</a>
            </div>
            <div>
                
                <a href="index.php?action=index&controller=product"> <i class="bi bi-box fa-inverse"></i> Products</a></div>
            <div>
               <a href="index.php?action=index&controller=ram">  <i class="bi bi-sd-card fa-inverse"></i> Rams</a></div>
            <div>
               <a href="index.php?action=index&controller=slide">  <i class="bi bi-file-easel fa-inverse"></i> Slides</a></div>
            <div>
                <a href="index.php?action=index&controller=user">
                <i class="bi bi-person-square fa-inverse"></i> Users
                </a>
            </div>
        </div>

    ';
}
function template_footer() {
    echo <<<EOT
    
        </body>
    </html>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    EOT;
}
?>