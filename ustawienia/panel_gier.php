<!DOCTYPE html>
<html >
<head>
    <link rel="stylesheet" href="../style/ustawienia.css" type="text/css">
    
    <link rel="stylesheet" href="../style/panel_gier.css" type="text/css">
    <?php include('../menu/head_2.php');?>
     <?php include('uprawnienia.php');?>
</head>
<body>
    <?php include('../menu/menu_2.php');?>
    <div style="position:absolute; top:10%;" id="content">
    <div id="lewa">
    <?php include('ustawienia_lewa.php');?>
    </div>
<div id="prawa">
<h2>Panel gier</h2>
<?php
    $zdj_avatara_p=$rekord[2];
// pobieranie id
$login=$_COOKIE["Clogin"];
$connect=mysqli_connect("localhost","root","","strona_z_grami");
$id_uzytkownika="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login'";
$id_uzytkownika_W=mysqli_query($connect,$id_uzytkownika);
$id_uzytkownika_R=mysqli_fetch_array($id_uzytkownika_W);
//wyswitlanie rekordow 
$ile_masz_gier="SELECT COUNT(`id`) FROM `gry` WHERE `id_dodajacego`=$id_uzytkownika_R[0]";
$ile_masz_gier_W=mysqli_query($connect,$ile_masz_gier);
$ile_masz_gier_Z=mysqli_fetch_array($ile_masz_gier_W);
 $zapytanie_wszystkie_gry="SELECT `id`,`Nazwa`,`Opis`,`Cena`,`id_tworcy`,`Data_wydania`,`Obrazek`,`Alt_obrazka`,`id_specyfikacja` FROM `gry` WHERE `id_dodajacego`=$id_uzytkownika_R[0]";
 $zapytanie_wszystkie_gry_W=mysqli_query($connect,$zapytanie_wszystkie_gry);
 $i=0;
 while($zapytanie_wszystkie_gry_R=mysqli_fetch_array($zapytanie_wszystkie_gry_W))
 {
     echo "<div id='wyswietlanie'>
      <form action='panel_gier1.php' method='post'>
      <input type='hidden' name='id_gry' value='$zapytanie_wszystkie_gry_R[0]'>
    <div id='nazwa'>$zapytanie_wszystkie_gry_R[1]</div>
   
    <div id='przycisk'><input class='przycisk' type='submit' value='zmien'></div><br>
    
    </form>
     </div>" ;
   
 }
 


    mysqli_close($connect);
?>



</div>
</div>
</body>
</html>