<?php

namespace App\Views\Admin\Layouts;

use App\Views\BaseView;

class Footer extends BaseView
{
        public static function render($data = null)
        {

?>

                <!-- footer -->
                <!-- ============================================================== -->
                <footer class="footer text-center">
                        Copyright &copy; by Nhóm 3
                </footer>
                <!-- ============================================================== -->
                <!-- End footer -->
                <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Page wrapper  -->
                <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Wrapper -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- All Jquery -->
                <!-- ============================================================== -->
                <script src="<?=APP_URL?>/public/assets/admin/libs/jquery/dist/jquery.min.js"></script>
                <!-- Bootstrap tether Core JavaScript -->
                <script src="<?=APP_URL?>/public/assets/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/extra-libs/sparkline/sparkline.js"></script>
                <!--Wave Effects -->
                <script src="<?=APP_URL?>/public/assets/admin/dist/js/waves.js"></script>
                <!--Menu sidebar -->
                <script src="<?=APP_URL?>/public/assets/admin/dist/js/sidebarmenu.js"></script>
                <!--Custom JavaScript -->
                <script src="<?=APP_URL?>/public/assets/admin/dist/js/custom.min.js"></script>
                <!--This page JavaScript -->
                <!-- <script src="<?=APP_URL?>/public/assets/admin/dist/js/pages/dashboards/dashboard1.js"></script> -->
                <!-- Charts js Files -->
                <script src="<?=APP_URL?>/public/assets/admin/libs/flot/excanvas.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/flot/jquery.flot.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/flot/jquery.flot.pie.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/flot/jquery.flot.time.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/flot/jquery.flot.stack.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/flot/jquery.flot.crosshair.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/dist/js/pages/chart/chart-page-init.js"></script>

                <script src="<?=APP_URL?>/public/assets/admin/extra-libs/multicheck/datatable-checkbox-init.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/extra-libs/multicheck/jquery.multicheck.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/extra-libs/DataTables/datatables.min.js"></script>
                <script>
                        $('#zero_config').DataTable();
                </script>

                <script src="<?=APP_URL?>/public/assets/admin/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/dist/js/pages/mask/mask.init.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/select2/dist/js/select2.full.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/select2/dist/js/select2.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
                <script src="<?=APP_URL?>/public/assets/admin/libs/quill/dist/quill.min.js"></script>

                <script src="/public/assets/admin/assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="/public/assets/admin/assets/js/core/popper.min.js"></script>
    <script src="/public/assets/admin/assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="/public/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="/public/assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="/public/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="/public/assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="/public/assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="/public/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="/public/assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="/public/assets/js/plugin/jsvectormap/world.js"></script>

    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="assets/js/kaiadmin.min.js"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="assets/js/setting-demo.js"></script>
    <script src="assets/js/demo.js"></script>
    <script>
      $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
      });

      $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
      });

      $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
      });
    </script>


                </script>


                </body>

                </html>
<?php
        }
}

?>