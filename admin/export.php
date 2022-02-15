<?php
    include('../config/config.php');

        
if(!empty($_GET['ex'])){
        
        // include "../config/db.php";     
        
        
        // $dbserver="localhost";
        // $dbusername="root";
        // $dbpassword="";
        // $defaultdb="abroadcaster";
        
        
        // $cn = mysql_connect($dbserver,$dbusername,$dbpassword) or die(mysql_error());
        // $db = mysql_select_db($defaultdb) or die("Database Error");
        
        if($_GET['ex']=='1'){
              $_GET['tbl_name'] ="Users";
              $_GET['sql_fields'] = "
              SELECT f_customer_id AS Cutomer_id, 
              f_username AS Username,
              paddle_number AS Paleta,
              f_email AS Email,
              f_firstname AS FirstName,
              f_lastname AS LastName,
              f_telephone AS Telephone,
              f_status AS Estatus,
              f_address_1 AS Address1,
              f_address_2 AS Address2, 
              f_city AS City,
              f_postcode AS ZIP_or_Post_code,
              f_country AS Country, 
              f_state AS State,
              i.nombre AS Insticion
              FROM t_customer c 
              left join t_instituciones i
              on c.f_institucion = i.id
              WHERE f_type = 'User'
                -- AND f_status = '1'
              ";
              //echo  $_GET['sql_fields'];
              include("export-process.php");
              exit;
        }elseif($_GET['ex']=='2'){
            $_GET['tbl_name'] ="Lots closed";
            $_GET['sql_fields'] = "select f_lots_id as Lot_ID, f_title as Title, f_number as Lot_Number, f_description as Lot_Decrisption, f_start_date as Date_of_auction, f_minimum_bid as Minimum_bid, f_reserve_bid as reserve_bid, f_bid_increment as Bid_increment, f_current_bid as Total, c.f_username as Usuario,c.paddle_number as Paleta,c.f_telephone as Telefono from t_lots l inner join t_customer c on c.f_customer_id=l.f_bid_user where l.f_status in (3,4) order by f_start_date,f_order";
                include("export-process.php");
                exit;
        }elseif ($_GET['ex']=='3'){
            $_GET['tbl_name'] ="Bids";
            $_GET['sql_fields'] = "
            select f_lots_id as Lot_ID, f_title as Title, f_number as Lot_Number, f_description as Lot_Decrisption, f_start_date as Date_of_auction, f_minimum_bid as Minimum_bid, f_reserve_bid as reserve_bid, f_bid_increment as Bid_increment, f_current_bid as Total, f_bid_user_name as Usuario,c.paddle_number as Paleta, f_telephone as Telefono,f_event as Evento,c.f_firstname as Nombre, f_lastname as Apellido,f_customer_id as idCte from t_lots l inner join t_customer c on c.f_customer_id=l.f_bid_user order by f_start_date,f_order";
            include("export-process.php");
             exit;
            
        }
        elseif ($_GET['ex']=='4'){
            $_GET['tbl_name'] ="History lots";
            $_GET['sql_fields'] = "select h.f_history_id as History_id, h.f_lot_id as Id,l.f_number as Lote,l.f_title as Articulo, h.f_user_id as UserId, c.f_firstname as Nombre, c.f_lastname as Apellido, c.f_telephone as Celular , c.f_email as Correo, c.paddle_number as Paleta, l.f_event as Evento , h.f_date as Date_Bid, h.f_amount as Amount from t_lots_history h inner join t_lots l on h.f_lot_id = l.f_lots_id inner join t_customer c on c.f_customer_id = h.f_user_id";
            include("export-process.php");
            exit;
            
        }
        elseif ($_GET['ex']=='5'){
            $_GET['tbl_name'] ="Clientes nuevos";
            $_GET['sql_fields'] = "
            SELECT
            f_username AS Username,
            paddle_number AS Paleta,
            f_email AS Email,
            f_firstname AS FirstName,
            f_lastname AS LastName,
            f_telephone AS Telephone,
            f_status AS Estatus,
            f_address_1 AS Address1,
            f_address_2 AS Address2, 
            f_city AS City,
            f_postcode AS ZIP_or_Post_code,
            f_country AS Country, 
            f_state AS State,
            f_dateregister as FechaRegistro
            FROM t_customer
            WHERE f_dateregister > (select f_start_date from t_events where f_start_date < now() order by f_start_date desc limit 1) and f_type = 'User'";
                include("export-process.php");
                exit;
            
        }
        
        
    }

            
?>
