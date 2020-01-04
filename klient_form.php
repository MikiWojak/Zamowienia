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
    
    //TEMP wyświetlenie danych
    echo "<p>{$nazwa}</p>";
    echo "<p>{$partner}</p>";
    echo "<p>{$imie}</p>";
    echo "<p>{$nazwisko}</p>";
    echo "<p>{$adres}</p>";
    echo "<p>{$poczta}</p>";
    echo "<p>{$telefon}</p>";
    echo "<p>{$email}</p>";
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
    <main>
        <article>
            <div class="container">
                <form method="post">
                    <div class="formRow">
                        <div>Nazwa:</div>
                        <div><input type="text" name="nazwa" required></div>
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
            </div>
        </article>
    </main>
</body>
</html>