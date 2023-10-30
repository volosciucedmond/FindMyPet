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
    include('../DAWM/function/userFunction.php');
    include('navbar.php');

    


    ?>
    
    <div class="grid-x grid-padding-x">
    <?php if(isset($_SESSION['auth']) && $_SESSION['role_as'] == 0) { ?>
        <div class="cell small-4"> <a href="dashboardu.php" class="button">Înapoi</a> </div>
        <?php } else if(!isset($_SESSION['auth'])){  ?> 
            <div class="cell small-4"> <a href="index.php" class="button">Înapoi</a> </div>
            <?php } ?>
        <div class="cell small-4">
            <h2 style="text-align:center ;">Review-uri</h2>
        </div>
        <div class="cell small-4"></div>
        <hr>
    </div>
    <hr>
    <div class="grid-container">
        <div class="grid-x grid-margin-x grid-margin-y grid-padding-x grid-padding-y">
            <!-- <div class="medium-6 large-4 cell"> -->
            <?php
            $products = getAllActive('review');
            if (mysqli_num_rows($products) > 0) {
                foreach ($products as $item) {
            ?>
                    <div class="card" style="width: 400px; text-align:center">
                        <div class="card-divider" style="text-align:center ;">
                         <h4 style="text-align:center ;"><?= $item['nume']; ?></h4> 
                            
                        </div>
                        <div class="card-section" >
                            <h4 style="text-align:center ;"> Rating <?= $item['rating']?>/5 </h4>
                            <p><?= $item['mesaj']?></p>
                        </div>

                    </div>
                    
            <?php
                }
            } else {
                echo "Nu există review-uri!";
            }
            ?>
            <!-- </div> -->
        </div>
    </div>
    <hr>

    <div class="grid-x grid-padding-x">
        <div class="cell">
            <div class="callout primary">
                <h3 style="text-align: center;">Dacă dorești să adopți un animal, te rog contactează-ne!</h3>
            </div>
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
        <p>pentru mai multe informații puteți să ne scrieți și un mesaj pe</p>
        <p>Whatsapp: 0732123456</p>
        <p>email: findmypet@gmail.com</p>
        <hr>
    </div>





    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>

</html>