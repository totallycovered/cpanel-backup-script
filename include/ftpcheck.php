<?php

// This script checks the FTP scredentials and created backup folder

//  Usable $trings
// $ftpuser $ftppass $ftphost $ftpmode $ftpport $ftpdir $notifyemail

// Debug
if ($debug) {
 echo "Usable varibles are $ftpuser $ftppass $ftphost $ftpmode $ftpport $ftpdir $notifyemail\n"
 sleep(10);
}

// Set up FTP connection and test.
$conn_id = ftp_connect($ftphost, $ftpport) or die("Couldn't connect to FTP server.");

// FTP login results
$login_result = ftp_login($conn_id, $ftpuser, $ftppass);
// Debug
if ($debug) {
 echo "Login result was $login_result\n"
 sleep(10);
}

// try to create the directory $ftpdir
$dir = $ftpdir . $domain;
if (ftp_mkdir($conn_id, $dir)) {
 $create = "Sucessfully!\n";
} else {
 $create = "There was a problem while creating the backup folder\n";
 die("There was a problem while creating the backup folder.")
}
// Debug
if ($debug) {
 echo "Create Backup Folder: $create\n";
 sleep(10);
}

// close the connection
ftp_close($conn_id);

// Debug
if ($debug) {
 echo "ftpcheck.php has been ran.\n";
 sleep(10_;
}

?>
