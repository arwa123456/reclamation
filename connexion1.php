<html>
<head>
<meta charset="utf8">
</head>
<body>

<?php /*
include 'User.php';
//$log="admin";
//$pwd="admin";
$servername="localhost";
	$username="root";
	$password="";
	$dbname="dblogin";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", 
	$username, $password);
	$req="select * from users where user_name='$login' && user_pass='$pwd'";
	$rep=$conn->query($req);
	$res=$rep->fetchAll();
	
$c=new Database();
$conn=$c->connexion();
$user=new User($_POST['login'],$_POST['pwd'],$conn);
$u=$user->Logedin($conn,$_POST['login'],$_POST['pwd']);

//var_dump($u);
//$logR=$_POST['login'];
//$pwdR=$_POST['pwd'];
$vide=false;
if (!empty($_POST['login']) && !empty($_POST['pwd'])){
	
	foreach($u as $t){
		$vide=true;
	if ($t['user_name']==$_POST['login'] && $t['user_pass']==$_POST['pwd']){
		
		session_start();
		$_SESSION['l']=$_POST['login'];
		$_SESSION['p']=$_POST['pwd'];
		$_SESSION['r']=$t['role'];
		header("location:page_membre.php");
		
		}
	
}
if ($vide==false) { 
         // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
         echo '<body onLoad="alert(\'Membre non reconnu...\')">'; 
         // puis on le redirige vers la page d'accueil
         echo '<meta http-equiv="refresh" content="0;URL=auth.html">'; 
      } 
}	  
 
else { 
      echo "Les variables du formulaire ne sont pas déclarées.<br> Vous devez remplir le formulaire"; 
     ?> <a href="auth.html">Retour au formulaire</a>	 <?php 
}  
*/
?> 


<?php

if (isset($_POST['login'])) {
	include 'dbconfig1.php';
	$c=new Database();
	$conn=$c->connexion();
$email = $_POST['login'];
$password=$_POST['pwd'];
$query = "SELECT * FROM user_admin WHERE email='$email' && password='$password' ";
if(!$rep=$conn->query($query)){
	die(var_export($conn->errorinfo(), TRUE));
}
var_dump($conn);
var_dump($rep);
	$select_user_query=$rep->fetchAll();
	

if (!$select_user_query) {
	echo "<div class='center-align meh'>
	<h5 class='red-text'>Erreur</h5>
	 <a href='sign-in.html'>Retour au formulaire</a>	
  </div>";
}else{
	
	session_start();
	$_SESSION['l']=$_POST['login'];
	$_SESSION['p']=$_POST['pwd'];
	
	header("location:page_membre.php");
	

	
}
}


?>
</body>
</html>