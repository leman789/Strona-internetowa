<!DOCTYPE html>
<html>
<head>

    <title>Gpoint</title>
    <meta charset="utf-8">
    <meta name="description" content="Zobacz najnowsze promocje na naszej stronie !">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <link rel="stylesheet" href="../menu.css" type="text/css">
    <link rel="stylesheet" href="../style/ustawienia.css" type="text/css">
    <link rel="stylesheet" href="../style/doladuj.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
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
                    document.getElementById("elwys1").innerHTML="<div id='elwys'><?php echo "<a id='elwys2' href='doladuj.php'><div>Stan Konta:".$stan_konta_elwys_r[0]."zł</div></a><br>" ?><a href='dane_osobowe.php' id='elwys3'><div>ustawienia</div></a><br><a href='../wyloguj.php' id='elwys4'><div>wyloguj</div></a><br></div>";
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
    <div style="position:absolute; top:10%;" id="content">
    <div id="lewa">
     <a href="dane_osobowe.php"><div>Dane osobowe</div></a><br>
     <a href="doladuj.php"><div>Doladuj konto</div></a><br>
     <a href="transakcje.php"><div>Transakcje</div></a><br>
     <a href="zabezpieczenia.php"><div>Haslo i zabezpieczenia</div></a><br>
    </div>
<div id="prawa">
<h2>SPOSOBY PŁATNOŚCI</h2>
<p id="sprawdz"><a href="transakcje.php" style="color:white; text-decoration:none;text-align: center;">Sprawdź historię płatności i aktualny stan konta Gpoint.</a></p><br>
<h2>DODAJ METODĘ PŁATNOŚCI</h2>
    <div id="m_p">
<button onclick='Karta_kredytowa(2),Play(3),PayPal(3)' id='karta' class="przycisk">
Karta kredytowa
</button>
<div id="karta_kredytowa1"></div>


<button onclick='Karta_kredytowa(3),Play(2),PayPal(3)' id='Play' class="przycisk">
Play
</button>
<div id="Play1"  class="przycisk_content"></div>
        
<button onclick='Karta_kredytowa(3),Play(3),PayPal(2)' id='PayPal' class="przycisk">PayPal
</button>
        
<div id="PayPal1"  class="przycisk_content"></div></div>
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
mysqli_close($connect);
?>
<script>
    x=1;
function Karta_kredytowa(a)
        {
         x=x*a;
            if(x==2){
                document.getElementById("karta_kredytowa1").innerHTML="<div id='elwysKarta'> <?php echo "<form action='doladuj1.php' method='post'>";  echo  "<div id='Pdiv'>kwota:</div><input type='text' name='ile' placeholder='*kwota doładowania' value=''><br>"; echo "<div id='Pdiv'>nr_konta:</div><input type='text' name='nr_karty'placeholder='nr_karty' maxlength='26' value='$nr_karty';><br>"; echo "<div id='Pdiv'>miesiąc:</div> <input type='number' name='miesiac'placeholder='miesiac' max='12' min='1' maxlength='2' value='$miesiac'><br>"; echo " <div id='Pdiv'>rok:</div> <input type='number' name='rok'placeholder='rok' min='1980' maxlength='4' value='$rok'><br>"; echo " <div id='Pdiv'>ccv:</div> <input type='number' name='cvv' placeholder='ccv'maxlength='3' value='$cvv'>";  echo "<br><input type='submit' value='wykonaj' id='wykonaj'>";echo "</form>";?></div>";
                }
            else if(x==1 || x>2){
                 x=1;
                document.getElementById("karta_kredytowa1").innerHTML="";
                }
        }
    y=1;
        function Play(b)
        {
            y=y*b;
            
            if(y==2){
                document.getElementById("Play1").innerHTML="<div id='elwysPlay'> <?php echo "<form action='doladuj2.php' method='post'>";  echo  "kwota:<input type='text' name='ile' placeholder='*kwota doładowania'><br>"; echo "numer telefonu: <input type='text' name='nr_tel' placeholder='*numer telefonu' value='$nr_tel'><br>"; echo "kod: <input type='number' name='kod' placeholder='*kod' value='$kod'>";  echo "<input type='submit' value='wykonaj'id='wykonaj'>";echo "</form>";?></div>";
                }
            else if(y==1 || y>2){
                  y=1;
                    document.getElementById("Play1").innerHTML="";
                }
        }
    z=1;
        function PayPal(c)
        {
            z=z*c;
            if(z==2){
                document.getElementById("PayPal1").innerHTML="<div id='elwysPayPal'> <?php echo "<form action='doladuj3.php' method='post'>";  echo  "kwota:<input type='text' name='ile' placeholder='*kwota doładowania'><br>"; echo "login:<input type='text' name='login_paypal' placeholder='*login paypal' value='$login_paypal'><br>"; echo "haslo: <input type='text' name='haslo_paypal' placeholder='*haslo PayPal' value='$haslo_paypal'>"; echo "<input type='submit' value='wykonaj'id='wykonaj'>";echo "</form>";?></div>";
                }
            else if(z==1 || z>2){
                  z=1;
                    document.getElementById("PayPal1").innerHTML="";
                }
        }

</script>
</div>
</div>
</body>
</html>