<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Register extends BaseView
{
    public static function render($data = null)
    {
        ?>

        <!-- <div class="container mt-3">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="card card-body"  style="margin-bottom: 100px;">
                        <h4 class="text-center text-danger">Đăng Ký</h4>
                        <form action="/register" method="post">
                            <input type="hidden" name="method" value="POST" id="">
                            <div class="form-group">
                                <label for="username">Tên Đăng Nhập</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập">
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu">
                            </div>
                            <div class="form-group">
                                <label for="re_password">Nhập lại mật khẩu</label>
                                <input type="password" name="re_password" id="re_password" class="form-control" placeholder="Nhập lại mật khẩu">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="name">Họ và tên</label>
                                <input type="name" name="name" id="name" class="form-control" placeholder="Nhập họ và tên">
                            </div>
                            <button type="reset" class="btn btn-outline-danger">Nhập lại</button>
                            <button type="submit" class="btn btn-outline-info">Đăng ký</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->


        <section class="sign-in-form section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 mx-auto col-12">

                            <h1 class="hero-title text-center mb-5">Đăng ký</h1>

                            <div class="row">
                                <div class="col-lg-8 col-11 mx-auto">
                                    <form action="/register" method="post">
                                    <input type="hidden" name="method" id="" value="POST">

                                        <div class="form-floating">
                                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Nhập email" >

                                            <label for="email">Email</label>
                                        </div>

                                        <div class="form-floating my-4">
                                            <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" >

                                            <label for="username">Tên đăng nhập</label>
                                            
                                        </div>
                                        <div class="form-floating my-4">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Nhập họ và tên" >

                                            <label for="name">Họ và tên</label>
                                            
                                        </div>

                                        <div class="form-floating my-4">
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu" >

                                            <label for="password">Mật khẩu</label>
                                            
                                        </div>

                                        <div class="form-floating">
                                            <input type="password" name="re_password" id="re_password" class="form-control" placeholder="Nhập lại mật khẩu" >

                                            <label for="re_password">Nhập lại mật khẩu</label>
                                        </div>

                                        <button type="submit" class="btn custom-btn form-control mt-4 mb-3">
                                            Đăng ký
                                        </button>

                                        <p class="text-center">Đã có tài khoản <a href="/login">Đăng nhập ngay</a></p>

                                    </form>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </section>

        <?php
    }
}
?>
