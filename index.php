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
    $zapytanie="SELECT id,Imię FROM `użytkownicy` LIMIT 1";
    $wynik=$PDO->query($zapytanie);
    foreach($wynik as $rekord){
    }
    ?>
</head>
<body>
    <div id="menu">

        <?php
                    if($rekord[0]==1)//po zalogowaniu
        {
        echo "
        <a class='Int'><div id='menu1'>
            $rekord[1]
        </div></a>
        <style>
            #menu1{
                color: red;
            }
        </style>
        ";
        }
            if($rekord[0]==2)//przed zalogowaniem
            {
            echo "<a href='logowanie.html'  class='Int'><div id='menu1'> 
            Logowanie
            </div> </a>";
            }
        $PDO=null;
        ?>
        <div id="menu2" class="Tlo"></div>
        <a href="biblioteka.html" class="Int">
            <div id="menu3"> 
                Biblioteka
            </div>

        </a>
        <a href="index.html" class="IntS">
        <div id="menu4" >
           Sklep
        </div>

        </a>
        <div id="menu2" class="Tlo"></div>
        <div id="menu5" class="Logo">
            Logo
        </div>

    </div>
    
  <img  id="obraz1" src="1.jpg" alt="zd_glowne">
  <div id="napis"></div>
    <h2>ZOBACZ WIĘCEJ GIER </h2>
    <input type="button"  onclick="dodaj()" id="next">
    <input type="button"  onclick="odejmij()" id="back">
    <script  src="zmianazdjzawartosc.js" defer></script><!--dodanie pliku z zmianą obrazu i zawartosc-->
       
    
</body>
</html>