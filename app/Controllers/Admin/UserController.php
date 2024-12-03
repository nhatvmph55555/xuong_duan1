<?php
class UserController
{
    public function getAllUser()
    {
        $UserModel = new UserModel();
        $listUser = $UserModel->getAllData();
        include 'app/Views/Admin/user.php';
    }
    public function addUser()
    {
        include 'app/Views/Admin/add-user.php';
    }

    public function checkValidate()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $role = $_POST['role'];

        if ($name != "" && $email != "" && $address != "" && $phone != "" && $role != "") {
            return true;
        } else {
            $_SESSION['error'] = "Bạn nhập thiếu thông tin";
            return false;
        }
    }
    public function addPostUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!$this->checkValidate()) {
                header("Location:" . BASE_URL . "?role=admin&act=add-user");
                exit;
            }

            // Thêm ảnh

            $uploadDir = 'assets/Admin/upload/';
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $destPath = "";
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
                }
            }


            $UserModel = new UserModel();
            // Kiểm tra xem thêm mới thành công chưa
            $message = $UserModel->addUserToDB($destPath);



            if ($message) {
                $_SESSION['message'] = 'Thêm mới thành công';
                header("Location:" . BASE_URL . "?role=admin&act=all-user");
                exit;
            } else {
                $_SESSION['message'] = 'Thêm mới không thành công';
                header("Location:" . BASE_URL . "?role=admin&act=add-user");
                exit;
            }
        }
    }
    public function updateUser()
    {
        if (!isset($_GET['id'])) {
            $_SESSION['message'] = 'Vui lòng chọn User cần sửa';
            header("Location:" . BASE_URL . "?role=admin&act=all-user");
            exit;
        }
        // $id = $_GET['id'];
        $UserModel = new UserModel();
        $user = $UserModel->getUserById();
        if (!$user) {
            $_SESSION['message'] = 'Không tìm thấy dữ liệu';
            header("Location:" . BASE_URL . "?role=admin&act=all-user");
            exit;
        }
        include 'app/Views/Admin/update-user.php';
    }

    public function updatePostUser()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!isset($_GET['id'])) {
                $_SESSION['message'] = 'Vui lòng chọn User cần sửa';
                header("Location:" . BASE_URL . "?role=admin&act=all-user");
                exit;
            }
            if (!$this->checkValidate()) {
                header("Location:" . BASE_URL . "?role=admin&act=update-user&id=" . $_GET['id']);
                exit;
            }
            $UserModel = new UserModel();
            $user = $UserModel->getUserById();
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
                    // xoa anh cu
                    unlink($user->image);
                }
            }


            $UserModel = new UserModel();
            // Kiểm tra xem thêm mới thành công chưa
            $message = $UserModel->updateUserToDB($destPath);



            if ($message) {
                $_SESSION['message'] = 'Chỉnh sửa thành công';
                header("Location:" . BASE_URL . "?role=admin&act=all-user");
                exit;
            } else {
                $_SESSION['message'] = 'Chỉnh sửa không thành công';
                header("Location:" . BASE_URL . "?role=admin&act=update-user&id=" . $_GET['id']);
                exit;
            }
        }
    }
    public function deleteUser()
    {
        if (!isset($_GET['id'])) {
            $_SESSION['message'] = 'Vui lòng chọn User cần Xóa';
            header("Location:" . BASE_URL . "?role=admin&act=all-user");
            exit;
        }

        $userModel = new UserModel();
        $user = $userModel->getUserById();
        // xoa anh
        if ($user->image != "" && $user->image != null) {
            unlink($user->image);
        }

        $message = $userModel->deleteUser();

        if ($message) {
            $_SESSION['message'] = 'Xóa thành công';
            header("Location:" . BASE_URL . "?role=admin&act=all-user");
            exit;
        } else {
            $_SESSION['message'] = 'Xóa không thành công';
            header("Location:" . BASE_URL . "?role=admin&act=all-user");
            exit;
        }
    }

    public function showUser()
    {
        if (!isset($_GET['id'])) {
            $_SESSION['message'] = 'Vui lòng chọn User cần xem';
            header("Location:" . BASE_URL . "?role=admin&act=all-user");
            exit;
        }
        $userModel = new UserModel();
        $user = $userModel->getUserById();

        include 'app/Views/Admin/show-user.php';
    }
}
