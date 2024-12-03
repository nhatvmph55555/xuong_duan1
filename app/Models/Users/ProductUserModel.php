<?php
class ProductUserModel
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getProductDashboard()
    {
        $sql = "SELECT * from products ORDER BY RAND() LIMIT 12";
        $query = $this->db->pdo->query($sql);
        $result = $query->fetchAll();
        return $result;
    }

    public function getDataShop()
    {
        $sql = "SELECT * from products";

        if (isset($_GET['category_id'])) {
            $sql = $sql . " WHERE category_id = :category_id";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindParam(':category_id', $_GET['category_id']);
        } else {
            $stmt = $this->db->pdo->prepare($sql);
        }


        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getProductStock()
    {
        $sql1 = "SELECT COUNT(id) as instock FROM products WHERE stock > 0 ";
        $query1 = $this->db->pdo->query($sql1);
        $instock = $query1->fetch();

        $sql2 = "SELECT COUNT(id) as outstock FROM products WHERE stock = 0 ";
        $query2 = $this->db->pdo->query($sql2);
        $outstock = $query2->fetch();

        return [$instock, $outstock];
    }

    public function getDataShopName()
    {
        $productName = $_GET['product-name'];
        $sql = "SELECT * FROM `products` WHERE name like '%$productName%'";
        $query = $this->db->pdo->query($sql);
        $result = $query->fetchAll();
        return $result;
    }

    public function getProductById($productId)
    {
            $sql = "SELECT * FROM `products` WHERE id = :productId";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindParam(':productId', $productId);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        
    }

    public function getProductImageById($productId)
    {
            $sql = "SELECT * FROM `product_image` WHERE product_id = :productId";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindParam(':productId', $productId);
            $stmt->execute();
            $result = $stmt->fetchAll();
            // var_dump($result);
            // die;
            return $result;
        
    }
}
