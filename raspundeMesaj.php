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
        <h2>Răspunde la mesaj</h2>
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
                            $category = getByID("contact", $id);
                            if(mysqli_num_rows($category) > 0) {
                                $data = mysqli_fetch_array($category);
                    ?>

                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="messages_id" value = "<?=$data['id'] ?>">
                            <label for="">Nume</label>
                            <input type="text" name="nume" value = "<?=$data['name'] ?>" class="form-control" placeholder="Introdu numele categoriei">
                        </div>
                        <div class="col-md-6">
                            <input type="hidden" name="messages_id" value = "<?=$data['id'] ?>">
                            <label for="">Prenume</label>
                            <input type="text" name="nume" value = "<?=$data['prenume'] ?>" class="form-control" placeholder="Introdu numele categoriei">
                        </div>
                        <div class="col-md-6">
                            <label for="">Descreiere</label>
                            <textarea rows="3" name="descriere" <?=$data['descriere'] ?> class="form-control" placeholder="Introdu descrierea"> </textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="">Imagine</label>
                            <input type="file" name="image" class="form-control" placeholder="Introdu descrierea">
                            <label for="">Imagine curentă</label>
                            <input type="hidden" name="old_image" value ="<?= $data['image'] ?>">
                            <img src="../DAWM/uploads/ <?= $data['image'] ?>" height="50px" width="50px">
                        </div>
                        <div class="col-md-12"> <button type="submit" class="button" name="editCategoryButton"> Editare</div>
                    
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
                alertify.success('Adăugare comepletă!');
            <?php
                unset($_SESSION['message']);
            }

            ?>
        </script>
        
</body>

</html>


<?php include 'footer.php'; ?>