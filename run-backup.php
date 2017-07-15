<?php
  $home = $_SERVER['HOME'];
	$client = $home . "/scripts/clients/";
  	
	if ($handle = opendir($client)) {
		while (false !== ($file = readdir($handle))) {
			if ('.' === $file) continue;
			if ('..' === $file) continue;
	
			// Run the backup
      			include $home . '/scripts/clients/' . $file;
			include $home . '/scripts/include/ftp.php';
			include $home . '/scripts/include/notification.php';
			include $home . '/scripts/include/backup.php';
			sleep(15);
					
		}
		closedir($handle);
	}
	
    mail("email@example.com","cPanel Backup Script","Completed");

?>
