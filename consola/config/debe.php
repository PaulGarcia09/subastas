<?php
class ConnectionDB
{ 
	public function  DBmaster(){  

   $username = "da_admin";
   $password = "2NsDAo08B9";
   $schema   = "abroadcastertemp";
   $server   = "localhost";


   $con = mysqli_connect($server,$username,$password);
   mysqli_set_charset($con, 'utf8');  
   if (!$con)
   {
    die('Could not connect: ' . mysqli_error());
   }   
   
   $result = mysqli_select_db($con,$schema);
   
   if(!$result){
    echo "cannot connect schema";
    exit;
   }
   
   return $con;
 }
 
	public function realquery($con,$sql){
	  
			if ($result = mysqli_real_query($con,$sql)) {
			
			$result =  mysqli_store_result($con);
			
			if(mysqli_more_results($con)) {
				while(mysqli_next_result($con));     
			}
				
				return $result;
			}
			
			return null;
	}
 
 public function getResultAsAssoc($con,$sql) {
  try{
	   if ($result = $this->realquery($con,$sql)) {
	 
	                 $resultArray = array();
	                 while ($row = mysqli_fetch_assoc($result)) {
	                     $resultArray[] = $row;
	                 }
	 
	                 mysqli_free_result($result);
	                 return $resultArray;
	      }
	 
	             return null;
	             
 }
  
  catch(Exception $e){
   echo die($e);
  } 

 }
     
     
   public function getValue($con,$sql) {
   	try {
   		if ($result = $this->realquery($con,$sql)) { 
			if ($row = mysqli_fetch_row($result)) { 
				mysqli_free_result($result);
				return $row[0];
			} 
   		} 
   		 return null;
        }catch (Exception $e){
        	echo die($e); 
        }   
    }
  
     
    public function getRowAsAssoc($con,$sql) {
    	try {
    		if ($result = $this->realquery($con,$sql)) {
    			$returnVal = mysqli_fetch_assoc($result);                
    			mysqli_free_result($result);
                return $returnVal;
    		  }
    		   return null;
        }catch (Exception $e){
        	throw new DatabaseException($this->error,$this->errno);       
        }
    }
    
    
    public function execute($con,$sql) {
    	try {
         
		        if ($result = mysqli_query($con, $sql)) {        
		            return $result;                
		        }
	        
	            return null;
    	   }
            catch (Exception $e){
            	
            	echo die($e);
             }
     }
	 public function validarAfectados($con) {
		try {
		   
			  if ($result = mysql_affected_rows($con, $sql)) {    

				  return $result;                
			  }
			
				return null;
		   }
			  catch (Exception $e){
				
				echo die($e);
			   }
	   }
    
	 
	 public function generaterandom($length=9, $strength=0) {

	    $vowels = 'aeuy';
	    $consonants = 'bdghjmnpqrstvz';
	    if ($strength & 1) {
	        $consonants .= 'BDGHJLMNPQRSTVWXZ';
	    }
	    if ($strength & 2) {
	        $vowels .= "AEUY";
	    }
	    if ($strength & 4) {
	        $consonants .= '23456789';
	    }
	    if ($strength & 8) {
	        $consonants .= '@#$%';
	    }
	    $password = '';
	    $alt = time() % 2;
	    for ($i = 0; $i < $length; $i++) {
	        if ($alt == 1) {
	            $password .= $consonants[(rand() % strlen($consonants))];
	            $alt = 0;
	        } else {
	            $password .= $vowels[(rand() % strlen($vowels))];
	            $alt = 1;
	        }
	    }
	    return $password;
	 }
     	
	 
	 function validatethis($value,$match,$min,$max,$msge1,$msge2){     	     	
		
		if(strlen($value)>=$min && strlen($value)<=$max){
			if (!preg_match($match,$value)){
				$msgError=$msge2;
			}
		}else{
			$msgError=$msge1;
			
		}
		
		return $msgError;
	 }
	 
     
	 
	  public function validateCheck($value,$match,$min,$max){     	
     	
		$HasError =0;		
		if(strlen($value)>=$min && strlen($value)<=$max){
			if (preg_match($match,$value)){
				$HasError=0;
			}else{
				$HasError=1;
			}
		}else{
			$HasError=1;			
		}		
		return $HasError;
	 }
	 
     
 
}
?>
