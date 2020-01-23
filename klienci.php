<?php

//początek
session_start();

if (!isset($_SESSION['czy_rosnaco'])) $_SESSION['czy_rosnaco'] = true;
if (!isset($_SESSION['sort_kryt'])) $_SESSION['sort_kryt'] = "";

if (!isset($_SESSION['fraza'])) $_SESSION['fraza'] = "";
else if (isset($_POST['fraza'])) $_SESSION['fraza'] = $_POST['fraza'];

//TEMP
echo "<p>Przed ".$_SESSION['czy_rosnaco']."</p>";

//sortowanie rekordow
//nazwa_klienta
if (isset($_POST['nazwa_klienta']))
{
    if ($_SESSION['sort_kryt'] != "nazwa_klienta")
    {
        $_SESSION['sort_kryt'] = "nazwa_klienta";
        $_SESSION['czy_rosnaco'] = true;
    }
    else
    {
        $_SESSION['czy_rosnaco'] = !$_SESSION['czy_rosnaco'];
    }
}
//czy_partner
if (isset($_POST['czy_partner']))
{
    if ($_SESSION['sort_kryt'] != "czy_partner")
    {
        $_SESSION['sort_kryt'] = "czy_partner";
        $_SESSION['czy_rosnaco'] = true;
    }
    else
    {
        $_SESSION['czy_rosnaco'] = !$_SESSION['czy_rosnaco'];
    }
}
//imie_klienta
if (isset($_POST['imie_klienta']))
{
    if ($_SESSION['sort_kryt'] != "imie_klienta")
    {
        $_SESSION['sort_kryt'] = "imie_klienta";
        $_SESSION['czy_rosnaco'] = true;
    }
    else
    {
        $_SESSION['czy_rosnaco'] = !$_SESSION['czy_rosnaco'];
    }
}
//nazwisko_klienta
if (isset($_POST['nazwisko_klienta']))
{
    if ($_SESSION['sort_kryt'] != "nazwisko_klienta")
    {
        $_SESSION['sort_kryt'] = "nazwisko_klienta";
        $_SESSION['czy_rosnaco'] = true;
    }
    else
    {
        $_SESSION['czy_rosnaco'] = !$_SESSION['czy_rosnaco'];
    }
}
//adres_klienta
if (isset($_POST['adres_klienta']))
{
    if ($_SESSION['sort_kryt'] != "adres_klienta")
    {
        $_SESSION['sort_kryt'] = "adres_klienta";
        $_SESSION['czy_rosnaco'] = true;
    }
    else
    {
        $_SESSION['czy_rosnaco'] = !$_SESSION['czy_rosnaco'];
    }
}
//poczta_klienta
if (isset($_POST['poczta_klienta']))
{
    if ($_SESSION['sort_kryt'] != "poczta_klienta")
    {
        $_SESSION['sort_kryt'] = "poczta_klienta";
        $_SESSION['czy_rosnaco'] = true;
    }
    else
    {
        $_SESSION['czy_rosnaco'] = !$_SESSION['czy_rosnaco'];
    }
}
if (isset($_POST['telefon_klienta']))   //telefon_klienta
{
    if ($_SESSION['sort_kryt'] != "tel_klienta")
    {
        $_SESSION['sort_kryt'] = "tel_klienta";
        $_SESSION['czy_rosnaco'] = true;
    }
    else
    {
        $_SESSION['czy_rosnaco'] = !$_SESSION['czy_rosnaco'];
    }
}
if (isset($_POST['email_klienta']))     //email_klienta
{
    if ($_SESSION['sort_kryt'] != "email_klienta")
    {
        $_SESSION['sort_kryt'] = "email_klienta";
        $_SESSION['czy_rosnaco'] = true;
    }
    else
    {
        $_SESSION['czy_rosnaco'] = !$_SESSION['czy_rosnaco'];
    }
}

//TEMP
//echo "<p>Po ".$_SESSION['czy_rosnaco']."</p>";

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
        
        if (isset($_POST['fraza']) || isset($_SESSION['fraza']))
        {
            //pobranie frazy z okienka
            $fraza = $_SESSION['fraza'];
            //wyniki z fraza
            $zapytanie = "SELECT * FROM klienci WHERE
                nazwa_klienta LIKE '%$fraza%' OR
                imie_klienta LIKE '%$fraza%' OR
                nazwisko_klienta LIKE '%$fraza%' OR
                adres_klienta LIKE '%$fraza%' OR
                poczta_klienta LIKE '%$fraza%' OR
                tel_klienta LIKE '%$fraza%' OR
                email_klienta LIKE '%$fraza%'";
        }
        else
        {
            //zapytanie ogolne
            $zapytanie = 'SELECT * FROM klienci';
            
        }
        
        //sortowanie
        if ($_SESSION['sort_kryt'] != "")
        {
            $zapytanie = $zapytanie." ORDER BY ".$_SESSION['sort_kryt'];
            
            if (!$_SESSION['czy_rosnaco'])
            {
                $zapytanie = $zapytanie." DESC";
            }
        }
        
        //realizacja zapytania
        $wynik = $polaczenie->query($zapytanie);
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
    
    <script type="text/javascript">
        
        function gora_dol(nazwa_elementu)
        {
            document.getElementById(nazwa_elementu).innerHTML = "Góra";
        }
        
    </script>
</head>
<body>
   <header>
       <h1>Klienci</h1>
   </header>
    
    <div class="container">
       <main>
            <article>
                <div>
                    <div class="szukana">
                        <p>Szukana fraza: <b><?php if (isset($_SESSION['fraza'])) echo $_SESSION['fraza']?></b></p>
                    </div>
                    <div class="szukaj">
                        <form method="post">
                            <input type="text" name="fraza">
                            <input type="submit" value="Szukaj">
                        </form> 
                    </div>
                    <div style="clear: both;"></div>
                </div>
            </article>
            
           <article>
               <!--Ukryty formularz-->
               
                <table>
                    <thead>
                        <tr>
                            <th>
                                <form method="post">
                                    <input type="hidden" name="nazwa_klienta">
                                    <input type="submit" value="Nazwa" onclick='gora_dol("nazwa")'>
                                </form>
                                <div id="nazwa"></div>
                            </th>
                            <th>
                                <form method="post">
                                    <input type="hidden" name="czy_partner">
                                    <input type="submit" value="Partner">
                                </form>
                            </th>
                            <th>
                                <form method="post">
                                    <input type="hidden" name="imie_klienta">
                                    <input type="submit" value="Imię">
                                </form>
                            </th>
                            <th>
                                <form method="post">
                                    <input type="hidden" name="nazwisko_klienta">
                                    <input type="submit" value="Nazwisko">
                                </form>
                            </th>
                            <th>
                                <form method="post">
                                    <input type="hidden" name="adres_klienta">
                                    <input type="submit" value="Adres">
                                </form>
                            </th>
                            <th>
                                <form method="post">
                                    <input type="hidden" name="poczta_klienta">
                                    <input type="submit" value="Poczta">
                                </form>
                            </th>
                            <th>
                                <form method="post">
                                    <input type="hidden" name="telefon_klienta">
                                    <input type="submit" value="Telefon">
                                </form>
                            </th>
                            <th>
                                <form method="post">
                                    <input type="hidden" name="email_klienta">
                                    <input type="submit" value="Email">
                                </form>
                            </th>
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