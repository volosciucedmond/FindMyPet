<!doctype html>
<html class="no-js" lang="en">
<?php
session_start();
include('header.php');
// include("../DAWM/function/userFunction.php");

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

    </div>
    <?php
    if (isset($_SESSION['auth']) && $_SESSION['role_as'] == 1) {
        include('../DAWM/middleware/adminMiddleware.php');
    ?>


        <div class="container">
            <div class="grid-x grid-padding-x">
            <div class="cell small-4"> <a href="dashboard.php" class="button">Înapoi</a> </div>
                
                <div class="cell small-4">
                    <h2 style="text-align:center ;">Gestiune utilizatori</h2>
                </div>
                <div class="cell small-4"></div>
                <hr>
            </div>
            <div class="grid-x grid-padding-x">
                <div class="large cell">

                    <div class="callout" id="user_table">
                        <table>
                        <div class="grid-x grid-padding-x">
                            <thead>
                                <tr>
                                    <th style="text-align:center ;">NUME</th>
                                    <th style="text-align:center ;">EMAIL</th>
                                    <th style="text-align:center ;">TELEFON</th>

                                    <th style="text-align:center ;">ACȚIUNI</th>
                                </tr>
                            </thead>
                        </div>
                        <div class="grid-x grid-padding-x">
                            <tbody>
                                <?php
                                $category = getAll("users");
                                if (mysqli_num_rows($category) > 0) {
                                    foreach ($category as $item) {
                                ?> <tr>

                                            <td style="text-align:center ;"><?= $item['name'] ?></td>
                                            <td style="text-align:center ;"><?= $item['email'] ?></td>
                                            <td style="text-align:center ;"><?= $item['phone'] ?></td>

                                            <td style="text-align:center ;"><a href="editUser.php?id=<?= $item['id'] ?>" class="button">EDITARE</a>
                                                <button type="button" class="alert button deleteUserButton" value="<?= $item['id']; ?>">Șterge</button>
                                            </td>


                                        </tr> <?php
                                            }
                                        } else {
                                            echo "Nu există utilizatori!";
                                        }
                                                ?>


                            </tbody>
                        </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } else if (isset($_SESSION['auth']) && $_SESSION['role_as'] == 0) {
        // include('../DAWM/function/myfunctions.php');
        include('../DAWM/function/userFunction.php')
    ?>
        
            <div class="container">
            <div class="grid-x grid-padding-x">
            <div class="cell small-4"> <a href="dashboard.php" class="button">Înapoi</a> </div>
                
                <div class="cell small-4">
                    <h2 style="text-align:center ;">Gestiune utilizatori</h2>
                </div>
                <div class="cell small-4"></div>
                <hr>
            </div>
                <div class="grid-x grid-padding-x">
                
                    <div class="large cell">
                        <div class="callout">
                        <table>
                            <div class="grid">
                            <thead>
                                <tr>
                                    <th style="text-align:center ;">NUME</th>
                                    <th style="text-align:center ;">EMAIL</th>
                                    <th style="text-align:center ;">TELEFON</th>
                                    <TH></TH>
                                    <th style="text-align:center ;">ACȚIUNI</th>
                                    <!-- <th>TELEFON</th> -->
                                </tr>
                            </thead>
                            </div>
                            <div class="grid"></div>
                            <tbody>
                                <?php
                                $id_current = $_SESSION['id'];
                                $category = getIDActive("users", $id_current);
                                if (mysqli_num_rows($category) > 0) {
                                    foreach ($category as $item) {

                                ?> <tr>

                                            <td style="text-align:center ;"><?= $item['name'] ?></td>
                                            <td style="text-align:center ;"><?= $email = $item['email'] ?></td>
                                            <td style="text-align:center ;"><?= $item['phone'] ?></td>
                                            <td style="text-align:center ;">
                                                <form action="code.php" method="POST">
                                                    <?php { ?>
                                            <td style="text-align:center ;"><a href="editMyUser.php?id=<?= $item['id'] ?>" class="button">EDITARE</a>
                                                <input type="hidden" name="userG_id" value="<?= $item['id']; ?>">
                                                <!-- <button type="submit" class="alert button" name="deleteUserButton">Șterge</button> -->
                                            <?php } ?>
                                            </form>

                                            </td>
                                        </tr> <?php
                                            }
                                        } else {
                                            echo "Nu există utilizatori!";
                                        }
                                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>




    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>

</html>


<?php include 'footer.php'; ?>