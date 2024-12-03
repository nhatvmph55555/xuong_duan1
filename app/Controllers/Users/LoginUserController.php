<?php
class LoginUserController {
    public function login(){
        include 'app/Views/Users/login.php';
    }
    public function postLogin(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $loginModel = new LoginModel();
        $dataUsers = $loginModel->checkLogin();
        // var_dump($dataUsers);
        // die;
        if ($dataUsers) {
            $_SESSION['users'] = [
                'id' => $dataUsers->id,
                'name' => $dataUsers->name,
                'email' => $dataUsers->email,
                'image' => $dataUsers->image,
            ];
            header("Location:" . BASE_URL);
            exit;
        } else {
            $_SESSION['error'] = "email hoặc password không đúng";
            header("Location:" . BASE_URL . "?act=login");
            exit;
        }
        }
    }

    public function logout(){
        if(isset($_SESSION['users'])){
            unset($_SESSION['users']);
        }
        header("Location:" . BASE_URL . "?act=login");
        exit;
    }

    public function register(){
        include 'app/Views/Users/register.php';
    }
    
    public function postRegister(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $loginModel = new LoginModel();
            $message = $loginModel->addUserToDB();


            if ($message) {
                $_SESSION['message'] = 'Đăng ký thành công';
                header("Location:" . BASE_URL . "?act=login");
                exit;
            } else {
                $_SESSION['message'] = 'Đăng ký không thành cong';
                header("Location:" . BASE_URL . "?act=register");
                exit;
            }
        }
    }
}
