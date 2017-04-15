<?php
	
	$uname = $_POST['uname'];
	$passwd = $_POST['passwd'];

	// trigger the submit button
	if(isset($_POST[login])) {
		//create the connection to the remote computer, first is the ip of remote computer and second parameter is port.
		if($ssh = ssh2_connect('192.168.56.102', 7773)) {
		   //take the password and username from the form value with POST method for little secure. 
		   if(ssh2_auth_password($ssh, $uname, $passwd)) {
		   		echo "You are logged in as : ";
		        $stream = ssh2_exec($ssh, 'whoami');  //executes the command
		        stream_set_blocking($stream, true);
		        $data = '';
		        while($buffer = fread($stream, 4096)) {
		            $data .= $buffer;
		        }
		        fclose($stream);
		        echo $data; // prints the data
		    }
}

	}else{echo'nothing';}

?>