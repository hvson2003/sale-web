<!-- <?php
class Blog{
    private $id;
    private $title;
    private $content;
    private $blog_desc;
    private $created_at;
    private $user_id;
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
        $query = $db->query('SELECT * FROM blogs');
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
        $sql = "SELECT * FROM blogs WHERE id = " . $id;
        $result = $db->query($sql);
        while ($row = $result->fetch_assoc()) {
            $list = $row;
        }
        return $list; 
    }

    public function save()
    {
        $query = $this->db->prepare('INSERT INTO blogs (title, content, blog_desc, created_at, user_id, thumbnail) 
                    VALUES (:title, :content, :blog_desc, :created_at, :user_id, :thumbnail)');
        $query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':content', $this->content, PDO::PARAM_STR);
        $query->bindParam(':blog_desc', $this->blog_desc, PDO::PARAM_STR);
        $query->bindParam(':created_at', date('Y-m-d H:i:s'), PDO::PARAM_STR);
        $query->bindParam(':user_id', $this->user_id, PDO::PARAM_STR);
        $query->bindParam(':thumbnail', $this->thumbnail, PDO::PARAM_STR);
        $query->execute();
    }

    public function update($id)
    {
        $query = $this->db->prepare('UPDATE blogs SET title = :title, content = :content, blog_desc = :blog_desc, 
        created_at = :created_at, user_id = :user_id, thumbnail = :thumbnail WHERE id = :id');
        $query->bindParam(':id', $id);
        $query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':content', $this->content, PDO::PARAM_STR);
        $query->bindParam(':blog_desc', $this->blog_desc, PDO::PARAM_STR);
        $query->bindParam(':created_at', $this->created_at, PDO::PARAM_STR);
        $query->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
        $query->bindParam(':thumbnail', $this->thumbnail, PDO::PARAM_STR);
        $query->execute();
    }

    public static function delete($id)
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $query = $db->prepare('DELETE FROM blogs WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    // Getter và Setter cho thuộc tính $content
    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    // Getter và Setter cho thuộc tính $blog_desc
    public function getBlogDesc() {
        return $this->blog_desc;
    }

    public function setBlogDesc($blog_desc) {
        $this->blog_desc = $blog_desc;
    }

    // Getter và Setter cho thuộc tính $created_at
    public function getCreateAt() {
        return $this->created_at;
    }

    public function setCreateAt($created_at) {
        $this->created_at = $created_at;
    }

    // Getter và Setter cho thuộc tính $user_id
    public function getUserId() {
        return $this->user_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    // Getter và Setter cho thuộc tính $thumbnail
    public function getThumbnail() {
        return $this->thumbnail;
    }

    public function setThumbnail($thumbnail) {
        $this->thumbnail = $thumbnail;
    }
}
?> -->
