<?php
$imie=$_POST['imie'];
$nazwisko=$_POST['nazwisko'];
$email=$_POST['email'];
$wiek=$_POST['wiek'];
$login=$_POST['login'];
$haslo1=$_POST['haslo1'];
$haslo2=$_POST['haslo2'];
if(isset($imie)&& isset($nazwisko)&& isset($email)&& isset($wiek)&& isset($login)&& isset($haslo1)&& isset($haslo2) && $haslo1==$haslo2){
    echo "sads";
    $connect=mysqli_connect("localhost","root","","strona_z_grami");

    mysqli_close($connect);
}
?>