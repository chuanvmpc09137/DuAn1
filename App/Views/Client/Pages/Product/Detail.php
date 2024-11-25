<?php

namespace App\Views\Client\Pages\Product;

use App\Helpers\AuthHelper;
use App\Views\BaseView;

class Detail extends BaseView
{
    public static function render($data = null)
    {
        $is_login = AuthHelper::checkLogin();
        ?>

        <!-- <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?= APP_URL ?>/public/uploads/products/<?= htmlspecialchars($data['product']['image']) ?>" alt=""
                        width="100%">
                </div>
                <div class="col-md-6">
                    <h5><?= htmlspecialchars($data['product']['name']) ?></h5>
                    <p><?= htmlspecialchars($data['product']['description']) ?></p>
                    <?php if ($data['product']['discount_price'] > 0): ?>
                        <h6>Giá gốc: <strike><?= number_format($data['product']['price']) ?> đ</strike></h6>
                        <h6>Giá giảm: <strong
                                class="text-danger"><?= number_format($data['product']['price'] - $data['product']['discount_price']) ?>
                                đ</strong></h6>
                    <?php else: ?>
                        <h6>Giá tiền: <?= number_format($data['product']['price']) ?> đ</h6>
                    <?php endif; ?>
                    <h6>Số lượt xem :<?=$data['product']['view']?></h6>
                    <h6>Danh mục: <?= htmlspecialchars($data['product']['category_name']) ?></h6>
                    <form action="#" method="post">
                        <input type="hidden" name="method" value="POST">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($data['product']['id']) ?>" required>
                        <button type="submit" class="btn btn-sm btn-outline-success">Thêm vào giỏ hàng</button>
                    </form>
                </div>
            </div>

            <div class="row d-flex justify-content-center mt-100 mb-100">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="card-title">Bình luận mới nhất</h4>
                        </div>
                        <div class="comment-widgets">
                            <?php if (isset($data['comments']) && $data['comments']): ?>
                                <?php foreach ($data['comments'] as $item): ?>
                                    <div class="d-flex flex-row comment-row m-t-0">
                                        <div class="p-2">
                                            <?php if ($item['avatar']): ?>
                                                <img src="<?= APP_URL ?>/public/uploads/users/<?= htmlspecialchars($item['avatar']) ?>"
                                                    alt="user" width="50" class="rounded-circle">
                                            <?php else: ?>
                                                <img src="<?= APP_URL ?>/public/uploads/users/admin.jpg" alt="user" width="50"
                                                    class="rounded-circle">
                                            <?php endif; ?>
                                        </div>
                                        <div class="comment-text w-100">
                                            <h6 class="font-medium"><?= htmlspecialchars($item['name']) ?> -
                                                <?= htmlspecialchars($item['username']) ?>
                                            </h6>
                                            <span class="m-b-15 d-block"><?= htmlspecialchars($item['content']) ?></span>
                                            <div class="comment-footer">
                                                <span class="text-muted float-right"><?= htmlspecialchars($item['date']) ?></span>
                                                <?php
                                                if (isset($data) && $is_login && ($_SESSION['user']['id'] == $item['user_id'])):
                                                    ?>

                                                    <button type="button" class="btn btn-cyan btn-sm" data-toggle="collapse"
                                                        data-target="#comment-<?= htmlspecialchars($item['id']) ?>" aria-expanded="false" aria-controls="comment-<?= htmlspecialchars($item['id']) ?>">Sửa</button>
                                                    <form action="/comments/<?=$item['id']?>" method="post" onsubmit="return confirm('Chắc chưa?')"
                                                        style="display: inline-block">
                                                        <input type="hidden" name="method" value="DELETE">
                                                        <input type="hidden" name="product_id"
                                                            value="<?= htmlspecialchars($data['product']['id']) ?>">
                                                        <button type="submit" class="btn btn-danger btn-sm">Xoá</button>
                                                    </form>
                                                    <div class="collapse"
                                                        id="comment-<?= htmlspecialchars($item['id']) ?>">
                                                        <div class="card card-body mt-5">
                                                            <form action="/comments/<?=$item['id']?>" method="post">
                                                                <input type="hidden" name="method" value="PUT">
                                                                <input type="hidden" name="product_id" value="<?= htmlspecialchars($data['product']['id']) ?>">
                                                                <div class="form-group">
                                                                    <label for="comment-content">Bình luận</label>
                                                                    <textarea class="form-control rounded-0" name="content" rows="3"
                                                                        placeholder="Nhập bình luận..."><?= htmlspecialchars($item['content']) ?></textarea>
                                                                </div>
                                                                <div class="comment-footer">
                                                                    <button type="submit" class="btn btn-cyan btn-sm">Gửi</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <?php
                                                endif;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>


                                <h6 class="text-center text-danger">Chưa có bình luận</h6>


                            <?php endif; ?>



                            <?php if (isset($data) && $is_login): ?>


                                <div class="d-flex flex-row comment-row">
                                    <div class="p-2">
                                        <?php if ($_SESSION['user']['avatar']): ?>
                                            <img src="<?= APP_URL ?>/public/uploads/users/<?= htmlspecialchars($_SESSION['user']['avatar']) ?>"
                                                alt="user" width="50" class="rounded-circle">
                                        <?php else: ?>
                                            <img src="<?= APP_URL ?>/public/uploads/users/admin.jpg" alt="user" width="50"
                                                class="rounded-circle">
                                        <?php endif; ?>
                                    </div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium"><?=$_SESSION['user']['name']?> - <?=$_SESSION['user']['username']?></h6>
                                        <form action="/comments" method="post">
                                            <input type="hidden" name="method" value="POST" required>
                                            <input type="hidden" name="product_id" id="product_id" value="<?=$data['product']['id']?>">
                                            <input type="hidden" name="user_id" id="user_id" value="<?=$_SESSION['user']['id']?>">

                                            <div class="form-group">
                                                <label for="content">Bình luận</label>
                                                <textarea class="form-control rounded-0" name="content" id="content"
                                                    rows="3" placeholder="Nhập bình luận..."></textarea>
                                            </div>
                                            <div class="comment-footer">
                                                <button type="submit" class="btn btn-cyan btn-sm">Gửi</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php else: ?>
                                <h6 class="text-center text-danger">Vui lòng đăng nhập để bình luận</h6>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->


        <section class="product-detail section-padding mb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="product-thumb">
                                <img src="<?= APP_URL ?>/public/uploads/products/<?= htmlspecialchars($data['product']['image']) ?>" class="img-fluid product-image" alt="">
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="product-info d-flex">
                                <div>
                                    <h2 class="product-title mb-0"><?= htmlspecialchars($data['product']['name']) ?></h2>
                                    
                                </div>
                            </div>

                            <div class="product-description">

                                <strong class="d-block mt-4 mb-2">Description</strong>

                                <p class="lead mb-5"><?= htmlspecialchars($data['product']['discription']) ?></p>
                            </div>

                            <p> Giá: <?= number_format($data['product']['price']) ?> đ</p>

                            <div class="product-cart-thumb row">
                                <div class="col-lg-6 col-12">
                                    
                                    <select class="form-select cart-form-select" id="inputGroupSelect01">
                                        <option selected>Dung tích</option>
                                        <option value="1">240ml</option>
                                        <option value="2">320ml</option>
                                        <option value="3">350ml</option>
                                        
                                    </select>
                                </div>

                                <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                                    <button type="submit" class="btn custom-btn cart-btn" data-bs-toggle="modal" data-bs-target="#cart-modal">Add to Cart</button>
                                </div>  
                            </div>

                        </div>

                    </div>
                </div>
            </section>

            <div class="row d-flex justify-content-center mt-100 mb-100">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="card-title">Bình luận mới nhất</h4>
                        </div>
                        <div class="comment-widgets">
                            <?php if (isset($data['comments']) && $data['comments']): ?>
                                <?php foreach ($data['comments'] as $item): ?>
                                    <div class="d-flex flex-row comment-row m-t-0">
                                        <div class="p-2">
                                            <?php if ($item['avatar']): ?>
                                                <img src="<?= APP_URL ?>/public/uploads/users/<?= htmlspecialchars($item['avatar']) ?>"
                                                    alt="user" width="50" class="rounded-circle">
                                            <?php else: ?>
                                                <img src="<?= APP_URL ?>/public/uploads/users/admin.jpg" alt="user" width="50"
                                                    class="rounded-circle">
                                            <?php endif; ?>
                                        </div>
                                        <div class="comment-text w-100 mb-2">
                                            <h6 class="font-medium"><?= htmlspecialchars($item['name']) ?> -
                                                <?= htmlspecialchars($item['username']) ?>
                                            </h6>
                                            <span class="m-b-15 d-block"><?= htmlspecialchars($item['content']) ?></span>
                                            <div class="comment-footer">
                                                <span class="text-muted float-right"><?= htmlspecialchars($item['date']) ?></span>
                                                <?php
                                                if (isset($data) && $is_login && ($_SESSION['user']['id'] == $item['user_id'])):
                                                    ?>

                                                    <button type="button" class="btn btn-cyan btn-sm" data-toggle="collapse"
                                                        data-target="#comment-<?= htmlspecialchars($item['id']) ?>" aria-expanded="false" aria-controls="comment-<?= htmlspecialchars($item['id']) ?>">Sửa</button>
                                                    <form action="/comments/<?=$item['id']?>" method="post" onsubmit="return confirm('Chắc chưa?')"
                                                        style="display: inline-block">
                                                        <input type="hidden" name="method" value="DELETE">
                                                        <input type="hidden" name="product_id"
                                                            value="<?= htmlspecialchars($data['product']['id']) ?>">
                                                        <button type="submit" class="btn btn-danger btn-sm">Xoá</button>
                                                    </form>
                                                    <div class="collapse"
                                                        id="comment-<?= htmlspecialchars($item['id']) ?>">
                                                        <div class="card card-body mt-5">
                                                            <form action="/comments/<?=$item['id']?>" method="post">
                                                                <input type="hidden" name="method" value="PUT">
                                                                <input type="hidden" name="product_id" value="<?= htmlspecialchars($data['product']['id']) ?>">
                                                                <div class="form-group">
                                                                    <label for="comment-content">Bình luận</label>
                                                                    <textarea class="form-control rounded-0" name="content" rows="3"
                                                                        placeholder="Nhập bình luận..."><?= htmlspecialchars($item['content']) ?></textarea>
                                                                </div>
                                                                <div class="comment-footer">
                                                                    <button type="submit" class="btn btn-cyan btn-sm">Gửi</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <?php
                                                endif;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>


                                <h6 class="text-center text-danger">Chưa có bình luận</h6>


                            <?php endif; ?>



                            <?php if (isset($data) && $is_login): ?>


                                <div class="d-flex flex-row comment-row">
                                    <div class="p-2">
                                        <?php if ($_SESSION['user']['avatar']): ?>
                                            <img src="<?= APP_URL ?>/public/uploads/users/<?= htmlspecialchars($_SESSION['user']['avatar']) ?>"
                                                alt="user" width="50" class="rounded-circle">
                                        <?php else: ?>
                                            <img src="<?= APP_URL ?>/public/uploads/users/admin.jpg" alt="user" width="50"
                                                class="rounded-circle">
                                        <?php endif; ?>
                                    </div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium"><?=$_SESSION['user']['name']?> - <?=$_SESSION['user']['username']?></h6>
                                        <form action="/comments" method="post">
                                            <input type="hidden" name="method" value="POST" required>
                                            <input type="hidden" name="product_id" id="product_id" value="<?=$data['product']['id']?>">
                                            <input type="hidden" name="user_id" id="user_id" value="<?=$_SESSION['user']['id']?>">

                                            <div class="form-group">
                                                <label for="content">Bình luận</label>
                                                <textarea class="form-control rounded-0" name="content" id="content"
                                                    rows="3" placeholder="Nhập bình luận..."></textarea>
                                            </div>
                                            <div class="comment-footer">
                                                <button type="submit" class="btn btn-cyan btn-sm">Gửi</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php else: ?>
                                <h6 class="text-center text-danger">Vui lòng đăng nhập để bình luận</h6>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php
    }
}
?>
