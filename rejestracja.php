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
                
                $id="SELECT id FROM `uzytkownicy` GROUP BY id  DESC LIMIT 1";
                $wynik_id=mysqli_query($connect,$id);
                $rekord_id=mysqli_fetch_array($wynik_id);
                $zapytanie1="SELECT Login FROM dane_logowania WHERE Login='admin' OR Login='$login' GROUP BY  id_uzytkownika DESC LIMIT 1";
                $wynik1=mysqli_query($connect,$zapytanie1);
              
                $rekord1=mysqli_fetch_array($wynik1);
                $zapytanie2="INSERT INTO `dane_logowania`(`id_uzytkownika`,`Login`, `Haslo`, `E-mail`) VALUES ('$rekord_id[0]','$login','$haslo1','$email');";
                $konto_bankowe_Z="INSERT INTO `konto_bankowe` (`id`, `id_uzytkownika`, `nr_karty`, `miesiac`, `rok`, `cvv`) VALUES (NULL, '$rekord_id[0]', NULL, NULL, NULL, NULL);";
                $paypal_Z="INSERT INTO `paypal` (`id`, `id_uzytkownika`, `login_paypal`, `haslo_paypal`) VALUES (NULL, '$rekord_id[0]', NULL, NULL);";
                $play_Z="INSERT INTO `play` (`id`, `id_uzytkownika`, `nr_telefonu`, `kod`) VALUES (NULL, $rekord[0], NULL, NULL);"
                if($rekord1[0]=="admin")
                    {
                        
                       
                        
                        if(isset($_POST['haslo1'])&& isset($_POST['haslo1']))
                        { 
                        $i=0;
                       
                        if($haslo1!=$haslo2)
                        {
                            echo "hasła nie są takie same<br>";
                            $i++;
                        }
                        if(strlen($haslo1)<7)
                        {
                            echo "hasło jest za krótkie<br>";
                            $i++;
                        }
                        $ile=0;
                        $dlugosc=strlen($haslo1);
                        $ile=$dlugosc;
                        for($e=0;$e<$dlugosc;$e++)
                        {
                           
                           if($haslo1[$e]=='0'||$haslo1[$e]=='1'||$haslo1[$e]=='2'||$haslo1[$e]=='3'||$haslo1[$e]=='4'||$haslo1[$e]=='5'||$haslo1[$e]=='6'||$haslo1[$e]=='7'||$haslo1[$e]=='8'||$haslo1[$e]=='9')
                            {
                              $ile--;
                                
                            }    
                        }
                         if($ile==$dlugosc)
                         {
                             echo "Hasło nie posiada liczb";
                             $i++;
                         }
                         echo $i;
                         if($i!=0)
                         {
                           $dziala=0;
                         }
                         else
                         { 
                           $dziala=1; 
                           $wynik=mysqli_query($connect,$zapytanie);
                           $wynik2=mysqli_query($connect,$zapytanie2); 
                         }
                         if($wynik && $wynik2 &&$dziala==1)
                            {
                                $zalogowany++;
                                
                                mysqli_query($connect,$konto_bankowe_Z);
                                mysqli_query($connect,$paypal_Z);
                                mysqli_query($connect,$play_Z);
                                header("location:logowanie.php");
                            }
                            else
                            {
                                echo "wpisz jeszcze raz dane";
                            }
                        
                    }
                }
                else
                    {
                        echo "Ten login jest zajęty";
                    }
                mysqli_close($connect);
            }
        ?>