<?php
include("models/product.php");
include("models/category.php");

class ProductController
{public function index()
    {
        $pdo = pdo_connect_mysql();
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $records_per_page = 5;    
        $offset = ($page - 1) * $records_per_page;
    
        $stmt = $pdo->prepare('SELECT * FROM products ORDER BY id DESC LIMIT :offset, :records_per_page');
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':records_per_page', $records_per_page, PDO::PARAM_INT);
        $stmt->execute();

        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = $pdo->query('SELECT COUNT(*) FROM products');
        $num_products = $stmt->fetchColumn();
    
        $number_page = ceil($num_products / $records_per_page);
        $categories = Category::getAll();
        require 'views/products/index.php';
    }
    

    public function create()
    {
        $categories = Category::getAll();
        require 'views/products/create.php';
    }

    public function store()
    {

        if(isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === UPLOAD_ERR_OK) {
            $file_temp = $_FILES['thumbnail']['tmp_name'];
            $file_name = $_FILES['thumbnail']['name'];
            
            // Đường dẫn tạm thời của tệp ảnh đã tải lên
            $file_temp = $_FILES['thumbnail']['tmp_name'];

            // Đường dẫn mới cho tệp ảnh
            $file_name = $_FILES['thumbnail']['name'] ? $_FILES['thumbnail']['name'] : '';
            $link_img = "assets/uploads/" . $file_name;

            $target_path = '../' . $link_img;
            move_uploaded_file($file_temp, $target_path);
                    
            $product = new Product();
            $product->setName(isset($_POST['name']) ? $_POST['name'] : '');
            $product->setPrice(isset($_POST['price']) ? $_POST['price'] : '');
            $product->setSalePrice(isset($_POST['sale_price']) ? $_POST['sale_price'] : '');
            $product->setThumbnail($link_img);
            $product->setProductDesc(isset($_POST['product_desc']) ? $_POST['product_desc'] : '');
            $product->setDetailDesc(isset($_POST['detail_desc']) ? $_POST['detail_desc'] : '');
            $product->setChipset(isset($_POST['chipset']) ? $_POST['chipset'] : '');
            $product->setSize(isset($_POST['size']) ? $_POST['size'] : '');
            $product->setScreen(isset($_POST['screen']) ? $_POST['screen'] : '');
            $product->setCamera(isset($_POST['camera']) ? $_POST['camera'] : '');
            $product->setOrigin(isset($_POST['origin']) ? $_POST['origin'] : '');
            $product->setCompany(isset($_POST['company']) ? $_POST['company'] : '');
            $product->setSold(isset($_POST['sold']) ? $_POST['sold'] : '');
            $product->setAmount(isset($_POST['amount']) ? $_POST['amount'] : '');
            $product->setCategoryId(isset($_POST['category_id']) ? $_POST['category_id'] : '');

            $product->save();

            header('Location: index.php?controller=product&action=index');

        } else {
            echo "Không có tệp nào được tải lên hoặc có lỗi xảy ra.";
            echo "Lỗi khi tải lên tệp: " . $_FILES['thumbnail']['error'];
        }
    }

    public function edit()
    {
        $id = $_GET['id'];

        $categories = Category::getAll();
        $product = Product::getById($id);
        require 'views/products/edit.php';
    }

    public function detail()
    {
        $id = $_GET['id'];

        $categories = Category::getAll();
        $product = Product::getById($id);
        require 'views/products/detail.php';
    }

    public function update()
    {
        $id = $_POST['id'];
        
        $file_temp = $_FILES['thumbnail']['tmp_name'];
        $file_name = $_FILES['thumbnail']['name'];
        
        // Đường dẫn tạm thời của tệp ảnh đã tải lên
        $file_temp = $_FILES['thumbnail']['tmp_name'];

        // Đường dẫn mới cho tệp ảnh
        $file_name = $_FILES['thumbnail']['name'] ? $_FILES['thumbnail']['name'] : '';
        $link_img = "assets/uploads/" . $file_name;

        $target_path = '../' . $link_img;
        move_uploaded_file($file_temp, $target_path);

        $product = new Product();
        $product->setName(isset($_POST['name']) ? $_POST['name'] : '');
        $product->setPrice(isset($_POST['price']) ? $_POST['price'] : '');
        $product->setSalePrice(isset($_POST['sale_price']) ? $_POST['sale_price'] : '');
        $product->setThumbnail($link_img);
        $product->setProductDesc(isset($_POST['product_desc']) ? $_POST['product_desc'] : '');
        $product->setDetailDesc(isset($_POST['detail_desc']) ? $_POST['detail_desc'] : '');
        $product->setChipset(isset($_POST['chipset']) ? $_POST['chipset'] : '');
        $product->setSize(isset($_POST['size']) ? $_POST['size'] : '');
        $product->setScreen(isset($_POST['screen']) ? $_POST['screen'] : '');
        $product->setCamera(isset($_POST['camera']) ? $_POST['camera'] : '');
        $product->setOrigin(isset($_POST['origin']) ? $_POST['origin'] : '');
        $product->setCompany(isset($_POST['company']) ? $_POST['company'] : '');
        $product->setSold(isset($_POST['sold']) ? $_POST['sold'] : '');
        $product->setAmount(isset($_POST['amount']) ? $_POST['amount'] : '');
        $product->setCategoryId(isset($_POST['category_id']) ? $_POST['category_id'] : '');

        $product->update($id);

        header('Location: index.php?controller=product&action=index');
    }

    public function delete()
    {
        $id = $_GET['id'];
        Product::delete($id);
        header('Location: index.php?controller=product&action=index');
    }
}
?>
