<?php

namespace App\Views\Client\Layouts;

use App\Views\BaseView;

class Footer extends BaseView
{
    public static function render($data = null)
    {
        ?>

        <footer class="bg-dark text-white py-4">
            <div class="container text-center">
                <p>&copy; 2024 Royal Noir.Trân trọng được phục vụ quý khách.</p>
                <p>Thiết kế bởi <a href="#" class="text-white">Nhóm 3</a></p>
            </div>
        </footer>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>




        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/public/lib/easing/easing.min.js"></script>
        <script src="/public/lib/wow/wow.min.js"></script>
        <script src="/public/lib/waypoints/waypoints.min.js"></script>
        <script src="/public/lib/counterup/counterup.min.js"></script>
        <script src="/public/lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="/public/lib/tempusdominus/js/moment.min.js"></script>
        <script src="/public/lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="/public/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

        <!-- Template Javascript -->
        <script src="/public/js/main.js"></script>
        </body>

        </html>


        <?php

        // unset($_SESSION['success']);
        // unset($_SESSION['error']);
    }
}

?>