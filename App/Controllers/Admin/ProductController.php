<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Validations\ProductValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Product\Create;
use App\Views\Admin\Pages\Product\Edit;
use App\Views\Admin\Pages\Product\Index;
use PgSql\Result;

class ProductController
{


    // hiển thị danh sách
    public static function index()
    {
        // giả sử data là mảng dữ liệu lấy được từ database
        // $data = [
        //     [
        //         'id' => 1,
        //         'name' => 'Product 1',
        //         'status' => 1
        //     ],
        //     [
        //         'id' => 2,
        //         'name' => 'Product 2',
        //         'status' => 1
        //     ],
        //     [
        //         'id' => 3,
        //         'name' => 'Product 3',
        //         'status' => 0
        //     ],

        // ];

        $Product = new Product();
        $data = $Product->getAllProductJoinCategory();
        // echo"<pre>";
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
        $category = new Category();
        $data = $category->getAllCategory();
        //  var_dump($data);
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form thêm
        Create::render($data);
        Footer::render();
    }


    // xử lý chức năng thêm
    public static function store()
    {
        // validation các trường dữ liệu

        $is_valid = ProductValidation::create();

        if (!$is_valid) {
            NotificationHelper::error('store', 'thêm sản phẩm thất bại');
            header('location: /admin/products/create');
            exit();
        }

        $name = $_POST['name'];
        //    kiểm tra tên sản phẩm có tồn tại chưa => ko được trùng tên

        $Product = new Product();
        $is_exist = $Product->getOneProductByName($name);

        if ($is_exist) {
            NotificationHelper::error('store', 'Tên sản phẩm đã tồn tại');
            header('location: /admin/products/create');
            exit();
        }

        // thực hiện thêm
        $data = [
            'name' => $name,
            'price' => $_POST['price'],
            'discount_price' => $_POST['discount_price'],
            'description' => $_POST['description'],
            'is_feature' => $_POST['is_feature'],
            'status' => $_POST['status'],
            'category_id' => $_POST['category_id'],
        ];
        $is_upload = ProductValidation::uploadImage();
        if ($is_upload) {
            $data['image'] = $is_upload;
        }


        $Result = $Product->createProduct($data);
        if ($Result) {
            NotificationHelper::success('store', 'Thêm sản phẩm thành công');
            header('location: /admin/products');
            exit();
        } else {
            NotificationHelper::error('store', 'Thêm sản phẩm thất bại');
            header('location: /admin/products/create');
            exit();
        }
    }


    // hiển thị chi tiết
    public static function show()
    {
    }


    // // hiển thị giao diện form sửa
    public static function edit(int $id)
    {
        // giả sử data là mảng dữ liệu lấy được từ database
        // $data = [
        //     'id' => $id,
        //     'name' => 'Product 1',
        //     'status' => 1
        // ];
        $Product = new Product();
        $data_product = $Product->getOneProduct($id);

        $category=new Category();
        $data_category = $category->getAllCategory();

        if (!$data_product) {
            NotificationHelper::error('edit', 'Loại sản phẩm không tồn tại');
            header('location: /admin/products');
            exit();
        }

        $data=[
            'product' => $data_product,
            'category' => $data_category,
        ];

        // echo '<pre>';
        // var_dump($data);

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form sửa
        Edit::render($data);
        Footer::render();

        //     // if ($data) {
        //     //     Header::render();
        //     //     // hiển thị form sửa
        //     //     Edit::render($data);
        //     //     Footer::render();
        //     // } else {
        //     //     header('location: /admin/products');
        //     // }
    }


    // xử lý chức năng sửa (cập nhật)
   // Xử lý chức năng sửa (cập nhật)
public static function update(int $id)
{
    $is_valid = ProductValidation::edit();

    if (!$is_valid) {
        NotificationHelper::error('update', 'Cập nhật sản phẩm thất bại');
        header("location: /admin/products/$id");
        exit();
    }

    $name = $_POST['name'];
    // Kiểm tra tên loại có tồn tại chưa => không được trùng tên

    $Product = new Product();
    $is_exist = $Product->getOneProductByName($name);

    if ($is_exist) {
        if ($is_exist['id'] != $id) {
            NotificationHelper::error('update', 'Tên loại sản phẩm đã tồn tại');
            header("location: /admin/products/$id");
            exit();
        }
    }

    // Thực hiện cập nhật
    $data = [
        'name' => $name,
        'price' => $_POST['price'],
        'discount_price' => $_POST['discount_price'],
        'description' => $_POST['description'],
        'is_feature' => $_POST['is_feature'],
        'status' => $_POST['status'],
        'category_id' => $_POST['category_id'],
    ];

    $is_upload = ProductValidation::uploadImage();
    if ($is_upload) {
        $data['image'] = $is_upload;
    }

    $Result = $Product->updateProduct($id, $data);
    if ($Result) {
        NotificationHelper::success('update', 'Cập nhật sản phẩm thành công');
        header('location: /admin/products');
        exit();
    } else {
        NotificationHelper::error('update', 'Cập nhật loại sản phẩm thất bại');
        header("location: /admin/products/$id");
        exit();
    }
}



    // thực hiện xoá
    public static function delete(int $id)
    {
        $Product = new Product();
        $result = $Product->deleteProduct($id);
        if ($result) {
            NotificationHelper::success('delete', 'Xóa loại sản phẩm thành công');
            header('location: /admin/products');
            exit();
        } else {
            NotificationHelper::error('delete', 'Xóa loại sản phẩm thất bại');
            header('location: /admin/products');
            exit();
        }

    }
}
