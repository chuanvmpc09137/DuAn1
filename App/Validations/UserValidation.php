<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class UserValidation
{
    public static function create(): bool
    {
        // tên loại sản phẩm
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

        //    Họ và tên
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Không để trống họ và tên');
            $is_valid = false;
        }
        // Trạng thái
        if (!isset($_POST['status']) || $_POST['status'] === '') {
            NotificationHelper::error('status', 'Không để trống Trạng thái');
            $is_valid = false;
        }


        return $is_valid;
    }

    public static function edit(): bool
    {
        $is_valid = true;


        if (isset($_POST['password']) && $_POST['password'] !== '') {

            if (strlen($_POST['password']) < 3) {
                NotificationHelper::error('password', 'mật khẩu ít nhất 3 ký tự');
                $is_valid = false;
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

        //    Họ và tên
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Không để trống họ và tên');
            $is_valid = false;
        }
        // Trạng thái
        if (!isset($_POST['status']) || $_POST['status'] === '') {
            NotificationHelper::error('status', 'Không để trống Trạng thái');
            $is_valid = false;
        }

        return $is_valid;
    }

    public static function uploadAvatar()
    {
        return AuthValidation::uploadAvatar();
    }
}