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
        /*
        //zapytanie
        $zapytanie = 'SELECT * FROM klienci';
        $wynik = $polaczenie->query($zapytanie);
        */
        if (isset($_POST['fraza']))
        {
            //pobranie frazy z okienka
            $fraza = $_POST['fraza'];
            //wyniki z fraza
            $zapytanie = "SELECT * FROM klienci WHERE
                nazwa_klienta LIKE '%$fraza%' OR
                imie_klienta LIKE '%$fraza%' OR
                nazwisko_klienta LIKE '%$fraza%' OR
                adres_klienta LIKE '%$fraza%' OR
                poczta_klienta LIKE '%$fraza%' OR
                tel_klienta LIKE '%$fraza%' OR
                email_klienta LIKE '%$fraza%'";
            $wynik = $polaczenie->query($zapytanie);
        }
        
        
    }
    //zamknięcie połączenia
    $polaczenie->close();
}
catch(Exception $e)
{
    //komunikat o błędzie
    echo '<b>ERROR!!!</b><br>';
    //INFORMACJA DEWELOPERSKA!
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
               <div class="szukaj">
                    <form method="post">
                        <input type="text" name="fraza">
                        <input type="submit" value="Szukaj">
                    </form> 
                </div>   
            </article>
            
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
            <article>
                <a href="klient_form.php">Dodaj wpis</a>
            </article>
        </main>
        
        <article>
            <p><a href="index.php">Strona główna</a></p>
        </article>
        
        <footer>
           <p>Zamowienia &copy; 2020</p>
        </footer>
    </div>
</body>
</html>