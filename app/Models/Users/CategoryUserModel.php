<?php
class CategoryUserModel
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getCategoryDashboard()
    {
        $sql = "SELECT * from categories";
        $query = $this->db->pdo->query($sql);
        $result = $query->fetchAll();
        return $result;
    }

    public function getCategoryByID($id)
    {
        $sql = "SELECT * from categories where id =:id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
}
