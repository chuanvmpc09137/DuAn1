<?php

namespace App\Views\Admin;

use App\Views\BaseView;

class Home extends BaseView
{
    public static function render($data = null)
    {

        ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Thống kê</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-account-box"></i><?= $data['total_user'] ?>
                                </h1>
                                <h6 class="text-white">Người dùng</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-receipt"></i><?= $data['total_category'] ?>
                                </h1>
                                <h6 class="text-white">Loại sản phẩm</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-collage"></i><?= $data['total_product'] ?>
                                </h1>
                                <h6 class="text-white">Sản phẩm</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-wechat"></i><?= $data['total_comment'] ?>
                                </h1>
                                <h6 class="text-white">Bình luận</h6>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-body">
                                    <h4 class="card-title">Thống kê sản phẩm theo loại</h4>
                                </div>
                                <canvas id="product_by_category"></canvas>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-body">
                                    <h4 class="card-title">Thống kê 5 sản phẩm được bình luận nhiều nhất</h4>
                                </div>
                                <canvas id="comment_by_product"></canvas>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->

            <script>
                function productByCategoryChart() {

                    var php_data = <?= json_encode($data['product_by_category']) ?>;
                    console.log(php_data);
                    var labels = [];
                    var data = [];
                    for (let i of php_data) {
                        labels.push(i.name);
                        data.push(i.count);
                    }



                    const ctx = document.getElementById('product_by_category');


                    new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'loại sản phẩm',
                                data: data,
                                borderWidth: 1
                            }]
                        }
                    });
                }
                function commentByProductChart() {



                    var php_data = <?= json_encode($data['comment_by_product']) ?>;
                    console.log(php_data);
                    var labels = [];
                    var data = [];
                    for (let i of php_data) {
                        labels.push(i.name);
                        data.push(i.count);
                    }

                    const ctx = document.getElementById('comment_by_product');

                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'số lượng bình luận',
                                data: data,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                }
                productByCategoryChart();
                commentByProductChart();
            </script>
            <?php

    }
}

?>