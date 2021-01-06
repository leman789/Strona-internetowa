<?php
$connect=mysqli_connect("localhost","root","","strona_z_grami");
$login=$_COOKIE["Clogin"];
$id_uzytkownika="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login'";
$id_uzytkownika_W=mysqli_query($connect,$id_uzytkownika);
$id_uzytkownika_R=mysqli_fetch_array($id_uzytkownika_W);
$zapytanie="SELECT `Imie`,`Nazwisko`,`Wiek`,`Avatar` FROM `uzytkownicy` WHERE `id`=$id_uzytkownika_R[0];";
$wynik=mysqli_query($connect,$zapytanie);
while($rekord=mysqli_fetch_array($wynik))
{  
   $imie=$rekord[0]; 
   $nazwisko=$rekord[1];
   $wiek=$rekord[2];
   $avatar=$rekord[3];
}
 
$imie2=$_POST['imie'];
$nazwisko2=$_POST['nazwisko'];
$wiek2=$_POST['wiek'];
$avatar2=$_POST['avatar'];

if(strlen($imie2)>3)
 $imie=$imie2;
 if(strlen($nazwisko2)>3)
 $nazwisko=$nazwisko2;
 if($wiek2>0 && $wiek2<120)
 $wiek=$wiek2;
 


$zapytanie_zmiana="UPDATE `uzytkownicy` SET `Imie` = '$imie', `Nazwisko` = '$nazwisko', `Wiek` = '$wiek', `Avatar` = '1.jpg' WHERE `uzytkownicy`.`id` = $id_uzytkownika_R[0];";
$zrobione=mysqli_query($connect,$zapytanie_zmiana);
if($zrobione)
{
   header("Location:dane_osobowe.php");
}
?>