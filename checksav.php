<?php
session_start();

// declaration lel les variables
$firstname = "";
$lastname = "";
$email    = "";
$libprod    = "";
$sujet    = "";
$password    = "";
$id=0;
$errors = array(); 

// connecttion lel base de donne
$db = mysqli_connect('localhost', 'root', '', 'site');

// ki yo9res 3la registre
if (isset($_POST['reg_user'])) {
  // nejbed les info ml form
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $libprod = mysqli_real_escape_string($db, $_POST['libprod']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $sujet   = mysqli_real_escape_string($db, $_POST['sujet']);
  
  $password    = mysqli_real_escape_string($db, $_POST['password']);




  // inscription
  if (count($errors) == 0) {
  	$password = md5($password);
//insert fi base de donne 3la ases utilisateur jdid
  	$query = "INSERT INTO reclamation (first_name, last_name , email,password ,libprod, sujet  ) 
  			  VALUES('$firstname','$lastname', '$email','$password','$libprod','$sujet')";
    mysqli_query($db, $query);


  	$_SESSION['username'] = $firstname;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: indexfont.html');
  }
 
}

