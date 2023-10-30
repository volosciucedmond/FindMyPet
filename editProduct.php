<!doctype html>
<html class="no-js" lang="en">
<?php
session_start();
include('header.php');
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
</head>

<body>


    <?php

    include('navbar.php');

    ?>

<div class="grid-x grid-padding-x">
        <div class="cell small-4"> <a href="animale.php" class="button">Înapoi</a> </div>
        <div class="cell small-4">
            <h2 style="text-align:center ;">Editează animalul</h2>
        </div>
        <div class="cell small-4"></div>
        <hr>
    </div>
        <form action="code.php" method="POST" enctype="multipart/form-data">
            <div class="grid-container">
                <div class="grid">
                    <?php
                    if (isset($_GET['id'])) {

                        $id = $_GET['id'];

                        $product = getByID("products", $id);

                        if (mysqli_num_rows($product) > 0) {
                            $data = mysqli_fetch_array($product);
                    ?>
                            <div class="row">
                                <div class="cell auto">
                                    <label for="">Produs</label>
                                    <select name="category_id" class="form-select mb-2">
                                        <option selected> Editează produs </option>


                                        <?php
                                        // $id_current = $_SESSION['id'];
                                        // $category = getIDActive("users", $id_current);
                                        $categories = getAll("categories");

                                        if (mysqli_num_rows($categories) > 0) {

                                            foreach ($categories as $item) {
                                        ?> <option value="<?= $item['id']; ?>" <?= $data['category_id'] == $item['id']?'selected':''?> ><?= $item['nume'] ?> </option> <?php
                                            }
                                        } else {
                                            echo "Nu a fost găsită nicio categorie.";
                                        } ?>
                                    </select>

                                </div>
                                <div class="cell auto">
                                    <input type="hidden" name="product_id" value = "<?= $data['id'] ?>" >
                                    <label for="">Nume</label>
                                    <input type="text" name="nume" value = "<?= $data['nume'] ?>" class="form-control" placeholder="Introdu numele animalului">
                                </div>
                                <div class="cell auto">
                                    <label for="">Descreiere</label>
                                    <textarea rows="3" name="descriere" class="form-control" placeholder="Introdu descrierea"> <?= $data['descriere'] ?> </textarea>
                                </div>
                                <div class="cell auto">
                                    <label for="">Vârstă</label>
                                    <input type="number" name="varsta" value = "<?= $data['varsta'] ?>" class="form-control" placeholder="introdu vârsta">
                                </div>
                                
                                <div class="cell auto"> <button type="submit" class="button" name="updateProductButton"> Modifică </div>
                            </div>
                    <?php
                        } else {
                            echo "Animalul nu a putut fi găsit!";
                        }
                    } else {
                        echo "ID-ul nu a putut fi găsit!";
                    }
                    ?>
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