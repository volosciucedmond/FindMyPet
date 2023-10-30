<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find my pet | Contact</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
</head>


<body>


    <?php
    session_start();
    include('navbar.php');
    ?>





    <div class="grid-x grid-padding-x">
        <?php if (isset($_SESSION['auth']) && $_SESSION['role_as'] == 0) { ?>
            <div class="cell small-4"> <a href="dashboardu.php" class="button">Înapoi</a> </div>
        <?php } else if (!isset($_SESSION['auth'])) {  ?>
            <div class="cell small-4"> <a href="index.php" class="button">Înapoi</a> </div>
        <?php } ?>
        <div class="cell small-4">
            <h2 style="text-align:center ;">Contact</h2>
        </div>
        <div class="cell small-4"></div>
        <hr>
    </div>
    <div class="row column text-center">
        <p>Ai găsit un animal de companie pe care îl consideri perfect pentru tine?</p>
        <p>Te rugăm să completezi formularul de mai jos, iar noi te vom contacta în cel mai scurt timp posibil!</p>

    </div>
    <hr>

    <form method="post" action="code.php">
        <div class="grid-container">
            <div class="grid">
                <div class="medium-6 cell">
                    <label>Nume
                        <input type="text" name="name" placeholder="Introdu numele">
                    </label>
                </div>
                <div class="medium-6 cell">
                    <label>Prenume
                        <input type="text" name="prenume" placeholder="Introdu prenumele">
                    </label>
                </div>
                <div class="medium-6 cell">
                    <label>Număr telefon
                        <input type="text" name="telefon" placeholder="Introdu numărul de telefon">
                    </label>
                </div>
                <div class="medium-6 cell">
                    <label>Adresă email
                        <input type="text" name="email" placeholder="Introdu adresa de email">
                    </label>
                </div>
                <div class="medium-6 cell">
                    <label>
                        Mesaj (dacă ai găsit un animal potrivit pentru tine,  te rog să menționez numele animalului și persoana de contact)
                        <textarea rows="5" name="descriere"></textarea placeholder="Care este mesajul?">
                        </div>
                        </label>
                    </div>
                    <div class="cell auto"> <button type="submit" class="button" name="addMessageButton"> Trimite </div>

                </div>
        </div>
        </form>
    </div>
    </div>
    <hr>

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>

</html>