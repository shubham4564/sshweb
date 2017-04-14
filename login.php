<?php
	// trigger the submit button
	if(isset($_POST[logi])) {
		$db = new mysqli("localhost","root","","webssh");

		//create query
		$query = "SELECT * FROM tb_login WHERE uname='".$_POST['uname']."' AND passwd='".$_POST['pass']."'";

		//execute query
		$sql = $db->query($query);

		//num_row will count the affected rows base on sql quert. so $n will return a number base on your query

		//if $n > 0 it means there us an existing record that match base on query above
		if($n > 0) {
			echo "Login";
		} else {
			echo "Incorrect Username or Password!"
		}
	}

?>