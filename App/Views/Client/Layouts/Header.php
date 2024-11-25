<?php

namespace App\Views\Client\Layouts;

use App\Helpers\AuthHelper;
use App\Views\BaseView;

class Header extends BaseView
{
    public static function render($data = null)
    {
        $is_login = AuthHelper::checklogin();
        $username = $is_login ? $_SESSION['user']['username'] : 'Tài Khoản';
        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Royal Noir</title>
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
                integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
            <link rel="stylesheet" href="<?= APP_URL ?>/public/assets/client/css/style.css">

            <!-- Google Web Fonts -->
            <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

            <!-- Icon Font Stylesheet -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

            <!-- Libraries Stylesheet -->
            <link href="/public/lib/animate/animate.min.css" rel="stylesheet">
            <link href="/public/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
            <link href="/public/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

            <!-- Customized Bootstrap Stylesheet -->
            <link href="/public/css/bootstrap.min.css" rel="stylesheet">

            <!-- Template Stylesheet -->
            <link href="/public/css/style.css" rel="stylesheet">
        </head>

        <body>

            <!-- Spinner Start -->
            <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <!-- Spinner End -->

            <!-- Navbar & Hero Start -->
            <div class="container-xxl position-relative p-0">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                    <a href="/" class="navbar-brand p-0">
                        <h1 class="text-primary m-0"></i>Royal Noir</h1>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto py-0 pe-4">
                            <a href="/" class="nav-item nav-link active">Trang chủ</a>
                            <a href="/products" class="nav-item nav-link">Sản phẩm</a>
                            <a href="#" class="nav-item nav-link">Giỏ hàng</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Menu</a>
                                <div class="dropdown-menu m-0">
                                    <a class="dropdown-item" href="/products">Tất cả</a>
                                    <?php if (!empty($data)) : ?>
                                        <?php foreach ($data as $item) : ?>
                                            <a class="dropdown-item" href="/products/categories/<?= $item['id'] ?>"><?= $item['name'] ?></a>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <span class="dropdown-item">Không có dữ liệu</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="nav-item dropdown">
                            <a class="btn btn-primary py-2 px-4" href="" role="button" id="dropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= $username ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <?php if ($is_login) : ?>
                                    <a class="dropdown-item" href="/users/<?= $_SESSION['user']['id'] ?>"><?= $_SESSION['user']['username'] ?></a>
                                    <a class="dropdown-item" href="/change-password">Đổi mật khẩu</a>
                                    <a class="dropdown-item" href="/logout">Đăng xuất</a>
                                <?php else : ?>
                                    <a class="dropdown-item" href="/login">Đăng nhập</a>
                                    <a class="dropdown-item" href="/register">Đăng ký</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </nav>

                <div class="container-xxl py-5 bg-dark hero-header mb-5">
                    <div class="container my-5 py-5">
                        <div class="row align-items-center g-5">
                            <div class="col-lg-6 text-center text-lg-start">
                                <h1 class="display-3 text-white animated slideInLeft">Thưởng <br> thức những loại rượu của chúng tôi</h1>
                                <p class="text-white animated slideInLeft mb-4 pb-2">Thưởng thức những loại rượu tuyệt vời cùng chúng tôi. Chúng tôi cam kết mang đến cho bạn trải nghiệm tốt nhất.</p>
                                <a href="" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Mua ngay</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

        <?php
    }
}
?>
