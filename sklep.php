<!DOCTYPE html>
<html>
<head>
    <title>Gpoint</title>
    <meta charset="utf-8">
    <meta name="description" content="Zobacz najnowsze promocje na naszej stronie !">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="menu.css" type="text/css">
    <link rel="stylesheet" href="style/sklep.css" type="text/css">
    <?php 
    $host="localhost";
    $uzytkownik="root";
    $haslo="";
    $dbname="strona_z_grami";
    $dsn="mysql:host=$host;dbname=$dbname;";
    $PDO = new PDO($dsn,$uzytkownik,$haslo);
    
    //pobieranie id z loginu
    $login=$_COOKIE["Clogin"];
    $id_uzytkownika="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login'";
    $id_uzytkownika_W=$PDO->query($id_uzytkownika);
    foreach($id_uzytkownika_W as $id_uzytkownika_R)
    //zapytanie
    $zapytanie="SELECT id,Imie,Avatar FROM `uzytkownicy` where id='$id_uzytkownika_R[0]'";
    $wynik=$PDO->query($zapytanie);
    foreach($wynik as $rekord){ 
    }
    //stan konta uzytkownika
    $stan_konta_elwys="SELECT `Stan_konta` FROM `uzytkownicy` WHERE `id` = $rekord[0]";
    $stan_konta_elwys_w=$PDO->query($stan_konta_elwys);
    foreach($stan_konta_elwys_w as $stan_konta_elwys_r)
    ?>
</head>
<body>
    <script>
        let x=0;
        function wysun()
        {
            x++;
            if(x==1){
                    document.getElementById("elwys1").innerHTML="<div id='elwys'><?php echo "<a id='elwys2' href='ustawienia/doladuj.php'><div>Stan Konta:".$stan_konta_elwys_r[0]."zł</div></a><br>" ?><a href='ustawienia/dane_osobowe.php' id='elwys3'><div>ustawienia</div></a><br><a href='wyloguj.php' id='elwys4'><div>wyloguj</div></a><br></div>";
                }
            else if(x>1){
                    x=0;
                    document.getElementById("elwys1").innerHTML="";
                }
        }
    </script>
    <div id="elwys1"></div>
    <div id="menu">
        <?php
        if(isset($_COOKIE["Clogin"]))//logowanie po zalogowaniu
        {
        echo "<a id='Zalogowany' data-tooltip='xd'>
        <div id='nick'>
         $rekord[1]
        </div>
        <div>
            <img src='Zdjecia_gier/avatar/$rekord[2]' alt='awatar' width='45px'>
            <input type='button' onclick='wysun()' id='wysun'>
        </div>
        </a>";
        }
        
        else//przed zalogowaniem
            {
            echo "<a href='logowanie.php'  id='Zaloguj'><div> 
            Logowanie
            </div> </a>";
            }
        ?>
       
        
        <div id="Puste_pole"></div>
        
        <?php
        if(isset($_COOKIE["Clogin"]))//biblioteka po zalogowaniu
        {
        echo "<a href='biblioteka.php' id='Biblioteka'>
            <div> 
                Biblioteka
            </div>
            </a>";
        }
        else
           {
        echo "<a href='logowanie.php' id='Biblioteka'>
            <div> 
                Biblioteka
            </div>
            </a>";
        } 
        ?>
        <div id="Puste_pole1" class="Tlo"></div>
        <?php
        if(isset($_COOKIE["Clogin"]))//sklep po zalogowaniu
        {
        echo "<a href='sklep.php' id='Sklep'>
        <div>
           Sklep
        </div>
        </a>";
        }
        else
         {
        echo "<a href='logowanie.php' id='Sklep'>
        <div>
           Sklep
        </div>
        </a>";
        }
        ?>
        <div id="Puste_pole" class="Tlo"></div>
        <a href="index.php" id="Logo">
        <div >
            Logo
        </div>
        </a>  
    </div>
    <div id="content" style=" width: 100%; position:absolute; top:10%;">
    <?php
    // pobieranie id 
$login=$_COOKIE["Clogin"];
$connect=mysqli_connect("localhost","root","","strona_z_grami");
$id_uzytkownika="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login'";
$id_uzytkownika_W=mysqli_query($connect,$id_uzytkownika);
$id_uzytkownika_R=mysqli_fetch_array($id_uzytkownika_W);
echo "<form action='' method='post'>";
echo "Nazwa gry <input type='text' name='napis' placeholder='wpisz nazwe gry'>";
echo "<input type='submit' value='szukaj'>";
echo "</form><br>";
 echo "<form action='' method='post'>";
 echo "<input type='checkbox' name='multip'>Multi player <br>";
 echo "<input type='checkbox' name='singlep'>Single player <br>";
 echo "<input type='checkbox' name='fps'>Fps <br>";
 echo "<input type='checkbox' name='mmo'>Mmo  <br>";
 echo "<input type='checkbox' name='rpg'>rpg <br>";
 echo "<input type='checkbox' name='moba'>moba<br>";
 echo "<input type='checkbox' name='inne'>inne<br>";
 echo "<input type='submit' value='szukaj'><br>";
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
$biblioteka="SELECT gry.id,Nazwa,Obrazek,Alt_obrazka FROM `gry` JOIN gatunki on gatunki.id_gry=gry.id JOIN gatunki_multi_single ON gatunki_multi_single.id_gry=gry.id GROUP BY gry.id";
 
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
$biblioteka="SELECT gry.id,Nazwa,Obrazek,Alt_obrazka FROM `gry` JOIN gatunki on gatunki.id_gry=gry.id JOIN gatunki_multi_single ON gatunki_multi_single.id_gry=gry.id GROUP BY gry.id";
else 
{
    $biblioteka="SELECT gry.id,Nazwa,Obrazek,Alt_obrazka FROM `gry` JOIN gatunki on gatunki.id_gry=gry.id JOIN gatunki_multi_single ON gatunki_multi_single.id_gry=gry.id  GROUP BY gry.id";
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
if($biblioteka_W)
{
while($biblioteka_R=mysqli_fetch_array($biblioteka_W))
{
    $kup="kup";
    $noniewiem="<input type='submit' value='$kup'>";
    $href="";
    foreach($id_gier as $value){
        if($value==$biblioteka_R[0]){
            $kup="masz";
            $noniewiem="$kup";
            $href="biblioteka.php";
        }
    }
    echo " <a href='$href'><div id='okladka'>
    <img src='Zdjecia_gier/okladki/$biblioteka_R[2]' alt='$biblioteka_R[3]' width='150px' height='185px' id='okladka_obraz'><br>
        $biblioteka_R[1]
        $biblioteka_R[0]
        <form action='sklep/zakup.php' method='post'>
        <input type='hidden' name='id' value='$biblioteka_R[0]'>
        <br>$noniewiem </form></div></a>
        ";
}
 }
 else
?>
</div>
</body>
</html>