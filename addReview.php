<!doctype html>
<html class="no-js" lang="en">
<?php
session_start();
// include('header.php');
include('../DAWM/function/myfunctions.php');
// include('../DAWM/middleware/adminMiddleware.php');
?>

<head>
    <!-- alertify -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Find my pet </title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <script> function check_rating() {
        ratingV=document.formular.rating.value;
        // mesajV=document.formular.mesaj.value
        //   atpos=document.formular.email.value.indexOf("@");
          if (ratingV < 1 || ratingV > 5) {
            alert ('Rating invalid!');
               return false;}
        }
    </script>
    <script>
        function check_email() {
            dotpos = document.formular.email.value.lastIndexOf(".");
            atpos = document.formular.email.value.indexOf("@");
            if (atpos < 1 || dotpos - atpos < 2) {
                alert('Adresa de email este invalidă!');
                return false;
            }
        }
    </script>
</head>

<body>


    <?php

    include('navbar.php');
    
    ?>

<div class="grid-x grid-padding-x">
        <div class="cell small-4"> <a href="dashboard.php" class="button">Înapoi</a> </div>
        <div class="cell small-4">
            <h2 style="text-align:center ;">Adaugă review</h2>
        </div>
        <div class="cell small-4"></div>
        <hr>
    </div>

    
        <form action="code.php" method="POST" enctype="multipart/form-data" name="formular" onsubmit="return check_email(this) && check_rating(this)">
            <div class="grid-container">
                <div class="grid">
                    
                    
                        <div class="cell auto">
                            

                        </div>
                        <div class="cell auto">
                            <label for="">Nume</label>
                            <input type="text" name="nume" class="form-control" placeholder="Introdu numele tău">
                        </div>
                        <div class="cell auto">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Introdu adresa ta de email">
                        </div>
                        <div class="cell auto">
                            <label for="">Mesaj</label>
                            <textarea rows="3" name="mesaj" class="form-control" placeholder="Introdu mesajul"> </textarea>
                        </div>
                        <div class="cell auto">
                            <label for="">Rating (1 - 5)</label>
                            <input type="number" name="rating" class="form-control" placeholder="Introdu rating-ul">
                        </div>
                        <div class="cell auto"> <button type="submit" class="button" name="addReviewButton"> Trimite </div>
                    </div>
                </div>
            </div>
        </form>
    </div>



    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>

    <!-- alertify  -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        <?php if (isset($_SESSION['message'])) { ?>
            alertify.set('notifier', 'position', 'top-right');
            alertify.success('Adăugare comepletă!');
        <?php
            unset($_SESSION['message']);
        }

        ?>
    </script>

</body>

</html>


<?php include 'footer.php'; ?>