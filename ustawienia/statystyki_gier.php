<!DOCTYPE html>
<html >
<head>
    <link rel="stylesheet" href="../style/ustawienia.css" type="text/css">
    <link rel="stylesheet" href="../style/dane_osobowe.css" type="text/css">
    <?php include('../menu/head_2.php');?>
</head>
<body>
    <?php include('../menu/menu_2.php');?>
    <div style="position:absolute; top:10%;" id="content">
    <div id="lewa">
     <a href="dane_osobowe.php"><div>Dane osobowe</div></a><br>
     <a href="doladuj.php"><div>Doladuj konto</div></a><br>
     <a href="transakcje.php"><div>Transakcje</div></a><br>
     <a href="zabezpieczenia.php"><div>Haslo i zabezpieczenia</div></a><br>
     <a href="dodaj_gre.php"><div>Dodaj własną grę</div></a><br>
     <a href="statystyki_gier.php"><div>Statystyki gier</div></a><br>
     <a href="panel_gier.php"><div>Panel gier</div></a><br>
     <?php
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
     ?>

    </div>
<div id="prawa">
<h2>Statystyki</h2>
<?php
    $zdj_avatara_p=$rekord[2];
// pobieranie id
$login=$_COOKIE["Clogin"];
$connect=mysqli_connect("localhost","root","","strona_z_grami");
$id_uzytkownika="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login'";
$id_uzytkownika_W=mysqli_query($connect,$id_uzytkownika);
$id_uzytkownika_R=mysqli_fetch_array($id_uzytkownika_W);
//wyswitlanie rekordow 
 

    mysqli_close($connect);
?>
</div>
</div>
</body>
</html>