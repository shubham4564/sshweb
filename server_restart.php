<html>
<head><title>Welcome to SSH Web</title></head>
<body>
<?php
	session_start();
	
	$remoteip = $_SESSION["remoteip"];
	$port = $_SESSION["port"];
	$uname = $_SESSION["uname_dash"];
	$passwd = $_SESSION["passwd_dash"]; 

	// trigger the submit button
	if(isset($_POST[btn_server_restart])) {
		//echo "yesdffs".PHP_EOL;

		//create the connection to the remote computer, first is the ip of remote computer and second parameter is port.
		if($ssh = ssh2_connect($remoteip, $port)) {
		   //take the password and username from the form value with POST method for little secure. 
		   if(ssh2_auth_password($ssh, $uname, $passwd)) {
		   		//echo "yes";
		       $stream = ssh2_exec($ssh, 'cat /home/shubham/Desktop/1 | sudo -S service network-manager restart');  //executes the command and keep it in Stream variable as resources
		        echo "Server has been restarted!";
		    }
}
	}else{echo'nothing';}
?>

</body>

</html>