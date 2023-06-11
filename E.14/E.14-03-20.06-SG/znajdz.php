<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Kwiaty</title>
</head>
<body>
    <header id="baner">
        <h1>Moje kwiaty</h1>
    </header>
    <section id="flexbox">
        <aside id="lewy">
            <h3>Kwiaty dla Ciebie!</h3>
            <a href="https://www.swiatkwiatow.pl/">Rozpoznaj kwiaty</a><br>
            <a href="znajdz.php">Znajdź kwiaciarnię</a>
            <img src="gozdzik.jpg" alt="Goździk">
        </aside>
        <main id="prawy">
            <img src="gerbera.jpg" alt="gerbera">
            <img src="gozdzik.jpg" alt="goździk">
            <img src="roza.jpg" alt="róża">
            <p>Podaj miejscowość, w której poszukujesz kwiaciarni:</p>
            <form action="" method="POST">
                <input type="text" name="miejscowosc">
                <input type="submit" name="submit" value="SPRAWDŹ">
            </form>
            <?php
                $Conn = new mysqli('localhost','root','','kwiaciarnia') or die("Błąd połączenia z bazą");

                if(isset($_POST["submit"])){
                    $miejscowosc = $_POST["miejscowosc"];
                    if(empty($miejscowosc)){
                        echo "Wypełnij to pole";
                    }else{
                        $result = $Conn->query("SELECT nazwa, ulica FROM kwiaciarnie WHERE miasto = '$miejscowosc';");
                        while($r = $result->fetch_array()){
                            echo "$r[0], $r[1]";
                        }
                    }
                }
                $Conn->close();
            ?>
        </main>
    </section>
    <footer id="stopka">
        <h3>Stronę opracował: 00000000000</h3>
    </footer>
</body>
</html>