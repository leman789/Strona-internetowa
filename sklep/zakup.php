<!DOCTYPE html>
<html>
<head>
    <title>Gpoint</title>
    <meta charset="utf-8">
    <meta name="description" content="Zobacz najnowsze promocje na naszej stronie !">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <link rel="stylesheet" href="../menu.css" type="text/css">
     <link rel="stylesheet" href="../style/zakup.css" type="text/css">
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
    $PDO = null;
    ?>
</head>
<body>
    <script>
        let x=0;
    function wysun()
        {
            x++;
            if(x==1){
                    document.getElementById("elwys1").innerHTML="<div id='elwys'><?php echo "<a id='elwys2'> Stan Konta:".$stan_konta_elwys_r[0]."zł</a><br>" ?><a href='../ustawienia/dane_osobowe.php' id='elwys2'>ustawienia</a><br><a href='../wyloguj.php' id='elwys2'>wyloguj</a><br></div>";
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
            <img src='../Zdjecia_gier/avatar/$rekord[2]' alt='awatar' id='avatar'>
            <input type='button' onclick='wysun()' id='wysun'>
        </div>
        </a>";
        }
        
        else//przed zalogowaniem
            {
            echo "<a href='../logowanie.php'  id='Zaloguj'><div> 
            Logowanie
            </div> </a>";
            }
        ?>
       
        
        <div id="Puste_pole"></div>
        
        <?php
        if(isset($_COOKIE["Clogin"]))//biblioteka po zalogowaniu
        {
        echo "<a href='../biblioteka.php' id='Biblioteka'>
            <div> 
                Biblioteka
            </div>
            </a>";
        }
        else
           {
        echo "<a href='../logowanie.php' id='Biblioteka'>
            <div> 
                Biblioteka
            </div>
            </a>";
        } 
        ?>
        
        <?php
        if(isset($_COOKIE["Clogin"]))//sklep po zalogowaniu
        {
        echo "<a href='../sklep.php' id='Sklep'>
        <div>
           Sklep
        </div>
        </a>";
        }
        else
         {
        echo "<a href='../logowanie.php' id='Sklep'>
        <div>
           Sklep
        </div>
        </a>";
        }
        ?>
        <div id="Puste_pole" class="Tlo"></div>
        <a href="../index.php">
        <div id="Logo">
            Logo
        </div>
        </a>  
    </div>
    <div id="content">
    <?php
$connect=mysqli_connect("localhost","root","","strona_z_grami");
        if(isset($_POST['id2']))
           {
                $id2=$_POST['id2'];
                $pobieranie_id_gry_z="SELECT id_gry FROM `top_5` WHERE id=$id2";
                $pobieranie_id_gry_w=mysqli_query($connect,$pobieranie_id_gry_z);
                $pobieranie_id_gry=mysqli_fetch_array($pobieranie_id_gry_w);
                $id=$pobieranie_id_gry[0];
           }
        else{
            $id=$_POST['id'];
        }
$login=$_COOKIE["Clogin"];
$id_gier=[];
$i=0;
$uzytkownik="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login'";
$wynik=mysqli_query($connect,$uzytkownik);
$rekord=mysqli_fetch_array($wynik);
$gry="SELECT id_gry FROM `biblioteka_gier` WHERE id_uzytkownika='$rekord[0]'";
$wynik2=mysqli_query($connect,$gry);
while($rekord2=mysqli_fetch_array($wynik2))
{
    $id_gier[$i]=$rekord2[0];
    $i++;
}
$zapytanie="SELECT * FROM `gry` WHERE id='$id'";
$wynik=mysqli_query($connect,$zapytanie);
$rekord=mysqli_fetch_array($wynik);
    $tworca_z="SELECT `Imie`, `Nazwisko` FROM `tworcy` where id='$rekord[4]'";
        $tworca_w=mysqli_query($connect,$tworca_z);
        $tworca=mysqli_fetch_array($tworca_w);
    echo "
        <div id='kupno'><div id='obraz_z'><img src='../Zdjecia_gier/okladki/$rekord[7]' alt=' $rekord[8]' id='okladka_obraz'></div>
        <div id='tytul'>Tytuł: $rekord[1]</div>
    <div id='opis'>Opis: $rekord[2]</div>
    <div id='tworca'>Tworca: $tworca[0]<br><br>Wydawca: $tworca[1]</div>
    <div id='data'>Data powstania: $rekord[5]</div>
     <div id='cena'>$rekord[3]</div></div>
    <div id='wymagania'>$rekord[6]</div>
    ";
$kup="kup";
$noniewiem="<input type='submit' value='$kup'>";
$action="zakup2.php";
foreach($id_gier as $value){
if($value==$rekord[0]){
    $action="pobierz.php";
$kup="pobierz";
$noniewiem="<a href='../gry_rar/download.php?path=$rekord[1].rar'>$kup</a>";
}
}
echo "<br>
<form action='$action' method='post'>
<input type='hidden' value='$id' name='gra'>";
    
echo "
    $noniewiem
    </form>
    <a href='../sklep.php'>Wroc</a><br>";
    mysqli_close($connect);
?>

    </div>
</body>
</html>