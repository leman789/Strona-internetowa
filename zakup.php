<!DOCTYPE html>
<html>
<head>
    <title>Gpoint</title>
    <meta charset="utf-8">
    <meta name="description" content="Zobacz najnowsze promocje na naszej stronie !">
    <link rel="stylesheet" href="style.css" type="text/css">
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
    ?>
</head>
<body>
    <script>
        let x=0;
    function wysun()
        {
            x++;
            if(x==1){
                    document.getElementById("elwys1").innerHTML="<div id='elwys'><a href='ustawienia'>ustawienia</a><br><a href='doladuj'>doladuj</a><br><a href='wyloguj.php'>wyloguj</a><br></div>";
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
        <div >
            <img src='Zdjecia_gier/avatar/$rekord[2]' alt='awatar' width='60px'>
            $rekord[1]
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
        <a href="index.php">
        <div id="Logo">
            Logo
        </div>
        </a>  
    </div>   
</body>
</html>
<?php
$login=$_COOKIE["Clogin"];
$id=$_POST['id'];
$connect=mysqli_connect("localhost","root","","strona_z_grami");
echo $login;
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
print_r($id_gier);
$zapytanie="SELECT * FROM `gry` WHERE id='$id'";
$wynik=mysqli_query($connect,$zapytanie);
$rekord=mysqli_fetch_array($wynik);
    echo "$rekord[1]<br>
    $rekord[2]<br>$rekord[3]<br>$rekord[4]<br>$rekord[5]<br>$rekord[6]<br>$rekord[7]<br>$rekord[8]
    ";
$kup="kup";
$noniewiem="<input type='submit' value='$kup'>";
echo "<br>
<form action='zakup2.php' method='post'>
<input type='hidden' value='$id' name='gra'>";
foreach($id_gier as $value){
if($value==$rekord[0]){
    $kup="masz juz";
    $noniewiem="<a href='sklep.php'>$kup</a>";
}
}
    
echo "
    $noniewiem
    </form>
    <a href='sklep.php'>Wroc</a><br>";
?>