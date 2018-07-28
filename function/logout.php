<?php
    
    session_start();

    session_destroy();
    header("location: http://localhost/htdocs/new/login.php");
?>