<?php
if ( isset ( $_POST['enviar-contacto'] ) ) {

	if (isset($_FILES['uploaded_file']) &&
		$_FILES['uploaded_file']['error'] == UPLOAD_ERR_OK) {
		$mail->AddAttachment($_FILES['uploaded_file']['tmp_name'],
							 $_FILES['uploaded_file']['name']);
	}

	function validateEmail( $email ) {
		$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i';
		return preg_match($regex, $email);
	}

	$errors = array();

	if (
		isset( $_FILES['photo'] )
		&& ( 0 == $_FILES['photo']['error'] )
	) {
		if (
			( 'text/plain' != $_FILES['photo']['type'] )
			&& ( 'image/jpeg' != $_FILES['photo']['type'] )
			&& ( 'image/png' != $_FILES['photo']['type'] )
			&& ( 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' != $_FILES['photo']['type'] )
			&& ( 'application/msword' != $_FILES['photo']['type'] )
			&& ( 'application/vnd.ms-excel' != $_FILES['photo']['type'] )
			&& ( 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' != $_FILES['photo']['type'] )
			&& ( 'application/pdf' != $_FILES['photo']['type'] )
		) {
			$errors['photo'] = 'El archivo seleccionado no es válido. Sólo se permite: jpg, png, word, excel, pdf, txt';
		}
	}

	if ( '' == $_POST['tema'] ) {
		$errors['tema'] = 'Por favor, selecciona un tema.';
	}

	if ( '' == $_POST['nombre'] ) {
		$errors['nombre'] = 'Requerido';
	}

	if ( '' == $_POST['ciudad'] ) {
		$errors['ciudad'] = 'Requerido';
	}

	if ( '' == $_POST['email'] ) {
		$errors['email'] = 'Requerido';
	}else if ( ! validateEmail( $_POST['email'] ) ) {
		$errors['email'] = 'Escribe un correo válido';
	}

	if ( '' == $_POST['asunto'] ) {
		$errors['asunto'] = 'Requerido';
	}

	if ( '' == $_POST['mensaje'] ) {
		$errors['mensaje'] = 'Requerido';
	}

	if ( empty( $errors ) ) {


		require 'libraries/phpmailer/PHPMailerAutoload.php';

		$mail = new PHPMailer;

		$mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.office365.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'webmaxilana@maxilana.com';                 // SMTP username
		$mail->Password = 'cceMaxiWeb2015';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

		//$mail->From = 'maxilana@industriasocial.mx';
		$mail->From = 'webmaxilana@maxilana.com';
		//$mail->FromName = 'Maxilana';
		$mail->FromName = 'Maxilana Casa de Empeño WEB';
		$mail->AddReplyTo($_POST['email'],$_POST['nombre']);

		if ( 'Recursos humanos' == $_POST['tema'] ) {
			$mail->addAddress('jlopez@maxilana.com', 'Recursos Humanos');     // Add a recipient
		} else {
			$mail->addAddress('jlopez@maxilana.com', 'Informacion');     // Add a recipient
		}

		$mail->Subject = 'Contacto';

		$mail->Body = utf8_decode(".:: Información enviada desde www.maxilana.com ::.") . "\r\n"
			. "Tema:   " . utf8_decode($_POST['tema'])   . "\r\n"
			. "Nombre: " . utf8_decode($_POST['nombre']) . "\r\n"
			. "Email:  " . utf8_decode($_POST['email'])  . "\r\n"
			. "Ciudad: " . utf8_decode($_POST['ciudad']) . "\r\n"
			. "Asunto: " . utf8_decode($_POST['asunto']) . "\r\n"
			. "Mensaje:" . utf8_decode($_POST['mensaje']). "\r\n";

		if (
			isset( $_FILES['photo'] )
			&& ( 0 == $_FILES['photo']['error'] )
		) {
			$mail->AddAttachment( $_FILES['photo']['tmp_name'], $_FILES['photo']['name'] );
		}

		$mail->send();

		header('Location: gracias-contacto.html');

	exit;
	}
}
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Maxilana casa de empeño y prestamos">
    <meta name="keywords" content="empeño, prestamos, maxilana" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/selectric.css">
    <link href='https://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="favicon.ico">
    <script src="js/modernizr.js"></script>
    <title>Maxilana | Casa de Empeño</title>
<!-- check this --><link rel="stylesheet" href="estiloscontacto.css">
<!-- check this --><meta name="viewport" content="width=device-width, user-scalable=no">
<!-- check this <style type="text/css">@-ms-viewport{width: device-width;}</style>-->

<!-- google analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-65007168-1', 'auto');
  ga('send', 'pageview');

</script>
ga(‘set’, ‘&uid’, {{USER_ID}}); // Establezca el ID de usuario mediante el user_id con el que haya iniciado sesión.
<!-- google analytics -->

<!-- Facebook Pixel Code -->
<script>

	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod? n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0'; n.queue=[];
	t=b.createElement(e);
	t.async=!0;
	t.src=v;
	s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}
	(window,document,'script', 'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '120100045522150');
	fbq('track', 'PageView');

</script>

<noscript>

	<img height="1" width="1" src="https://www.facebook.com/tr?id=120100045522150&ev=PageView&noscript=1"/>

</noscript>
<!-- End Facebook Pixel Code -->

<!-- Facebook Pixel Code -->

<script>

!function(f,b,e,v,n,t,s)

{if(f.fbq)return;n=f.fbq=function(){n.callMethod?

n.callMethod.apply(n,arguments):n.queue.push(arguments)};

if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';

n.queue=[];t=b.createElement(e);t.async=!0;

t.src=v;s=b.getElementsByTagName(e)[0];

s.parentNode.insertBefore(t,s)}(window,document,'script',

'https://connect.facebook.net/en_US/fbevents.js');


fbq('init', '152158579064042');

fbq('track', 'PageView');

</script>

<noscript>

<img height="1" width="1"

src="https://www.facebook.com/tr?id=152158579064042&ev=PageView

&noscript=1"/>

</noscript>

<!-- End Facebook Pixel Code -->


</head>

<body>

    <header class="cd-header">

          <div class="telefono">
            <a class="tel" href="tel:8002151515"><i class="fa fa-phone"></i> 800 215 15 15</a>
          </div>

        <div id="cd-logo"><a href="index.html"><img src="assets/logo-esr.png" alt="Logo"></a></div>

        <nav class="cd-primary-nav">
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="somos.html">Somos</a></li>
                <li><a href="servicios.html">Otros servicios</a></li>
                <li><a href="preguntas.html">Preguntas frecuentes</a></li>
                <li><a href="maxiamigo2.html">MaxiAmigo</a></li>
                <li><a href="sucursales.html">Sucursales</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </nav> <!-- .cd-primary-nav -->


    </header>
<section class="cd-hero2">
        <div style="height:80px;"></div>

        <div class="cd-slider-nav2">
            <nav>
                <span class="cd-marker item-1"></span>

                <ul>
                    <li class="selected"><a href="empeno/index.php">EMPEÑO</a></li>
                    <li class="selected"><a href="requisitos.php">PRÉSTAMOS<br>PERSONALES</a></li>
                    <li class="selected"><a href="sucursales.html">SUCURSALES</a></li>
                    <li class="selected"><a href="boleta.php">TU BOLETA</a></li>
                    <li class="selected"><a href="remates.php?Access=NewPage">TIENDA<br>EN LINEA</a></li>
                    
<!--
                    <li class="selected"><a href="http://subastas.maxilana.com">SUBASTAS</a></li>
                    <li class="selected"><a href="https://eshops.mercadolibre.com.mx/TIENDAMAXILANA">TIENDA<br>EN LINEA</a></li>
-->
                </ul>
            </nav>
        </div> <!-- .cd-slider-nav -->

</section> <!-- .cd-hero -->

<main class="cd-main-content">



<br><br><br><br><br><br><br><br>
<!--
                    <div id="dd" class="wrapper-dropdown-5" tabindex="1">Tema
                        <ul class="dropdown">
                            <li><a href="#">Información</a></li>
                            <li><a href="#">Recursos humanos</a></li>
                        </ul>
                    </div>
-->

<form class='contacto' method='POST' action='' enctype="multipart/form-data">

			<?php
			if ( isset( $errors['tema'] ) ) {
				echo '<div class="errorform">' . $errors['tema'] . '</div>';
			}
			?>
			<div id="tema" style="max-width: 250px; margin: auto">
	<select name="tema">
		<option value="">Tema</option>
		<option value="Información">Información</option>
		<option value="Recursos humanos">Recursos humanos</option>
	</select>
		</div>

	<div style="clear:both; margin-bottom: 20px;"></div>

    <img src="assets/icono.jpg" alt="Logo">
    <div class="titulocontacto">Tu Opinón es importante para nosotros</div>
    <br><br>
<div><label>Nombre:</label><input type='text' autocomplete="off" class='nombre' name='nombre' value='<?php echo $_POST['nombre']; ?>'><?php echo $error1 ?>
			<?php
			if ( isset( $errors['nombre'] ) ) {
				echo '<span class="error">' . $errors['nombre'] . '</span>';
			}
			?>
</div>

<div><label>Ciudad:</label><input type='text' autocomplete="off" class='ciudad' name='ciudad' value='<?php echo $_POST['ciudad']; ?>'><?php echo $error5 ?>
			<?php
			if ( isset( $errors['ciudad'] ) ) {
				echo '<span class="error">' . $errors['ciudad'] . '</span>';
			}
			?>
</div>

<div><label>Email:</label><input type='text' autocomplete="off" class='email' name='email' value='<?php echo $_POST['email']; ?>'><?php echo $error2 ?>
			<?php
			if ( isset( $errors['email'] ) ) {
				echo '<span class="error">' . $errors['email'] . '</span>';
			}
			?>
</div>
<div><input type="hidden" name="custom_subject" value="Mensaje enviado desde el sitio maxilana.com"></div>
<div><label>Asunto:</label><input type='text' class='asunto' name='asunto' value='<?php echo $_POST['asunto']; ?>'><?php echo $error3 ?>
			<?php
			if ( isset( $errors['asunto'] ) ) {
				echo '<span class="error">' . $errors['asunto'] . '</span>';
			}
			?>
</div>
<div><label>Mensaje:</label><textarea rows='6' class='mensaje' name='mensaje'><?php echo $_POST['mensaje']; ?></textarea><?php echo $error4 ?>
			<?php
			if ( isset( $errors['mensaje'] ) ) {
				echo '<span class="error">' . $errors['mensaje'] . '</span>';
			}
			?>
</div><br>

			<?php
			if ( isset( $errors['photo'] ) ) {
				echo '<div class="errorform">' . $errors['photo'] . '</div>';
			}
			?>

<div><label for='photo' >Adjuntar:</label><input type="file" name='photo' id='photo' /></div><br>
<div><input type='submit' value='Enviar mensaje' class='boton' name='enviar-contacto'></div>
<?php echo $result; ?>

</form>
<br>


</main>
<br><br>
<div class="socialfooter">
    <div class="socialicon"><a href="https://twitter.com/MaxilanaMx"><i class="fa fa-twitter-square"></i></a></div>
    <div class="socialicon"><a href="https://www.facebook.com/maxilana"><i class="fa fa-facebook-square"></i></a></div>
    <div class="socialicon"><a href="https://www.youtube.com/user/MaxiLana01"><i class="fa fa-youtube"></i></a></div>
</div>
<br><br>
<div class="copyright">&copy; 2015 Maxilana | <a href="index.html">Inicio</a> | <a href="somos.html">Somos</a> | <a href="servicios.html">Otros servicios</a> | <a href="preguntas.html">Preguntas frecuentes</a> | <a href="sucursales.html">Sucursales</a> | <a href="contacto.php">Contacto</a>

<br><br><br>
<b><a href="aviso-de-privacidad.html">Aviso de Privacidad</a> | <a href="terminos-y-condiciones.html">Términos y Condiciones</a></b>
<br><br><br>

<script src="js/jquery-2.1.1.js"></script>
<script src="js/main.js"></script>
<script src="js/jquery.selectric.js"></script>
<script type="text/javascript">
$(function(){
  $('select').selectric();
});
</script>
<!-- Resource jQuery -->
<!-- inicia script para el dropdown menu -->
        <script type="text/javascript">

            function DropDown(el) {
                this.dd = el;
                this.initEvents();
            }
            DropDown.prototype = {
                initEvents : function() {
                    var obj = this;

                    obj.dd.on('click', function(event){
                        $(this).toggleClass('active');
                        event.stopPropagation();
                    });
                }
            }

            $(function() {

                var dd = new DropDown( $('#dd') );

                $(document).click(function() {
                    // all dropdowns
                    $('.wrapper-dropdown-5').removeClass('active');
                });

            });

        </script>
<!-- termina script para el dropdown menu -->


<!-- google analytics -->
<!-- Google Code for Solicitud de Pr&eacute;stamos personales. Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 956242058;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "eR83CIydq14QirH8xwM";
var google_conversion_value = 2000.00;
var google_conversion_currency = "MXN";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/956242058/?value=2000.00&amp;currency_code=MXN&amp;label=eR83CIydq14QirH8xwM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<!-- google analytics -->
<!-- CHAT -->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/573b5cc8bf3b0fde536a3ddc/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</body>
</html>
