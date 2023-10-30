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
    <script> function check_rating() {
        ratingV=document.formular.rating.value;
        // mesajV=document.formular.mesaj.value
        //   atpos=document.formular.email.value.indexOf("@");
          if (ratingV < 1 || ratingV > 5) {
            alert ('Rating invalid!');
               return false;}
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
        <div class="cell small-4"> <a href="gestiuneReview.php" class="button">Înapoi</a> </div>
        <div class="cell small-4">
            <h2 style="text-align:center ;">Adaugă review</h2>
        </div>
        <div class="cell small-4"></div>
        <hr>
    </div>

   
        <form action="code.php" method="POST" enctype="multipart/form-data" onsubmit="return check_email(this);" name="formular">
            <div class="grid-container">
                <div class="grid">
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $category = getIDActive("review", $id);
                        if (mysqli_num_rows($category) > 0) {
                            $data = mysqli_fetch_array($category);
                    ?>
                        
                            
                             <!-- <form action="" method="POST" onsubmit="return check_rating(this);" name = "formula">   -->
                             
                             
                             
                             
                                    
                                    
                                        <div class="cell auto">
                                            <label>Nume
                                                <input type="hidden" name="user_id" value="<?= $data['id'] ?>">
                                                <input type="text" name="nume" value="<?= $data['nume'] ?>" >
                                            </label>
                                        </div>
                                        <div class="cell auto">
                                        <label for="">Mesaj</label>
                                            <textarea rows="3" name="mesaj" class="form-control"  placeholder="Introdu mesajul"> <?= $data['mesaj'] ?> </textarea>
                    
                                        </div>
                                        <div class="cell auto">
                                            <label>Rating
                                                <!-- <input type="hidden" name="user_email" value="<?= $data['id'] ?>"> -->
                                                
                                                <label for="">Rating (1 - 5)</label>
                                                <input type="number" name="rating" class="form-control" value = "<?= $data['rating']?>" placeholder="Introdu rating-ul">
                        
                                                
                                            </label>
                                        </div>
                                        
                                        <!-- 
                            <div class="cell auto">
                                <label>Confirmă parola
                                    <input type="password" name="cpassword" placeholder="Confirmă parola">
                                </label>
                            </div> -->
                                        <button type="submit" name="updateReviewButton" class="button"> Modifică </button>
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