<?php

	include "include/serverinfo.php";
	include "config/variables.conf";


  	
	// Cycle through each client script
	if ($handle = opendir($client)) {
		while (false !== ($file = readdir($handle))) {
			if ('.' === $file) continue;
			if ('..' === $file) continue;
	
			// Includes
			//
			// Test FTP site and create backup location
			include ftpcheck.php;
			// Include current client script
      			include $home . '/clients/' . $file;
			// Include remote FTP config
			include $home . '/scripts/include/ftp.php';
			// Include notification email
			include $home . '/scripts/include/notification.php';
			// Include backup script
			include $home . '/scripts/include/backup.php';
			// Wait some time before cycling to next client script
			sleep(15);

			// Repeat until all client scripts have been php'd
					
		}
		// Close client directory
		closedir($handle);
	}
	
    mail($notifyemail,"cPanel Backup Script","Completed");

?>
