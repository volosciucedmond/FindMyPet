<!doctype html>
<html class="no-js" lang="en">
<?php
session_start();
include('header.php');
include('../DAWM/middleware/userMiddleware.php');
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
    <script>
        function check_email() {
            dotpos = document.formular.email.value.lastIndexOf(".");
            atpos = document.formular.email.value.indexOf("@");
            if (atpos < 1 || dotpos - atpos < 2) {
                alert('Adresa de email este invalidă!');
                return false;
            }
        }
    </script>
</head>

<body>


    <?php

    include('navbar.php');
    function getIDActive($table, $id)
    {
        global $con;
        $query = "SELECT * FROM $table where id='$id' ";
        return $query_run = mysqli_query($con, $query);
    }
    ?>
   
    <div class="grid-x grid-padding-x">
        <div class="cell small-4"> <a href="dashboard.php" class="button">Înapoi</a> </div>
        <div class="cell small-4">
            <h2 style="text-align:center ;">Editează user</h2>
        </div>
        <div class="cell small-4"></div>
        <hr>
    </div>

    
        <form action="code.php" method="POST" enctype="multipart/form-data" onsubmit="return check_email(this);" name="formular">
            <div class="grid-container">
                <div class="grid">
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_SESSION['id'];
                        $category = getIDActive("users", $id);
                        if (mysqli_num_rows($category) > 0) {
                            $data = mysqli_fetch_array($category);
                    ?>
                        
                            
                            <!-- <form action="" method="POST" >  -->
                                
                                        <div class="cell auto">
                                            <label>Nume
                                                <input type="hidden" name="user_id" value="<?= $data['id'] ?>">
                                                <input type="text" name="name" value="<?= $data['name'] ?>" placeholder="Introdu numele">
                                            </label>
                                        </div>
                                        <div class="cell auto">
                                            <label>Telefon
                                                <!-- <input type="hidden" name="user_phone" value="<?= $data['id'] ?>"> -->
                                                <input type="number" name="phone" value="<?= $data['phone'] ?>" placeholder="Introdu numărul de telefon">
                                            </label>
                                        </div>
                                        <div class="cell auto">
                                            <label>Email
                                                <!-- <input type="hidden" name="user_email" value="<?= $data['id'] ?>"> -->
                                                <input type="text" name="email" value="<?= $data['email'] ?>" placeholder="Introdu email">
                                                
                                                
                                            </label>
                                        </div>
                                        <div class="cell auto">
                                            <label> Parola
                                                <!-- <input type="hidden" name="user_password" value="<?= $data['id'] ?>"> -->
                                                <input type="text" name="password" value="<?= $data['password'] ?>">
                                                <!-- <p>Introdu parola veche sau modific-o!</p>  -->
                                            </label>
                                        </div>
                                        <!-- 
                            <div class="medium-6 cell">
                                <label>Confirmă parola
                                    <input type="password" name="cpassword" placeholder="Confirmă parola">
                                </label>
                            </div> -->
                                        <button type="submit" name="updateUserButton" class="button"> Modifică </button>
                                    </div>
                                </div>
                        <!-- </form>  -->

                            </div>
                    <?php
                        } else {
                            echo "Nu puteți modifica acest user!";
                        }
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
                alertify.success('Editare completă');
            <?php
                unset($_SESSION['message']);
            }

            ?>
        </script>

</body>

</html>


<?php include 'footer.php'; ?>