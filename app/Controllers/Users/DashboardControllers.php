<?php

class DashboardControllers
{
    public function dashboard()
    {
        $categoryModel = new CategoryUserModel();
        $listCategory = $categoryModel->getCategoryDashboard();
        $productModel = new ProductUserModel();
        $listProduct = $productModel->getProductDashboard();
        include 'app/Views/Users/index.php';
    }

    public function myAccount()
    {
        include 'app/Views/Users/myaccount.php';
    }

    public function accountDetail()
    {
        $userModel = new UserModel2();
        $user = $userModel->getCurrentUser();
        // var_dump($user);
        // die;
        include 'app/Views/Users/account-detail.php';
    }

    public function accountUpdate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->changePassword();

            $UserModel = new UserModel2();
            $user = $UserModel->getCurrentUser();
            // Thêm ảnh

            $uploadDir = 'assets/Admin/upload/';
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $destPath = $user->image;

            if (!empty($_FILES['image']['name'])) {
                $fileTmpPath = $_FILES['image']['tmp_name'];
                $fileType = mime_content_type($fileTmpPath);
                $fileName = basename($_FILES['image']['name']);
                $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                $newFileName = uniqid() . '.' . $fileExtension;
                if (in_array($fileType, $allowedTypes)) {
                    $destPath = $uploadDir . $newFileName;
                    if (!move_uploaded_file($fileTmpPath, $destPath)) {
                        $destPath = "";
                    }
                    unlink($user->image);
                }
            }

            $UserModel = new UserModel2();
            // Kiểm tra xem thêm mới thành công chưa
            $message = $UserModel->updateCurrentUser($destPath);
            if ($message) {
                $_SESSION['message'] = 'Chỉnh sửa thành công';
                header("Location:" . BASE_URL . "?act=account-detail");
                exit;
            } else {
                $_SESSION['message'] = 'Chỉnh sửa không thành công';
                header("Location:" . BASE_URL . "?act=account-detail");
                exit;
            }
        }
    }

    public function changePassword()
    {
        if ($_POST['current-password'] != "" && $_POST['new-password'] != "" && $_POST['confirm-password'] != "" && $_POST['new-password'] == $_POST['confirm-password']) {
            $userModel = new UserModel2();
            $userModel->changePassword();
        }
    }

    public function showShop()
    {
        $productModel = new ProductUserModel();
        $listProduct = $productModel->getDataShop();

        $categoryModel = new CategoryUserModel();
        if (isset($_GET['category_id'])) {
            $category = $categoryModel->getCategoryByID($_GET['category_id']);
        }
        $listCategory = $categoryModel->getCategoryDashboard();
        $stock = $productModel->getProductStock();

        // Lọc số lượng
        if (isset($_GET['instock'])) {
            $listProduct = array_filter($listProduct, function ($product) {
                return $product->stock > 0;
            });
        }

        if (isset($_GET['outstock'])) {
            $listProduct = array_filter($listProduct, function ($product) {
                return $product->stock == 0;
            });
        }

        // Lọc giá
        if (isset($_GET['min'])) {
            $listProduct = array_filter($listProduct, function ($product) {
                if ($product->price_sale != null) {
                    return $product->price_sale > $_GET['min'];
                }
                return $product->price > $_GET['min'];
            });
        }

        if (isset($_GET['max'])) {
            $listProduct = array_filter($listProduct, function ($product) {
                if ($product->price_sale != null) {
                    return $product->price_sale < $_GET['max'];
                }
                return $product->price < $_GET['max'];
            });
        }

        // Lọc tên
        if (isset($_GET['product-name'])) {
            $listProduct = $productModel->getDataShopName();
        }
        include 'app/Views/Users/shop.php';
    }

    public function productDetail()
    {
        $productId = $_GET['id'];
        $productModel = new ProductUserModel();
        $product = $productModel->getProductById($productId);
        $productImage = $productModel->getProductImageById($productId);

        $commentUserModel = new CommentUserModel();
        $listComment = $commentUserModel->getAllComment($productId);

        include 'app/Views/Users/product-detail.php';
    }

    public function addPostComment()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'];
            $userId = $_POST['user_id'];
            $comment = $_POST['comment'];
            $rating = $_POST['rating'];

            $commentModel = new CommentUserModel();
            $result = $commentModel->addCommentToDB($productId, $userId, $comment, $rating);

            if ($result) {
                $_SESSION['message'] = 'Thêm bình luận thành công!';
            } else {
                $_SESSION['message'] = 'Thêm bình luận thất bại!';
            }

            header("Location: " . BASE_URL . "?act=product-detail&id=" . $productId);
            exit;
        }
    }

    // public function deleteComment(){
        
    // }

    public function deleteComment()
    {
        if (isset($_GET['comment_id']) && isset($_GET['product_id']) && isset($_GET['user_id']) && isset($_GET['rating_id'])) {
            $commentId = $_GET['comment_id'];
            $productId = $_GET['product_id'];
            $userId = $_GET['user_id'];
            $ratingId = $_GET['rating_id'];

            $commentUserModel = new CommentUserModel();
            $result = $commentUserModel->deleteCommentFromDB($commentId, $productId, $userId, $ratingId);

            if ($result) {
                $_SESSION['message'] = 'Bình luận và đánh giá đã được xóa thành công!';
            } else {
                $_SESSION['message'] = 'Lỗi khi xóa bình luận hoặc đánh giá!';
            }

            header("Location: " . BASE_URL . "?act=product-detail&id=" . $productId );
            exit;
        }
    }

    public function accountOrder(){
        include 'app/Views/Users/account-order.php';
    }




}
