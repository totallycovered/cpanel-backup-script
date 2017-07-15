<?php

//======================================================================
// CPANEL FULL BACKUP SCRIPT
//======================================================================

//-----------------------------------------------------
// Copied and Pasted from everywhere.
//-----------------------------------------------------

/* This is the main script file */

# 1 - Edit clients/example.com.php and create folder backups/domainname.com
#
# 2 - Edit /scripts/include/ftp.php and /scripts/include/notification.php
#
# 3 - Add to crontab
 

/*	Detailed how-to
*       ---------------
*
*   1 	mv clients/example.com.php clients/yourdomain.com
*  		nano clients/yourdomain.com
*   2	nano /scripts/include/ftp.php
*  	   	nano /scripts/include/notification.php
*	3	crontab -e
*       0 0 * * * /path/to/php -q /path/to/run-backup.php
*/

// This is a single line quote.
?>

	// Get HOME directory
	$home = $_SERVER['HOME'];

	// Declare client folder
	$client = $home . "/clients/";
  	
	// Cycle through each client script
	if ($handle = opendir($client)) {
		while (false !== ($file = readdir($handle))) {
			if ('.' === $file) continue;
			if ('..' === $file) continue;
	
			// Includes
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
