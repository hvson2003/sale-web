<!-- <?php
class Comment{
    private $id;
    private $name;
    private $email;
    private $content;
    private $created_at;
    private $product_id;
    public $db;
    public function __construct()
    {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public static function getAll()
    {
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $query = $db->query('SELECT * FROM comments');
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
        $sql = "SELECT * FROM comments WHERE id = " . $id;
        $result = $db->query($sql);
        while ($row = $result->fetch_assoc()) {
            $list = $row;
        }
        return $list; 
    }
    
    public function save()
    {
        $query = $this->db->prepare('INSERT INTO comments (name, email, content, created_at, product_id) 
                    VALUES (:name, :email, :content, :created_at, :product_id)');
        $query->bindParam(':name', $this->name, PDO::PARAM_STR);
        $query->bindParam(':email', $this->email, PDO::PARAM_STR);
        $query->bindParam(':content', $this->content, PDO::PARAM_STR);
        $query->bindParam(':created_at', $this->created_at, PDO::PARAM_STR);
        $query->bindParam(':product_id', $this->product_id, PDO::PARAM_STR);
        $query->execute();
    }

    public function update($id)
    {
        $query = $this->db->prepare('UPDATE comments SET name = :name, email = :email, content = :content, 
                    created_at = :created_at, product_id = :product_id WHERE id = :id');
        $query->bindParam(':id', $id);
        $query->bindParam(':name', $this->name, PDO::PARAM_STR);
        $query->bindParam(':email', $this->email, PDO::PARAM_STR);
        $query->bindParam(':content', $this->content, PDO::PARAM_STR);
        $query->bindParam(':created_at', $this->created_at, PDO::PARAM_STR);
        $query->bindParam(':product_id', $this->product_id, PDO::PARAM_STR);
        $query->execute();
    }

    public static function delete($id)
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $query = $db->prepare('DELETE FROM comments WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

    public function getProductId() {
        return $this->product_id;
    }

    public function setProductId($product_id) {
        $this->product_id = $product_id;
    }
}
?> -->
