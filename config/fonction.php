<?php

if(!function_exists("insert_msg")){
    function insert_msg($message, $id_user)
    {
        require "connection.php";
        $sql="INSERT INTO messages (content, id_user) VALUES (:msg, :userid) ";
        $new_msg=$connection->prepare($sql);
        $new_msg->bindvalue(':msg', $message, PDO::PARAM_STR);
        $new_msg->bindvalue(':userid', $id_user, PDO::PARAM_INT);
        $new_msg->execute();
    }
}

if(!function_exists("read_messages")){
    function read_messages()
    {
        require "connection.php";
        $sql= <<<SQL
        SELECT messages.*, users.username FROM messages 
        INNER JOIN users ON messages.id_user = users.id
        ORDER BY id
        SQL;
        $get_messages = $connection->prepare($sql);
        $get_messages->execute();
        $messages=$get_messages->fetchAll(PDO::FETCH_ASSOC);
        return $messages;
    }
}




























//---------------------------------------------------la partie connection/inscription 
if(!function_exists("create_table")){
 
    function create_table($connection):string
    {
        $new_table = $connection->prepare('CREATE TABLE users
        (
            id INT PRIMARY KEY AUTO_INCREMENT ,
            username VARCHAR(255) NOT NULL,
            pass_word VARCHAR(255) NOT NULL
        )');
        $done = $new_table->execute(); 
        if(!$done){
            echo "echec";
        }else{
            echo "done";
        }
}};   

if(!function_exists("insert_info")){
    function insert_info(string $newuser, string $newpassword):void
    {  
        require "connection.php";
        $pdoState = $connection->prepare('INSERT INTO users (username, pass_word) VALUES (:username, :pass)');
        $pdoState->bindvalue(':username', $newuser, PDO::PARAM_STR );
        $pdoState->bindvalue(':pass',  $newpassword, PDO::PARAM_STR );
        $executeDone = $pdoState->execute();
        if(!$executeDone){
            create_table($connection);
            $errer = "erreur"; 
        }  
    };    
}

if(!function_exists("is_connected")){
    function is_connected():bool
    {
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
        return !empty($_SESSION['admin']);
    }
}

if(!function_exists("read")){
    function read(string $login):array
    {
        require "connection.php";
        $sql='SELECT * FROM users WHERE username = :user';
        $get_user=$connection->prepare($sql);
        $get_user->bindvalue(':user', $login, PDO::PARAM_STR);
        $get_user->execute();
        $response = $get_user->fetch(PDO::FETCH_ASSOC);
        return $response;
    }
}
