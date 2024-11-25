<?php

namespace App\Views\Client;

use App\Views\BaseView;

class Home extends BaseView
{
    public static function render($data = null)
    {
        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Trang Chủ | Royal Noir</title>
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
            <link rel="stylesheet" href="<?= APP_URL ?>/public/assets/client/css/style.css">

            <!-- Google Web Fonts -->
            <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

            <!-- Icon Font Stylesheet -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

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

            <!-- Header Start -->
            <header class="bg-dark text-white text-center py-5">
                <div class="container">
                    <h1 class="display-4">Chào mừng đến với Royal Noir</h1>
                    <p class="lead">Thưởng thức những loại rượu với không gian sang trọng</p>
                    <a href="/products" class="btn btn-primary btn-lg mt-3">Xem menu</a>
                </div>
            </header>
            <!-- Header End -->

            <!-- Services Start -->
            <section id="services" class="py-5 text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <div class="card border-0 shadow">
                                <img src="/public/img/rouvang.webp" class="card-img-top" alt="Service 1">
                                <div class="card-body">
                                    <h5 class="card-title">Mua rượu vang</h5>
                                    <p class="card-text">Dễ dàng mua rượu vang chỉ với vài cú click chuột.</p>
                                    <a href="#" class="btn btn-outline-primary">Đặt ngay</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="card border-0 shadow">
                                <img src="/public/img/menuruou.jpg" class="card-img-top" alt="Service 2" height="417px">
                                <div class="card-body">
                                    <h5 class="card-title">Meunu Đa Dạng</h5>
                                    <p class="card-text">Tận hưởng rượu đa dạng của chúng tôi.</p>
                                    <a href="/products" class="btn btn-outline-primary">Xem menu ngay</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="card border-0 shadow">
                                <img src="/public/img/about-1.jpg" class="card-img-top" alt="Service 3">
                                <div class="card-body">
                                    <h5 class="card-title">Không Gian Sang Trọng</h5>
                                    <p class="card-text">Thưởng thức rượu trong không gian sang trọng.</p>
                                    <a href="#" class="btn btn-outline-primary">Xem thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Services End -->

            <!-- Menu Start -->
            <section id="menu" class="bg-light py-5">
                <div class="container text-center">
                    <h4 class="display-6">Menu Của Chúng Tôi</h4>
                    <p class="lead">Khám phá các loại rượu của Royal Noir</p>
                    <div class="row">
                        <div class="col-lg-3 mb-4">
                            <div class="card border-0 shadow">
                                <img src="/public/img/ruouuuu.jpg" class="card-img-top" alt="Menu 1" height="400px">
                                <div class="card-body">
                                    <h5 class="card-title">Rượu</h5>
                                    <p class="card-text">Các món khai vị tuyệt vời để bắt đầu bữa ăn.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="card border-0 shadow">
                                <img src="/public/img/ruouvangkhe.webp" class="card-img-top" alt="Menu 1" height="400px">
                                <div class="card-body">
                                    <h5 class="card-title">Rượu vang</h5>
                                    <p class="card-text">Các món khai vị tuyệt vời để bắt đầu bữa ăn.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="card border-0 shadow">
                                <img src="/public/img/douong.jpg" class="card-img-top" alt="Menu 1" height="400px">
                                <div class="card-body">
                                    <h5 class="card-title">Nước uống nhập khẩu</h5>
                                    <p class="card-text">Các loại nước uống tuyệt vời để kết thúc sự mệt mỏi.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="card border-0 shadow">
                                <img src="/public/img/kho muc.jpg" class="card-img-top" alt="Menu 2" height="400px">
                                <div class="card-body">
                                    <h5 class="card-title">Đồ ăn</h5>
                                    <p class="card-text">Những món ăn đặc sắc và đa dạng hòa cùng rượu.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Menu End -->

            <!-- Contact Start -->
            <section id="contact" class="py-5">
                <div class="container text-center">
                    <h2 class="display-6">Liên Hệ Với Chúng Tôi</h2>
                    <p class="lead">Đặt hàng hoặc liên hệ với chúng tôi qua các kênh sau</p>
                    <a href="#" class="btn btn-outline-primary btn-lg">Liên hệ</a>
                </div>
            </section>

        </body>

        </html>

        <?php
    }
}
