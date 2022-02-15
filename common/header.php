<?php 
$url_actual = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
$url = $_SERVER['REQUEST_URI'];
$lastSlash = substr(strrchr(rtrim($url, '/'), '/'), 1);
// print_r($lastSlash);
// die();

$sql = "select * from t_pages WHERE rec_id =1";
  $setting2 = $dbMaster->getRowAsAssoc($connect,$sql);


  $sql = "select * from t_pages WHERE rec_id =1";
  $setting2 = $dbMaster->getRowAsAssoc($connect,$sql);

  $sql ="select * from t_lots where f_status ='1' and f_selected ='1'";
	$result = $dbMaster->getRowAsAssoc($connect,$sql);

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
  if($title=='evento.php'){
    $title='Catálogo de subasta';
  }
  if($title=='lotedetalle.php'){
    $title='Detalle';
  }
  ?>
    <?php
    header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
    header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
    ?>
<!DOCTYPE html>
<html lang="es">

<head> 
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta http-equiv="Expires" content="0">

  <meta http-equiv="Last-Modified" content="0">

  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">

  <meta http-equiv="Pragma" content="no-cache">


  
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
@import url("https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap");

*,
*:after,
*:before {
	box-sizing: border-box;
}

:root {
	--header-outer-height: 110px;
	--header-inner-height: 70px;
	--header-height-difference: calc(
		var(--header-outer-height) - var(--header-inner-height)
	);
	--header-bg: #fff;
}

body {
	font-family: "DM Sans", sans-serif;
	background-color: #f2f5f7;
	line-height: 1.5;
	position: relative;
}

.responsive-wrapper {
	width: 90%;
	max-width: 1280px;
	margin-left: auto;
	margin-right: auto;
}

/* Sticky header */
.header-outer {
	/* Make it stick */
	height: var(--header-outer-height);
	position: sticky;
	top: calc(
		var(--header-height-difference) * -1
	); /* Multiply by -1 to get a negative value */
	display: flex;
	align-items: center;

	/* Other */
	background-color: var(--header-bg);
	box-shadow: 0 2px 10px 0 rgba(0,0,0, 0.1);
}

.header-inner {
	/* Make it stick */
	height: var(--header-inner-height);
	position: sticky;
	top: 0;

	/* Other */
	display: flex;
	align-items: center;
	justify-content: space-between;
}

/* Styling of other elements */
.header-logo img {
	display: block;
	height: calc(var(--header-inner-height) - 30px);
}

.header-navigation {
	display: flex;
	flex-wrap: wrap;
}

.header-navigation a,
.header-navigation button {
	font-size: 1.125rem;
	color: inherit;
	margin-left: 1.75rem;
	position: relative;
	font-weight: 500;
}

.header-navigation a {
	display: none;
	font-size: 1.125rem;
	color: inherit;
	text-decoration: none;
}

.header-navigation button {
	border: 0;
	background-color: transparent;
	padding: 0;
}

.header-navigation a:hover:after,
.header-navigation button:hover:after {
	transform: scalex(1);
}

.header-navigation a:after,
.header-navigation button:after {
	transition: 0.25s ease;
	content: "";
	display: block;
	width: 100%;
	height: 2px;
	background-color: currentcolor;
	transform: scalex(0);
	position: absolute;
	bottom: -2px;
	left: 0;
}

.main {
	margin-top: 3rem;
}

.widget {
	width: 100%;
	max-width: 600px;
	border-radius: 8px;
	box-shadow: 0 15px 30px 0 rgba(0,0,0, 0.1);
	background-color: #fff;
	padding: 2.5rem;
	margin-left: auto;
	margin-right: auto;
	margin-bottom: 2rem;
	font-size: 1.125rem;
}

.widget > * + * {
	margin-top: 1.25em;
}

.widget h2 {
	font-size: 1.5rem;
	font-weight: 700;
	line-height: 1.25;
}

.widget code {
	display: inline-block;
	padding: 0.125em 0.25em;
	border-radius: 2px;
	background-color: #bee5d3;
}

.widget strong {
	font-weight: 700;
}

