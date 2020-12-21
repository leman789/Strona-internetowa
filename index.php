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
    $zapytanie="SELECT id,Imię,Avatar FROM `użytkownicy` LIMIT 1";
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
        <div id='Zalogowany'>
            <img src='Zdjecia_gier/avatar/$rekord[2]' alt='awatar' width='60px'>
            $rekord[1]
        </div>
        <style>
            #zalogowany{
                color: red;
            }
        </style>
        ";
        }
            if($rekord[0]==2)//przed zalogowaniem
            {
            echo "<a href='logowanie.html'  id='Zaloguj'><div> 
            Logowanie
            </div> </a>";
            }
        $PDO=null;
        ?>
        <div id="Puste_pole"></div>
        <a href="biblioteka.html" id="Biblioteka">
            <div> 
                Biblioteka
            </div>

        </a>
        <a href="index.html" id="Sklep">
        <div>
           Sklep
        </div>

        </a>
        <div id="Puste_pole" class="Tlo"></div>
        <div id="Logo">
            Logo
        </div>

    </div>
    
  <img  id="obraz1" src="Zdjecia_gier/Top_gry/1.jpg" alt="zd_glowne">
  <div id="napis"></div>
    <h2>ZOBACZ WIĘCEJ GIER </h2>
    <input type="button"  onclick="dodaj()" id="Kolejne_zdj">
    <input type="button"  onclick="odejmij()" id="Poprzednie_zdj">
    <script  src="zmianazdjzawartosc.js" defer></script><!--dodanie pliku z zmianą obrazu i zawartosc-->
       
    
</body>
</html>