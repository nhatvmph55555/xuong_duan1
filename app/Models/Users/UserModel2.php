<?php
class UserModel2
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getCurrentUser()
    {
        if (isset($_SESSION['users'])) {
            $sql = "SELECT * FROM users WHERE id =:id";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindParam(':id', $_SESSION['users']['id']);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            return false;
        }
    }

    public function changePassword()
    {
        if (isset($_SESSION['users'])) {
            $user = $this->getCurrentUser();
            if (password_verify($_POST['current-password'], $user->password)) {
                $hash = password_hash($_POST['new-password'], PASSWORD_BCRYPT);
                $sql = "UPDATE users SET `password` = :password WHERE id = :id";
                $stmt = $this->db->pdo->prepare($sql);
                $stmt->bindParam(':password', $hash);
                $stmt->bindParam(':id', $_SESSION['users']['id']);
                return $stmt->execute();
            }
        } else {
            return false;
        }
    }

    public function updateCurrentUser($destPath)
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $image = $destPath;
        $now = date('Y-m-d H:i:s');

        $sql = "UPDATE users SET name=:name,email=:email,address=:address,phone=:phone,image=:image,updated_at=:updated_at WHERE id =:id";
        
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':updated_at',  $now);
        $stmt->bindParam(':id', $_SESSION['users']['id']);

        return $stmt->execute();
    }

    // Tạo bình luận mới
    // public function createReview($productId, $userId, $comment, $rating)
    // {
    //     $sql = "INSERT INTO reviews (product_id, user_id, comment, rating, created_at) 
    //             VALUES (:product_id, :user_id, :comment, :rating, NOW())";

    //     $stmt = $this->db->pdo->prepare($sql);
    //     $stmt->bindParam(':product_id', $productId);
    //     $stmt->bindParam(':user_id', $userId);
    //     $stmt->bindParam(':comment', $comment);
    //     $stmt->bindParam(':rating', $rating);

    //     return $stmt->execute();
    // }

    // // Lấy bình luận theo ID
    // public function getReviewById($reviewId)
    // {
    //     $sql = "SELECT * FROM reviews WHERE id = :review_id";
    //     $stmt = $this->db->pdo->prepare($sql);
    //     $stmt->bindParam(':review_id', $reviewId);
    //     $stmt->execute();

    //     return $stmt->fetch(PDO::FETCH_OBJ);
    // }

    // // Cập nhật bình luận
    // public function updateReview($reviewId, $comment, $rating)
    // {
    //     $sql = "UPDATE reviews SET comment = :comment, rating = :rating, updated_at = NOW() 
    //             WHERE id = :review_id";

    //     $stmt = $this->db->pdo->prepare($sql);
    //     $stmt->bindParam(':review_id', $reviewId);
    //     $stmt->bindParam(':comment', $comment);
    //     $stmt->bindParam(':rating', $rating);

    //     return $stmt->execute();
    // }

    // // Xóa bình luận
    // public function deleteReview($reviewId)
    // {
    //     $sql = "DELETE FROM reviews WHERE id = :review_id";
    //     $stmt = $this->db->pdo->prepare($sql);
    //     $stmt->bindParam(':review_id', $reviewId);

    //     return $stmt->execute();
    // }
}
