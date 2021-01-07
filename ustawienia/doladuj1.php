<?php
$ile=$_POST['ile'];
$nr_karty=$_POST['nr_karty'];
$miesiac=$_POST['miesiac'];
$rok=$_POST['rok'];
$cvv=$_POST['cvv'];
$czas=date("Y-m-d");
//id_uzytkownika

$login=$_COOKIE["Clogin"];
$connect=mysqli_connect("localhost","root","","strona_z_grami");
$id_uzytkownika="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login'";
$id_uzytkownika_W=mysqli_query($connect,$id_uzytkownika);
$id_uzytkownika_R=mysqli_fetch_array($id_uzytkownika_W);
 //wstawianie reszty
$konto_bankowe="UPDATE `konto_bankowe` SET `nr_karty` = '$nr_karty', `miesiac` = '$miesiac', `rok` = '$rok', `cvv` = '$cvv' WHERE `id_uzytkownika`=$id_uzytkownika_R[0]";
$wynik=mysqli_query($connect,$konto_bankowe);
$doladowanie="UPDATE `uzytkownicy` SET `Stan_konta` = `Stan_konta`+$ile WHERE `uzytkownicy`.`id` =$id_uzytkownika_R[0];";
$wynik2=mysqli_query($connect,$doladowanie);
$tranzakcje="INSERT INTO `tranzakcje` (`id`, `id_uzytkownika`, `kwota`, `metoda`, `czas`, `nazwa_gry`) VALUES (NULL, '$id_uzytkownika_R[0]', '$ile', '1', '$czas', '0');";
$wynik3=mysqli_query($connect,$tranzakcje);
header("Location:doladuj.php");




?>