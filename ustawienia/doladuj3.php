<?php
$ile=$_POST['ile'];
$login_paypal=$_POST['login_paypal'];
$haslo=$_POST['haslo_paypal'];

$czas=date("Y-m-d");
//id_uzytkownika

$login=$_COOKIE["Clogin"];
$connect=mysqli_connect("localhost","root","","strona_z_grami");
$id_uzytkownika="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login'";
$id_uzytkownika_W=mysqli_query($connect,$id_uzytkownika);
$id_uzytkownika_R=mysqli_fetch_array($id_uzytkownika_W);
 //wstawianie reszty
$Paypal="UPDATE `paypal` SET `login_paypal` = '$login_paypal', `haslo_paypal` = '$haslo' WHERE  id_uzytkownika =$id_uzytkownika_R[0]";
$wynik=mysqli_query($connect,$Paypal);
$doladowanie="UPDATE `uzytkownicy` SET `Stan_konta` = `Stan_konta`+$ile WHERE `uzytkownicy`.`id` =$id_uzytkownika_R[0];";
$wynik2=mysqli_query($connect,$doladowanie);
$tranzakcje="INSERT INTO `tranzakcje` (`id`, `id_uzytkownika`, `kwota`, `metoda`, `czas`, `nazwa_gry`) VALUES (NULL, '$id_uzytkownika_R[0]', '$ile', '3', '$czas', '0');";
$wynik3=mysqli_query($connect,$tranzakcje);
header("Location:doladuj.php");


?>