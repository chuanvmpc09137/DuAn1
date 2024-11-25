<?php

namespace App\Views\Admin\Layouts;

use App\Views\BaseView;

class Header extends BaseView
{
    public static function render($data = null)
    {

?>
        <!-- <!DOCTYPE html>
        <html dir="ltr" lang="en">

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Admin</title>

            <link href="<?= APP_URL ?>/public/assets/admin/libs/flot/css/float-chart.css" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/public/assets/admin/extra-libs/multicheck/multicheck.css">
            <link href="<?= APP_URL ?>/public/assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

            <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/public/assets/admin/libs/select2/dist/css/select2.min.css">
            <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/public/assets/admin/libs/jquery-minicolors/jquery.minicolors.css">
            <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/public/assets/admin/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
            <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/public/assets/admin/libs/quill/dist/quill.snow.css">

            <link href="<?= APP_URL ?>/public/assets/admin/dist/css/style.min.css" rel="stylesheet">

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


        </head>

        <body>
            <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

                <header class="topbar" data-navbarbg="skin5">
                    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                        <div class="navbar-header" data-logobg="skin5">

                            <a class="navbar-brand" href="/admin">
\                                <b class="logo-icon ps-2">

                                    <img src="<?= APP_URL ?>/public/assets/admin/images/logo-icon.png" alt="homepage" class="light-logo" />

                                </b>
                                <span class="logo-text">
                                    <img src="<?= APP_URL ?>/public/assets/admin/images/logo-text.png" alt="homepage" class="light-logo" />

                                </span>
                                
                            </a>

                            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </div>

                        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                            <ul class="navbar-nav float-start me-auto">
                                <li class="nav-item d-none d-lg-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                            </ul>

                            <ul class="navbar-nav float-end">                

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="<?= APP_URL ?>/public/assets/admin/images/users/1.jpg" alt="user" class="rounded-circle" width="31">
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">

                                        <a class="dropdown-item" href="/logout"><i class="fa fa-power-off me-1 ms-1"></i> Đăng xuất</a>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </header>
                <aside class="left-sidebar" data-sidebarbg="skin5">
                    <div class="scroll-sidebar">
                        <nav class="sidebar-nav">
                            <ul id="sidebarnav" class="pt-4">
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Thống kê</span></a>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Loại sản phẩm </span></a>
                                    <ul aria-expanded="false" class="collapse  first-level">
                                        <li class="sidebar-item">
                                            <a href="/admin/categories" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Danh sách </span></a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="/admin/categories/create" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Thêm mới </span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Sản phẩm </span></a>
                                    <ul aria-expanded="false" class="collapse  first-level">
                                        <li class="sidebar-item">
                                            <a href="/admin/products" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Danh sách </span></a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="/admin/products/create" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Thêm mới </span></a>
                                        </li>
                                    </ul>
                                </li>

                                
                                <li class="sidebar-item">
                                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Bình luận </span></a>
                                    <ul aria-expanded="false" class="collapse  first-level">
                                        <li class="sidebar-item">
                                            <a href="/admin/comments" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Danh sách </span></a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Người dùng</span></a>
                                    <ul aria-expanded="false" class="collapse  first-level">
                                        <li class="sidebar-item">
                                            <a href="/admin/users" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Danh sách </span></a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="/admin/users/create" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Thêm mới </span></a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="sidebar-item p-3">
                                    <a href="https://github.com/wrappixel/matrix-admin-lite" target="_blank" class="w-100 btn btn-cyan d-flex align-items-center text-white"><i class="mdi mdi-cloud-download font-20 me-2"></i>Theme</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </aside> -->


                <!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Royal Noir</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="<?= APP_URL ?>/public/assets/admin/assets/img/kaiadmin/favicon.ico"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="<?= APP_URL ?>/public/assets/admin/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["<?= APP_URL ?>/public/assets/admin/assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= APP_URL ?>/public/assets/admin/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= APP_URL ?>/public/assets/admin/assets/css/plugins.min.css" />
    <link rel="stylesheet" href="<?= APP_URL ?>/public/assets/admin/assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="public/assets/admin/assets/css/demo.css" />
    <link href="<?= APP_URL ?>/public/assets/admin/libs/flot/css/float-chart.css" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/public/assets/admin/extra-libs/multicheck/multicheck.css">
            <link href="<?= APP_URL ?>/public/assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

            <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/public/assets/admin/libs/select2/dist/css/select2.min.css">
            <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/public/assets/admin/libs/jquery-minicolors/jquery.minicolors.css">
            <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/public/assets/admin/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
            <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/public/assets/admin/libs/quill/dist/quill.snow.css">

            <link href="<?= APP_URL ?>/public/assets/admin/dist/css/style.min.css" rel="stylesheet">

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="/admin" class="logo">
              <img
                src="public/assets/admin/assets/img/kaiadmin/logo_light.svg"
                alt="navbar brand"
                class="navbar-brand"
                height="20"
              />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">

              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#submenu">
                  <i class="fas fa-bars"></i>
                  <p>Quản lí loại sản phẩm</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="submenu">
                  <ul class="nav nav-collapse">
                    <li>
                      <a data-bs-toggle="collapse" href="/admin/categories">
                        <span class="sub-item">Tất cả loại sản phẩm</span>
                        
                      </a>
                    </li>
                    <li>
                      <a data-bs-toggle="collapse" href="/admin/categories/create">
                        <span class="sub-item">Thêm loại sản phẩm</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#submenu">
                  <i class="fas fa-bars"></i>
                  <p>Quản lí sản phẩm</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="submenu">
                  <ul class="nav nav-collapse">
                    <li>
                      <a data-bs-toggle="collapse" href="/admin/products">
                        <span class="sub-item">Tất cả sản phẩm</span>
                        
                      </a>
                    </li>
                    <li>
                      <a data-bs-toggle="collapse" href="/admin/products/create">
                        <span class="sub-item">Thêm sản phẩm</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#submenu">
                  <i class="fas fa-bars"></i>
                  <p>Quản lí người dùng</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="submenu">
                  <ul class="nav nav-collapse">
                    <li>
                      <a data-bs-toggle="collapse" href="/admin/users">
                        <span class="sub-item">Danh sách người dùng</span>
                        
                      </a>
                    </li>
                    <li>
                      <a data-bs-toggle="collapse" href="/admin/users/create">
                        <span class="sub-item">Thêm người dùng</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#submenu">
                  <i class="fas fa-bars"></i>
                  <p>Quản lí bình luận</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="submenu">
                  <ul class="nav nav-collapse">
                    <li>
                      <a data-bs-toggle="collapse" href="/admin/comments">
                        <span class="sub-item">Tất cả bình luận</span>
                        
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              
            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="index.html" class="logo">
                <img
                  src="public/assets/admin/assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
            <!-- End Logo Header -->
          </div>
          <!-- Navbar Header -->
          <nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
          >
            <div class="container-fluid">
              <nav
                class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"
              >
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pe-1">
                      <i class="fa fa-search search-icon"></i>
                    </button>
                  </div>
                  <input
                    type="text"
                    placeholder="Search ..."
                    class="form-control"
                  />
                </div>
              </nav>

              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li
                  class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none"
                >
                  <a
                    class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-expanded="false"
                    aria-haspopup="true"
                  >
                    <i class="fa fa-search"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-search animated fadeIn">
                    <form class="navbar-left navbar-form nav-search">
                      <div class="input-group">
                        <input
                          type="text"
                          placeholder="Search ..."
                          class="form-control"
                        />
                      </div>
                    </form>
                  </ul>
                </li>

                <li class="nav-item topbar-user dropdown hidden-caret">
                  <a
                    class="dropdown-toggle profile-pic"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false"
                  >
                    <div class="avatar-sm">
                      <img
                        src="<?= APP_URL ?>/public/assets/admin/images/users/1.jpg"
                        alt="..."
                        class="avatar-img rounded-circle"
                      />
                    </div>
                    <span class="profile-username">
                      <span class="op-7">Hi,</span>
                      <span class="fw-bold">hao</span>
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                      <li>
                        <div class="user-box">
                          <div class="avatar-lg">
                            <img
                              src="<?= APP_URL ?>/public/assets/admin/images/users/1.jpg"
                              alt="image profile"
                              class="avatar-img rounded"
                            />
                          </div>
                          <div class="u-text">
                            <h4>Hizrian</h4>
                            <p class="text-muted">hello@example.com</p>
                            
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout">Đăng xuất</a>
                      </li>
                    </div>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>
                

        <?php

    }
}

        ?>