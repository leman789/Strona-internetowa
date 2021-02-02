<!DOCTYPE html>
<html >
<head>
    <link rel="stylesheet" href="../style/ustawienia.css" type="text/css">
    <link rel="stylesheet" href="../style/pomoc.css" type="text/css">
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
    <a href="pomoc.php"><div>Pomoc</div></a><br>
    </div>
<div id="prawa">
<div id='prawa_1'>
<h1>Dział pomocy</h1>
<h2>Zgłoszenie błędu</h2>
<p>Jeżeli zauważyłeś/aś problem na strone i chcesz go zgłosić, to proszę napisać na E-mail: <span id="email">Gspot.problems@gmail.com</span>.</p>
<h2>Jak dodać własną grę?</h2>
    <p>Aby móc dodawać własne gry należy napisać na E-mail: <span id="email">Gspot.permissions@gmail.com</span>. W wiadomości należy podać nazwę gry, opis, oraz załączyć kilka zdjęć z gry.</p>
</div>
</div>
</div>
</body>
</html>