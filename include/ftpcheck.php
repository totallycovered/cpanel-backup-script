<?php

// This script checks the FTP scredentials and created backup folder

// Usable $trings
// $ftpuser $ftppass $ftphost $ftpmode $ftpport $ftpdir $notifyemail

// Set up FTP connection and test.
$conn_id = ftp_connect($ftphost, $ftpport) or die("Couldn't connect to FTP server.");

// FTP login results
$login_result = ftp_login($conn_id, $ftpuser, $ftppass);

// try to create the directory $ftpdir
if (ftp_mkdir($conn_id, $ftpdir)) {
 $create = "Sucessfully!\n";
} else {
 $create = "There was a problem while creating the backup folder\n";
}

// close the connection
ftp_close($conn_id);

// Debug
if ($debug) {
 echo "Login Result: $login_result\n";
 sleep(10);
 echo "Create Backup Folder: $create\n";
 sleep(10);
}

?>
