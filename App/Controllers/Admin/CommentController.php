<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Comment;
use App\Models\User;
use App\Validations\CommentValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Comment\Create;
use App\Views\Admin\Pages\Comment\Edit;
use App\Views\Admin\Pages\Comment\Index;
use PgSql\Result;

class CommentController
{


    // hiển thị danh sách
    public static function index()
    {

        $comment = new Comment();
        $data = $comment->getAllCommentJoinProductAndUser();

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
    }


    // xử lý chức năng thêm
    public static function store()
    {
        
    }


    // hiển thị chi tiết
    public static function show()
    {
    }


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {
        
        $comment = new Comment();
        $data = $comment->getOneCommentJoinProductAndUser($id);


        if(!$data){
            NotificationHelper::error('edit', 'Bình luận không tồn tại');
            header('location: /admin/comments');
            exit();
        }
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form sửa
        Edit::render($data);
        Footer::render();
    }


    // // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        // echo 'Thực hiện cập nhật vào database';

        $is_valid = CommentValidation::edit();

        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật  bình luận thất bại');
            header("location: /admin/comments/$id");
            exit();
        }

        $name = $_POST['name'];
        $status = $_POST['status'];

        $comment = new Comment();

        // thực hiện Cập nhật




        $data=[
           'status' => $status,
        ];


        $Result=$comment->updateComment($id,$data);
        if ($Result) {
            NotificationHelper::success('update', 'Cập nhật sản phẩm thành công');
            header('location: /admin/comments');
            exit();
        }
        else {
            NotificationHelper::error('update', 'Cập nhật bình luận thất bại');
            header("location: /admin/comments/$id");
            exit();
        }
    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        $comment =new Comment();
        $result=$comment->deleteComment($id);
        if($result){
            NotificationHelper::success('delete', 'Xóa bình luận thành công');
            header('location: /admin/comments');
            exit();
        }else{
            NotificationHelper::error('delete', 'Xóa bình luận thất bại');
            header('location: /admin/comments');
            exit();
        }

    }
}
