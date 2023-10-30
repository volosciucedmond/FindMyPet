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
                <h2 style="text-align:center ;">Gestiune mesaje</h2>
            </div>
            <div class="grid-x grid-padding-x"></div>
            <hr>
        </div>
        <div class="grid-x grid-padding-x">
            <div class="large cell">
                <div class="callout" id="message_table">
                    <table>
                        <div class="grid-x grid-padding-x">
                            <thead>

                                <tr>
                                    <th style="text-align:center ;">NUME</th>
                                    <th style="text-align:center ;">PRENUME</th>
                                    <th style="text-align:center ;">TELEFON</th>
                                    <th style="text-align:center ;">EMAIL</th>
                                    <th style="text-align:center ;"> MESAJ </th>
                                    <th style="text-align:center ;">ACȚIUNI</th>
                                </tr>
                            </thead>
                        </div>
                        <div class="grid-x grid-padding-x">
                            <tbody>
                                <?php
                                $category = getAll("contact");
                                if (mysqli_num_rows($category) > 0) {
                                    foreach ($category as $item) {
                                ?> <tr>

                                        <td style="text-align:center ;"><?= $item['name'] ?></td>
                                        <td style="text-align:center ;"><?= $item['prenume'] ?></td>
                                        <td style="text-align:center ;"><?= $item['telefon'] ?></td>
                                        <td style="text-align:center ;"><?= $item['email'] ?></td>
                                        <td style="text-align:center ;"><?= $item['descriere'] ?></td>
                                        <td style="text-align:center ;"><a href="https://mail.google.com/mail/u/0/#inbox?compose=new" class="button">Răspunde</a>
                                            <button type="button" class="alert button deleteMessageButton" value="<?= $item['id']; ?>">Șterge</button>    
                                        </td>
                                        </tr> <?php
                                            }
                                        } else {
                                            echo "Nu există mesaje!";
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