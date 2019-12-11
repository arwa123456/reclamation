<?php
class Database
{   
   
   public function connexion1()
	{
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="site";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		return $conn;
	}
}
?>