@media (min-width: 800px) {
	.header-navigation a {
		display: inline-block;
	}

	.header-navigation button {
		display: none;
	}
}
.modal-open .modal, .modal{z-index: 2050;}
.modal {
  text-align: center;
  padding: 0!important;
}
.modal-content{box-shadow: none; border-radius: 0;}
.modal:before {
  content: '';
  display: inline-block;
  height: 100%;
  vertical-align: middle;
  margin-right: -4px;
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}
.login_Modal .modal-dialog{width: 704px;height: 450px;}
.login_Modal .modal-body{padding-right: 0;}
.login_Modal .modal-dialog .modal-content{height: 100%;}
.login_Modal .img_area{width: 260px; display: inline-block;}
.login_form_page.login_Modal {text-align: center;}
.login_Modal .form_area{display: inline-block; vertical-align: middle; width: 421px; position: relative; height: 420px;}
.login_Modal .form_area img.login_popup_logo{width: 244px; height: auto; margin: 0 auto; padding-top: 15px; display: block;}
.login_Modal .form_area .newsltr_text{padding-top: 40px; text-align: center;font-family: sans-serif; font-size: 20px; font-style: italic;display: block;color: #949494;}
.login_Modal .form_area .signup_text{padding-top: 30px; text-align: center;font-family: sans-serif; font-size: 20px; font-style: italic;display: block;color: #949494;position: relative;}
.login_Modal .form_area .signup_text:before{position: absolute;content: '';height: 1px; width:111px;background: #e0e0e0; left: 0; bottom: 10px;}
.login_Modal .form_area .signup_text:after{position: absolute;content: '';height: 1px; width:111px;background: #e0e0e0; right: 0; bottom: 10px;}
.login_Modal .form_area .input_area {max-width: 302px; display: block;margin:0 auto; margin-top: 30px;}
.login_Modal .form_area .input_area input{border: 2px #d9d9d9 solid; font-size: 18px; color: #0e0e0e; width: 100%; box-sizing: border-box; padding: 14px 18px; margin-top: 10px;}
.login_Modal .form_area .input_area input{border: 2px #d9d9d9 solid; font-size: 18px; color: #0e0e0e; width: 100%; box-sizing: border-box; padding: 9px 18px; margin-top: 10px;line-height: 30px;}
.login_Modal .form_area .security_msg{color: #f00; font-family: sans-serif; font-size: 14px;     text-align: center; margin-top: 5px;}
/*Email Verify popup*/
.email_verify .modal-content{box-shadow: none; border:none;}
.email_verify .modal-dialog{width: 603px; height: 500px; border: 1px solid #e1e1e1; text-align: center; background: #fff;}
.email_verify .modal-body{padding: 15px 25px;} 
.email_verify .modal-body h2{line-height: 1; font-weight: 400; padding: 49px 0 20px;font-size: 36px;font-style: italic; font-family: sans-serif;    color: #0e0e0e;}
.email_verify .modal-body h2 span{font-size: 20px;font-style: italic; font-family: sans-serif;color: #0e0e0e;display: block; margin-top: 10px;} 
.email_verify .modal-body .verify_text{font-size: 15px;font-family: sans-serif; color: #0e0e0e; max-width:300px; margin: 0 auto; display: block;}
.email_verify .modal-body .verify_problem{max-width: 280px; margin: 25px auto 0; display: block;font-family: sans-serif; color: #0e0e0e;}
.email_verify .modal-body .verify_problem .cant_find{background: #f8f8f8;padding: 13px 15px; margin-top: 15px;}
.email_verify .modal-body .verify_problem .cant_find h4{font-size: 15px;display: block;}
.email_verify .modal-body .verify_problem .cant_find p{font-size: 13px;margin-top: 8px;}
.email_verify .modal-body .verify_problem .resend_link{margin-top: 17px;font-size: 14px;}
.email_verify .modal-body .verify_problem .resend_link a{color: #00deff;}
.email_verify .modal-body .verify_problem .resend_link a:hover{opacity: 0.7;}
.email_verify .modal-body button{width: 344px; background-color: #00deff; padding: 17px 0;margin-top:22px;font-size: 16px;color: #fff;} 
.email_verify .modal-body button:hover{background: rgba(0,222,255,0.7);}
.modal-dialog form {text-align: center;}
.modal-dialog .btn-center {text-align: center;}
.register_now .modal-dialog form button {width:auto; margin: 0 auto;font-size: 18px;float: none;padding: 5px 20px;}
.cong-form .modal-dialog .bid_info {margin-top: 40px;}
.cong-form .modal-dialog .modal-body button {width: 145px; margin: 0 auto; padding: 4px 0;font-size: 18px;line-height: 27px;}
.cong-form .modal-dialog .credit-boxs form button, .cong-form .modal-dialog .credit-boxs form input[type="submit"] {width: 344px;margin: 23px auto 20px;color: #ffffff;background-color: rgb(0, 222, 255);font-family: sans-serif;font-weight: 400;font-size: 16px;padding: 15px 0;display: block; border: 0;}
.cong-form .modal-dialog .credit-boxs form button:hover, .cong-form .modal-dialog .credit-boxs form input[type="submit"]:hover {background-color: rgba(0, 222, 255, 0.7);}
.inquire-form .modal-dialog, .bid-history-form .modal-dialog {width: 486px;}
.inquire-form .modal-body {padding: 34px 0 20px;} 
.email-varify .modal-dialog {width: 603px;border: 1px solid #e1e1e1;background: #fff;}
.email-varify .modal-content {padding: 15px 25px;border: 0;text-align: center;border-radius: 0;}
.email-varify .modal-body {padding: 0;}
.modal {
  text-align: center;
  padding: 0!important;
}
.modal-content{box-shadow: none; border-radius: 0;}
.modal:before {
  content: '';
  display: inline-block;
  height: 100%;s
  vertical-align: middle;
  margin-right: -4px;
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}
/*Newsletter Model*/
.news_Modal .modal-dialog{width: 700px;height: 450px;}
.news_Modal .modal-body{padding: 20px 0 20px 20px;width: 100%;height:100%;float: left;}
.news_Modal .modal-dialog .modal-content{height: 100%;}
.news_Modal .img_area{width: 260px; display: inline-block;height: 408px;vertical-align: top;}
.news_Modal .img_area img {width: 100%;height: 100%;object-fit: contain;}
.news_Modal .form_area{display: inline-block; vertical-align: middle; width: 414px; position: relative; height: 408px;}
.news_Modal .form_area img.login_popup_logo{width: 244px; height: auto; padding-top: 15px; margin: 0 auto; display: block; }
.news_Modal .form_area .newsltr_text{padding-top: 40px; text-align: center;font-family: sans-serif; font-size: 20px; font-style: italic;display: block;color: #949494;}
.news_Modal .promo_content {padding-top: 24px;font-family: sans-serif; font-size: 16px;line-height: 22px;display: block;color: #000000;max-width: 265px;margin: 0 auto;text-align: center;}
.news_Modal .form_area .signup_text{padding-top: 40px; text-align: center;font-family: sans-serif; font-size: 20px; font-style: italic;display: block;color: #949494;position: relative;}
.news_Modal .form_area .signup_text:before{position: absolute;content: '';height: 1px; width:55px;background: #e0e0e0; left: 0; bottom: 10px;}
.news_Modal .form_area .signup_text:after{position: absolute;content: '';height: 1px; width:55px;background: #e0e0e0; right: 0; bottom: 10px;}
.news_Modal .form_area .promo_txt:before, .news_Modal .form_area .promo_txt:after{width:115px;}
.news_Modal .form_area .input_area {max-width: 302px; display: block;margin:0 auto; margin-top: 40px;}
.news_Modal .form_area .input_area input{border: 2px #d9d9d9 solid; font-size: 18px; color: #0e0e0e; width: 100%; box-sizing: border-box; padding: 14px 18px; }
button.login_bnt{background-color: rgba(0,222,255,1); padding: 14px 0; width: 100%; height: 50px;margin-top: 10px;font-size: 16px;color: #fff;}
.login_Modal .modal-dialog{width: 704px;height: 450px;}
.login_Modal .modal-body{padding-right: 0;}
.login_Modal .modal-dialog .modal-content{height: 100%;}
.login_Modal .img_area{width: 260px; display: inline-block;}
.login_form_page.login_Modal {text-align: center;}
.login_Modal .form_area{display: inline-block; vertical-align: middle; width: 421px; position: relative; height: 420px;}
.login_Modal .form_area img.login_popup_logo{width: 244px; height: auto; margin: 0 auto; padding-top: 15px; display: block;}
.login_Modal .form_area .newsltr_text{padding-top: 40px; text-align: center;font-family: sans-serif; font-size: 20px; font-style: italic;display: block;color: #949494;}
.login_Modal .form_area .signup_text{padding-top: 30px; text-align: center;font-family: sans-serif; font-size: 20px; font-style: italic;display: block;color: #949494;position: relative;}
.login_Modal .form_area .signup_text:before{position: absolute;content: '';height: 1px; width:111px;background: #e0e0e0; left: 0; bottom: 10px;}
.login_Modal .form_area .signup_text:after{position: absolute;content: '';height: 1px; width:111px;background: #e0e0e0; right: 0; bottom: 10px;}
.login_Modal .form_area .input_area {max-width: 302px; display: block;margin:0 auto; margin-top: 30px;}
.login_Modal .form_area .input_area input{border: 2px #d9d9d9 solid; font-size: 18px; color: #0e0e0e; width: 100%; box-sizing: border-box; padding: 14px 18px; margin-top: 10px;}
.login_Modal .form_area .input_area input{border: 2px #d9d9d9 solid; font-size: 18px; color: #0e0e0e; width: 100%; box-sizing: border-box; padding: 9px 18px; margin-top: 10px;line-height: 30px;}
.login_Modal .form_area .security_msg{color: #f00; font-family: sans-serif; font-size: 14px;     text-align: center; margin-top: 5px;}
.login_related label{float: left;width: 115px; color: #0e0e0e;}
.reg_acc_text{margin: 20px auto 0; display: block;max-width: 302px;clear: both;font-family: sans-serif;font-size: 14px; color:#0e0e0e; }
.reg_acc_text a{color: #00deff;}
.reg_acc_text a:hover{opacity: 0.7;}
.modal-header{background-color:#e5ecf4;}
.bar:before { left: 50%; }

.bar:after { right: 50%; }


/* active */

.input:focus ~ .bar:before, .input:focus ~ .bar:after { width: 50%; }


/* Highlight */

.highlight {
  position: absolute;
  height: 60%; 
  width: 100px; 
  top: 25%; 
  left: 0;
  pointer-events: none;
  opacity: 0.5;
}
.catalog_only_popup .modal-dialog {max-width: 400px;}
.catalog_only_popup .modal-body {padding: 40px 0 20px !important; float: left;width: 100%; background: #fff;}
.catalog_only_popup .modal-body .bid_info{padding: 50px 10px;margin-bottom: 20px; background-color: #f0f0f0;}
.catalog_only_popup .wrap_popup{max-width: 85%; margin: 0 auto;}
.catalog_only_popup .modal-body .bid_info p{padding-top: 0; height: auto;}
.catalog_only_popup .wrap_popup a.catalog_only_redirect, .catalog_only_popup .wrap_popup button{width:46% !important; padding: 2px 5px;line-height:30px !important;float: left;margin-right: 10px;}
.catalog_only_popup .wrap_popup button.cancel{    background-color: #999;margin-right: 0;float: right;}
.invoice-popup .modal-dialog {width: 728px;}
.invoice-popup .modal-content {padding: 26px 32px;height: 100%;border: 0;}
.invoice-popup .modal-body {padding: 0;}
.premium-confirm .modal-dialog{width: 430px;}
.premium-confirm .bid-confirm-box h2{    font-size: 24px;color: #333333;line-height: 1.1;padding-left: 30px;
    padding-bottom: 20px;}
.premium-confirm .modal-body{padding: 25px 0 20px;}
/* active */

.input:focus ~ .highlight {
  animation: inputHighlighter 0.3s ease;
}


@media  screen and (max-width: 767px) and (min-width: 576px){
  #myModal{margin-left:20%;
            margin-right:20%;}

  #forgot-password{margin-left:20%;
            margin-right:20%;}
            #imgCentral{
    height:103px !important;
  }  
} 


@media screen and (min-width: 768px) {
  
  #myModal .modal-dialog  {width:500px;}
  
  #forgot-password .modal-dialog{width:500px;}
  
  .modal-body{padding-left:50px;
              padding-right:50px;}

              #imgCentral{
    height:103px !important;
  }            
}

em{display:none;}

body.modal-open { overflow: auto; 
  padding-top: 0px !important;
    padding-right: 0px !important;
    padding-bottom: 0px !important;
    padding-left: 0px !important;}
    .dropdown {
  float: right;
  position: relative;
}
.dropdown {
  float: right;
  position: relative;
}


.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 250px;
  z-index: 1;
  top: 100%;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  color: #007bff;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
  <!-- =======================================================
  * Template Name: Flexor - v2.0.0
  * Template URL: https://bootstrapmade.com/flexor-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <meta name="facebook-domain-verification" content="bj6hnrrg5zpfl5xxbfxkjp9pm5dhk3" />
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
fbq('init', '1157897374743358');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1157897374743358&ev=PageView&noscript=1"
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

      function OpenMenu(){
        $.confirm({
            title: 'Menu',
            columnClass: 'medium',
            content: `
            <div class='container-fluid' style='heigth:500px;'>
            <h2>hola</h2>
            </div>`,
            buttons: {
            Cerrar: function () {
            //close
            },    


            },
            });
        }

        $(document).ready(function(){

            var input = document.getElementById("password");

            // Execute a function when the user releases a key on the keyboard
            input.addEventListener("keyup", function(event) {
            // Number 13 is the "Enter" key on the keyboard
            if (event.keyCode === 13) {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            document.getElementById("logIN").click();
            }
            });

            $("#logIN").on('click',function(){
                infodata={
                    username : $("#username").val(),
                    password : $("#password").val(),
                  };
                $.ajax({          
                            type: 'POST',
                            data: infodata,                          
                            url: '<?php echo BASE_URL ?>api/login.php',                
                            success: function(result) {  
                                datahere =  jQuery.parseJSON(result); 
                                if(datahere.status=="200"){ 

                                  <?php if($title=='Detalle') {?>
                                    window.location.replace('<?php echo $url_actual?>');  
                                  <?php } else { ?>
                                    window.location.replace('<?php echo BASE_URL ?>myAccount.php?#team');   
                                  <?php } ?>                   
                                }else{
                                  showMsg("Inválida",datahere.message,'red'); 
                                }
                                showUI(0);
                            }    
                });
            });

            $("#forpassword").on('click',function(){
                infodata={
                    forgotemail : $("#correoforgot").val(),
                  };
                $.ajax({          
                            type: 'POST',
                            data: infodata,                          
                            url: '<?php echo BASE_URL ?>api/get_password.php',                
                            success: function(result) {  
                                datahere =  jQuery.parseJSON(result); 
                                if(datahere.status=="200"){          
                                    //showMsg("success",datahere.message,'green'); 
                                    confirmOkOnly("green",datahere.message,"Éxito ",geturl);                                                    
                                }else{
                                    
                                    showMsg("Inválida",datahere.message,'red'); 
                                }
                            }    
                });
            });
        });




  </script>

</head>

<body style="padding: 0px !important;">  


        <!-- Sticky header -->
<header class="header-outer" style="z-index: 999;">
	<div class="header-inner responsive-wrapper">
		<div class="header-logo">
			<a href="<?php echo BASE_URL?>index.php"><img src="https://subastas.maxilana.com/assets/img/logosubastas.png" /></a>
		</div>
		<nav class="header-navigation">
			<a href="index.php" style="font-weight: 100;">Inicio</a>
			<a href="about.php" style="font-weight: 100;">Acerca de</a>
      <?php if(isset($_SESSION['auction_brodcaster'])): ?>
        <?php else: ?>
          <a href="register.php" style="font-weight: 100;">Registrarse</a>
        <?php endif; ?>
			<a href="contact.php" style="font-weight: 100;">Contacto</a>
      <div class="dropdown" style="font-weight: 100;">
      <a class="dropbtn" style="font-weight: 100;">Catálogo</a>
      <div class="dropdown-content">
        <a href="catalog.php" style="font-weight: 100;">Subastas activas</a>
        <a href="catalog-all.php?status=completed" style="font-weight: 100;">Subastas Anteriores</a>
      </div>
    </div>
      <?php if(isset($_SESSION['auction_brodcaster'])): ?>

        <?php if(isset($result)): ?>
            <a href="auction.php" style="font-weight: 100;">Subasta en vivo</a>
            <?php endif; ?>
    <div class="dropdown" style="font-weight: 100;">
      <a class="dropbtn" style="font-weight: 100;"><?php echo $_SESSION['auction_brodcaster']['username'].":" .$_SESSION['auction_brodcaster']['paleta']?></a>
      <div class="dropdown-content">
      <a href="myAccount.php?#team" style="font-weight: 100;">Mi cuenta</a>
      <a href="logout.php" style="font-weight: 100;">Cerrar sesión</a>
      </div>
    </div>
        <?php else: ?>
          <a  href="#signup"  id="signup" class="signup" data-toggle="modal" data-target=".log-sign" style="font-weight: 100;">Iniciar sesión</a>
            <?php endif; ?>
			<button  data-toggle="modal" data-target="#myModal" class="menuIcon">Menu</button>
		</nav>
	</div>
</header>
<?php
if($lastSlash == 'index.php' || $lastSlash == '') :?>
  <div class="main-content responsive-wrapper">
  <img style="width: 100%;height:340px;" id="imgCentral" src="<?php echo ASSETS_URL."img/".$setting2["center_image"] ?>">
</div>
<?php else: ?>
<?php endif; ?>
    <div class="modal fade" stle="transform: translate(-50%, -50%);" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 340px; margin-top: -200px;">
        <div class="modal-header">
          <h4 class="modal-title">Menú</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <?php
            $StyleButons="border-left: #888;border-style: solid;border-left-width: 8px;";
            $StyleOrigin="display: block;padding-bottom: 10px;padding-top: 10px;color:#888;";
            $StyleIndex=$StyleOrigin;
            $StyleAbout=$StyleOrigin;
            $StyleRegister=$StyleOrigin;
            $StyleContact=$StyleOrigin;
            $StyleCatalog=$StyleOrigin;
            $StyleAuction=$StyleOrigin;

            if($lastSlash == 'index.php'){
                $StyleIndex=$StyleIndex.$StyleButons;
            }
            if($lastSlash == 'about.php'){
                $StyleAbout=$StyleAbout.$StyleButons;
            }
            if($lastSlash == 'register.php'){
                $StyleRegister=$StyleRegister.$StyleButons;
            }
            if($lastSlash == 'contact.php'){
                $StyleContact=$StyleContact.$StyleButons;
            }
            if($lastSlash == 'catalog.php' || $lastSlash == 'catalog-all.php'){
                $StyleCatalog=$StyleCatalog.$StyleButons;
            }
            if($lastSlash == 'auction.php'){
                $StyleAuction=$StyleAuction.$StyleButons;
            }

        ?>
        <div>
            <li class="dropbtn" 
                style="<? echo $StyleIndex ?>">
                <a href="index.php" style="margin-left:5px;">Inicio</a>
            </li>
        </div>
		<hr>
        <div><li class="dropbtn" style="<?php echo $StyleAbout ?>"><a href="about.php" style="margin-left:5px;">Acerca de</a></li></div>
		<hr>
        <div><li class="dropbtn" style="<?php echo $StyleRegister ?>"><a href="register.php" style="margin-left:5px;">Registrarse</a></li></div>
		<hr>
        <div><li class="dropbtn" style="<?php echo $StyleContact ?>"><a href="contact.php" style="margin-left:5px;">Contacto</a></li></div>
		<hr>
        <div><li class="dropbtn" style="<?php echo $StyleCatalog ?>"><a href="catalog-all.php?status=pre-bidding#team" style="margin-left:5px;">Catálogo</a></li></div>
		<hr>
        <?php if(isset($_SESSION['auction_brodcaster'])): ?>
            <div><li class="dropbtn" style="<?php echo $StyleCatalog ?>"><a href="auction.php" style="margin-left:5px;">Subasta en vivo</a></li></div>
		    <hr>
            <br>
            <div><li class="login" style="display: block;padding-bottom: 10px;padding-top: 10px;color:#888;"><a href="myAccount.php?#team" style="margin-left:5px;">Mi cuenta</a></li></div>
            <div><li class="login" style="display: block;padding-bottom: 10px;padding-top: 10px;color:#888;"><a href="logout.php" style="margin-left:5px;">Cerrar sesión</a></li></div>
        <?php else: ?>
            <div><li class="" style="display: block;padding-bottom: 10px;padding-top: 10px;color:#888;">
            <a  href="#signup" data-toggle="modal"  id="signup" class="signup" data-target=".log-sign" style="margin-left:5px;">Iniciar sesión</a></li></div>
        <?php endif; ?>
        </div>
      </div>
      
    </div>
  </div>
<!-- Modal -->
<div class="modal fade bs-modal-lg log-sign" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        
        <div class="bs-example bs-example-tabs" style="text-align: center;">
            <p style="text-align:center;margin-top:10px;color:#B4B4B4;">Iniciar sesión</p>
            <hr>
            <img src="https://subastas.maxilana.com/assets/img/logo%20subastasN.png" style="width: 200px;
    text-align: center;
    margin: 0 auto;"></img>
        </div>
      <div class="modal-body">
        <div id="myTabContent" class="tab-content">
       
        <div class="tab-pane fade active show" id="signin">
            <form class="form-horizontal">
            <fieldset>

            <div class='container-fluid'>
                    <div class='row'>
                        <div class="col-12">
                            <form id='formDetails' class="formName">

                                <div class='row'>
                                    <div class="col">   
                                        <div class="form-group">
                                            <label>Nombre de usuario o correo electrónico</label>
                                            <input type="text" 
                                            style="
                                            width: 100%;
                                            background-color: #f0f0f0;
                                            margin: 10px 0;
                                            height: 40px;
                                            border-radius: 55px;
                                            display: grid;
                                            grid-template-columns: 15% 85%;
                                            padding: 0 0.4rem;"
                                            id="username"
                                            name="username" required value="" placeholder="" class="f form-control"  />
                                        </div>
                                        <div class="form-group">
                                            <label>Contraseña</label>
                                            <input 
                                            style="
                                            width: 100%;
                                            background-color: #f0f0f0;
                                            margin: 10px 0;
                                            height: 40px;
                                            border-radius: 55px;
                                            display: grid;
                                            grid-template-columns: 15% 85%;
                                            padding: 0 0.4rem;"
                                            id="password"
                                            type="password" name="password" required value="" placeholder="" class="f form-control"  />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

           <div class="forgot-link">
           <br>
            <a style="color: #337ab7;" href="#forgot" data-toggle="modal" data-target="#forgot-password"> Olvidé mi contraseña</a>
            <br>
            <br>
            <a style="color: #337ab7;">¿No estás registrado?</a><a style="color: #337ab7;" href="register.php"><b> ¡Registrate ahora! </b></a>
            </div>
            

            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="signin"></label>
              <div class="controls">
                <input type="button" id="logIN" name="logIN" class="btn btn-primary btn-block" value="Iniciar sesión"></input>
                <input type="button" class="close" style="font-size: initial;background-color: white;border: none;margin-top: 10px;" data-dismiss="modal" aria-label="Close"  value="Cerrar"></input>
              </div>
            </div>
            </fieldset>
            </form>
        </div>
          
    </div>
      </div>
      <!--<div class="modal-footer">
      <center>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </center>
      </div>-->
    </div>
  </div>
</div>
  
   

<!--modal2-->

<div class="modal fade bs-modal-lg" id="forgot-password" tabindex="0" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">La contraseña se enviará al corro electrónico</h4>
      </div>
      <div class="modal-body"> 
        <form class="form-horizontal">
        <fieldset>
        <div class="group">
        <input type="text" 
                                            style="
                                            width: 100%;
                                            background-color: #f0f0f0;
                                            margin: 10px 0;
                                            height: 40px;
                                            border-radius: 55px;
                                            display: grid;
                                            grid-template-columns: 15% 85%;
                                            padding: 0 0.4rem;"
                                            id="correoforgot"
                                            name="correoforgot" required value="" placeholder="Correo electrónico" class="f form-control"  />
    </div>
        
        
        <div class="control-group">
              <label class="control-label" for="forpassword"></label>
              <div class="controls">
                <input id="forpassword" name="forpassword" class="btn btn-primary btn-block" value="Enviar"></input>
                <input type="button" class="close" style="font-size: initial;" data-dismiss="modal" aria-label="Close"  value="Cerrar"></input>
              </div>
            </div>
          </fieldset>
            </form>
          
      </div>
    </div>
    
  </div>
</div>