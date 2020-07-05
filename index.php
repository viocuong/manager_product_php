<?php
    session_start();
    $GLOBALS['numcart']=0;
    $HOST='3.22.79.240';

    //$HOST='localhost';
    require_once './mvc/application.php';
    $a=new App();
?>
