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



    <div class="container">
        <div class="grid-x grid-padding-x">
            <div class="cell small-4"> <a href="dashboard.php" class="button">Înapoi</a> </div>

            <div class="cell small-4">
                <h2 style="text-align:center ;">Gestiune categorii</h2>
            </div>
            <div class="cell small-4"></div>
            <hr>
        </div>
        <div class="grid-x grid-padding-x">
            <div class="large cell">
                <div class="callout" id="category_table">
                    <table>
                        <div class="grid-x grid-padding-x">
                            <thead>
                                <tr>
                                    <!-- <th>ID</th> -->
                                    <th style="text-align:center ;">NUME</th>
                                    <th style="text-align:center ;">DESCRIERE</th>
                                    <th style="text-align:center ;">IMAGINE</th>
                                    <th style="text-align:center ;"> ACȚIUNI </th>
                                </tr>
                            </thead>
                        </div>
                        <div class="grid-x grid-padding-x">
                            <tbody>
                                <?php
                                $category = getAll("categories");
                                if (mysqli_num_rows($category) > 0) {
                                    foreach ($category as $item) {
                                ?> <tr>
                                        <td style="text-align:center ;"><?= $item['nume'] ?></td>
                                        <td style="text-align:center ;"><?= $item['descriere'] ?></td>
                                        <td style="text-align:center ;"><img src="../DAWM/uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['nume']; ?>"></td>
                                        <td style="text-align:center ;"><a href="editCategory.php?id=<?= $item['id'] ?>" class="button">EDITARE</a>
                                            <button type="button" class="alert button deleteCategoryButton" value="<?= $item['id']; ?>">Șterge</button>
                                        </td>
                                        </tr> <?php
                                            }
                                        } else {
                                            echo "Nu există inregistrări!";
                                        }

                                                ?>

                            </tbody>
                        </div>
                    </table>
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