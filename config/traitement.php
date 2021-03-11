<?php
require "fonction.php";

$array = read_messages();
 echo json_encode($array);

