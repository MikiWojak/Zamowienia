<?php
//początek
session_start();

//połączenie z BD
require_once "connect.php";
$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
//obsługa polskich znaków
$polaczenie->set_charset("utf8");

//połączenie nieudane
if ($polaczenie->errno != 0)
{
    echo "Error: ".$polaczenie->errno;
}
//połączenie udane
else
{
    //zapytanie
    $zapytanie = "SELECT nazwa_klienta FROM klienci WHERE id_klienta = 1";
    $wynik = $polaczenie->query($zapytanie);
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Klienci</title>
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="title">
       <h1>Klienci</h1>
   </div>
    
    <div class="container">
        <?php
        if (isset($wynik))
        {
            //echo "Wynik";
            echo $wynik;
        }
        ?>
    </div>
</body>
</html>