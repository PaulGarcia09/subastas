
  <!-- ======= Footer ======= -->
  <footer id="footer" style="background-color:#f2f5f7;">

    <div class="footer-top" style="background-color:#f2f5f7;">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-contact">
            <h3>Subastas Maxilana</h3>
          </div>

          <div class="col-lg-4 col-md-6 footer-contact">
            <h3>Información</h3>
            <p>
              Donato Guerra #235 Sur Int. 201 C.P. 80200 <br>
              Culiacán, Sinaloa<br>
              México <br><br>
              <strong>Teléfono:</strong> <br> 52 667 759 35 00<br> 52 800 215 15 15<br><br>
              <strong>Email:</strong> <a href="mailto:subastas@maxilana.com">subastas@maxilana.com</a><br>
            </p>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Menú</h4>
            <ul>
            	<li class="active"><i class="bx bx-chevron-right"></i> <a href="<?php echo BASE_URL ?>">Inicio</a></li>
				<li><i class="bx bx-chevron-right"></i> <a href="<?php echo BASE_URL ?>register.php">Registro</a></li>
				<li><i class="bx bx-chevron-right"></i> <a href="<?php echo BASE_URL ?>catalog-all.php?status=pre-bidding#team">Catálogo</a></li>
				<li><i class="bx bx-chevron-right"></i> <a href="<?php echo BASE_URL ?>about.php">Acerca de</a></li>
				<li><i class="bx bx-chevron-right"></i> <a href="<?php echo BASE_URL ?>contact.php">Contacto</a></li>
				<li><i class="bx bx-chevron-right"></i> <a href="<?php echo BASE_URL ?>terms.php">Términos y Condiciones</a></li>
				<!--<li><i class="bx bx-chevron-right"></i> <a href="<?php echo BASE_URL ?>policy.php">Privacy policy</a></li>-->
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-lg-flex py-4">

      <div class="mr-lg-auto text-center text-lg-left">
        <div class="copyright">
          &copy; <?php echo date('Y') ?> Subastas Maxilana
        </div>
      </div>

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <!-- Vendor JS Files -->
  <script src="<?php echo ASSETS_URL ?>vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?php echo ASSETS_URL ?>vendor/php-email-form/validate.js"></script>
  <script src="<?php echo ASSETS_URL ?>vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="<?php echo ASSETS_URL ?>vendor/venobox/venobox.min.js"></script>
  <script src="<?php echo ASSETS_URL ?>vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?php echo ASSETS_URL ?>vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo ASSETS_URL ?>vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo ASSETS_URL ?>js/main.js"></script>
  <script src="<?php echo ASSETS_URL ?>js/jquery-confirm.js"></script>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script> -->
 
 <link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL ?>vendor/translator/styles/jquery.translator.css" />
  <!--  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
  <script type="text/javascript" src="<?php echo ASSETS_URL ?>vendor/translator/javascript/jquery.translator.min.js"></script>
<script>
</script>	
 <script type="text/javascript">

    $.translator.ready(function() {
        $(".translator").translator({
  		targetSelector: "body, head, button, .btn-script-login, a",
  		cookie: false,
      languages: ["es", "en", "fr", "de", "da", "ja", "hi", "it"],
      linkTemplate: '<td><a href="javascript:;" title="{{ name }}" id="{{ name }}" class="{{ language_selector_class }}">{{ content }}</a></td>',
      autoSelect: false
  	  });
    });

  </script> 
</body>

</html>