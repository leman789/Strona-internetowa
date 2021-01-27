<?php
$tytul=$_POST['tytul'];
$cena=$_POST['cena'];
$data=$_POST['data'];
$opis=$_POST['opis'];
$Tworca=$_POST['Tworca'];
$Wydawca=$_POST['Wydawca'];
$System=$_POST['System'];
$Procesor=$_POST['Procesor'];
$Ram=$_POST['Ram'];
$Miejsce=$_POST['Miejsce'];
$DirectX=$_POST['DirectX'];
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
           
            if(isset($_FILES['plik']['type']))
            {
               
            }
            move_uploaded_file($_FILES['plik']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'/git/Strona-internetowa/Zdjecia_gier/okladki/'.$_FILES['plik']['name']);
        }
    }
    else
    {
        echo "błąd przy przesyłaniu danych";
    }
    echo "<img src='$nazwa' alt='zdj_avatara'>";
    echo $tworca;
    echo $wydawca;
    //id_uzytkownika
 $login=$_COOKIE["Clogin"];
$connect=mysqli_connect("localhost","root","","strona_z_grami");
$id_uzytkownika="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login'";
$id_uzytkownika_W=mysqli_query($connect,$id_uzytkownika);
$id_uzytkownika_R=mysqli_fetch_array($id_uzytkownika_W);
//id_towrycy 
$id_tworcy_zapytanie="SELECT `id` FROM `tworcy` GROUP by `id` DESC LIMIT 1";//jakie i1
$id_tworcy_zapytanie_W=mysqli_query($connect,$id_tworcy_zapytanie);
$id_tworcy_zapytanie_R=mysqli_fetch_array($id_tworcy_zapytanie_W);
 $id_tworcy=$id_tworcy_zapytanie_R[0]+1;
 //dodawanie tworcy
$dodanie_tworcy="INSERT INTO `tworcy` (`id`, `Tworca`, `Wydawca`) VALUES ('$id_tworcy', '$Tworca', '$Wydawca');";
$dodanie_tworcy_W=mysqli_query($connect,$dodanie_tworcy);
//id gry
$id_gry_zapytanie="SELECT `id` FROM gry GROUP by `id` DESC LIMIT 1";
$id_gry_zapytanie_W=mysqli_query($connect,$id_gry_zapytanie);
$id_gry_zapytanie_R=mysqli_fetch_array($id_gry_zapytanie_W);
//danie id
 $id_gry=$id_gry_zapytanie_R[0]+1;

$id_specyfikacji=0;
$dodanie_gry="INSERT INTO `gry` (`id`, `Nazwa`, `Opis`, `Cena`, `id_tworcy`, `Data_wydania`, `Obrazek`, `Alt_obrazka`, `id_specyfikacja`, `id_dodajacego`) VALUES (NULL, '$tytul', '$opis', '$cena', '$id_tworcy', '$data', '$nazwa', '$tytul', '$id_specyfikacji', '$id_uzytkownika_R[0]');";
$dodanie_gry_W=mysqli_query($connect,$dodanie_gry);



$id_specyfikacja_zapytanie="SELECT `id` FROM specyfikacja GROUP by `id` DESC LIMIT 1";
$id_specyfikacja_zapytanie_W=mysqli_query($connect,$id_specyfikacja_zapytanie);
$id_specyfikacja_zapytanie_R=mysqli_fetch_array($id_specyfikacja_zapytanie_W);

$specyfikacja_Z="INSERT INTO `specyfikacja` (`id`, `id_gry`, `system_o`, `procesor`, `ram`, `miejsce_dysku`, `directx`) VALUES (NULL, '$id_gry', '$System', '$Procesor', '$Ram', '$Miejsce', '$DirectX');";
$specyfikacja_W=mysqli_query($connect,$specyfikacja_Z);
//danie id
 $id_specyfikacja=$id_specyfikacja_zapytanie_R[0]+1;
echo "to sjflksjfsldfkjslfkjsflkj $id_specyfikacji";
$aktualizacja_gry="UPDATE `gry` SET `id_specyfikacja` = '$id_specyfikacji' WHERE `gry`.`id` = $id_gry;";
$aktualizacja_gry_W=mysqli_query($connect,$aktualizacja_gry);


 echo "dziala";