<?php
//początek
session_start();

//czy formularz został przesłany
if (isset($_POST['nazwa']))
{
    //pobranie danych z formularza
    $nazwa = $_POST['nazwa'];
    $partner = $_POST['partner'];
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $adres = $_POST['adres'];
    $poczta = $_POST['poczta'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];
    
    /*
    //TEMP wyświetlenie danych
    echo "<p>{$nazwa}</p>";
    echo "<p>{$partner}</p>";
    echo "<p>{$imie}</p>";
    echo "<p>{$nazwisko}</p>";
    echo "<p>{$adres}</p>";
    echo "<p>{$poczta}</p>";
    echo "<p>{$telefon}</p>";
    echo "<p>{$email}</p>";
    */
    
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
            //TEST POŁACZENIA
            //obsługa polskich znaków
            $polaczenie->set_charset("utf8");
            //zapytanie
            $zapytanie = 'SELECT * FROM klienci';
            $wynik = $polaczenie->query($zapytanie);
            $ile = $wynik->num_rows;
            echo $ile;
            
            $status = '<p style="color:green; text-align: center;"><b>Klient został pomyślnie dodany!</b></p>';
        }
        //zamknięcie połączenia
        $polaczenie->close();
    }
    catch(Exception $e)
    {   
        //komunikat o błędzie
        echo '<b>ERROR!!!</b><br>';
        echo $e;
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dodaj nowego klienta</title>
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Dodaj nowego klienta</h1>
    </header>
    
    <div class="container">
        <main>
            <article>
                    <form method="post">
                        <?php
                            if (isset($status))
                            {
                                echo $status;
                                unset($status);
                            }
                        ?>
                        <div class="formRow">
                            <div>Nazwa:</div>
                            <div><input type="text" name="nazwa"></div>
                        </div>

                        <fieldset>
                            <legend>Czy jesteś partnerem</legend>

                            <div><label>Tak<input type="radio" name="partner" value="tak"></label></div>
                            <div><label>Nie<input type="radio" name="partner" value="nie" checked></label></div>
                        </fieldset>

                        <fieldset>
                            <legend>Dane osobowe</legend>

                            <div class="formRow">
                                <div>Imię:</div>
                                <div><input type="text" name="imie"></div>
                            </div>

                            <div class="formRow">
                                <div>Nazwisko:</div>
                                <div><input type="text" name="nazwisko"></div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend>Dane kontaktowe</legend>

                            <div class="formRow">
                                <div>Adres:</div>
                                <div><input type="text" name="adres"></div>
                            </div>

                            <div class="formRow">
                                <div>Poczta:</div>
                                <div><input type="text" name="poczta"></div>
                            </div>

                            <div class="formRow">
                                <div>Telefon:</div>
                                <div><input type="tel" name="telefon"></div>
                            </div>

                            <div class="formRow">
                                <div>Email:</div>
                                <div><input type="email" name="email"></div>
                            </div>
                        </fieldset>

                        <div class="formRow">
                            <input type="submit" value="Zapisz">
                        </div>

                        <div class="formRow">
                            <input type="reset" value="Resetuj">
                        </div>
                    </form>

            </article>
        </main>

        <article>
            <p><a href="index.php">Strona główna</a></p>
        </article>
        </div>
    
    <footer>
       <p>Zamowienia &copy; 2020</p>
   </footer>
</body>
</html>