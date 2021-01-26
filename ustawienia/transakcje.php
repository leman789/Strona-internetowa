<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../style/ustawienia.css" type="text/css">
    <link rel="stylesheet" href="../style/transakcje.css" type="text/css">
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

    </div>
<div id="prawa">
    <h2>HISTORIA PŁATNOŚCI</h2>

<?php
$login=$_COOKIE["Clogin"];
$connect=mysqli_connect("localhost","root","","strona_z_grami");
$id_uzytkownika="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login'";
$id_uzytkownika_W=mysqli_query($connect,$id_uzytkownika);
$id_uzytkownika_R=mysqli_fetch_array($id_uzytkownika_W);
// wyswietlanie zawartosc
$zapytanie="SELECT `kwota`,`metoda`,`czas`,`nazwa_gry` FROM `tranzakcje` where `id_uzytkownika`=$id_uzytkownika_R[0]";
    echo "<table>";
    echo "<tr><th>kwota:</th><th>metoda płatoność:</th><th>data:</th><th>opis:</th></tr>";
$wynik=mysqli_query($connect,$zapytanie);
while($rekord=mysqli_fetch_array($wynik))
{
    if($rekord[1]==0)
    $rekord[1]="Pobranie z konta";
     else if($rekord[1]==1)
    $rekord[1]="konto bankowe";
    else if($rekord[1]==2)
    $rekord[1]="Play";
    else if($rekord[1]==3)
    $rekord[1]="PayPal";
    if($rekord[3]=='0')
    $rekord[3]='doładowanie konta';
    else if($rekord[3]!='0')
    {
        $nazwa_gry=$rekord[3];
        $rekord[3]='kupno gry :'.$nazwa_gry;  
    }

   echo "<tr> <td>$rekord[0]zł</td> <td>$rekord[1]</td> <td>$rekord[2]</td> <td>$rekord[3]</td></tr>";
}
    echo "</table>";
    mysqli_close($connect);
?>
</div>
</div>
</body>
</html>