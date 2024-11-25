<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class ProductValidation {
    public static function create():bool{
        // tên sản phẩm
        $is_valid = true;
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Không để trống tên loại sản phẩm');
            $is_valid = false;
        }

        // giá sản phẩm
        if (!isset($_POST['price']) || $_POST['price'] === '') {
            NotificationHelper::error('price', 'Không để trống giá sản phẩm');
            $is_valid = false;
        }elseif((int) $_POST['price']<=0) {
                NotificationHelper::error('price', 'Giá sản phẩm phải lớn hơn 0');
                $is_valid = false;
        }

         //giảm giá sản phẩm 
         if (!isset($_POST['discount_price']) || $_POST['discount_price'] === '') {
            NotificationHelper::error('discount_price', 'Không để trống giảm giá sản phẩm');
            $is_valid = false;
        }elseif((int) $_POST['discount_price']<0){
                NotificationHelper::error('discount_price', 'Giảm giá sản phẩm phải lớn hơn 0');
                $is_valid = false;
        }elseif ((int) $_POST['discount_price'] > (int) $_POST['price']){
            NotificationHelper::error('discount_price', 'Giảm giá sản phẩm không thể lớn hơn giá sản phẩm');
            $is_valid = false;
        }


        // id  sản phẩm
        if (!isset($_POST['category_id']) || $_POST['category_id'] === '') {
            NotificationHelper::error('category_id', 'Không để trống id sản phẩm');
            $is_valid = false;
        }
        // nổi bật
        if (!isset($_POST['is_feature']) || $_POST['is_feature'] === '') {
            NotificationHelper::error('is_feature', 'Không để trống  nổi bật');
            $is_valid = false;
        }       
        //trạng thái
        if (!isset($_POST['status']) || $_POST['status'] === '') {
            NotificationHelper::error('status', 'Không để trống  trạng thái');
            $is_valid = false;
        }  

        return $is_valid;
    }

    public static function edit():bool{
        // tên loại sản phẩm
        $is_valid = true;
        

        return self::create() ;
    }

    public static function uploadImage()
    {
        if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
            return false;
        }
        // nơi lưu trữ  hình ảnh trong sourcecode
        $target_dir = 'public/uploads/products/';
        // KIỂM TRA FILE UPLOAD CÓ HỢP LỆ KO
        $imageFileType = strtolower(pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION));

        if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif' && $imageFileType != 'webp') {
            NotificationHelper::error('type_upload', 'chỉ nhận file png jpg gif jpeg');
            return false;
        }
        // thay đổi thêm file thành dạng năm tháng ngày giờ phút giây   
        $nameImage = date('YmdHmi') . '.' . $imageFileType;

        // đường dẫn đầy đủ để di chuyển file
        $target_file = $target_dir . '/' . $nameImage;
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            NotificationHelper::error('upload', 'upload ảnh thất bại');
            return false;
        }
        return $nameImage;
    }
}