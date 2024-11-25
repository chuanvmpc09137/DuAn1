<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class ChangePassword extends BaseView
{

    public static function render($data = null)
    {

?>
        <!-- code giao dien -->
        <<div class="container mt-5">
        <div class=" col">
                    <div class="card card-body"  style="margin-bottom: 100px;">
                        <h4 class="text-center text-danger">Đổi mật khẩu</h4>
                        <form action="/change-password" method="post">
                            <input type="hidden" name="method" value="PUT" id="">
                            <div class="form-group">
                                <label for="username">Tên đăng nhập</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" value="<?=$data['username']?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="old_password">Mật khẩu cũ</label>
                                <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Nhập mật khẩu cũ">
                            </div>
                            <div class="form-group">
                                <label for="new_password">Mật khẩu mới</label>
                                <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Nhập mật khẩu mới">
                            </div>
                            <div class="form-group">
                                <label for="re_password">Nhập lại mật khẩu mới</label>
                                <input type="password" name="re_password" id="re_password" class="form-control" placeholder="Nhập lại mật khẩu mới">
                            </div>


                            <button type="reset" class="btn btn-outline-danger">Nhập lại</button>
                            <button type="submit" class="btn btn-outline-info">Cập nhật</button>
                        </form>
                    </div>
                </div>
        </div>
<?php

    }
}
