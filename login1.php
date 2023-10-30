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
  if (atpos<1||dotpos-atpos<2) {
	alert ('Adresa de email este invalidă!');
   	return false;}
}

</script>

<div class="grid-x grid-padding-x">
<?php if(isset($_SESSION['auth']) && $_SESSION['role_as'] == 0) { ?>
        <div class="cell small-4"> <a href="dashboardu.php" class="button">Înapoi</a> </div>
        <?php } else if(!isset($_SESSION['auth'])){  ?> 
            <div class="cell small-4"> <a href="index.php" class="button">Înapoi</a> </div>
            <?php } ?>
        <div class="cell small-4">
            <h2 style="text-align:center ;">Autentificare</h2>
        </div>
        <div class="cell small-4"></div>
        <hr>
    </div>

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
                <form name="formular" action="../DAWM/function/authcode.php" method="POST" onsubmit="return check_email(this);">
                    <div class="grid-container">
                        <div class="grid">
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
                            
                            <button type="submit" name="login_btn" class="button"> Autentificare </button>
                            <div class = "medium-6 cell">
                                <p>Nu ai un cont? <a href="register.php">Apasă aici!</a>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>







<?php include('footer.php') ?>