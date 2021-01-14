<?php

    $max_rozmiar = 1024*1024;
    if(is_uploaded_file($_FILES['plik']['tmp_name']))
    {
        if($_FILES['plik']['size'] > $max_rozmiar)
        {
            echo "za duży plik";
        }
        else
        {
            $nazwa=$_FILES['plik']['name'];
            echo 'odebrano plik. Początkowa nazwa: '.$_FILES['plik']['name'];
            echo "<br/>";
            if(isset($_FILES['plik']['type']))
            {
                echo 'Typ: '.$_FILES['plik']['type'].'<br/>';
            }
            move_uploaded_file($_FILES['plik']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'/git/Strona-internetowa/Zdjecia_gier/avatar/'.$_FILES['plik']['name']);
        }
    }
    else
    {
        echo "błąd przy przesyłaniu danych";
    }
 echo "<img src='$nazwa' alt='zdj_avatara'>";
 $login=$_COOKIE["Clogin"];
$connect=mysqli_connect("localhost","root","","strona_z_grami");
$id_uzytkownika="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login'";
$id_uzytkownika_W=mysqli_query($connect,$id_uzytkownika);
$id_uzytkownika_R=mysqli_fetch_array($id_uzytkownika_W);
//wyswitlanie rekordow 
 
$zapytanie="UPDATE `uzytkownicy` SET `Avatar` = '$nazwa' WHERE `uzytkownicy`.`id`=$id_uzytkownika_R[0];";
$wynik=mysqli_query($connect,$zapytanie);
mysqli_close($connect);
?>
