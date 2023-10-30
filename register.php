<?php 
session_start();
if(isset($_SESSION['auth'])) {
    $_SESSION['message'] = "Ești deja autentificat!";
    header('Location: dashboardu.php');
    exit();
}
include('header.php');
include('navbar.php') ?>
<script>
function check_email() {
dotpos=document.formular.email.value.lastIndexOf(".");
  atpos=document.formular.email.value.indexOf("@");
  if (atpos<1 ||dotpos-atpos<2) {
	alert ('Adresa de email este invalidă!');
   	return false;}
}

</script>

<div class="grid-x grid-padding-x">
        <div class="cell small-4"> <a href="dashboard.php" class="button">Înapoi</a> </div>
        <div class="cell small-4">
            <h2 style="text-align:center ;">Înregistrare</h2>
        </div>
        <div class="cell small-4"></div>
        <hr>
    </div>
<!-- <div class="py-5"> -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if(isset($_SESSION['message'])) { ?>
            <div class="callout alert" data-closable>
                <strong>Atenție!</strong> <?= $_SESSION['message'];?>
                <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> <?php } unset($_SESSION['message']); ?>
                <!-- <div class="card-body"> -->
                <form action="../DAWM/function/authcode.php" method="POST" onsubmit="return check_email(this);" name="formular">
                    <div class="grid-container">
                        <div class="grid">
                            <div class="medium-6 cell">
                                <label>Nume
                                    <input type="text" name="name" placeholder="Introdu numele">
                                </label>
                            </div>
                            <div class="medium-6 cell">
                                <label>Telefon
                                    <input type="number" name="phone" placeholder="Introdu numărul de telefon">
                                </label>
                            </div>
                            <div class="medium-6 cell">
                                <label>Email
                                    <input type="text" name="email" placeholder="Introdu email">
                                </label>
                            </div>
                            <div class="medium-6 cell">
                                <label>Parola
                                    <input type="password" name="password" placeholder="Introdu parola">
                                </label>
                            </div>
                            <div class="medium-6 cell">
                                <label>Confirmă parola
                                    <input type="password" name="cpassword" placeholder="Confirmă parola">
                                </label>
                            </div>
                            <button type="submit" name="register_btn" class="button"> Înregistrare </button>
                        </div>
                    </div>
                </form>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
<!-- </div> -->






<?php include('footer.php') ?>