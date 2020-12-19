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
        <form action="" method="POST">
            <p>Podaj imię <input type="text" name="imie" class="logowanie"></p>
            <p>Podaj nazwisko <input type="text" name="nazwisko" class="logowanie"></p>
            <p>Podaj e-mail <input type="email" name="email" class="logowanie"></p>
            <p>Podaj wiek(opcjonalnie) <input type="number" name="wiek" class="logowanie"></p>
            <p>Podaj login <input type="text" name="login" class="logowanie"></p>
            <p>Podaj hasło <input type="text" name="haslo1" class="logowanie"></p>
            <p>Powtórz hasło <input type="text" name="haslo2" class="logowanie"></p>
            <input type="reset" value="wyczyść dane">
            <input type="submit" value="zarejestruj"><br>

        </form>
    </div>
</body>

</html>
<?php
            if(!empty($_POST['imie']) && !empty($_POST['nazwisko']) && !empty($_POST['email']) && !empty($_POST['wiek']) && !empty($_POST['login'])&& !empty($_POST['haslo1']) && !empty($_POST['haslo2']) && $_POST['haslo1']==$_POST['haslo2']){
                $imie=$_POST['imie'];
                $nazwisko=$_POST['nazwisko'];
                $email=$_POST['email'];
                $wiek=$_POST['wiek'];
                $login=$_POST['login'];
                $haslo1=$_POST['haslo1'];
                $haslo2=$_POST['haslo2'];
                $connect=mysqli_connect("localhost","root","","strona_z_grami");
                $zapytanie="INSERT INTO `użytkownicy`(`Imię`, `Nazwisko`, `Wiek`, `Stan_konta`) VALUES ('$imie','$nazwisko','$wiek',0)";
                $zapytanie2="INSERT INTO `dane_logowania`(`Login`, `Hasło`, `E-mail`) VALUES ('$login','$haslo1','$email');";
                $wynik=mysqli_query($connect,$zapytanie);
                $wynik2=mysqli_query($connect,$zapytanie2);
                if($wynik){
                    echo '<script>alert("Zarejestrowano pomyślnie uwu")</script>';
                    header("Location: logowanie.php");
                }
                else{
                    echo "2";

                }
                mysqli_close($connect);
            }
        ?>