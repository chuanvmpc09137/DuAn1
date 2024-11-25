<?php

namespace App\Helpers;

use App\Models\User;

class AuthHelper
{
    public static function register($data)
    {

        $user = new User();

        $is_exist = $user->getOneUserByUsername($data['username']);



        if ($is_exist) {
            NotificationHelper::error('exist_register', 'Tên đăng nhập đã tồn tại');
            return false;
        }

        $result = $user->createUser($data);

        if ($result) {
            NotificationHelper::success('register', 'Đăng kí thành công');
            return true;
        }
        NotificationHelper::error('register', 'Đăng kí thất bại');
        return false;
    }
    public static function login($data)
    {
        // kiểm tra có tồn tại database => nếu ko:thông báo,trả về false
        $user = new User();
        // băt tồn tại username
        $is_exist = $user->getOneUserByUsername($data['username']);

        if (!$is_exist) {
            NotificationHelper::error('exist_username', 'Tên đăng Không đã tồn tại');
            return false;
        }
        // nếu có:kiểm tra password có trùng không => nếu ko:thông báo ,trả về false
        // password người dùng nhập :$data ['password']
        // password trong cơ sở dữ liệu : $is_exist['password']


        if (!password_verify($data['password'], $is_exist['password'])) {
            NotificationHelper::error('password', 'Mật khẩu không đúng');
            return false;
        }

        if ($is_exist['status'] == 0) {
            NotificationHelper::error('status', 'Tài khoản đăng nhập đã bị khóa');
            return false;
        }
        // nếu có:kiểm tra  status ==0 =>nếu ko:thông báo ,trả về false
        // nếu có :kiểm tra remember=>lưu session/cookie thông báo thành công trả về true

        if ($data['remember']) {
            self::updateCookie($is_exist['id']);
        } else {
            self::updateSession($is_exist['id']);
        }

        NotificationHelper::success('login', 'Đăng nhập thành công');
        return true;
    }
    public static function updateCookie($id)
    {
        $user = new User();
        $result = $user->getOneUser($id);
        if ($result) {
            // lưu cookie,lưu session
            // chuyển array thành string json  để lưu vào cookie user 
            $user_data = json_encode($result);
            // Lưu cookie
            setcookie('user', $user_data, time() + 3600 * 24 * 30 * 12, '/');
            // lưu Session
            $_SESSION['user'] = $result;
        }
    }

    public static function updateSession($id)
    {
        $user = new User();
        $result = $user->getOneUser($id);
        if ($result) {
            // lưu Session
            $_SESSION['user'] = $result;
        }
    }

    public static function checklogin()
    {
        if (isset($_COOKIE['user'])) {
            $user = $_COOKIE['user'];
            $user_data =(array) json_decode($user);


            self::updateCookie($user_data['id']);
            // $_SESSION['user'] = (array) $user_data;

            return true;
        }

        if (isset($_SESSION['user'])) {

            self::updateSession($_SESSION['user']['id']);
            return true;
        }

        return false;
    }

    public static function logout()
    {
        if (isset($_SESSION)) {
            unset($_SESSION['user']);
        }

        if (isset($_COOKIE['user'])) {
            setcookie('user', '', time() - 3600 * 24 * 30 * 12, '/');
        }
    }

    public static function edit($id): bool
    {
        if (!self::checklogin()) {
            NotificationHelper::error('login', 'vui lòng đăng nhập để xem thông tin ');
            return false;
        }
        $data = $_SESSION['user'];
        $user_id = $data['id'];

       


        if ($user_id != $id) {
            NotificationHelper::error('user_id', 'Bạn không có quyền xem,sửa thông tin người khác');
            return false;
        }
        return true;
    }
    public static function update($id, $data)
    {
        $user = new User();
        $result = $user->update($id, $data);

        if (!$result) {
            NotificationHelper::success('update_user', 'Cập nhật thất bại');
            return true;
        }
        if ($_SESSION['user']) {
            self::updateSession($id);
        }

        if ($_COOKIE['user']) {
            self::updateCookie($id);
        }

        NotificationHelper::success('update_user', 'Cập nhật thành công');
        return true;
    }

    public static function changePassword($id, $data){
        // kiểm tra mk cũ có trùng khớp vs csdl 0
        $user = new User();
        $result = $user->getOneUser($id);

        if (!$result) {
            NotificationHelper::error('account', 'Tài khoản không tồn tại');
            return false;
        }
 
        if (!password_verify($data['old_password'], $result['password'])) {
            NotificationHelper::error('password_verify', 'Mật khẩu cũ không đúng');
            return false;
        }

        // mã hóa mk trc khi lưu
        $hash_password =password_hash($data['new_password'], PASSWORD_DEFAULT);

        $data_update = [
            'password' =>$hash_password,
        ];

        $result_update = $user->updateUser($id, $data_update);
        if ($result_update) {
           if(isset($_COOKIE['user'])){
            self::updateCookie($id);
           }

           self::updateSession($id);

           NotificationHelper::success('change-password', 'Thay đổi mật khẩu thành công');
           return true;
        }
        else{
            NotificationHelper::error('change-password', 'Thay đổi mật khẩu thất bại');
            return false;
        }
    }

    public static function forgotPassword($data){
        $user = new User();
        $result = $user->getOneUserByUsername($data['username']);

        return $result;
    }

    public static function resetPassword($data){
        $user = new User();
        $result = $user->updateUserByUsernameAndEmail($data);

        return $result;
    }

    public static function middleware(){
        // var_dump($_SERVER['REQUEST_URI']);

        $admin=explode('/', $_SERVER['REQUEST_URI']);
        // var_dump($admin);

        $admin=$admin[1];
        if($admin=='admin'){
            // if(!isset($_SESSION['user']) || $_SESSION['user']['role'] !=1){
            //     NotificationHelper::error('admin','Tài khoản không có quyền truy cập admin');
            //     header('Location: /login');
            //     exit();
            // }
            if(!isset($_SESSION['user'])){
                NotificationHelper::error('admin','vui lòng đăng nhập');
                header('Location: /login');
                exit();
            }

            if($_SESSION['user']['role'] !=1 ){
                NotificationHelper::error('admin','Tài khoản không có quyền truy cập admin');
                header('Location: /login');
                exit();
            }
        }
    }
}