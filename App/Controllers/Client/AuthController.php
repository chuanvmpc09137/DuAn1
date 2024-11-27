<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Validations\AuthValidation;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Auth\Login;
use App\Views\Client\Pages\Auth\Register;
use LDAP\Result;
use App\Models\User;
use App\Views\Client\Components\Notification;
use App\Views\Client\Pages\Auth\Cart;
use App\Views\Client\Pages\Auth\ChangePassword;
use App\Views\Client\Pages\Auth\Edit;
use App\Views\Client\Pages\Auth\ForgotPassword;
use App\Views\Client\Pages\Auth\ResetPassword;

class AuthController
{
    public static function register()
    {
        // hiển thị header
        Header::render();
        // Hiển thị thông báo
        Notification::render();
        // Hủy session thông báo
        NotificationHelper::unset();
        // hiển thị đăng kí
        Register::render();
        // Hiển thị footer
        Footer::render();
    }


    public static function registerAction()
    {
        // bắt lỗi validation
        // kiểm tra có thỏa đk ko
        // Nếu có tiếp tục thay lệnh ở dưới 
        // Nếu ko thõa:(có lỗi ) thông báo và chuyển hướng về trang đk

        $is_valid = AuthValidation::register();


        if (!$is_valid) {
            NotificationHelper::error('register_valid', 'Đăng kí thất bại');
            header('location: /register');
            exit();
        }


        $username = $_POST['username'];
        $password = $_POST['password'];
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $email = $_POST['email'];
        $name = $_POST['name'];

        $data = [
            'username' => $username,
            'password' => $hash_password,
            'email' => $email,
            'name' => $name
        ];

        $result = AuthHelper::register($data);

        if ($result) {
            //    var_dump('Them ok');
            header('Location:/login');
        } else {
            // var_dump('Them lỗi');
            header('Location:/register');
        }

    }
    public static function login()
    {
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Login::render();
        Footer::render();
    }

    public static function loginAction()
    {
        $is_valid = AuthValidation::login();
        if (!$is_valid) {
            NotificationHelper::error('login_valid', 'Đăng nhập thất bại');
            header('location: /login');
            exit();
        }
        $data = [
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'remember' => isset($_POST['remember']) ? true : false
        ];


        $result = AuthHelper::login($data);

        if ($result) {
            // NotificationHelper::success('login','Đăng nhập thành công');
            header('location: /');
        } else {
            // NotificationHelper::error('login','Đăng nhập thất bại');
            header('location: /login');
        }
    }

    public static function logout()
    {
        AuthHelper::logout();
        NotificationHelper::success('logout', 'Đăng xuất thành công');
        header('location: /');
    }
    public static function edit($id)
    {
        $result = AuthHelper::edit($id);

        if (!$result) {
            if (isset($_POST['error']['login'])) {
                header('location: /login');
                exit();
            }
        }

        if (!$result) {
            if (isset($_POST['error']['user_id'])) {

                $data = $_SESSION['user'];
                $user_id = $data['id'];
                header("location: /users/edit/$user_id");
                exit();
            }
        }


        $data = $_SESSION['user'];
        header::render();
        Notification::render();
        NotificationHelper::unset();
        // giao diện thông tin user

        Edit::render($data);
        // var_dump($data);
        Footer::render();
    }

    public static function update($id)
    {
        $is_valid = AuthValidation::edit();
        if (!$is_valid) {
            NotificationHelper::error('edit_valid', 'Cập nhật thất bại');
            header("location: /users/$id");
            exit();
        }
        $data = [
            'email' => $_POST['email'],
            'name' => $_POST['name'],
        ];
        // kiểm tra có upload có upload hình ảnh không có hợp lệ không
        $is_upload = AuthValidation::uploadAvatar();
        if ($is_upload) {
            $data['avatar'] = $is_upload;
        }

        // gọi helper để update
        $result = AuthHelper::update($id, $data);

        // kiểm tra kết quả chuyển về để chuyển hướng
        header("location: /users/$id");
    }

    // hiển thị đổi mk

    public static function changePassword()
    {
        $is_login = AuthHelper::checklogin();

        if (!$is_login) {
            NotificationHelper::error('login', 'vui lòng đăng nhập để đổi mk');
            header('location: /login');
            exit();
        }

        $data = $_SESSION['user'];

        header::render();
        Notification::render();
        NotificationHelper::unset();
        ChangePassword::render($data);
        Footer::render();
    }
    // thực hiện đổi mk
    public static function changePasswordAction()
    {
        $is_valid = AuthValidation::changePassword();
        if (!$is_valid) {
            NotificationHelper::error('change-password', 'Đổi mật khẩu thất bại');
            header('location: /change-password');
            exit();
        }

        $id = $_SESSION['user']['id'];

        $data = [
            'old_password' => $_POST['old_password'],
            'new_password' => $_POST['new_password']
        ];

        // gọi auth helper

        $result = AuthHelper::changePassword($id, $data);
        header('location: /change-password');
    }
    public static function forgotPassword()
    {
        header::render();
        Notification::render();
        NotificationHelper::unset();
        ForgotPassword::render();
        Footer::render();
    }

    public static function forgotPasswordAction()
    {
        $is_valid = AuthValidation::forgotPassword();
        if (!$is_valid) {
            NotificationHelper::error('forgot-password', 'Lấy lại mật khẩu thất bại');
            header('location: /forgot-password');
            exit();
        }
        $username = $_POST['username'];
        $email = $_POST['email'];

        $data = [
            'username' => $username
        ];

        $Result = AuthHelper::forgotPassword($data);

        if (!$Result) {
            NotificationHelper::error('username_exist', 'không tồn tại tài khoản này');
            header('location: /forgot-password');
            exit();
        }

        if ($Result['email'] != $email) {
            NotificationHelper::error('email_exist', 'Email không đúng');
            header('location: /forgot-password');
            exit();
        }
        $_SESSION['reset_password'] = [
            'username' => $username,
            'email' => $email,
        ];
        header('location: /reset-password');

        // echo "Thành công";

    }


    public static function resetPassword()
    {
        if (!isset($_SESSION['reset_password'])) {
            NotificationHelper::error('reset_password', 'Phiên đăng nhập đã hết hạn');
            header('location: /forgot-password');
            exit();
        }
        header::render();
        Notification::render();
        NotificationHelper::unset();
        ResetPassword::render();
        Footer::render();
    }
    public static function resetPasswordAction(){
        $is_valid = AuthValidation::resetPassword();
        if (!$is_valid) {
            NotificationHelper::error('reset-password', 'Đặt lại mật khẩu thất bại');
            header('location: /reset-password');
            exit();
        }

        $password=$_POST['password'];
        $hash_password=password_hash($password, PASSWORD_DEFAULT);

        $data=[
            'username'=>$_SESSION['reset_password']['username'],
            'email'=>$_SESSION['reset_password']['email'],
            'password'=>$hash_password
        ];

        $result=AuthHelper::resetPassword($data);

        if($result){
            NotificationHelper::success('reset-password', 'Đặt lại mật khẩu thành công');
            unset($_SESSION['reset_password']);
            header('location: /login');
        }else{
            NotificationHelper::error('reset-password', 'Đặt lại mật khẩu thất bại');
            header('location: /reset-password');
            
        }
    }


    public static function cart()
    {
        
        header::render();
        Notification::render();
        NotificationHelper::unset();
        Cart::render();
        Footer::render();
        // Kiểm tra nếu ID là số
        
    }
    
}