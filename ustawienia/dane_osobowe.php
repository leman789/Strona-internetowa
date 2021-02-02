<!DOCTYPE html>
<html >
<head>
    <link rel="stylesheet" href="../style/ustawienia.css" type="text/css">
    <link rel="stylesheet" href="../style/dane_osobowe.css" type="text/css">
    <?php include('../menu/head_2.php');?>
        <?php include('uprawnienia.php');?>
</head>
<body>
    <?php include('../menu/menu_2.php');?>
    <div style="position:absolute; top:10%;" id="content">
    <div id="lewa">
     <a href="dane_osobowe.php"><div>Dane osobowe</div></a><br>
     <a href="doladuj.php"><div>Doladuj konto</div></a><br>
     <a href="transakcje.php"><div>Transakcje</div></a><br>
     <a href="zabezpieczenia.php"><div>Haslo i zabezpieczenia</div></a><br>
        <?php
        if($uprawnienia[0]!=0){
     echo "<a href='dodaj_gre.php'><div>Dodaj własną grę</div></a><br>";
     echo "<a href='statystyki_gier.php'><div>Statystyki gier</div></a><br>";
     echo "<a href='panel_gier.php'><div>Panel gier</div></a><br>";
        }?>
          <?php
        if($uprawnienia[0]==2){
             echo "<a href='panel_banowania.php'><div>Panel administratora</div></a><br>";
        }?>
    <a href="pomoc.php"><div>Pomoc</div></a><br>

    </div>
<div id="prawa">
<h2>USTAWIENIA OGÓLNE</h2>
<?php
    $zdj_avatara_p=$rekord[2];
// pobieranie id
$login=$_COOKIE["Clogin"];
$connect=mysqli_connect("localhost","root","","strona_z_grami");
$id_uzytkownika="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login'";
$id_uzytkownika_W=mysqli_query($connect,$id_uzytkownika);
$id_uzytkownika_R=mysqli_fetch_array($id_uzytkownika_W);
//wyswitlanie rekordow 
 
$zapytanie="SELECT `Imie`,`Nazwisko`,`Wiek`,`Avatar` FROM `uzytkownicy` WHERE `id`=$id_uzytkownika_R[0];";
$wynik=mysqli_query($connect,$zapytanie);
//wypisywanie zakropkowanych


 echo "<form action='dane_osobowe1.php' method='post'>";
while($rekord=mysqli_fetch_array($wynik))
{
    $text="$rekord[0]";
$a=strlen($text);
$odejmowanie=$a;
$odejmowanie--;
$ostatnia=$text[$odejmowanie];
$d=$text[0];
$gwiazdki='';
$znak='*';
for($i=0;$i!=$a-2;$i++)
{  
    $gwiazdki=$gwiazdki.$znak;
}
$wszystko=$d.$gwiazdki.$ostatnia;

$text1="$rekord[1]";
$a1=strlen($text1);
$odejmowanie1=$a1;
$odejmowanie1--;
$ostatnia1=$text1[$odejmowanie1];
$d1=$text1[0];
$gwiazdki1='';
$znak1='*';
for($i1=0;$i1!=$a1-2;$i1++)
{  
    $gwiazdki1=$gwiazdki1.$znak1;
}
$wszystko1=$d1.$gwiazdki1.$ostatnia1;

    echo "<div>Imie:</div> <input type='text' name='imie' placeholder='$wszystko' autocomplete='off'><br>
    <div>Nazwisko:</div> <input type='text' name='nazwisko' placeholder='$wszystko1' autocomplete='off'><br>
    <div>Wiek:</div> <input type='number' name='wiek' placeholder='$rekord[2]'><br>
   <input type='submit' value='zmien' id='zmien'>";
    
   
}
 echo "</form>";
echo "<br><h2>Zmiana swojego avatara</h2><img src='../Zdjecia_gier/avatar/$zdj_avatara_p' alt='zjd_avatara' height='150px' width='180px' id='avatar'>";
 echo " <form action='../Zdjecia_gier/avatar/plik2.php' method='POST' ENCTYPE='multipart/form-data'>";
   echo   " <div class='file-input'>
  <input type='file' name='plik' id='file' class='file'>
  <label for='file'>
    Wybierz plik ...
    <p class='file-name'></p>
  </label>
</div>
   <br>";
      echo "  <input type='submit' value='zapisz' id='zmien1'></form>";
    mysqli_close($connect);
?>
</div>
</div>
</body>
</html>