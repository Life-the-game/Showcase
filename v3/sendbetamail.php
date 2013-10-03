<?php

include_once("infos.php");

if (!empty($_POST) && isset($_POST["mail"]))
{
	mysql_connect($host, $user, $pwd) or die(mysql_error());
	mysql_select_db($db) or die(mysql_error());
	
	mysql_query("INSERT INTO betalife (id, mail, stamp) VALUES('', '".$_POST["mail"]."', '".time()."' ) ") 
	or die(mysql_error());

	mysql_close();
}

?>