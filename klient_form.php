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
            </form>
        </article>
    </main>
</body>
</html>