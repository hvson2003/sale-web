<?php
class Order{
  private $id;
  private $fullname;
  private $email;
  private $phone;
  private $address;
  private $note;
  private $created_at;
  private $payment;
  private $total;
  private $quantity;
  private $item;
  private $payed;
  private $active;
  private $user_id;
  public $db;


  public function __construct()
  {
      $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  
  public static function getAll()
  {
      $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
      $query = $db->query('SELECT * FROM orders');
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
      $sql = "SELECT * FROM orders WHERE id = " . $id;
      $result = $db->query($sql);
      while ($row = $result->fetch_assoc()) {
          $list = $row;
      }
      return $list; 
  }
  
  public static function getRevenue()
  {
      $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
      $result = $db->query('SELECT SUM(total) as revenue FROM orders ORDER BY id');
      $row = $result->fetch_assoc();
      $revenue = $row['revenue'];
      $db->close();
      return $revenue;
  }
  public function save()
  {
      $query = $this->db->prepare('INSERT INTO orders (id, fullname, email,phone,address,note,created_at,payment,total,quantity,item,payed,active,user_id) 
                  VALUES (:id, :fullname, :email,:phone,:address,:note,:created_at,:payment,:total,:quantity,:item,:payed,:active,:user_id)');
      $query->bindParam(':id', $this->id, PDO::PARAM_INT);
      $query->bindParam(':fullname', $this->fullname, PDO::PARAM_STR);
      $query->bindParam(':email', $this->email, PDO::PARAM_STR);
      $query->bindParam(':phone', $this->phone, PDO::PARAM_STR);
      $query->bindParam(':address', $this->address, PDO::PARAM_STR);
      $query->bindParam(':note', $this->note, PDO::PARAM_STR);
      $query->bindParam(':created_at', date('Y-m-d H:i:s'), PDO::PARAM_STR);
      $query->bindParam(':payment', $this->payment, PDO::PARAM_INT);
      $query->bindParam(':total', $this->total, PDO::PARAM_INT);
      $query->bindParam(':quantity', $this->quantity, PDO::PARAM_INT);
      $query->bindParam(':item', $this->item, PDO::PARAM_INT);
      $query->bindParam(':payed', $this->payed, PDO::PARAM_INT);
      $query->bindParam(':active', $this->active, PDO::PARAM_INT);
      $query->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
      $query->execute();
  }

  public function update($id)
  {
      $query = $this->db->prepare('UPDATE orders SET id= :id, fullname= :fullname, email= :email,phone= :phone,address= :address,note= :note,created_at= :created_at,payment= :payment,total= :total,quantity= :quantity,item= :item,payed= :payed,active= :active,user_id= :user_id WHERE id= :id');
      $query->bindParam(':id', $id, PDO::PARAM_INT);
      $query->bindParam(':fullname', $this->fullname, PDO::PARAM_STR);
      $query->bindParam(':email', $this->email, PDO::PARAM_STR);
      $query->bindParam(':phone', $this->phone, PDO::PARAM_STR);
      $query->bindParam(':address', $this->address, PDO::PARAM_STR);
      $query->bindParam(':note', $this->note, PDO::PARAM_STR);
      $query->bindParam(':created_at', date('Y-m-d H:i:s'), PDO::PARAM_STR);
      $query->bindParam(':payment', $this->payment, PDO::PARAM_INT);
      $query->bindParam(':total', $this->total, PDO::PARAM_INT);
      $query->bindParam(':quantity', $this->quantity, PDO::PARAM_INT);
      $query->bindParam(':item', $this->item, PDO::PARAM_INT);
      $query->bindParam(':payed', $this->payed, PDO::PARAM_INT);
      $query->bindParam(':active', $this->active, PDO::PARAM_INT);
      $query->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
      $query->execute();
  }

  public static function delete($id)
  {
      $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
      $query = $db->prepare('DELETE FROM orders WHERE id = :id');
      $query->bindParam(':id', $id, PDO::PARAM_INT);
      $query->execute();
  }
    // Getter và setter cho $id
    public function getId() {
        return $this->id;
    }


    // Getter và setter cho $fullname
    public function getFullname() {
        return $this->fullname;
    }

    public function setFullname($fullname) {
        $this->fullname = $fullname;
    }

    // Getter và setter cho $email
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    // Getter và setter cho $phone
    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    // Getter và setter cho $address
    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    // Getter và setter cho $note
    public function getNote() {
        return $this->note;
    }

    public function setNote($note) {
        $this->note = $note;
    }

    // Getter và setter cho $created_at
    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

    // Getter và setter cho $payment
    public function getPayment() {
        return $this->payment;
    }

    public function setPayment($payment) {
        $this->payment = $payment;
    }

    // Getter và setter cho $total
    public function getTotal() {
        return $this->total;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    // Getter và setter cho $quantity
    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    // Getter và setter cho $item
    public function getItem() {
        return $this->item;
    }

    public function setItem($item) {
        $this->item = $item;
    }

    // Getter và setter cho $payed
    public function getPayed() {
        return $this->payed;
    }

    public function setPayed($payed) {
        $this->payed = $payed;
    }

    // Getter và setter cho $active
    public function getActive() {
        return $this->active;
    }

    public function setActive($active) {
        $this->active = $active;
    }

    // Getter và setter cho $user_id
    public function getUserId() {
        return $this->user_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

}