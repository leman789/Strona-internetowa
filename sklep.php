<!DOCTYPE html>
<html>
<head>
   <?php include('menu/head_1.php');?>
    <link rel="stylesheet" href="style/sklep.css" type="text/css">
</head>
<body>
    <?php include('menu/menu_1.php');?>
    <div id="content" style=" width: 100%; position:absolute; top:10%;">
    <?php
    // pobieranie id 
$login=$_COOKIE["Clogin"];
$connect=mysqli_connect("localhost","root","","strona_z_grami");
$id_uzytkownika="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login'";
$id_uzytkownika_W=mysqli_query($connect,$id_uzytkownika);
$id_uzytkownika_R=mysqli_fetch_array($id_uzytkownika_W);
echo "<form action='' method='post'>";
echo "<div id='gora'><input type='text' name='napis' placeholder='wpisz nazwe gry'size='50%'>";
echo "<input type='submit' value='szukaj' id='szukaj2'></div>";
echo "</form><br>";
 echo "<form action='' method='post'>";
 echo "<div id='lewo'>";
 echo "<label class='container'><input type='checkbox' name='multip'>Multi player <span  class='checkmark'></span></label>";
 echo "<label class='container'><input type='checkbox' name='singlep'>Single player <span class='checkmark'></span></label>";
 echo "<label class='container'><input type='checkbox' name='fps'>Fps <span class='checkmark'><span></label>";
 echo "<label class='container'><input type='checkbox' name='mmo'>MMO  <span class='checkmark'><span></label>";
 echo "<label class='container'><input type='checkbox' name='rpg'>RPG <span class='checkmark'><span></label>";
 echo "<label class='container'><input type='checkbox' name='moba'>Moba <span class='checkmark'><span></label>";
 echo "<label class='container'><input type='checkbox' name='inne'>inne <span class='checkmark'><span></label>";
 echo "<input type='submit' value='szukaj' id='szukaj'><br>";
 echo "</div>";
echo "</form>";
// trzeba ogarnąć jak pobrac value bo nie można uzyc tego sposobu :/ 
$multip=0;
$singlep=0;
$fps=0;
$mmo=0;
$rpg=0;
$moba=0;
$inne=0;
if(isset($_POST['multip']))
$multip=1;
if(isset($_POST['singlep']))
$singlep=1;
if(isset($_POST['fps']))
$fps=1;
if(isset($_POST['mmo']))
$mmo=1;
if(isset($_POST['rpg']))
$rpg=1;
if(isset($_POST['moba']))
$moba=1;
if(isset($_POST['inne']))
{
    $inne=1;
}
////////////////////////////////////////// dalsze problemy jak w bazie danych nie ma tej gry to sie nie wyswitla komunikat że jej nie ma nie wiem jak to zrobic , po wejsciu na strone nie wyswitlają sie wszystkiee gry uzytkownika
// sprawdzanie ktory wybrac
$biblioteka="SELECT id FROM `gry`";
 
 if(isset($_POST['multip']) && $fps==1 && $mmo==0 && $rpg==0 && $moba==0 && $inne==0)
{
    $biblioteka="SELECT gry.id,Nazwa,Obrazek,Alt_obrazka FROM `gry` JOIN gatunki on gatunki.id_gry=gry.id JOIN gatunki_multi_single ON gatunki_multi_single.id_gry=gry.id WHERE `multip`=1 and `fps`=1 GROUP BY gry.id";
}
else if (isset($_POST['multip']) && $fps==0 && $mmo==1 && $rpg==0 && $moba==0 && $inne==0)
$biblioteka="SELECT gry.id,Nazwa,Obrazek,Alt_obrazka FROM `gry` JOIN gatunki on gatunki.id_gry=gry.id JOIN gatunki_multi_single ON gatunki_multi_single.id_gry=gry.id WHERE `multip`=1 and `mmo`=1 GROUP BY gry.id";
else if(isset($_POST['napis']))
{
$napis=$_POST['napis'];
$biblioteka="SELECT gry.id,Nazwa,Obrazek,Alt_obrazka FROM `gry` JOIN gatunki on gatunki.id_gry=gry.id JOIN gatunki_multi_single ON gatunki_multi_single.id_gry=gry.id WHERE `Nazwa` like '%$napis%' GROUP BY gry.id";
}
else if (isset($_POST['multip']) && $fps==0 && $mmo==0 && $rpg==1 && $moba==0 && $inne==0)
$biblioteka="SELECT gry.id,Nazwa,Obrazek,Alt_obrazka FROM `gry` JOIN gatunki on gatunki.id_gry=gry.id JOIN gatunki_multi_single ON gatunki_multi_single.id_gry=gry.id WHERE  `multip`=1 and `rpg`=1 GROUP BY gry.id";
else if (isset($_POST['multip']) && $fps==0 && $mmo==0 && $rpg==0 && $moba==1 && $inne==0)
$biblioteka="SELECT gry.id,Nazwa,Obrazek,Alt_obrazka FROM `gry` JOIN gatunki on gatunki.id_gry=gry.id JOIN gatunki_multi_single ON gatunki_multi_single.id_gry=gry.id WHERE `multip`=1 and `moba`=1 GROUP BY gry.id";
else if (isset($_POST['multip']) && $fps==0 && $mmo==0 && $rpg==0 && $moba==0 && $inne==1)
$biblioteka="SELECT gry.id,Nazwa,Obrazek,Alt_obrazka FROM `gry` JOIN gatunki on gatunki.id_gry=gry.id JOIN gatunki_multi_single ON gatunki_multi_single.id_gry=gry.id WHERE `multip`=1 and `inne`=1 GROUP BY gry.id";

