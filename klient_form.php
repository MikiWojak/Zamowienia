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
            <form action="nowy_klient.php" method="post">
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
                    <label>Telefon <input type="text" name="telefon"></label>
                </div>
                
                <div class="formRow">
                    <label>Email <input type="text" name="email"></label>
                </div>
            </form>
        </article>
    </main>
</body>
</html>