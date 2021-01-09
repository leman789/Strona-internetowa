<!DOCTYPE html>
<html>
<head>
    <title>Gpoint</title>
    <meta charset="utf-8">
    <meta name="description" content="Zobacz najnowsze promocje na naszej stronie !">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="menu.css" type="text/css">
    <link rel="stylesheet" href="style/biblioteka.css" type="text/css">
    <?php 
    $host="localhost";
    $uzytkownik="root";
    $haslo="";
    $dbname="strona_z_grami";
    $dsn="mysql:host=$host;dbname=$dbname;";
    $PDO = new PDO($dsn,$uzytkownik,$haslo);
    $zapytanie="SELECT id,Imie,Avatar FROM `uzytkownicy` LIMIT 1";
    $wynik=$PDO->query($zapytanie);
    foreach($wynik as $rekord){ 
    }
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
                    document.getElementById("elwys1").innerHTML="<div id='elwys'><?php echo "<a id='elwys2'> Stan Konta:".$stan_konta_elwys_r[0]."zł</a><br>" ?><a href='ustawienia/dane_osobowe.php' id='elwys2'>ustawienia</a><br><a href='wyloguj.php' id='elwys2'>wyloguj</a><br></div>";
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
 echo "<input type='radio' value='1' name='gra'>Multi player <br>";
 echo "<input type='radio' value='2' name='gra'>Single player <br>";
 echo "<input type='radio' value='3' name='gra'>Fps <br>";
 echo "<input type='radio' value='4' name='gra'>Mmo  <br>";
 echo "<input type='radio' value='5' name='gra'>rpg <br>";
 echo "<input type='radio' value='6' name='gra'>moba<br>";
 echo "<input type='radio' value='7' name='gra'>inne<br>";
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

// sprawdzanie ktory wybrac
if(isset($_POST['fps'])||isset($_POST['multip'])||isset($_POST['singlep']))
$biblioteka="SELECT gry.id,Nazwa,Obrazek,Alt_obrazka FROM `gry` JOIN biblioteka_gier ON biblioteka_gier.id_gry=gry.id JOIN uzytkownicy ON uzytkownicy.id=biblioteka_gier.id_uzytkownika JOIN gatunki on gatunki.id_gry=gry.id WHERE  `multiplayer`=$multip and `singleplayer`=$singlep and `fps`=$fps and `mmo`=$mmo and `rpg`=$rpg and`moba`=$moba";
else if( isset($_POST['inne']))
$biblioteka="SELECT gry.id,Nazwa,Obrazek,Alt_obrazka FROM `gry` JOIN biblioteka_gier ON biblioteka_gier.id_gry=gry.id JOIN uzytkownicy ON uzytkownicy.id=biblioteka_gier.id_uzytkownika JOIN gatunki on gatunki.id_gry=gry.id WHERE biblioteka_gier.id_uzytkownika=$id_uzytkownika_R[0] and `inne`=$inne";
else
$biblioteka="SELECT gry.id,Nazwa,Obrazek,Alt_obrazka FROM `gry` JOIN biblioteka_gier ON biblioteka_gier.id_gry=gry.id JOIN uzytkownicy ON uzytkownicy.id=biblioteka_gier.id_uzytkownika JOIN gatunki on gatunki.id_gry=gry.id WHERE biblioteka_gier.id_uzytkownika=$id_uzytkownika_R[0]";

echo $singlep;
// wyswietlanie bibioteki
$biblioteka_W=mysqli_query($connect,$biblioteka);
while($biblioteka_R=mysqli_fetch_array($biblioteka_W))
{
    echo " <a href='biblioteka.php'><div id='okladka'>
    <img src='Zdjecia_gier/okladki/$biblioteka_R[2]' alt='$biblioteka_R[3]' width='150px' height='185px' id='okladka_obraz'><br>
        $biblioteka_R[1]
    </div></a>";
}

?>
</div>
</body>

</html>