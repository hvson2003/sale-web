<?php
class Color{
  //`id`, `color_id`, `product_id`
  private $id;
  private $colorId;
  private $productId;
  public $db;

  public function __construct()
  {
      $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  
  public static function getAll()
  {
      $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
      $query = $db->query('SELECT * FROM colors');
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
      $sql = "SELECT * FROM colors WHERE id = " . $id;
      $result = $db->query($sql);
      while ($row = $result->fetch_assoc()) {
          $list = $row;
      }
      return $list; 
  }
  
  public function save()
  {
      $query = $this->db->prepare('INSERT INTO colors (id, name, value) 
                  VALUES (:id, :color_id, :product_id)');
      $query->bindParam(':id', $this->id, PDO::PARAM_INT);
      $query->bindParam(':color_id', $this->colorId, PDO::PARAM_STR);
      $query->bindParam(':product_id', $this->productId, PDO::PARAM_STR);
      $query->execute();
  }

  public function update($id)
  {
      $query = $this->db->prepare('UPDATE colors SET id = :id, name = :color_id, value = :product_id WHERE id = :id');
      $query->bindParam(':id', $id, PDO::PARAM_INT);
      $query->bindParam(':color_id', $this->colorId, PDO::PARAM_STR);
      $query->bindParam(':product_id', $this->productId, PDO::PARAM_STR); 
      $query->execute();
  }

  public static function delete($id)
  {
      $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
      $query = $db->prepare('DELETE FROM colors WHERE id = :id');
      $query->bindParam(':id', $id, PDO::PARAM_INT);
      $query->execute();
  }
     // Getter for $id
     public function getId() {
        return $this->id;
    }

    // Getter for $colorId
    public function getColorId() {
        return $this->colorId;
    }

    // Setter for $colorId
    public function setColorId($colorId) {
        $this->colorId = $colorId;
    }

    // Getter for $productId
    public function getProductId() {
        return $this->productId;
    }

    // Setter for $productId
    public function setProductId($productId) {
        $this->productId = $productId;
    }
}