<?php

if(isset($_POST["message"])){
//   print_r($_POST["message"]); 
//   echo $_SESSION['admin']; 
  $user_online = read($_SESSION['admin']);
//   var_dump($user_online["id"] );

  insert_msg($_POST["message"],$user_online["id"]);
  
}
