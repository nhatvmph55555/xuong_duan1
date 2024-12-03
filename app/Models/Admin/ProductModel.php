<?php
class ProductModel
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllProduct()
    {
        $sql = "SELECT products.id, products.name, products.price, products.price_sale, products.category_id, products.stock,
                products.image_main, products.created_at, products.updated_at, products.description, categories.name 
                AS categoryName FROM `products` JOIN categories ON products.category_id = categories.id";
        $query = $this->db->pdo->query($sql);
        $result = $query->fetchAll();
        // var_dump($result);
        // die;
        return $result;
    }

    public function addProductToBD($destPath)
    {
        $name = $_POST['name'];
        $category = $_POST['category'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $price_sale = $_POST['price_sale'];
        $stock = $_POST['stock'];
        $imageDes = $destPath; // Default value for image_main
        $now = date('Y-m-d H:i:s');

        $sql = "INSERT INTO `products`(`name`, `category_id`, `description`, `price`, `price_sale`, `stock`, `image_main`, `created_at`, `updated_at`)
            VALUES (:name, :category_id, :description, :price, :price_sale, :stock, :image_main, :created_at, :updated_at)";

        $stmt = $this->db->pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':category_id', $category); // Use :category_id to match the SQL placeholder
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':price_sale', $price_sale);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':image_main', $imageDes);
        $stmt->bindParam(':created_at', $now);
        $stmt->bindParam(':updated_at', $now);

        if ($stmt->execute()) {
            $lastInsertId = $this->db->pdo->lastInsertId();
            return $lastInsertId;
        } else {
            return false;
        }
    }

    public function addGararyImage($destPathImage, $idProduct)
    {
        $sql = "INSERT INTO `product_image`(`product_id`, `image`) VALUES (:product_id, :image)";
        $stmt = $this->db->pdo->prepare($sql);

        $stmt->bindParam(':product_id', $idProduct);
        $stmt->bindParam(':image', $destPathImage);

        return $stmt->execute();
    }

    public function getProductByID()
    {
        $id = $_GET['id'];
        $sql = "SELECT * FROM `products` WHERE id = :id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            return $stmt->fetch();
        }
        return false;
    }

    public function getProductImageById()
    {
        $id = $_GET['id'];
        $sql = "SELECT * FROM `product_image` WHERE product_id = :product_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':product_id', $id);
        if ($stmt->execute()) {
            return $stmt->fetchAll();
        }
        return false;
    }

    public function deleteProductToBD()
    {
        $id = $_GET['id'];

        $sqlProductImage = "DELETE FROM `product_image` WHERE product_id = :product_id"; // Removed '*'
        $stmt1 = $this->db->pdo->prepare($sqlProductImage);
        $stmt1->bindParam(':product_id', $id);

        // Delete the product itself
        $sqlProduct = "DELETE FROM `products` WHERE id = :id"; // Removed '*'
        $stmt2 = $this->db->pdo->prepare($sqlProduct);
        $stmt2->bindParam(':id', $id);

        // Execute both statements
        if ($stmt1->execute() && $stmt2->execute()) {
            return true;
        }
        return false;
    }

    public function updateProductToBD($destPath)
    {
        $id = $_GET['id'];
        $name = $_POST['name'];
        $category = $_POST['category'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $price_sale = $_POST['price_sale'];
        $stock = $_POST['stock'];
        $imageDes = $destPath;
        $now = date('Y-m-d H:i:s');

        $sql = "UPDATE `products` SET `name`=:name,`category_id`=:category_id,`description`=:description,`price`=:price,`price_sale`=:price_sale,`stock`=:stock,`image_main`=:image_main,`updated_at`=:updated_at WHERE id = :id";

        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':category_id', $category);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':price_sale', $price_sale);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':image_main', $imageDes);
        $stmt->bindParam(':updated_at', $now);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    public function deleteImageGarary(){
        $id = $_GET['id'];
        
        $sqlProductImage = "DELETE FROM `product_image` WHERE product_id = :product_id"; // Removed '*'
        $stmt = $this->db->pdo->prepare($sqlProductImage);
        $stmt->bindParam(':product_id', $id);
        return $stmt->execute();
    }
}
