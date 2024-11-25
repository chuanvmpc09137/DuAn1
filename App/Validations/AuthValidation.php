<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class AuthValidation
{
    public static function register(): bool
    {
        $is_valid = true;
        if (!isset($_POST['username']) || $_POST['username'] === '') {
            NotificationHelper::error('username', 'Không để trống tên đăng nhập');
            $is_valid = false;
        }

        if (!isset($_POST['password']) || $_POST['password'] === '') {
            NotificationHelper::error('password', 'Không để trống password');
            $is_valid = false;
        } else {
            if (strlen($_POST['password']) < 3) {
                NotificationHelper::error('password', 'Mật khẩu phải có ít nhất 3 ký tự');
                $is_valid = false;
            }
        }

        if (!isset($_POST['re_password']) || $_POST['re_password'] === '') {
            NotificationHelper::error('re_password', 'Không để trống nhập lại password');
            $is_valid = false;
        } else {
            if ($_POST['password'] != $_POST['re_password']) {
                NotificationHelper::error('re_password', 'Mật khẩu nhập lại không trùng khớp');
                $is_valid = false;
            }
        }
        if (!isset($_POST['email']) || $_POST['email'] === '') {
            NotificationHelper::error('email', 'vui lòng nhập email');
            $is_valid = false;
        } else {
            $emailPattern = "/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,6}$/i";
            if (!preg_match($emailPattern, $_POST['email'])) {
                NotificationHelper::error('re_password', 'Email không định dạng được');
                $is_valid = false;
            }
        }

        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Không để trống họ và tên');
            $is_valid = false;
        }


        return $is_valid;
    }


    public static function login(): bool
    {
        $is_valid = true;
        if (!isset($_POST['username']) || $_POST['username'] === '') {
            NotificationHelper::error('username', 'Không để trống tên đăng nhập');
            $is_valid = false;
        }

        if (!isset($_POST['password']) || $_POST['password'] === '') {
            NotificationHelper::error('password', 'Không để trống password');
            $is_valid = false;
        }

        return $is_valid;
    }
    public static function edit(): bool
    {
        $is_valid = true;

        if (!isset($_POST['email']) || $_POST['email'] === '') {
            NotificationHelper::error('email', 'vui lòng nhập email');
            $is_valid = false;
        } else {
            $emailPattern = "/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,6}$/i";
            if (!preg_match($emailPattern, $_POST['email'])) {
                NotificationHelper::error('re_password', 'Email không định dạng được');
                $is_valid = false;
            }
        }

        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Không để trống họ và tên');
            $is_valid = false;
        }


        return $is_valid;
    }
    public static function uploadAvatar()
    {
        if (!file_exists($_FILES['avatar']['tmp_name']) || !is_uploaded_file($_FILES['avatar']['tmp_name'])) {
            return false;
        }
        // nơi lưu trữ  hình ảnh trong sourcecode
        $target_dir = 'public/uploads/users';
        // KIỂM TRA FILE UPLOAD CÓ HỢP LỆ KO
        $imageFileType = strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION));

        if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
            NotificationHelper::error('type_upload', 'chỉ nhận file png jpg gif jpeg');
            return false;
        }
        // thay đổi thêm file thành dạng năm tháng ngày giờ phút giây   
        $nameImage = date('YmdHmi') . '.' . $imageFileType;

        // đường dẫn đầy đủ để di chuyển file
        $target_file = $target_dir . '/' . $nameImage;
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file)) {
            NotificationHelper::error('upload', 'upload ảnh thất bại');
            return false;
        }
        return $nameImage;
    }
    public static function changePassword(): bool
    {
        $is_valid = true;
        if (!isset($_POST['old_password']) || $_POST['old_password'] === '') {
            NotificationHelper::error('old_password', 'Không để trống password cũ');
            $is_valid = false;
        }

        if (!isset($_POST['new_password']) || $_POST['password'] === '') {
            NotificationHelper::error('new_password', 'Không để trống password mới');
            $is_valid = false;
        } else if (strlen($_POST['new_password']) < 3) {
            NotificationHelper::error('new_password', 'Mật khẩu mới phải có ít nhất 3 ký tự');
            $is_valid = false;
        }


        if (!isset($_POST['re_password']) || $_POST['re_password'] === '') {
            NotificationHelper::error('re_password', 'Không để trống nhập lại password mới');
            $is_valid = false;
        } else {
            if ($_POST['new_password'] != $_POST['re_password']) {
                NotificationHelper::error('re_password', 'Mật khẩu nhập lại không trùng khớp');
                $is_valid = false;
            }
        }


        return $is_valid;
    }
    public static function forgotPassword(): bool
    {
        $is_valid = true;
        if (!isset($_POST['username']) || $_POST['username'] === '') {
            NotificationHelper::error('username', 'Không để trống tên đăng nhập');
            $is_valid = false;
        }

        if (!isset($_POST['email']) || $_POST['email'] === '') {
            NotificationHelper::error('email', 'vui lòng nhập email');
            $is_valid = false;
        } else {
            $emailPattern = "/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,6}$/i";
            if (!preg_match($emailPattern, $_POST['email'])) {
                NotificationHelper::error('re_password', 'Email không định dạng được');
                $is_valid = false;
            }
        }
        return $is_valid;
    }

    public static function resetPassword(): bool
    {
        $is_valid = true;
         if (!isset($_POST['password']) || $_POST['password'] === '') {
            NotificationHelper::error('password', 'Không để trống password');
            $is_valid = false;
        } else {
            if (strlen($_POST['password']) < 3) {
                NotificationHelper::error('password', 'Mật khẩu phải có ít nhất 3 ký tự');
                $is_valid = false;
            }
        }

        if (!isset($_POST['re_password']) || $_POST['re_password'] === '') {
            NotificationHelper::error('re_password', 'Không để trống nhập lại password');
            $is_valid = false;
        } else {
            if ($_POST['password'] != $_POST['re_password']) {
                NotificationHelper::error('re_password', 'Mật khẩu nhập lại không trùng khớp');
                $is_valid = false;
            }
        }
        return $is_valid;
    }
}
