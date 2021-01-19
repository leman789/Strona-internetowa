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
            <p>Podaj imię <input type="text" name="imie" class="logowanie" autocomplete="off"></p>
            <p>Podaj nazwisko <input type="text" name="nazwisko" class="logowanie" autocomplete="off"></p>
            <p>Podaj e-mail <input type="email" name="email" class="logowanie" autocomplete="off"></p>
            <p>Podaj wiek(opcjonalnie) <input type="number" name="wiek" class="logowanie"></p>
            <p>Podaj login <input type="text" name="login" class="logowanie" autocomplete="off"></p>
            <p>Podaj hasło <input type="text" name="haslo1" class="logowanie" autocomplete="off"></p>
            <p>Powtórz hasło <input type="text" name="haslo2" class="logowanie" autocomplete="off"></p>
            <input type="reset" value="wyczyść dane" id="przycisk">
            <input type="submit" value="zarejestruj" id="przycisk2"><br>

        </form>
    </div>
</body>

</html>
<?php
            if(isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['email']) && isset($_POST['wiek']) && isset($_POST['login'])&& isset($_POST['haslo1']) && isset($_POST['haslo2']) && $_POST['haslo1']==$_POST['haslo2'])
            {
                $imie=$_POST['imie'];
                $nazwisko=$_POST['nazwisko'];
                $email=$_POST['email'];
                $wiek=$_POST['wiek'];
                $login=$_POST['login'];
                $haslo1=$_POST['haslo1'];
                $haslo2=$_POST['haslo2'];
                $connect=mysqli_connect("localhost","root","","strona_z_grami");
                $zapytanie="INSERT INTO `uzytkownicy`(`Imie`, `Nazwisko`, `Wiek`, `Stan_konta`) VALUES ('$imie','$nazwisko','$wiek',0)";
                $wynik=mysqli_query($connect,$zapytanie);
                $id="SELECT id FROM `uzytkownicy` GROUP BY id  DESC LIMIT 1";
                $wynik_id=mysqli_query($connect,$id);
                $rekord_id=mysqli_fetch_array($wynik_id);
                $zapytanie1="SELECT Login FROM dane_logowania WHERE Login='admin' OR Login='$login' GROUP BY  id_uzytkownika DESC LIMIT 1";
                $wynik1=mysqli_query($connect,$zapytanie1);
                $rekord1=mysqli_fetch_array($wynik1);
                $zapytanie2="INSERT INTO `dane_logowania`(`id_uzytkownika`,`Login`, `Haslo`, `E-mail`) VALUES ('$rekord_id[0]','$login','$haslo1','$email');";
                if($rekord1[0]=="admin")
                    {
                        
                        $wynik2=mysqli_query($connect,$zapytanie2);
                        if($wynik && $wynik2)
                        {
                            $zalogowany++;
                            header("location:logowanie.php");
                        }
                        else
                        {
                            echo "$wynik";
                            echo "$wynik2";
                        }
                    }
                else
                    {
                        echo "Ten login jest zajęty";
                    }
                mysqli_close($connect);
            }
        ?>