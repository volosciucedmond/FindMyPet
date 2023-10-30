<?php
include('../DAWM/function/myfunctions.php');
if (isset($_SESSION['auth'])) {
    if($_SESSION['role_as'] == 0) {
        redirect("../DAWM/dashboardu.php", "Nu poți accesa acestă pagină!");
    }
} else {
    redirect("../DAWM/login1.php", "Autentifică-te ca să continui!");
    
}
