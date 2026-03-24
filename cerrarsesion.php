<?php
    session_start();
    if (session_status() === PHP_SESSION_ACTIVE)
        $_SESSION = array();


    if (isset($_COOKIE[session_name()])) 
        setcookie(session_name(), '', time() - 3600, '/');
    
    session_destroy();

    header('location: inicio_sesion.html');
    exit();
?>