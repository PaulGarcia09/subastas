
  <main id="main">
        <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg bg-white">
      <div class="container">

        <div class="section-title py-5 px-lg-5">
        </div>
        <div class="row">
        <?php if($exitoso==1):?>
          <div class="col" style="text-align: center;">
            ¡Gracias por confirmar tu asistencia!
          </div>
        <?php else : ?>
          <div class="col" style="text-align: center;">
          <span style='text-align: center;margin: 0 auto;'>Estimado usuario, le informamos que la activación para esta subasta ya concluyó.<br>
                          Le invitamos a registrarse con anticipación en el siguiente evento disponible.<br>
                          Love to help y maxilana le dan las gracias y esperamos  en fecha próxima contar con su participación.<br>
                          Atte.<br><a href='index.php'>subastas.maxilana.com</a><span>
          </div>
        <? endif; ?>
        </div>
      </div>
    </section><!-- End Team Section -->
  </main><!-- End #main -->
  <script type="text/javascript">
  var Ex = parseFloat(<?php echo $exitoso ?>);

if(Ex == 1){
  setInterval('contador()',4000);
}else{
  setInterval('contador()',8000);
}
function contador(){
  location.href ="https://subastas.maxilana.com";
}

</script>




