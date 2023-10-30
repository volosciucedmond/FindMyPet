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

    </div>
    <div class="row column text-center">
        <h2>Editează user</h2>
        <hr>
        <!-- <img src="images/dog-and-cat.jpg"> -->
    </div>

    <div class="container">
        <form action="code.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <?php 
                        if(isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $category = getByID("users", $id);
                            if(mysqli_num_rows($category) > 0) {
                                $data = mysqli_fetch_array($category);
                    ?>

                    <div class="row">
                        
                    <div class="grid-container">
                        <div class="grid-x grid-padding-x">
                            <div class="medium-6 cell">
                                <label>Nume
                                    <input type="hidden" name="user_id" value = "<?= $data['id'] ?>">
                                    <input type="text" name="name" value = "<?= $data['name'] ?>"placeholder="Introdu numele">
                                </label>
                            </div>
                            <!-- <div class="medium-6 cell">
                                <label>Telefon
                                    <input type="number" name="phone" value = "<?= $data['phone'] ?>" placeholder="Introdu numărul de telefon">
                                </label>
                            </div>
                            <div class="medium-6 cell">
                                <label>Email
                                    <input type="text" name="email" value = "<?= $data['email'] ?>" placeholder="Introdu email">
                                </label>
                            </div> -->
                            <!-- <div class="medium-6 cell">
                                <label>Parola
                                    <input type="password" name="password" placeholder="Introdu parola">
                                </label>
                            </div>
                            <div class="medium-6 cell">
                                <label>Confirmă parola
                                    <input type="password" name="cpassword" placeholder="Confirmă parola">
                                </label>
                            </div> -->
                            <button type="submit" name="updateUserButton" class="button"> Modifică </button>
                            <div class="col-md-12"> <a href = "gestiune.php" class = "button" >Înapoi</a></div>  
                        </div>
                    </div>
                        
                    </div>
                        <?php
                        } else {
                            echo "Categoria nu a fost găsită!";
                        } }
                        ?>
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
                alertify.success('Editare completă!');
            <?php
                unset($_SESSION['message']);
            }

            ?>
        </script>
        
</body>

</html>


<?php include 'footer.php'; ?>