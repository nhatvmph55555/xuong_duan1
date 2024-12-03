<?php
class HomeModels
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    
    public function checkLogin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        // $sql = "select * from users where email= '$email' end password='$password' ";
        $sql = "SELECT * from users Where email=:email and role = 1";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch();
        if ($result && password_verify($password, $result->password)) {
            // Mật khẩu đúng


            return $result;
        }
        return false;
    }
}
