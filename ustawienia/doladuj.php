<!DOCTYPE html>
<html>
<head>

    <title>Gpoint</title>
    <meta charset="utf-8">
    <meta name="description" content="Zobacz najnowsze promocje na naszej stronie !">
    <link rel="stylesheet" href="../style.css" type="text/css">
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
                    document.getElementById("elwys1").innerHTML="<div id='elwys'><a href='../dane_osobowe.php'>ustawienia</a><br><a href='../wyloguj.php'>wyloguj</a><br></div>";
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
            <img src='../Zdjecia_gier/avatar/$rekord[2]' alt='awatar' width='60px'>
            $rekord[1]
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
    <div style="position:absolute; top:10%;">
    <div id="lewa">
     <a href="dane_osobowe.php">Dane osobowe</a><br>
     <a href="doladuj.php">Doladuj konto</a><br>
     <a href="transakcje.php">Transakcje</a><br>
     <a href="zabezpieczenia.php">Haslo i zabezpieczenia</a><br>
    </div>
<div id="prawa">
<h2>SPOSOBY PŁATNOŚCI</h2>
<p>Sprawdź historię płatności i aktualny stan konta Gpoint.</p><br>
<h2>DODAJ METODĘ PŁATNOŚCI</h2>
<button onclick='Karta_kredytowa()' id='karta'>
<div id="karta_kredytowa" class="przycisk">
<img width="30px" height="15px" src="karta.jpg" alt="zjd karty"> Karta kredytowa <br></div>
</button>
<div id="karta_kredytowa1"></div>


<button onclick='Play()' id='Play'>
<div id="Play"  class="przycisk">
Play<br></div>
</button>
<div id="Play1"  class="przycisk"></div>

<button onclick='PayPal()' id='PayPal'>
<div  id="PayPal"  class="przycisk">
PayPal</div>
</button>
<div id="PayPal1"  class="przycisk"></div>
<?php
//pobieranie id;
$login=$_COOKIE["Clogin"];
$connect=mysqli_connect("localhost","root","","strona_z_grami");
$id_uzytkownika="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login'";
$id_uzytkownika_W=mysqli_query($connect,$id_uzytkownika);
$id_uzytkownika_R=mysqli_fetch_array($id_uzytkownika_W);
 //wstawianie reszty
$zapytanie="SELECT `nr_karty`,`miesiac`,`rok`,`cvv` FROM `konto_bankowe` WHERE `id_uzytkownika`=$id_uzytkownika_R[0]";
$wynik=mysqli_query($connect,$zapytanie);
while($rekord=mysqli_fetch_array($wynik))
{
    $nr_karty=$rekord[0];
    $miesiac=$rekord[1];
    $rok=$rekord[2];
    $cvv=$rekord[3];
}

$zapytanie="SELECT `nr_telefonu`,`kod` FROM `play` WHERE `id_uzytkownika`=$id_uzytkownika_R[0]";
$wynik=mysqli_query($connect,$zapytanie);
while($rekord=mysqli_fetch_array($wynik))
{
    $nr_tel=$rekord[0];
    $kod=$rekord[1];  
}
$zapytanie="SELECT `login_paypal`,`haslo_paypal` FROM `paypal` WHERE `id_uzytkownika`=$id_uzytkownika_R[0]";
$wynik=mysqli_query($connect,$zapytanie);
while($rekord=mysqli_fetch_array($wynik))
{
    $login_paypal=$rekord[0];
    $haslo_paypal=$rekord[1];  
}
error_reporting(0);
?>
<script>
function Karta_kredytowa()
        {
            x++;
            zz="";
            if(x==1){
                document.getElementById("karta_kredytowa1").innerHTML="<div id='elwysKarta'> <?php echo "<form action='doladuj1.php' method='post'>";  echo  "kwota:<input type='text' name='ile' placeholder='*kwota doładowania' value=''><br>"; echo "nr_konta:<input type='text' name='nr_karty'placeholder='nr_karty' maxlength='26' value='$nr_karty';><br>"; echo "miesiąc: <input type='number' name='miesiac'placeholder='miesiac' max='12' min='1' maxlength='2' value='$miesiac'>"; echo " rok: <input type='number' name='rok'placeholder='rok' min='1980' maxlength='4' value='$rok'><br>"; echo " ccv: <input type='number' name='cvv' placeholder='ccv'maxlength='3' value='$cvv'>";  echo "<input type='submit' placeholder='wykonaj'>";echo "</form>";?></div>";
                }
            else if(x>1){
                    x=0;
                    document.getElementById("karta_kredytowa1").innerHTML="";
                }
        }
        
         y=0;
        function Play()
        {
           y++;
            if(y==1){
                document.getElementById("Play1").innerHTML="<div id='elwysPlay'> <?php echo "<form action='doladuj2.php' method='post'>";  echo  "kwota:<input type='text' name='ile' placeholder='*kwota doładowania'><br>"; echo "numer telefonu: <input type='text' name='nr_tel' placeholder='*numer telefonu' value='$nr_tel'><br>"; echo "kod: <input type='number' name='kod' placeholder='*kod' value='$kod'>";  echo "<input type='submit' value='wykonaj'>";echo "</form>";?></div>";
                }
            else if(y>1){
                    y=0;
                    document.getElementById("Play1").innerHTML="";
                }
        }
        function PayPal()
        {
           y++;
            if(y==1){
                document.getElementById("PayPal1").innerHTML="<div id='elwysPayPal'> <?php echo "<form action='doladuj3.php' method='post'>";  echo  "kwota:<input type='text' name='ile' placeholder='*kwota doładowania'><br>"; echo "login:<input type='text' name='login_paypal' placeholder='*login paypal' value='$login_paypal'><br>"; echo "haslo: <input type='text' name='haslo_paypal' placeholder='*haslo PayPal' value='$haslo_paypal'>"; echo "<input type='submit' value='wykonaj'>";echo "</form>";?></div>";
                }
            else if(y>1){
                    y=0;
                    document.getElementById("PayPal1").innerHTML="";
                }
        }

</script>
</div>
</div>
</body>
</html>