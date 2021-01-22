<?php
$ile=$_POST['ile'];
$nr_tel=$_POST['nr_tel'];
$kod=$_POST['kod'];

$czas=date("Y-m-d");
//id_uzytkownika

$login=$_COOKIE["Clogin"];
$connect=mysqli_connect("localhost","root","","strona_z_grami");
$id_uzytkownika="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login'";
$id_uzytkownika_W=mysqli_query($connect,$id_uzytkownika);
$id_uzytkownika_R=mysqli_fetch_array($id_uzytkownika_W);
 //wstawianie reszty
$Play="UPDATE `play` SET `nr_telefonu` = '$nr_tel', `kod` = '$kod' WHERE `play`.`id_uzytkownika` = $id_uzytkownika_R[0]";
$wynik=mysqli_query($connect,$Play);
$doladowanie="UPDATE `uzytkownicy` SET `Stan_konta` = `Stan_konta`+$ile WHERE `uzytkownicy`.`id` =$id_uzytkownika_R[0];";
$wynik2=mysqli_query($connect,$doladowanie);
$tranzakcje="INSERT INTO `tranzakcje` (`id`, `id_uzytkownika`, `kwota`, `metoda`, `czas`, `nazwa_gry`) VALUES (NULL, '$id_uzytkownika_R[0]', '$ile', '2', '$czas', '0');";
$wynik3=mysqli_query($connect,$tranzakcje);
mysqli_close($connect);
header("Location:doladuj.php");
?>