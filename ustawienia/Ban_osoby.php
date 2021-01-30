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
$login_ofiary=$_POST['login_ofiary'];
$Powod_osoby=$_POST['Powod_osoby'];
echo $login_ofiary;
//pobieranie id osoby do zbanowania
$id_ofiary_z="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login_ofiary'";
$id_ofiary_w=mysqli_query($connect,$id_ofiary_z);
$id_ofiary=mysqli_fetch_array($id_ofiary_w);
//wyświetlanie jej argumentow  
$ofiara_z="SELECT Imie,Nazwisko,Wiek,Avatar,dane_logowania.Login,dane_logowania.Haslo,dane_logowania.`E-mail` FROM `uzytkownicy` JOIN dane_logowania ON uzytkownicy.id=dane_logowania.id_uzytkownika WHERE id_uzytkownika='$id_ofiary[0]'";
$ofiara_w=mysqli_query($connect,$ofiara_z);
?>
<form action='Ban_osoby1.php' method='post'>
<?php 
    //początek menu
    echo  "<div id='prawa_1'>";
       while($ofiara=mysqli_fetch_array($ofiara_w))
    {
      echo "
       <div id='Avatar' class='argument'><img src='../Zdjecia_gier/avatar/$ofiara[3]' alt='avatar'></div>
       <div id='Imie' class='argument'>Imie: $ofiara[0]</div>
       <div id='Nazwisko' class='argument'>Nazwisko: $ofiara[1]</div>
       <div id='Wiek' class='argument'>Wiek: $ofiara[2]</div>
       <div id='Login' class='argument'>Login: $ofiara[4]</div>
       <div id='Haslo' class='argument'>Haslo: $ofiara[5]</div>
       <div id='E_mail' class='argument'>E-mail: $ofiara[6]</div>
       <div id='Napis' class='argument'>Czy na pewno chcesz zbanować?</div>
            <a href='panel_banowania.php' class='przycisk'>wstecz</a>
            <input type='hidden' name='hidden' value='$id_ofiary[0]'>
            <input type='hidden' name='login' value='$ofiara[4]'>
            <input type='hidden' name='imie' value='$ofiara[0]'>
            <input type='hidden' name='nazwisko' value='$ofiara[1]'>
            <input type='hidden' name='opis_bana' value='$Powod_osoby'>
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