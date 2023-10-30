<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find my pet | Vizualizati animalele</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
</head>


<body>


    <?php 
    session_start();
    include('navbar.php') ?>





    <div class="row column text-center">
        <h2>Vizualizare animale</h2>
        <hr>
        <img src="images/dog-and-cat.jpg">
    </div>
    
    
    <hr>
    <div class="row column text-center">  
    <?php

$db=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($db,"dawm");


$telefon = $name = $email = $scop = $categorie = $prenume = $descriere =  ""; //$npoza = "";

$start=0;
$limit=2;
$id=1;
if(isset($_GET['id']))
{
$id=$_GET['id'];
$start=($id-1)*$limit;
}

$sqlv="SELECT * FROM animale LIMIT $start, $limit"; 
$resultv= mysqli_query($db,$sqlv);
  

if (!$resultv)
 die('Invalid querry:' .mysqli_error($db));
 else 
 {

  echo "<table border=1 cellpadding=2>";
  echo "<tr>
  <td><b> Id </b></td>
  <td><b>Nume</b></td>
  <td><b>Prenume</b></td>
  <td><b>Telefon</b></td>
  <td><b>Email</b></td>
  <td><b>Scop</b></td>
  <td><b>Categorie</b></td>
  <td><b>Descriere</b></td>
  </tr>";
     while ($myrow=mysqli_fetch_array($resultv,MYSQLI_ASSOC))
     {echo "<tr><td>";
     echo $myrow["id"];
      echo "</td><td>";
      echo $myrow["name"];
      echo "</td><td>";
      echo $myrow["prenume"];
      echo "</td><td>";
      echo $myrow["telefon"];
      echo "</td><td>";
      echo $myrow["email"];
      echo "</td><td>";
      echo $myrow["scop"];
      echo "</td><td>";
      echo $myrow["categorie"];
      echo "</td><td>"; 
      echo $myrow["descriere"];
      echo "</td></tr>"; }
  echo "</table>";

$rows= mysqli_num_rows(mysqli_query($db,"SELECT * FROM animale"));
$total=ceil($rows/$limit);
if($id>1)
{
echo "<a href='?id=".($id-1)."' class='button'>PREVIOUS </a>";
}
if($id!=$total)
{
echo "<a href='?id=".($id+1)."' class='button'> NEXT</a>";
}

echo "<ul class='page'>";
for($i=1;$i<=$total;$i++)
{
if($i==$id) { echo "<lu class='current'>".$i."</lu>"; }

else { echo "<lu><a href='?id=" .$i. " '> " .$i. "</a></lu>"; }
}
echo "</ul>";
 }


?>
    </div> 
    <hr>
    <div class="row column text-center">
        <p>Pentru mai multe informații puteți să ne scrieți și un mesaj pe</p>
        <p>Whatsapp: 0732123456</p>
        <p>Email: findmypet@gmail.com</p>
        <hr>
    </div>

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>

</html>