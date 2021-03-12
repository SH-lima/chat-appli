<?php

if(isset($_POST["message"])){
//   print_r($_POST["message"]); 
//   echo $_SESSION['admin']; 
  $user_online = read($_SESSION['admin']);
//   var_dump($user_online["id"] );
    $messageConvert = htmlspecialchars($_POST["message"], ENT_QUOTES);
  insert_msg($messageConvert,$user_online["id"]);
  
}
