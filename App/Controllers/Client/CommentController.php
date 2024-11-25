<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Models\Comment;
use App\Models\User;
use App\Validations\CommentValidation;
use PgSql\Result;

class CommentController
{



    // xử lý chức năng thêm
    public static function store()
    {
        // validation các trường dữ liệu

        $is_valid = CommentValidation::createClient();

        if (!$is_valid) {
            NotificationHelper::error('store', 'thêm bình luận thất bại');
            if(isset($_POST['product_id'])&& $_POST['product_id']){
                $product_id=$_POST['product_id'];
                header("location: /products/$product_id");
            }else{
                header("location: /admin/products");
            }
          

            exit();
        }
        $product_id=$_POST['product_id'];
        $data=[
            'content' => $_POST['content'],
            'product_id' => $product_id,
            'user_id' => $_POST['user_id'],
        ];

        $comment = new Comment();
        $Result=$comment->createComment($data);

        if ($Result) {
            NotificationHelper::success('store', 'Thêm bình luận thành công');
        }
        else {
            NotificationHelper::error('store', 'Thêm bình luận thất bại');
        }
        header("location: products/$product_id");
    }



    // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        // echo 'Thực hiện cập nhật vào database';

        $is_valid = CommentValidation::editClient();

        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật  bình luận thất bại');
            if(isset($_POST['product_id'])&& $_POST['product_id']){
                $product_id=$_POST['product_id'];
                header("location: /products/$product_id");
            }else{
                header("location:/products");
            }
            exit();
        }



        $data=[
            'content' => $_POST['content']
        ];

        $comment = new Comment();

        $Result=$comment->updateComment($id,$data);
        if ($Result) {
            NotificationHelper::success('update', 'Cập nhật sản phẩm thành công');
        }
        else {
            NotificationHelper::error('update', 'Cập nhật bình luận thất bại');
        }

        if(isset($_POST['product_id'])&& $_POST['product_id']){
            $product_id=$_POST['product_id'];
            header("location: /products/$product_id");
        }else{
            header("location: /products");
        }
    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        $comment =new Comment();
        $result=$comment->deleteComment($id);
        if($result){
            NotificationHelper::success('delete', 'Xóa bình luận thành công');
          
        }else{
            NotificationHelper::error('delete', 'Xóa bình luận thất bại');
            
        }
        if(isset($_POST['product_id'])&& $_POST['product_id']){
            $product_id=$_POST['product_id'];
            header("location: /products/$product_id");
        }else{
            header("location: /products");
        }

    }
}
