<?php 
$url = $_SERVER['REQUEST_URI'];
$lastSlash = substr(strrchr(rtrim($url, '/'), '/'), 1);
// print_r($lastSlash);
// die();

$sql = "select * from t_pages WHERE rec_id =1";
  $setting2 = $dbMaster->getRowAsAssoc($connect,$sql);


  $title=substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
  if($title=='index.php'){
    $title='Inicio';
  }
  if($title=='register.php'){
    $title='Registrarse';
  }
  if($title=='about.php'){
    $title='Acerca de';
  }
  if($title=='contact.php'){
    $title='Contacto';
  }
  if($title=='auction.php'){
    $title='Auction';
  }
  if($title=='catalog.php' || $title=='catalog-all.php'){
    $title='Catálogo';
  }


?>
<!DOCTYPE html>
<html lang="es">

<head> 
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Subastas Maxilana | <?php echo $title ?></title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <link rel="apple-touch-icon" sizes="57x57" href="https://subastas.maxilana.com/pages/iconlovetohelp.jpg">
  <link rel="apple-touch-icon" sizes="60x60" href="https://subastas.maxilana.com/pages/iconlovetohelp.jpg">
  <link rel="apple-touch-icon" sizes="72x72" href="https://subastas.maxilana.com/pages/iconlovetohelp.jpg">
  <link rel="apple-touch-icon" sizes="76x76" href="https://subastas.maxilana.com/pages/iconlovetohelp.jpg">
  <link rel="apple-touch-icon" sizes="114x114" href="https://subastas.maxilana.com/pages/iconlovetohelp.jpg">
  <link rel="apple-touch-icon" sizes="120x120" href="https://subastas.maxilana.com/pages/iconlovetohelp.jpg">
  <link rel="apple-touch-icon" sizes="144x144" href="https://subastas.maxilana.com/pages/iconlovetohelp.jpg">
  <link rel="apple-touch-icon" sizes="152x152" href="https://subastas.maxilana.com/pages/iconlovetohelp.jpg">
  <link rel="apple-touch-icon" sizes="180x180" href="https://subastas.maxilana.com/pages/iconlovetohelp.jpg">
  <link rel="icon" type="image/png" sizes="192x192" href="https://subastas.maxilana.com/pages/iconlovetohelp.jpg">
  <link rel="icon" type="image/png" sizes="32x32" href="https://subastas.maxilana.com/pages/iconlovetohelp.jpg">
  <link rel="icon" type="image/png" sizes="96x96" href="https://subastas.maxilana.com/pages/iconlovetohelp.jpg">
  <link rel="icon" type="image/png" sizes="16x16" href="https://subastas.maxilana.com/pages/iconlovetohelp.jpg">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->

  <link href="<?php echo ASSETS_URL ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo ASSETS_URL ?>vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?php echo ASSETS_URL ?>vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo ASSETS_URL ?>vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?php echo ASSETS_URL ?>vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo ASSETS_URL ?>vendor/aos/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo ASSETS_URL;?>fontawesome-free/css/all.min.css">


  <!-- Template Main CSS File -->
  <link href="<?php echo ASSETS_URL ?>css/style.css" rel="stylesheet">
  <link href="<?php echo ASSETS_URL ?>css/jquery-confirm.css" rel="stylesheet">
<style>
.blink_me {
  animation: blinker 1s linear infinite;
}
i {
  -webkit-transition-duration: 1s;
  -moz-transition-duration: 1s;
  -o-transition-duration: 1s;
  transition-duration: 1s;
  -webkit-transition-property: -webkit-transform;
  -moz-transition-property: -moz-transform;
  -o-transition-property: -o-transform;
  transition-property: transform;
}
a:hover i{
  -webkit-transform: rotate(360deg);
  -moz-transform: rotate(360deg);
  -o-transform: rotate(360deg);
  transform: rotate(360deg);
}
i:hover {
  -webkit-transform: rotate(360deg);
  -moz-transform: rotate(360deg);
  -o-transform: rotate(360deg);
  transform: rotate(360deg);
}

@keyframes blinker {
  80% {
    opacity: 0;
  }
}
</style>
  <!-- =======================================================
  * Template Name: Flexor - v2.0.0
  * Template URL: https://bootstrapmade.com/flexor-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <script src="<?php echo ASSETS_URL ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo ASSETS_URL ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo ASSETS_URL ?>vendor/jquery/jquery.blockUI.js"></script>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-179170906-1"></script>
  <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-179170906-1');
  </script>


  <!-- Facebook Pixel Code --> 
  <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '371055340598272');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=371055340598272&ev=PageView&noscript=1"
  /></noscript>
