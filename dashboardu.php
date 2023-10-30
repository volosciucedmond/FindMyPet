<?php session_start();
include("../DAWM/middleware/userMiddleware.php");
include('header.php') ?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Find my pet </title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
</head>

<body>


    <?php include('navbar.php') ?>
    <div class="row column text-center">
        <h2>Bun venit pe Find my pet!</h2>
        <hr>
        <img src="images/dog-and-cat.jpg">
    </div>
    <hr>
    <div class="row column text-center">
        <p style="text-align: center;">Acest website este dedicat persoanelor care sunt în căutarea unui animal de companie</p>
    </div>
    <hr>
    <div class="grid-container">
        <div class="grid-x grid-margin-x small-up-3 medium-up-3">
            <div class="cell">
                <div class="card">
                    <div class="card-divider">
                        <h4 style="text-align:center ;">Spre pagina cu adopții</h4>
                    </div>
                    <a href="categories.php"><img src="../DAWM/images/categoryIcon2.png"> </a>
                    <div class="card-section">
                        <h5 style="text-align:center ;">Aici poți vedea animalele în funcție de categorie</h5>
                        <p style="text-align:center ;"><a class="button" href="categories.php">Adopții</a></p>
                    </div>
                </div>
            </div>
            <div class="cell">
                <div class="card">
                    <div class="card-divider">
                        <h4 style="text-align:center ;">Adaugă un animal</h4>
                    </div>
                    <a href="adaugaAnimal.php"><img src="../DAWM/images/addAnimal.webp"> </a>
                    <div class="card-section">
                        <h5 style="text-align:center ;">Aici poți să adaugi un animal pe care dorești să îl donezi</h5>
                        <p style="text-align:center ;"><a class="button" href="adaugaAnimal.php">Adaugă animal</a></p>
                    </div>
                </div>
            </div>
            <div class="cell">
                <div class="card">
                    <div class="card-divider">
                        <h4 style="text-align:center ;">Adaugă review</h4>
                    </div>
                    <a href="addReview.php"><img src="../DAWM/images/addReview.webp"> </a>
                    <div class="card-section">
                        <h5 style="text-align:center ;">Ești mulțumit de aplicația noastra? Ajuta-ne lăsând un review!</h5>
                        <p style="text-align:center ;"><a class="button" href="addReview.php">Adaugă review</a></p>
                    </div>
                </div>
            </div>
        </div>
    <hr>
    

    <div class="row column">
        <div class="callout primary">
            <h3 style="text-align: center;">Dacă dorești să adopți un animal, te rog contactează-ne!</h3>
        </div>
    </div>

    <hr>

    <div class="row column text-center">
        <h2>Nu poți adopta un animal, dar dorești să ne ajuți? Apasă butonul de mai jos!</h2>
        <hr>
    </div>

    <div class="row small-up-2 large-up-2">

        <a href="contactForm.php" class="button expanded">Contact</a>


    </div>



    <hr>
    <div class="row column text-center">
        <p>Pentru mai multe informații puteți să ne scrieți și un mesaj pe</p>
        <p>Whatsapp: 0732123456</p>
        <p>Email: findmypet@gmail.com</p>
        <hr>
    </div>





    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>

</html>

<? //php

// require_once("connection.php");

// if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {

//     redirect("index.php");
// }

// include 'headerlogged.php';

?>



<?php include 'footer.php'; ?>