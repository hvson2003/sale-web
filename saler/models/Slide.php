<!-- <?php
class Slide{
    private $id;
    private $title;
    private $sub_title;
    private $slide_desc;
    private $image_url;
    private $button_title;
    private $button_url;

    public $db;
    public function __construct()
    {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public static function getAll()
    {
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $query = $db->query('SELECT * FROM slides');
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
        $sql = "SELECT * FROM slides WHERE id = " . $id;
        $result = $db->query($sql);
        while ($row = $result->fetch_assoc()) {
            $list = $row;
        }
        return $list; 
    }

    public function save()
    {
        $query = $this->db->prepare('INSERT INTO slides (title, sub_title, slide_desc, image_url, button_title, button_url) 
                    VALUES (:title, :sub_title, :slide_desc, :image_url, :button_title, :button_url)');
        $query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':sub_title', $this->sub_title, PDO::PARAM_STR);
        $query->bindParam(':slide_desc', $this->slide_desc, PDO::PARAM_STR);
        $query->bindParam(':image_url', $this->image_url, PDO::PARAM_STR);
        $query->bindParam(':button_title', $this->button_title, PDO::PARAM_STR);
        $query->bindParam(':button_url', $this->button_url, PDO::PARAM_STR);
        $query->execute();
    }

    public function update($id)
    {
        $query = $this->db->prepare('UPDATE slides SET title = :title, sub_title = :sub_title, slide_desc = :slide_desc, 
                    image_url = :image_url, button_title = :button_title, button_url = :button_url WHERE id = :id');
        $query->bindParam(':id', $id);
        $query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':sub_title', $this->sub_title, PDO::PARAM_STR);
        $query->bindParam(':slide_desc', $this->slide_desc, PDO::PARAM_STR);
        $query->bindParam(':image_url', $this->image_url, PDO::PARAM_STR);
        $query->bindParam(':button_title', $this->button_title, PDO::PARAM_STR);
        $query->bindParam(':button_url', $this->button_url, PDO::PARAM_STR);
        $query->execute();
    }

    public static function delete($id)
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $query = $db->prepare('DELETE FROM slides WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getSubTitle() {
        return $this->sub_title;
    }

    public function setSubTitle($sub_title) {
        $this->sub_title = $sub_title;
    }

    public function getSlideDesc() {
        return $this->slide_desc;
    }

    public function setSlideDesc($slide_desc) {
        $this->slide_desc = $slide_desc;
    }

    public function getImageUrl() {
        return $this->image_url;
    }

    public function setImageUrl($image_url) {
        $this->image_url = $image_url;
    }

    public function getButtonTitle() {
        return $this->button_title;
    }

    public function setButtonTitle($button_title) {
        $this->button_title = $button_title;
    }

    public function getButtonUrl() {
        return $this->button_url;
    }

    public function setButtonUrl($button_url) {
        $this->button_url = $button_url;
    }
}
?> -->
