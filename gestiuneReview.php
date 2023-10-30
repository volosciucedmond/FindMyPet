<!doctype html>
<html class="no-js" lang="en">
<?php
session_start();
include('header.php');
include('../DAWM/function/myfunctions.php');
// include('../DAWM/middleware/adminMiddleware.php');
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
                <h2 style="text-align:center ;">Gestiune review-uri</h2>
            </div>
            <div class="cell small-4"></div>
            <hr>
        </div>
        <div class="grid-x grid-padding-x">
            <div class="large cell">
                <div class="callout" id="review_table">

                    <table>
                        <div class="grid-x grid-padding-x"></div>
                        <thead>
                            <tr>

                                <th style="text-align:center ;">NUME</th>

                                <th style="text-align:center ;">MESAJ</th>
                                <th style="text-align:center ;"> ACȚIUNI </th>
                            </tr>
                        </thead>
                </div>
                <div class="grid-x grid-padding-x">
                    <tbody>
                        <?php
                        if (isset($_SESSION['auth']) && $_SESSION['role_as'] == 1) {
                            $products = getAll("review");
                            if (mysqli_num_rows($products) > 0) {
                                foreach ($products as $item) {
                        ?> <tr>

                                        <td style="text-align:center ;"><?= $item['nume'] ?></td>
                                        <td style="text-align:center ;"><?= $item['mesaj'] ?></td>

                                        <!-- <td style="text-align:center ;"><a href="editReview.php?id=<?= $item['id'] ?>" class="button">EDITARE</a> -->
                                        <td style="text-align:center ;">
                                            <button type="button" class="alert button deleteReviewButton" value="<?= $item['id']; ?>">Șterge</button>


                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "Nu există review-uri!";
                            }
                        } else if ($_SESSION['role_as'] == 0) {
                            function getIDActive($table, $id)
                            {
                                global $con;
                                $query = "SELECT * FROM $table where id='$id' ";
                                return $query_run = mysqli_query($con, $query);
                            }
                            function getProdByID($table, $id)
                            {
                                global $con;
                                $query = "SELECT * FROM $table where added_by_ID='$id' ";
                                return $query_run = mysqli_query($con, $query);
                            }
                            $id_current = $_SESSION['id'];
                            $category = getIDActive("users", $id_current);
                            if (mysqli_num_rows($category) > 0) {
                                foreach ($category as $item) {
                                    $products = getProdByID("review", $id_current);
                                    if (mysqli_num_rows($products) > 0) {
                                        foreach ($products as $item) {
                                    ?>
                                            <tr>

                                                <td><?= $item['nume'] ?></td>
                                                <td><?= $item['mesaj'] ?></td>
                                                <!-- <td><?= $item['rating'] ?></td> -->
                                                <td><a href="editMyReview.php?id=<?= $item['id'] ?>" class="button">EDITARE</a>

                                                    <button type="button" class="alert button deleteReviewButton" value="<?= $item['id']; ?>">Șterge</button>


                                                </td>
                                            </tr>
                        <?php
                                        }
                                    }
                                }
                            }
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