<?php
$connect=mysqli_connect("localhost","root","","strona_z_grami");
$gra=$_POST['gra'];
$login=$_COOKIE["Clogin"];
$uzytkownik="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login'";
$wynik=mysqli_query($connect,$uzytkownik);
$rekord=mysqli_fetch_array($wynik);
$stan_konta="SELECT dane_logowania.Login,uzytkownicy.Stan_konta FROM `uzytkownicy` JOIN dane_logowania ON uzytkownicy.id=dane_logowania.id_uzytkownika where Login='$login'";
$wynik2=mysqli_query($connect,$stan_konta);
$rekord2=mysqli_fetch_array($wynik2);
$cena_gry="SELECT Cena FROM `gry` WHERE id=2";
$wynik3=mysqli_query($connect,$cena_gry);
$rekord3=mysqli_fetch_array($wynik3);
$posiadanie_gry="SELECT id_gry,id_uzytkownika FROM `biblioteka_gier` WHERE id_uzytkownika='$rekord[0]' AND id_gry='$gra'";
$wynik10=mysqli_query($connect,$posiadanie_gry);
$rekord10=mysqli_fetch_array($wynik10);


echo "login: $login<br>";
echo "Id: $rekord[0]<br>";
echo "Gra: $gra<br>";
echo "stan konta: $rekord2[1]<br>";
echo "Cena gry: $rekord3[0]<br>";
if($rekord10[0]!=$gra && $rekord10[1]!=$rekord[0])
{
if($rekord2[1]>=$rekord3[0])
{
  $dodawanie_do_biblioteki="INSERT INTO `biblioteka_gier` (`id`, `id_gry`, `id_uzytkownika`) VALUES (NULL, '$gra', '$rekord[0]');";
      $wynik7=mysqli_query($connect,$dodawanie_do_biblioteki);
  $podpierdalanie_kasy="UPDATE `uzytkownicy` SET `Stan_konta` = `Stan_konta`-$rekord3[0] WHERE `uzytkownicy`.`id` = '$rekord[0]';";
      $wynik8=mysqli_query($connect,$podpierdalanie_kasy);
    header("Location:sklep.php");
}
else{
    echo "za malo kasy<br>
    <a href='sklep.php'>Wroc</a>
    ";
    
}}
else{
    echo "masz juz ta gre";
}
?>