else if(isset($_POST['singlep']) && $fps==1 && $mmo==0 && $rpg==0 && $moba==0 && $inne==0)
{
    $biblioteka="SELECT gry.id,Nazwa,Obrazek,Alt_obrazka FROM `gry` JOIN gatunki on gatunki.id_gry=gry.id JOIN gatunki_multi_single ON gatunki_multi_single.id_gry=gry.id WHERE  `singlep`=1 and `fps`=1 GROUP BY gry.id";
}
else if (isset($_POST['singlep']) && $fps==0 && $mmo==1 && $rpg==0 && $moba==0 && $inne==0)
$biblioteka="SELECT gry.id,Nazwa,Obrazek,Alt_obrazka FROM `gry` JOIN gatunki on gatunki.id_gry=gry.id JOIN gatunki_multi_single ON gatunki_multi_single.id_gry=gry.id WHERE `singlep`=1 and `mmo`=1 GROUP BY gry.id";
else if (isset($_POST['singlep']) && $fps==0 && $mmo==0 && $rpg==1 && $moba==0 && $inne==0)
$biblioteka="SELECT gry.id,Nazwa,Obrazek,Alt_obrazka FROM `gry` JOIN gatunki on gatunki.id_gry=gry.id JOIN gatunki_multi_single ON gatunki_multi_single.id_gry=gry.id WHERE  `singlep`=1 and `rpg`=1 GROUP BY gry.id";
else if (isset($_POST['singlep']) && $fps==0 && $mmo==0 && $rpg==0 && $moba==1 && $inne==0)
$biblioteka="SELECT gry.id,Nazwa,Obrazek,Alt_obrazka FROM `gry`  JOIN gatunki on gatunki.id_gry=gry.id JOIN gatunki_multi_single ON gatunki_multi_single.id_gry=gry.id WHERE  `singlep`=1 and `moba`=1 GROUP BY gry.id";
else if (isset($_POST['singlep']) && $fps==0 && $mmo==0 && $rpg==0 && $moba==0 && $inne==1)
$biblioteka="SELECT gry.id,Nazwa,Obrazek,Alt_obrazka FROM `gry`  JOIN gatunki on gatunki.id_gry=gry.id JOIN gatunki_multi_single ON gatunki_multi_single.id_gry=gry.id WHERE `singlep`=1 and `inne`=1 GROUP BY gry.id";


