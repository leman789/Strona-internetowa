<?php
   $host="localhost";
    $uzytkownik="root";
    $haslo="";
    $dbname="strona_z_grami";
    $dsn="mysql:host=$host;dbname=$dbname;";
    $PDO = new PDO($dsn,$uzytkownik,$haslo);
    $login=$_COOKIE["Clogin"];
    $id_uzytkownika="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login'";
    $id_uzytkownika_W=$PDO->query($id_uzytkownika);
    foreach($id_uzytkownika_W as $id_uzytkownika_R)
    $uprawnienia_z="SELECT `uprawnienia` FROM `dane_logowania` WHERE `id_uzytkownika` = $id_uzytkownika_R[0]";
    $uprawnienia_w=$PDO->query($uprawnienia_z);
    foreach($uprawnienia_w as $uprawnienia)
 $PDO = null;
?>