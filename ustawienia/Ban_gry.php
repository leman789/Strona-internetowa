<!DOCTYPE html>
<html >
<head>
    <link rel="stylesheet" href="../style/ustawienia.css" type="text/css">
    <link rel="stylesheet" href="../style/Ban_osoby.css" type="text/css">
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
        }
    ?>
        
    </div>
    <p id="wynik"></p>
<div id="prawa1">
<?php
$login=$_COOKIE["Clogin"];
$connect=mysqli_connect("localhost","root","","strona_z_grami");
$nazwa_gry=$_POST['Nazwa_gry'];
$Powod_gry=$_POST['Powod_gry'];
//pobieranie id osoby do zbanowania
$id_gry_z="SELECT id FROM `gry` WHERE Nazwa='$nazwa_gry'";
$id_gry_w=mysqli_query($connect,$id_gry_z);
$id_gry=mysqli_fetch_array($id_gry_w);
//wyświetlanie jej argumentow  
$gra_z="SELECT Nazwa,Opis,Cena,tworcy.Tworca,tworcy.Wydawca,Data_wydania,Obrazek FROM `gry` JOIN tworcy ON gry.id_tworcy=tworcy.id WHERE gry.id='$id_gry[0]'";
$gra_w=mysqli_query($connect,$gra_z);
?>
<form action='Ban_gry1.php' method='post'>
<?php 
    //początek menu
    echo  "<div id='prawa_1'>";
       while($gra=mysqli_fetch_array($gra_w))
    {
      echo "
       <div id='Avatar' class='argument'><img src='../Zdjecia_gier/okladki/$gra[6]' alt='avatar'></div>
       <div id='Nazwa' class='argument'>Nazwa: $gra[0]</div>
       <div id='Opis' class='argument'>Opis: $gra[1]</div>
       <div id='Cena' class='argument'>Cena: $gra[2]zł</div>
       <div id='Tworcy' class='argument'>Tworcy: $gra[3]</div>
       <div id='Wydawca' class='argument'>Wydawca: $gra[4]</div>
       <div id='Data_wydania' class='argument'>Data_wydania: $gra[5]</div>
       <div id='Napis' class='argument'>Czy na pewno chcesz zbanować?</div>
            <a href='panel_banowania.php' class='przycisk'>wstecz</a>
            <input type='hidden' name='hidden' value='$id_gry[0]'>
            <input type='hidden' name='Nazwa' value='$gra[0]'>
            <input type='hidden' name='Opis' value='$gra[1]'>
            <input type='hidden' name='Cena' value='$gra[2]'>
            <input type='hidden' name='Tworcy' value='$gra[3]'>
            <input type='hidden' name='Wydawca' value='$gra[4]'>
            <input type='hidden' name='Data_wydania' value='$gra[5]'>
            <input type='submit' value='zbanuj' id='zmien1' class='przycisk'>
       ";
    }
    echo   "</div>";
     mysqli_close($connect);
?>
</form>
</div>
</div>
</body>
</html>