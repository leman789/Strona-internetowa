<!DOCTYPE html>
<html >
<head>
    <title>Gpoint</title>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
    <div style="position:absolute; top:10%;">
    <div id="lewa">
     <a href="dane_osobowe.php">Dane osobowe</a><br>
     <a href="doladuj.php">Doladuj konto</a><br>
     <a href="transakcje.php">Transakcje</a><br>
     <a href="zabezpieczenia.php">Haslo i zabezpieczenia</a><br>
    </div>
<div id="prawa">
<h2>USTAWIENIA OGÓLNE</h2>
<?php
// pobieranie id
$login=$_COOKIE["Clogin"];
$connect=mysqli_connect("localhost","root","","strona_z_grami");
$id_uzytkownika="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login'";
$id_uzytkownika_W=mysqli_query($connect,$id_uzytkownika);
$id_uzytkownika_R=mysqli_fetch_array($id_uzytkownika_W);
//wyswitlanie rekordow 
 
$zapytanie="SELECT `Imie`,`Nazwisko`,`Wiek`,`Avatar` FROM `uzytkownicy` WHERE `id`=$id_uzytkownika_R[0];";
$wynik=mysqli_query($connect,$zapytanie);
 echo "<form action='dane_osobowe1.php' method='post'>";
while($rekord=mysqli_fetch_array($wynik))
{
    echo "imie: <input type='text' name='imie' placeholder='$rekord[0]' ><br>
    nazwisko: <input type='text' name='nazwisko' placeholder='$rekord[1]' ><br>
    Wiek: <input type='number' name='wiek' placeholder='$rekord[2]' ><br>
    Avatar: <input type='text' name='avatar' placeholder='$rekord[3]' ><input type='submit' value='zmien'>";
    
   
}
 echo "</form>";
 
?>



</form>
</div>
</div>
</body>
</html>