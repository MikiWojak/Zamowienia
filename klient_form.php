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
            <form method="post">
                <div class="formRow">
                    <label>Nazwa <input type="text" name="nazwa"></label>
                </div>
                
                <div class="formRow">
                    <fieldset>
                        <legend>Czy jesteś partnerem</legend>
                       
                        <div><label>Tak<input type="radio" name="partner" value="tak"></label></div>
                        <div><label>Nie<input type="radio" name="partner" value="nie" checked></label></div>
                    </fieldset>
                </div>
                
                <div class="formRow">
                    <label>Imię <input type="text" name="imie"></label>
                </div>
                
                <div class="formRow">
                    <label>Nazwisko <input type="text" name="nazwisko"></label>
                </div>
                
                <div class="formRow">
                    <label>Adres <input type="text" name="adres"></label>
                </div>
                
                <div class="formRow">
                    <label>Poczta <input type="text" name="poczta"></label>
                </div>
                
                <div class="formRow">
                    <label>Telefon <input type="tel" name="telefon"></label>
                </div>
                
                <div class="formRow">
                    <label>Email <input type="email" name="email"></label>
                </div>
                
                <div class="formRow">
                    <input type="submit" value="Zapisz">
                </div>
                
                <div class="formRow">
                    <input type="reset" value="Resetuj">
                </div>
            </form>
        </article>
    </main>
</body>
</html>