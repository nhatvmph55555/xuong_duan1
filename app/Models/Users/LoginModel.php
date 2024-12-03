<?php
class LoginModel{
    public $db;
    public function __construct(){
        $this->db=new Database();
    }

    public function checkLogin(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        // $sql = "select * from users where email= '$email' end password='$password' ";
        $sql = "SELECT * FROM users WHERE email=:email AND (role = 2 or role = 1)";
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

    public function addUserToDB() {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $now = date('Y-m-d H:i:s');
        $role = 2;
    
        try {
            // Kiểm tra email đã tồn tại hay chưa
            $sqlCheck = "SELECT COUNT(*) as count FROM users WHERE email = :email";
            $stmt = $this->db->pdo->prepare($sqlCheck);
            $stmt->bindParam(':email', $email); // Đúng biến `$stmt` thay vì `$stmt1`
            $stmt->execute();
    
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result['count'] > 0) {
                // Email đã tồn tại
                throw new Exception("Email đã tồn tại trong hệ thống.");
            }
    
            // Chèn dữ liệu người dùng mới
            $sql = "INSERT INTO `users` (`name`, `email`, `password`, `created_at`, `updated_at`, `role`) 
                    VALUES (:name, :email, :password, :created_at, :updated_at, :role)";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':created_at', $now);
            $stmt->bindParam(':updated_at', $now);
            $stmt->bindParam(':role', $role);
    
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Lỗi CSDL: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    
}