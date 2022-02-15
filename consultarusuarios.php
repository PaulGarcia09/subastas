<?php
function getIP() {
	$ip="";
	if (getenv("HTTP_CLIENT_IP")) $ip = getenv("HTTP_CLIENT_IP");
		else if(getenv("HTTP_X_FORWARDED_FOR")) $ip = getenv("HTTP_X_FORWARDED_FOR");
		else if(getenv("REMOTE_ADDR")) $ip = getenv("REMOTE_ADDR");
		else $ip = "";
	return $ip;
}
 
function howManyIps() {
	$filename = "howmanyusers.log";
	$seconds = 300;
	$yourIP = getIP();
 
	if (file_exists($filename.".lock")) $readonly = true; else $readonly=false;
 
	$count = 0;
	//lock the file
	if (!$readonly) {
        $fpLock = fopen($filename.".lock", "w");
    }
 
	//read data ips
	$fp = fopen($filename, "r");
	$arIPS=explode ("\n", fread($fp,filesize($filename)) );
	fclose($fp);
 
	//if file is locked get out
	if ($readonly) return count($arIPS);
 
	$s = "";
	$already=false;
	//update data and search user ip
	for ($i=0;$i<count($arIPS);$i++) {
 
		$arData= explode (" ", $arIPS[$i]);
 
		//update your user timer
		if ($yourIP==$arData[0]) {
			$already=true;
			$arData[1]=time();
		}
 
		// check if user is old
		if ( time()- (integer)$arData[1] < $seconds ){
			$s.=$arData[0]." ".$arData[1]."\n";
			$count++;
		}
 
	}
 
	if (!$already) {
		//your user is new, add it to the list
		$s.=$yourIP." ".time()."\n";
		$count++;
	}
 
	//save the list
	$fp = fopen($filename, "w");
	fwrite($fp,$s);
	fclose($fp);
 
	//remove thr lock
	fclose($fpLock);
	unlink($filename.".lock");
 
	return $count;
}
 
echo($usuariosConectados=howManyIps());
?>