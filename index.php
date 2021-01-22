<!DOCTYPE html>
<html>
<head>
    <title>Gpoint</title>
    <meta charset="utf-8">
    <meta name="description" content="Zobacz najnowsze promocje na naszej stronie !">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="menu.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <?php 
    $host="localhost";
    $uzytkownik="root";
    $haslo="";
    $dbname="strona_z_grami";
    $dsn="mysql:host=$host;dbname=$dbname;";
    $PDO = new PDO($dsn,$uzytkownik,$haslo);
    error_reporting(E_ALL ^ E_WARNING);
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
            <img src='Zdjecia_gier/avatar/$rekord[2]' alt='awatar' id='avatar'>
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
            <?php
        if(isset($_COOKIE["Clogin"])){//sklep po zalogowaniu
            echo "<div id='przejscie1'></div>";
        }
        else{
            echo "<a href='logowanie.php' id='Sklep'>
            <div id='przejscie'>
            DOWIEDZ SIĘ WIĘCEJ
            </div>
            </a>";
        }?>
  <img  id="obraz1" src="Zdjecia_gier/Top_gry/1.jpg" alt="zd_glowne">
  <div id="napis"></div>
  <div id="napis2"></div>
    <h2>ZOBACZ WIĘCEJ GIER </h2>
    <input type="button"  onclick="dodaj()" id="Kolejne_zdj">
    <input type="button"  onclick="odejmij()" id="Poprzednie_zdj">
    <script  src="zmianazdjzawartosc.js" defer>
    </script><!--dodanie pliku z zmianą obrazu i zawartosc-->
</body>
</html>