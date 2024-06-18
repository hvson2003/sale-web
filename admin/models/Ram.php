<?php
class Ram{
  //`id`, `color_id`, `product_id`
  private $id;
  private $name;
  private $value;
  public $db;

  public function __construct()
  {
      $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  
  public static function getAll()
  {
      $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
      $query = $db->query('SELECT * FROM rams');
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
      $sql = "SELECT * FROM rams WHERE id = " . $id;
      $result = $db->query($sql);
      while ($row = $result->fetch_assoc()) {
          $list = $row;
      }
      return $list; 
  }
  
  public function save()
  {
      $query = $this->db->prepare('INSERT INTO rams (id, name, value) 
                  VALUES (:id, :name, :value)');
      $query->bindParam(':id', $this->id, PDO::PARAM_INT);
      $query->bindParam(':name', $this->name, PDO::PARAM_STR);
      $query->bindParam(':value', $this->value, PDO::PARAM_STR);
      $query->execute();
  }

  public function update($id)
  {
      $query = $this->db->prepare('UPDATE rams SET id = :id, name = :name, value = :value WHERE id = :id');
      $query->bindParam(':id',$id, PDO::PARAM_INT);
      $query->bindParam(':name', $this->name, PDO::PARAM_STR);
      $query->bindParam(':value', $this->value, PDO::PARAM_STR); 
      $query->execute();
  }

  public static function delete($id)
  {
      $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
      $query = $db->prepare('DELETE FROM rams WHERE id = :id');
      $query->bindParam(':id', $id, PDO::PARAM_INT);
      $query->execute();
  }
     // Getter for $id
     public function getId() {
        return $this->id;
    }

    // Getter for $colorId
    public function getRamName() {
        return $this->name;
    }

    // Setter for $colorId
    public function setRamName($name) {
        $this->name = $name;
    }

    // Getter for $productId
    public function getRamValue() {
        return $this->value;
    }

    // Setter for $productId
    public function setRamValue($value) {
        $this->value = $value;
    }

}