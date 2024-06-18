<!-- <?php
class User{
    private $id;
    private $username;
    private $password;
    private $fullname;
    private $email;
    private $address;
    private $phone;
    private $role;


    public $db;
    public function __construct()
    {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getAll()
    {
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $query = $db->query('SELECT * FROM users');
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
        $sql = "SELECT * FROM users WHERE id = " . $id;
        $result = $db->query($sql);
        while ($row = $result->fetch_assoc()) {
            $list = $row;
        }
        return $list; 
    }

    public function save()
    {
        $query = $this->db->prepare('INSERT INTO users (username, password, fullname, email, address, phone, role) 
                    VALUES (:username, :password, :fullname, :email, :address, :phone, :role)');
        $query->bindParam(':username', $this->username, PDO::PARAM_STR);
        $query->bindParam(':password', $this->password, PDO::PARAM_STR);
        $query->bindParam(':fullname', $this->fullname, PDO::PARAM_STR);
        $query->bindParam(':email', $this->email, PDO::PARAM_STR);
        $query->bindParam(':address', $this->address, PDO::PARAM_STR);
        $query->bindParam(':phone', $this->phone, PDO::PARAM_STR);
        $query->bindParam(':role', $this->role, PDO::PARAM_STR);
        $query->execute();
    }

    public function update($id)
    {
        $query = $this->db->prepare('UPDATE users SET username = :username, password = :password, fullname = :fullname, email = :email
                    , address = :address, phone = :phone, role = :role WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->bindParam(':username', $this->username, PDO::PARAM_STR);
        $query->bindParam(':password', $this->password, PDO::PARAM_STR);
        $query->bindParam(':fullname', $this->fullname, PDO::PARAM_STR);
        $query->bindParam(':email', $this->email, PDO::PARAM_STR);
        $query->bindParam(':address', $this->address, PDO::PARAM_STR);
        $query->bindParam(':phone', $this->phone, PDO::PARAM_STR);
        $query->bindParam(':role', $this->role, PDO::PARAM_STR);
        $query->execute();
    }

    public static function delete($id)
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $query = $db->prepare('DELETE FROM users WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
    }
    public static function getCountSaler()
    {
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $result = $db->query('SELECT COUNT(*) as saler_count FROM users WHERE role = 1');
        $row = $result->fetch_assoc();
        $saler_count = $row['saler_count'];
        $db->close();
        return $saler_count;
    }
    public static function getCountUser()
    {
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $result = $db->query('SELECT COUNT(*) as user_count FROM users WHERE role = 2');
        $row = $result->fetch_assoc();
        $user_count = $row['user_count'];
        $db->close();
        return $user_count;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getFullname() {
        return $this->fullname;
    }

    public function setFullname($fullname) {
        $this->fullname = $fullname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }
}
?> -->
