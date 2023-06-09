<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Biblioteka miejska</title>
</head>
<body>
    <header id="baner">
        <h2>Miejska Biblioteka Publiczna w Książkowicach</h2>
    </header>
    <section id="flexbox">
        <section id="lewy">
            <h3>W naszych zbiorach znajdziesz dzieła następujących autorów:</h3>
            <ul>
                <?php
                    $Conn = new mysqli('localhost', 'root','','biblioteka') or die("Błąd połączenia");
                    
                    $result = $Conn->query("SELECT imie, nazwisko FROM autorzy") or die("błąd zapytania");
                    while($r = $result -> fetch_array()){
                        echo "<li>".$r[0]." ".$r[1]."</li>";
                    }
                ?>
            </ul>
                </section>
        <main id="srodkowy">
            <h3>Dodaj nowego czytelnika</h3>
            <form action="" method="POST">
                imie: <input type="text" name="name"><br>
                nazwisko: <input type="text" name="surname"><br>
                rok urodzenia: <input type="number" name="birthYear"><br>
                <input type="submit" name="submit" value="DODAJ">
            </form>
            <?php
                 if(isset($_POST["submit"])){
                    $name = $_POST["name"];
                    $surname = $_POST["surname"];
                    $birthYear = $_POST["birthYear"];
                    if(empty($name) || empty($surname) || empty($birthYear)){
                        echo "Wypełnij wszystkie pola formularza";
                    }else{
                        echo "Czytelnik $name $surname został dodany do bazy danych";
                        //kod czytelika
                        $two_let_name = substr($name, 0, 2);
                        $two_let_surname = substr($surname, 0, 2);
                        $two_num_birthYear = substr($birthYear, 2, 4);
                        $kod_czyt = strtoupper($two_let_name).strtoupper($two_let_surname).$two_num_birthYear;
                        $result2 = $Conn->query("INSERT INTO czytelnicy VALUES (NULL,'$name','$surname','$kod_czyt')") or die("błąd zapytania");
                    }
                 }
                $Conn->close();
            ?>
        </main>
        <section id="prawy">
            <img src="biblioteka.png" alt="książki">
            <h4>ul. Czytelnicza 25<br>
                12-120 Książkowice<br>
                tel.: 123123123<br>
                e-mail: <a href="biuro@biblioteka.pl">biuro@biblioteka.pl</a><br>
            </h4>
        </section>
    </section>
    <footer id="stopka">
        <p>Projekt strony: 00000000000</p>
    </footer>
</body>
</html>