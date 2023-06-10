<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Pokoje</title>
</head>
<body>
    <header id="baner1">
        <h1>WYNAJEM POKOI</h1>
    </header>
    <section id="flexbox1">
        <section id="menu1">
            <a href="index.html">POKOJE</a>
        </section>
        <section id="menu2">
            <a href="cennik.php">CENNIK</a>
        </section>
        <section id="menu3">
            <a href="kalkulator.html">KALKULATOR</a>
        </section>
    </section>
    <main id="baner2"></main>
    <section id="flexbox2">
        <section id="lewy"></section>
        <section id="srodkowy">
            <h1>Cennik</h1>
            <table>
            <?php
                $Conn = new mysqli('localhost','root','','wynajem') or die("Błąd połączenia z bazą");

                $result = $Conn->query("SELECT id,nazwa,cena FROM pokoje") or die("błąd zapytania");
                while($r = $result->fetch_array()){
                    echo "<tr><td>$r[0]</td><td>$r[1]</td><td>$r[2]</td></tr>";
                }
                $Conn -> close();
            ?>
            </table>
        </section>
        <section id="prawy"></section>
    </section>
    <footer id="stopka">
        <p>Stronę opracował: 00000000000</p>
    </footer>
</body>
</html>