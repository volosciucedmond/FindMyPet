<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title...</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
  <body>
 <?php
 require_once("connection.php");
  // echo basename($_SERVER['PHP_SELF']);
 $page=basename($_SERVER['PHP_SELF']);

 $IdUser=$_SESSION["user_id"];

 
 $querry="SELECT pagini.nume_meniu, pagini.pagina FROM pagini INNER JOIN drepturi ON drepturi.IdPage=pagini.Id WHERE drepturi.IdUser='$IdUser'";

 $sql1 = mysqli_query($db,$querry);


$rows= mysqli_num_rows($sql1);



            if ($rows > 0) {
				echo "<ul>";

 /* <li><a href="news.asp">News</a></li>*/


            while ($myrow=mysqli_fetch_array($sql1,MYSQLI_ASSOC))
            {
            	echo "<li><a href='".$myrow["pagina"]."'>".$myrow["nume_meniu"]."</a></li>";
            	
            }
            	echo "</ul>";
            }

  ?>

        
        