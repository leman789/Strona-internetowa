<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" href="../style/ustawienia.css" type="text/css">
    <link rel="stylesheet" href="../style/zabezpieczenia.css" type="text/css">
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
<h2>ZMIEŃ HASŁO</h2>
<p>Ze względów bezpieczeństwa gorąco zalecamy wybranie takiego hasła, którego nie używasz w żadnym innym koncie internetowym.</p>
<?php
// pobieranie id
$login=$_COOKIE["Clogin"];
$connect=mysqli_connect("localhost","root","","strona_z_grami");
$id_uzytkownika="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login'";
$id_uzytkownika_W=mysqli_query($connect,$id_uzytkownika);
$id_uzytkownika_R=mysqli_fetch_array($id_uzytkownika_W);
//wyswitlanie rekordow 
 
$zapytanie="SELECT `Haslo`,`E-mail` FROM `dane_logowania` WHERE `id_uzytkownika`=$id_uzytkownika_R[0];";
$wynik=mysqli_query($connect,$zapytanie);
while($rekord_haslo=mysqli_fetch_array($wynik))
{
    $haslo_z_bazy=$rekord_haslo[0];
    $emial_z_bazy=$rekord_haslo[1];
}
 echo "<form action='' method='post'>";
    echo "<div>Aktualne hasło</div><br> <input  type='password' name='stare_haslo' placeholder='aktualne haslo' ><br>
    <div>Nowe haslo</div><br> <input type='password' name='nowe_haslo' placeholder='nowe haslo' ><br>
    <div>Powtórz nowe haslo</div><br> <input  type='password' name='nowe_hasloP' placeholder='powtórz nowe haslo' ><br>
    <input type='reset' value='odrzuć zmiany' id='przycisk'><input type='submit' value='zmien' id='przycisk'>";
 echo "</form>";
 if(isset($_POST['stare_haslo']) && isset($_POST['nowe_haslo'])&& isset($_POST['nowe_hasloP']))
 { 
 $aktualne_haslo=$_POST['stare_haslo'];
 $nowe_haslo=$_POST['nowe_haslo'];
 $nowe_hasloP=$_POST['nowe_hasloP'];
 $i=0;
 if($aktualne_haslo!=$haslo_z_bazy)
 {
     echo "<em>Wpisane aktualne haslo jest błędne</em><br>";
     $i++;
 }
 if($nowe_haslo!=$nowe_hasloP)
 {
     echo "<em>Nowe hasła nie są takie same</em><br>";
     $i++;
 }
 if($nowe_haslo==$haslo_z_bazy)
 {
     echo "<em>Te hasło już jest ustawiane na twoim koncie</em><br>";
     $i++;
 }
 if(strlen($nowe_haslo)<7)
 {
     echo "<em>Nowe hasło jest za krótkie</em><br>";
     $i++;
 }
 $ile=0;
 $dlugosc=strlen($nowe_haslo);
 $ile=$dlugosc;
 for($e=0;$e<$dlugosc;$e++)
 {
    
    if($nowe_haslo[$e]=='0'||$nowe_haslo[$e]=='1'||$nowe_haslo[$e]=='2'||$nowe_haslo[$e]=='3'||$nowe_haslo[$e]=='4'||$nowe_haslo[$e]=='5'||$nowe_haslo[$e]=='6'||$nowe_haslo[$e]=='7'||$nowe_haslo[$e]=='8'||$nowe_haslo[$e]=='9')
     {
       $ile--;
         
     }    
 }
  if($ile==$dlugosc)
  {
      echo "<em>Hasło nie posiada liczb</em>";
      $i++;
  }
  if($i==0)
  {
    $zapytanie_zmiana_hasla="UPDATE `dane_logowania` SET `Haslo` = '$nowe_haslo' WHERE id_uzytkownika = $id_uzytkownika_R[0];";
    $wynik_zmiana_hasla=mysqli_query($connect,$zapytanie_zmiana_hasla);
    echo "udało sie zmienić hasło";
  }
  
 }
 mysqli_close($connect);
?>
<p>TWOJE HASŁO:<br>
*Twoje hasło musi mieć co najmniej 7 znaków<br>
*Twoje hasło musi zawierać co najmniej 1 cyfrę<br>
*Zalecane jest użycie znaków specjalnych<br></p>
</div>
</div>
</body>
</html>