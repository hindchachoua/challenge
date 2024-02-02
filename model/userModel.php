<?php 


class User {

    private $id;
    private $username;
    private $email;
    private $password;
    private $role;

    public function __construct($id, $username, $email, $password, $role = 'default') {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRole() {
        return $this->role;
    }
}

class UserDAO {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getUser($email, $password) {
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new User($result['id'], $result['username'], $result['email'], $result['password'], $result['role']);
        }
    }
}

class Client extends User {
    public function __construct($id, $username, $email, $password, $role = 'client') {
        parent::__construct($id, $username, $email, $password, $role);
    }
}


class Admin extends User {
    public function __construct($id, $username, $email, $password, $role = 'admin') {
        parent::__construct($id, $username, $email, $password, $role);
    }
}

?>