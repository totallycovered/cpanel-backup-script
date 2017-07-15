<?php
	if ($secure) {
	$url = "ssl://".$domain;
	$port = 2083;
	} else {
	$url = $domain;
	$port = 2082;
	}
	
	$socket = fsockopen($url,$port);
	if (!$socket) { echo "Failed to open socket connection... Bailing out!\n"; exit; }
	
	// Encode authentication string
	$authstr = $cpuser.":".$cppass;
	$pass = base64_encode($authstr);
	
	$params = "dest=$ftpmode&email=$notifyemail&server=$ftphost&user=$ftpuser&pass=$ftppass&port=$ftpport&rdir=backups/$domain&submit=Generate Backup";
	
	// Make POST to cPanel
	fputs($socket,"POST /frontend/".$skin."/backup/dofullbackup.html?".$params." HTTP/1.0\r\n");
	fputs($socket,"Host: $domain\r\n");
	fputs($socket,"Authorization: Basic $pass\r\n");
	fputs($socket,"Connection: Close\r\n");
	fputs($socket,"\r\n");
	
	fclose($socket);
?>