<!-- End Facebook Pixel Code -->



  <script type="text/javascript">
  
    function clickit(){
         $("#Spanish").trigger('click');
      }
    window.setTimeout('clickit()',1000);


      function formatDollar(num) {
        if(num != ''){
          var p = num.toFixed(2).split(".");
          return "$" + p[0].split("").reverse().reduce(function(acc, num, i, orig) {
              return  num=="-" ? acc : num + (i && !(i % 3) ? "," : "") + acc;
          }, "") + "." + p[1];
         
        }else{
             return num = '';
        }        
      }

    function showUI(elem){
          if(elem==1){
             $.blockUI({ message: '<img src="<?php echo ASSETS_URL ;?>img/spin.gif" />' ,
              baseZ: 2000,
              css: { width: '4%', border:'0px solid #FFFFFF',cursor:'wait',backgroundColor:'none'},
              overlayCSS:  { backgroundColor: '#fffcfc',opacity:0.9,cursor:'wait'} 
              }); 
          }else{
              $.unblockUI();
          }
      }

      function showMsg(title,contentMsg,type){
          $.alert({
            title:title,
            type:type,
            content:contentMsg
          });
      }

      function confirmOkOnly(type,content,title,link){
          $.confirm({
                title: title,
                type:type,
                content: content,
                autoClose: 'ok|5000',  
                buttons: {
                    ok: function(){
                        if(link!=""){
                          showUI(1);
                          window.location=link;
                        }
                    }
                }
          });
      }
      function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31 
        && (charCode < 48 || charCode > 57))
        return false;
      } 
  </script>

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <!-- <section id="topbar" class="d-none d-lg-block">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <ul>
          <li><i class="icofont-envelope"></i><a href="mailto:contact@example.com">contact@example.com</a></li>
          <li><i class="icofont-phone"></i> +1 5589 55488 55</li>
          <li><i class="icofont-clock-time icofont-flip-horizontal"></i> Mon-Fri 9am - 5pm</li>
        </ul>

      </div>
      <div class="cta">
        <a href="#about" class="scrollto">Get Started</a>
      </div>
    </div>
  </section>
 -->
  <!-- ======= Header ======= -->

  <header id="header" style="position: relative;">
    <div style="display: none;">
      <div class="translator"></div>
      <div id="google_translate_element" style="position: absolute;"></div>        
    </div>
    <div class="container d-flex">

       <div class="logo mr-auto">
         <!--<h1 class="text-light"><a href=""><span><?php echo PAGE_TITLE ?></span></a></h1>  -->
		 <a href="index.php"><img src="<?php echo ASSETS_URL."img/".$setting2['logo_image'] ?>" alt="AB Logo" style="max-height: 45px;"></a>
        <!-- Uncomment below if you prefer to use an image logo --> 
         <!--<a href="index.html"><img src="<?php echo ASSETS_URL ?>img/logo.png" alt="" class="img-fluid"></a> -->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="<?php echo ($lastSlash == 'new-layout') ? 'active':''; ?>"><a href="index.php">Inicio</a></li>
          <li class="<?php echo ($lastSlash == 'about.php') ? 'active':''; ?>"><a href="about.php?#team">About</a></li>
          <li class="<?php echo ($lastSlash == 'register.php') ? 'active':''; ?>"><a href="register.php?#team">
Registrarse</a></li>
          <li class="<?php echo ($lastSlash == 'contact.php') ? 'active':''; ?>"><a href="contact.php?#team">Contacto</a></li>
          <li class="<?php echo ($lastSlash == 'catalog.php') ? 'active':''; ?>"><a href="catalog-all.php?status=pre-bidding#team"  >Catálogo</a></li>
          <?php if(isset($_SESSION['auction_brodcaster'])): ?>
            <li class="<?php echo ($lastSlash == 'auction.php') ? 'active':''; ?>"><a href="auction.php?#team"><i class="fas fa-gavel"></i>Subasta en vivo</a></li>
            <li class="nav-item dropdown <?php echo ($lastSlash == 'myAccount.php') ? 'active':''; ?>">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <?php echo $_SESSION['auction_brodcaster']['username'] ?> <br>
                 Paleta: <?php echo $_SESSION['auction_brodcaster']['paleta'] ?> 
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" style="color: black;" href="myAccount.php?#team">Mi Cuenta</a>
                <a class="dropdown-item" style="color: black;" href="logout.php">Cerrar sesión</a>
              </div>
            </li>
          <?php else: ?>
            <li class="btn-script-login"><a href="#">Iniciar sesión</a></li>
          <?php endif; ?>
        

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex flex-column justify-content-center align-items-center" style='margin-bottom: -150px; background: url(<?php echo ASSETS_URL."img/".$setting2["center_image"] ?>) center center;background-size:100% 100%'>   
</section><!-- End Hero -->