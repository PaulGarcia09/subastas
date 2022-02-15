<head>

    <meta charset="utf-8">

<script type=text/javascript> </script><script type=text/javascript> </script><script type=text/javascript> </script><script type=text/javascript> </script></head>

<?php

    session_start();
    session_destroy();
    
    /* Después de 0 segundos vamos a mandar a la página de fotosremates */
	header('refresh:0;url=index.php');

?>
