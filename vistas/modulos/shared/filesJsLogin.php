  <!--   Core JS Files   -->
  <script src="vistas/assets/js/core/jquery.min.js"></script>
  <script src="vistas/assets/js/core/popper.min.js"></script>
  <script src="vistas/assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="vistas/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Chartist JS -->
  <script src="vistas/assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="vistas/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="vistas/assets/js/material-dashboard.minf066.js?v=2.1.0" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="vistas/assets/demo/demo.js"></script>
  <!-- Sharrre libray -->
  <script src="vistas/assets/demo/jquery.sharrre.js"></script>

  
  <script>
    $(document).ready(function() {
      md.checkFullPageBackgroundImage();
      setTimeout(function() {
        // after 1000 ms we add the class animated to the login/register card
        $('.card').removeClass('card-hidden');
      }, 700);
    });
  </script>