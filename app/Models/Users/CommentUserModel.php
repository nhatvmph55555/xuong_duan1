<?php
class CommentUserModel
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllComment($productId)
    {
        // $sql = "SELECT 
        //         product_comment.id, 
        //         product_comment.product_id, 
        //         product_comment.user_id, 
        //         product_comment.comment, 
        //         product_comment.created_at, 
        //         products.name AS product_name, 
        //         users.name AS user_name, 
        //         users.image AS user_image, 
        //         product_rating.rating
        //         FROM 
        //         product_comment
        //         JOIN 
        //         products ON product_comment.product_id = products.id
        //         JOIN 
        //         users ON product_comment.user_id = users.id
        //         LEFT JOIN 
        //         product_rating ON product_comment.product_id = product_rating.product_id  AND product_comment.user_id = product_rating.user_id WHERE product_comment.product_id = :productId";
        $sql = "SELECT DISTINCT 
                    product_comment.id, 
                    product_comment.product_id, 
                    product_comment.user_id, 
                    product_comment.comment, 
                    product_comment.created_at, 
                    products.name AS product_name, 
                    users.name AS user_name, 
                    users.image AS user_image, 
                    product_rating.rating
                FROM 
                    product_comment
                JOIN 
                    products ON product_comment.product_id = products.id
                JOIN 
                    users ON product_comment.user_id = users.id
                LEFT JOIN (
                    SELECT product_id, user_id, MAX(rating) AS rating 
                    FROM product_rating 
                    GROUP BY product_id, user_id
                ) AS product_rating ON product_comment.product_id = product_rating.product_id 
                AND product_comment.user_id = product_rating.user_id
                WHERE 
                    product_comment.product_id = :productId;
                ";
        $query = $this->db->pdo->prepare($sql);
        $query->bindParam(':productId', $productId);
        $query->execute();

        $result = $query->fetchAll();
        // var_dump($result);
        // die;
        return $result;
    }

    public function addCommentToDB($productId, $userId, $comment, $rating)
    {
        if (empty($productId) || empty($userId) || empty($comment)) {
            return false;
        }

        $now = date('Y-m-d H:i:s');

        // product_comment
        $sqlComment = "INSERT INTO product_comment (product_id, user_id, comment, created_at) VALUES (:product_id, :user_id, :comment, :created_at)";
        $stmtComment = $this->db->pdo->prepare($sqlComment);
        $stmtComment->bindParam(':product_id', $productId);
        $stmtComment->bindParam(':user_id', $userId);
        $stmtComment->bindParam(':comment', $comment);
        $stmtComment->bindParam(':created_at', $now);

        //  product_rating
        $sqlRating = "INSERT INTO product_rating (product_id, user_id, rating, created_at) VALUES (:product_id, :user_id, :rating, :created_at) ON DUPLICATE KEY UPDATE rating = :rating";
        $stmtRating = $this->db->pdo->prepare($sqlRating);
        $stmtRating->bindParam(':product_id', $productId);
        $stmtRating->bindParam(':user_id', $userId);
        $stmtRating->bindParam(':rating', $rating);
        $stmtRating->bindParam(':created_at', $now);



        if ($stmtComment->execute() && $stmtRating->execute()) {
            return true;
        }
        return false;
    }

    // public function addCommentToDB($productId, $userId, $comment, $rating)
    // {
    //     if (empty($productId) || empty($userId) || empty($comment)) {
    //         return false; 
    //     }

    //     $now = date('Y-m-d H:i:s');

    //     // product_comment
    //     $sqlComment = "INSERT INTO product_comment (product_id, user_id, comment, created_at) VALUES (:product_id, :user_id, :comment, :created_at)";
    //     $stmtComment = $this->db->pdo->prepare($sqlComment);
    //     $stmtComment->bindParam(':product_id', $productId);
    //     $stmtComment->bindParam(':user_id', $userId);
    //     $stmtComment->bindParam(':comment', $comment);
    //     $stmtComment->bindParam(':created_at', $now);

    //     //  product_rating
    //     $sqlRating = "INSERT INTO product_rating (product_id, user_id, rating, created_at) VALUES (:product_id, :user_id, :rating, :created_at) ON DUPLICATE KEY UPDATE rating = :rating";
    //     $stmtRating = $this->db->pdo->prepare($sqlRating);
    //     $stmtRating->bindParam(':product_id', $productId);
    //     $stmtRating->bindParam(':user_id', $userId);
    //     $stmtRating->bindParam(':rating', $rating);
    //     $stmtRating->bindParam(':created_at', $now);

    //     try {
    //         $this->db->pdo->beginTransaction();

    //         if ($stmtComment->execute() && $stmtRating->execute()) {
    //             $this->db->pdo->commit();
    //             return true;
    //         } else {
    //             $this->db->pdo->rollBack();
    //             return false;
    //         }
    //     } catch (PDOException $e) {
    //         $this->db->pdo->rollBack();
    //         // Log lỗi hoặc xử lý thông báo lỗi chi tiết
    //         return false;
    //     }
    // }

    public function deleteCommentFromDB($commentId, $productId, $userId, $ratingId)
    {
        try {
            $this->db->pdo->beginTransaction();

            // First, delete the comment from product_comment table
            $sqlComment = "DELETE FROM product_comment WHERE id = :commentId";
            $stmtComment = $this->db->pdo->prepare($sqlComment);
            $stmtComment->bindParam(':commentId', $commentId);

            // Then, delete the corresponding rating from product_rating table
            $sqlRating = "DELETE FROM product_rating WHERE product_id = :productId AND user_id = :userId AND rating = :ratingId";
            $stmtRating = $this->db->pdo->prepare($sqlRating);
            $stmtRating->bindParam(':productId', $productId);
            $stmtRating->bindParam(':userId', $userId);
            $stmtRating->bindParam(':ratingId', $ratingId);

            // Execute both delete statements
            if ($stmtComment->execute() && $stmtRating->execute()) {
                $this->db->pdo->commit();
                return true;
            } else {
                $this->db->pdo->rollBack();
                return false;
            }
        } catch (PDOException $e) {
            $this->db->pdo->rollBack();
            // Log the error or handle the exception
            return false;
        }
    }



    // public function deleteCommentFromDB($commentId, $productId, $userId)
    // {
    //     try {
    //         $this->db->pdo->beginTransaction();

    //         // First, delete the comment from product_comment table
    //         $sqlComment = "DELETE FROM product_comment WHERE id = :commentId";
    //         $stmtComment = $this->db->pdo->prepare($sqlComment);
    //         $stmtComment->bindParam(':commentId', $commentId);

    //         // Then, delete the corresponding rating from product_rating table
    //         $sqlRating = "DELETE FROM product_rating WHERE product_id = :productId AND user_id = :userId";
    //         $stmtRating = $this->db->pdo->prepare($sqlRating);
    //         $stmtRating->bindParam(':productId', $productId);
    //         $stmtRating->bindParam(':userId', $userId);

    //         // Execute both delete statements
    //         if ($stmtComment->execute() && $stmtRating->execute()) {
    //             $this->db->pdo->commit();
    //             return true;
    //         } else {
    //             $this->db->pdo->rollBack();
    //             return false;
    //         }
    //     } catch (PDOException $e) {
    //         $this->db->pdo->rollBack();
    //         // Log the error or handle the exception
    //         return false;
    //     }
    // }



}
