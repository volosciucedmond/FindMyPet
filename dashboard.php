<!doctype html>
<html class="no-js" lang="en">
<?php
session_start();
include('header.php');
include('../DAWM/middleware/adminMiddleware.php');
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Find my pet </title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
</head>

<body>


    <?php

    include('navbar.php');

    ?>

    </div>
    <div class="row column text-center">
        <h2>Bun venit admin!</h2>
        <hr>
        <!-- <img src="images/dog-and-cat.jpg"> -->
    </div>

    <div class="grid-container">
        <div class="grid-x grid-margin-x small-up-3 medium-up-3">
            <div class="cell">
                <div class="card">
                    <div class="card-divider">
                        <h4 style="text-align:center ;">Adaugă categorie</h4>
                    </div>
                    <a href="adaugaCategorie.php"><img src="../DAWM/images/categoryIcon2.png"> </a>
                    <div class="card-section">
                        <h5 style="text-align:center ;">Aici poți adăuga o categorie nouă</h5>
                        <p style="text-align:center ;"><a class="button" href="adaugaCategorie.php">Adaugă categorie</a></p>
                    </div>
                </div>
            </div>
            <div class="cell">
                <div class="card">
                    <div class="card-divider">
                        <h4 style="text-align:center ;">Gestiune categorii</h4>
                    </div>
                    <a href="category.php"><img src="../DAWM/images/categoryIcon.jpg"> </a>
                    <div class="card-section">
                        <h5 style="text-align:center ;">Aici poți gestiona toate categoriile</h5>
                        <p style="text-align:center ;"><a class="button" href="category.php">Gestiune categorii</a></p>
                    </div>
                </div>
            </div>
            <div class="cell">
                <div class="card">
                    <div class="card-divider">
                        <h4 style="text-align:center ;">Gestiune animale</h4>
                    </div>
                    <a href="animale.php"><img src="../DAWM/images/animalMana.png"> </a>
                    <div class="card-section">
                        <h5 style="text-align:center ;">Aici poți gestiona toate animalele</h5>
                        <p style="text-align:center ;"><a class="button" href="animale.php">Gestiune animale</a></p>
                    </div>
                </div>
            </div>
        </div>
    
    <div class="grid-x grid-margin-x small-up-3 medium-up-3">
        <div class="cell">
            <div class="card">
                <div class="card-divider">
                    <h4 style="text-align:center ;">Gestiune mesaje</h4>
                </div>
                <a href="citesteMesaje.php"><img src="../DAWM/images/messagesManagement.webp"> </a>
                <div class="card-section">
                    <h5 style="text-align:center ;">Aici poți gestiona toate mesajele</h5>
                    <p style="text-align:center ;"><a class="button" href="citesteMesaje.php">Gestiune mesaje</a></p>
                </div>
            </div>
        </div>
        <div class="cell">
            <div class="card">
                <div class="card-divider">
                    <h4 style="text-align:center ;">Gestiune utilizatori</h4>
                </div>
                <a href="gestiune.php"><img src="../DAWM/images/userManagement.png"> </a>
                <div class="card-section">
                    <h5 style="text-align:center ;">Aici poți gestiona toți utilizatorii</h5>
                    <p style="text-align:center ;"><a class="button" href="gestiune.php">Gestiune utilizatori</a></p>
                </div>
            </div>
        </div>
        <div class="cell">
            <div class="card">
                <div class="card-divider">
                    <h4 style="text-align:center ;">Gestiune review-uri</h4>
                </div>
                <a href="gestiuneReview.php"><img src="../DAWM/images/reviewManagement.png"> </a>
                <div class="card-section">
                    <h5 style="text-align:center ;">Aici poți gestiona toate review-urile</h5>
                    <p style="text-align:center ;"><a class="button" href="gestiuneReview.php">Gestiune review-uri</a></p>
                </div>
            </div>
        </div>
    </div>
    </div>






    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>

</html>


<?php include 'footer.php'; ?>