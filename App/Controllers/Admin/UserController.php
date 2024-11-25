<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\User;
use App\Validations\UserValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\User\Create;
use App\Views\Admin\Pages\User\Edit;
use App\Views\Admin\Pages\User\Index;
use PgSql\Result;

class UserController
{


    // hiển thị danh sách
    public static function index()
    {

        $user = new User();
        $data = $user->getAllUser();
        // echo '<pre>';
        // var_dump($data);

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị giao diện danh sách
        Index::render($data);
        Footer::render();
    }


    // hiển thị giao diện form thêm
    public static function create()
    {
        // var_dump($_SESSION);
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form thêm
        Create::render();
        Footer::render();
    }


    // xử lý chức năng thêm
    public static function store()
    {
        // validation các trường dữ liệu

        $is_valid = UserValidation::create();

        if (!$is_valid) {
            NotificationHelper::error('store', 'thêm người dùng thất bại');
            header('location: /admin/users/create');
            exit();
        }

        $username = $_POST['username'];
        // $status = $_POST['status'];
        //    kiểm tra tên đăng nhập có tồn tại chưa => ko được trùng tên

        $user = new User();
        $is_exist = $user->getOneUserByUsername($username);

        if ($is_exist) {
            NotificationHelper::error('store', 'Tên người dùng đã tồn tại');
            header('location: /admin/users/create');
            exit();
        }

        // thực hiện thêm
        $data = [
            'username' => $username,
            'email' => $_POST['email'],
            'name' => $_POST['name'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'status' => $_POST['status'],


        ];

        $is_upload = UserValidation::uploadAvatar();
        if ($is_upload) {
            $data['avatar'] = $is_upload;
        }

        $Result = $user->createUser($data);
        if ($Result) {
            NotificationHelper::success('store', 'Thêm người dùng thành công');
            header('location: /admin/users');
            exit();
        } else {
            NotificationHelper::error('store', 'Thêm người dùng thất bại');
            header('location: /admin/users/create');
            exit();
        }
    }


    // // hiển thị chi tiết
    // public static function show()
    // {
    // }


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {

        $user = new User();
        $data = $user->getOneUser($id);

        if (!$data) {
            NotificationHelper::error('edit', 'Người dùng không tồn tại');
            header('location: /admin/users');
            exit();
        }
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form sửa
        Edit::render($data);
        Footer::render();

    }


    // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        // echo 'Thực hiện cập nhật vào database';

        $is_valid = UserValidation::edit();

        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật  người dùng thất bại');
            header("location: /admin/users/$id");
            exit();
        }

        $user = new User();

        // thực hiện Cập nhật




        $data = [
            'email' => $_POST['email'],
            'name' => $_POST['name'],
            'status' => $_POST['status'],
        ];

        if ($_POST['password'] !== '') {
            $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }

        $is_upload = UserValidation::uploadAvatar();
        if ($is_upload) {
            $data['avatar'] = $is_upload;
        }


        $Result = $user->updateUser($id, $data);
        if ($Result) {
            NotificationHelper::success('update', 'Cập nhật sản phẩm thành công');
            header('location: /admin/users');
            exit();
        } else {
            NotificationHelper::error('update', 'Cập nhật người dùng thất bại');
            header("location: /admin/users/$id");
            exit();
        }
    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        $user =new User();
        $result=$user->deleteUser($id);
        if($result){
            NotificationHelper::success('delete', 'Xóa người dùng thành công');
            header('location: /admin/users');
            exit();
        }else{
            NotificationHelper::error('delete', 'Xóa người dùng thất bại');
            header('location: /admin/users');
            exit();
        }

    }
}
