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
   <header>
       <h1>Klienci</h1>
   </header>
    
    <div class="container">
       <main>
           <article>
                <table>
                    <thead>
                        <tr>
                            <th>Nazwa</th>
                            <th>Partner</th>
                            <th>Imię</th>
                            <th>Nazwisko</th>
                            <th>Adres</th>
                            <th>Poczta</th>
                            <th>Telefon</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($wiersz = mysqli_fetch_array($wynik))
                            {
                                echo "<tr><td>{$wiersz['nazwa_klienta']}</td><td>{$wiersz['czy_partner']}</td><td>{$wiersz['imie_klienta']}</td><td>{$wiersz['nazwisko_klienta']}</td><td>{$wiersz['adres_klienta']}</td><td>{$wiersz['poczta_klienta']}</td><td>{$wiersz['tel_klienta']}</td><td>{$wiersz['email_klienta']}</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </article>
        </main>
        <article>
            <a href="index.php">Strona główna</a>
        </article>
    </div>
</body>
</html>