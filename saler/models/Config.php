<?php
class Config{
  //`id`, `color_id`, `product_id`
  private $id;
  private $config_key;
  private $config_value;
  private $config_desc;
  public $db;

  public function __construct()
  {
      $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  
  public static function getAll()
  {
      $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
      $query = $db->query('SELECT * FROM configs');
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
      $sql = "SELECT * FROM configs WHERE id = " . $id;
      $result = $db->query($sql);
      while ($row = $result->fetch_assoc()) {
          $list = $row;
      }
      return $list; 
  }
  
  public function save()
  {
      $query = $this->db->prepare('INSERT INTO configs (id, config_key, config_value,config_desc) 
                  VALUES (:id, :config_key, :config_value,:config_desc )');
      $query->bindParam(':id', $this->id, PDO::PARAM_INT);
      $query->bindParam(':config_key', $this->config_key, PDO::PARAM_STR);
      $query->bindParam(':config_value', $this->config_value, PDO::PARAM_STR);
      $query->bindParam(':config_desc', $this->config_desc, PDO::PARAM_STR);
      $query->execute();
  }

  public function update($id)
  {
      $query = $this->db->prepare('UPDATE configs SET id = :id, config_key = :config_key, config_value = :config_value , config_desc = :config_desc WHERE id = :id');
      $query->bindParam(':id', $id, PDO::PARAM_INT);
      $query->bindParam(':config_key', $this->config_key, PDO::PARAM_STR);
      $query->bindParam(':config_value', $this->config_value, PDO::PARAM_STR);
      $query->bindParam(':config_desc', $this->config_desc, PDO::PARAM_STR);
      $query->execute();
  }

  public static function delete($id)
  {
      $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
      $query = $db->prepare('DELETE FROM configs WHERE id = :id');
      $query->bindParam(':id', $id, PDO::PARAM_INT);
      $query->execute();
  }
     // Getter for $id
     public function getId() {
        return $this->id;
    }

    public function Getconfigkey() {
        return $this->configkey;
    }
    public function Setconfigkey($configkey) {
        $this->config_key =$configkey ;
    }

    public function GetconfigValue() {
        return $this->config_value;
    }
    public function SetconfigValue($configValue) {
        $this->config_value =$configValue ;
    }
    public function Getconfigdesc() {
        return $this->config_desc;
    }
    public function Setconfigdesc($configdesc) {
        $this->config_desc =$configdesc ;
    }

}