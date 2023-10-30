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
    if (isset($_GET['product'])) {
        $product_name = $_GET['product'];

        $product_data = getIDActive('products', $product_name);
        $product = mysqli_fetch_array($product_data);
        // $id_user = $_SESSION['id'];
        
        // $catName = getCatName('categories', $product['category_id']);
       

        if ($product) { ?>
                <!-- <a href="products.php?category=<?= $catName; ?>" class="button">Înapoi</a> -->

            <div class="grid-y medium-grid-frame">
                <div class="cell shrink header medium-cell-block-container">
                    <h1 style="text-align:center ;"><?= $product['nume'] ?></h1> 
                    
                    
                    <div class="grid-x grid-padding-x">
                        <div class="cell medium-4">
                            
                            
                        </div>
                        
                        
                    </div>
                </div>
                <div class="cell medium-auto medium-cell-block-container">
                    <div class="grid-x grid-padding-x">
                        <div class="cell medium-4 medium-cell-block-y">
                        <img src="uploads/<?= $product['image']; ?>" alt="Product img" width="500" height="500">
                        </div>
                        <div class="cell medium-8 medium-cell-block-y">
                            <br> <br>
                            <h2>Descriere</h2> 
                            
                            <p><?= $product['descriere'] ?></p> 
                            <p>Vârsta: <?= $product['varsta'] ?> </p><br>
                            Persoana contact: <?= $product['added_by_NAME'] ?> <br>
                            Telefon: <?= $product['added_by_PHONE'] ?> <br>
                            Email: <?= $product['added_by_EMAIL'] ?> <br>
            <a href="contactForm.php" class="button">Adoptă acum</a>
                            
                        </div>
                    </div>
                </div>
                
                
            </div>
            
    <?php } else {
            echo "Produs negăsit!";
        }
    } else {
        echo "Ceva nu a mers bine!";
    }
    ?>
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
    

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>