else if  (isset($_POST['multip'])  && $fps==0 && $mmo==0 && $rpg==0 && $moba==0 && $inne==0)
$biblioteka="SELECT gry.id,Nazwa,Obrazek,Alt_obrazka FROM `gry` JOIN gatunki on gatunki.id_gry=gry.id JOIN gatunki_multi_single ON gatunki_multi_single.id_gry=gry.id WHERE  `multip`=$multip  GROUP BY gry.id";
else if (isset($_POST['singlep']) && $inne==0 && $fps==0 && $mmo==0 && $rpg==0 && $moba==0 )
$biblioteka="SELECT gry.id,Nazwa,Obrazek,Alt_obrazka FROM `gry` JOIN gatunki on gatunki.id_gry=gry.id JOIN gatunki_multi_single ON gatunki_multi_single.id_gry=gry.id WHERE   `singlep`=$singlep GROUP BY gry.id";
else if(isset($_POST['fps']) || isset($_POST['mmo']) || isset($_POST['rpg'])|| isset($_POST['moba']) &&$multip==0 && $singlep==0)
$biblioteka="SELECT gry.id,Nazwa,Obrazek,Alt_obrazka FROM `gry` JOIN gatunki on gatunki.id_gry=gry.id JOIN gatunki_multi_single ON gatunki_multi_single.id_gry=gry.id WHERE   `fps`=$fps and `mmo`=$mmo and `rpg`=$rpg and `moba`=$moba GROUP BY gry.id";
else if($inne==1 && $fps==0 && $mmo==0 && $rpg==0 && $moba==0 && $multip==0 && $singlep==0)
$biblioteka="SELECT gry.id,Nazwa,Obrazek,Alt_obrazka FROM `gry` JOIN gatunki on gatunki.id_gry=gry.id JOIN gatunki_multi_single ON gatunki_multi_single.id_gry=gry.id WHERE `inne`=$inne GROUP BY gry.id";

else  if( $inne==0 && $fps==0 && $mmo==0 && $rpg==0 && $moba==0 && $multip==0 && $singlep==0)
$biblioteka="SELECT gry.id,Nazwa,Obrazek,Alt_obrazka FROM `gry`";
else 
{
    $biblioteka="SELECT gry.id,Nazwa,Obrazek,Alt_obrazka FROM `gry`";
    echo "nie znaleziono wyniku ";
}
$id_gier=[];
$i=0;
$zapytanie_1="SELECT id_gry FROM `biblioteka_gier` WHERE id_uzytkownika = '$id_uzytkownika_R[0]'";
$wynik_1=mysqli_query($connect,$zapytanie_1);
while($rekord_1=mysqli_fetch_array($wynik_1))
        {
            $id_gier[$i]=$rekord_1[0];
            $i++;
        }
$gry="SELECT id FROM `gry`";
$wynik_2=mysqli_query($connect,$zapytanie);
$rekord_2=mysqli_fetch_array($wynik_2);
// wyswietlanie bibioteki
$biblioteka_W=mysqli_query($connect,$biblioteka);
        echo "<div id='prawo'>";
while($biblioteka_R=mysqli_fetch_array($biblioteka_W))
{
    $kup="kup";
    foreach($id_gier as $value){
        if($value==$biblioteka_R[0]){
            $kup="pobierz";
        }
    }
    echo " <form action='sklep/zakup.php' method='post'><div id='okladka'>
    <button type='submit' class='button'>
    <img src='Zdjecia_gier/okladki/$biblioteka_R[2]' alt='$biblioteka_R[3]' width='150px' height='185px' id='okladka_obraz'><br>
        <div id='napis'>
        $biblioteka_R[1]<br>
        ($kup)</div>
          </button>
        <input type='hidden' name='id' value='$biblioteka_R[0]'>
        </form></div>
        ";
}
 echo "</div>";
?>
</div>
</body>
</html>