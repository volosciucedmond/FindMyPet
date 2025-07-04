<?php
session_start();
include('../config/dbcon.php');


if (isset($_POST['register_btn'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    $check_email_query = "SELECT email FROM users WHERE email='$email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);
    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['message'] = "Adresa de email este deja înregistrată!";
        header('Location: ../register.php');
    } else {


        if ($password == $cpassword) {
            $insert_query = "INSERT INTO users(name, email, phone, password) VALUES ('$name', '$email', '$phone', '$password')";
            $insert_query_run = mysqli_query($con, $insert_query);

            if ($insert_query_run) {
                $_SESSION['message'] = "Înregistrare cu succes";
                header('Location: ../login1.php');
            } else {
                $_SESSION['message'] = "Înregistrare nereușită";
                header('Location: ../register.php');
            }
        } else {
            $_SESSION['message'] = "Parola nu corespunde";
            header('Location: ../register.php');
        }
    }
} else if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $username = $userdata['name'];
        $id = $userdata['id'];
        $phone = $userdata['phone'];
        $useremail = $userdata['email'];
        $role_as = $userdata['role_as'];
        $_SESSION['auth_user'] = [
            'name' => $username,
            'email' => $useremail
        ];
        $_SESSION['id'] = $id;
        $_SESSION['role_as'] = $role_as;
        $_SESSION['phone'] = $phone;
        // $_SESSION['email'] = $email;

        if ($role_as == 1) {
            $_SESSION['message'] = "Admin autentificat cu succes!";
            header('Location: ../dashboard.php');
        } else {
            $_SESSION['message'] = "Autentificare cu succes!";
            header('Location: ../dashboardu.php');
        }
    } else {
        $_SESSION['message'] = "Parola sau email-ul sunt incorecte sau nu există în baza de date!";
        header('Location: ../login1.php');
    }
}
