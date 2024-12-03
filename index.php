<?php
session_start();


// database
include 'app/Database/Database.php';

// Models Admin
include  'app/Models/Admin/HomeModel.php';
include 'app/Models/Admin/UserModel.php';
include 'app/Models/Admin/CategoryModel.php';
include 'app/Models/Admin/ProductModel.php';

// Models User
include 'app/Models/Users/CommentUserModel.php';
include 'app/Models/Users/CategoryUserModel.php';
include 'app/Models/Users/ProductUserModel.php';
include 'app/Models/Users/LoginModel.php';
include 'app/Models/Users/UserModel2.php';



// Controllers Admin
include 'app/Controllers/Admin/ControllerAdmin.php';
include 'app/Controllers/Admin/HomeController.php';
include 'app/Controllers/Admin/LoginController.php';
include 'app/Controllers/Admin/UserController.php';
include 'app/Controllers/Admin/CategoryController.php';
include 'app/Controllers/Admin/ProductController.php';

// Controllers User
include 'app/Controllers/Users/DashboardControllers.php';
include 'app/Controllers/Users/LoginUserController.php';
include 'app/Controllers/Users/ProductUserController.php';

// Link
const BASE_URL = "http://localhost/Ecomus/";
// Router
include 'router/web.php';
// echo  password_hash('123456', PASSWORD_BCRYPT);
//1tieng

?>