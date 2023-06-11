<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl6.css">
    <title>Organizer</title>
</head>
<body>
    <header id="bloki_banera">
        <section id="baner1">
            <h2>MÓJ ORGANIZER</h2>
        </section>
        <section id="baner2">
            <form action="" method="post">
                Opis wydarzenia: <input type="text" name="event">
                <input type="submit" name="submit" value="ZAPISZ">
            </form>
        </section>
        <section id="baner3">
            <img src="logo2.png" alt="Mój organizer">
        </section>
    </header>
    <main id="main">
        <?php
            $Conn = new mysqli('localhost','root','','egzamin6') or die("błąd połączenia z bazą danych");
            if(isset($_POST["submit"])){
                $event = $_POST["event"];
                if(empty($event)){
                    echo "Wypełnij formularz";
                }else{
                    $result1 = $Conn->query("UPDATE zadania SET wpis='$event' WHERE dataZadania='2020-08-27';") or die("błąd zapytania");
                }
            }
            $result2 = $Conn->query("SELECT dataZadania, miesiac, wpis FROM zadania WHERE miesiac = 'Sierpien';") or die("błąd zapytania");
            while($r=$result2->fetch_array()){
                echo "<section id='flexbox'><section id='skrypt'><h6>$r[0], $r[1]</h6><br><p>$r[2]</p></section></section>";
            }
        ?>
    </main>
    <footer id="stopka">
        <?php
            $result3 = $Conn->query("SELECT miesiac, rok FROM zadania WHERE dataZadania = '2020-08-01';") or die("błąd zapytania");
            while($r=$result3->fetch_array()){
                echo "<h1>miesiąc: $r[0], rok: $r[1]</h1>";
            }
            $Conn->close();
        ?>
        <p>Stronę wykonał: 000000000000</p>
    </footer>
</body>
</html>