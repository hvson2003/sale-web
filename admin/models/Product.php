<!-- <?php
class Product{
    private $id;
    private $name;
    private $price;
    private $sale_price;
    private $thumbnail;
    private $product_desc;
    private $detail_desc;
    private $chipset;
    private $size;
    private $screen;
    private $camera;
    private $origin;
    private $company;
    private $sold;
    private $amount;
    private $category_id;

    public $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public static function getAll()
    {
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $query = $db->query('SELECT * FROM products');
        $list = [];
        while ($row = $query->fetch_assoc()) {
            $list[] = $row;
        }
        return $list;
    }

    public static function getCount()
    {
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $result = $db->query('SELECT COUNT(*) as product_count FROM products');
        $row = $result->fetch_assoc();
        $product_count = $row['product_count'];
        $db->close();
        return $product_count;
    }

    public static function getById($id)
    {
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $list = [];
        $sql = "SELECT * FROM products WHERE id = " . $id;
        $result = $db->query($sql);
        while ($row = $result->fetch_assoc()) {
            $list = $row;
        }
        return $list; 
    }
    public function save()
    {
        $query = $this->db->prepare('INSERT INTO products (name, price, sale_price, thumbnail, product_desc, detail_desc, chipset, size, screen, camera, origin, company, sold, amount, category_id) 
        VALUES (:name, :price, :sale_price, :thumbnail, :product_desc, :detail_desc, :chipset, :size, :screen, :camera, :origin, :company, :sold, :amount, :category_id)');
        $query->bindParam(':name', $this->name, PDO::PARAM_STR);
        $query->bindParam(':price', $this->price, PDO::PARAM_STR);
        $query->bindParam(':sale_price', $this->sale_price, PDO::PARAM_STR);
        $query->bindParam(':thumbnail', $this->thumbnail, PDO::PARAM_STR);
        $query->bindParam(':product_desc', $this->product_desc, PDO::PARAM_STR);
        $query->bindParam(':detail_desc', $this->detail_desc, PDO::PARAM_STR);
        $query->bindParam(':chipset', $this->chipset, PDO::PARAM_STR);
        $query->bindParam(':size', $this->size, PDO::PARAM_STR);
        $query->bindParam(':screen', $this->screen, PDO::PARAM_STR);
        $query->bindParam(':camera', $this->camera, PDO::PARAM_STR);
        $query->bindParam(':origin', $this->origin, PDO::PARAM_STR);
        $query->bindParam(':company', $this->company, PDO::PARAM_STR);
        $query->bindParam(':sold', $this->sold, PDO::PARAM_STR);
        $query->bindParam(':amount', $this->amount, PDO::PARAM_STR);
        $query->bindParam(':category_id', $this->category_id, PDO::PARAM_STR);
        $query->execute();
    }

    public function update($id)
    {
        $query = $this->db->prepare('UPDATE products SET 
                        name = :name, 
                        price = :price, 
                        sale_price = :sale_price, 
                        thumbnail = :thumbnail, 
                        product_desc = :product_desc, 
                        detail_desc = :detail_desc, 
                        chipset = :chipset, 
                        size = :size, 
                        screen = :screen, 
                        camera = :camera, 
                        origin = :origin, 
                        company = :company, 
                        sold = :sold, 
                        amount = :amount, 
                        category_id = :category_id
                    WHERE id = :id');
        $query->bindParam(':id', $id);
        $query->bindParam(':name', $this->name, PDO::PARAM_STR);
        $query->bindParam(':price', $this->price, PDO::PARAM_STR);
        $query->bindParam(':sale_price', $this->sale_price, PDO::PARAM_STR);
        $query->bindParam(':thumbnail', $this->thumbnail, PDO::PARAM_STR);
        $query->bindParam(':product_desc', $this->product_desc, PDO::PARAM_STR);
        $query->bindParam(':detail_desc', $this->detail_desc, PDO::PARAM_STR);
        $query->bindParam(':chipset', $this->chipset, PDO::PARAM_STR);
        $query->bindParam(':size', $this->size, PDO::PARAM_STR);
        $query->bindParam(':screen', $this->screen, PDO::PARAM_STR);
        $query->bindParam(':camera', $this->camera, PDO::PARAM_STR);
        $query->bindParam(':origin', $this->origin, PDO::PARAM_STR);
        $query->bindParam(':company', $this->company, PDO::PARAM_STR);
        $query->bindParam(':sold', $this->sold, PDO::PARAM_STR);
        $query->bindParam(':amount', $this->amount, PDO::PARAM_STR);
        $query->bindParam(':category_id', $this->category_id, PDO::PARAM_STR);
        $query->execute();
    }

    public static function delete($id)
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $query = $db->prepare('DELETE FROM products WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }

    // Setter methods
    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setSalePrice($sale_price) {
        $this->sale_price = $sale_price;
    }

    public function setThumbnail($thumbnail) {
        $this->thumbnail = $thumbnail;
    }

    public function setProductDesc($product_desc) {
        $this->product_desc = $product_desc;
    }

    public function setDetailDesc($detail_desc) {
        $this->detail_desc = $detail_desc;
    }

    public function setChipset($chipset) {
        $this->chipset = $chipset;
    }

    public function setSize($size) {
        $this->size = $size;
    }

    public function setScreen($screen) {
        $this->screen = $screen;
    }

    public function setCamera($camera) {
        $this->camera = $camera;
    }

    public function setOrigin($origin) {
        $this->origin = $origin;
    }

    public function setCompany($company) {
        $this->company = $company;
    }

    public function setSold($sold) {
        $this->sold = $sold;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function setCategoryId($category_id) {
        $this->category_id = $category_id;
    }

    // Getter methods
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getSalePrice() {
        return $this->sale_price;
    }

    public function getThumbnail() {
        return $this->thumbnail;
    }

    public function getProductDesc() {
        return $this->product_desc;
    }

    public function getDetailDesc() {
        return $this->detail_desc;
    }

    public function getChipset() {
        return $this->chipset;
    }

    public function getSize() {
        return $this->size;
    }

    public function getScreen() {
        return $this->screen;
    }

    public function getCamera() {
        return $this->camera;
    }

    public function getOrigin() {
        return $this->origin;
    }

    public function getCompany() {
        return $this->company;
    }

    public function getSold() {
        return $this->sold;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getCategoryId() {
        return $this->category_id;
    }
}
?> -->
