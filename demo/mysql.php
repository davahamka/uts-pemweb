<?php
$mysql = new mysqli('18.204.3.17','pemweb','!Dev12345','uts_pemweb');
	if ($mysql->connect_errno) {
		die("MySQL Error : ".$mysql->connect_error);
	}


?>