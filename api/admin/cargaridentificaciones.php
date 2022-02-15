<?php
    include('../../config/config.php');


		$custid = $_POST['idcustomer'];
		$evento = $_POST['evento'];
        $file = $_FILES['primary_image'];



        $temName = $file['tmp_name']; //Obtenemos el directorio temporal en donde se ha almacenado el archivo;
		$fileName = $file['name']; //Obtenemos el nombre del archivo
		$fileExtension = substr(strrchr($fileName, '.'), 1); //Obtenemos la extensiÃ³n del archivo.

		//Comenzamos a extraer la informaciÃ³n del archivo
		$fp = fopen($temName, "rb");//abrimos el archivo con permiso de lectura
		$contenido = fread($fp, filesize($temName));//leemos el contenido del archivo
		//Una vez leido el archivo se obtiene un string con caracteres especiales.
		$contenido = addslashes($contenido);//se escapan los caracteres especiales
		fclose($fp);//Cerramos el archivo

		$update_sql ="update t_identifications set idfront ='{$contenido}', extencion='{$fileExtension}' where f_customer_id ='{$custid}'";

		$update = $dbMaster->execute($connect,$update_sql);
		
		header("location:../../admin/confirmacionclientes.php?event=".$evento);
?>