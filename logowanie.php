<!DOCTYPE html>
<html>
<head>
    <title>Gpoint</title>
    <meta charset="utf-8">
    <meta name="description" content="Zobacz najnowsze promocje na naszej stronie !">
    <link rel="stylesheet" href="logowanie.css" type="text/css">

</head>
<body>
    <div id="reje">
        <form action="logowanie.php" method="POST">
            Podaj login<input type="text" name="login"><br>
            Podaj hasło<input type="text" name="haslo"><br>
        </form>
        <a href="rejestracja.php">Jeżeli nie posiadasz konta, zarejestruj się!</a>   
    </div>
</body>

</html>
<?php
            if(!empty($_POST['login']) && !empty($_POST['haslo']));
                $login=$_POST['login'];
                $haslo=$_POST['haslo'];
                $connect=mysqli_connect("localhost","root","","strona_z_grami");
                $zapytanie="INSERT INTO `użytkownicy`(`Imię`, `Nazwisko`, `Wiek`, `Stan_konta`) VALUES ('$imie','$nazwisko','$wiek',0)";
                $zapytanie2="INSERT INTO `dane_logowania`(`Login`, `Hasło`, `E-mail`) VALUES ('$login','$haslo1','$email');";
                $wynik=mysqli_query($connect,$zapytanie);
                $wynik2=mysqli_query($connect,$zapytanie2);
                if($wynik){
                    echo '<script>alert("Zalogowano pomyślnie uwu")</script>';
                    header("Location: logowanie.php");
                }
                else{
                    echo "2";

                }
                mysqli_close($connect);
            }
        ?>