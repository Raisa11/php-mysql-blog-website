<?php

ob_start();
session_start();
 include "admin/inc/db.php";

if (isset($_POST['slogin'])) {
	$email = $_POST['email'];
	$pass = $_POST['password'];

	$query = "SELECT * FROM subscriber WHERE email = '$email' AND password = '$pass'";
    $the_user = mysqli_query($db, $query);

    while ( $row = mysqli_fetch_array($the_user) ) {
      $_SESSION['id']       = $row['id'];
      $_SESSION['name']     = $row['name'];
     
      $_SESSION['email']    = $row['email'];
    
      $password             = $row['password'];
      

          
           

      if($email == $_SESSION['email'] && $pass==$password  ){
        header('Location: index.php');
      }
      // else if($email == $_SESSION['email'] || $hassedPass==$password ){
       else if($email != $_SESSION['email'] || $pass != $password ){
        header('Location: index.php');
      }
      else{
        header('Location: index.php');
      }
}
}
ob_end_flush();
?>