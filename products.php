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

    $category_name = $_GET['category'];
    $category_data = getNameActive('categories', $category_name);
    $category = mysqli_fetch_array($category_data);
    $cid = $category['id'];


    ?>
    
    <div class="grid-x grid-padding-x">
        <div class="cell small-4"> <a href="categories.php" class="button">Înapoi</a> </div>
        <div class="cell small-4">
            <h2 style="text-align:center ;"><?=$category['nume']?></h2>
        </div>
        <div class="cell small-4"></div>
        <hr>
    </div>
    <hr>
    <div class="grid-container">
        <div class="grid-x grid-margin-x grid-margin-y grid-padding-x grid-padding-y">
            <!-- <div class="medium-6 large-4 cell"> -->
            <?php
            $products = getProdByCategory($cid);
            if (mysqli_num_rows($products) > 0) {
                foreach ($products as $item) {
            ?>
                    <div class="card" style="width: 400px; ">
                        <div class="card-divider">
                        <a href="viewProduct.php?product=<?= $item['id']; ?>"> <h4 style="text-align:center ;"><?= $item['nume']; ?></h4> </a>
                            
                            <a href="viewProduct.php?product=<?= $item['id']; ?>"> 
                        </div>
                        <div class="card-section" style="text-align:center ;">
                            <div class="card-image">
                                <img class="" class="thumbnail" src="uploads/<?= $item['image']; ?>" alt="Product image">
                            </div>
                        </div>

                    </div>
                    
            <?php
                }
            } else {
                echo "Nu există animale!";
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