<?php
//początek
session_start();

//dane i ograniczenie rzucania błędani
require_once "connect.php";
mysqli_report(MYSQLI_REPORT_STRICT);

try
{
    //połączenie z BD
    $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
    //połączenie nieudane
    if ($polaczenie->connect_errno != 0)
    {
        throw new Exception(mysqli_connect_errno());
    }
    //połączenie udane
    else
    {
        //obsługa polskich znaków
        $polaczenie->set_charset("utf8");
        //zapytanie
        $zapytanie = 'SELECT * FROM klienci';
        $wynik = $polaczenie->query($zapytanie);
        //$wiersz = mysqli_fetch_array($wynik);
    }
    //zamknięcie połączenia
    $polaczenie->close();
}
catch(Exception $e)
{
    echo '<b>ERROR!!!</b><br>';
    echo $e;
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
        <table>
            <thead>
                <tr>
                    <th>Imię</th>
                    <th>Nazwisko</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($wiersz = mysqli_fetch_array($wynik))
                    {
                        echo "<tr><td>{$wiersz['imie_klienta']}</td><td>{$wiersz['nazwisko_klienta']}</td><\tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>