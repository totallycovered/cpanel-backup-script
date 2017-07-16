<?php

// Usable $trings
// $ftpuser $ftppass $ftphost $ftpmode $ftpport $ftpdir $notifyemail

// Set up FTP connection and test.
$conn_id = ftp_connect($ftphost, $ftpport) or die("Couldn't connect to FTP server.");

// TEst FTP login
$login_result = ftp_login($conn_id, $ftpuser, $ftppass);

// try to create the directory $ftpdir
if (ftp_mkdir($conn_id, $ftpdir)) {
 echo "successfully created $dir\n";
} else {
 echo "There was a problem while creating $dir\n";
}

// close the connection
ftp_close($conn_id);

?>
