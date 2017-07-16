start script
	include include/serverinfo.php
		get home folder
	include config/variables.php
		Username for FTP account
		Password for FTP account
		Full hostname or IP address for FTP hostname
		FTP mode ("ftp" for active, "passiveftp" for passive)
		FTP port, usually 21
		Email address to send results
	Cycle through each client script
		grab client script name
		include clients/script-name
			Username used to login to CPanel
			Password used to login to CPanel
			Domain name where CPanel is run
			Set to 1 for SSL (requires SSL support), otherwise will use standard HTTP
			Set to cPanel skin you use (script won't work if it doesn't match)
		include include/backup.pgp script 
			check if ssl
			open socket or fail
			Encode authentication string
			Make POST to cPanel
			close connection
			close socket
		wait some time
	repeat cycle until all client scripts processed
	Close client directory
	email completion
end script
