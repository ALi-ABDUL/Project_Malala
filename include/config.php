<?php
//////////////////////////////////////////
//          ALi Abdul
//      Adelaide Australia
//  The Noob Coder :)   20-Feb-2016
//////////////////////////////////////////

try {
    
    $host       = 'localhost';
    $user       = 'USER';           // Username for PhpMyAdmin
    $pass       = 'PASS';            // Password for PhpMyAdmin
    $dbname     =  'malala';        // Database name
    
    $dbc = new PDO ("mysql:host=$host;dbname=$dbname",'root','ali');
}catch(PDOException $e){echo $e->getMessage();}

?>