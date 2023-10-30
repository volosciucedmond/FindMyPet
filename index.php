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


    <?php
    session_start();
    include('navbar.php');
    ?>
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
                        <h4 style="text-align:center ;">Ia legătura cu noi!</h4>
                    </div>
                    <a href="contactForm.php"><img src="../DAWM/images/phoneicon2.png"> </a>
                    <div class="card-section">
                        <h5 style="text-align:center ;">Aici poți să ne contactezi prin intermediul unui formular</h5>
                        <p style="text-align:center ;"><a class="button" href="category.php">Contact</a></p>
                    </div>
                </div>
            </div>
            <div class="cell">
                <div class="card">
                    <div class="card-divider">
                        <h4 style="text-align:center ;">Crează cont</h4>
                    </div>
                    <a href="register.php"><img src="../DAWM/images/signupIcon.jpg"> </a>
                    <div class="card-section">
                        <h5 style="text-align:center ;">Crează cont pentru a putea încărc un animal pe care dorești să îl donezi!</h5>
                        <p style="text-align:center ;"><a class="button" href="register.php">Creare cont</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="grid-x grid-padding-x">

        <div class="cell large-6">
            <a href="categories.php" class="button expanded">Spre pagina de adopții</a>
        </div>
        <div class="cell auto">
            <a href="adaugaAnimal.php" class="button expanded">Adaugă un animal </a>

        </div>
    </div>


    </div>



    <hr>

    <div class="grid-x grid-padding-x">
        <div class="cell">
            <div class="callout primary">
                <h3 style="text-align: center;">Dacă dorești să adopți un animal, te rog contactează-ne!</h3>
            </div>
        </div>
        <div class="cell" style="text-align:center ;">
            <h2>Nu poți adopta un animal, dar dorești să ne ajuți? Apasă butonul de mai jos!</h2>
        </div>
    </div>


    <hr>

    <div class="grid-x grid-padding-x">


        <div class="cell auto">
            <a href="contactForm.php" class="button expanded">Contact</a>


        </div>
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