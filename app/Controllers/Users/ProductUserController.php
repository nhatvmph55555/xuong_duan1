<?php
class ProductUserController
{   
    

    public function productDetail()
    {
        // $productModel = new ProductUserModel();

        // // Lấy ID từ tham số GET
        // $id = $_GET['id'] ?? null;
        // $product = $productModel->getProductById($id);

        // if (!$product) {
        //     // Nếu không tìm thấy sản phẩm, chuyển hướng hoặc hiển thị thông báo lỗi
        //     die('Sản phẩm không tồn tại!');
        // }

        // Hiển thị chi tiết sản phẩm
        include 'app/Views/Users/product-detail.php';
    }
}
