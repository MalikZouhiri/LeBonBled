<?php
function connexion()
{
	$connexion=mysqli_connect("localhost", "root","");
	mysqli_select_db($connexion,"test") or die(mysqli_error());
	return $connexion;
	
}

?>