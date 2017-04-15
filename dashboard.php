<html>
<head><title>Welcome to SSH Web</title></head>
<body>

<form id="server_restart" action="server_restart.php" method="POST" accept-charset="UTF-8">
		        <br><input type="submit" name="btn_server_restart" value="Server Restart"><br>
		        </form>
<?php
	session_start();
	$uname = $_POST['uname'];
	$passwd = $_POST['passwd'];

	$_SESSION["uname_dash"] = $uname;
	$_SESSION["passwd_dash"] = $passwd;

	// trigger the submit button
	if(isset($_POST[btn_login])) {
		//create the connection to the remote computer, first is the ip of remote computer and second parameter is port.
		if($ssh = ssh2_connect('192.168.56.102', 7773)) {
		   //take the password and username from the form value with POST method for little secure. 
		   if(ssh2_auth_password($ssh, $uname, $passwd)) {
		   		echo "You are logged in as : ";
		        $stream = ssh2_exec($ssh, 'whoami');  //executes the command and keep it in Stream variable as resources
		        stream_set_blocking($stream, true);  //blocking mode is turned to true for Stream variable
		        $data = '';  //initialize data variable
		        while($buffer = fread($stream, 4096)) {   //used loop to read from Stream variable upto length of 4096
		            $data .= $buffer; // keep the value of buffer in data in every loop until the loop is complete
		        }
		        fclose($stream); //close the read operation
		        echo $data; // prints the data
		    }
}
	}else{echo'nothing';}
?>

</body>
</html>