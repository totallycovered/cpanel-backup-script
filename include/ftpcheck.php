<?php

// set up basic connection
$conn_id = ftp_connect($ftphost, $ftpport);

// login with username and password
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
