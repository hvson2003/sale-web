<!-- <?php
class Category{
    private $id;
    private $name;
    private $cate_desc;
    private $thumbnail;
    public $db;
    public function __construct()
    {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public static function getAll()
    {
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $query = $db->query('SELECT * FROM categories');
        $list = [];
        while ($row = $query->fetch_assoc()) {
            $list[] = $row;
        }
        return $list;
    }

    public static function getById($id)
    {
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $list = [];
        $sql = "SELECT * FROM categories WHERE id = " . $id;
        $result = $db->query($sql);
        while ($row = $result->fetch_assoc()) {
            $list = $row;
        }
        return $list; 
    }

    public function save()
    {
        $query = $this->db->prepare('INSERT INTO categories (name, cate_desc, thumbnail) VALUES (:name, :cate_desc, :thumbnail)');
        $query->bindParam(':name', $this->name, PDO::PARAM_STR);
        $query->bindParam(':cate_desc', $this->cate_desc, PDO::PARAM_STR);
        $query->bindParam(':thumbnail', $this->thumbnail, PDO::PARAM_STR);
        $query->execute();
    }

    public function update($id)
    {
        $query = $this->db->prepare('UPDATE categories SET name = :name, cate_desc = :cate_desc, thumbnail = :thumbnail WHERE id = :id');
        $query->bindParam(':id', $id);
        $query->bindParam(':name', $this->name, PDO::PARAM_STR);
        $query->bindParam(':cate_desc', $this->cate_desc, PDO::PARAM_STR);
        $query->bindParam(':thumbnail', $this->thumbnail, PDO::PARAM_STR);
        $query->execute();
    }

    public static function delete($id)
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $query = $db->prepare('DELETE FROM categories WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getCateDesc() {
        return $this->cate_desc;
    }

    public function setCateDesc($cate_desc) {
        $this->cate_desc = $cate_desc;
    }

    public function getThumbnail() {
        return $this->thumbnail;
    }

    public function setThumbnail($thumbnail) {
        $this->thumbnail = $thumbnail;
    }
}
?> -->
