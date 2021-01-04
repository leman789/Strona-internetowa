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
                document.getElementById("elwys1").innerHTML="<div id='elwys'><a href='dane_osobowe.php'>ustawienia</a><br><a href='wyloguj.php'>wyloguj</a><br></div>";
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
<h2>SPOSOBY PŁATNOŚCI</h2>
<p>Sprawdź historię płatności i aktualny stan konta Gpoint.</p><br>
<h2>DODAJ METODĘ PŁATNOŚCI</h2>
<button onclick='Karta_kredytowa()' id='karta'>
<div id="karta_kredytowa" class="przycisk">
<img width="30px" height="15px" src="karta.jpg" alt="zjd karty"> Karta kredytowa <br></div>
</button>
<div id="karta_kredytowa1"></div>

<button onclick='PayPal()' id='PayPal'>
<div  id="PayPal"  class="przycisk">
PayPal</div>
</button>
<div id="PayPal1"  class="przycisk"></div>

<button onclick='Play()' id='Play'>
<div id="Play"  class="przycisk">
Play<br></div>
</button>
<div id="Play1"  class="przycisk"></div>

<script>
function Karta_kredytowa()
        {
            x++;
            if(x==1){
                document.getElementById("karta_kredytowa1").innerHTML="<div id='elwysKarta'> <?php echo "<form action='doladuj1.php' method='post'>";  echo  "<input type='text' name='ile' placeholder='*kwota doładowania'><br>"; echo "<input type='text' name='nr_karty' placeholder='*numer karty'><br>"; echo "<input type='number' name='miesiac' placeholder='*miesiąc'>"; echo "<input type='number' name='rok' placeholder='*rok'><br>"; echo "<input type='number' name='cvv' placeholder='*cvv'>";  echo "<input type='submit' value='wykonaj'>";echo "</form>";?></div>";
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
                document.getElementById("Play1").innerHTML="<div id='elwysPlay'> <?php echo "<form action='doladuj2.php' method='post'>";  echo  "<input type='text' name='ile' placeholder='*kwota doładowania'><br>"; echo "<input type='text' name='nr_tel' placeholder='*numer telefonu'><br>"; echo "<input type='number' name='kod' placeholder='*kod'>";echo "</form>";?></div>";
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
                document.getElementById("PayPal1").innerHTML="<div id='elwysPayPal'> <?php echo "<form action='doladuj3.php' method='post'>";  echo  "<input type='text' name='ile' placeholder='*kwota doładowania'><br>"; echo "<input type='text' name='login' placeholder='*login PayPal'><br>"; echo "<input type='number' name='haslo' placeholder='*haslo PayPal'>";echo "</form>";?></div>";
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