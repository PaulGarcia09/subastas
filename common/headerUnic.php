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
.headerTop{
    padding: 20px 0 30px;
}
.menuIcon{
    position: relative;
    width: 23px;
    height: 17px;
    float: left;
    margin: 15px 20px 0;
    display: none;
    cursor: pointer;
}
.menuIcon > span{width: 100%;height: 2px;background-color: #949494;display: block;position: absolute;left: 0;top: 0}
.menuIcon > span.line2{top: 8px;}
.menuIcon > span.line3{top: 16px;}

.row{
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}
.container {
    max-width: 1030px;
    width: 100%;
}
.logo {
    float: left;
}

@keyframes blinker {
  80% {
    opacity: 0;
  }
}

html {
  font-family: sans-serif;
  -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
}

html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: inherit;
  font-family:sans-serif;
  font-weight: inherit;
  vertical-align: baseline;
}
b, strong {font-weight: 700;}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
  display: block;
}

ol, ul {
  list-style: none;
}
table {
  border-collapse: collapse;
  border-spacing: 0;
}

*, *:focus{outline:none;}
a{text-decoration:none;color: #0e0e0e}
.trans{transition:300ms all;-webkit-transition:300ms all;}
button, input, select, textarea { resize: none; border: 0; -moz-border-radius: 0; -ms-border-radius: 0; -o-border-radius: 0; border-radius: 0; -webkit-border-radius: 0; -webkit-appearance: none; -moz-appearance: none; -ms-appearance: none; -o-appearance: none; appearance: none; }
input[type=submit], select { cursor: pointer }
img { max-width: 100%; vertical-align: middle; border-radius: 0 }
/*.absoImg{position:absolute;left:0;top:0;right:0;bottom:0;margin:auto}*/
.absoLink{position:absolute;left:0;top:0;width: 100%;height: 100%;z-index: 11;}
::-webkit-input-placeholder {color:#9399ab}
:-moz-placeholder {color:#9399ab;opacity:1;}
::-moz-placeholder {color:#9399ab;opacity:1;}
:-ms-input-placeholder {color:#9399ab;} 
body{font:400 16px/1.1 sans-serif;color: #0e0e0e;}
h1, h2, h3, h4, h5, h6{margin:0;padding:0}
p:last-child{padding-bottom:0}

h2{font:400 36px/1.2 sans-serif;color: #0e0e0e;padding-bottom: 20px;}
h3{font:300 24px/1.2 sans-serif;color: #0e0e0e;}

.pr{position: relative;}
.modal-open .modal, .modal{z-index: 2050;}
/*.modal-backdrop.in{z-index: 2049;}*/
.container{max-width: 1030px;width: 100%;}
.allMiddle > *{display: inline-block;vertical-align: middle;}
.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary:active:focus, .btn-primary:active:hover{background-color: #fff;color:#007bff;}
.new_tab_bottom.btm_bid_bnr {
    width: 100%;
    height: 1px;
    border-bottom: 2px #f9f9f9 solid;
}
.scrollTop {
    position: fixed;
    right: 15px;
    bottom: 15px;
    width: 40px;
    height: 40px;
    z-index: 99;
    -o-transition: 300ms all;
    -moz-transition: 300ms all;
    transition: 300ms all;
    -webkit-transition: 300ms all;
    display: none;
    background: #00deff url(../img/scroll-arrow.png) no-repeat center center / 15px auto;
    cursor: pointer;
}

/* Menu icon css start */
.menuIcon{position: relative;width: 23px;height: 17px;float: left;margin: 15px 20px 0;;display: none; cursor: pointer;}
.menuIcon > span{width: 100%;height: 2px;background-color: white;display: block;position: absolute;left: 0;top: 0}
.menuIcon > span.line2{top: 8px;}
.menuIcon > span.line3{top: 16px;}
/* Menu icon css end */

/* Slick slider css start */
.slick-list,.slick-slider,.slick-track{position:relative;display:block}.slick-loading .slick-slide,.slick-loading .slick-track{visibility:hidden}.slick-slider{box-sizing:border-box;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;-webkit-touch-callout:none;-khtml-user-select:none;-ms-touch-action:pan-y;touch-action:pan-y;-webkit-tap-highlight-color:transparent}.slick-list{overflow:hidden;margin:0;padding:0}.slick-list:focus{outline:0}.slick-list.dragging{cursor:pointer;cursor:hand}.slick-slider .slick-list,.slick-slider .slick-track{-webkit-transform:translate3d(0,0,0);-moz-transform:translate3d(0,0,0);-ms-transform:translate3d(0,0,0);-o-transform:translate3d(0,0,0);transform:translate3d(0,0,0)}.slick-track{top:0;left:0}.slick-track:after,.slick-track:before{display:table;content:''}.slick-track:after{clear:both}.slick-slide{display:none;float:left;height:100%;min-height:1px}[dir=rtl] .slick-slide{float:right}.slick-slide img{display:block}.slick-slide.slick-loading img{display:none}.slick-slide.dragging img{pointer-events:none}.slick-initialized .slick-slide{display:block}.slick-vertical .slick-slide{display:block;height:auto;border:1px solid transparent}.slick-arrow.slick-hidden{display:none}
.slick-arrow{position:absolute;top:50%;transform:translateY(-50%);font-size:0;z-index:1;cursor: pointer;background-color: transparent;-webkit-transition: 200ms all ease-in-out;transition: 200ms all ease-in-out;width: 40px;height: 40px;padding: 0;background-position: center center; background-repeat: no-repeat;background-size: contain;margin: -25px 0 0}


.slick-dots{text-align: center;line-height: 1;height: 10px;}
.slick-dots li{display: inline-block;vertical-align: top;width: 10px;height: 10px;background-color: #666;-webkit-border-radius: 50%;border-radius: 50%;margin: 0 5px;}
.slick-dots li.slick-active{background-color: #000}
.slick-dots li button{display: none;}
.gredient{width: 100%; height: 238px; position: absolute; bottom: 0; }
.edit_slide{background-color:  #2e2e2e;}
.slide_type2{width: 1000px; height: 390px; margin: 0 auto; cursor: pointer; position: relative;}
.img_area_1st{float: left; width: 481px; height: 390px;}
.img_area_1st img{width: 481px; height: 390px;}
.slide_text_area{float: left; margin-left: 40px; width: 300px; color: #fff; margin-top: 75px;}
.slide_text1{padding-bottom: 10px;font-size: 16px;font-style: italic; font-family: sans-serif;}
.slide_text2{font-family: sans-serif; font-size: 22px;padding-bottom: 15px; font-style: italic;line-height: 1.1; position: relative;}
.slide_text2:after{content: ''; position: absolute; width: 40px; height: 2px; background: #fff; bottom: -10px; left: 0;}
.slide_text3{    font-size: 14px;line-height: 1.3;font-family: sans-serif;margin-top: 40px;}
.img_area_2{float: left;width: 140px; height: 180px;margin-top: 95px;margin-left: 10px;}
.img_area_2 img{max-width: 100%;}
.exclusive_slide{position: relative; margin: 14px 0px; color: #ffffff; text-shadow: none;}
.exclusive_slide span{font-size: 14px;background: rgba(0,205,53,0.75); padding:0px 4px;}
/* Slick slider css end */

/* Hedader css start */
.headerTop{padding: 20px 0 30px;border-bottom: 1px solid #f3f3f3}
.logo{float: left;}

.logo a{/*background-image: url(../img/svg/bidsquare_logo.svg);*/ display: block; /*text-indent: -9999px;*/ height: 35px; background-repeat: no-repeat; width: 242px;}


.userArea{float: right;position: relative;top: 4px;}
.userArea a{font:400 14px/1.1 sans-serif;transition: 300ms all;color:white;}
.userArea .borderBtn{ border:1px solid #ff5821;-webkit-border-radius: 15px;border-radius: 15px;width: 100px;padding: 0;color: #ff5821;text-align: center;margin-left: 11px;line-height: 32px;}

.navigation{float: left;}
.navigation > ul > li{float: left;font:400 15px/54px 'Roboto';margin-right: 35px;position: relative;margin-left:10px;}
.navigation > ul > li.desktop_view{display: none;}
.navigation > ul > li > a{display: block; color:white;}
.subMenu {position: absolute;top: 48px;left: -17px;background-color: #fff;border: 1px #d6d6d6 solid;border-radius: 2px;z-index: 850;opacity: 0;visibility: hidden;transition: 100ms all;}

.subMenu > li{white-space: nowrap;}
.subMenu > li > a, .mega-menu-wrap ul li a {display: block;padding: 10px 19px;color: #0e0e0e;font:400 14px/1 sans-serif;transition: 300ms all;}
.mega-menu-wrap ul li a {font-weight: 300;}
.mega-menu-wrap {position: absolute;top: 40px;padding: 15px 6px 25px;left:0px;background-color: #fff;z-index: 850;transition: 100ms all;box-shadow: 3px 3px 11px rgba(0, 0, 0, 0.1);width:100%;display: none;}
 .headerBtm ul > li:hover > .mega-menu-wrap{display: block;}
.mega-menu-wrap ul {float: left;margin-right: 35px;}
.mega-menu-wrap ul li  a:hover {color: #00deff;}
.mega-menu-wrap .cat_levels{float: left;width: 70%;}
.mega-menu-wrap .cate_img_wrap{float: right;}
.mega-menu-wrap .cat_imgs {width: 270px;}
.mega-menu-wrap .cat_imgs ul{margin-right: 0;width: 270px; float: right;}
.mega-menu-wrap .cat_imgs ul li{float:left;width: 120px;margin: 0 5px 10px;}
.mega-menu-wrap .cat_imgs ul li a{padding: 0;}
.mega-menu-wrap .cat_imgs ul li img{height: 120px; width: 100%; object-fit: cover; margin: 0 auto; display: block;}
.mega-menu-wrap .view-all{position: absolute; bottom: -5px; clear: both; text-align: right;}
.mega-menu-wrap .view-all a {padding: 0 7px;font-size: 14px;}
.navigation > ul > li:hover > ul {opacity: 1;visibility: visible;}
.mega-menu-wrap h3 {color: #0e0e0e;font:500 14px/1 sans-serif;padding: 10px;}
.mega-menu-wrap .mega-menu {float: left;padding:0 15px; width: 25%;}
.mega-menu-wrap .mega-menu ul {float: none;margin-right: 0;}
.all-category .mega-menu-wrap {width:100%;left: 0;}
.all-category .all-category-button {bottom: 20px;position: absolute;right: 50px;}
.all-category .all-category-button a {background: #00DEFF;border-radius: 23px;font-size: 14px;line-height: 1;font-family: sans-serif;text-align: center;color: #FFFFFF;padding: 6px 20px;transition: 100ms all;}
.all-category .all-category-button a:hover {background: rgba(0, 222, 255, 0.7);}
.searchPart{float: right;width: 285px;position: relative;margin: 10px 0 0}
.searchTxt{width: 100%;height: 34px;background-color: #ffffff;color:#0E0E0E;padding: 0 40px 0 16px;font:400 14px/17px sans-serif;border: 1px solid #BBBBBB;}
.searchTxt::-webkit-input-placeholder {color:#777777}
.searchTxt:-moz-placeholder {color:#777777;opacity:1;}
.searchTxt::-moz-placeholder {color:#777777;opacity:1;}
.searchTxt:-ms-input-placeholder {color:#777777;} 

.searchBtn{position: absolute;right: 0;top: 0;width: 34px;height: 34px;background: url(../img/svg/search_icon.svg) no-repeat center center / 18px auto #999999; transition: all .5s;}

.searchTxt:focus + .searchBtn, .searchTxt + .searchBtn:hover { background-color: #555555; }

.headerBtm{background-color: #f9f9f9;border-top: 1px solid #eeeeee;border-bottom: 1px solid #eeeeee;}
.catNav{float: left;}
.catNav > ul > li{float: left;font-size: 15px;line-height: 47px;font-family: sans-serif;margin-right: 25px;}
.catNav > ul > li > h2 {font-size: 15px;line-height: 47px;font-family: sans-serif;padding-bottom: 0;}
.catNav > ul > li > h2 > a{color: #949494;}
.catNav > ul > li > a{color: #949494;}

#homeSlider{padding-bottom: 30px;}
.slideDiv:not(:first-child) {display: none; }
.slick-initialized .slideDiv{display: block;}
#homeSlider .slick-dots{position: absolute;bottom: 0;left: 0;right: 0}

.showMobile{float: right;display: none;}
.btnSearch{width: 22px;height: 22px;background: url(../img/search-icon.png) no-repeat center center / contain}
.btnUser{width: 15px;height: 22px;background: url(../img/user-blue.png) no-repeat center center / contain;margin-left: 24px;}
.mobilee_login .btnUser{display: none;}
.mobiTitle{display: none;text-align: center;font:400 16px/22px sans-serif;border-bottom: 1px solid #eeeeee;padding: 18px 0 14px;position: fixed;left: 0;top: 0;z-index: 11;width: 293px;}

.navigation .menu_title{display: none;}
.mybidsquare_menu .menu_title{display: none;}
/* Hedader css end */
/*Need to remove after demo*/
.nav-tabs > li > a > i {
    width: 18px;
    height: 18px;
    display: inline-block;
    vertical-align: text-top;
    margin-right: 7px;
    opacity: 0.7;
  }
  /*Need to remove after demo*/
/* Slider css start */
.slideDiv{height: 390px;position: relative; background-size: cover !important;background-position: center center !important;background-repeat: no-repeat !important;}
.slideDiv .container{bottom: 38px;position: absolute;left: 0;right: 0;color: #ffffff;}
.slideDiv .container.black_shadow{text-shadow: 1px 1px 3px rgba(255, 255, 255, 0.4);}
.slideDiv .container.white_shadow{text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.4);}
.sDate{font:italic 400 16px/1 sans-serif; display: inline-block;}
.sTitle{font:italic 400 36px/1.1 sans-serif;padding: 0 0 13px;}
.sDate:after{width: 40px;height: 2px;background-color: #00deff;content: '';display: block;margin: 10px 0 20px;}
.sDate.center_line:after{margin: 10px auto 20px;}
.byLive{font:400 14px/1 sans-serif;}
.byLive span{display: inline-block;vertical-align: top;font-size: 16px;margin: 0 6px 0 5px;}

.liveIcon{display: inline-block;vertical-align: top;width: 14px;height: 14px;margin-right: 5px;}
.homeSlider .white_shadow .byLive img {-webkit-filter: drop-shadow( 1px 1px 3px rgba(0, 0, 0, 0.4) ); filter: drop-shadow( 1px 1px 3px rgba(0, 0, 0, 0.4) );}
.homeSlider .black_shadow .byLive img {-webkit-filter: drop-shadow( 1px 1px 3px rgba(255, 255, 255, 0.4) );filter: drop-shadow( 1px 1px 3px rgba(255, 255, 255, 0.4) );}
/* Slider css end */

/* Featured section css start */
.consignment-only {background: rgba(204,204,204,0.5); ;color: #fff;font-size: 12px;line-height: 1.5;padding: 1px 6px;display: inline-block;margin-bottom: 12px;}
.tabWrapper{border-bottom: 2px #f9f9f9 solid;margin-bottom: 30px;}
.featSec{padding: 20px 0 0}
.featSec .tab-content{padding: 2px 0 0}
.featSec .tab-content #featured-item{position: relative;}
.nav-tabs{text-align: center;position: relative;border-bottom: 1px #eee solid; display: block;clear: both;}
.nav-tabs > li{display: inline-block;vertical-align: top;float: none;margin: 0 35px;cursor: pointer;color: rgba(0,0,0,0.54);font:400 14px/41px sans-serif;transition: 300ms all;position: relative;padding: 0;}
.nav-tabs > li > a {color: rgba(0,0,0,0.54);font:400 14px/41px sans-serif;padding: 0;border:0;margin: 0;transition: 300ms all;position: relative;}
.nav-tabs > li span.tip-coming-soon {position: absolute;background: #ccc;color: #fff;top: -7px;right: -58px;font-size: 12px;line-height: 1.5;padding: 0px 4px;z-index: 1;}
.nav-tabs > li > a h2{font: inherit;color: inherit; padding-bottom: 5px;}
.nav-tabs > li > a h3{font: inherit;color: inherit;}
.nav-tabs > li > a:after{background-color: #00deff;height: 2px;position: absolute;bottom: 0;left: 50%;width: 0;content: '';transition: 300ms all;}
.nav-tabs > li.active > a:after{left: 0;width: 100%;}
.nav-tabs > li > a > img{width: 18px;height: 18px;display: inline-block;vertical-align: text-top;margin-right: 7px;opacity: 0.7}
.nav-tabs > li.active > a, 
.nav-tabs > li.active > a:focus, 
.nav-tabs > li.active > a:hover{border:0;color: rgba(0,0,0,0.87)}
.moveSpan{background-color: #00deff;height: 2px;position: absolute;bottom: 0;left: 0;width: 0}

.featBox{margin:0}
.featColumn{float: left;width: 25%;padding: 0;text-align: center;}
.imgBox{height: 240px;width: 240px;margin-bottom: 10px;padding: 0 5px;}
.imgBox img{height: 100%;width: 100%;object-fit: contain;}

.wrapInner h3{color: #0e0e0e;font:300 20px/1.2 sans-serif;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;padding: 0 15px;}
.wrapInner .smallSapn{font:300 14px/1.2 sans-serif;padding-top: 5px;display: block;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;}
/* Featured section css end */

/* Upcoming Auctions css start */
.upcomSec{padding: 70px 0 0;}
.storefront_wrapper .upcomSec{padding: 20px 0 0;width: 100%;float: left;}
.upcomSec h1{font: 400 36px/1.2 sans-serif; color: #0e0e0e; padding-bottom: 20px;}
.upcomSec .tabWrapper{margin-bottom: 25px;}
.btnSwitch{display: inline-block;vertical-align: middle;width: 30%;}
.btnSwitch > *{float: left;width: 20px;height: 20px;cursor: pointer;margin-right: 10px;}


.sortDiv{display: inline-block;vertical-align: middle;width: 70%;margin-left: -4px;text-align: right;    margin-bottom: 5px;}
.sortDiv > span{font-size: 14px;padding-right: 8px;}
.sortDiv > .dropDown{width: 180px;}
.listWrap{-webkit-box-shadow: 3px 3px 8px 3px rgba(0,0,0,0.08);box-shadow: 3px 3px 8px 3px rgba(0,0,0,0.08);display: inline-block;vertical-align: top;width: 100%;}
.listUl > li{margin-bottom: 20px;}

.listImg{width: 250px;height: 250px;float: left;overflow: hidden;position: relative;}
.listImg img{width: 100%;height: 100%;object-fit: cover;}
.badgeDiv{position: absolute;left: 0;top: 0;width: 8em;height: 8em;color: #ffffff;z-index:0;}
.bidNow:before{z-index: -1;position: absolute;left: 0;top: 0;width: 0;height: 0;border-top: 64px solid #22cc11;border-left: 64px solid #22cc11;border-right: 64px solid transparent;border-bottom: 64px solid transparent;content: '';}
.close_auc:before{z-index: -1;position: absolute;left: 0;top: 0;width: 0;height: 0;border-top: 64px solid #7f7f7f;border-left: 64px solid #7f7f7f;border-right: 64px solid transparent;border-bottom: 64px solid transparent;content: '';}

.coming_soon_badge_bg:before{z-index: -1;position: absolute;left: 0;top: 0;width: 0;height: 0;border-top: 64px solid rgba(170, 170, 170, 0.8);border-left: 64px solid rgba(170, 170, 170, 0.8);border-right: 64px solid transparent;border-bottom: 64px solid transparent;content: '';}

.close_auc img{width: 40px;height: auto;}
.close_auc i{width: 64px;text-align: center;display: block;margin: 6px 0 0}
.badgeDiv.close_auc span{top: 37px;}
.bidNow i{width: 64px;text-align: center;display: block;margin: 6px 0 0}
.bidNow img{width: 40px;height: auto;-webkit-animation: rotating 2s linear infinite; -moz-animation: rotating 2s linear infinite; -ms-animation: rotating 2s linear infinite; -o-animation: rotating 2s linear infinite; animation: rotating 2s linear infinite;}
.badgeDiv.bidNow span{top: 37px;}
.badgeDiv.badgebuyNow span{top: 33px;}
@-webkit-keyframes rotating {
  from {-ms-transform: rotateY(0deg); -moz-transform: rotateY(0deg); -webkit-transform: rotateY(0deg); -o-transform: rotateY(0deg); transform: rotateY(0deg);}
  to {-ms-transform: rotateY(180deg); -moz-transform: rotateY(180deg); -webkit-transform: rotateY(180deg); -o-transform: rotateY(180deg); transform: rotateY(180deg);}
}
@keyframes rotating {
  from {-ms-transform: rotateY(0deg); -moz-transform: rotateY(0deg); -webkit-transform: rotateY(0deg); -o-transform: rotateY(0deg); transform: rotateY(0deg);}
  to {-ms-transform: rotateY(180deg); -moz-transform: rotateY(180deg); -webkit-transform: rotateY(180deg); -o-transform: rotateY(180deg); transform: rotateY(180deg);}
}
.badgebuyNow:before {z-index: -1;position: absolute;left: 0;top: 0;width: 0;height: 0;border-top: 64px solid #22cc11;border-left: 64px solid #22cc11;border-right: 64px solid transparent;border-bottom: 64px solid transparent;content: '';}
.badgebuyNow i {width: 64px;text-align: center;display: block;margin: 6px 0 0;}
.badgebuyNow img {width: 40px;height: auto;-webkit-transform-origin: 50% 0;transform-origin: 50% 0;-webkit-animation: swinging 2.5s ease-in-out forwards infinite;animation: swinging 2.5s ease-in-out forwards infinite;}
@-webkit-keyframes swinging{
    0%{-webkit-transform: rotate(20deg);}
    50%{-webkit-transform: rotate(-15deg)}
    100%{-webkit-transform: rotate(20deg);}
}
@keyframes swinging{
    0%{transform: rotate(20deg);}
    50%{transform: rotate(-15deg)}
    100%{transform: rotate(20deg);}
}

.badgeDiv small{display: block;text-align: center;}
.countTxt{width: 53px;margin-left: 7px;line-height: 1}
.badgeDiv small:last-child, .countTxt + small{width: 69px;line-height: 1.1em;font-size: 13px;padding: 14px 0 0;font-style: normal;}
.coming_soon_badge_bg small {padding: 6px 0 0 !important;}
.pre-register small {letter-spacing: -0.5px;width: 71px !important;padding-top: 11px !important;}
.gridView .badgeDiv small:last-child,
.gridView .countTxt + small{padding-top: 10px;}

.gridView .bidNow small:last-child,
.gridView .badgebuyNow small:last-child{padding-top: 14px;}

.badgeDiv span{position: absolute;left: 0;top: 17px;}
.hourLeft{color: #00cd35}
.dayLeft{color: #00deff}

.listConleft{display: inline-block;vertical-align: middle;width: 71.25%;border-right: 1px solid #e5e5e5;position: relative;}

.listCon{padding: 19px 0 10px 30px;overflow: hidden;}
.listConleft h3 a{display: inline-block;overflow: hidden;text-overflow: ellipsis;max-width: 440px;white-space: nowrap;}

.listCon p{padding: 2px 0 0;font:300 14px/1.2 sans-serif;color: #0e0e0e;height: 40px;}

.itemImg{float: left;width: 50px;height: 50px;margin-right: 10px;}
.itemDetail{font-size: 14px;padding: 5px 0 7px;}
.itemImg img{width: 100%;height: 100%;object-fit: cover;}
.cataLog img{max-width: 24px;margin: -2px 0 0 -4px;}
.itemName{overflow: hidden; height: 17px;}
.cataLog{overflow: hidden;margin: 16px 0 0; min-height: 20px;}

.aucImg{margin: 0 -11.5px;padding-right: 20px;}
.aucImg > li{float: left;width: 20%;padding: 0 11.5px;}
.aucImg > li > a{display: block;width: 80px;height: 80px;border:1px solid #e0e0e0;position: relative;}
.aucImg > li > a img{height: 100%; object-fit: contain;margin: 0 auto; display: block;}
.aucImg > li > a:after{width: 100%;height: 100%;position: absolute;left: 0;top: 0;pointer-events: none;content: '';border: 1px solid transparent;}

.liveAuct{color: #00deff;font:300 12px/1 sans-serif;display: inline-block;}
.liveAuct img{vertical-align: text-top; width: 14px;}

.listConRight{display: inline-block;vertical-align: middle;text-align: center;width: 28.75%;margin-left: -5px;color: #0e0e0e;}
.gridView .listConRight {display: none;}
.evDate{font:300 36px/1.1 sans-serif;}
.evTime{font:300 20px/1.1 sans-serif;padding-top: 8px;}
.evstartEnd{font:300 14px/1.1 sans-serif;padding-top: 18px;}
.gridSwitch .evstartEnd.mTxt{display: none;}
.listConRight .btn{margin-top: 16px;}

.listMain{padding: 7px 0 0}
.showGridtime{display: none;overflow: hidden;}
.showGridtime .evstartEnd{padding-top: 3px;line-height: 1;height: 34px;}


.btn-round{background-color: rgba(0,222,255,1); padding: 4px 10px; border-radius: 22px; display: inline-block;line-height: 24px; width: 187px; font-size: 14px;}

.gridView .listUl{margin: 0 -10px;}
.gridView .listUl > li{width: 33.3333333333%;padding: 0 10px;float: left;}
.gridView .listImg{width: 100%;height: 320px; position: relative;}
.gridView .listCon{padding: 4px 12px 7px 20px;overflow: inherit;}
.gridView .listConleft{width: 100%;border: 0}
.gridView .listConleft h3{font-size: 20px;height: 41px;overflow: hidden; line-height: 1}
.gridView .liveAuct{position: static;text-align: right;line-height: 18px;display: inline-block;}
.gridView .listConleft h3 a{text-overflow: inherit;overflow: inherit;white-space: normal;height: 100%;}
.gridView .aucImg, .gridView .listCon p{display: none;}
.gridView .showGridtime{display: block;}
.gridView .itemImg{width: 64px;height: 64px;border:1px solid #f3f1f1;margin-right: 8px;}
.gridView .cataLog{margin: -2px 0 0}
.gridView .itemDetail{padding-top: 7px;}
.gridView .countTxt{font-size: 1.3em;}
.gridView .listtext-top {margin-right: 0;}

.live-audio-video-icon {display: inline-block;margin-right: 4px;position: relative;}
.live-audio-video-icon img {width: 18px;}
.live-audio-video-icon .live-tooltip {position: absolute;width: 95px;left: -40px;border-radius: 4px;background: rgba(0, 0, 0, 0.7);top: -17px;z-index: 9999999;text-align: center;opacity: 0;-webkit-transition: transform 1s ease;transition: transform 1s ease;}
.live-audio-video-icon .live-tooltip span {color: #ffffff;font-size: 13px;line-height: 18px;}

.live-audio-video-icon:hover .live-tooltip {opacity: 1;}
.gridView .live-audio-video-icon .live-tooltip {top: -25px;}
.listtext-top {text-align: right;margin-right: 10px;}

.listImg .exclusive {width: 100%;  position: absolute; bottom: -1px; background-color: rgba(0,205,53,0.75); height: 22px; padding: 0px 3px; text-align: center; }
.listImg .exclusive span { font-size: 14px; color: #ffffff; vertical-align: middle; }
/* Upcoming Auctions css end */
.listImg .catalog_only {background-color: rgba(68,68,68,0.4);}
.banner_content .catalog_only span{background-color: rgba(68,68,68,0.4) !important;}
.auction-type .live-sec, .auction-type .catalog_only{display: inline-block;}
.auction-type .catalog_only{margin-left: 7px;font-size: 11px; color: #fff;background: rgba(68,68,68,0.4) ; padding:3px 5px;}
.auction-type .catalog_only span{color: #fff; padding: 0; font-size: 11px;}
.detail-account-right a.event-title{margin: 5px 0;display: block;}
.detail-account-right .bid-inc a{margin: 3px 0;display: block;}
/* Auctioneers Directory css start */
.btmBanner{padding: 37px 0 70px;float: left; width: 100%;}
.featSec .tabWrapper{margin-bottom: 28px;}
.nav-tabs > li.moreLink > a{padding: 0}
.nav-tabs > li.moreLink > a > i{width: 13px;height: 13px;position: relative;opacity: 1;vertical-align: middle;margin: -2px 0 0 6px;}
.nav-tabs > li.moreLink > a > i:after, .nav-tabs > li.moreLink > a > i:before{position: absolute;left: 0;top: 0;right: 0;bottom: 0;margin: auto;content: '';background-color: #000000}
.nav-tabs > li.moreLink > a > i:after{width: 1px;height: 100%;}
.nav-tabs > li.moreLink > a > i:before{width: 100%;height: 1px;}
.nav-tabs > li.moreLink{margin-left: 24px;}
.nav-tabs > li.moreLink > a{color: #0e0e0e}

.drlistRow{padding-bottom: 55px;}
.drColumn{display: inline-block;vertical-align: top;margin: 0 10px 10px 0}
.drColumn a{-webkit-box-shadow: 3px 3px 8px 3px rgba(0,0,0,0.08);box-shadow: 3px 3px 8px 3px rgba(0,0,0,0.08);display: block;background-color: #ffffff;border-radius: 50px;padding: 5px 7px 5px 20px;text-align: center;}
.drColumn a > *{display: inline-block;vertical-align: middle;}
.drColumn a span:not(.roundBadge){font:300 14px/1.2 sans-serif;}
.roundBadge{width: 22px;height: 22px;background-color: #00deff;margin-left: 10px;color: #ffffff;font:400 14px/1.7 sans-serif;-webkit-border-radius: 50%;border-radius: 50%;}
/* Auctioneers Directory css end */

/* Blog css start */
.blogWrapper{border-top: 2px solid #f9f9f9;padding: 65px 0 0;position: relative;}
.blogWrapper .titleDiv h2{font-family: 'Times'}
.blogWrapper:before{width:100%;height: 1px;content: '';display: block;border-top: 1px solid #f3f3f3;position: absolute;top: 0;left: 0}

.subTitle{padding-top: 2px;display: inline-block;vertical-align: top;}
.subTitle small{display: inline-block;vertical-align: middle;letter-spacing: 18px;font:300 12px/1 sans-serif;text-transform: uppercase;margin: 0 -4px 0 15px}
.subTitle:before, .subTitle:after{display: inline-block;vertical-align: middle;width: 57px;height: 1px;background-color: #e0e0e0;content: '';}

.bcolumnOne{float: left;width: 56.5%;border-right: 1px solid #e0e0e0;padding-right: 24px;}
.blogImg img{width: 100%;}

.blogRow{padding: 57px 0 0}
.blogCon{padding: 32px 0 0}
.blogTitle{font:400 26px/1 sans-serif;padding: 0 0 16px;}
.blSubtxt{color: #949494;font:400 14px/1.2 sans-serif;padding: 0 0 40px;}
.blogCon p a{font-size: 14px;color: #949494;margin-left: 10px;display: inline-block;}

.bcolumnTwo{float: left;width: 43.5%;padding-left: 25px;}
.bcolumnTwo .blogImg{float: right;width: 100px;margin: 12px 0 0 25px;}
.bcolumnTwo .blogCon{padding: 17px 0 0}
.bcolumnTwo .blogTitle{padding-bottom: 11px;}
.bcolumnTwo .blSubtxt{height: 36px;padding: 0}
.bcolumnTwo .blogCon p{padding-top: 20px;height: 141px;}
.bloginnerRow{padding-bottom: 26px;border-bottom: 1px solid #e0e0e0}

.blogSec .viewMore{margin-top: 40px;}
.blogSec{padding-bottom: 27px;}

.blog-recent-img {width: 210px;height: 210px;}
.blog-recent-img img {height: 100%; object-fit: cover;}
/* Blog css end */

/* Footer  css start */
.site-footer{background-color: #f9f9f9;margin-top: 100px;float: left;width: 100%;}
.footerTop{text-align: center;padding: 30px 0 0;border-bottom: 1px solid #eeeeee;padding-bottom: 33px;}
.footerTop li{display: inline-block;vertical-align: middle;width: 46px;height: 26px;}
.footerTop li a{display: block;width: 100%;height: 100%;}
.foLogo{padding-bottom: 16px;}
.newsLetter {padding: 40px 0 0}

.tab-content{position: relative;}
.tab-content > .tab-pane:not(.active){display: block;position: absolute;left: 0;top: 0;max-width: 100%;visibility: hidden;pointer-events: none;}

.newsTxt{float: left;width: 230px;background-color: #ffffff;border: 1px solid #cccccc;height: 38px;padding: 0 16px;font:300 15px/1.2 sans-serif;color: #ccc}
.newsTxt::-webkit-input-placeholder {color:#747474;font-size: 14px;}
.newsTxt:-moz-placeholder {color:#747474;opacity:1;font-size: 14px;}
.newsTxt::-moz-placeholder {color:#747474;opacity:1;font-size: 14px;}
.newsTxt:-ms-input-placeholder {color:#747474;font-size: 14px;} 
.newsSubmit{float: left;background-color: rgba(90,95,105,1);width: 110px;height: 38px;color: #ffffff;font:400 16px/1.2 sans-serif;}

.newsTitle{font:italic 400 24px/1 sans-serif;color: #0e0e0e;margin-left: 35px;}

.footerBtm{padding: 32px 10px 54px 54px;border-top: 2px solid #fff;}
.foMenu{float: left;}
.foMenu h4{color: #0e0e0e;font:400 20px/1.2 sans-serif;padding: 0 0 14px;}
.foMenu li{font:400 14px/1.2 sans-serif;padding: 0 0 12px;}
.foMenu a{color: #747474}

.colmn1{width: 23.077%}
.colmn2{width: 29.915%}
.colmn3{width: 22%}
.colmn4{float: right;}

.fl{float: left;}
.copyRight{border-top: 1px solid #eee;border-bottom: 1px solid #eee;background: #ffffff;padding: 14px 0;font:300 12px/1.2 sans-serif;color: #949494;}
.copyLinks{float: right;}
.copyRight a{color: #666666}
.copyLinks span{display: inline-block;vertical-align: middle;font-size: 13px;line-height: 14px;margin: 0 16px;}
.copyTxt{margin-right: 30px;float: left}
.mobile_view_change{background: gray; float: left;width:100%;padding:20px 0;text-align: center;}
.mobile_view_change a{color: #fff; font-size: 20px;}
/* All mobile menu css start */
.mobilemenuBox{position: fixed;left: 0;top: 0;width: 100%;height: 100%;overflow-y: auto;z-index: 99;-webkit-transform: translateX(-100%);transform: translateX(-100%);-webkit-transition: 300ms all;transition: 300ms all;opacity: 0;visibility: hidden;}
.mobilemenuBox .mobiTitle{background-color: #f9f9f9;display: block;}

/*.navigation need to remove after demo*/
.mobilemenuBox > *:not(.overLayer) {
    width: 293px;
    height: 100%;
    background-color: #ffffff;
    position: relative;
    z-index: 11;
    opacity: 0;
    visibility: hidden;
    display: none;
    overflow: auto;
    padding-top: 55px;
}
/*.navigation need to remove after demo*/

.mobilemenuBox > * > ul{margin-bottom: 15px;}
.mobilemenuBox > * > ul > li{/*border-bottom: 1px solid #eeeeee;*/float: none;margin: 0;font:400 15px/47px sans-serif;margin-left: 18px;}
.mobilemenuBox > * > ul > li.logOutli{margin-left: 0;background: #f9f9f9;border-top: 1px solid #eeeeee;margin-top: 50px}
.mobilemenuBox > * > ul > li.logOutli a{padding: 0 18px;}
.mobilemenuBox > * > ul > li > a{color: #0e0e0e;display: block;}

.showMenu .mobilemenuBox{-webkit-transform: translateX(0);transform: translateX(0);opacity: 1;visibility: visible;}
.showMenu .mobilemenuBox > .activeDiv{opacity: 1;visibility: visible;display: block;}
.slideGone .mobilemenuBox{-webkit-transform: translateX(-100%);transform: translateX(-100%);opacity: 1;visibility: visible;}
.slideGone .overLayer{display: none;}
/* All mobile menu css end */

.bread_navi .breadcrumb{background-color: transparent; border-radius: 0;margin-bottom: 0;padding:9px 15px;}
.bread_navi .breadcrumb a{color: #949494;font-size: 12px;font-weight: lighter;}
.bread_navi .breadcrumb a:hover{color: #0e0e0e;}
.bread_navi .breadcrumb span{color: #0e0e0e;font-size: 12px;}
.breadcrumb-item + .breadcrumb-item::before {display: inline-block; padding-right: 5px; padding-left: 5px; font-family: "icon-orange"; font-size: 9px; line-height: 1; color: #949494; content: ">"; }
.page_banner{float: left;width: 100%; margin: 10px 0 25px;}
.page_navi{float: left;width: 100%; margin-top: 30px;}
.page_navi nav{text-align: center;}
.page_navi .pagination > li > a, .pagination > li > span{border:0; color: #949494;/*margin: 0 7px;*/font-size: 14px; padding:0 8px 4px; }
.page_navi .pagination > li > a:hover,.page_navi .pagination > li > a:focus{background-color: transparent;border:0; }
.page_navi .pagination > li > a.active{border-bottom: 2px solid #00deff;}
.pagination > .page-item.prev i{color: #00DEFF; padding-right: 10px; font-size: 14px;}
.pagination > .page-item.next i{color: #00DEFF; padding-left: 10px; font-size: 14px;}
.advertise_auction{float: left;width: 100%; margin-top: 30px;}

/*Hover css*/
.blogCon p a:hover, 
.catNav > ul > li > a:hover,
.catNav > ul > li > h2 > a:hover,
.userArea a:hover,  
.navigation > ul > li:hover > a{color: #ff5821}
.subMenu > li > a:hover {background-color: #f0f0f0;color: #ff5821}
.userArea .borderBtn:hover{background-color: #ff5821;color: #ffffff;}
.nav-tabs > li > a:hover{color: rgba(0,0,0,0.87)}

.moreLink a:hover, .moreLink a:focus,
.copyRight a:hover, .copyRight a:focus,
.blogTitle a:hover, .blogTitle a:focus,
.drColumn a:hover span:not(.roundBadge), .drColumn a:focus span:not(.roundBadge),
.cataLog a:hover, .cataLog a:focus,
.itemName a:hover, .itemName a:focus,
.wrapInner:hover h3, .wrapInner:focus h3{-webkit-text-shadow: -0.1px -0.1px 0 black, 0.1px 0.1px black;text-shadow: -0.1px -0.1px 0 black, 0.1px 0.1px black;}
.listImg:hover .listConleft h3 a, .listImg:focus .listConleft h3 a,  .listConleft h3 a:hover, .listConleft h3 a:focus{-webkit-text-shadow: -0.1px -0.1px 0 black, 0.1px 0.1px black;text-shadow: -0.1px -0.1px 0 black, 0.1px 0.1px black;}


.moreLink a:hover i:before, .moreLink a:hover i:after{background-color: #00deff !important}

.aucImg > li > a:hover:after,
.aucImg > li > a:hover{border-color: #00deff}
.btn-primary:hover, .btn-primary:focus{background-color: #fff; color:#007bff;}
.btn-blue:hover, .btn-blue:focus{background-color: rgba(0,222,255,0.7)}

.foMenu a:hover{color: #0e0e0e}
.newsSubmit:hover{background-color: rgba(90,95,105,0.9)}

/*Hover css*/

/* Liting Bidsquare css start */
.listing-top {padding-top: 50px;}
.list-head h2 {padding-bottom: 0;}
.list-subhead {margin-top: 50px;}
.list-subhead h2 {font-family: sans-serif;font-style: italic;font-size: 32px;line-height: 1.1;color: #0e0e0e;}
.list-middle {text-align: center;margin-top: 30px;margin-bottom: 45px;}
.list-line {width: 960px;max-width: 100%;margin: 0 auto;margin-bottom: 34px;display: block;height: 1px;background-color: #e5e5e5;}
.list-middle .sub-txt {line-height: 24px;margin-bottom: 20px;font-weight: 300;font-size: 18px;color: #0e0e0e;font-family: sans-serif;}
.map-section {position: relative;padding-bottom: 300px;}
.map-subheading {position: absolute;top: 74px;width: 100%;text-align: center;}
.map-subheading h2 {font-family: sans-serif;font-style: italic;font-size: 26px;color: #0e0e0e;letter-spacing: 0.2px;}
.map-bootom-sec {width: 100%;position: absolute;bottom: 0;}
.map-bootom-sec h2 {font-size: 26px;color: #0e0e0e;line-height: 1;padding-bottom: 0;}
.map-bootom-sec h3 {margin-top: 30px;margin-bottom: 60px;font-weight: 300;font-size: 20px;color: #0e0e0e;padding-bottom: 0;}
.list-auction {text-align: left;}
.list-auction {margin: 0 auto;display: block;max-width: 485px;}
.list-auction li {margin-bottom: 30px;}
.list-auction li:last-child {margin-bottom: 50px;}
.list-auction .icon {width: 70px;display: inline-block;vertical-align: middle;text-align: left;}
.list-auction .icon img {width: 40px;}
.list-auction .auction-msg {display: inline-block;vertical-align: middle;text-align: left;}
.auction-msg h3 {font-size: 16px;color: #0e0e0e;line-height: 1;margin-bottom: 8px;margin-top: 0; }
.auction-msg p {font-size: 15px;color: #0e0e0e;line-height: 1.2;margin: 0;font-family: sans-serif; font-weight: 300}
.easy-brid h2 {font-size: 24px;color: #00deff;font-weight: 300;}
.easy-brid h3 {margin-top: 55px;font-family: sans-serif;font-style: italic;font-size: 26px;color: #0e0e0e;}
.list-bottom form {    padding: 40px 40px 50px 40px;border: solid 1px #e1e1e1;background-color: #f9f9f9;}
.form-1, .form-2 {padding-bottom: 10px; float: left;width: 100%;position: relative;}
.form-1 input, .form-2 input, .form-1 textarea {border: 2px #d4d4d4 solid;padding: 15px 20px;height: 55px;width: 100%;box-sizing: border-box;}
.form-1 textarea {height: 186px;}
.form-2 input {width: 48.4%;margin-right: 10px;box-sizing: border-box;}
.form-2 input:last-child {margin-right: 0;}
.form-1 select, .form-2 select {border: 2px #d4d4d4 solid;height: 55px;padding: 15px 20px;background: #ffffff url(../img/selectbox_icon2.png) no-repeat 97% 50%;width: 100%;color: #0e0e0e;}
.submit-button {margin-top: 20px;text-align: center;}
.submit-button button {width: 410px;height: 60px;line-height: 60px;vertical-align: middle;text-align: center;background-color: #00deff;font-size: 18px;color: #ffffff;}
.check label, .sold-lots-sec .sold-price h5, .sold-lots-sec .sold-price span {font-weight: 400;}
.submit-button button:hover {background-color: rgba(0,222,255,0.7);}
.check {display: inline-block;width: 49%;position: relative;padding-left: 24px;margin-bottom: 20px;cursor: pointer;font-size: 14px;color: #272626;font-family: sans-serif;font-weight: 300;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;
}
/* Hide the browser's default checkbox */
.check input {position: absolute;opacity: 0;cursor: pointer;height: 0;width: 0;}
/* Create a custom checkbox */
.checkmark {position: absolute;top: -4px;left: 0;height: 20px;width: 20px;border: #d4d4d4 solid 2px;}
/* When the checkbox is checked, add a blue background */
.check input:checked ~ .checkmark {background-color: #ffffff;}
/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {content: "";position: absolute;display: none;}
/* Show the checkmark when checked */
.check input:checked ~ .checkmark:after {display: block;}
/* Style the checkmark/indicator */
.check .checkmark:after {left: 5px;top: 2px;width: 5px;height: 10px;border: solid #000000;border-width: 0 3px 3px 0;-webkit-transform: rotate(45deg);-ms-transform: rotate(45deg);transform: rotate(45deg);position: absolute;}
.check-box p {font-size: 14px;color: #0e0e0e;margin-bottom: 15px;font-family: sans-serif;font-weight:300;padding: 0;}
.small-txt {font-size: 14px;color: #0e0e0e;}

/* Liting Bidsquare css end */

/*Event page*/
.event_banner{min-height: 400px; position: relative;}
.banner_logo{max-width: 134px;}
.event_banner .banner_content{position: absolute;bottom: 30px; }
.event_banner .banner_content .text_are{width: 760px; margin-right: 70px;vertical-align: bottom;display: inline-block;max-height: 200px;overflow: hidden;}
.banner_content .text_are .date_time{display: inline-block;vertical-align: middle; margin-right: 30px; padding-right: 20px}
.banner_content .text_are .date_time h6{font-size: 16px; font-style: italic;font-family: sans-serif; }
.banner_content .text_are .auc_status{display: inline-block;margin-left: 0; padding-left: 0;vertical-align: middle;}
.banner_content .text_are .auc_status label.audio_video_ico {display: inline-block;vertical-align: middle;margin-right: 5px;}
.banner_content .text_are .auc_status label.audio_video_ico img {width: 20px;}
.banner_content .text_are .auc_status span{ font-size: 14px;margin-right: 23px;position: relative;vertical-align: middle;}
.banner_content .text_are .auc_status span:after{content: ''; position: absolute; top: 4px; right:-15px; background-color: #00DEFF; border-image-width: 2px; height: 12px;width: 2px }
.banner_content .text_are .auc_status a{color: #fff; font-size: 14px;}
.event_banner .banner_content .text_are h1{font-style: italic; font-family: sans-serif;font-size: 36px; margin-top: 10px;}
.banner_content .text_are .auc_status span img{width: 13px;}
.banner_content .text_are .auc_status a{ font-size: 14px;vertical-align: middle;}
.event_banner .banner_content .text_are p{text-shadow: 1px 1px 1px rgba(100, 100, 100, 0.7); color: #fff; font-size: 16px;font-family: sans-serif;margin-top: 10px;font-weight: 300;}
.event_banner .banner_content .text_are p a { text-decoration: underline; }
.banner_content .exclusive {margin-bottom: 5px;}
.banner_content .exclusive span{background-color: rgba(0,205,53,0.75); height: 17px; padding: 0px 3px;color: #fff; font-size: 14px;}
.event_detail_banner .display_status{float: none;width:16%;vertical-align: bottom;display: inline-block;}
.event_detail_banner .display_status a.vc{background: url(../img/svg/view_catalog_icon-white_shadow.svg) no-repeat 0px 0px; background-size: 24px; padding-left: 25px;}
.event_detail_banner .display_status .reminder {margin-top: 5px;position: relative;}
.event_detail_banner .display_status .reminder a span{background: url(../img/svg/set_reminder_white_icon_shadow.svg) no-repeat 0px -2px; background-size: 24px; padding: 0px 20px; padding-left: 25px; }
.event_detail_banner .display_status .reminder a:hover + .reminder_item ul{visibility: visible; cursor: pointer;}
.event_detail_banner .display_status .reminder .reminder_item ul{visibility: hidden; position: absolute; top: 100%; left: 0; z-index: 900; width: 130px; box-sizing: border-box; border: 1px solid #ccc; background: #fff;}
.event_detail_banner .display_status .reminder .reminder_item ul li{float: none; text-align: left; background: #fff; padding: 11px 0 11px 15px;}
.event_detail_banner .display_status .reminder .reminder_item ul li:hover{background: #f8f8f8;}
.event_detail_banner .display_status .reminder .reminder_item ul li:hover a{color: #00deff !important;}
.event_detail_banner .display_status .reminder .reminder_item ul li a{font-size: 14px; color: #0e0e0e;}
.event_detail_banner .display_status .time_start{    width: 160px; height: 30px; background: rgba(14,14,14,0.2); text-align: center; line-height: 30px;margin-top: 10px;}
.event_detail_banner .display_status .time_start{    width: 160px; height: 30px; background: rgba(14,14,14,0.2); text-align: center; line-height: 30px;margin-top: 10px;color: #fff;}
.event_detail_banner .display_status .time_start p{display: inline-block;color: #fff;font-family: sans-serif; font-size: 14px; margin-right: 5px;}
.event_detail_banner .display_status .time_start span{color: #f00;font-size: 14px;}
.reg_btn{font-size: 16px;color: #fff;background: #00cd17; width: 160px; padding: 10px 0;}
.reg_btn:hover{background:#4cdc71;}
.startTime_btnMobile button{width: 160px;}
.startTime_btnMobile .green_t, .startTime_btnMobile .pending_txt {text-align: center; margin-top: 5px;}
.event_social_banner{float: left;width: 100%; text-align: right;margin-top: 10px;}
.event_social_banner ul{float: right;margin-right: 40px;}
.event_social_banner ul li{float: left; margin-right: 5px;}
.event_social_banner ul li a{margin-right: 5px;}
.event_social_banner ul li img{width: 20px;}
.event_list #feature ul{margin-left: -23px;margin-top: 20px;display: flex;flex-wrap: wrap;}
.event_list #feature ul li{width: calc(33.33% - 23px);margin-left: 23px;-webkit-box-shadow: 3px 3px 8px 3px rgba(0,0,0,0.08); -moz-box-shadow: 3px 3px 8px 3px rgba(0,0,0,0.08); box-shadow: 3px 3px 8px 3px rgba(0,0,0,0.08); position: relative; margin-bottom: 32px;}
.event_list #feature ul li:hover .lot_desc a{text-shadow: -0.1px -0.1px 0 black, 0.1px 0.1px black;}
/* IE9, IE10, IE11 */
@media screen and (min-width:0\0) {
.event_list #feature ul {display: inherit;}
.event_list #feature ul li {float: left;}
}
.event_list #feature .img_box img{width: 100%; height: 318px;object-fit: contain;}
.event_list #feature .cont_box{float: left;width: 100%;padding: 10px 15px 10px;}
.event_list #feature .cont_box .lot_desc{display: block; overflow: hidden; /*white-space: nowrap;*/}
.event_list #feature .cont_box .lot_desc a{font-family: sans-serif; color: #0e0e0e;font-size: 20px; height: 44px; overflow: hidden; display: inline-block;}
.event_list #feature .cont_box .price_info{ font-size: 14px; font-weight: 300;}
.event_list #feature .cont_box .price_info h4{display: inline-block; margin-right: 5px;font-weight: 400;}
.event_list #feature ul li .like_icon{cursor: pointer; position: absolute; top: 12px; right: 10px;z-index: 9;}
.event_list #feature .cont_box .price_info h4.mobile_est-on, .bid_price_area .current_bid .estimate_bid.mobile_est-on {display: none;}

.event_list #feature .cont_box .price_info .estimate_label{float: left;font-weight: 400;}
.event_list #feature .cont_box .price_info .estimate_amount{float: left;width: 75%;}
.event_list #feature .cont_box .price_info .estimate_amount span{margin-left: 5px; display: block; font:inherit;}
.event_list #feature .cont_box .price_info .estimate_amount span.dual_currency{font-family: sans-serif; color: #888; font-size: 13px;}

.event_banner.white-banner .text_are, .event_banner.white-banner .text_are a, .event_banner.white-banner .display_status .view_cata a.vc, .event_banner.white-banner .display_status .view_cata a, .event_banner.white-banner .event_detail_banner .display_status .reminder a span{text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.4); color: #fff;}
.event_banner.black-banner .text_are {text-shadow: 1px 1px 1px rgba(255, 255, 255, 0.4); color: #000;}
.event_banner.black-banner .banner_content .text_are p, .event_banner.black-banner .display_status .view_cata a.vc, .event_banner.black-banner .event_detail_banner .display_status .reminder a span, .event_banner.black-banner .display_status .reminder .atcb-link, .event_banner.black-banner .banner_content .text_are .auc_status a{text-shadow: 1px 1px 3px rgba(255, 255, 255, 0.4); color: #000;}

.event_banner.white-banner .text_are .auc_status span img {-webkit-filter: drop-shadow( 1px 1px 3px rgba(0, 0, 0, 0.4) ); filter: drop-shadow( 1px 1px 3px rgba(0, 0, 0, 0.4) );}
.event_banner.black-banner .text_are .auc_status span img {-webkit-filter: drop-shadow( 1px 1px 3px rgba(255, 255, 255, 0.4) ); filter: drop-shadow( 1px 1px 3px rgba(255, 255, 255, 0.4) );}
/************/

/* Category page css start */
#category_top_slider{position: relative; margin-top: 5px;}
#category_top_slider .slideDiv{height: 480px;}
.category_slide_content{position:absolute;padding: 10px 0 10px 20px;background: rgba(0,0,0,0.5);width: 100%; height: auto;bottom: 0;}
.category_slide_content h2{margin: 0; padding: 0; color: #fff;font-size: 26px;font-family: sans-serif;font-style: italic;}
.category_slide_content p{    font-size: 14px;margin: 6px 0; line-height: 1;color: #fff;font:300 14px/16px sans-serif;}
#category_top_slider .slick-dots{padding-top: 20px;}
.category_slider_right{padding-left: 15px;}
.category_heading{float: left;width: 100%;}
.category_heading h1{font-family: sans-serif; font-style: italic; font-size: 36px; color: #0e0e0e;line-height: 1; position: relative;margin-bottom: 22px;margin-top: 20px;}
.category_heading h1:before{position: absolute;content: ''; width: 45px; height: 2px; background: #00deff; bottom: -22px;} 
.category_heading p{    font-family: sans-serif; font-size: 14px; color: #0e0e0e;margin-top: 22px;float: left;width: 100%;}
.category_slider_right ul{margin-top: 26px;float: left;width: 100%;}
.category_slider_right ul li{float: left;width: 227px;border-right: 1px solid #e0e0e0; padding:0;}
.category_slider_right ul li:nth-child(even){border-right: 0;}
.category_slider_right ul li .selected_category_area{width: 184px; height: 100px; margin: 0 auto;border-bottom: 1px solid #e0e0e0;padding-top: 8px;}
.category_slider_right ul li .selected_category_area a img{margin: 0 auto; display: block; max-width: 80px; max-height: 70px; object-fit: contain;}
.category_slider_right ul li .selected_category_area a span, .category_slider_right ul li .selected_category_area a span h2{display: block;margin: 0 auto; text-align: center;font:16px sans-serif;height: 20px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;}
.category_slider_right ul li:hover .selected_category_area a span{color:#00deff}
.innermidSec.category_landing{margin-top: 50px;}
.resultTxt{float: left;font:300 14px/16px sans-serif;padding: 15px 0 0;}
.filterRight{float: right;margin-right: 5px;}
.filterRight > *{float: left;}
.ddBox > span{font:400 14px/1 sans-serif;padding-right: 7px;}
.filterRight select option{font-size: 14px;color: #0e0e0e;}
.dropDown #limit{width: 100%;text-align: right;border: #ccc solid 1px;padding: 5px 4px 5px 10px;background: url(../img/selectbox_icon.png) no-repeat 92% 50%;}
.width136{width: 136px;}
.width48{width: 48px;}
.ddBox{display: inline-block;vertical-align: middle;}
.ddBox ~ .ddBox{margin-left: 30px;}
.filtertop{margin-bottom: 11px;}
.mobiFilter{display: none;color: #868686;font:400 14px/1 sans-serif;float: left;background-color: transparent;padding: 0}
.mobiFilter span{color: #00deff}


/* Category page css end */

/* Left filter sidebar css start */
.leftAside{padding-right: 13px;width: 22.331%;}
.filtUl{background: #f9f9f9; border: 1px solid #eee;padding: 23px 13px 25px 13px}
.hiddenLi{display: none;}
.filtUl > li ~ li{border-bottom: 1px solid #e1e1e1;margin-top: 20px;padding-bottom: 20px;}

.filtTitle{font:400 16px/20px sans-serif;/*padding-bottom: 20px;*/}
.filtTitle a{color: #0e0e0e;display: block;position: relative;}
.filtTitle a:after{position: absolute;right: 0;top: 0;bottom: 0;margin: auto;content: '';background: url(../img/menu_down_icon.png) no-repeat center center;width: 13px;height: 7px;-webkit-transition: transform 0.5s ease;transition: transform 0.5s ease;}
.filtTitle a.arrowUp:after{-webkit-transform: rotate(-90deg);transform: rotate(-90deg);}
.filtTitle small{position: absolute;right: 20px;top: 50%;-webkit-transform: translateY(-50%);transform: translateY(-50%);color: #3ee6ff;font-size: 12px;line-height: 1;margin-top: -1px;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;max-width: 80px;display: none;font-weight: 300;}
.mobiTitle button.doneBtn {position: absolute;right: 14px;background: none;}



.keyTxt{border: 1px solid #ccc;padding: 0 25px 0 12px;color: #0e0e0e;height: 31px;font:300 14px/15px sans-serif;width: 100%;vertical-align: top;}
.keyTxt::-webkit-input-placeholder {color:#747474}
.keyTxt:-moz-placeholder {color:#747474;opacity:1;}
.keyTxt::-moz-placeholder {color:#747474;opacity:1;}
.keyTxt:-ms-input-placeholder {color:#747474;} 
.keySearch{position: relative; margin-top: 20px;margin-bottom: 10px;}

.chkBox input[type="checkbox"], .chkBox label{margin: 0;padding: 0 05px 0 25px;position: relative;font:400 14px/16px sans-serif;cursor: pointer;display: block;width: 100%; position: relative;}
.chkBox label:before{width: 16px;height: 16px;position: absolute;left: 0;top: 0;content: '';}
.toggleDown > ul > li a{font:400 14px/18px sans-serif;position: relative;}
.hasArrow:before{display: inline-block;vertical-align: top;content: '<';margin: -1px 2px 0 0}
.toggleDown > ul {padding: 10px 0;}
.filter-list.toggleDown{max-height:178px; overflow:auto;} 
.toggleDown > ul li{padding-top: 20px;}
.toggleDown > ul > li ul{padding-left: 20px;}
.toggleDown ul li a{font-weight: 300;position: relative;display: block;padding-right: 35px;}
.toggleDown ul li a .countSmall{margin: 1px 0 0}
.toggleDown .priceRange{margin-top: 20px;}
.cat_active > span{font-weight: 700;font-size: 14px;position: relative;display: block;padding-right:5px;}
.radio-check > ul > li ~ li {padding-top: 0;}
.radio-check > ul > li .chkBox {line-height: 2.5;}
[type="radio"]:checked,
[type="radio"]:not(:checked) {
    position: absolute;
    left: -9999px;
}
[type="radio"]:checked + label,
[type="radio"]:not(:checked) + label
{
    position: relative;
    padding-left: 28px;
    cursor: pointer;
    display: inline-block;
    font-weight: 400;
}
[type="radio"]:checked + label:before,
[type="radio"]:not(:checked) + label:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 18px;
    height: 18px;
    border: 1px solid #ddd;
    border-radius: 100%;
    background: #fff;
}
[type="radio"]:checked + label:after,
[type="radio"]:not(:checked) + label:after {
    content: '';
    width: 10px;
    height: 10px;
    background: rgba(0,222,255,1);
    position: absolute;
    top: 3px;
    left: 3px;
    border-radius: 100%;
    -webkit-transition: all 0.2s ease;
    transition: all 0.2s ease;
}
[type="radio"]:not(:checked) + label:after {
    opacity: 0;
    -webkit-transform: scale(0);
    transform: scale(0);
}
[type="radio"]:checked + label:after {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
}





.priceRange > *{float: left;}
.priceRange input[type="text"]{border: 1px solid #ccc;width: 55px;padding: 0 4px;font:300 14px/16px sans-serif;height: 27px;color: #0e0e0e}
.priceRange .width50{width: 50px;}
.toSpan{line-height: 27px;margin: 0 4px;}
.goBtn{background-color: #00deff;color: #ffffff;width: 34px;font:300 14px/27px sans-serif;text-align: center;border:0;margin-left: 1px;padding: 0}
.scrollUl{max-height: 178px;overflow-y: auto}


.category-check .checkmark {width: 16px;height: 16px;top: -1px;}
.category-check .checkmark:after {left: 4px;top: 0px;width: 5px;height: 10px;border-width: 0 2px 2px 0;}


ul.filter-categories li a {font-size: 14px; position: relative; display: block; padding-right:5px;font-weight: 300;} 
ul.filter-categories li.hasArrow > a, ul.filter-categories li.hasArrow > span{display: inline-block;width: 91%;}
ul.filter-categories li.cat_active > span{width: 100%;}
ul.filter-categories li a span.countSmall, ul.filter-categories li.hasArrow span.countSmall{font-size: 12px; color: #969696; float: right;}
.toggleDown > ul li label .countSmall{font-size: 12px; color: #969696;float: right; }

/* Left filter sidebar css end */

/* Rigth sidebar css start */
.rightSide{padding-left: 13px;width: 77.669%}
.gridWrapper{margin: 0 -13px;display: flex;flex-flow: wrap;}
@media screen and (min-width:0\0) { 
.gridWrapper .gridBox {float: left;}
}
.gridBox{padding: 0 13px 0;margin-bottom: 20px;width: 33.23%;position: relative;}
.gridInner figure{position: relative;margin: 0 0 13px; width: 240px; height: 240px; display: block;}
.gridInner figure a.catalog_figure_img{height: 100%; }
.auction_bar {position: absolute; top: 0; left: 0; width: 100%; z-index: 1; text-align: center; background-color: rgba(0,205,53,0.7); height: 24px; line-height: 24px; vertical-align: middle; color: #fff; font-size: 14px; }
.gridInner figure img.figure_img{height: 240px; max-width: 100%; margin: 0 auto; object-fit: contain; display: block;}
.auction_bar .lot_num {font-family: sans-serif; display: inline-block; color: #fff;}
.auction_bar img{width: 14px;position: relative;top:-2px;}
div.current_lot_active .auction_bar {display: block !important;}


.gridInner figure a{display: block;position: relative;}
.gridInner figcaption{position: absolute;left: 0;bottom: 0;right: 0;background-color: rgba(0,0,0,0.4);color: #ffffff;font:400 12px/30px sans-serif;padding: 7px 8px;z-index: 1; display: none;}
body:not(.can-touch) .gridInner figure:hover figcaption {display: block;}
.gridInner figcaption .estimate_label{float: left; width: 22%; line-height: normal;}
.gridInner figcaption .estimate_amount{float: left;width: 78%;}
.gridInner figcaption .estimate_amount small{margin-left: 7px; display: block; line-height: normal;word-break: break-word;}
.gridInner figcaption .estimate_amount small.dual_currency{font-family: sans-serif; color: #ddd; font-weight: 300;}
.gridInner .lot_num{font-size: 14px; color: #0e0e0e}
.gridCon h3{height: 35px;max-width: 90%}
.gridCon h3 a{color: #0e0e0e;font:400 14px/1.1 sans-serif;display: inline-block;vertical-align: top;}
.gridCon{position: relative;}
.gridInner .like_icon{position: absolute;right: 0;top: 0;padding: 0; cursor: pointer;z-index: 9}
.gridInner .like_icon .btn-icon.btn-icon-heart, .gridInner .like_icon .btn-icon-heart-on {display: inline-block;}
.gridInner .like_icon .btn-icon.btn-icon-heart:before, .gridInner .like_icon .btn-icon-heart-on:before {width: auto;height: auto;}
.exclusive_label_container .exclusive_circle {position: absolute; width: 15px; height: 15px; padding: 1px; font-size: 12px; color: #fff; text-align: center; background: #00cd35; top:22px; right: 3px; border-radius: 50%;display: inline-block;margin-top: 5px; }
.exclusive-tooltip {width: max-content;}
.exclusive-tooltip .tooltip-inner{background:#00cd35; font-size: 12px; padding: 0 3px; border-radius: 0;}
.exclusive-tooltip.top{padding: 0;}

.sellerDetail{border-bottom: 1px solid #e9e9e9;padding: 8px 0 5px;margin: 0 0 9px; float: left; width: 100%}
.sellerName{color: #0e0e0e;font:300 12px/16px sans-serif;display: inline-block;vertical-align: top;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;max-width: 55%;}
.timeCounter{color: #ff0000;font:400 12px/16px sans-serif;float: right; width: 43%; text-align: right;}

.bidPrice{font:400 16px/1 sans-serif; float: left; width: 100%;}
.bidPrice .bid_txt span{color: #747474;font:300 12px/16px sans-serif;padding-right: 10px;float: left;}
.bidPrice .bid_txt {float: left;width: 75%;}	
.item-detail .bidPrice {display: block;position: relative;}
.item-detail .bidPrice .bid_txt .currency_container{text-align: left;}	
.item-detail .enterBid button.pending{background:transparent;}	
.bidPrice .bid_txt .currency_container{float: left; width: 55%;}	
.bidPrice .bid_txt .currency_container span{display: block;width: 100%; font-size: 16px; color: #0e0e0e; font-weight: normal;}	
.bidPrice .bid_txt .currency_container span.converted_curr{display: block; font-size: 13px; color: #888; font-weight: 300;padding-top: 2px; }
.bidLength{float: right;color: #747473;font:400 14px/1 sans-serif;}

.item-detail .bidPrice .bid_txt {display: inline-block;vertical-align: bottom;/*float: none;*/}
.item-detail .bidPrice .bid_txt .currency_container{display: block;clear: both;}
.item-detail .bidPrice .bid_txt .currency_container span.converted_curr{line-height: 14px;color: #888; font-weight: 300;padding-top: 2px; }
.item-detail .bidLength {display: inline-block;vertical-align: bottom;text-align: right;width: 25%;/*float: none;*/position: absolute;bottom: 0;right: 0;}

.enterBid{display: inline-block;vertical-align: top;width: 100%;margin-top: 8px;}
.enterBid > *{float: left;}
.sold_txt {text-align: center; width: 100%;}
.enterBid input{height: 29px;border: 1px solid #ccc;color: #0e0e0e;font:300 12px/1 sans-serif;padding: 0 4px;width: 53.34%;}

.enterBid button, .bidDiv button{display: inline-block;vertical-align: top;color: #ffffff;background-color: #00cd35;font:400 13px/29px sans-serif;padding: 0 15px;text-align: center;}
.enterBid button{width: 44%;padding: 0 5px;margin-left: 2.66%; min-width: auto;}
.enterBid.align-center button {float: none;}
.enterBid.align-center button.pending  {width:100%;float: none; background:transparent;margin: 0;}
.enterBid .placeBidbtn{margin-left: 0}
.enterBid button.pending {background-color:#eeeeee;}

.pagiDiv{text-align: center;padding: 4px 0 0}
.pagination > li{height: 26px;border-bottom: 2px solid transparent;margin: 0 4px;display: inline-block;vertical-align: middle;}
.pagination > li > a{color: #949494;padding: 0 8px;display: inline-block;vertical-align: top;}
.pagination > li > a:hover,.pagination > li > a.active:hover{background: none !important; color: #0e0e0e !important;}
.pagination > li > a, .pagination > li > span{border: 0;font:300 14px/24px sans-serif;float: none;margin: 0}
.pagination > li {font:300 14px/24px sans-serif;color: #949494;}
.pagination > li.active{border-color: #00deff;}
.pagination > li.active > a{background-color: transparent;color: #0e0e0e}
.prevLi:before{display: inline-block;vertical-align: middle;border-right: 10px solid #00e0ff;border-bottom: 5.5px solid transparent; border-top: 5.5px solid transparent;content: '';margin: 2px 0 0;}
.nextLi:after{display: inline-block;vertical-align: middle;border-left: 10px solid #00e0ff;border-bottom: 5.5px solid transparent; border-top: 5.5px solid transparent;content: '';margin: 2px 0 0;}

.disabled{cursor: not-allowed;}

.mBtn{display: none;text-align: center;margin-top: 15px;}
/* Rigth sidebar css end */

/* Contact Us css start */
.contact-subhead {margin-top: 48px;}
.contact-subhead h3 {font-weight: 400;font-size: 20px;color: #0e0e0e;line-height: 1.1;}
.contact-subhead h4 {margin-top: 55px;margin-bottom: 30px;font-family: sans-serif;font-style: italic;font-size: 20px;color: #0e0e0e;}
.contact-subhead a {width: 410px;height: 60px;line-height: 60px;vertical-align: middle;text-align: center;background-color: #00deff;font-family: 'sans-serif-regular';font-size: 18px;color: #ffffff;display: block;margin: 0 auto;}
.sec-contact-line {width: 960px;max-width: 100%;margin: 50px auto 40px;display: block;height: 1px;background-color: #e5e5e5;}
.phone-support {margin-bottom: 35px;font-size: 16px;color: #0e0e0e;line-height: 1.2;font-family: sans-serif;font-weight:300;}
.contact-subhead a h2 {width: 410px;height: 60px;line-height: 60px;vertical-align: middle;text-align: center;background-color: #00deff;font-size: 18px;color: #ffffff;display: block;margin: 0 auto;}
.sec-contact-line {width: 960px;max-width: 100%;margin: 50px auto 40px;display: block;height: 1px;background-color: #e5e5e5;}
.phone-support {margin-bottom: 35px;font-size: 16px;color: #0e0e0e;line-height: 1.2;font-weight:300;}
.list-form-section form {padding: 40px 35px;border: solid 1px #e1e1e1;background-color: #f9f9f9;}
.list-form-section form .name_area {float: left;width: 49%; margin-right: 6px}
.list-form-section form .name_area:last-child{margin-right: 0;}
.list-form-section form .name_area input{width: 100%;}
.list-middle a.mailto {text-decoration: underline;color: #00deff;}
/* Contact Us css end */
/* Register css start */
.bread_navi .breadcrumb{background-color: transparent; border-radius: 0;margin-bottom: 0;padding:9px 0;font-weight: 300;}
.bread_navi .breadcrumb a{color: #949494;font-size: 12px;}
.bread_navi .breadcrumb a:hover{color: #0e0e0e;}
.bread_navi .breadcrumb span{color: #0e0e0e;font-size: 12px;font-family: sans-serif;font-weight: 300;}
.breadcrumb-item + .breadcrumb-item::before {display: inline-block; padding-right: 5px; padding-left: 5px; font-family: "icon-orange"; font-size: 9px; line-height: 1; color: #949494; content: ">"; }
.register_head h1{font: 400 32px/1.2 sans-serif; color: #0e0e0e;}
.register-subhead {margin: 20px 0 48px;}
.step2 .register-subhead {margin-top: 0px;}
.register-subhead h2 {font-size: 26px;line-height: 1.3;color: #0e0e0e;font-style: italic;font-family: sans-serif;}
.resister-bottom {background-color: #f9f9f9;border: 1px #e1e1e1 solid;padding: 32px 0 45px;}
.register-form-txt {margin: 18px 0 27px;color: #0e0e0e;text-align: center;font-size: 16px;font-family: sans-serif;padding-bottom: 0;}
.resister-bottom form {max-width: 412px;margin: 0 auto;}
.resister-bottom form .form-1, .resister-bottom form .form-2 {padding-bottom: 20px;position: relative; float: left;width: 100%;}
.resister-bottom form .check {padding-left: 28px;}
.resister-bottom form a {color: #00deff;}
.resister-bottom form .check {width: 100%;margin-bottom: 0;}
.resister-bottom form .form-2 .name_area {width: 49.1%;margin-right: 7px;float: left;}
.resister-bottom form .form-2 .name_area input{width: 100%;}
.resister-bottom form .form-2 .name_area.last {margin-right: 0px; position: relative;}
.password-check-box {position: absolute;right: 20px;top: 20px;}
.account-right .form-group .password-check-box { right: 10px; top: 10px; }
.account-right .form-group .password-check-box label.password-check { margin: 0; }
.resister-bottom .submit-button button {font-size: 16px;color: #fff;background-color: #00deff;font-family: sans-serif;font-weight: 400;padding: 15px 0;width: 410px;line-height: inherit;box-sizing: border-box;margin-top: 10px;}
.resister-bottom .submit-button button:hover {background-color: rgba(0,222,255,0.7);}
.signin-area {text-align: center;padding-top: 27px;}
.signin-area p {font-family: sans-serif;color: #999999;font-size: 15px;}
/* Register css end */
/* Terms & Condition css start */
.terms-condition h2 {margin: 60px 0 25px;font-family: sans-serif;font-weight: 400;font-size: 20px;color: #0e0e0e;padding-bottom: 0;}
/*.terms-condition h2 {margin: 60px 0 25px;font-family: sans-serif;font-weight: 400;font-size: 20px;color: #0e0e0e;padding-bottom: 0;}
.terms-condition p , .terms-condition ol li{font-family: sans-serif;font-weight: 300;font-size: 16px;line-height: 1.5;color: #0e0e0e;padding-bottom: 0;}
p.terms-sub {font-size: 15px;color: #0e0e0e;font-weight: 400;}
.terms-condition h3 {margin: 32px 0 8px;font-family: sans-serif;font-weight: 400;font-size: 16px;color: #0e0e0e;line-height: 1;}
.terms-condition ul {padding-left: 23px;}
.terms-condition ul li {margin-bottom: 30px;font-family: sans-serif;font-size: 16px;line-height: 1.5;color: #0e0e0e;font-weight: 300;position: relative;}
.terms-condition ul li:last-child {margin-bottom: 0;}
.terms-condition ul li:before {position: absolute;content: "";width: 8px;height: 8px;background-color: #4a4949;top: 7px;left: -17px;}
.required_msg {text-align: center;font-size: 14px;}
.required_msg span{color: #ff0000;}
.resister-bottom .submit-button{margin-top: 0;}*/
/* Terms & Condition css end */
/* Sitemap css start */
.sitemap {padding-top: 78px;}
.sitemap h3 {font-family: sans-serif;font-size: 20px;font-weight: 400;color: #0e0e0e;padding-bottom: 23px;}
.sitemap ul li {padding-bottom: 16px;}
.sitemap h2 {font-family: sans-serif;font-size: 20px;font-weight: 400;color: #0e0e0e;padding-bottom: 13px;}
.sitemap ul li {padding-bottom: 8px;}
.sitemap ul li:last-child {padding-bottom: 0;}
.sitemap ul li a {font-family: sans-serif;font-weight: 400;font-size: 14px;color: #666666;}
.sitemap ul li a:hover {color: #00deff;}
.sitemap-bottom {padding-top: 117px;}
/* Sitemap css start */
/* How It Work css start */
.how-it-work-sub {padding: 8px 0 46px;}
.how-it-work-sub h3 {font-size: 20px;color: #0e0e0e;font-family: sans-serif;font-style: italic;}
.full-hr {border-bottom: 1px solid #e0e0e0;}
.how-it-work {padding-top: 40px;}
.left-sec {padding-top: 25px;}
.left-sec li {padding-bottom: 27px;}
.left-sec li:last-child {padding-bottom: 0;}
.left-sec li a {font-size: 16px;font-family: sans-serif;font-weight: 400;color: #787878;}
.left-sec li a:hover, .left-sec li.on a, .right-sec .panel-title > a:hover, .right-sec .panel-body a {color: #00deff;}

.right-sec {padding-top: 25px;padding-left: 30px;border-left: 1px #d6d6d6 solid;}
.right-sec h3 {font-family: sans-serif;color: #00deff;font-size: 20px;font-weight: 400;}
.right-sec h1 {font-family: sans-serif;color: #00deff;font-size: 20px;font-weight: 400;}
.right-sec .panel-group {margin-bottom: 0;padding-top: 24px;}
.right-sec .panel-group .panel {box-shadow: inherit;margin: 0;border-top: 0;border-left: 0;border-right: 0;border-bottom: #e0e0e0 solid 1px;}
.right-sec .panel-group .panel:first-child {border-top: #e0e0e0 solid 1px;}    
.right-sec .panel-group .panel:last-child {border: 0;}    
.right-sec .panel-group .panel:last-child .collapse.in {border-bottom: #e0e0e0 solid 1px;}
.right-sec .panel-group .panel-heading {padding: 0;background: inherit;}
.right-sec .panel-group .panel-heading + .panel-collapse > .panel-body, .right-sec .panel-group .panel-heading + .panel-collapse > .list-group {border: 0;padding: 0 0 16px 20px;font-family: sans-serif;font-weight: 300;line-height: 1.5;font-size: 16px;}
.right-sec .panel-title > a {padding: 22px 0;display: block;font-size: 16px;color: #0e0e0e; line-height: 1.2;font-family: sans-serif;font-weight: 400;position: relative;padding-left: 20px;}
.right-sec .panel-title > a:before {content: "\f0d7";font-family: "FontAwesome";padding-right: 8px;color: #0b0b0b;font-size: 20px;position: absolute;left: 0;}
.right-sec .panel-title{padding-bottom: 0;}
.right-sec .panel-title > a {padding: 22px 0;display: block;font-size: 16px;color: #0e0e0e; line-height: 1.2;font-family: sans-serif;font-weight: 400;position: relative;padding-left: 20px;}
.right-sec .panel-title > a:before {content: "\f0d7";font-family: "FontAwesome";padding-right: 8px;color: #0b0b0b;font-size: 20px;position: absolute;left: 0; bottom:36%;}
.right-sec .panel-title > a.collapsed:before{content: "\f0da";font-family: "FontAwesome";color: #0cc7f4;}
.right-sec .panel-body iframe {padding-top: 30px;width: 100%;}
.right-sec .sub-panel {padding-top: 30px;}
.right-sec h4 {font-family: sans-serif;font-weight: 400;}
.right-sec .panel-body img {display: block;margin: 0 auto;}
.right-sec .panel-body ul {margin: 0 auto;text-align: center;max-width: 548pc;padding-top: 14px;}
.right-sec .panel-body ul li {display: inline-block;vertical-align: top;width: 75px;margin-right: 76px;text-align: center;line-height: 1.2;font-size: 16px;    font-family: sans-serif;font-weight: 3000;color: #0e0e0e;}
.right-sec .panel-body ul li:last-child {margin-right: 0;}
.right-sec .panel-body .img-area {padding: 40px 0 30px;}
.right-sec .panel-body a:hover {text-decoration: underline;}
.right-sec .panel-body .left-img img {margin: 0;}
.sub-panel1 {padding: 30px 0;}
.subpanel2 {padding: 40px 0 30px;}
/*How it works mobile*/
#category_switch{display: none;}
/*How it works mobile*/
/* How It Work css end */

/*Auction information*/

.f_caption_txt_xlg {font-size: 18px; color: #0e0e0e;}
#auc_info h2{padding-bottom: 20px;}
#auc_info .info_detail_wrap {overflow: hidden; padding-bottom: 50px;border-bottom: 1px #e9e9e9 solid; }
#auc_info .info_detail_wrap .info_detail_left{float: left; width: 740px; line-height: 1.5;}
#auc_info .info_detail_wrap .info_detail_left .img_area{float: right; width: 250px; height: 250px; line-height: 250px; cursor: pointer; display: inline-block; vertical-align: top; margin-left: 50px; margin-bottom: 20px;} 
#auc_info .info_detail_wrap .info_detail_left .img_area img{max-width: 100%; max-height: 100%; display: inline-block; vertical-align: middle;} 
#auc_info .info_detail_wrap .info_detail_left .main_read_more_div span{font-size: 16px;color: #0e0e0e; font-weight: 300;}
#auc_info .info_detail_wrap .info_detail_left .main_read_more_div span.trigger{color: #999999; cursor: pointer; font-size: 14px;}
#auc_info .info_detail_wrap .info_detail_right{float: left;width: 155px; margin-left: 40px;}
#auc_info .info_detail_wrap .info_detail_right h5{font-size: 24px; color: #0e0e0e;line-height: 1.2; margin-bottom: 15px;font-weight: 400;}
#auc_info .info_detail_wrap .info_detail_right .caption_text{margin-bottom: 10px;}
#auc_info .info_detail_wrap .info_detail_right .caption_text *{    font-size: 14px; color: #0e0e0e;font-family: sans-serif; padding-bottom: 0;}
#auc_info .info_detail_wrap .info_detail_right .caption_text *{ font-size: 14px; color: #0e0e0e;font-family: sans-serif; padding-bottom: 0;}
#auc_info .info_detail_wrap .info_detail_right .caption_text.con_inf p{padding: 2px 0;}
#auc_info .info_detail_wrap .info_sns a { margin-right: 5px; }
.auc_table_sec{padding: 60px 50px 45px 10px; float: left;width: 100%;}
.auc_table_sec .auc_table{float: left;width: 237px;}
.auc_table_sec .auc_table h2{padding-bottom: 30px;}
table {font-size: 14px;color: #0e0e0e;}
table thead th{background:#f9f9f9;font-weight: 400;}
table tr td{font-weight: 300;}
.table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td{border-color: #eee;}
.bid_inc{margin-left: 200px;}
.shipping_text{float: left;width: 100%; margin-bottom: 65px;}
.shipping_text .ship_text span{font-size: 16px; color: #0e0e0e; font-weight: 300; line-height: 25px;}
.shipping_text .ship_text span.trigger{color: #999999; cursor: pointer; font-size: 14px;}
#auc_info .info_detail_wrap .info_detail_right{float: left;width: 155px; margin-left: 40px;}
.term_cond{float: left;width: 100%;}
.term_cond .text_terms{overflow-y: auto;padding: 5px 10px 5px 0;height: 300px; font-weight: 300;font-size: 16px; color: #0e0e0e; line-height: 25px;}
/*Auction Information*/
/*Live Auction tab*/
.event_list .live-panel-top {margin-bottom: 10px;}
.event_list ul.nav-tabs li span.tip-live{background: #00cd35; padding: 1px 3px; line-height: 1; margin-left: 6px; margin-top: 1px; display: inline-block; font-size: 10px; color: #fff;position: relative;top: -5px;}
.event_list ul.nav-tabs li span.audio-video-icon {position: absolute;right: -24px;top: 8px;line-height: 1;}
.event_list ul.nav-tabs li span.audio-video-icon img {width: 20px;}
.live_lot_num { font-family: sans-serif;font-weight: 400; width: 100%}
.live_lot_num span{ font-size: 18px;line-height: 1.1; color: #181818;display: inline-block;vertical-align: middle;}
.live_lot_title{ font-size: 20px; color: #000000; line-height: 1.1;font-weight: 400;display: inline-block;padding-left: 4px; overflow: hidden; text-overflow: ellipsis; width: 85%;vertical-align: middle;font-family: sans-serif;    white-space: nowrap;}
.main_item_img{padding: 10px 0; width: 320px; height: 320px; vertical-align: middle; text-align: center; font-size: 0; margin: 0 auto;}
.main_item_img a.MagicZoomPlus{width: 100% !important;}
.main_item_img img{width: 320px; object-fit: contain;vertical-align: middle;height: 320px;}
.main_item_img .MagicZoomPlus img{width: 320px; object-fit: contain;vertical-align: middle;height: 320px;}
.item_img_list{float: left;width: 100%;margin-top: 15px;}
.item_img_list ul li {width: 52px; height: 52px;line-height: 47px;margin-top: 10px;float: left;margin-right: 10px;border: #e0e0e0 solid 1px;    text-align: center;}
.item_img_list ul li.on, .item_img_list ul li.active, .item_img_list ul li:hover {border: 1px #00deff solid;}
.item_img_list ul li img{max-width: 100%; max-height: 100%;  display: inline-block;}
.live_lot_desc {float: left;width: 100%; margin-top: 15px;}
.live_lot_desc span.desc_title{font-family: sans-serif;font-size: 14px; color: #0e0e0e; display: inline-block;margin-bottom: 8px;font-weight: 400;}
.live_lot_desc .full_desc{border-top: 1px solid #e0e0e0;padding-top: 8px; }
.live_lot_desc .full_desc *{font-size: 14px; color: #484848; font-weight: 300; line-height: 1.45;font-family: sans-serif;}
.live_lot_desc .full_desc, .live_lot_desc .full_desc *{font-size: 14px; color: #484848; font-weight: 300; line-height: 1.45;font-family: sans-serif;}
.bid_price_area{float: left;width: 100%;}
.bid_price_area .current_bid{width: 48%; box-sizing: border-box; display: inline-block; vertical-align: middle; margin-right: 5px;padding: 7px 0; text-align: center}
.bid_price_area .current_bid .estimate_bid{font-size: 14px; color: #0e0e0e; font-weight: 300; display: inline-block; vertical-align: top;}
.bid_price_area .current_bid .estimate_bid span {font-weight: 400;}

.bid_price_area .current_bid .estimate_wrapper{display: block; margin: 0 auto; text-align: center; }
.bid_price_area .current_bid .estimate_amount{display: inline-block;}
.bid_price_area .current_bid .estimate_amount span{margin-left: 1px; display: block; color:inherit; font:inherit; text-align: left}
.bid_price_area .current_bid .estimate_amount span.dual_currency{font-family: sans-serif; color: #888; font-size: 13px; font-weight: 300;}

.bid_price_area .current_bid .live_bid{font-size: 22px; color: #0e0e0e;font-size: 38px;font-weight: 400;font-family: sans-serif;}
.bid_price_area .reg_bid_btn{width: 48%; display: inline-block; vertical-align: middle;   text-align: center; cursor: pointer;} 
.bid_price_area .reg_bid_btn.bid_disabled button.f_live_bid_btn_txt, .bid_price_area .reg_bid_btn.bid_closed button.f_live_bid_btn_txt{border: 1px solid #838383; background-color: #838383; background-image: none;}
.bid_price_area .reg_bid_btn:not(.bid_disabled) button.f_live_bid_btn_txt.leb:active{background: #1a4000; border-color: #3d6f0d; transition: all 170ms linear; opacity: .85;}
.bid_price_area button.f_live_bid_btn_txt.pending_txt{background-image: none; background-color: #eeeeee; border: 1px solid #eeeeee;}
#live_auc .ack_bid_msg{font-size: 12px; margin: 4px auto 0; display: block; width: 100%;}
.bid_price_area .reg_bid_btn button.leb:disabled {opacity: 1;}
.bid_price_area .dyn-bid-price button.f_live_bid_btn_txt{font-size: 17px;}
.bid_price_area .reg_bid_btn button.leb .f_live_bid_btn_sub_txt {display: block; color: #ffffff; font-size: 14px; margin-bottom: 2px;}
.bid_price_area .reg_bid_btn button.leb span.f_live_bid_btn_txt {display: block;}
.current_bid_txt {width: auto; height: auto; padding: 0; line-height: 1.1 !important; }
.msg_center{margin-top: 5px;}
.msg_center i{display: none;}
.msg_center .msg_title{background-color: #3e474d; width: 100%; height: 28px; box-sizing: border-box; padding: 4px 15px;border-top-left-radius: 8px;border-top-right-radius: 8px;}
.msg_center .msg_title .msg_title_left{float: left;width: 50%;}
.msg_center .msg_title .msg_title_left span{font-size: 14px; color: #ffffff;}
.msg_center .msg_title .audio_icon{float: right;}
.msg_center .msgBox .vol_ctl {position: absolute; right: 0; width: 150px; background: #ccc; height:auto; padding: 5px 15px; top: 0; box-sizing: border-box; border-left: 1px solid #e0e0e0; border-bottom: 1px solid #e0e0e0; }
.msg_center .msgBox .vol_ctl .slider.slider-horizontal{width: 110px;}
.msgBox{position: relative;float: left;width: 100%;border: 1px #e0e0e0 solid;}
.msgBox .msg_content{line-height: 1.5; padding: 14px; height: 369px; overflow: auto; background-color: #ffffff;} 
.msgBox .msg_content span{color:#0e0e0e; font-weight: 400; font-size: 14px;font-family: 'opensans_regular';padding-right: 7px;float: left;width: 100%; word-break: break-word;}
.msgBox .msg_content span hr {border-top: 2px solid #ccc; margin: 8px 0;}
.msgBox .msg_content span.impt{font-weight: bold; font-size: 16px; padding-right: 0px;}
.msgBox .msg_content span > span.impt{float: none;}
.msgBox .msg_content span.deep {color: #ff0000;}
.msgBox .msg_content .msg-txt-left {float: left;width: 20%;}
.msgBox .msg_content .msg-txt-right {float: left;width: 80%;}
.msgBox .msg-box-txt {width: 100%;display: inline-block; float: left;}
.r_text{color: #f00 !important; font-weight: normal !important;text-transform: uppercase;}
.g_text{color: #00cd35 !important; font-weight: normal !important;text-transform: uppercase;}
.biding_item{background-color: #f9f9f9; border-top: 1px #e0e0e0 solid;padding: 13px 20px 9px; overflow-x: scroll; width: 100%; margin-top: 10px;}
.biding_item ul{white-space: nowrap;}
.biding_item ul li{display: inline-block; vertical-align: top; margin-right: 11px; position: relative;}
.biding_item ul li.closed .closed_img_wrap, .biding_item ul li.won .closed_img_wrap, .biding_item ul li.unsold .closed_img_wrap {opacity: 0.3;}
.biding_item ul li .closed_img_wrap, .biding_item ul li .unsold_img_wrap{font-size: 12px;}
.biding_itemm ul li .num {font-size: 12px; color: #242424;}
.biding_item ul li .registered_item_img {width: 70px; height: 70px; border: 1px #eee solid; text-align: center; background-color: #fff; line-height: 68px; font-size: 0; }
.biding_item ul li .registered_item_img img {max-width: 100%; max-height: 100%; display: inline-block; vertical-align: middle; }
.biding_item ul li .closed_txt_wrap{font-size: 12px; text-align: center;}
.biding_item ul li.closed .closed_txt_wrap, .biding_item ul li.won .won_txt_wrap, .biding_item ul li.closed .closed_txt_wrap, .biding_item ul li.on .on_txt_wrap, .biding_item ul li.unsold .unsold_txt_wrap  {text-align: center; font-size: 12px; color: #0e0e0e; line-height: 1.2; } 
.biding_item ul li .closed_txt_wrap .closed_txt, .biding_item ul li .won_txt_wrap .won_txt, .biding_item ul li .on_txt_wrap .on_txt, .biding_item ul li .unsold_txt_wrap .unsold_txt {font-size: 12px; padding-bottom: 0; font-family: sans-serif;font-weight: 400; }
.biding_item ul li .closed_txt_wrap .closed_num, .biding_item ul li .won_txt_wrap .won_num {font-size: 12px;font-family: sans-serif;}
.biding_item ul li.closed .closed_txt_wrap .closed_txt {color: #0e0e0e;}
.biding_item ul li.closed .closed_txt_wrap .closed_num, .biding_item ul li.won .won_txt_wrap .won_num, .biding_item ul li.on .on_txt_wrap .on_num {font-weight: 400; }
.biding_item ul li.won .won_txt_wrap .won_num {color: #00cd35;}
.biding_item ul li.on .on_txt_wrap .on_txt {font-weight: 400;padding-top: 7px;}
.biding_item ul li .now_bid{width: 43px; height: 19px; position: absolute; top: -10px; right: -7px; z-index: 200;}
.biding_item ul li.closed .now_bid{display: none;}
.biding_item ul li.on .registered_item_img {width: 75px; height: 75px; border: 2px #00cd35 solid; line-height: 71px; }
.biding_item ul li.like .registered_item_img {width: 75px; height: 75px; border: 2px #00deff solid; line-height: 71px;}
.biding_item ul li .registered_item_img.fav_item_live {width: 75px; height: 75px; border: 2px #00deff solid; line-height: 71px;}
/*.biding_item ul li.closed .registered_item_img {border: 1px #e0e0e0 solid;}*/
.biding_item ul li.on .registered_item_img.fav_item_live span {background: none; }
.biding_item ul li.on .registered_item_img{    border: 2px #00cd35 solid;}
/*.biding_item ul li.like .like-icon {position: absolute;right: 0;top: -5px;width: 13px;}*/
.biding_item ul li .unsold_txt_wrap .unsold_txt {padding-top: 10px;}
.live-panel-left {width: 100%;display: inline-block;overflow-y: auto;height: 490px;}
.biding_item ul li.closed .closed_txt_wrap .closed_txt.youWon {color: #00cd35;}
.live_wrap .live-pannel-wrap {width: 50%;float: left;padding-right: 15px;padding-left: 15px;}
.bidder_no_area {text-align: right;padding-bottom: 8px;}
.bidder_no_area span {font-size: 12px;color: #0e0e0e;padding-right: 8px;font-weight: 300;vertical-align: middle;}
.bidder_no_area i {position: relative;color: #fff;font-size: 11px;text-align: center;line-height: 27px;vertical-align: middle;font-style: normal;width: 28px;height: 36px;display: inline-block;letter-spacing: -0.4px;}

/*Live Auction tab*/
.padding-left{padding-left: 0;}
.padding-right{padding-right: 0;}
/* Item Details css start */
.detail-mail-heading {padding: 20px 0;}
.detail-mail-heading h1 {font-family: sans-serif;font-weight: 400;font-size: 26px;line-height: 1.1;}
.detail-left .sub-heading {width: 50%;float: left;padding-bottom: 8px;}
.detail-left .sub-heading span {font-family: sans-serif;font-weight: 300;font-size: 20px;color: #0e0e0e;}
.detail-left .sub-heading ul {text-align: right;}
.sub-heading ul li {display: inline-block;padding-left: 20px;position: relative;}
.sub-heading ul li:before {position: absolute;content: "";background: #d6d6d6;width: 1px;height: 15px;bottom: 0;left: 10%;}
.sub-heading ul li:first-child:before {display: none;}
.detail-left .sub-heading ul li a {font-family: sans-serif;font-weight: 300;font-size: 14px;color: #747474;}
.detail-left .sub-heading ul li i {padding: 0 5px;}
.detail-left .sub-heading ul li:last-child i {padding-right: 0;}
.auction-item-img {margin-bottom: 9px;max-height: 500px; width: 500px;text-align: center;}
.auction-item-img img{max-height: 500px;object-fit: contain;}
.auction-detail-product ul {width: 100%;display: inline-block;}
.auction-detail-product ul li {width: 70px;border: 1px #e0e0e0 solid;height: 70px;margin-top: 10px;margin-right: 10px;float: left;line-height: 63px;text-align: center;cursor: pointer;}
.auction-detail-product ul li.on {border: 2px #00deff solid;}
.auction-detail-product ul li img{height: 100%; object-fit: contain;}
.auction-category {padding-top: 15px;}
.auction-category span {font-family: sans-serif;font-weight: normal;font-size: 16px;color: #000;}
.auction-category ul {padding-top: 12px;}
.auction-category ul li {float: left;margin-right: 10px;margin-bottom: 10px;}
.auction-category ul li a{display: inline-block;}
.auction-category ul li span{margin: 0 10px;}
.auction-category ul li h2 {border: 1px #e3e3e3 solid;background-color: #fff;padding: 7px 15px;border-radius: 18px;cursor: pointer;font-family: sans-serif;font-weight: 300;font-size: 14px;color: #0e0e0e;}
.auction-category ul li a:hover {text-shadow: -0.1px -0.1px 0 black, 0.1px 0.1px black;}
ul.right-sub-heading {text-align: right;padding-right: 10px;margin-bottom: 4px;}
ul.right-sub-heading li {display: inline-block;padding-left: 14px;}
ul.right-sub-heading li a  {font-family: sans-serif;font-weight: 300;font-size: 14px;color: #747474;}
ul.right-sub-heading li a:hover {color: #0e0e0e;}
.detail-right .right-sub-heading .btn-icon.btn-icon-heart-on:hover {background-size: 25px 25px;background-position: 0 0;padding-left: 30px;line-height: 25px;}
ul.right-sub-heading li .like_icon a {margin-left: 0;}
.bidding-box {border: 1px #eeeeee solid;background-color: #f9f9f9;padding: 25px 22px 11px;width: 100%;display: inline-block;}
.bidding-estimate {padding-bottom: 22px;}
.detail-right .bidding-estimate {float: left;font-size: 16px;font-family: sans-serif;font-weight: 300; width: 65%;}
.bidding-estimate.bid-estimate-timer{float:right;text-align: right;padding-right: 10px;font-size: 14px;font-weight: 400; width: 35%;}
.detail-right .bidding-estimate:last-child {text-align: center;}
.detail-right .bidding-estimate span {color: #ff0000;font-size: 14px;}
.bidding-bottom h2 {font-family: sans-serif;font-weight: 400;font-size: 18px;color: #0e0e0e;line-height: 1.1;padding-bottom: 0;}
.bidding-area {padding-top: 14px;}
.clear {clear: both;}

.bidding-estimate .estimate_label{float: left; width: 22%;}
.bidding-estimate .estimate_amount{float: left; width: 74%;}
.bidding-estimate .estimate_amount span{margin-left: 7px; display: block; color:inherit; font:inherit;}
.bidding-estimate .estimate_amount span.dual_currency{font-family: sans-serif; color: #888; font-size: 15px;}

.bidding-price {font-family: sans-serif;font-size: 36px;line-height: 1;font-weight: 400;color: #0e0e0e;width: 57%;display: inline-block;vertical-align: bottom; word-break: break-all;}
.bidding-history {width: 43%;display: inline-block;vertical-align: bottom;font-family: sans-serif;font-size: 14px;font-weight: 300;color: #0e0e0e;cursor: pointer;text-align: right;padding-right: 10px;}
.bidding-history span {color: #0e0e0e;font-weight: 400;font-family: sans-serif;font-size: 14px;padding-right: 10px;}
.bidding-history #view_bid_history_popup span{padding-right: 0;}
.bidding-history #view_bid_history_popup span:first-child{padding-left: 0px}
.bidding-history #view_bid_history_popup span{font-size: 13px; padding-left: 3px;color: #949494;}
.bidding-history #view_bid_history_popup span:hover{color: #0e0e0e;}
.bidding-area .place_bid {padding: 29px 0 6px;width: 100%;display: inline-block;}
.bidding-area .place_bid input {border: 1px #cccccc solid;width: 53%;padding: 14px 8px;float: left;vertical-align: middle;background: #ffffff;font-family: sans-serif;font-weight: 300; font-size: 16px;color: #0e0e0e;-webkit-appearance: textfield;}
.bidding-area .place_bid button {background-color: rgba(0,205,53,1);width: 47%;vertical-align: middle;padding: 14px 0;font-size: 16px;font-family: sans-serif;font-weight: 400;color: #ffffff;float: left;
    line-height: 19px;}
.bidding-area .place_bid button.pending {background-color: #eaeaea;}
.mobile_sticky_bid .bidding-box .auction_bar {display: none;} 
.bidding-area .bid_related div.ack_bid_msg{margin-top: -15px;}
.mobile_sticky_bid.event_active .bidding-box{position: relative; padding-top: 30px;} 
.mobile_sticky_bid.event_active .bidding-box .auction_bar {display: block;} 
.chartlist {position: absolute;margin-top: 4px;padding: 14px 16px;background: #fff;border: 1px #e9e9e9 solid;width: 228px;display: none;z-index: 1;}
.chartlist h4 {font-family: sans-serif;font-weight: 400;font-size: 14px;color: #747474;padding-bottom: 18px;}
.chartlist ul {width: 50%;float: left;}
.chartlist ul li:first-child {font-family: sans-serif;font-weight: 400;font-size: 14px;color: #0e0e0e;padding: 5px 0;text-align: center;}
.chartlist ul li {font-family: sans-serif;font-weight: 300;font-size: 14px;color: #0e0e0e;padding: 5px 0;text-align: center;}
a.chart {font-family: sans-serif;font-weight: 300;font-size: 12px;color: #747474;}
a.chart:hover + .chartlist {display: block;}
.catelog-area {padding-top: 8px;width: 100%;display: inline-block;}
.catelog-icon {width: 50%;float: left;}
.catelog-icon img {width: 24px;height: 24px;}
.catelog-icon a {color: #666;font-family: sans-serif;font-weight: 300;font-size: 14px;line-height: 1.1;}
.catelog-area .bid-social {width: 100%;float: left;text-align: right;position: relative;}
.catelog-area .bid-social a {width: 24px;height: 24px;line-height: 24px;display: inline-block;text-align: center;border-radius: 50%;color: #ffffff;margin: 0 3px;}

.catelog-area .bid-social li a img {vertical-align: top;}
.account-detail {width: 100%;display: inline-block;}
.account-detail .account-left {display: inline-block;padding-right: 11px;vertical-align: top;}
.account-detail .account-left img{height: 70px; width: 70px;object-fit: cover;}
/*.account-detail .detail-account-right {display: inline-block;vertical-align: middle;}*/
.live-sec img {width: 14px;height: 14px;margin-right: 2px;vertical-align: top;}
.live-sec {font-family: sans-serif;font-weight: 300;font-size: 12px;color: #00deff;line-height: 1.1}
.account-right h2 {padding-bottom: 0;line-height: inherit;font-size: inherit;}
.account-right h2 a {font-family: sans-serif;font-size: 20px;line-height: 1.1;font-weight: 300;}
.account-detail .bid-inc a {font-size: 14px;line-height: 1.1;font-family: sans-serif;font-weight: 300;color: #666;max-width: 200px;
    text-overflow: ellipsis; white-space: nowrap; overflow: hidden;float: left;} 
.account-detail .bid-inc a:hover {text-shadow: -.1px -.1px 0 black, .1px .1px black;}
.account-detail .bid-inc p {font-size: 14px;font-family: sans-serif;font-weight: 300;color: #0e0e0e;margin: 2px 0 5px 5px;display: inline-block;}
.account-detail .bid-inc p:before{content: "|";padding-right: 5px;}
.description-tab {margin-top: 22px;}
.description-tab .tab-content{padding-top: 10px;}
.description-tab .nav-tabs {border-bottom: 1px #ccc solid;text-align: left;}
.description-tab .nav-tabs > li > a:after {display: none;}
.description-tab .nav-tabs > li a {font-family: sans-serif;font-weight: 400;font-size: 14px;color: #949494;padding: 11px 20px 6px;border-radius: 0;line-height:1.1;}
.description-tab .nav-tabs > li.active > a, .description-tab  .nav-tabs > li.active > a:focus, .description-tab  .nav-tabs > li.active > a:hover {border: 1px #ccc solid;}
.description-tab .nav-tabs > li {margin: 0;}
.description-tab .nav-tabs > li.active {margin-bottom: -1px;}
.description-tab .nav-tabs > li.active a {color: #0e0e0e;border-bottom:0 !important;}
.description-tab .tab-pane{padding: 0px 5px 20px 0;font-size: 16px; font-weight: 300;}
.description-tab .tab-pane *{font-family: sans-serif;font-weight: 300;font-size: 16px;color: #0e0e0e;line-height: 1.4;}
.description-tab .tab-pane b, .description-tab .tab-pane strong {font-weight: 700;}
.description-tab .tab-pane h4 {font-family: sans-serif;font-weight: 400;font-size: 16px;color: #0e0e0e;display: block;padding: 10px 0px;}
.description-tab .exclusive {position: relative; bottom: initial; margin-bottom: 10px; height: 23px; width: 134px;background-color: rgba(0,205,53,0.75);text-align: center;}
.description-tab .exclusive span{font-size: 14px; color: #ffffff;}
.description-tab .txt_area.first .txt1 {margin-bottom: 16px; font-size: 14px; color: #0e0e0e;}
.description-tab .txt_area.first .txt2{ font-size: 14px; color: #0e0e0e; font-weight: 300;padding-top: 4px;}
.description-tab .txt_area.first .txt2:last-child{padding-top: 20px;}
.other-auction {padding: 20px 0 0;position: relative;}
.other-auction h2 {line-height: 1;padding-bottom: 19px;font-family: sans-serif;font-weight: 300;font-size: 24px;color: #0e0e0e;border-bottom: 1px solid #eee;}
.other-auction ul {margin: 20px 0;width: 100%;display: inline-block;padding-bottom: 10px;}
.other-auction ul li {width: 16.66%;float: left;position: relative;}
.other-auction .other-auction-img {width: 150px;height: 150px;margin: 0 auto 7px;vertical-align: middle;}
.other-auction .other-auction-img img{width: 100%; height: 100%; object-fit: contain;}
.other-auction .auction-detail {padding: 0 8px;}
.other-auction .auction-detail p {font-family: sans-serif;font-weight: 400;font-size: 14px;color: #0e0e0e;padding-bottom: 0;}
.other-auction .auction-detail h2 {display: -webkit-box;line-height: 1.3;padding-top: 2px;overflow: hidden;-webkit-line-clamp: 2;-webkit-box-orient: vertical;text-overflow: ellipsis;font-family: sans-serif;font-weight: 300;font-size: 14px;color: #0e0e0e; border-bottom: 0;}
.other-auction .auction-detail span {font-family: sans-serif;font-weight: 300;font-size: 12px;color: #747474;}
.other-auction .auction-detail span:last-child {font-family: sans-serif;font-weight: 400;font-size: 14px;color: #0e0e0e;margin-left: 8px;}
.other-auction ul li a {position: absolute;left: 0;top: 0;width: 100%;height: 100%;}
.other-auction ul li:hover .auction-detail p {text-shadow: -.1px -.1px 0 black, .1px .1px black;}
.other-auction ul li:hover .auction-detail h4 {text-shadow: -.1px -.1px 0 black, .1px .1px black;}
.other-auction .control-button a {position: absolute;top: 43%;width: 40px;font-size: 30px;display: block;color: rgba(0,222,255,1);text-align: center;height: 40px;
    line-height: 40px;}
.other-auction .control-button a.left {left: 0;}   
.other-auction .control-button a.right {right: 0;}    
.other-auction .control-button a:hover {background: rgba(0,222,255,1);color: #ffffff;}    
.other-auction .auction-button a {background-color: rgba(0,222,255,1);padding: 4px 50px;border-radius: 22px;display: inline-block;line-height: 24px;font-size: 14px;font-family: sans-serif;font-weight: 400;color: #ffffff;}
.other-auction .auction-button a:hover, .other-auction .auction-button a:focus {background-color: rgba(0,222,255,0.7);}
.auction-similar-item {padding: 30px 0 0;position: relative;background: #f8f8f8;border-top: #eee solid 1px;margin-top: 40px;}
.auction-similar-item h2 {font-family: sans-serif;font-weight: 400;font-size: 36px;color: #0e0e0e;line-height: 1.2;padding-bottom: 0;text-align: center;}
.auction-similar-item .row {padding-top: 38px;}
.similat-item-box {padding-bottom: 8px;float: left;width: 100%;}
.similat-item-box .similar-img {width: 228px;height: 228px;margin: 0 auto 8px;}
.similat-item-box .similar-img img{margin: 0 auto; display: block;width: 100%;height: 100%;object-fit: contain;}
.similat-item-box .similar-info {float: left;width: 100%;height: 68px;overflow: hidden;}
.similat-item-box .similar-info a {font-family: sans-serif;font-weight: 300;font-size: 14px;line-height: 1.2;color: #0e0e0e;max-width: 90%;float: left;}
.similat-item-box .similar-info a:hover {text-shadow: -0.1px -0.1px 0 black, 0.1px 0.1px black;}    
.similat-item-box .similar-info i {display: inline-block;vertical-align: top;text-align: right;color: #ccc;float: right;}
/* Item Details css end */
/* About Us css start */
.static_head h1{font-size: 36px; color: #0e0e0e;line-height: 1;font-weight: 400;}
.banner-top .banner-top-wrapper {position: relative;}
.banner-top-left {position: absolute;top: -202px;left: 78px;}
.banner-top-txt {float: right;max-width: 580px;position: relative;    padding: 0 28px;}
.banner-top-txt p {font-family: sans-serif;font-style: italic;font-size: 32px;color: #0e0e0e;line-height: 1.2;}
.banner-top-txt:before {position: absolute;content: "";background: #00deff;width: 50px;height: 2px;top: -32px;}
.about-info {padding: 70px 0 50px;position: relative;}
.about-info p {font-family: sans-serif;font-size: 20px;color: #0e0e0e;line-height: 1.3;text-align: center;}
.about-info:after, .bidding-not-easy:after, .about-team:after, .highlight-bidsquare:after, .auction-dealers:after, .about-video:after {position: absolute;content: "";width: 690px;background: #eee;height: 1px;margin: 0 auto;left: 0;right: 0;bottom: 0;}
.about-video, .bidding-not-easy {padding: 50px 0;position: relative;}
.about-video video {max-height: 500px;}
.bidding-not-easy h2 {font-family: sans-serif;font-size: 26px;color: #0e0e0e;line-height: 1.3;text-align: center;padding-bottom: 0;}
.bidding-not-easy .row {padding: 0 0 20px;}
.bidding-easy-sec {text-align: center;}
.bidding-easy-sec img {width: 80px;height: 80px;}
.bidding-easy-sec h3 {padding: 25px 0 18px;font-family: sans-serif;font-weight: 400;font-size: 20px;color: #0e0e0e;}
.bidding-easy-sec p {font-family: sans-serif;font-weight: 300;font-size: 16px;line-height: 1.3;color: #0e0e0e;}
.bidding-not-easy .bidding-easy-sec:nth-child(2), .bidding-not-easy .bidding-easy-sec:nth-child(3) {padding-top: 80px;}
.auction-dealers {padding: 75px 0 35px;position: relative;}
.auction-dealers h2 {font-family: sans-serif;font-size: 26px;color: #0e0e0e;line-height: 1.3;font-weight: 500;text-align: center;padding-bottom: 40px;}
.auction-dealers ul {text-align: center;}
.auction-dealers .auction-dealers-img {display: inline-block;width: 115px;padding-bottom: 8px;}
.auction-dealers ul li {padding: 0 10px 40px;display: inline-block;vertical-align: top;position: relative;}
.auction-dealers ul li a {position: absolute;width: 100%;height: 100%;left: 0;top: 0;}
.auction-dealers ul li img {display: block;-webkit-box-shadow: 2px 2px 7px 0px rgba(0,0,0,0.2);-moz-box-shadow: 2px 2px 7px 0px rgba(0,0,0,0.2);}
.auction-dealers ul li span {font-family: sans-serif;font-style: italic;font-size: 16px;color: #0e0e0e;display: block;}
.about-team {padding: 50px 0 60px;position: relative;}
.about-team h2 {font-family: sans-serif;font-weight: 400;font-size: 36px;color: #0e0e0e;text-align: center;padding-bottom: 75px;position: relative;}
.about-team h2:after, .highlight-bidsquare h2:after {position: absolute;content: "";background: #00deff;width: 50px;height: 2px;bottom: 0;left: 0;right: 0;margin: 0 auto;}
.about-team p {font-family: sans-serif;font-weight: 400;font-size: 20px;line-height: 1.3;color: #0e0e0e;text-align: center;padding-top: 50px;max-width: 795px;margin: 0 auto;}
.people-say {padding: 75px 0 75px;}
.people-say h2 {line-height: 1.3;text-align: center;font-family: sans-serif;font-size: 26px;color: #0e0e0e;padding-bottom: 0;}
.people-say h2 span {display: block;}
.people-say-box {position: relative;padding-left: 70px;}
.people-say-box img {display: inline-block;position: absolute;top: -16px;left: 40px;}
.people-say-box p {display: inline-block;line-height: 1.2;padding-bottom: 16px;border-bottom: 1px solid #00deff;margin-bottom: 16px;font-family: sans-serif;font-weight: 300;font-size: 18px;font-style: italic;color: #0e0e0e;}
.people-say-box h4 {font-family: sans-serif;font-weight: 400;font-size: 16px;color: #0e0e0e;margin-bottom: 10px;}
.people-say-box span {font-family: sans-serif;font-weight: 300;font-size: 14px;color: #949494;}
.people-say .people-say-box:nth-child(2) {padding-top: 77px;}
.people-say .people-say-box:nth-child(2) img {top: 60px;}
.highlight-bidsquare {padding: 75px 0;position: relative;}
.highlight-bidsquare h2 {text-align: center;line-height: 1;font-weight: 500;font-family: sans-serif;font-weight: 400;font-size: 36px;color: #0e0e0e;padding-bottom: 75px;position: relative;}
.highlight-bidsquare ul {padding-top: 70px;text-align: center;}
.highlight-bidsquare ul li {padding-bottom: 110px;}
.highlight-bidsquare ul li:last-child {padding-bottom: 0;}
.highlight-bidsquare ul li img {padding-bottom: 20px;display: block;margin: 0 auto;}
.highlight-bidsquare ul li a {line-height: 1.2;font-family: sans-serif;font-size: 20px;display: block;color: #0e0e0e;}
.highlight-bidsquare ul li span {font-family: sans-serif;font-weight: 300;font-size: 16px;color: #0e0e0e;padding-top: 10px;display: block;}
.highlight-bidsquare ul li a:hover {text-shadow: -0.1px -0.1px 0 black, 0.1px 0.1px black;}
/* About Us css end */
/* Press css start */
.sub_contents2 {padding-top: 45px;}
.footer_page_wrap.press .page_contents_area .press_card {display: inline-block;width: 318px;background-color: #ffffff;box-sizing: border-box;margin-bottom: 25px;cursor: pointer;-webkit-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);-moz-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);}
.footer_page_wrap.press .page_contents_area .press_card .title_cell {padding-top: 10px;padding-bottom: 5px;text-align: center;}
.f_press_box_tit h2 {text-align: center; margin-bottom: 5px;cursor: pointer;font-family: sans-serif;font-weight: 400;font-size: 20px;color: #0e0e0e;padding-bottom: 0;}
.f_press_date_txt {font-family: sans-serif;font-weight: 400;text-align: center;font-size: 12px;color: #747474;}
.f_press_box_subtit {padding: 15px 15px 10px 15px;}
.f_press_box_subtit h3 {font-family: sans-serif;font-size: 16px;color: #0e0e0e;line-height: 1.3;text-align: center;}
.f_caption_txt_light {font-family: sans-serif;font-weight: 300;font-size: 14px;color: #0e0e0e ;text-align: center;padding: 0 15px;line-height: 1.3;}
.f_press_full_btn {padding: 10px 0 15px;font-family: sans-serif;font-weight: 400;font-size: 13px;color: #0e0e0e;text-align: center;}
.f_press_full_btn:hover {color: #00deff;}
.footer_page_wrap.press .page_contents_area .press_card .more_btn span {color: #00deff;font-size: 11px;margin-right: 10px;}
.gutter-sizer {width: 23px; }
/*press css end*/


/*after login section*/
.after_login{float: right; text-align: right;width: 30%; padding-top: 12px;padding-right: 10px;}
.after_login .user_name{display:inline-block;margin-right: 5px; font-size: 13px; font-weight: 300;color: #0e0e0e;}
.after_login .mybidsquare{display: inline-block; position: relative; padding-bottom: 5px;}
.after_login .mybidsquare .bid-userimg{width: 16px; display: inline-block;}
.after_login .mybidsquare a{font-size: 14px; color: #0e0e0e;}
.mybidsquare_menu{position: absolute;top: 24px;left:-20px;width: 165px;border: 1px #cccccc solid; background-color: #fff;text-align: left;z-index: 850; visibility: hidden;opacity: 0;}
ul.mybidsquare_menu li{position: relative;}
ul.mybidsquare_menu li.logout{border-top: 1px #eee solid;padding: 11px 6px 11px 12px;}
ul.mybidsquare_menu li.logout input{font-weight:300;background: none; cursor: pointer; font-family: sans-serif; font-size: 14px; color: #747474;padding: 0;}
ul.mybidsquare_menu li a{font-size: 14px; color: #0e0e0e;padding: 11px 6px 11px 12px;display: block;}
ul.mybidsquare_menu li:hover a{color: #00deff;background-color: #f8f8f8; }
ul.mybidsquare_menu li span.count{background: #00deff; padding: 1px 0px 0px 6px; border-radius: 50%; height: 17px; width: 17px; float: right; color: #fff;}
.mybidsquare:hover ul.mybidsquare_menu {opacity: 1; visibility: visible;}
/*after login section*/
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
button.login_bnt:hover{background-color: rgba(0,222,255,0.7);}
.login_related{margin: 15px auto;text-align: center;display: block;max-width: 302px;}
.login_related .already_acc{float: left;font-size: 15px;color: #666666;}
.login_related a{float: right;color: #00deff;font-size: 14px;}
.close_popup{position: absolute; top: 13px; width: 30px !important; right: 3px;cursor: pointer; background: transparent;z-index: 999; background:url('../img/login_pop_close.png') no-repeat scroll 0 0; height: 30px;}

/*Newsletter Model*/

/*Login Model*/
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
/*Login Model*/
/*forgot password*/
.forgot_text_area{font-size: 14px; color: #0e0e0e; line-height: 1.3;font-family: sans-serif; max-width: 310px; text-align: center;margin: 20px auto 0;display: block;}
.forgot_to_login{max-width: 302px; display: block; margin: 0 auto; margin-top: 30px; font-family: sans-serif} 
.forgot_to_login .back_login{float: left; width: 38%;margin-right: 10px; background:url('../img/back_icon.png') no-repeat scroll 0 0; font-size: 14px; color: #949494;background-position: center left;  }
.forgot_to_login .back_login span{padding-left: 17px;}
.forgot_to_login .back_login span:hover{color: #00deff; cursor: pointer;}
.forgot_to_login .not_reg{float: right;width: 57%;}
.forgot_to_login .not_reg p{font-family: sans-serif; font-size: 14px; color: #0e0e0e;}
.forgot_to_login .not_reg p a{color:#00deff; font-weight: 300; margin-left: 10px;}
/*forgot password*/
/* Directory css start */
.directory-sub {padding-top: 6px;}
.directory-sub h3 {font-size: 18px;font-family: sans-serif;line-height: 1.2;font-weight: 500;}
.directory-sub h3, .directory-store-left .directory-store-txt p span {display: block;}
.directory-tab {padding-top: 40px;}
.directory-tab .nav-tabs > li.active > a, .directory-tab .nav-tabs > li.active > a:focus, .directory-tab .nav-tabs > li.active > a:hover {border: 0;}
.directory {padding-top: 28px;}
.directory-search {text-align: right;padding-bottom: 5px;}
.directory-search ul li {display: inline-block;margin-left: 6px;position: relative;}
.directory-search ul li input {font-family: sans-serif;font-weight: 300;font-size: 14px;color: #666666;padding: 5px 32px 5px 15px;border: 1px #b7b7b7 solid;}
.directory-search ul li span {position: absolute;right: 10px;top: 5px;}
.directory-search ul li i {color:  #b7b7b7;}
.directory-search ul li label {font-family: sans-serif;font-weight: 400;font-size: 14px;color: #0e0e0e;}
.directory-left ul li .directory-left-img {display: inline-block; vertical-align: middle; margin-right: -3px; width: 105px; height: 105px;}
.directory-left ul li .directory-left-img img {width: 100%; height: 100%; object-fit: contain;}
.directory-left-txt {display: inline-block;padding-left: 15px;vertical-align: middle;width: 75%;}
.directory-left-txt h3  {font-family: sans-serif;font-weight: 400;font-size: 18px;color: #666666;line-height: 1;max-width: 340px;}
.directory-left-txt p {padding: 6px 0 0;font-family: sans-serif;font-weight: 300;font-size: 14px;line-height: 1;color: #949494;height: 48px;overflow: hidden;}
.directory-left-txt h3:hover {text-shadow: -.1px -.1px 0 black, .1px .1px black;}
.directory-left-txt  span {display: block;}
.about-directory {padding-top: 8px;}
.about-directory a img {width: 14px;height: 22px;}
.about-directory a.about_auction_house {padding-right: 17px;padding-top: 1px;font-family: sans-serif;font-weight: 400;font-size: 14px;color: #666666;background: url(../img/svg/about_auction_house_icon.svg) left center no-repeat;padding-left: 15px;
    background-size: 14px 22px;}
.about-directory a:last-child {margin-left: 12px;font-family: sans-serif;font-weight: 500;font-size: 14px;color: #00deff;}
.about-directory a:first-child:hover {color: #0e0e0e;}
.about-directory a.upcoming_auction {font-family: sans-serif;font-size: 13px;line-height: 20px;letter-spacing: -0.2px;color: #000000;float: right;font-weight: 400;}
.about-directory a.upcoming_auction span {background: #00DEFF;width: 15px;height: 15px;border-radius: 50%;font-family: Helvetica;font-size: 11px;line-height: 16px;color: #FFFFFF;display: inline-block;vertical-align: middle;margin-left: 8px;text-align: center;}
.about-directory a.about_auction_house:hover {color: #0e0e0e;}

.directory .auction-button {padding: 0px 0 0;text-align: center;background: url(../img/btn_bg2.png) center center no-repeat;margin-top: 50px;}
.directory .auction-button a {background-color: rgb(0, 222, 255);display: inline-block;line-height: 24px;font-size: 14px;font-family: sans-serif;font-weight: 400;color: rgb(255, 255, 255);padding: 4px 50px;border-radius: 22px;}
.directory .auction-button a:hover {background-color: rgba(0, 222, 255, 0.7);}
.like-option {position: absolute;right: 0;top: 25px;}
.like-option img {width: 22px;}

.like-option .hover-img, .like-option:hover .real-img {display: none;}
.like-option:hover .hover-img {display: block;}

.directory-left ul li .directory-border:nth-child(odd) {border-right: 1px #e1e1e1 solid;}
.directory-left ul li .directory-box {padding: 30px 0; border-bottom: 1px #e1e1e1 solid;height: 158px;position: relative;}
.directory .preview-follow {float: left;}
button.follow {border: 0.5px solid #D5D5D5;background: #fff;text-align: center;transition: 300ms all;width: 93px;border-radius: 13px;font-family: sans-serif;font-size: 13px;line-height: 20px;color: #333333;padding: 2px 0;position: relative;}
button.follow:before {content: "\f067";font-family: fontawesome;color: #00DEFF;padding-right: 6px;font-size: 10px;position: static;}
button.follow:hover {background: #00DEFF;color: #ffffff;border-color: #00DEFF;}
button.follow:hover:before {color: #ffffff;}
button.following {background: #00DEFF;position: relative;padding: 2px 23px 2px 26px;color: #FFFFFF;border: 0;line-height: 21px;}
button.following:before {position: absolute;content: "\f107";color: #FFFFFF;left: 9px;font-weight: 900; font-size: 13px;}
/* Directory css end */
/* Directory Contact css start */
.no-gutter {padding-right: 0;padding-left: 0;}
.directory-store-info {padding-top: 20px;}
.directory-store-left .directory-store-img {display: inline-block;max-height: 110px;height: 106px;}
.directory-store-left .directory-store-img img {object-fit: contain;height: 100%;}
.directory-store-left .directory-store-txt {vertical-align: middle;display: inline-block;}
.directory-store-left .directory-store-txt h1 {padding-bottom: 6px;line-height: 1.3;font-family: sans-serif;font-weight: 300;font-size: 26px;color: #0e0e0e;}
.directory-store-left .directory-store-txt p {font-family: sans-serif;font-weight: 400;font-size: 14px;color: #0e0e0e;padding-bottom: 0;line-height: 1;}
.about-directory-store {padding-top: 7px;font-size: 14px;}
.about-directory-store button {margin-top: 8px;}
.directory-store-right .seller_about_wrap {font-size: 16px;color: #0e0e0e;line-height: 1.4;font-family: sans-serif;font-weight: 300;border-left: 1px #ccc solid;margin-left: -15px;padding-left: 15px;padding-bottom: 0;}
.directory-store-right p #more {display: none;}
.directory-store-right p button {font-size: 14px;font-family: sans-serif;font-weight: 300;color: #949494;background: initial;padding: 0;}
.directory-store-right ul {text-align: right;padding-top: 18px;}
.directory-store-right ul li {display: inline-block;padding-left: 8px;font-family: sans-serif;font-weight: 400;font-size: 12px;color: #747474;}
.directory-store-right ul li a{margin-left: 5px;}
.directory-store-right ul li img {width: 19px;}
.directory-store-right .like_icon  {display: block;text-align: right;padding-bottom: 20px;   background-position:  82% 11px !important; background-size: 22px !important; cursor: pointer;}
.directory-store-right .like_icon span {font-family: sans-serif;font-weight: 400;font-size: 12px;color: #747474;padding-left: 6px;}
.right-like img {width: 20px;}
.right-like .hover-img, .right-like:hover .real-img {display: none;}
.right-like:hover .hover-img {display: block;}

.directory-contact-left  {padding-top: 53px;}
.directory-contact-left h2 {font-family: sans-serif;font-weight: 400;font-size: 24px;color: #0e0e0e;text-align: left;padding-bottom: 10px;}
.directory-contact-left .map_area {width: 100%; height: 248px;}
.directory-contact-left ul li {padding: 11px 0;display: inline-block;vertical-align: top;}
.directory-contact-left ul li:nth-child(odd) {width: 20%;}
.directory-contact-left ul li label {font-family: sans-serif;font-weight: 400;font-size: 16px;color: #0e0e0e;line-height: 1.2}
.directory-contact-left ul li span, .directory-contact-left ul li a {display: block;font-family: sans-serif;font-weight: 300;font-size: 16px;color: #0e0e0e;line-height: 1.2}
.directory-contact-left ul li.follow-us a {display: inline-block;}
.directory-store-right .seller_about_wrap {max-height: 178px; overflow-y: auto; display: block;font-weight: 300;line-height: 1.4;font-size: 16px;}
.directory-store-right .seller_about_wrap .trigger span{    color: #999999; cursor: pointer;font-size: 14px;font-weight: 300;}
.directory-contact-left iframe {width: 100%;}
.staff-directory {padding-top: 70px;}
.staff-directory h2 {font-family: sans-serif;font-size: 24px;color: #0e0e0e;line-height: 1.1;font-weight:400;padding-bottom: 10px;}
.staff-directory .table {margin-bottom:0;border: 1px #e2e2e2 solid;}
.staff-directory .table > thead > tr > th {padding: 8px 12px;font-family: sans-serif;font-weight: 400;font-size: 14px;color: #0e0e0e;background: #ededed;border-right: 1px #e2e2e2 solid;border-bottom: 0;}
.staff-directory .table tr td {padding: 5px 12px;font-family: sans-serif;font-weight: 300;font-size: 14px;color: #0e0e0e;border-right: 1px #e2e2e2 solid;border-bottom: 1px solid #e2e2e2;border-top: 0;}
.staff-directory .table-striped > tbody > tr:nth-of-type(even) {background-color: #f9f9f9;}
.staff-directory .table-striped > tbody > tr:nth-of-type(odd) {background-color: #ffffff;}
.staff-directory .table tr td {padding: 5px 12px;font-family: sans-serif;font-weight: 300;font-size: 14px;color: #0e0e0e;border-right: 1px #e2e2e2 solid;}
/* Directory Contact css end */
/* Blog css start */
.list-head.blog-head h1  {font-family: sans-serif;padding-bottom: 0;font-weight: 400; font-size: 36px; line-height: 1.2 ;color: #0e0e0e;}
.blog-sub {padding-top: 13px;padding-bottom: 60px;}
.blog-sub h3 {font-size: 12px;color: #0e0e0e;font-family: sans-serif;font-weight: 300;letter-spacing: 8px;text-transform: uppercase;}
.blog-sub h3 span {position: relative;padding: 0 18px;}
.blog-sub h3 span:before {position: absolute;content: "";background: #e0e0e0;width: 56px;height: 1px;left: 100%;top: 50%;}
.blog-sub h3 span:after {position: absolute;content: "";background: #e0e0e0;width: 56px;height: 1px;right: 100%;top: 50%;}
.blog-sub span {position: relative;padding: 0 18px;font-size: 12px;color: #0e0e0e;font-family: sans-serif;font-weight: 300;letter-spacing: 8px;text-transform: uppercase;}
.blog-sub span:before {position: absolute;content: "";background: #e0e0e0;width: 56px;height: 1px;left: 100%;top: 50%;}
.blog-sub span:after {position: absolute;content: "";background: #e0e0e0;width: 56px;height: 1px;right: 100%;top: 50%;}
.blog {padding-top: 40px;}
.slider-wrapper {position: relative;}
.slide-img {width: 50%;float: left;height: 500px;}
.slide-text {width: 50%;float: right;padding: 39px 45px 0;}
.slide-text h2 {font-family: sans-serif;font-size: 32px;color: #0e0e0e;line-height: 1.2;text-align: center;padding-bottom: 0;}
.slide-text span {display: block;padding: 35px 0;text-align: center;font-style: italic;color: #747474;font-family: sans-serif;font-size: 14px;line-height: 1.2;position: relative;}
.slide-text span:after {position: absolute;content: "";background-color: #949494;width: 33px;height: 1px;left: 0;right: 0;margin: 0 auto;bottom: 0;}
.slide-text label {line-height: 1.2;padding: 35px 0;color: #747474;text-align: center;font-family: sans-serif;font-weight: 400;font-size: 14px;display: block;}
.slide-text p {padding-top: 10px;line-height: 1.625rem;font-family: sans-serif;font-size: 18px;color: #0e0e0e;padding-bottom: 0;}
.slide-text a {padding-left: 6px;font-family: sans-serif;font-size: 14px;color: #949494;}
.slide-text a:hover {text-shadow: -0.1px -0.1px 0 black, 0.1px 0.1px black;}
a.link-purpose {position: absolute;left: 0;top: 0;width: 100%;height: 100%;}
.blog .slick-dots li {width: 12px;height: 12px;}
.blog .slick-list {-webkit-box-shadow: 3px 3px 8px 3px rgba(0,0,0,0.08);-moz-box-shadow: 3px 3px 8px 3px rgba(0,0,0,0.08);box-shadow: 3px 3px 8px 3px rgba(0,0,0,0.08);}
.blog-featured-sec {padding-top: 68px;width: 100%;display: inline-block;}
.blog-featured-sec h2 {padding-bottom: 28px;}
.blog-featured-sec h2 span, .blog-recent-sec h2 span {padding-right: 18px;font-family: sans-serif;font-size: 30px;color: #0e0e0e;line-height: 1.2;position: relative;}
.blog-featured-sec h2 span:after, .blog-recent-sec h2 span:after {position: absolute;content: "";background: #e0e0e0;width: 820px;height: 1px;bottom: 8px;left: 100%;}
.blog-featured-sec .left-feature {width: 56.5%;float: left;padding-right: 25px;border-right: 1px #e0e0e0 solid;}
.bottom-content {padding-top: 15px;position: relative;}
.bottom-content h3 {font-size: 26px;line-height: 1;font-family: sans-serif;color: #0e0e0e;padding-bottom: 16px;}
.bottom-content span, .right-topic-top span {font-family: sans-serif;font-weight: 400;color: #949494;font-size: 14px;line-height: 1.2;display: block;}
.bottom-content p, .right-topic-bottom p {padding-top: 40px;font-size: 18px;color: #0e0e0e;line-height:1.3;font-family: sans-serif;padding-bottom: 0;}
.bottom-content p a, .right-topic-bottom p a {padding-left: 10px;font-family: sans-serif;font-size: 14px;color: #949494;line-height: 1.3;}
.right-feature {width: 43.5%;padding-left: 25px;float: left;}
.right-feature .right-topic {padding: 24px 0;border-bottom: 1px #e0e0e0 solid;}
.right-feature .right-topic:first-child {padding-top: 0;}
.right-feature .right-topic:last-child {padding-bottom: 0;border-bottom: 0;}
.right-topic-top {width: 100%;display: inline-block;}
.right-topic-top img {float: right; margin-left: 25px; width: 100px; height: 100px; object-fit: cover;}
.right-topic-bottom {padding-top: 15px;}
.right-topic-top h3 {font-family: sans-serif;font-size: 24px;color: #0e0e0e;line-height: 1.2;padding-bottom: 10px;}
.right-topic-bottom p {padding-top: 0;}
.bottom-content h3:hover, .right-topic-top h3:hover {text-shadow: -0.1px -0.1px 0 black, 0.1px 0.1px black;}
.bottom-content p a:hover, .right-topic-bottom p a:hover {text-shadow: -0.1px -0.1px 0 black, 0.1px 0.1px black;}
.blog-recent-sec {padding-top: 98px;}
.blog-recent-sec .recent-box {text-align: center;position: relative;height: auto;}
.blog-recent-sec ul li {padding: 28px 0;width: 100%;display: inline-block;}
.blog-recent-sec .recent-box:last-child, .blog-recent-sec .recent-box:nth-child(8), .blog-recent-sec .recent-box:nth-child(4) {border-right: 0;}
.recent-box p {padding: 20px 0 0;line-height: 1.2;font-family: sans-serif;font-size: 20px;color: #0e0e0e;text-align: left;height: 70px;overflow: hidden;}
.blog-recent-sec .row {padding-bottom: 50px;}
.blog .auction-button {padding: 0px 0 0;text-align: center;background: url(../img/btn_bg2.png) center center no-repeat;}
.blog .auction-button a {background-color: rgb(0, 222, 255);display: inline-block;line-height: 24px;font-size: 14px;font-family: sans-serif;font-weight: 400;color: rgb(255, 255, 255);padding: 4px 30px;border-radius: 22px;}
#blogSlider .slick-dots{margin-top: 20px;}
#blogSlider .slide-img img{    width: 100%; float: left; height: 100%;}
.blog-featured-sec .left-feature .top-img{text-align: center; height: 540px; width: 100%;}
.blog-featured-sec .left-feature .top-img img{object-fit: cover; width: 100%; height: 100%;}
/* Blog css end */
/*Blog Detail css start*/
.blog-details {padding-top: 40px;}
.list-head.blog_detail h2{font-family: sans-serif;}
.blog-detail-left {width: 23.5%;padding-right: 10px;border-right: 2px #f9f9f9 solid;float: left;}
.blog-detail-left .form-section {padding-right: 30px;}
.blog-detail-left form {position: relative;padding-bottom: 30px;border-bottom: 1px #d6d6d6 solid;}
.blog-detail-left form input {padding: 6px 22px 6px 12px;width: 100%;border: 1px #ccc solid;color: #0e0e0e;font-family: sans-serif;font-weight: 300;font-size: 14px;}
.blog-detail-left form i {position: absolute;right: 8px;top: 5px;color: #ccc;}
.blog-detail-recent-post h3, .most-viewed h3 {padding: 20px 0 0;font-family: sans-serif;color: #747474;font-size: 20px;text-transform: uppercase;}
.blog-detail-recent-post ul li {padding-top: 24px;}
.blog-detail-recent-post ul li:last-child {padding-bottom: 24px;}
.blog-detail-recent-post ul li a {font-family: sans-serif;font-size: 16px;color: #0e0e0e;line-height: 1.3;}
.blog-detail-recent-post a.more-post {background-color: rgba(0,222,255,1);padding: 4px 65px;border-radius: 22px;display: inline-block;line-height: 24px;font-family: sans-serif;font-size: 14px;color: #ffffff;font-weight: 400;}
.blog-detail-recent-post a.more-post:hover {background-color: rgba(0,222,255,0.7);}
.most-viewed h3 {padding: 50px 0 25px;}
.most-viewed ul li {padding-bottom: 30px;position: relative;}
.most-viewed ul li .image-box {width: 100%;height: 130px;}
.most-viewed ul li img {margin: 0 auto;display: block;max-height: 100%;}
.most-viewed ul li span {display: block;font-family: sans-serif;font-size: 16px;color: #0e0e0e;line-height: 1.2;padding-top: 10px;}
.most-viewed ul li span:hover, .blog-detail-recent-post ul li a:hover {text-shadow: -0.1px -0.1px 0 black, 0.1px 0.1px black;}
.blog-detail-right {padding-top: 15px;}
.blog-detail-right {width: 74.4%;float: right;padding-left: 20px;}
.blog-detail-right h1 {line-height: 1.3;text-overflow: ellipsis;padding-bottom: 30px;font-weight: 500;font-size: 36px;font-family: sans-serif;color: #0e0e0e;}
.blog-detail-info {border-bottom: 1px #e0e0e0 solid;display: inline-block;width: 100%;}
.blog-detail-info p {font-family: sans-serif;font-size: 14px;font-weight: 400;color: #747474;display: inline-block;margin-right: -4px;vertical-align: middle;width: 50%;}
.blog-detail-info ul {display: inline-block;vertical-align: super;width:50%;text-align: right;float: right;}
.blog-detail-info ul li {display: inline-block;padding-left: 3px;}
.blog-detail-info ul li a {margin-left: 3px;}
/*.blog-detail-info ul li a {width: 24px;height: 24px;background: #ccc;border-radius: 50%;display: block;text-align: center;color: #ffffff;line-height: 24px;}*/
/*.blog-detail-info ul li:first-child a:hover {background: #3b5998;}*/
/*.blog-detail-info ul li:nth-child(2) a:hover {background: #1da1f2;}*/
/*.blog-detail-info ul li:last-child a:hover {background: #bd081c;}*/
.clear {clear: both;}
ul.blog-keyboard {padding: 8px 0 26px;}
ul.blog-keyboard li {display: inline-block;padding-right: 5px;padding-bottom: 5px;}
ul.blog-keyboard li a {border: 1px #e0e0e0 solid;display: block;padding: 5px 10px;border-radius: 18px;line-height: 1;font-family: sans-serif;font-weight: 300;font-size: 12px;color: #747474;}
.blog-product-detail * {word-wrap: break-word;}
.blog-product-detail p {padding-bottom: 30px;line-height: 1.5;font-size: 18px;font-family: sans-serif,Times,serif;}
.blog-product-detail p.small-font em a {font-size: 16px;}
.blog-product-detail p a {color: #0a4088 !important;text-decoration: underline;font-size: 18px;}
.blog-product-detail p a.sub-head {color: #0a4088;text-decoration: underline;font-size: 18px;}
.blog-detail-info-bottom {padding-bottom: 12px;}
.blog-bottom {padding-top: 30px;}
.blog-bottom ul {position: relative;}
.blog-bottom ul li {display: inline-block;}
.blog-bottom ul li span {display: inline-block;color: #00deff;padding-right: 10px;}
.blog-bottom ul li:last-child span {padding-left: 10px;padding-right: 0;}
.blog-bottom ul li p {display: inline-block;line-height: 2;font-family: sans-serif;font-weight: 400;font-size: 14px;}
.blog-bottom ul li p:hover {color: rgba(0,222,255,1);}
.blog-bottom ul li:nth-child(2) {text-align: center;position: absolute;left: 0;right: 0;width: 38%;margin: 0 auto;}
.blog-bottom ul li:nth-child(2) a {background-color: rgba(0,222,255,1);padding: 5px 0;border-radius: 22px;display: inline-block;font-family: sans-serif;font-weight: 400;font-size: 14px;color: #ffffff;line-height: 24px;width: 100%;}
.blog-bottom ul li:last-child {float: right;}
.blog-bottom ul li:nth-child(2) a:hover {background-color: rgba(0,222,255,0.7);}
.auctioneer-press-release .by_seller_area p.blog-seller-name {font-family:sans-serif;font-style: italic;color: #777;font-size: 18px;}
.auctioneer-press-release .by_seller_area p.seller-copyright {font-family:sans-serif;font-size: 13px;padding-top: 5px;}
.auctioneer-press-release .blog-detail-recent-post a.more-post {padding: 4px 0;width: 100%;text-align: center;}
.press_detail_top_section{border-top: 1px solid #f2f2f2;padding-top: 25px; position: relative;}
.press_detail_top_section span.press_auc{font-family: sans-serif; font-weight: normal;font-style: italic; color:#777; font-size: 18px; position:relative;padding-right: 10px;
    margin-right: 5px;}
.press_detail_top_section span.press_auc:after{position: absolute; top: 2px; right: 0; content: ''; height: 17px; width: 1px; background-color: #777; opacity: 0.5;}
.press_detail_top_section span.press_auth a{font-family: sans-serif; font-weight: normal;font-style: italic; color:#0e0e0e; font-size: 18px}
.press_detail_top_section .seller_logo{position: absolute;right: 0;top: 0;}
.press_detail_top_section .seller_logo img{max-width: 50px;}
/*Blog Detail css end*/
/* My Bidsqare css start */
.right-align {text-align: right;}
.bidsquare-item-top {padding: 23px 0 0;}
.bidsquare-item-top h2 {padding-bottom: 50px;}
.bidsquare-top {padding-top: 5px;display: inline-block;width: 30%;margin-right: 7px;}
.bidsquare-top {padding-top: 5px;display: inline-block;width: 32%;margin-right: 7px;}
.bidsquare-top span label, .bidsquare-right span label {display: block;font-family: sans-serif;font-weight: 400;font-size: 12px;color: #0e0e0e;padding-bottom: 5px;text-align: left;}
.bidsquare-top select {padding: 7px 10px;font-family: sans-serif;font-weight: 300;font-size: 14px;color: #0e0e0e;border: 1px #ccc solid;width: 100%;background: url(../img/selectbox_icon.png) no-repeat 95% 50%;}
select::-ms-expand {display: none;}
.bidsquare-right input {border: 1px #cccccc solid;padding: 7px 5px;width: 100%;font-family: sans-serif;font-weight: 300;font-size: 13px;color: #0e0e0e;}
.bidsquare-right {padding-top: 5px;display: inline-block;width: 40%;position: relative;}
.bidsquare-right .search_icon {position: absolute;padding-bottom: 0;right: 6px;top: 60%;}
.bidsquare-bottom {padding-top: 15px;}
.bidsquare-bottom form {display: inline-block;padding-right: 15px;}
.bidsquare-bottom form button {padding: 8px 10px;background-color: #cccccc;font-family: sans-serif;font-weight: 400;font-size: 13px;color: #ffffff;}
.bidsquare-bottom p {display: inline-block;vertical-align: -webkit-baseline-middle;font-family: sans-serif;font-weight: 300;font-size: 14px;color: #0e0e0e;}
.bidsquare-bottom span label {font-family: sans-serif;font-weight: 400;font-size: 14px;color: #0e0e0e;padding-right: 8px;}
.bidsquare-bottom select {background: url(../img/selectbox_icon.png) no-repeat 89% 50%;font-family: sans-serif;font-weight: 300;font-size: 14px;color: #0e0e0e;padding: 6px 18px 6px 10px;border: 1px #ccc solid;}
.bidsquare-bottom .dropDown {display: inline-block;}
.bidsquare-item-main {margin-top: 15px;width: 100%;}
.bidsquare-item-main thead th {background: #ffffff;border-top: 1px #cdcdcd solid !important;font-family: sans-serif;font-weight: 400;line-height: 1.2;color: #0e0e0e;font-size: 14px;border-bottom: 1px #cdcdcd solid !important;padding: 8px 0;}
.bidsquare-item-main tr td {padding: 18px 4px;vertical-align: middle;border-bottom: 1px solid #eee;vertical-align: middle !important;}
.bidsquare-item-main .new_check_gruop {padding-left: 10px;margin: 0 auto;}
.new_check_gruop .container {position: relative;margin-top: 2px;padding-left: 35px;margin-bottom: 12px;cursor: pointer;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none; display: inline-block;vertical-align: top;width:100%;box-sizing: border-box;padding-left:30px;text-align: left;}
.bidsquare-item-main .new_check_gruop input[type="checkbox"] {position: absolute;opacity: 0;cursor: pointer;left: 0;}
.check-bidsquare {width: 12px;height: 12px;border: 1px solid #ccc;position: absolute;top: 0;left: 0;background-color: #fff;}
.check-bidsquare:after {width: 3px;height: 8px;left: 3px;border-width: 0 1px 1px 0; border: solid #181818;border-width: 0 1px 1px 0;-webkit-transform: rotate(45deg);-ms-transform: rotate(45deg);transform: rotate(45deg);position: absolute;content: "";}
.bidsquare-item-main .new_check_gruop input:checked ~ .check-bidsquare:after, .alert-category-box .new_check_gruop input:checked ~ .check-bidsquare:after, .alert-category-box-last .new_check_gruop input:checked ~ .check-bidsquare:after, .same-bill .new_check_gruop input:checked ~ .check-bidsquare:after  {display: block;}  
.check-bidsquare:after {display: none;}
.bidsquare-item-main .lot {font-family: sans-serif;font-weight: 400;font-size: 14px;color: #0e0e0e;}
.bidsquare-item-main .lot:hover, .bidsquare-item-main .item-title:hover, .auction-item:hover, .set-reminder a:hover, .item-detail span.reminder_text:hover {text-shadow: -.1px -.1px 0 black, .1px .1px black;}
.bidsquare-item-main .item-title {font-family: sans-serif;font-weight:300;line-height: 1.3;font-size: 14px;color: #0e0e0e;padding-bottom: 0;}
.bidsquare-item-main .exclusive_circle {width: 15px;height: 15px;padding: 1px;text-align: center; background: #00cd35;border-radius: 10px;margin: 6px 0;}
.bidsquare-item-main .exclusive_circle a {font-size: 12px; font-family: sans-serif;font-weight: 300;color: #ffffff;display: block;}
.bidsquare-item-main .exclusive {padding: 2px 3px;background-color: rgba(0,205,53,0.75);width: 67%;position: relative;top: -47px;left: -30px;opacity: 0;}
.bidsquare-item-main .exclusive_circle:hover .exclusive {display: block;position: relative;opacity: 1;}
.bidsquare-item-main .exclusive span {font-size: 12px;font-family: sans-serif;font-weight: 400;color: #ffffff;}
.live-button {padding-bottom: 4px;font-family: sans-serif;font-weight: 300;font-size: 12px;color: #00deff;line-height: 1.2;}
.bidsquare-item-main .live-button img {width: 12px;height: 13px;}
.auction-item {color: #0e0e0e;line-height: 1.3;font-size: 13px;font-family: sans-serif;font-weight: 400;}
.auction-title {padding-top: 3px;font-size: 13px;font-family: sans-serif;font-weight:300;padding-bottom: 4px;}
.auction-last {font-family: sans-serif;font-size: 12px;font-weight: 300;}
.bidsquare-item-main img {width: 120px;}
.auction-status {font-size: 12px;font-family: sans-serif;color: #0e0e0e;font-weight: 300;display: block;}
.bidding-auction {color: #00cd35;font-size: 14px;font-family: sans-serif;padding-right: 5px;font-weight: 400;display: inline-block;}
.bidding-money {font-size: 16px;font-family: sans-serif;color: #0e0e0e;font-weight: 400;display: inline-block;}
.tooltip-bidsquare {font-size: 12px;font-family: sans-serif;font-weight: 300;line-height: 14px;color: #fff;text-align: center;margin-top: 6px;display:block;background: #00cd35;width: 14px;height: 14px;border-radius: 10px;}
.bidsquare-item-main .top .tooltip-inner {background: rgba(0,205,53,0.75);font-size: 12px;font-family: sans-serif;font-weight: 400;border-radius: 0;line-height: 13px;}
.tooltip.top .tooltip-arrow {display: none;}
.bidding-sold-for {font-size: 14px;font-family: sans-serif;font-weight: 400;color: #0e0e0e;line-height: 1.2;display: inline-block;}
.not-won span:first-child {color: #ff0000;font-family: sans-serif;font-size: 14px;font-weight: 400;line-height: 1.2;}
.not-won span:last-child {padding-left: 5px;color: #0e0e0e;font-family: sans-serif;font-size: 14px;font-weight: 400;line-height: 1.2;}
.registered-left .bidsquare-top {width: 22%;margin-right: 20px;}
.registered-left .bidsquare-top {width: 22%;margin-right: 17px;}
.registered-left .bidsquare-top:last-child {margin-right: 0;}
.registered-right .bidsquare-right {width: 65%;}
.registered-box {display: inline-block;padding-left: 20px;vertical-align: middle;}
span.set-reminder {/*display: inline-block;*/display: block;padding-bottom: 2px;position: relative;}
span.set-reminder .set-reminder-icon, span.set-reminder .set-reminder-txt {display: inline-block;vertical-align: middle;}
.item-detail span.reminder_text {font-family: sans-serif;font-weight: 300;font-size: 12px;color: #0e0e0e;line-height: 1.2;}
.set-reminder img {width: 23px;height: 23px;display: inline-block;}
.set-reminder a {font-family: sans-serif;font-weight: 300;font-size: 12px;color: #0e0e0e;line-height: 1.2}
.auction-end {font-size: 14px;color: #ff0000;font-family: sans-serif;font-weight: 400;line-height: 1.2;}
img.registered-img {max-width: 90px;}
ul.atcb-list {width: 140px;box-sizing: border-box;border: 1px solid #ccc;background: #fff;margin-top: 6px;text-align: left;z-index: 999;visibility: hidden;position: absolute;}

ul.atcb-list li {padding: 5px !important;}
ul.atcb-list li a {font-family: sans-serif;font-weight: 400;font-size: 14px;color: #0e0e0e;}

.atcb-list li:hover {background: #f8f8f8;}
.atcb-list a:hover {color: #00deff;}
.item-won.bidsquare-icon .bidsquare-top.item-won-radio{width: 43%;}
.item-won.bidsquare-icon .bidsquare-top.item-won-radio [type="radio"]:checked + label:after {top: 4px;left: 4px;}
.bidsquare-icon .bidsquare-top .item-bid-circle {display: inline-block;position: relative;}
.item-won .bidsquare-top:first-child {width: 25%;margin-right: 22px;}
.item-won .items-bid input {-webkit-appearance: radio;-moz-appearance: radio;-ms-appearance: radio;-o-appearance: radio;appearance: radio;border: #ededed solid 1px;width: 13px;height: 13px;border-radius: 50%;background: #ffffff;vertical-align: bottom;}
.item-won .items-bid label {padding-right: 14px;font-size: 14px;font-family: sans-serif;font-weight: 400;color: #747474;}
.items-bid .check-radio {position: absolute;width: 6px;height: 6px;background: rgba(0,222,255,1);top: 42%;left: 3px;border-radius: 50%;}
.bidsquare-item-main thead th:first-child {text-align: center;}

.my-alert-sec {padding-top: 60px;max-width: 700px;margin: 0 auto;}
.my-alert-sec h2 {font-family: sans-serif;font-weight: 400;font-size: 18px;color: #0e0e0e;padding-bottom:20px;}
.my-alert-sec p {font-family: sans-serif;font-weight: 300;font-size: 14px;color: #0e0e0e;line-height: 1.3;}
.alert-form input {width: 50%;border: 1px solid #e0e0e0;background: #fff;box-sizing: border-box;padding: 8px 15px;font-family: sans-serif;font-weight: 300;font-size: 14px;color: #0e0e0e; text-align: left;}
.alert-form button {background: rgba(0,222,255,1);color: #ffffff;border: 1px #00deff solid;margin-left: 8px;padding: 8px 27px; font-family: sans-serif;font-weight: 400;font-size: 14px;}
.alert-form button:hover {background: rgba(0,222,255,0.7);}
#dyn_keyword_area {float: left; width: 100%; margin-top: 20px;}
#dyn_keyword_area .keyword{display: inline-block; border: 1px solid #e5e5e5; border-radius: 15px; padding: 8px 10px; width: 106px; margin-left: 10px;position: relative; font-weight: 300; font-size: 14px;}
#dyn_keyword_area .keyword a{text-overflow: ellipsis;overflow: hidden;white-space: nowrap; width: 80px; float: left;}
#dyn_keyword_area .keyword .keyword_img{position: absolute;right: 7px; top: 7px;}
#dyn_keyword_area .keyword:first-child{margin-left: 0;}
.caegory-sec {padding-top: 68px;float: left; width: 100%;}
.caegory-sec h3 {font-family: sans-serif;font-weight: 400;font-size: 18px;color: #0e0e0e;padding-bottom: 20px;}
.caegory-sec p {font-family: sans-serif;font-weight: 300;font-size: 14px;color: #0e0e0e;line-height: 1.35;}
.alert-category-box .check-bidsquare:after, .alert-category-box-last .check-bidsquare:after {width: 5px;height: 10px;left: 6px;border-width: 0 2px 2px 0;top: 2px;}
.alert-category-box .check-bidsquare, .alert-category-box-last .check-bidsquare {width: 20px;height: 20px;border: 2px solid #e5e5e5;}
.alert-category-box .new_check_gruop, .alert-category-box-last .new_check_gruop {display: inline-block;vertical-align: middle;}
.alert-category-box a, .alert-category-box-last a {line-height: 1.4;font-family: sans-serif;font-weight: 300;font-size: 14px;color: #0e0e0e;padding-left: 15px;vertical-align: top;padding-top: 3px;display: inline-block;}
.alert-category-box ul li {width: 33%;display: inline-block;padding-bottom: 8px;}
.my-alert-sec .alert-category-box {padding: 44px 0 12px;border-bottom: 1px #e1e1e1 dashed;position: relative; float: left;width: 100%;}
.my-alert-sec .alerts-toggle {position: absolute;right: 18px;top: 34px;font-size: 27px;color: #ccc;display: none;}
.alert-category-box h4 {color: #0e0e0e;font-size: 14px;padding-bottom: 18px;font-family: sans-serif;font-weight: 400;}
.my-alert-sec button {background: rgba(0,222,255,1);color: #ffffff;font-family: sans-serif, sans-serif;font-size: 14px;font-weight: 400;margin: 0;text-align: center;display: inline-block;padding: 8px 60px;}
.my-alert-sec button:hover {background: rgba(0,222,255,0.7);}
.alert-category-box-last {padding-top: 60px;width: 100%;float: left;}
.alert-category-box-last h4 {font-family: sans-serif;font-weight: 400;font-size: 18px;color: #0e0e0e;padding-bottom: 12px;}
.alert-category-box-last a {font-weight: 400;}

.account-info {padding-top: 52px;}
ul.account-left {max-width: 80%;}
ul.account-left li a {padding: 13px 0 14px;font-family: sans-serif;font-weight: 400;color: rgba(0,0,0,0.54);font-size: 14px;display: block;}
ul.account-left li a:after{content: "\f105";font-family: "FontAwesome";vertical-align: middle;color: rgba(0,0,0,0.54);font-size: 22px;float: right;}
ul.account-left li.on a, ul.account-left li a:hover, ul.account-left li.on a:hover:after, ul.account-left li.on a:after {color: #00deff;}
.account-right {padding-bottom: 20px;border-bottom: 1px #e7eae9 solid;width: 100%;float: left;}
.account-right h2, .currency-right h2 {padding-bottom: 40px;font-family: sans-serif;font-weight: 400;font-size: 20px;color: #0e0e0e;}
.account-right label, .billing-form .form-group label {display: inline-block;font-family: sans-serif;font-weight: 
400;font-size: 14px;color: #0e0e0e;width: 16%;vertical-align: middle;}
.account-right .form-group label{float: left;margin-top: 7px;}
.account-right .form-group.text_reminder label {float: none; margin-top: 0;}
.account-right .form-group.t_u_m-wrap select{float: left;}
.account-right .form-group.t_u_m-wrap .input_tit {float: left;margin-left: 10px;margin-top: -30px;}
.account-right .form-group.t_u_m-wrap .input_tit label{display: block; float: left; width: 100%; padding: 0; margin-bottom: 7px;}
.account-right .form-group.t_u_m-wrap .input_tit span{border: 1px #cccccc solid; padding: 3px 10px;background-color: #ebebe4; margin-top: 3px; display: inline-block; float: left;}
.account-right .text_reminder{margin-left: 123px !important;}
.account-right .text_reminder .check{width: 60%;margin-bottom: 0;}
.account-right .text_reminder label{width: 100%;}
.account-right .user_info_aside{display: inline-block;}
.account-right .user_info_aside .warning_msg{display: block;}
.account-right .form-group {padding-bottom: 25px;margin: 0;}
.form-group.phoneNumber .country-code{width: 220px;display: inline-block;}
.form-group.phoneNumber .country-code input#country_code {
    -webkit-appearance: none!important;
    width: 42px;
    text-align: right;
    border: 1px solid #cccccc;
    border-right: 0px;
    outline: none;
    padding: 3px;
    background:none;
}
.form-group.phoneNumber .country-code input#phone {
    -webkit-appearance: none!important;
    text-align: left;
    width: 178px;
    border: 1px solid #cccccc;
    border-left: 0px;
    margin: 0 0 0 -4px;
    background: white;
    padding: 3px;
}
.account-right .form-group {padding-bottom: 25px;margin: 0;float: left; width: 100%;}
.account-right .form-control, .billing-form .form-control {width: 220px;display: inline-block;border: 1px #cccccc solid;padding: 5px 10px;font-family: sans-serif;font-weight: 300;font-size: 14px;color: #0e0e0e;border-radius: 0;height: inherit;box-shadow: inherit;vertical-align: middle;}
.account-right select, .billing-form select {background: url(../img/selectbox_icon.png) no-repeat 95% 50%;}
.account-right label span, .billing-form label span {color: #ff0000;padding-top: 2px;}
.account-info .account-form .account-right:nth-child(2), .account-info .account-form .account-right:nth-child(3) {padding-top: 42px;}
.account-info .account-right:nth-child(3) {border-bottom: 0;}
.account-info .account-right ul {padding-bottom: 25px;}
.account-right ul li {display: inline-block;width: 28%;font-family: sans-serif;font-weight: 400;font-size: 14px;color: #0e0e0e;}
.account-right ul li:last-child {position: relative;cursor: pointer;}
.account-right ul li img {width: 20px;height: 20px;}
.account-info .account-right ul li span  a{color:#00deff; margin-left: 5px;}
.account-right h3 {padding-bottom: 40px;font-family: sans-serif;font-weight: 400;font-size: 16px;}
.account-bottom {padding-top: 47px;text-align: center;}
.account-bottom label {font-family: sans-serif;font-weight: 300;font-size: 12px;color: #0e0e0e;padding-bottom: 10px;}
.account-bottom button, .currency-right button, .privacy_container button {background-color: rgba(0,222,255,1);font-family: sans-serif;font-weight: 400;font-size: 16px;text-align: center;color: #ffffff;display: block;margin: 0 auto;padding: 4px 60px;height: auto;min-width: inherit;line-height: 20px;}
.account-bottom button:hover, .currency-right button:hover, .privacy_container button:hover {background-color: rgba(0, 222, 255, 0.7);color: #ffffff;}
.payment-form h2, .billing-form h2 {font-family: sans-serif;font-weight: 400;font-size: 18px;color: #0e0e0e;padding-bottom: 40px;text-align: left;}
.payment-div {padding-bottom: 60px;float: left;width: 100%;}
.payment-div .title{padding-bottom: 40px;}
.payment-div .credit_card_btmtext{font-size: 14px; font-family: sans-serif; font-weight: 300; color: #0e0e0e;float: left;width: 100%;}
.payment-div #register-form .form-wrap{max-width: 470px; padding: 0 35px;}
.payment-div #register-form .form-wrap .card-wrap{position: relative;float: left;width: 100%;}
.payment-div #register-form .my_btn_area{float: left;width: 100%;text-align: center;}
.payment-top ul {text-align: center;}
.payment-top ul li {padding-bottom: 25px;text-align: left;}
.payment-top ul li label, .payment-top ul li span {width: 20%;font-family: sans-serif;font-weight: 400;font-size: 14px;color: #0e0e0e;}
.payment-top ul li span {padding-right: 6px;}
.payment-top .credit_card {text-align: center; width: 100%;}
.payment-top .credit_card button {background-color: rgba(0,222,255,1);font-family: sans-serif;font-weight: 400;font-size: 14px;color: #ffffff;padding: 6px 32px;margin-top: 10px;display: inline-block;}
.payment-div .credit_card .err_msg {color: red; font-size: 14px; padding: 0 0 10px 0; text-align: center;}
.account-info .billing-form {padding: 62px 0 60px;border-top: 1px #e7eae9 solid;border-bottom: 1px #e7eae9 solid;width: 100%;display: inline-block;position: relative;}
.account-info .billing-form .user_info_aside{display: inline-block;width: 58%;}
.billing-form .form-group {width:100%;float: left;padding-bottom: 25px;margin-bottom: 0;}
.billing-form .col-md-12, .billing-form .col-md-6{padding: 0}
.billing-form .form-group label {width: 40%;}
.billing-form .form-control {width: 100%;}
.billing-form .form-group.phoneNumber .country-code{width: 58%;display: inline-block;}
.billing-form .form-group.phoneNumber .country-code input#country_code {
    -webkit-appearance: none!important;
    width: 42px;
    text-align: right;
    border: 1px solid #cccccc;
    border-right: 0px;
    outline: none;
    padding: 5px;
    background:none;
}
.billing-form .form-group.phoneNumber .country-code input#phone {
    -webkit-appearance: none!important;
    text-align: left;
    width: 80%;
    border: 1px solid #cccccc;
    border-left: 0px;
    margin: 0 0 0 -4px;
    background: white;
    padding: 5px;
}
.billing-click_icon {display: none;}

.billing-form .col-md-6:nth-child(even) .form-group{margin-left: 66px;}
/*.account-info .billing-form:last-child .form-group:nth-child(odd) {margin-left: 66px;}*/
.account-info .billing-form:last-child .form-group:nth-child(even) {margin-left: 0;}

.billing-form button {display: block;clear: both;margin: 10px auto 0;background: rgba(0, 222, 255, 1);color: #ffffff;line-height: inherit;min-width: inherit;padding: 7px 60px;}

.same-bill{position: relative;}
.same-bill .check label{margin-left: 5px;}
/*.billing-form.shipping-form .form-group:nth-child(even) {margin-right: 66px; }*/

.account-info .billing-form:last-child {padding-bottom: 0;border-bottom: 0;position: relative;}
.my-alert-sec .new_check_gruop .check-bidsquare {width: 20px;height: 20px;}
.same-bill .new_check_gruop {display: inline-block;}
.same-bill a {font-family: sans-serif;font-size: 14px;font-weight: 300;color: #0e0e0e;display: inline-block;vertical-align: middle;padding-left: 15px;}
.same-bill .check-bidsquare:after {width: 5px;height: 12px;left: 7px;border-width: 0 2px 2px 0;}
.click_icon {position: absolute;top: 62px;right: 0;display: inline-block;cursor: pointer;}

#currency-form input[type="radio"] {visibility: hidden;width: 1px;height: 1px;padding: 0;overflow: hidden;clip: rect(0,0,0,0);border: 0;position: absolute;top: -999px;}
#currency-form input[type="radio"] + label { display: inline-block;cursor: pointer;}
#currency-form label {font-family: sans-serif;font-weight: 300;font-size: 14px;color: #0e0e0e}
#currency-form label img {width: 22px;}
#currency-form input[type="radio"] + label:before {content: "";display: inline-block;zoom: 1;width: 16px;height: 16px;margin-right: 13px;vertical-align: middle;}
#currency-form ul li {padding-bottom: 40px;}
.currency-right .disclaimer {background: url(../img/svg/info_icon.svg) no-repeat left 2px;background-size: 15px;padding-left: 25px;font-family: sans-serif;font-weight: 300;font-size: 13px;margin-bottom: 60px;}
.credit-card-form {width:100%;display: none;padding-bottom: 60px;}
.credit-card-form .input-area {position: relative;padding-left: 35px;width:58%;display: inline-block;}
.credit-card-form .form-group {margin-bottom: 0;}
.credit-card-form .form-group input {height:auto;border: 2px #e0e0e0 solid;padding: 14px 25px 14px 25px;border-radius: 0;color: #32325d;line-height: 18px;font-family: "Helvetica";font-size: 16px;}
.credit-card-form .form-group:first-child input {color: #32325d;line-height: 18px;font-family: "Helvetica";font-size: 16px;}
.credit-card-form .form-group label {font-family: sans-serif;color: #0e0e0e;font-size: 14px;font-weight: 400;}
.credit-card-form .form-group:nth-child(2), .credit-card-form .form-group:nth-child(3) {width: 48%;float: left;margin-right: 4%;}
.credit-card-form .form-group:nth-child(3) {margin-right: 0;}
.credit-card-form .form-group:nth-child(2) input, .credit-card-form .form-group:last-child input {text-align: center;font-size: 14px;}
.input-area .qus-icon {position: absolute;right: -24px;bottom: 18px;}
.credit-card-form p {font-family: sans-serif;font-weight: 300;font-size: 14px;line-height: 18px;padding-top: 8px;max-width: 65%;}
.credit-card-form .button-area {text-align: center;}
.payment-div .my_btn_area input[type=submit] {cursor: pointer;color: #fff;background-color: #00deff;padding: 7px 45px;font-size: 14px;border-style: none;box-sizing: border-box;font-family: sans-serif;font-weight: 400;line-height: 18px;}
.payment-div .my_btn_area .btn:hover {background-color: rgba(0, 222, 255, 0.7); }
.payment-div .my_btn_area a.btn-info {cursor: pointer;color: #fff;background-color: #adadad;padding: 7px 45px;font-size: 14px;border-style: none;margin-left: 10px;font: 400 14px/18px sans-serif;}
.payment-div .my_btn_area .cancel:hover {background-color: rgba(173, 173, 173, 0.7); }
.table-responsive {overflow: inherit;}
#account-toggle-button {display: none;}
.no-record {font-family: sans-serif, sans-serif;line-height: 1.2;font-weight: 400;text-align: center;}
.no-record-medium{font-family: sans-serif, sans-serif;line-height: 1.2;font-weight: 400;text-align: center;font-size: 24px;padding: 20px 0;}
/* My Bidsqare css end */

/* Calendar css start */
.calendar-top {padding: 23px 0 20px;}
.calendar-top h1 {padding-bottom: 6px;}
.calendar-top h2 {font-size: 18px;line-height: 1.2;font-weight: 500;font-family: sans-serif;margin: 0 auto;}
.calendar-month {text-align: center;padding: 0 0 60px;border-bottom: 1px #ccc solid;}
.calendar-month span {width: 35px;height: 35px;border: 1px solid #eee;cursor: pointer;line-height: 30px;display: inline-block;text-align: center;}
.calendar-month span img {width: 11px;display: inline-block;vertical-align: middle;}
.calendar-month h2 {font-size: 18px;font-family: sans-serif;font-weight: 500;display: inline-block;padding: 0 24px;}
.calendar-list {text-align: right;padding: 15px 0 7px;}
.calendar-list-box {display: inline-block;width: 18%;margin-left: 25px;vertical-align: middle;}
.calendar-list-box select {padding: 5px 4px 5px 10px;border: 1px #ccc solid;background: url(../img/selectbox_icon.png) no-repeat 95% 50%;font-family: sans-serif;font-weight:400;font-size: 14px;color: #949494;line-height: 22px;width: 100%;}
.calendar-list-box span {font-family: sans-serif;font-weight: 400;font-size: 14px;color: #0e0e0e;}
.table-left {width: 72%;float: left;}
table.table-left th {font-family: sans-serif;font-weight: 400;font-size: 12px;color: #0e0e0e;border: 1px #ccc solid;padding: 9px 0;background-color: #ffffff;text-align: center;border-top: 0;}
table.calendar-main > tbody > tr > td {border: 0;padding: 0;}
table.calendar-main > tbody {width: 100%;}
table.table-left .bg_gray {background-color: #f3f3f3 !important;cursor: inherit !important;}
table.table-left .calendar_data {color: #000;font-family: sans-serif;font-weight: 400;border: 1px #ccc solid;background-color: #fff;cursor: pointer;border-bottom: 0;}
table.table-left .calendar_data .td_inner {position: relative;width: 100%;height: 115px;}
table.table-left .calendar_data .td_inner.today {border: 1px #000 solid;}
table.table-left .calendar_data .td_inner .date_txt {position: absolute;top: 10px;left: 6px;color: #949494;font-family: sans-serif;font-weight: 400;font-size: 14px;}
table.table-left .calendar_data .td_inner .calendar-event {width: 44px;height: 39px;background: url(../../public/img/svg/logo_grey.svg) no-repeat;text-align: center;padding-top: 4px;position: absolute;top: 50%;left: 0;right: 0;margin: -19px auto 0;font-family: sans-serif;font-weight: 400;color: #ffffff;font-size: 14px;padding-right: 4px;}
table.table-left .calendar_data .td_inner .calendar-event-blue {background: url(../../public/img/svg/logo_blue.svg) no-repeat;}
.table-right {width: 28%;display: inline-block;}
.table-right .table_scroll_calendar{height: 440px; overflow-y: auto; display: inline-grid;width: 100%;}
.table-right .table_scroll_calendar::-webkit-scrollbar {width: 5px;}
.table-right .table_scroll_calendar::-webkit-scrollbar-thumb {border-radius: 10px;-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);background-color: #ddd;}
.table-right .table_scroll_calendar::-webkit-scrollbar-track {	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #F5F5F5;}
.table-right tr th {text-align: center;padding: 9px 0;border: 1px #ccc solid;font-family: sans-serif;font-weight: 400;font-size: 12px;color: #0e0e0e;text-transform: uppercase;background: #ffffff;border-top: 0;border-left: 0;border-right: 0;width: 100%;display: inline-block;}
.table-right tr:first-child td {color: #000;font-family: sans-serif;font-weight: 400;background-color: #ffffff;text-align: center;padding: 0 12px;border-top: 1px solid #ccc;}
.table-right tr td h2 {font-family: sans-serif;font-weight: 400;line-height: 1;font-size: 20px;color: #0e0e0e;padding: 35px 0;border-bottom: 1px #ccc solid;}
.table-right tr td h2 span {font-size: 18px;font-family: sans-serif;font-weight: 500;display: block;line-height: 1.4;}
.table-right .table_scroll_calendar tr:first-child td{text-align: left; border-top: 0;}
.table-right .table_scroll_calendar .timeing {font-family: sans-serif;font-weight: 400;font-size: 12px;float: left; margin-right: 5px;}
.table-right .table_scroll_calendar .timeing.live_calendar_tag{background-color: #00cd35;color: #fff;}
.table-right tr td {padding: 20px 12px 0;text-align: left;width: 100%;display: inline-block;}
.table-right .close-time {font-family: sans-serif;font-weight: 400;background-color: #9f9e9e;color: #ffffff;font-size: 12px;display: inline-block;padding: 0 1px;}
.table-right .close-time.live_calendar_tag{background-color: #00cd35;}
.table-right .caption-text {font-family: sans-serif;font-weight: 400;font-size: 16px;color: #0e0e0e;cursor: pointer;}
.table-right .caption-text:hover, .table-right .auction-house-txt h4 a:hover, .table-right .auction-house-txt span a:hover {text-shadow: -.1px -.1px 0 black, .1px .1px black;}
.table-right .auction-house {padding: 12px 0 20px;border-bottom: 1px #ccc solid;}
.table-right .auction-house-img {width: 63px;height: 63px;display: inline-block;vertical-align: top;margin-right: 4px;border: 1px solid #f3f1f1;}
.table-right .auction-house-img img {width: 100%;height: 100%;object-fit: contain;}
.table-right .auction-house-txt {display: inline-block;vertical-align: top;width: 167px;}
.table-right .auction-house-txt h4 a, .table-right .auction-house-txt span a {font-family: sans-serif;font-weight: 400;font-size: 14px;color: #0e0e0e;}
.table-right .auction-house-txt .ended_txt {margin-top: 5px;} 
.table-right .auction-house-txt .register_now {padding: 4px 0; font-size: 13px; line-height: normal;}
.table-right .auction-house-txt span {cursor: pointer;display: inline-block;}
.table-right .auction-house-txt span.icon_view, .table-right .auction-house-txt span.pre-register-icon{position: relative;top: -2px;margin-left: 5px; padding-left: 5px; }
.table-right .auction-house-txt span.icon_view:before{position: absolute;content: '';background:#ccc; width: 1px; height:15px; top: 5px; left: 0;}
.table-right .auction-house-txt span.pre-register-icon {padding-left: 0;}
.table-right .auction-house-txt span.pre-register-icon:before {display: none;}
span.pre-register-icon .atcb-list {left: 0;}
.table-right .auction-house-txt .catelog span img {width: 23px; height: 23px;}
.table-right .auction-house-txt span:first-child {width: 22px;height: 22px;margin-left: -4px;}
.table-right .auction-house .auction-end {font-family: sans-serif;color: #ff0000;font-weight: 400;font-size: 14px;padding-top: 5px;    width: 100%;margin-top: 0;}
.table-right #time-schedule-table tr th{border-bottom: 0;margin:1px 0;}
.calendar-main {border-left: 0;margin-bottom: 0;}
.calendar-main .table-left,.calendar-main .table-right{border: 1px #ccc solid;}
.calendar-main .table-right {border-left: none;}
.table-right tr:last-child td .auction-house {border-bottom: 0;}
.table-right > thead > tr, .table-right thead, .table-right tr  {width: 100%;display: inline-block;}
.noAuction {
    text-align: center;
    width: 100%;
    font-size: 20px;
    display: block;
    padding-top: 10px;
    color: #ff0000;
}
/* Calendar css end */

.highlight-bidsquare .press_card {display: inline-block; width: 318px; background-color: #ffffff; box-sizing: border-box; margin-bottom: 25px; cursor: pointer;text-align: center;}

/*Pagination according to current*/
.pagination {text-align: center; display: block; margin: 20px auto;}
.pagination li i{color: #00DEFF;margin: 0 10px;}
/*Pagination according to current*/

/*Chosen plugin override*/
.dropDown .chosen-container-single .chosen-single {border-radius: inherit; background-color: inherit; background: inherit; background: inherit; background-clip: inherit; -webkit-box-shadow: inherit; box-shadow: inherit; border: 1px solid #cccccc; height: 29px; font-size: 14px; color: #0e0e0e; font-weight: 300; text-align: left; padding: 0 10px; line-height: 25px;}
.dropDown .chosen-container-single .chosen-single div b {background: #ffffff url(../img/selectbox_icon.png) no-repeat 95% 50% !important;position: absolute; right: 5px;}
.dropDown .chosen-container-active.chosen-with-drop .chosen-single {border: 1px solid #cccccc;background-image: none; box-shadow: inherit;}
.dropDown .chosen-container .chosen-drop {border: 1px solid #ccc;}
.dropDown .chosen-container-active.chosen-with-drop .chosen-single div b {background-position: 95% 50%;}
.dropDown .chosen-container .chosen-results {text-align: left;}
.dropDown .chosen-container-single .chosen-single abbr {top: 8px;}

/*Common Css*/
.no_record_found {text-align: center; display: block; width: 100%; font-size:24px; margin-top: 20px;}
.auction-no-record {text-align: center; display: block; width: 100%; font-size:24px; margin-top: 20px;}
.auction-no-record .main_heading{color: #0e0e0e;font-family: sans-serif ;font-size: 22px; margin-bottom: 15px;padding-bottom: 0;}
.auction-no-record .sub_heading{color: #0e0e0e;font-family: sans-serif ;font-size: 16px;}
.auction-no-record .sub_heading a{text-decoration: underline;}
.ended_txt {color: #ff0000; font-size: 14px; margin-top: 22px;}
.green_t {color: #12c30f !important; font-size: 13px;}
.start_btn {width: 78px; height: 19px; background: url(../img/start_bid_bg.png) no-repeat; color: #fff; font-size: 12px; display: block; margin: 10px auto 0; line-height: 18px; text-align: left; padding-left: 3px; }
.pending_txt {color: #ff9f00 !important; font-size: 14px; text-align: center;}
h2.v_heading {font: inherit; color: inherit; padding-bottom: inherit;}
.red_t {color: #f00 !important; font-size: 14px;}
.color_green01 {color: #12c30f !important;} 
.color_green01 a{color: #12c30f;} 
.unsold {text-align: center; float: none;}
.color_orange01 {color:#ff9f00 !important;}
.bidding .bid_related_txt.red_t {text-align: center; font-size: 12px; width: 100%;}
button:disabled, button[disabled] {opacity: 0.2; }
.modal button.close_popup {background-color: unset;}
.align-center {text-align: center;}
.f_item_myItem_time_left {font-size:12px; color:#ff0000;}
.f_item_startIn_endIn, .f_item_myItem_startEnd_time {font-size:14px; font-weight: 300;}
.color_red01 {color:#ff0000;}
.color_black01 {color:#0e0e0e;}
.hide_div {display: none !important;}
.f_item_reserve_notMet {font-size: 12px; color: #ff0000; float: left; width: 100%;text-align: left;max-height: 16px;overflow: hidden;}
.ack_bid_msg {margin-top: 3px; font-size: 12px;}
.copyRight .toggle-desktop {display: none;}
.f_item_detail_youWon {color:#00cd35;}
/*Common Css*/
/*Auction List*/
.upcomSec .listUl li .green_t {padding-top: 24px;}
.upcomSec .listUl li .pending_txt {padding-top: 24px;}

/*Bidsqaure custom banner*/
.sub_contents_inner {background-color: #fff; width: 1000px; margin: 0 auto;}

.bid_banner{border-top: 1px solid #eee;border-bottom: 1px solid #eee;float: left;width: 100%;position: relative;background-color: #ffffff;}

.bid_banner .sub_contents_inner img{float: left;width: 100%;}
.seo_tag{position: absolute; left: 0; right: 0; margin: 0 auto; display: block; top: 63px; text-align: center; max-width: 620px;}
.seo_tag h1{font-size: 30px; color: rgb(14, 14, 14); font-family: "sans-serif"; font-style: italic; font-weight: normal; max-width: 610px; text-align: center; line-height: 35px; margin: 0px auto 50px;}
.seo_tag p{font-family:sans-serif; font-size: 18px; line-height: 25px; margin-bottom: 30px;}
.visual_area li.bid_custom_banner:hover .main_visual{cursor: auto !important;} 
.banner_link{max-width: 620px; margin: 0 auto 50px;}
.banner_link ul li{display: inline-block;width: 21%; padding: 0 10px; text-align: center;vertical-align: middle;}
.banner_link ul li a{font-size: 14px;border-bottom: 2px solid transparent; padding-bottom: 10px;}
.banner_link ul li a:hover{border-bottom: 2px solid #4BDBF3; transition: 0.5s ease all;}
.banner_link ul li img{width: 44px; height: 44px; margin: 0 auto 10px; text-align: center; display: block;}
.new_tab_bottom.btm_bid_bnr {width: 100%; height: 1px; border-bottom: 2px #f9f9f9 solid; box-sizing: border-box; }
 /*Bidsqaure custom banner*/
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
/*Email Verify popup*/
/*Register Now Popup*/
.register_now .modal-dialog, .cong-form .modal-dialog{width:430px; height: auto;font-family: sans-serif; color: #0e0e0e;}
.register_now .modal-dialog .modal-body, .cong-form .modal-dialog .modal-body{ padding:25px 0 20px;}
.register_now .modal-dialog .wrap_popup, .cong-form .modal-dialog .wrap_popup{max-width:370px; margin:25px auto 0;}
.register_now .modal-dialog .bid_title {padding-bottom: 20px;font-size: 26px;padding: 0px 0 20px;}
.register_now .modal-dialog .bid_info, .cong-form .modal-dialog .bid_info{background: #f0f0f0;padding:14px 30px 14px;cursor: pointer;}
.register_now .modal-dialog .bid_info h5{margin-bottom: 8px;display: block;font-size: 14px;}
.register_now .modal-dialog .bid_info h4{white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 100%; font-size: 20px;}
.register_now .modal-dialog .bid_info .reg_bid_img{margin-top: 10px;}
.register_now .modal-dialog .bid_info .reg_bid_img img{width: 62px; height: 62px;display: inline-block;}
.register_now .modal-dialog .bid_info .reg_bid_img span{padding-left: 5px;width: 300px; white-space: nowrap; overflow: hidden!important; text-overflow: ellipsis;font-size: 14px;font-weight: lighter;}
.register_now .modal-dialog .agree_terms{margin-top: 12px;}
.register_now .modal-dialog .agree_terms .check{width: 100%;margin-bottom: 0; text-align: left;}
.register_now .modal-dialog .agree_terms a{color: #00deff;}
.modal-dialog form {text-align: center;}
.modal-dialog .btn-center {text-align: center;}
.register_now .modal-dialog form button {width:auto; margin: 0 auto;font-size: 18px;float: none;padding: 5px 20px;}
.cong-form .modal-dialog .bid_info {margin-top: 40px;}
.cong-form .modal-dialog .modal-body button {width: 145px; margin: 0 auto; padding: 4px 0;font-size: 18px;line-height: 27px;}
.registration-approval h2 {font-style: italic;font-family: sans-serif;line-height: 1.2;font-size: 24px;color: #0e0e0e;padding-bottom: 0;text-align: center;}
.registration-approval h2 span {color: #ff9f00;}
.registration-approval p {padding: 18px 0 0;font-family: sans-serif;font-weight:300;font-size: 16px;text-align: center;color: #0e0e0e;}
.registration-approval p:last-child {padding-top: 10px;font-family: sans-serif;font-size: 16px;color: #0e0e0e;font-weight: 400;}

#event_pending_popup .registration-pending-cc-message {background: #888888; color: #FFF; padding: 10px 30px; font-size: 13px; font-weight: 300; line-height: 16px;}
#event_pending_popup .registration-pending-cc-message .show-credit-card-form-link {color: #01deff;}

/*Register Now Popup*/
/*Register Now Popup*/
.credit-boxs {padding: 0 10px;text-align: center;}
.credit-boxs img {margin: 0 auto;display: block;padding: 15px 0 28px;}
.credit-boxs h2 {font-family: sans-serif;font-weight: 400;font-size: 20px;color: #0e0e0e;padding-bottom:0;}
.credit-card .modal-dialog {width: 500px;height: auto;}
.credit-boxs p {padding: 28px 0 0;font-size: 16px;font-family: sans-serif;font-weight: 300;color: #0e0e0e;}
.credit-boxs .form-wrap {padding: 0 47px;display: inline-block;width: 100%;}
.credit-boxs form input {color: #32325d;font-family: 'Helvetica', sans-serif;font-size: 16px;padding: 14px 18px;border: 2px #e0e0e0 solid;width: 100%;margin-top: 20px;}

.credit-boxs form input[type="text"] {font-family: sans-serif;font-weight: 400;}
.card-wrap .card-exp {width: 47%;padding-top: 20px;float: left; margin-right: 0;}
.card-wrap .card-exp:first-child{margin-right: 6%;}

.credit-boxs form .card-exp input {margin-top: 0;}
.card-exp span {font-family: sans-serif;font-size: 14px;color: #0e0e0e;font-weight: 400;text-align: left;display: block;}
.credit-boxs p:nth-child(2) {font-size: 14px;}
.cong-form .modal-dialog .credit-boxs form button, .cong-form .modal-dialog .credit-boxs form input[type="submit"] {width: 344px;margin: 23px auto 20px;color: #ffffff;background-color: rgb(0, 222, 255);font-family: sans-serif;font-weight: 400;font-size: 16px;padding: 15px 0;display: block; border: 0;}
.cong-form .modal-dialog .credit-boxs form button:hover, .cong-form .modal-dialog .credit-boxs form input[type="submit"]:hover {background-color: rgba(0, 222, 255, 0.7);}
.credit-boxs form .card-wrap {position: relative;}
.card-wrap .ques_icon {position: absolute;right: -22px;top: 37px;cursor: pointer;}
.credit-boxs p.credit_card_btmtext{font-size: 14px;}
/*Credit Popup*/
/*Congratulation Popup*/
.congo {padding-bottom: 25px;text-align: center;}
.congo h2 {font-style: italic;font-family: sans-serif;font-size: 36px;line-height: 1.2;color: #0e0e0e;padding-bottom: 0;}
.congratulation .modal-body .congo p {padding-top: 13px;font-size: 16px;font-family: sans-serif; font-weight: 400;font-size: 16px;color: #0e0e0e;padding-bottom: 0;}
.congo p span {color: #00cd35;}
.congratulation .modal-body .congo p:last-child {padding-top: 17px;font-size: 16px;font-weight: 400;}
/*Congratulation Popup*/
/*Inquire Popup*/
.inquire-box h2, .bid-box h2 {font-size: 24px;color: #333333;padding-left: 20px;line-height: 1.1;font-family: sans-serif;font-weight: 400;padding: 0 20px 12px;}
.inquire-box-wrap {padding: 14px 30px;background-color: #f0f0f0;margin-bottom: 15px;}
#inquire-form label {display: inline-block;padding-right: 15px;font-family: sans-serif;font-weight: 300;font-size: 14px;color: #212020;width: 21%;text-align: right;vertical-align: middle;}
#inquire-form input, #inquire-form select, #inquire-form textarea {width: 78%;border: 1px #ccc solid;padding: 6px 15px;font-family: sans-serif;font-weight: 300;display: inline-block;border-radius: 0;height: auto;font-size: 16px;vertical-align: middle;}
#inquire-form .form-group {margin: 0;padding: 8px 0;}
#inquire-form select {background: #ffffff url(../img/selectbox_icon.png) no-repeat 95% 50%;font-size: 14px;line-height: 20px;}
#inquire-form textarea {min-height: 148px;}
#inquire-form button {margin-bottom: 0;margin-right: 15px;}
#inquire-form button:last-child {margin-right: 0;}
#inquire-form button#cancel {background-color: #999;}
#inquire-form button:hover {background-color: #31c82f;}
.inquire-form .modal-dialog, .bid-history-form .modal-dialog {width: 486px;}
.inquire-form .modal-body {padding: 34px 0 20px;} 
/*Inquire Popup*/
/*Bid History Popup*/
.bid-history-info {background-color: #f0f0f0;padding: 20px 28px;}
.bid-history-form .modal-body {padding: 34px 0 20px;}
.bid-history-info p {font-family: sans-serif;font-weight: 400;font-size: 14px;color: #0e0e0e;padding-bottom: 7px;}
.bid-history-info span {font-family: sans-serif;font-weight: 300;font-size: 20px;line-height: 1.2;color: #0e0e0e;}
.bid-history-info .price-area {padding-top: 18px;}
.bid-history-info .price-area span:first-child {font-family: sans-serif;font-weight: 400;font-size: 14px;color: #999;}
.bid-history-info .price-area span:last-child {font-family: sans-serif;font-weight: 400;font-size: 20px;color: #0e0e0e;padding-left: 20px;}
table.bid-wrap {background: inherit;padding: 24px 35px 0 30px;margin: 0 auto;display: block;}
table.bid-wrap th {font-family: sans-serif;font-weight: 400;font-size: 14px;color: #0e0e0e;line-height: 1;background: inherit;text-align: center;padding-bottom: 10px;}
table.bid-wrap tbody {height: 170px;width: 100%;border: 1px solid #e0e0e0;display: block;overflow-y: auto;}
table.bid-wrap tbody td {text-align: center;padding: 10px 0;line-height: 1;font-family: sans-serif;font-weight: 400;font-size: 14px;color: #0e0e0e;}
table.bid-wrap tbody tr {width: 100%;}
table.bid-wrap tbody tr td:first-child {width: 100px;}
table.bid-wrap tbody tr td:nth-child(2) {width: 122px;}
table.bid-wrap tbody tr td:last-child {width: 198px;}
table.bid-wrap tbody tr.no-bid-history td:last-child {width: 420px;}
.bid-box button:hover {background: #999;}
.bid-box button {margin: 15px auto 0;background-color: #999;display: block;}
 /*Bid History Popup*/

/*Error Message*/
.popup_error{font-size: 12px; color: red; display: none; text-align: center; font-family: sans-serif;}
.popup_error p{font-size:inherit; color:inherit;font-family: inherit;}
.warning_msg {color: #ff0000; font-size: 13px; padding-top: 3px;}
/*Register Step 1 start*/
.resister-step1, .resister-step2 {background-color: #f9f9f9;border: 1px #e1e1e1 solid;padding: 32px 0 45px;}
.resister-step1 img, .resister-step2 img {display: block; margin: 0 auto;}
.resister-step1 h3, .resister-step2 h3 {text-align: center;padding: 20px 0 40px;font-size: 20px;font-family: sans-serif;font-weight: 400;}
.resister-step1 form .form-2 .name_area {width: 49.1%;margin-right: 7px;float: left; position: relative;}
.resister-step1 form .form-2 .name_area input{width: 100%;}
.resister-step1 form .form-2 .name_area.last {margin-right: 0px;}
.phoneNumber{position:relative;}
.phoneNumber .country_code{padding-left: 25px; width: 55px; padding-right: 5px; border-right: 0;} 
.resister-step1 .country-code {width: 32%;float: left;}
.resister-step1 .country-code input {border-right: 0 !important;margin-right: 0 !important;padding-right: 0 !important;}
.resister-step1 .phone {width: 68%;float: left;}
.resister-step1 .phone input {border-left: 0 !important;margin-right: 0 !important;padding-left: 0 !important;}
.resister-step1 .address-area {padding-top: 35px;border-top: 1px #e0e0e0 solid; float: left; width: 100%;}
.resister-step1 .dropDown .chosen-container .chosen-single{border: 2px #e0e0e0 solid; height: auto; padding: 10px 16px 10px 25px; width: 100%; color: #0e0e0e; font-family: sans-serif; font-weight: 400; background-color: #ffffff; font-size: 16px;}
.resister-step1 .dropDown .chosen-container-single .chosen-single div b{background: #ffffff url(../img/selectbox_icon2.png) no-repeat 95% 50%;}
.resister-step1 .dropDown .chosen-container-single .chosen-single abbr{top: 17px;}
/*.resister-step1 .address-area .dropDown .chosen-container-single .chosen-single{border: none;}*/
.resister-step1 .form-1 input, .resister-step1 .form-2 input, .resister-step1 .form-1 textarea, .resister-step2 input {padding: 14px 16px 14px 25px;border: 2px #e0e0e0 solid;font-size: 16px;color: #0e0e0e;font-family: sans-serif;font-weight: 400;height: auto;width: 100%;}
.resister-step1 .form-1 input[type="checkbox"], .resister-step1 .form-2 input[type="checkbox"], .resister-step2 input[type="checkbox"] {width: auto;}
.resister-step1 .form-1 select,.resister-step1 .form-2 select {border: 2px #e0e0e0 solid;height: auto;padding: 14px 16px 14px 25px;background: #ffffff url(../img/selectbox_icon2.png) no-repeat 97% 50%;width: 100%;color: #0e0e0e;font-family: sans-serif;font-weight: 400;} 
.resister-step1 .form-2 input {width: 48.4%;}
.resister-step1 .check {font-weight: 400;font-size: 14px;color: #0e0e0e;padding-left: 28px;width: 100%;margin-bottom: 0;}
.resister-step1 .submit-button {margin-top: 0;}
.resister-step1 .submit-button button, .resister-step2 button {font-size: 16px;color: #ffffff;background-color: #00deff;font-family: sans-serif;font-weight: 400;padding: 18px 0;width: 100%;margin-top: 10px;height: auto;line-height: inherit;}
.resister-step1 .submit-button button:hover, .resister-step2 button:hover {background-color: rgba(0,222,255,0.7);}
.resister-step1 form, .resister-step2 form {margin: 0 auto;width: 410px;}
.resister-step1 .form-2 input {margin-right: 4px;}
.resister-step1 .form-1, .resister-step1 .form-2 {padding-bottom: 20px; position: relative; float: left;width: 100%}
.resister-step1 .shipping_title{float: left; width: 100%; text-align: center; margin: 10px auto 30px; font-size: 20px;}
/*Register Step 1 end*/
/*Register Step 2 start*/
.register2-top {padding-top: 20px;}
.register2-top h3 {font-style: italic;font-family: sans-serif;font-size: 26px;line-height: 1.3;text-align: center;}
.register2-top p {display: block;padding: 32px 0;font-family: sans-serif;font-weight: 300;font-size: 16px;color: #0e0e0e;line-height: 1.3;}
.resister-step2 form input[type="text"] {margin-bottom: 20px;}
.resister-step2 form input {font-family: 'Helvetica';}
.resister-step2 p {text-align: center;clear: both;font-size: 14px;padding: 42px 0 34px;margin-left: -40px;margin-right: -40px;}
.resister-step2 .card-wrap .card-exp {padding-top: 7px;}
.resister-step2 .card-wrap .card-exp input {text-align: center;}
.ballon-img {visibility: hidden;opacity: 0;    position: absolute;
    bottom: -165px;
    right: -240px;}
.card-wrap .ques_icon:hover .ballon-img {visibility: visible;opacity: 1;}

.step3 .resister-step2 form .title{text-align: center; padding: 20px 0 40px; font-size: 20px; font-weight: 400;}
.step3 .resister-step2 form #card-number{margin-top: 0;}
.step3 .resister-step2 form .credit_card_btmtext{font-family: sans-serif;}
.step3 .resister-step2 form input[type="submit"]{font-size: 16px; color: #ffffff; background-color: #00deff; font-family: sans-serif; font-weight: 400; padding: 18px 0; width: 100%; margin-top: 10px; height: auto; line-height: inherit;border: none;} 
.step3 .resister-step2 form input[type="submit"]:hover{    background-color: rgba(0,222,255,0.7);}
.step3 .listing-top {padding-top: 20px;}
.step3 .listing-top .register-subhead{margin-bottom: 32px;margin-top: 0;}
.step3 .listing-top p{font-family: sans-serif;font-size: 16px; font-weight: 300;}
.card-wrap{position: relative;}
.card-wrap .ques_icon{    position: absolute; right: -22px; top: 37px; cursor: pointer;} 
/*Register Step 2 end*/

/*Required sign */
.required_sign {color: #ff0000; position: absolute; top: 20px; left: 14px;}
/*Register Step 2 end*/
/*Email varified start*/
.email-varify .modal-dialog {width: 603px;border: 1px solid #e1e1e1;background: #fff;}
.email-varify .modal-content {padding: 15px 25px;border: 0;text-align: center;border-radius: 0;}
.email-varify .modal-body {padding: 0;}
.email-varify .varify_info {padding: 49px 0 20px;}
.email-varify .varify_info h2 {font-size: 36px;font-style: italic;font-family: sans-serif;color: #0e0e0e;line-height: 1;font-weight: 400;}
.email-varify .varify_info span {font-style: italic;font-family: sans-serif;color: #0e0e0e;font-size: 20px;line-height: 1;font-weight: 400;display: block;padding-bottom: 20px;}
.email-varify .varify_info p  {font-size: 15px;font-family: sans-serif;font-weight: 400;color: #0e0e0e;line-height: 18px;padding-bottom: 0;}
.email-varify .email-icon {margin: 25px auto 15px;}
.email-varify .email-not-found {max-width: 277px;padding: 13px 15px;margin: 0 auto;background: #f8f8f8;}
.email-varify .email-not-found h3 {font-family: sans-serif;font-weight: 400;color: #0e0e0e;font-size: 14px;}
.email-varify .email-not-found p {padding: 8px 0 0;color: #0e0e0e;font-family: sans-serif;font-weight: 400;font-size: 13px;}
.email-varify .email-not-found span {font-style: italic;font-family: sans-serif;font-size: 13px;color: #0e0e0e;display: inline-block;padding-bottom: 0;}
.email-varify .resend-link {padding-top: 17px;}
.email-varify .resend-link p {font-size: 14px;font-family: sans-serif;font-weight: 400;color: #0e0e0e;display: inline-block;}
.email-varify .resend-link a {color: #00deff;text-decoration: none;font-family: sans-serif;font-weight: 400;font-size: 14px;}
.email-varify .resend-link a:hover{opacity: 0.7;}
.email-varify .varify_info  button {width: 344px; background-color: #00deff; padding: 17px 0;margin-top:22px;font-size: 16px;color: #fff;line-height: 20px;} 
.email-varify .varify_info button:hover, .congo-email button:hover{background: rgba(0,222,255,0.7);}
/*Email varified end*/
/*Email varified congratulation start*/
.email-verified-congo .modal-dialog {width: 450px;border: 1px solid #e1e1e1;background: #fff;}
.email-verified-congo .modal-content {border-radius: 0;padding: 15px 28px;border: 0;text-align: center;}
.email-verified-congo .modal-body {padding: 0;}
.congo-email {padding: 52px 0 28px;}
.congo-email h2 {font-size: 36px;font-style: italic;font-family: sans-serif;color: #0e0e0e;line-height: 1;font-weight: 400;position: relative;}
.congo-email h2:after {position: absolute;background: #00deff;width: 45px;height: 2px;content: "";bottom: 0;left: 0;right: 0;margin: 0 auto;}
.congo-email p {font-family: sans-serif;font-weight: 400;font-size: 15px;color: #0e0e0e;padding: 18px 0 0;}
.congo-email button {width: 100%; background-color: #00deff; padding: 17px 0;margin-top:28px;font-size: 16px;color: #fff;line-height: 20px;text-transform: uppercase;}
/*Email varified congratulation end*/
/*Directory Upcoming auction start*/
.new-tag {position: absolute;background: #00cd35;padding: 1px 3px;line-height: 1;color: #ffffff;font-size: 11px;top: 7px;right: -12px;vertical-align: top;display: inline-block;}
.directoryupcoming {padding-top: 20px;}
.sortDiv > .upcoming-filter {width: 120px;}
.buy-last {padding-top: 32px !important;}
.feature-lots-sec {padding-top: 70px;}
.feature-lots-sec h2 {font-size: 36px;font-family: sans-serif;font-weight: 400;padding-bottom: 70px;    color: #0e0e0e;text-align: center;}
.feature-lots-sec ul {margin-left: -23px;display: inline-block;}
.feature-lots-sec ul li {float: left;width: calc(33.33% - 23px);margin-left: 23px;-webkit-box-shadow: 3px 3px 8px 3px rgba(0,0,0,0.08);-moz-box-shadow: 3px 3px 8px 3px rgba(0,0,0,0.08);box-shadow: 3px 3px 8px 3px rgba(0,0,0,0.08);position: relative;margin-bottom: 32px;} 
.feature-lots-sec ul li .img_box {height: 318px;}
.feature-lots-sec ul li img {width: 100%;height: 100%;object-fit: contain;}
.feature-lots-sec .cont_box {float: left;width: 100%;padding: 10px 15px;}
.feature-lots-sec .cont_box .lot_desc {display: block;height: 45px;overflow: hidden;}
.feature-lots-sec .cont_box .lot_desc a {font-family: sans-serif;color: #0e0e0e;font-size: 20px;line-height: 1.1;}
.feature-lots-sec .cont_box .lot_desc a:hover, .sold-lots-sec .sold-txt-box h3 a:hover {text-shadow: -0.1px -0.1px 0 black, 0.1px 0.1px black;}
.feature-lots-sec .cont_box .price_info {margin-top: 5px;font-size: 14px;font-weight: 300;}
.feature-lots-sec .cont_box .price_info h4 {display: inline-block;margin-right: 5px;font-weight: 400;}
.feature-lots-sec ul li .like_icon {cursor: pointer;position: absolute;top: 12px;right: 10px;height: 20px;z-index: 9;}
.feature-lots-sec ul li .like_icon img {height: 20px;}
.sold-lots-sec {padding-top: 110px;width: 100%;display: inline-block;}
.sold-lots-sec h2 {font-family: sans-serif;font-weight: 400;color: #0e0e0e;line-height: 1.2;font-size: 36px;padding-bottom: 70px;text-align: center;}
.sold-lots-sec ul{padding: 0 40px;display: inline-block;margin-left: -55px;}
.sold-lots-sec ul li {float: left;width: calc(33.33% - 55px);margin-left: 55px;position: relative;margin-bottom: 32px;text-align: center;    min-height: 380px;}
.sold-lots-sec .sold-img {width: 100%;height: 270px;padding-bottom: 8px;}
.sold-lots-sec .sold-img img {height: 100%;object-fit: cover;}
.sold-lots-sec .sold-txt-box {padding: 10px 15px;text-align: center;}
.sold-lots-sec .sold-txt-box h3 {line-height: 1.1;overflow: hidden;height: 52px;}
.sold-lots-sec .sold-txt-box h3 a {width: 250px;font-family: sans-serif;font-weight: 300;line-height: 1.2;font-size: 18px;}
.sold-lots-sec .sold-txt-box .sold-price {padding-top: 10px;height: 30px;}
.sold-lots-sec .sold-txt-box .sold-price h5 {display: inline-block;font-family: sans-serif;font-weight: 400;font-size: 14px;color: #0e0e0e;text-align: center;}
.sold-lots-sec .sold-txt-box .sold-price span {padding-left: 5px;font-family: sans-serif;font-weight: 300;font-size: 16px;color: #0e0e0e;line-height: 1.1;}
/*Directory Upcoming auction end*/
/*Directory Past auction end*/
.directory-past .gridView .badgeDiv {display: none !important;}
.item-hidden {height: 33px;}
.directory-past .gridView .item-hidden {display: none;}
.auction-end {font-family: sans-serif;font-weight: 400;font-size: 14px;margin-top: 22px;text-align: center;}
.bidclose:before {z-index: -1;position: absolute;left: 0;top: 0;width: 0;height: 0;border-top: 64px solid #7f7f7f;border-left: 64px solid #7f7f7f;border-right: 64px solid transparent;border-bottom: 64px solid transparent;content: '';}
.bidclose img {width: 40px;height: auto;-webkit-animation: rotating 2s linear infinite;-moz-animation: rotating 2s linear infinite;-ms-animation: rotating 2s linear infinite;-o-animation: rotating 2s linear infinite;animation: rotating 2s linear infinite;}
.bidclose i {width: 64px;text-align: center;display: block;margin: 6px 0 0;}
.bidclose span {position: absolute;left: 0;top: 37px;}
.directory-past .exclusive-offer {position: absolute;background-color: rgba(0,205,53,0.75);bottom: 0px;width: 100%;height: 22px;padding: 0 3px;text-align: center;line-height: 20px;font-family: sans-serif;font-weight: 400;font-size: 14px;color: #ffffff;vertical-align: middle;}
.storefront_banner{float: left;width: 100%;margin: 15px 0;}
.storefront_banner img{height: 200px; width: 100%; object-fit: cover;}
/*Directory Past auction end*/
/*Directory About Us start*/
.about-us-top {position: relative;padding-top: 25px;width: 100%;display: inline-block;}
.directory-top-txt, .how-to-sell-top-txt {position: absolute;top: 180px;z-index: 2;}
.directory-top-txt h2, .how-to-sell-top-txt h2 {padding-bottom: 52px;}
.about-us-top h2 span, .how-to-sell-top-txt h2 span {display: block;text-transform: uppercase;font-family: sans-serif,Times,serif;font-size: 50px;font-style: italic;line-height: 1.2;}
.how_to_sell_wrap {padding-top: 25px;}
.directory-top-img, .how-to-sell-top-img {float: right;width: 65%;position: relative;}
.directory-top-img:after {position: absolute;content: "";width: 705px;height: 455px;background: #e6d0d2;top: 75px;left: -80px;z-index: -1;}
.story-top {margin-top: 175px;padding: 55px;background: #f9f9f9;position: relative;}
.story-top:before {position: absolute;content: "";width: 1px;height: 180px;background: #000000;left: 0;right: 0;margin: 0 auto;top: -128px;}
.story-top:after {position: absolute;content: "";width: 1px;height: 180px;background: #000000;left: 0;right: 0;margin: 0 auto;bottom: -155px;}
.story-top h2 {text-align: right;}
.story-top h2 span{text-align: right;font-family: sans-serif,Times,serif;font-size: 50px;font-weight: 500;line-height: 1.2;font-style: italic;text-transform: uppercase;position: relative;}
.story-top h2 span:after {position: absolute;content: "";width: 80px;height: 4px;background: #841619;bottom: -5px;left: 0;}
.story-img {padding-top: 57px;position: relative;}
.story-img img {width: 74%;}
.story-red-box {position: absolute;background: #841619;padding: 15px 13px;max-width: 350px;right: 0;top: 83px;}
.story-red-box p {font-family: sans-serif;font-weight: 300;font-size: 18px;color: #ffffff;line-height: 27px;padding-bottom: 0;}
.story-txt {padding-top: 65px;max-width: 650px;}
.story-txt p {font-family: sans-serif;font-size: 18px;font-weight: 300;line-height: 27px;color: #0e0e0e;padding-bottom: 0;}
.story-top-wrap {position: relative;}
.story-right {position: absolute;right: 0;transform: rotate(90deg);bottom: 180px;border-bottom: #e6e6e6 solid 1px;width: 47%;text-align: right;transform-origin: 70% 317%;}
.story-right p {padding-bottom: 5px;font-family: sans-serif, sans-serif;color: #aca9a9;font-weight: 300;font-size: 13px;}
.story-bottom {padding-top: 52px;text-align: right;width: 100%;display: inline-block;}
.story-bottom-txt {float: right;z-index: 1;position: relative;}
.story-bottom-txt p {text-align: left;font-family: sans-serif;font-weight: 300;font-size: 18px;line-height: 27px;color: #0e0e0e;padding-top: 35px;max-width: 625px;padding-bottom: 0;}
.story-bottom-txt p:first-child {padding-top: 45px;}
.story-bottom-img {position: relative;z-index: 1;}
.story-bottom-img img {width: 72%;}
.story-bottom-img:before {position: absolute;content: "";width: 700px;height: 458px;background: #e1cbcd;left: -54px;top: 55px;z-index: -1;}
.story-left {position: absolute;z-index: 1;transform: rotate(90deg);text-align: left;border-bottom: #aca9a9 solid 1px;width: 68%;transform-origin: 24% -129px;}
.story-left p {padding-bottom: 5px;font-family: sans-serif, sans-serif;color: #aca9a9;font-weight: 300;font-size: 13px;}
.story-left p span {display: block;}
.decor-sec h2, .gallery-img h2, .real-estate-sec h2 {font-family: sans-serif,Times,serif;font-size: 50px;font-style: italic;font-weight: normal;text-transform: uppercase;position: relative;text-transform: uppercase;padding-bottom: 15px;}
.decor-sec h2:after {position: absolute;content: "";width: 80px;height: 4px;background: #841619;bottom: 0;left: 0;}
.decor-sec {width: 48%;position: relative;}
.decor-sec-img {padding-top: 65px;}
.wraper-3 .gallery-sec {padding-top: 35px;display: inline-block;width: 48%;text-align: right;float: right;margin-top: -35vh;}
.wraper-3 .gallery-txt span, .real-estatereal-estate-txt span, .decor-txt span {width: 30px;height: 30px;display: inline-block;padding: 30px 0 0;}
.wraper-3 .gallery-txt p, .real-estatereal-estate-txt p, .decor-txt p {padding-top: 35px;font-family: sans-serif;font-weight: 300;font-size: 18px;color: #222121;line-height: 27px;padding-bottom: 0;}
.wraper-3 .gallery-img h2:after {position: absolute;content: "";width: 80px;height: 4px;background: #841619;bottom: -5px;right: 0;}
.wraper-3 .gallery-img img {display: block;padding-top: 65px;}
.wraper-3 .real-estate-sec {padding: 35px 0 0;width: 48%;margin-top: 10vh;}
.wraper-3 .real-estate-sec h2:after {position: absolute;content: "";width: 80px;height: 4px;background: #841619;bottom: -5px;left: 0;}
.wraper-3 .real-estatereal-estate-img img {padding-top: 62px;display: block;}
.wraper-3 {padding: 112px 0 55px;border-bottom: 2px #f9f9f9 solid;}
.storefront-blog {padding: 58px 0 0;}
.storefront-blog h4, .skinner-press-release h3 {color: #0e0e0e;font-size: 30px;font-family: sans-serif;font-style: italic;font-weight: normal;padding-bottom: 60px;display: block;}
.storefront-blog ul {margin-left: -15px;display: inline-block;}
.storefront-blog ul li {width: calc(31% - 15px);margin-left: 15px;float: left;box-shadow: 3px 3px 8px 3px rgba(0,0,0,0.08);height: 500px;}
.storefront-blog ul li .blog-box-img {width: 100%;height: 230px;}
.storefront-blog ul li .blog-box-img img, .skinner-press-release ul li .press-release-img img {width: 100%;height: 100%;object-fit: cover;}
.storefront-blog ul li .blog-box-txt {padding: 10px 20px;}
.storefront-blog ul li .blog-box-txt h3 a {color: #0e0e0e;font-size: 24px;font-family: sans-serif;font-weight: normal;margin-bottom: 10px;display: block;line-height: 30px;text-decoration: none;height: 65px;overflow: hidden;text-overflow: ellipsis;}
.storefront-blog ul li .blog-box-txt span {color: #949494;font-size: 14px;font-family: sans-serif;font-weight:300;}
.storefront-blog ul li .blog-box-txt p {color: #0e0e0e;font-size: 16px;font-family: sans-serif;font-weight: normal; padding-top: 10px;line-height: 25px;}
.storefront-blog ul li .blog-box-txt p a {text-decoration: none;font-size: 16px;font-family: sans-serif;font-weight: normal;color: #777;}
.storefront-blog ul li .blog-box-txt p a:hover {text-shadow: -0.1px -0.1px 0 black, 0.1px 0.1px black;}
.decor-sec .story-right {right: -265px;top: 0;transform-origin: 74% 283px;width: 100%;bottom: inherit;border-bottom: 0;}
.decor-sec .story-right p {border-bottom: #e6e6e6 solid 1px;margin-left: -60px;}
.auctioneer_press {float: left;width: 100%;padding: 30px 0 0;background: #fff;margin-top: 40px;}
.auctioneer_press .main_container {max-width: 1000px;margin: 0 auto;clear: both;}
.auctioneer_press.storefront_auctioneer_press h3 {color: #0e0e0e;font-size: 30px;font-family: sans-serif;font-style: italic;font-weight: normal;margin-bottom: 30px;display: block;}
.press_release_list {float: left;width: 100%;margin-top: 20px;}
.auctioneer_press.storefront_auctioneer_press ul {margin-bottom: 30px;display: block;float: left;width: 100%;}
.press_release_list ul li {float: left;width: 100%;margin-bottom: 20px;box-shadow: 3px 3px 8px 3px rgba(0,0,0,0.08);position: relative;max-height: 180px;}
.press_release_list ul li .press_img {float: left;max-width: 200px;margin-right: 25px;width: 20%;}
.press_release_list ul li a {color: #000000;}
.press_release_list ul li .press_img img {float: left;max-width: 100%;min-height: 180px;object-fit: cover;max-height: 180px;display: block;}
.press_release_list ul li .press_detail {float: left;width: 77%;padding: 20px 0}
.press_release_list ul li .press_detail .author {float: left;width: 100%;margin-bottom: 10px}
.press_release_list ul li .press_detail .author h5 {font-size: 18px;color: #0e0e0e;font-style: italic;font-family: sans-serif;float: left;width: auto;margin-right: 10px;font-weight: 400}
.press_release_list ul li .press_detail .author h5 a {color: #0e0e0e;text-decoration: none}
.press_release_list ul li .press_detail .author span {font-size: 14px;color: #505050;font-style: italic;font-family: sans-serif;position: relative;float: left;margin-right: 15px}
.press_release_list ul li .press_detail .title_press {float: left;width: 100%}
.press_release_list ul li .press_detail .title_press h4 {font-family: sans-serif;font-size: 24px;color: #0e0e0e;text-align: left;max-width: 90%;margin-top: 7px;}
.auctioneer_press.storefront_auctioneer_press .press_release_list .title_press h4 a {font-family: sans-serif;font-size: 24px;color: #0e0e0e;text-align: left;line-height: 27px;font-weight: normal;font-style: italic;text-decoration: none;display: block;width: 650px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;}
.press_release_list ul li .press_detail .desc {float: left;width: 100%;}
.auctioneer_press.storefront_auctioneer_press .press_release_list .desc p {color: #0e0e0e;font-size: 16px;font-family: sans-serif;font-weight: normal;margin-top: 10px;line-height: 25px;overflow:hidden;}
.press_release_list ul li .seller_logo {position: absolute;right: 30px;top: 0;}
.press_release_list ul li .seller_logo img {max-width: 50px;display: block;}
.about-us-main .btn_area2 {display: inline-block;padding: 4px 10px;text-align: center;background: url(../img/btn_bg2.png) no-repeat center center;width: 100%;height: 36px;}
.about-us-main .btn_area2 .btn {background-color: rgba(0,222,255,1);border-radius: 22px;display: inline-block;line-height: 24px;width: 187px;font-size: 14px; padding: 4px 10px;}
.auctioneer_press.storefront_auctioneer_press .btn_area2 a {color: #fff;text-decoration: none;}
.btn_area2 .btn:hover {background-color: rgba(0,222,255,0.7);}
.press_release_list ul li .press_detail .author h5 a:hover, .press_release_list ul li .press_detail .desc p a:hover {text-shadow: -0.1px -0.1px 0 black, 0.1px 0.1px black;}
/*Directory About Us end*/
/*Directory How To Sell end*/
.how-to-sell-top {width: 100%;position: relative;display: inline-block;padding-top: 15px;}
.how-to-sell-top-img:after {position: absolute;content: "";width: 650px;height: 520px;background: #e6d0d2;top: 61px;left: -60px;z-index: -1;}
.how-to-sell-top-txt {top: 95px;}
.how-to-sell-top-txt p {max-width: 345px;font-style: italic;}
.how-to-sell-mid-form {padding-top: 30px;}
.how-to-sell-mid-form h2 {font-size: 18px;font-family: sans-serif;font-weight: 400;color: #0e0e0e;padding-bottom: 10px;}
.sell-form-wrap {width: 100%;padding: 37px 45px 25px;background: #f9f9f9;border: 1px #e4e1e1 solid;overflow: hidden;}
.how-to-sell-mid-form .left-form {width: 49.8%;padding-right: 5px;display: inline-block;box-sizing: border-box;vertical-align: top;}
.how-to-sell-mid-form .right-form {width: 49.8%;padding-left: 5px;display: inline-block;box-sizing: border-box;vertical-align: top;}
.how-to-sell-mid-form form ul li {padding-bottom: 12px;}
.how-to-sell-mid-form form input, .how-to-sell-mid-form form select {border: 1px #cccccc solid;background: #ffffff;font-size: 16px;color: #0e0e0e;width: 100%;font-family: sans-serif;font-weight: 300;padding: 9px 15px;}
.how-to-sell-mid-form form select {    background: #ffffff url(../img/selectbox_icon2.png) no-repeat 97% 50%;}
.how-to-sell-mid-form form .upload-btn-wrapper {position: relative;overflow: hidden;display: inline-block;width: 100%;min-height: 135px; padding: 28px 15px;border: 1px #cccccc solid;background: #ffffff;text-align: center;}
.how-to-sell-mid-form form .upload-btn-wrapper strong {display: block;color: #747474;font-family: sans-serif;font-weight: 500;font-size: 20px;text-align: center;}
.how-to-sell-mid-form form .upload-btn-wrapper button {font-family: Arial, Helvetica, sans-serif;font-size: 16px;font-weight: bold;cursor: pointer;margin-top: 12px;display: inline-block;text-decoration: none;border-radius: 3px;-webkit-border-radius: 3px;-moz-border-radius: 3px;padding: 0 12px;color: #fff;line-height: 30px;background: #2f8ab9;border: none;-moz-box-shadow: 0 2px 0 0 #13648d;-webkit-box-shadow: 0 2px 0 0 #13648d;box-shadow: 0 2px 0 0 #13648d;min-width: auto;}
.how-to-sell-mid-form form .upload-btn-wrapper button:hover {background: #3396c9;-moz-box-shadow: 0 2px 0 0 #15719f;-webkit-box-shadow: 0 2px 0 0 #15719f;box-shadow: 0 2px 0 0 #15719f;}
.how-to-sell-mid-form form .upload-btn-wrapper input[type=file] {font-size: 100px;position: absolute;left: 0;top: 0;opacity: 0;}
.how-to-sell-mid-form form button[type=submit] {margin: 34px auto 0;color: #fff;background: #00deff;padding: 9px 0;width: 150px;font-family: sans-serif;font-weight: 400;display: block;clear: both;}
.how-work-img {padding-top: 70px;position: relative;}
.how-work-img:after {position: absolute;content: "";width: 1px;height: 165px;background: #000000;left: 0;right: 0;margin: 0 auto;bottom: -145px;}
.how-work-img span {position: absolute;top: 55%;left: 0;right: 0;text-align: center;font-family: sans-serif,Times,serif;font-size: 50px;font-style: italic;font-weight: normal;display: block;padding-bottom: 20px;}
.how-work-img span:after {position: absolute;content: "";width: 58px;height: 4px;background: #841619;left: 0;right: 0;margin: 0 auto;bottom: 0;}
.selling-work-step {padding-top: 125px;}
.work-step {width: 45.5%;}
.work-step h2 {font-size: 80px;font-family: sans-serif,Times,serif;font-style: italic;font-weight: normal;color: #841619;padding-bottom: 15px;}
.work-step span {font-family: sans-serif,Times,serif;font-style: italic;font-weight: normal;color: #841619;font-size: 30px;}
.work-step p {line-height: 27px;font-family: sans-serif;font-weight: 300;font-size: 18px;padding-bottom: 0;}
.work-step p.last {padding-top: 20px;}
.work-step .step-txt {padding-top: 142px;position: relative;}
.work-step .step-txt:before {position: absolute;content: "";width: 80px;height: 1px;background: #ebebeb;transform: rotate(90deg);top: 70px;left: -13px;}
.step-2 {float: right;margin-top: -45vh;}
.step-3 {float: left;margin-top: 14vh;}
.step-4 {float: right;margin-top: 11vh;}
/*Directory How To Sell end*/
/*Privacy page start*/
.page_contents_area {margin-top: 60px;}
.page_contents_area .cont_tit {margin-bottom: 25px;}
.page_contents_area .f_tit {font-family: sans-serif;font-weight: 400;font-size: 20px;color: #0e0e0e;}
.page_contents_area h2.v_heading {line-height: inherit;text-align: inherit;padding: unset;font-weight: inherit;font-size: inherit;}
.page_contents_area .sub_txt {line-height: 1.5;margin-bottom: 60px;}
.page_contents_area .privay-sub-txt {margin-bottom: 30px;}
.page_contents_area .f_caption_txt_lg_light {font-family: sans-serif;font-weight: 300;font-size: 16px;color: #0e0e0e;}
.page_contents_area .f_caption_txt_lg_light b {font-weight: 500;}
ul.privacy-list {padding-left: 20px;}
ul.privacy-list li {margin-bottom: 30px;line-height: 1.5;font-family: sans-serif;font-weight: 300;font-size: 16px;color: #0e0e0e;padding-left: 10px;list-style: disc;}
h2.privacy-sub-heading {text-align: left;padding-bottom: 40px;font-size: 24px;}
.privacy-wrapper {padding-left: 60px;}
h2.privay-haed-bottom {padding-bottom: 20px;}
.privacy-cookies a, .terms-condition-full a {color: #0a4088;text-decoration: underline;}
/*Privacy page end*/
/*Terms & Condition page start*/
.terms-condition-full .f_tit {font-family: sans-serif;font-size: 22px;color: rgb(14, 14, 14);font-weight: 500;padding-bottom: 7px;}
.terms-condition-full .f_caption_txt_lg_light, .terms-condition-full .sub_txt .d_paragraph > span {font-family: sans-serif;font-weight: 300;font-size: 16px;color: #0e0e0e;}
.terms-condition-full .sub_txt .d_paragraph > span {display: inline-block;vertical-align: top;}
.terms-condition-full .sub_txt .d_paragraph > span.no-bullet {width: 6px;margin-right: 25px;}
.terms-condition-full .sub_txt.regular_t {margin-bottom: 32px;}
.terms-condition-full .f_caption_txt_m {font-family: sans-serif;font-weight: 400;font-size: 15px;color: #0e0e0e;}
.terms-condition-full .sub_txt .sub_title {margin-bottom: 32px; font-family: sans-serif;line-height: 1;font-weight: 500;font-size: 18px;}
.terms-condition-full .sub_txt .d_paragraph {padding-bottom: 30px;position: relative;}
.terms-condition-full .sub_txt .d_paragraph > span.bullet {width: 6px;height: 6px;background-color: rgb(74, 73, 73);margin-top: 8px;margin-left: 0px;margin-right: 25px;border-radius: 50%;}
.terms-condition-full .sub_txt .d_paragraph > span.txt {width: 960px;padding-left: 5px;}
.terms-condition-full .sub_txt .d_paragraph > span.txt strong {font-weight: 500;}
.terms-condition-full .sub_txt .d_paragraph > span.semi-bullet {width: 7px;height: 7px;margin-top: 10px;margin-left: 40px;margin-right: 25px;border-width: 1px;border-style: solid;border-color: rgb(74, 73, 73);border-image: initial;border-radius: 50%;}
.terms-condition-full .sub_txt .d_paragraph > span.sub-txt {width: 900px;}
/*Terms & Condition page end*/
/*Buying guide line*/
.buying_guide{float: left;width: 100%;padding:55px 0 110px;}
.buying_guide h1{font-family: sans-serif; font-size: 36px; color: #0e0e0e; font-weight: normal; text-align: center;}
.buying_guide ul{max-width: 100%; margin:0 auto;}
.buying_guide ul li{ position: relative; width: 31.33%; float: left;margin-right: 23px; margin-bottom: 20px;box-shadow: 3px 3px 8px 3px rgba(0,0,0,0.08);}
.buying_guide ul a:nth-child(3) li {margin-right: 0;}
.buying_guide ul li:hover {box-shadow: 2px 2px 9px 0 rgba(0,0,0,.3);transform: translateY(-1px);transition: all .25s cubic-bezier(.25,.46,.45,.94);}
.buying_guide ul li .buying-guides-box {padding: 24px 0;text-align: center;}
.buying_guide ul li .buying-guides-box span {font-family: Times; font-style: normal;font-weight: normal;font-size: 16px;line-height: 26px;color: #777777;}
.buying_guide ul li .buying-guides-box h2 {font-family: Times;font-style: italic;font-weight: normal;font-size: 28px;line-height: 19px;color: #000000;padding: 6px 0 10px;}
.buying_guide ul li .buying-guides-box p {padding: 6px 22px 0;font-family: Times;font-weight: normal;font-size: 20px;line-height: 26px;color: #000000;}
.buying_guide ul li .buying-guides-box img {height: 270px;width: 100%;object-fit: contain;}
/*Buying guide line*/
/*buying guide line detail*/
.buying_guide_detail .empty_space{margin-top: 20px;float: left;width: 100%;}
.buying_guide_detail{float: left;width: 100%;}
.bg_container{max-width: 760px; margin: 0 auto; clear: both;}
.buying_guide_detail .bg_banner{float: left;width: 100%; position: relative;}
.buying_guide_detail .bg_banner img{width: 100%; display: block;margin: 0 auto;}
.buying_guide_detail .bg_banner .bg_head{position: absolute; top:25px; margin: 0 auto; text-align: center; display: block; left: 4px; right: 0; width: 50px;}
.buying_guide_detail .bg_banner .bg_head p{font-size: 16px;font-family: sans-serif; color:#0e0e0e;font-style: italic;line-height: 20px; }
.buying_guide_detail .bg_banner .bg_title{position: absolute; top:40%; margin: 0 auto; text-align: center; display: block; left: 0; right: 0;}
.buying_guide_detail .bg_banner .bg_title h1{font-size: 40px; color: #0e0e0e; font-family: sans-serif;font-style: italic; font-weight: normal;}
.buying_guide_detail .bg_banner .bg_title h1:before{content: ''; height: 2px; width: 30px; background-color: #00deff; position: absolute; top: -30px; left: 0; right: 0; margin: 0 auto;}
.buying_guide_detail .bg_summury{float: left;width: 100%;padding: 80px 0 0;}
.bg_summury h1 {font-size: 30px; color: #0e0e0e; font-family: sans-serif;font-style: italic; font-weight: normal; max-width: 650px;text-align: center;line-height: 45px;margin: 0 auto 40px;}
.bg_container p{font-size: 18px; color: #0e0e0e;font-family: sans-serif; line-height: 28px;clear: both; }
.bg_container p a{color: #0a4088;text-decoration: underline;}
.bg_container p a:hover{text-decoration: underline;}
.buying_guide_detail .partition{float: left;width: 100%; padding: 40px 0 20px;}
.buying_guide_detail .left_content{float: left;width: 45%; margin-right: 25px;}
.buying_guide_detail .right_content{float: right;width: 45%;}
.buying_guide_detail .right_content img{max-width: 100%;display: block;}
.buying_guide_detail .img_content {float: left;width: 100%; margin-top: 15px;}
.buying_guide_detail .img_content p{font-size: 13px; line-height: 20px;font-family: 'Myriad Pro'; color: #0e0e0e;}
.buying_guide_detail .img_content a{font-size: 14px;color: #0e0e0e; position: relative;}
.buying_guide_detail .img_content a.call{ color: #0a56b4; }
.buying_guide_detail .img_content a.mail{margin-left: 6px; padding-left: 10px;}
.buying_guide_detail .img_content a.mail:before { content: ''; position: absolute;left: 0; top: 2px; width: 1px; height: 15px; background-color: #0e0e0e; }
.buying_guide_detail .img_content a:hover{color: #000;}
.buying_guide_detail .img_content span{font-size: 13px; line-height: 20px;font-family: sans-serif; color: #0e0e0e; position: relative;float: left; padding-left: 10px; font-style: italic;}
.buying_guide_detail .img_content span:before{content: '';position: absolute;top: 0;left: 0; background-color:  #868484; width: 1px; height: 15px;}
.buying_guide_detail .bg_tips{float: left;width: 100%;margin-top: 50px;}
.buying_guide_detail .bg_tips h1{font-size: 30px; color: #0e0e0e; font-family: sans-serif;font-style: italic; font-weight: normal; max-width: 650px;text-align: center;line-height: 45px;margin: 0 auto 0px;}
.buying_guide_detail .tips_count{float: left;width: 100%;margin-top: 40px;}
.buying_guide_detail .tips_count .tips_header{float: left;width: 100%;position: relative;}
.buying_guide_detail .tips_count .tips_header span{font-size: 18px;font-family: sans-serif; color: #949494;font-style: italic;text-align: center; display: block;margin: 0 auto;width: 100%;}
.buying_guide_detail .tips_count .tips_header span:before{    content: ''; height: 1px; width: 25px; background-color: #00deff; position: absolute; top: 25px; left: 0; right: 0; margin: 0 auto;}
.buying_guide_detail .tips_count .tips_header h2{font-size: 26px; color: #0e0e0e; font-family: sans-serif;font-style: italic; font-weight: normal; max-width: 650px;text-align: center;line-height: 45px;margin:25px auto 0;}
.buying_guide_detail .reverse .left_content{float: right;}
.buying_guide_detail .reverse .right_content{float: left;}
.buying_guide_detail .advertise{float: left;width: 100%; padding: 70px 0 65px; text-align: center;}
.buying_guide_detail .advertise img{max-width: 100%; margin: 0 auto; display: block;}
.buying_guide_detail .advertise a{color: #0a4088;text-decoration: underline;font-size: 18px;    font-family: sans-serif; font-style: italic; font-weight: normal; max-width: 480px; text-align: center; line-height: 30px;display: inline-block;} 
.buying_guide_detail .Specialist{float: left;width: 100%; border-top: 1px solid #eeeeee;padding-top: 45px;}
.buying_guide_detail .Specialist h3{font-size: 18px;font-family: sans-serif; color: #949494;font-style: italic; font-weight: normal;margin-bottom: 12px;}
.buying_guide_detail .Specialist h1{font-size: 26px;font-family: sans-serif; color: #0e0e0e;font-style: italic; font-weight: 500;margin-bottom: 15px;}
.buying_guide_detail .Specialist p{font-size: 18px; color: #0e0e0e;font-family: sans-serif; line-height: 28px;clear: both; }
.buying_guide_detail .video_section{float: left;width: 100%;padding: 90px 0;}
.buying_guide_detail .video_section h4{font-size: 18px; font-family: sans-serif; color: #0e0e0e; font-style: italic; font-weight: 500;margin-bottom: 15px;}
.buying_guide_detail .related { margin-top: 20px; }
.buying_guide_detail .related ul{max-width: 1000px;padding-top: 20px; margin-top: 20px;}
.buying_guide_detail .related h5{color: #0e0e0e; font-family: sans-serif; font-weight: normal;font-size: 22px;}
.buying_guide.related .view_all{float: left; width: 100%; text-align: center; margin-top: 40px;}
.buying_guide.related .view_all a{background-color: rgba(0,222,255,1);padding: 0 10px;border-radius: 22px;display: inline-block;height: 28px;line-height: 28px;width: 187px; position: relative;font-size: 14px;color: #fff;}
.buying_guide.related .view_all a:before{content: ""; position: absolute;left: -160px;top: 20px; background: url('../img/blue_left.png') no-repeat;width: 125px; height: 2px;}
.buying_guide.related .view_all a:after{content: ""; position: absolute;right: -160px;top: 20px; background: url('../img/blue_right.png') no-repeat;width: 125px; height: 2px;}
.buying_guide.related .view_all a:hover{background-color: rgba(0,222,255,0.7);}
.buying_guide_detail .buying_guide.related ul li{width: 30%;}
.buying_guide_detail .buying_guide.related ul li .over_text a{font-size: 32px;color: #fff; line-height: 35px;font-family: sans-serif; font-style: italic;}
.buying_guide_detail .buying_guide.related ul li:hover a{color: #00DEFF;}
.buying_guide_detail .buying_guide.related ul li:hover .over_text a{color: #00DEFF;}
.buying_guide.related .view_all a:hover{background-color: rgba(0,222,255,0.7);}
.buying_guide_detail .buying_guide.related ul li .over_text a{font-size: 32px;font-family: sans-serif; font-style: italic;}
.buying_guide.related .view_all a:hover{background-color: rgba(0,222,255,0.7);}
/*buying guide line detail*/
/*Auctioneer-press-release*/
.auctioneer_press{float: left; width: 100%; padding: 10px 0; background: #fff;}
.auctioneer_press .main_container{max-width: 1000px; margin: 0 auto; clear: both;}
.filter_by{float: left;width: 100%; text-align: right;margin-top: 15px;}
.filter_by ul li{display: inline-block;margin-right: 25px;}
.filter_by ul li:last-child{margin-right: 0;}
.filter_by ul li label{width: auto; margin-right: 10px;font-size: 14px; color: #0e0e0e;font-weight: 400;}
.filter_by ul li select{font-size: 14px; color: #0e0e0e;padding: 5px 4px 5px 10px;-webkit-appearance:none; -moz-appearance:none;background: url(../img/selectbox_icon.png) no-repeat 90% 50%;width: 110px;border: #ccc solid 1px;}
.filter_by ul li select.press_per_page{width: 55px; background-position: 85% 50%;}
.auctioneer_press .press_release_list{float: left;width: 100%;margin-top: 20px;}
.auctioneer_press .press_release_list ul li{float: left;width: 100%; margin-bottom: 20px;box-shadow:3px 3px 8px 3px rgba(0,0,0,0.08);position:relative; max-height: 180px;}
.auctioneer_press .press_release_list ul li .seller_logo{position: absolute;right:30px; top: 0;}
.auctioneer_press .press_release_list ul li .seller_logo img{max-width: 50px;}
.auctioneer_press .press_release_list ul li .press_img{float: left; max-width: 200px; margin-right: 25px;width: 20%;}
.auctioneer_press .press_release_list ul li .press_img img{float: left; max-width: 100%; min-height: 180px; object-fit: cover; max-height: 180px;}
.auctioneer_press .press_release_list ul li .press_detail{float: left;width: 77%;padding: 20px 0;}
.auctioneer_press .press_release_list ul li .press_detail .author{float: left;width: 100%; margin-bottom: 10px;}
.auctioneer_press .press_release_list ul li .press_detail .author h5{font-size: 18px; color: #0e0e0e; font-style: italic;font-family: sans-serif;float: left;width: auto;margin-right: 10px;font-weight: 400;}
.auctioneer_press .press_release_list ul li .press_detail .author h5 a{color: #0e0e0e; text-decoration: none;}
.auctioneer_press .press_release_list ul li .press_detail .author span{font-size: 14px; color: #505050; font-style: italic;font-family: sans-serif;position: relative;float: left;margin-right: 15px;}
.auctioneer_press .press_release_list ul li .press_detail .author span:not(:last-child):after{content: ''; position: absolute;right: -8px; top: 0;width: 1px;height: 15px; background-color: #d6d6d6;}
.auctioneer_press .press_release_list ul li .press_detail .author p{font-style: italic; font-family: sans-serif;font-size: 14px; color: #000;}
.auctioneer_press .press_release_list ul li .press_detail .title_press{float: left;width:100%;}
.auctioneer_press .press_release_list ul li .press_detail .title_press h4{font-family: sans-serif;font-size: 24px; color: #0e0e0e;text-align: left;max-width: 90%;margin-top: 7px;}
.auctioneer_press .press_release_list ul li .press_detail .desc{float: left;width: 100%;}
.auctioneer_press .press_release_list ul li .press_detail .desc p{font-family: sans-serif;font-size: 16px; color: #0e0e0e;line-height: 22px;padding-right: 25px;}
.auctioneer_press .press_release_list ul li .press_detail .desc p a{color: #747474;}
.auctioneer_press .press_release_list ul li .press_detail .author h5 a:hover, .auctioneer_press .press_release_list ul li .press_detail .desc p a:hover, .auctioneer_press.storefront_auctioneer_press .press_release_list .title_press h4 a:hover{text-shadow: -.1px -.1px 0 black, .1px .1px black;}
.auctioneer_press .pagi-div{float: left;width: 100%;margin-top: 15px;}  
.filter_by ul li.press_keyword_search_area .keyword_search {border-bottom: #ccc solid 1px;padding-bottom: 5px;}
/*Auctioneer-press-release*/
/*Icon Css*/
.btn-icon{position: relative; padding: 11px;}
.btn-icon::before{  position: absolute; content: ''; width: 20px; height: 20px; }
.btn-icon-home { background: url(../img/svg/about_auction_house_icon.svg) no-repeat left;}
.btn-icon-home:hover { background: url(../img/svg/about_auction_house_icon_blue.svg) no-repeat left;}
.btn-icon.btn-icon-heart { background: url(../img/svg/like_icon_default.svg) no-repeat left; }
body:not(.can-touch) .btn-icon.btn-icon-heart:hover { background: url(../img/svg/like_icon_on.svg) no-repeat left; }
.btn-icon.btn-icon-heart-on { background: url(../img/svg/like_icon_on.svg) no-repeat left; } 
.btn-icon-facebook-color { background: url(../img/svg/icon_facebook_hover.svg) no-repeat left; }
.btn-icon-twitter-color { background: url(../img/svg/icon_twitter_hover.svg) no-repeat left; }
.btn-icon-pinterest-color { background: url(../img/svg/icon_pinterest_hover.svg) no-repeat left; }
.btn-icon-instagram-color { background: url(../img/svg/icon_instagram_hover.svg) no-repeat left; }
.btn-icon-facebook-grey { background: url(../img/svg/icon_facebook.svg) no-repeat left;}
.btn-icon-facebook-grey:hover { background: url(../img/svg/icon_facebook_hover.svg) no-repeat left; }
.btn-icon-twitter-grey { background: url(../img/svg/icon_twitter.svg) no-repeat left; }
.btn-icon-twitter-grey:hover { background: url(../img/svg/icon_twitter_hover.svg) no-repeat left; }
.btn-icon-pinterest-grey { background: url(../img/svg/icon_pinterest.svg) no-repeat left; }
.btn-icon-pinterest-grey:hover { background: url(../img/svg/icon_pinterest_hover.svg) no-repeat left; }
.btn-icon-email-grey { background: url(../img/svg/icon_email.svg) no-repeat left; }
.btn-icon-email-grey:hover { background: url(../img/svg/icon_email_hover.svg) no-repeat left; }
.btn-icon-instagram-grey { background: url(../img/svg/icon_instagram.svg) no-repeat left; }
.btn-icon-instagram-grey:hover { background: url(../img/svg/icon_instagram_hover.svg) no-repeat left; }
.btn-icon.btn-icon-verified { background: url(../img/svg/Verified.svg) no-repeat left;     width: 18px;height: 18px;margin-right: 4px;}
.item-detail .item-won .invoice-sec .paid_area {text-align: center;margin-bottom: 10px;}
.catagory-filter-icon{background: url(../img/items-icon.png) no-repeat scroll 0px 3px; background-size: 25px; height: 30px; width: 30px; margin-right: 0px; padding: 0 40px;}
/*Alert for notification*/
body.show_notification header {padding-top: 60px;}
.alert.alert-popup {z-index: 2050;}
/*Alert for notification*/
.joinUsform .name_area {float: left;width: 49%; margin-right: 6px}
.joinUsform .name_area:last-child{margin-right: 0;}
.joinUsform .name_area input{width: 100%;}

/*Dual currency*/
.currency_switch_div {display: none;}
.hidden {display: none; }
.currency_switch{float:right;}
.currency_switch .Currency_btn{margin-top: 15px;float: right;margin-right: 10px;}
.currency_switch .Currency_btn a{float: left;margin-right: 10px;font-size: 13px;color: #0a7eff;font-weight: 300; font-family: sans-serif;}
.currency_switch .Currency_btn span:hover{cursor: pointer;}
.currency_switch .Currency_btn label{float: left;margin-top: 2px;}
.currency_switch .Currency_btn span{float: left;margin-right: 10px;font-size: 13px;color: #888;font-weight: 300; font-family: sans-serif;padding-right: 12px;}
.currency_switch .Currency_btn .dropdown_arrow{background:url(../img/currency_arrow_down.png) no-repeat right 6px; background-size: 7px; width:40px; text-align: right;}
.currency_switch .Currency_btn .dropdown_arrow img {height: 18px;}
.disclaimer-tooltip {width: 215px;}
.similar_items .cont_info .price_info .title.f_item_startingCurrent_bid{float: left;}
.currency_container{float: left;}
.converted_curr{display: block; font-size: 19px;color: #888; font-weight: 300;  padding-top: 2px;}
.bid_price_area .converted_curr{padding: 0 !important;font-size: 15px;}
.list_items table .bid_txt .f_item_startingCurrent_bid{float: left;} 
.list_items table .bid_txt .currency_container{text-align: left;}
.list_items table .bid_txt .converted_curr{ margin-top: 3px;}
/*Dual Currency Dropdown*/
.currency_switch .Currency_btn .currency_dropdown{position: absolute; top: 35px; z-index: 99; background:#fff;width: 110px !important;margin-left: -15px;box-shadow: 1px 2px 8px 2px rgba(0,0,0,0.1);padding: 7px 0;}
.currency_switch .Currency_btn .currency_dropdown li{width: 100%;padding:8px 0 !important;float: left;}
.currency_switch .Currency_btn .currency_dropdown li:hover {background:#8cb5f2; cursor: pointer;}
.currency_switch .Currency_btn .currency_dropdown li:hover span{color: #101010 !important;}
.currency_switch .Currency_btn .currency_dropdown li img{float: left;margin:0 13px; width: 22px;height: 14px;}
.currency_switch .Currency_btn .currency_dropdown li span{background:none; margin-right: 0;color: #101010; width: 100%}
/*Dual Currency Dropdown*/
/*Dual currency*/

/*tooltip*/
.tooltip.top .tooltip-arrow{border-top-color:rgba(0,0,0,0.87);}
.tooltip-inner{background:rgba(0,0,0,0.87);font-family: sans-serif; font-size: 13px;}
/* - Amit [05 Nov, 2020] -  Start - */
.tooltip-inner{text-align: left;max-width: 100%;padding: 10px; font-weight: 300;}
.tooltip-inner p {color: #fff;font-size: 15px;padding-bottom: 5px;font-family: sans-serif;}
.tooltip-inner ul li {margin-top: 5px;margin-left: 15px;list-style: decimal;}
/* - Amit [05 Nov, 2020] -  End - */
.disclaimer-tooltip .tooltip-inner {max-width: 225px; font-size: 11px; width: 225px;}

/*Premium Confirm*/

.premium-confirm .modal-dialog{width: 430px;}
.premium-confirm .bid-confirm-box h2{    font-size: 24px;color: #333333;line-height: 1.1;padding-left: 30px;
    padding-bottom: 20px;}
.premium-confirm .modal-body{padding: 25px 0 20px;}
.premium-confirm .bid_confirmation_detail{ display: block; width: auto; max-width: 290px; margin: 0 auto; text-align: left;}
.premium-confirm .confirmation_row{padding: 8px 0;}
.premium-confirm .confirmation_row span.t1{font-size: 16px; color: #333; width: 140px; display: inline-block;}
.premium-confirm .confirmation_row span.t2{font-size: 16px; }
.premium-confirm .bid-confirm-box button{margin: 20px auto 0px; display: block; font-size: 18px; width: 145px;padding: 5px 0; }
.premium-confirm .bid-confirm-box p{padding: 15px 22px 0; font-size: 12px; color: #333; line-height: 1.3;font-family: sans-serif;} 
.premium-confirm .bid-confirm-box p a{color: #00b2f4;}
/*Premium Confirm*/
/*Credit card ballon image*/

.credit-card-form-common .card-wrap .question_icon{position: relative;}
.credit-card-form-common .card-wrap .question_icon .help_icon{position: absolute; right: -30px; top: 36px; cursor: pointer;}
.account-info .payment-div .credit-card-form-common .card-wrap .question_icon .help_icon{top: 51px;}
.credit-card-form-common .question_icon_hover{position: absolute; right: -66%; top: -140px;display: none;}
.account-info .payment-div .credit-card-form-common .question_icon_hover {right: -67%; top: -125px;}
.account-info .payment-div .credit-card-form-common .question_icon_hover span.close_ballon_img{position: absolute;top: 10px; right:15px; color: #ccc;cursor: pointer;}
#card_expired_popup .credit-card-form-common .question_icon_hover {right: -70%;}
.credit-card-form-common .question_icon:hover .question_icon_hover{display: block;}
.credit-card-form-common .question_icon_hover span.close_ballon_img {position: absolute;top: 25px;right: 15px;cursor: pointer;color: #ccc; }
.resister-step2 .credit-card-form-common .question_icon_hover span.close_ballon_img {top: 10px;}
/*Credit card ballon image*/
/*General changes css*/
.grecaptcha-badge{z-index: 100;}
/*General changes css*/
/*my bidsquare item css*/
.item-detail {padding: 15px 0 0;}
.item-detail ul li {padding: 18px 0;border-bottom: 1px solid #ddd;}
.item-detail ul li:first-child {border-top: 1px solid #ddd;padding: 9px 0;}
.item-detail .new_check_gruop {padding: 0 10px 0 18px;display: inline-block;vertical-align: middle;}
.item-detail .item-menu .new_check_gruop {width: 100%;}
.item-detail .item-menu .new_check_gruop label{padding-left: 30px;}
.item-detail .new_check_gruop label {position: relative;margin-top: 2px;padding-left: 35px;margin-bottom: 12px;cursor: pointer;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;display: inline-block;vertical-align: top;width: 256px;box-sizing: border-box;width: 12px;padding-left: 0;font-weight: 400;}
.item-detail .new_check_gruop input {position: absolute;opacity: 0;cursor: pointer;left: 0;}    
.item-detail .check-bidsquare {width: 12px;height: 12px;border: 1px solid #ccc;position: absolute;top: 0;left: 0;background-color: #fff;}
.item-detail .check-bidsquare:after {display: none;}
.item-detail .check-bidsquare:after {width: 3px;height: 8px;left: 4px; border-width: 0 1px 1px 0;border: solid #181818;border-width: 0 1px 1px 0;-webkit-transform: rotate(45deg);-ms-transform: rotate(45deg);transform: rotate(45deg);position: absolute;content: "";}
.item-detail .new_check_gruop input:checked ~ .check-bidsquare:after {display: block;}    
.item-detail .img-sec {width: 120px;display: inline-block;vertical-align: middle;margin: 0 8px;height: 120px;}
.item-detail .img-sec img {width: 100%;height: 120px;object-fit: contain;}
.item-detail .text-sec {display: inline-block;width: 81%;}
.item-detail .text-head, .item-detail .live-pannel, .item-detail .timing, .item-detail .estimate, .item-detail .bidding-sec {display: inline-block;vertical-align: middle;padding: 0 8px;width: 22.5%;}
.item-detail .text-head h2 {margin: 0;font-weight: 300;font-size: 14px;color: #0e0e0e;padding-bottom: 3px;}
.item-detail .text-head p {font-weight: 400;line-height: 1.4;font-size: 14px;color: #0e0e0e;margin: 0;height: 35px;overflow: hidden;font-family: sans-serif;padding-bottom: 0;}
.item-detail .text-head p:hover, .item-detail .live-pannel p a:hover, .auction-title:hover {text-shadow: -0.1px -0.1px 0 black, 0.1px 0.1px black;}
.item-detail a.exclusive {font-size: 12px;font-weight: 300;line-height: 14px;color: #fff;text-align: center;margin-top: 8px;display: block;background: #00cd35;width: 15px;height: 15px;text-decoration: none;border-radius: 10px;}    
.item-detail .live-pannel img {width: 14px;height: 14px;}
.item-detail .live-pannel p {color: #0e0e0e;line-height: 1.3;font-size: 13px;margin: 0;font-weight: 400;padding-bottom: 1px;font-family: sans-serif;
text-overflow: ellipsis; overflow: hidden; white-space: nowrap;}
.item-detail .live-pannel p.date_time{font-weight: 300;font-size: 12px;}
.item-detail .timing p {font-size: 12px;font-family: sans-serif;color: #0e0e0e;font-weight: 300;display: block;}
.item-detail .estimate span {display: block;font-size: 12px;color: #0e0e0e;font-weight: 300;display: block;word-break: break-word;}
.item-detail .estimate span.estimate-txt {display: none;}
.item-detail .timing p ltx{display: block;}
.item-detail .start-bid {float: left;}
.item-detail .end-bid {float: right;}
.item-detail .start-bid span, .item-detail .end-bid span {color: #0e0e0e;line-height: 1.3;font-size: 13px;font-weight: 300;display: inline-block;font-family: sans-serif;}
.item-detail .start-bid p, .item-detail .end-bid p {color: #000000;line-height: 1.3;font-size: 16px;font-weight: 400;display: inline-block;padding-left: 5px;font-family: sans-serif;}
.item-detail .end-bid p {font-size: 13px;}
.end-bid p label {color: #ccc;}
.item-detail .live-pannel {width: 28%;}
.item-detail .timing {width: 10%;}
.item-detail .estimate {width: 9.8%; padding: 0;}
.item-detail .estimate span.dual_currency{font-size: 12px;color: #888;}
.item-detail .bidding-sec {width: 28%;text-align: center;}
.item-detail .bidding-sec .enterBid{font-size: 14px;}
.item-detail .bidding-sec .enterBid input{width: 47%;}
.item-detail .bidding-sec .enterBid button{width: 50%;}
.item-detail .end-bid span {color: red;}
.item-detail .bid-drop-sec {width: 100%;float: left;padding-top: 15px;}
.item-detail .bid-drop-sec input {width: 57%;padding: 7px 2px;border: #ccc solid 1px;font-size: 13px;font-family: sans-serif;}
.item-detail .bid-drop-sec button {background: #00cd35;text-align: center;color: #fff;border: 0;padding: 6px 2px;width: 40%;margin-left: 3px;cursor: pointer;font-family: sans-serif;font-size: 13px;line-height: 1.4;}
.item-detail .item-menu {display: inline-block;width: 19%;font-size: 14px;}
.item-detail .item-menu .new_check_gruop label {width: auto;}
.item-detail .item-menu.mbTitle{width: 18%;}
.item-detail .item-menu.mbAuc{width: 22%;}
.item-detail .item-menu.mbSts{width: 8%;}
.item-detail .item-menu.mbEstmt{width: 12%;}
.item-detail .item-menu a {padding: 0 0 0 15px;text-decoration: none;color: #0e0e0e;font-size: 14px;font-weight: 400;line-height: 1.42857143;}
.item-detail .status-haed {width: 10%;}
.live-pannel span {padding-bottom: 4px;font-family: sans-serif;font-weight: 300;font-size: 12px;color: #00deff;line-height: 1.2;display: inline-block;}
.live-pannel span.evt-coming-soon {background: #ccc;color: #fff;line-height: 1.5;padding: 0px 4px;margin-left: 6px;font-size: 12px;font-weight: 400;}
.item-detail .bidding-auction {color: #00cd35;font-size: 14px;font-family: sans-serif;padding-right: 5px;font-weight: 400;display: inline-block;}
.item-detail .bidding-money {font-size: 16px;font-family: sans-serif;color: #0e0e0e;font-weight: 400;display: inline-block;}
.item-detail .top .tooltip-inner {background: rgba(0,205,53,0.75);font-size: 12px;font-family: sans-serif;font-weight: 400;border-radius: 0;line-height: 13px;}
.item-detail .text-head .exclusive-tooltip .tooltip-inner{position: relative;top: -4px; line-height: 17px;}
.item-icon {display: none;}
.item-detail li.event_active .auction_bar {position: inherit; display: block !important; font-size: 12px; height: auto; line-height: 16px; margin-bottom: 4px; width: fit-content; padding: 0 5px; }
.item-detail li.event_active .auction_bar_hide {display: none; }
/*my bidsquare item css*/
/*my bids css*/
.item-detail .my-bids .text-sec {width: 86%;}
.item-detail .my-bids .text-head {width: 25%;}
.item-detail .my-bids .live-pannel {width: 24%;}
.item-detail .my-bids .timing {width: 11%;}
.item-detail .my-bids .estimate {width: 10%;}
.item-detail .my-bids .bidding-sec {width: 28%;}
.item-detail .my-bids .item-menu {width: 15%;}
.item-detail .my-bids .image-head {width: 14%;text-align: center;}
.item-detail .my-bids .auction-head {width: 22%;}
.item-detail .my-bids .status-haed {width: 14%;}
.item-detail .my-bids.mbEstmt {width: 17%;}
.item-detail .my-bids .mbTitle {width: 22%;}
.item-detail .my-bids .mbEstmt {width: 18%;}
.item-detail .my-bids .estimate-head {width: 19.8%;}
.item-detail .my-bids .bidding-head {width: 12%;}
.bidding-sold-for {font-size: 14px;font-family: sans-serif;font-weight: 400;color: #0e0e0e;line-height: 1.2;display: inline-block;}
.not-won span:first-child {color: #ff0000;font-family: sans-serif;font-size: 14px;font-weight: 400;line-height: 1.2;}
.not-won span:last-child {padding-left: 5px;color: #0e0e0e;font-family: sans-serif;font-size: 14px;font-weight: 400;line-height: 1.2;}
/*my bids css*/
/*my bids registured auction css*/
.item-detail .registered-auction ul li .auction-registerd-head {width: 36%;text-align: center;}
.item-detail .registered-auction .item-menu {width: 20%;}
.item-detail .registered-auction .status-registered-head {width: 26%;}
.item-detail .registered-auction .registered-registered-head {width: 16%;text-align: center;}
.item-detail .registered-auction .text-sec {width: 89%;}
.item-detail .registered-auction .img-sec {width: 90px;}
.auction-end {width: 20%;display: inline-block;vertical-align: middle;}
.item-detail .registered-auction .item-title p, .item-detail .fav-auction .item-title p {font-family: sans-serif;font-weight: 300;line-height: 1.3;font-size: 12px;color: #0e0e0e;padding-bottom: 0;}
.item-detail .registered-auction .live-pannel, .item-detail .registered-auction .item-title, .item-detail .registered-auction .auction-status, .item-detail .registered-auction .auction-timer, .registered-auction .auction-end, .item-detail .fav-auction .live-pannel, .item-detail .fav-auction .item-title, .item-detail .fav-auction .auction-status, .item-detail .fav-auction .auction-timer, .fav-auction .auction-end, .item-detail .item-won .hammer-price, .item-detail .item-won .invoice-sec  {display: inline-block;vertical-align: middle;}
.auction-end p {font-size: 14px;color: #ff0000;font-family: sans-serif;font-weight: 400;line-height: 1.2;}
.auction-title {padding-top: 3px;font-size: 13px;font-family: sans-serif;font-weight:300;padding-bottom: 4px;}
.item-detail .registered-auction .auction-end p {font-size: 14px;color: #ff0000;font-family: sans-serif;font-weight: 400;line-height: 1.2;}
.item-detail .registered-auction .auction-end {text-align: center;}
.item-detail .registered-auction .live-pannel, .item-detail .fav-auction .live-pannel {width: 25%;}
.item-detail .registered-auction .item-title, .item-detail .fav-auction .item-title {width: 23%;}
.item-detail .registered-auction .auction-status, .item-detail .fav-auction .auction-status {width: 12%;}
.item-detail .registered-auction .auction-timer, .item-detail .fav-auction .auction-timer {width: 20%;}
.item-detail .registered-auction .auction-end, .item-detail .fav-auction .auction-end {width: 18%;}
.item-detail .registered-auction .addtocalendar .set-reminder{display: inline-block;}
.item-detail .registered-auction .addtocalendar .reminder_text{    font-weight: 300; font-size: 12px; color: #0e0e0e;}
/*my bids registured auction css*/
/*my bids fav auction css*/
.item-detail .fav-auction .text-sec {width: 90%;}
.item-detail .fav-auction ul li {padding-left: 76px;}
.item-detail .fav-auction ul li.fav-seller-first {padding-left: 0;}
.item-detail .fav-auction .img-sec {width: 70px;}
.item-detail .fav-auction ul li.fav-seller-first .img-sec {width: 90px;height: 90px;border: #f3f3f3 solid 1px;}
.item-detail .fav-auction ul li.fav-seller-first .img-sec img {height: 100%;}
.item-detail .fav-auction ul li.fav-seller-first .text-sec {width: 68%;}
.item-detail .fav-auction ul li.fav-seller-first .fav-seller {width: 15%;display: inline-block;text-align: center;}
.item-detail .fav-auction .text-head h2 {font-size: 16px;}
.item-detail .fav-auction ul li:first-child {padding-left: 0;}
.item-detail .fav-auction .seller-fav-head {width: 22.6%;}
.item-detail .fav-auction .auction-fav-head {width: 15.6%;}
.item-detail .fav-auction .date-fav-head {width: 19.6%;}
.item-detail .fav-auction .status-fav-head {width: 25.6%;}
.item-detail .fav-auction .registered-fav-head {width: 14.6%;}
/*my bids fav auction css*/
/*my bids items won css*/
.item-detail .item-won .text-sec {width: 86%;}
.item-detail .item-won .image-item-won-head {width: 16%;text-align: center;}
.item-detail .item-won .title-item-won-head {width: 17%;}
.item-detail .item-won .auction-item-won-head {width: 23%;}
.item-detail .item-won .hammer-item-won-head {width: 25%;}
.item-detail .item-won .invoice-item-won-head {width: 16%;text-align: center;}
.item-detail .item-won .text-head {width: 23.5%;padding: 0 44px;}
.item-detail .item-won .text-head p {height: 75px;}
.item-detail .item-won .live-pannel {width: 28%;}
.item-detail .item-won .hammer-price {width: 27.9%;}
.item-detail .item-won .hammer-price span {font-family: sans-serif;font-weight: 300;font-size: 14px;color: #0e0e0e;line-height: 1.2;}    
.item-detail .item-won .invoice-sec {width: 19%;}
a.item-invoice-button {background: rgba(0,222,255,1); font-family: sans-serif; font-weight: 400; font-size: 14px; color: #ffffff; padding: 8px 9px; display: block; text-align: center;}
.item-detail .item-won .invoice-sec .item-invoice-button.invoive-popup {margin: 0 auto 10px;}
a.item-invoice-button:hover {background: rgba(0,222,255,0.7);}
.item-detail .item-won ul li {border-top: 1px solid #ddd;border-bottom: 0;}
.item-detail .item-won ul li:last-child {border-bottom: 1px solid #ddd;}
.item-detail .item-won .invoice-sec a.paypal-button-link {width: max-content;margin: 0 auto;display: block;}
.item-detail .item-won .invoice-sec a.paypal-button-link button.paypal_button {background: rgba(0,222,255,1);font-family: sans-serif;font-weight: 400;font-size: 14px;color: #ffffff;padding: 8px 9px;display: block;text-align: center;}
/*my bids items won css*/
/*Change font size for long price*/
.sticky_pannel i.expand_msgcenter{display: none;}
.sticky_pannel .bid_price_area .live_bid .dyn-bid-price {font-size: 32px;}
.detail-right .bidding-bottom .dyn-bid-price {font-size: 28px;}
/*Video Bid Panel*/
.video_enabled .msg_content{height: 190px;}
.audio_enabled .msg_content{height: 338px;}
/*Video Bid Panel*/
/*Blog Listing*/
.blog-listing h2 {font-family: sans-serif;font-size: 26px;color: #0e0e0e;line-height: 1.3;padding: 20px 0 10px;}
.blog-listing .blog-detail-info {border-bottom: 0;display: block;}
.blog-listing ul.blog-keyboard {padding: 10px 0 15px;}
.blog-listing .blog-list-content img {float: left; padding-right: 30px; width: 300px; height: 300px; object-fit: contain;} 
.blog-listing .blog-list-content p {font-family: sans-serif;font-size: 18px;color: #0e0e0e;line-height: 1.6;}
.blog-listing .blog-list-content p a {padding-left: 10px;font-family: sans-serif;font-size: 14px;color: #949494;line-height: 1.6;}
.blog-listing .blog-list-content {padding-bottom: 25px;border-bottom: 1px #e0e0e0 solid;}
.blog-listing .blog-listing-wrap {padding-top: 20px;}
.pagination .pagination_arrow.next_btn {
    margin-right: 0;
    margin-left: 10px;
}
.pagination .pagination_arrow {
    color: #00deff !important;
    margin-right: 10px;
    font-size: 14px !important;
}
/*Blog Listing*/
/*Invoice Popup*/
.invoice-popup .modal-dialog {width: 728px;}
.invoice-popup .modal-content {padding: 26px 32px;height: 100%;border: 0;}
.invoice-popup .modal-body {padding: 0;}
.invoice-popup .title-area {padding: 29px 0 15px;border-bottom: 1px solid #747474;}
.invoice-popup .close {position: absolute;cursor: pointer;z-index: 99;color: #b2b2b2;font-size: 35px;top: 5px;right: 14px;opacity: 1;}
.invoice-popup .main-heading {display: inline-block;padding-right: 44px;vertical-align: middle;}
.invoice-popup .main-heading h3 {font-family: sans-serif;font-weight: 400; font-size: 26px;color: #0e0e0e;}
.invoice-popup .sub-hading {display: inline-block;vertical-align: bottom;}
.invoice-popup .sub-hading span {font-family: sans-serif;font-weight: 300;font-size: 13px;color: #0e0e0e;}
.invoice-popup .sub-hading p {font-family: sans-serif;font-weight: 300;padding-left: 10px;font-size: 13px;color: #0e0e0e;display: inline-block;}
.invoice-popup .logo-area {width: 173px;float: right;padding-top: 6px;}
.invoice-popup .pop-wrap {padding: 7px 0 18px;width: 100%;float: left;}
.invoice-popup .info-left {width: 75%;float: left;}
.invoice-popup .info-row {padding: 7px 0;}
.invoice-popup .info-head {width: 65px;display: inline-block;vertical-align: top;}
.invoice-popup .info-head span {font-family: sans-serif;font-weight: 400;font-size: 13px;color: #0e0e0e;}
.invoice-popup .info-txt {vertical-align: top;display: inline-block;width: 85%;}
.invoice-popup .info-txt a, .invoice-popup .info-txt p {font-family: sans-serif;font-weight: 300;font-size: 14px;line-height: 1.3;color: #666;display: block;padding-bottom: 1px;}
.invoice-popup .info-txt p strong {font-weight: 500;}
.invoice-popup .info-right {padding-top: 7px;width: 20%;float: right;text-align: center;}
.invoice-popup .info-right-right {font-family: sans-serif;font-weight: 400;font-size: 12px;color: #0e0e0e;}
.invoice-popup .info-right-img {padding: 8px 0 0;display: block;cursor: pointer;}
.invoice-popup .info-right-img strong {display: block;padding-top: 6px;font-family: sans-serif;font-weight: 300;font-size: 14px;cursor: pointer;color: #0e0e0e;}
.invoice-popup .info-adress {padding-top: 10px;text-align: right;}
.invoice-popup .info-adress address {font-family: sans-serif;font-weight: 300;padding-right: 20px;font-size: 13px;line-height: 1.3;color: #0e0e0e}
.invoice-popup table.items_list {width: 100%;}
.invoice-popup table.items_list thead th {background: transparent;  padding-bottom: 5px;border-bottom: 1px solid #ccc;font-family: sans-serif;font-weight: 400;font-size: 13px;color: #0e0e0e;}
.invoice-popup table.items_list tr td {padding: 5px 0;border-bottom: 1px solid #ccc;font-family: sans-serif;font-weight: 300;font-size: 14px;color: #0e0e0e;}
.invoice-popup table.items_list tr:last-child td {border-bottom: 0;}
.invoice-popup table.items_list tr td img {width: 75px;height: 60px;text-align: center;cursor: pointer;}
.invoice-popup .pop-main-area {height: 430px;overflow-y: auto;}
.pop-bottom-area {padding: 18px 20px 0 0; border-top: 1px solid #ccc;}
.note-cont {width: 56%;margin-right: 3%;}
.result-cont {width: 40%;float: right;text-align: left;}
.subtotal-head {font-family: sans-serif;font-weight: 400;padding: 7px 0;font-size: 13px;color: #0e0e0e;}
.subtotal-content {font-family: sans-serif;font-weight: 300;font-size: 14px;color: #0e0e0e;}
.total-price {font-family: sans-serif;font-size: 16px;color: #0e0e0e;}
.table_subtotal tr:last-child td {padding-bottom: 0px;padding-top: 12px;border-top: 1px solid #ccc;}
.no-print-area {padding-top: 18px;text-align: center;}
.no-print-area span {display: block;font-family: sans-serif;font-weight: 300;font-size: 14px;color: #0e0e0e;}
.no-print-area a {font-family: sans-serif;font-weight: 400;font-size: 15px;color: #0e0e0e;}
/*Invoice Popup*/
.right-sub-heading .like_icon {background-size: 22px; background-position: 0px -1px;padding-bottom: 0;padding-right: 0;padding-top: 0;}
body:not(.can-touch) .right-sub-heading .like_icon:hover{background-size: 22px;    background-position: 0px -1px;}
.right-sub-heading .like_icon a{margin-left: 9px;}
/*Blog Similar Post*/
.blog-details .related_posts_container {padding-top: 130px;}
.blog-details .related_posts_container h4 {font-size: 20px;color: #000;font-family: sans-serif;font-weight: normal;position: relative;}
.blog-details .related_posts_container h4:after {position: absolute;content: '';height: 1px;width: 580px;background: #d6d6d6;top: 10px;right: 0px;}
.related_posts_container .related_posts {margin-top: 30px;width: 100%;float: left;}
.related_posts_container .related_posts li {float: left;width: 181px;margin-bottom: 40px;padding: 0 3px;}
.related_posts_container .related_posts li img {width: 100%;height: 170px;object-fit: cover;}
.related_posts_container .related_posts li a.press_title {margin-top: 10px;display: inline-block;height: 40px;overflow: hidden;font-size: 16px;line-height: 20px;font-family: sans-serif;color: #0e0e0e;}
/*Blog Similar Post*/
/*Category All*/
.bread_navi .breadcrumb span h1 {display: inline-block;font-weight: 400;}
.category-detail {border-top: 1px solid #F3F3F3;padding: 55px 0 20px;width: 100%;float: left;}
.category-detail .category-detail-left {width: 45%;float: left;}
.category-detail .category-detail-left h2 {font-family: sans-serif;font-size: 34px;line-height: 34px;padding-bottom: 0;}
.category-detail .category-detail-left h2 a {color: #000000;}
.category-detail .category-detail-right {width: 55%;float: left;}
.category-detail .category-detail-right ul {float: right;padding-left: 40px;width: 50%;}
.category-detail .category-detail-right ul:first-child {padding-left: 0;float: left;}
.category-detail .category-detail-right ul li a, .view-category-button a {font-size: 16px;line-height: 31px;color: #000000;font-family: sans-serif;}
.category-detail .category-detail-right ul li a:hover, .category-detail .category-detail-left h2 a:hover {color: #00deff;}
.view-category-button {clear: both;padding-top: 28px;text-align: right;}
.category-detail .category-detail-right ul li a {font-weight: 300;}
/*Category All*/


/*Currency Mobile*/
.mobile_currency{display: none;}
/*Currency Mobile*/

/*shadow effect on catelog and search page for current active lot*/
#view_catalog .gridBox.current_lot_active {  position: relative; z-index:10;}
#view_catalog .gridBox.current_lot_active:after {content: ""; position: absolute; z-index:-1; top: 0; left: 3px; width: 260px; height: 100%; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); -webkit-transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1); transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1); opacity: 1; }
#view_catalog .gridBox.current_lot_active .dyn_time_limited{display: none;}
#view_catalog .gridBox.current_lot_active .place_bid_area{display: none;}
#view_catalog .gridBox.current_lot_active .active_lot_bid_link{display: block !important; font-size: 14px; width:100%; text-align: center; float: left; margin: 16px 0;}
#view_catalog .gridBox.current_lot_active .active_lot_bid_link:hover{text-decoration: underline;}

/*Page not found*/
.page-not-found{text-align: center;}
.page-not-found .info_content{border-bottom:2px solid #eeeeee; padding-bottom:60px; }
.page-not-found .info_content img{padding-top:70px; }
.page-not-found .info_content h1{padding:27px 0 35px; font-size:32px; font-weight:500; }
.page-not-found .info_content h6{font-size:16px; font-weight:500; }
.page-not-found .info_content span{color:#00deff; }
.page-not-found .upcoming_auctions{padding:55px 0; float: left;width: 100%;}
.page-not-found .upcoming_auctions h2{font-size:30px; font-weight:500; padding-bottom:55px; }
.page-not-found .upcoming_auctions li{width:233px; list-style:none; float: left; box-shadow:2px 1px 8px 0px #ebebeb; margin:15px 15px 0 0; }
.page-not-found .upcoming_auctions li img{max-width:100%; height:auto; }
.page-not-found .btn_area2.mbt{float: left;width: 100%; margin-top: 30px;}
.page-not-found .btn_area2.mbt a{ background-color: #00deff; color: #fff; font-size: 14px; font-weight: 600; padding: 10px 58px; border: none; border-radius: 25px; display: inline-block;font-weight: normal;}
.page-not-found .btn_area2.mbt a:hover{background-color: rgba(0,222,255,0.7);}
.page-not-found .page-not-found .thumbnails .auction_info{text-align:right; color: #00deff; font-size: 12px; font-weight: 500; margin-right: 5px;}
.page-not-found .thumbnails .auction_info img{width: 20px; vertical-align: middle; }
.page-not-found .thumbnails .auction_info span{color:#00deff; font-size:12px; font-weight:500; margin-right:5px; }
.page-not-found .auctioneers_info h4{padding:10px 10px 15px 10px; font-size:18px; font-weight:400; text-overflow:ellipsis; white-space: nowrap; display: inline-block; overflow:hidden; width:100%; }
.page-not-found .auctioneers_info h4 a{color: #0e0e0e;}
.page-not-found .auction_info.overh{text-align: right; padding-right: 10px; margin-top: 5px; }
/*Page not found*/

/*css to support jquery "on event" for iphone*/
.hamburgerBox-close,.like_icon,.login,.fav-item-login,.currency_switch_div, .currency_switch_div label,.desktop_view, .inquire_block_icon {cursor: pointer;}
/*Reset Password Page*/
h1.register_info5 {font: 400 36px/1.2 sans-serif;color: #0e0e0e;padding-bottom: 58px;text-align: center;}
.register_form {background: #f9f9f9;border: #eeeeee solid 1px;padding: 50px 0 58px;}
.register_form form {width: 412px;margin: 0 auto;}
.register_form form .form_info {font-family: sans-serif;color: #0e0e0e;font-size: 17px;line-height: 1.2;font-weight: 400;text-align: center;padding-bottom: 38px;}
.register_form form .form_info a {color: rgba(0,222,255,1);}
.register_form form .element_area {margin-bottom: 20px;}
.register_form form input {background: #ffffff;border: #e0e0e0 solid 2px;padding: 15px 20px;width: 100%;font-size: 16px;line-height: 1.2;}
.register_form form button {margin-top: 15px;background: rgba(0,222,255,1);width: 100%;text-align: center;color: #ffffff;font-size: 18px;height: 55px;}
.register_form form button:hover, .register_form form button:focus {background: rgba(0,222,255,0.7);}
/*Reset Password Page*/

/*Catagol only*/
.catalog_only_popup .modal-dialog {max-width: 400px;}
.catalog_only_popup .modal-body {padding: 40px 0 20px !important; float: left;width: 100%; background: #fff;}
.catalog_only_popup .modal-body .bid_info{padding: 50px 10px;margin-bottom: 20px; background-color: #f0f0f0;}
.catalog_only_popup .wrap_popup{max-width: 85%; margin: 0 auto;}
.catalog_only_popup .modal-body .bid_info p{padding-top: 0; height: auto;}
.catalog_only_popup .wrap_popup a.catalog_only_redirect, .catalog_only_popup .wrap_popup button{width:46% !important; padding: 2px 5px;line-height:30px !important;float: left;margin-right: 10px;}
.catalog_only_popup .wrap_popup button.cancel{    background-color: #999;margin-right: 0;float: right;}

.bidDiv .btn-cat-only {/*margin: 0 auto;*/ display: block;}
/*Catagol only*/
/*Payment Section*/
.payment_text {width: 100%;float: left;padding-bottom: 50px;}
.payment_text p {font-family: sans-serif;font-size: 15px;color: #0e0e0e;font-weight: 400;line-height: 25px;padding-bottom: 0;}
.payment_text ul li {display: inline-block;margin-right: 5px;vertical-align: middle;}
.payment_text ul, .payment_text .paypal {display: inline-block;vertical-align: middle;padding: 10px 0;}
.payment_text ul li img, .payment_text .paypal img {width: 50px;}
/*Payment Section*/
/*Share Item Popup*/
.bid-social #share_item_button { cursor:pointer; }
.social-media-email-popup input {width: 100%; font-family: sans-serif-light;font-size: 14px;}
.social-media-email-popup label {padding: 7px 0 10px;}
.social-media-email-popup .recipientemail-wrap {width: 100%;border: 1px solid #cccccc;padding: 6px 8px;margin-bottom: 8px;}
.social-media-email-popup .multiple-email-wrap {position: relative;-webkit-align-items: center;align-items: center;background-color: #fff;border: 1px solid #dadce0;-webkit-border-radius: 10px;border-radius: 10px; -webkit-box-sizing: border-box;box-sizing: border-box;display: -webkit-inline-box;display: -webkit-inline-flex;display: inline-flex;line-height: 25px;margin: 2px 0;padding-left: 8px;padding-right: 4px;width: 100%;font-family: sans-serif-light;font-size: 14px;}
.social-media-email-popup .multiple-email-wrap .close_popup {position: absolute; top: 5px;width: 10px !important;cursor: pointer;background: transparent;z-index: 999;background: url(../img/login_pop_close.png) no-repeat scroll 0 0;height: 12px;background-size: 100% 100%;right: 3px;}
.social-media-email-popup textarea {width: 100%;border: 1px solid #cccccc;padding: 6px 8px;margin-bottom: 8px;}
.social-media-email-popup textarea {height: 95px;font-family: sans-serif-light;font-size: 14px;}
.catelog-area .bid-social .social-media-email-popup .btn {margin: 0 auto;text-align: center;display: block;max-width: 55%;border-radius: 0;}
.social-media-email-popup .email-bg {background: #f1f1f1;width: 96px;margin: 2px;}
.social-media-email-popup .email-bg span {text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width: 100px;}
.social-media-email-popup .email-bg .close_popup {background-size: 75%;top: 5px;padding: 0;}
.social-media-email-popup {width: 100%;text-align: left;box-shadow: 3px 3px 8px 3px rgba(0,0,0,0.08);padding: 10px 12px;max-width: 350px;position: absolute;right: 0;left: 0;margin: 0 auto;z-index: 2050;background: #fff;top: 35px;}
/*Share Item Popup*/


/* search auto complete */
.ac-suggest-box {
    display: none;
    position: absolute;
    z-index: 1000;
    width: 100%;
    padding: 0;
    background: #FFFFFF;
/*    border: 1px solid #E0E0E0;*/
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.3);
}
.ac-suggest-box.show {
    display: block;
}
.ac-suggest-box li {
    padding: 2px 8px 2px 16px;
    font-family: sans-serif;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 23px;
    color: #0E0E0E;
}
.ac-suggest-box li.ac-suggest-heading {
    background: #F5F5F5;
    text-transform: uppercase;
}
.ac-suggest-box li.ac-suggest-row {
    
}
.ac-suggest-box li.ac-suggest-row.active {
    background: #b7b7b7;
    cursor: pointer;
}

.ac-suggest-box li.ac-suggest-row .ac-debug {
    position: absolute;
    display: block;
    left: 100%;
    color: #AAA;
    background: #FFF;
    padding: 0 5px;
    border: 1px solid black;
    white-space: nowrap;
    margin: -24px 0 0 10px;
    opacity: .8;
}
/* search auto complete */

/* Popular keyword page */
.keyword_heading h1{
    font-family: sans-serif;
    font-size: 36px;
    color: #0e0e0e;
    line-height: 1;
    position: relative;
    margin-top: 40px;
    border-bottom: 1px solid #F3F3F3;
    padding-bottom: 30px;
}
.keyword-details{margin-left:20px;border-bottom: 1px solid #F3F3F3;border-top: none !important;}
.keyword-wrapper .keyword-details{border-bottom:none;}
.keyword-details .category-detail-left h2 a{font-size: 24px;}
.category-detail .category-detail-right.full-width{width: 100%;}
/* Popular keyword page */

/* - Amit [05 Nov, 2020]: Item details page: Absentee vs Live bid info ( Start ) - */
.bidding_area_info_txt_holder {position: relative;}
.bidding-area .place_bid_info_txt_holder {padding: 18px 0 6px;}
.bidding-area .place_bid .bidding-info .bidding-info-txt {
    text-align: right;
    font-size: 13px;
    padding-bottom: 10px;
    padding-right: 20px;
    color: #949494;
    cursor: pointer;
    font-weight: 300;
}
.bidding-area .place_bid .bidding-info .bidding-info-txt:before {
    content: "";
    display: inline-block;
    vertical-align: middle;
    position: absolute;
    right: 0;
    width: 20px;
    height: 20px;
    margin: -1px 0 0 0;
    padding: 0;
    line-height: 0;
    font-size: 0;
    background: no-repeat 50% 50% transparent;
}
.bidding-area .place_bid .bidding-info .bidding-info-txt:before {
    background-image: url(../img/svg/q_icon.svg);
    background-size: 100% 100%;
    width: 15px;
    height: 15px;
}
.bidding-area .place_bid .bidding-info .bidding-info-dtls { 
     display: none;
}
/* - Amit [05 Nov, 2020]: Item details page: Absentee vs Live bid info ( End ) - */

/*Item Detail New Media Concept*/
.item-detail-wrapper{padding-bottom: 30px;}
.item-detail-new-media{border-top: 1px solid #E4E4E4;}
.about-auction{font-family: sans-serif;font-style: normal;font-weight: normal;font-size: 16px;line-height: 19px;color: #000000;margin-bottom: 10px;}
.item-detail-new-media .title{font-family: sans-serif;font-style: normal;font-weight: normal;font-size: 18px;line-height: 19px;color: #000000;}
.detail-account-right .accordian{margin-top: 20px; border-top: 1px solid #e4e4e4;}
.accordian .panel:first-child{padding: 22px 0px;}
.accordian .panel:last-child{box-shadow: none;}
.accordian .panel{padding: 30px 0;margin-bottom: 0;border-bottom: 1px solid #E4E4E4;position: relative;}
.accordian .panel .link{font-family: sans-serif;font-style: normal;font-weight: normal;font-size: 16px;line-height: 19px;color: #000000;display: block;}
.accordian .panel .link::after, .accordian .panel .link.up.collapsed::after{content: url(../img/svg/accordian-arrow.svg);position: absolute;top: 30px;right: 0;transform: rotate(180deg) !important;}
.accordian .panel .link[aria-expanded="true"]::after, .accordian .panel .link.up::after{transform: rotate(0deg) !important;}
.accordian .panel ul{margin-top: 20px;}
.panel p, .panel span{font-family: sans-serif;font-style: normal;font-weight: 300;font-size: 16px;line-height: 1.4;color: #000000;}
.left-img{display:contents;padding-right: 11px;vertical-align: top;}
.right-text{display: inline-block;vertical-align: middle;width: 60%;margin-left: 20px;}
.right-text h4{font-family: sans-serif;font-style: normal;font-weight: 300;font-size: 24px;line-height: 19px;color: #000000;}
.about-seller{padding-top: 20px; width: 100%; display: inline-block; border-top: 1px solid #E4E4E4; margin-top: 20px}
.about-seller p{font-family: sans-serif; font-weight: 300;line-height: 1.4;font-size: 16px;}
.about-seller p a{font-weight: normal; text-decoration: none;}
.about-seller h4.title {margin-bottom: 10px;}
.about-seller .right-text p{font-size: 14px; line-height: 1.2;margin-top: 5px;}
.about-seller .description {margin-top: 10px;}
.description a{font-weight: 500;text-decoration: underline;}
.left-img img{width: 80px;height: 80px;}
#premium .table-responsive tr td{text-align: left; border: 0;padding:3px 0;}
#premium table, #premium table thead th{border: none;background:none; text-align: left;padding:0;}
.lotDesc{padding-left: 0;}
.detail-account-right .auct-img {width: 100px; display: inline-block; vertical-align: top;}
.detail-account-right .auct-img img {width: 90px;height: 90px;}
.detail-account-right .auct-dtls {display: inline-block; width: calc(100% - 110px); vertical-align: top;}
.detail-account-right .auct-dtls .catelog-icon{margin-left: -3px;width: 100%; }

.btn-cat-only-no-btn{width: 100%;text-align: center;}
.btn-cat-only-no-btn:hover, .btn-cat-only-no-btn:focus, .btn-cat-only-no-btn:active, .btn-cat-only-no-btn:active:focus, .btn-cat-only-no-btn:active:hover{background-color: #31c82f;}
.col-xs-12 {
    width: 100%;
}

@media only screen and (max-width: 420px){

.menuIcon{
    display:block;
}
.menuIcon > span {
    width: 23px;
}
.logo {
    max-width: 161px;
    float: none;
    display: inline-block;
    vertical-align: middle;
    max-height: 27px;
}
.mobilee_login .userArea a.signup {
    display: none;
}
.login{
    display:none;
}
.headerMid{
    display:none;
}
.borderBtn{
    display:none;
}
.toggleMenu{
    display:none;
}
}
.tab-style{
font-size:20px;
width:50%;
background-color:#f2f2f2;
  text-align:center;
  

}
.nav-tabs > li > a {
    margin-right: 0px;
    color:grey;
}



.group2 { 
  position: relative; 
  margin-top: 16px; 
}

.btn-block{margin-top:20px;
margin-bottom:20px;
font-size:18px;}

.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {   background-color:#e5ecf4;
color:#4a89dc;}

.login-shadow{-webkit-box-shadow: 5px -5px 6px 0px rgba(82,82,82,0.52);
-moz-box-shadow: 5px -5px 6px 0px rgba(82,82,82,0.52);
box-shadow: 5px -5px 6px 0px rgba(82,82,82,0.52);
  z-index:1;
   
}

.signup-shadow{-webkit-box-shadow: -5px 0px 6px 0px rgba(82,82,82,0.52);
-moz-box-shadow: -5px -5px 6px 0px rgba(82,82,82,0.52);
box-shadow: -5px 0px 6px 0px rgba(82,82,82,0.52);
  
}


.modal-header{background-color:#e5ecf4;}

.group { 
  position: relative; 
  margin-top: 30px; 
}


.input {
  font-size: 18px;
  padding: 10px 10px 10px 5px;
  -webkit-appearance: none;
  display: block;
  background: none;
  color: #636363;
  width: 100%;
  border: none;
  border-radius: 0;
  border-bottom: 1px solid #757575;
}

.input:focus { outline: none; }


/* Label */

.label {
  color: #757575; 
  font-size: 18px;
  font-weight: normal;
  position: absolute;
  pointer-events: none;
  left: -10px;
  top: 10px;
  transition: all 0.2s ease;
}


/* active */

.input:focus ~ .label, .input.used ~ .label {
  top: -20px;
  transform: scale(.75); left:-15px;
  /* font-size: 14px; */
  color: #4a89dc;
}


/* Underline */

.bar {
  position: relative;
  display: block;
  width: 100%;
}

.bar:before, .bar:after {
  content: '';
  height: 2px; 
  width: 0;
  bottom: 1px; 
  position: absolute;
  background: #4a89dc; 
  transition: all 0.2s ease;
}

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


/* active */

.input:focus ~ .highlight {
  animation: inputHighlighter 0.3s ease;
}


@media  screen and (max-width: 767px) and (min-width: 576px){
  #myModal{margin-left:20%;
            margin-right:20%;}

  #forgot-password{margin-left:20%;
            margin-right:20%;}
} 


@media screen and (min-width: 768px) {
  
  #myModal .modal-dialog  {width:500px;}
  
  #forgot-password .modal-dialog{width:500px;}
  
  .modal-body{padding-left:50px;
              padding-right:50px;}
}

em{display:none;}
body.modal-open { overflow: hidden; }


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

$(window).on('shown.bs.modal', function() { 
  
$("html, body").css("overflow","hidden");
});


$(window).on('hidden.bs.modal', function() { 
  $("html, body").css("overflow","scroll"); 
});




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
                                    window.location.replace('https://subastas.maxilana.com/myAccount.php?#team');                       
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

<body>



      <header class="site-header" style="background-color:black;">
      <div class="headerTop">
        <div class="container pr">
            <div class="row">
                <div class="col-xs-12">                     

                    <div data-toggle="modal" data-target="#myModal" class="menuIcon">
                        <span class="line1"></span>
                        <span class="line2"></span>
                        <span class="line3"></span>                     
                    </div>
                                         <div class="logo">
                        <h1><a href="https://subastas.maxilana.com"><img src="https://subastas.maxilana.com/assets/img/logo%20subastas.png" alt="Subasas MAxilana"></a></h1>                    </div>
                    <div class="mobilee_login">
                        <div class="showMobile allMiddle">
                            <button class="btnSearch top-search-btn"></button>
                        </div>
                            <div class="userArea allMiddle">
                            <?php if(isset($_SESSION['auction_brodcaster'])): ?>
                                <nav class="navigation hamburgerBox">
                            <div class="mobiTitle">Menu</div>
                            <ul class="clearfix">
                                <li class="menu_title">Menu</li>
                                <li class="toggleMenu">
                                    <a style="margin-top: 2px;font-size: 20px;"><?php echo $_SESSION['auction_brodcaster']['username']?><br>
                                    Paleta: <?php echo $_SESSION['auction_brodcaster']['paleta'] ?> 
                                    <i class="fa fa-angle-down" aria-hidden="true"></i> </a>
                                    <span class="toggleSpan"></span>
                                    <ul class="subMenu">
                                        <li><a href="myAccount.php?#team">Mi Cuenta</a></li>
                                        <li><a href="logout.php">Cerrar sesión</a></li>
                                    </ul>
                                </li>
                                </ul>
                        </nav>
                            <?php else : ?>
                                <li class=""><a class="login" href="#signup" data-toggle="modal" data-target=".log-sign">Iniciar sesión</a></li>
                                <a href="https://subastas.maxilana.com/register.php" class="signup borderBtn">Registrarme</a>
                                <div class="container">
</div>
                            <?php endif; ?>
                             </div>
                                            
                                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="headerMid">
        <div class="container">
            <div class="row">
                <div class="col-xs-12" style="display:inline-flex;">                                 
                    <!-- Menu start -->
                    <div id="main_navigation">                                 
                        <nav class="navigation hamburgerBox">
                            <div class="mobiTitle">Menu</div>
                            <ul class="clearfix">
                                <li class="menu_title">Menu</li>
                                <li style="margin-left: 15px;" class="toggleMenu">
                                <li><a href="index.php">Inicio</a></li>
                                </li>
                                <li><a href="about.php">Acerca de</a></li>
                                <li><a href="register.php">Registrarse</a></li>
                                <li><a href="contact.php">Contacto</a></li>
                                <li><a href="catalog-all.php?status=pre-bidding#team">Catálogo</a></li>
                                <?php if(isset($_SESSION['auction_brodcaster'])): ?>
                                <li><a href="auction.php">Subasta en vivo</a></li>
                                <?php else:?> <?php endif; ?>

                                </ul>
                        </nav>
                        
                        <div class="overLayer">
                        
                        </div>
                    </div>
                    <div class="social-links text-center text-lg-right pt-3 pt-lg-0" style="float: right;
                        width: 285px;
                        margin-top:20px;">
        <a href="<?php echo $setting2['twitter_url'] ?>" style="color:white;" class="twitter" target="_blank"><i class="bx bxl-twitter"></i></a>
        <a href="<?php echo $setting2['facebook_url'] ?>" style="color:white;"  class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
        <!-- <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a> -->
        <!-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a> -->
        <!-- <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> -->
      </div>
                    <!-- Search area end -->
                </div>
            </div>  
        </div>
    </div>
    </header>

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
            <a  href="#signup" data-toggle="modal" data-target=".log-sign" style="margin-left:5px;">Iniciar sesión</a></li></div>
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
                <input type="button" class="close" style="font-size: initial;" data-dismiss="modal" aria-label="Close"  value="Cerrar"></input>
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