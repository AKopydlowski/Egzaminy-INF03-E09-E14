<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Lista przyjaciół</title>
</head>
<body>
    <header id="baner">
        <h1>Portal Społecznościowy - moje konto</h1>
    </header>
    <main id="glowny">
        <h2>Moje zainteresowania</h2>
        <ul>
            <li>muzyka</li>
            <li>film</li>
            <li>komputery</li>
        </ul>
        <h2>Moi znajomi</h2>
        <!-- działanie skryptu -->
        <?php
            $conn = new mysqli('localhost','root','','dane') or die("błąd połączenia");

            $result=$conn->query("SELECT imie, nazwisko, opis, zdjecie from osoby os join hobby h on h.id = os.id WHERE Hobby_id = 1 or 2 or 6");
        // był problem z konstrukcją pętli 
            while($r = $result -> fetch_array()){
                echo "<section id='box'><section id='zdjecie'><img src='$r[3]' alt='przyjaciel'></section>";
                echo "<section id='opis'><h3>$r[0] $r[1]</h3><p>Ostatni wpis: $r[2]</p></section></section>";
                echo "<section id='linia'><hr></section>";

            }
            $conn->close();
        ?>
    </main>
    <section id="stopki">
        <footer id="stopka_1">
            Stronę wykonał: (pesel)
        </footer>
        <footer id="stopka_2">
            <a href="ja@portal.pl">napisz do mnie</a>
        </footer>
    </section>
</body>
</html>