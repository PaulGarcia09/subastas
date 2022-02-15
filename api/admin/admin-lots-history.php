<?php
	include('../../config/config.php');	
 
	
	$lotid = mysqli_real_escape_string($connect,$_POST['lotid']);
	
	$sql ="select * from t_lots_history where f_lot_id='{$lotid}' order by f_history_id desc" ;
	$lots = $dbMaster->getResultAsAssoc($connect,$sql);

	
	 
	

	
?>
 
		         <?php if(!empty($lots)){?>
		          
		            <?php foreach($lots as $value){?>
		         		<?php 
							$sql ="select * from t_customer where f_customer_id='{$value["f_user_id"]}'" ;
							$paddle_number = $dbMaster->getRowAsAssoc($connect,$sql);
		         		?>
				          <tr>
				         
				             <td class="center"><?php echo no_magic_quotes(htmlentities($value['f_username']));?></td>
				             <td class="center"><?php echo no_magic_quotes(htmlentities($paddle_number['paddle_number']));?></td>
				             <td class="center"><?php echo no_magic_quotes(htmlentities($value['f_lot_id']));?></td>
				             <td class="center"><?php echo no_magic_quotes(htmlentities($value['f_amount']));?></td>
				             <td class="center"><?php echo no_magic_quotes(htmlentities($value['f_date']));?></td>
				           	<td class="center">
				           	<?php if($value['f_type']=='2'){?>
				           	Live Bidding
				           	<?php }else if($value['f_type']=='3'){?>
				           	Paid via paypal
				           	<?php }else{?>
							 Pre-Bidding
				           	<?php }?>
				           	
				           	</td>
				             
				             
				          </tr> 
			           <?php }?>
		          <?php }else{
				  
				  
				  ?>
				   <tr>
				         
				             <td colspan="5">No data</td>
				  </tr> 
                 <?php }?>