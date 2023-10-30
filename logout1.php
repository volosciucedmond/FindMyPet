<?php
session_start();
    if(isset($_SESSION['auth'])) {
        unset($_SESSION['auth']);
        unset($_SESSION['auth_user']);
        $_SESSION['message'] = "Delogare cu succes";
    }
    header('Location: index.php');
?>