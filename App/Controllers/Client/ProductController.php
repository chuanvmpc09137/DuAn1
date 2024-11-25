<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Helpers\ViewProductHelper;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Product\Category as ProductCategory;
use App\Views\Client\Pages\Product\Detail;
use App\Views\Client\Pages\Product\Index;

class ProductController
{
    // Hiển thị danh sách sản phẩm
    public static function index()
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();

        $product = new Product();
        $products = $product->getAllProductByStatus();

        $data = [
            'products' => $products,
            'categories' => $categories
        ];

        // Truyền dữ liệu danh mục vào Header
        Header::render($categories);  // Truyền $categories vào Header
        Notification::render();
        NotificationHelper::unset();
        Index::render($data);
        Footer::render();
    }

    // Chi tiết sản phẩm
    public static function detail($id)
    {
        $product = new Product();
        $product_detail = $product->getOneProductByStatus($id);

        if (!$product_detail) {
            NotificationHelper::error('product_detail', 'Không thể xem sản phẩm này');
            header('location: /products');
            exit();
        }

        $comments = new Comment();
        $comments = $comments->get5CommentNewestByProductAndStatus($id);

        $data = [
            'product' => $product_detail,
            'comments' => $comments,
        ];

        ViewProductHelper::cookieView($id, $product_detail['view']);
        
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();

        // Truyền dữ liệu danh mục vào Header
        Header::render($categories);  // Truyền $categories vào Header
        Notification::render();
        NotificationHelper::unset();

        Detail::render($data);
        Footer::render();
    }

    // Sản phẩm theo danh mục
    public static function getProductByCategory($id)
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();

        $product = new Product();
        $products = $product->getAllProductByCategoryAndStatus($id);

        $data = [
            'products' => $products,
            'categories' => $categories
        ];

        // Truyền dữ liệu danh mục vào Header
        Header::render($categories);  // Truyền $categories vào Header
        ProductCategory::render($data);
        Footer::render();
    }
}
