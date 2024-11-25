<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Login extends BaseView
{
    public static function render($data = null)
       
    {
        ?>
        <!-- <div class="container mt-5 mb-4 ">
            <div class="row">
                <div class="offset-md-3 col-md-6"  style="margin-bottom: 100px;">
                    <div class="card card-body">
                        <h4 class="text-center text-danger">Đăng nhập</h4>
                        <form action="/login" method="post">
                            <input type="hidden" name="method" id="" value="POST">
                            <div class="form-group">
                                <label for="username">Tên Đăng Nhập</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập">
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu">
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remember" id=""  checked>
                                    Ghi nhớ đăng nhập
                                </label>
                            </div>
                            <button type="reset" class="btn btn-outline-danger">Nhập lại</button>
                            <button type="submit" class="btn btn-outline-info">Đăng nhập</button>

                            <br>

                            <a href="/forgot-password" class="text-danger">Quên mật khẩu?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->


        <section class="sign-in-form section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 mx-auto col-12">

                            <h1 class="hero-title text-center mb-5">Đăng nhập</h1>

                            <div class="row">
                                <div class="col-lg-8 col-11 mx-auto">
                                    <form action="/login" method="post">
                                    <input type="hidden" name="method" id="" value="POST">

                                        <div class="form-floating mb-4 p-0">
                                            <input type="username" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" >

                                            <label for="username">Tên đăng nhập</label>
                                        </div>

                                        <div class="form-floating p-0">
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Mật khẩu" >

                                            <label for="password">Mật khẩu</label>
                                        </div>

                                        <button type="submit" class="btn custom-btn form-control mt-4 mb-3">
                                            Đăng nhập
                                        </button>

                                        <p class="text-center"><a>Chưa có tài khoản?</a><br>
                                        <a href="/forgot-password" class="text-center">Quên mật khẩu?</a>
                                        </p>
                                        

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
