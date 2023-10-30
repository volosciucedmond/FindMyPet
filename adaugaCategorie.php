<!doctype html>
<html class="no-js" lang="en">
<?php
session_start();
include('header.php');
include('../DAWM/middleware/adminMiddleware.php');
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
</head>

<body>


    <?php

    include('navbar.php');

    ?>




    <div class="grid-x grid-padding-x">
        <div class="cell small-4"> <a href="dashboard.php" class="button">Înapoi</a> </div>
        <div class="cell small-4">
            <h2 style="text-align:center ;">Adaugă categorie</h2>
        </div>
        <div class="cell small-4"></div>
        <hr>
    </div>
    <form action="code.php" method="POST" enctype="multipart/form-data">
        <div class="grid-container">


            <div class="grid">
                <div class="cell small-4"></div>
                <div class="cell small-4">
                    <label for="">Nume categorie</label>
                    <input type="text" name="nume" class="form-control" placeholder="Introdu numele categoriei">
                </div>
                <div class="cell small-4"></div>
                <div class="cell small-4"></div>
                <div class="cell small-4">
                    <label for="">Descreiere</label>
                    <textarea rows="3" name="descriere" class="form-control" placeholder="Introdu descrierea"> </textarea>
                </div>
                <div class="cell small-4"></div>
                <div class="cell small-4"></div>
                <div class="cell small-4">
                    <label for="">Imagine</label>
                    <input type="file" name="image" class="form-control" placeholder="Introdu descrierea">
                </div>
                <div class="cell auto">
                    <button type="submit" class="button" name="add_category_btn"> Salvare </button>
                </div>
            </div>



        </div>
        
        
    </form>




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