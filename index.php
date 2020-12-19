<!DOCTYPE html>
<html>
<head>
    <title>Gpoint</title>
    <meta charset="utf-8">
    <meta name="description" content="Zobacz najnowsze promocje na naszej stronie !">
    <link rel="stylesheet" href="style.css" type="text/css">

</head>
<body>
    <div id="menu">
        <a href="logowanie.html"  class="Int">
        <div id="menu1" > 
            Logowanie
        </div> 


        </a>
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
    <?php
    $host="localhost";
    $user="root";
    $haslo="";
    $db="strona_z_grami";
    $dns="mysql:host=$host;dbname=$db";
    $pdo=new PDO($dns,$user,$haslo);
    $zapytanie="SELECT `obrazek` FROM `gry`";
    $wynik=$pdo->query($zapytanie);
    echo "$wynik";
    
    
    ?> 
   
    <img  id="obraz1" src="wp1965885.png" alt="zd_glowne"><!-- kod ktory zmienia zdj automatyczne trzeba tylko zmienic zdj-->
    <form action=""></form>
    <h2>ZOBACZ WIĘCEJ GIER </h2>
    <div id="back">dsadd</div>

    <script>
        let zdj=['33214.jpg ','wp1965885.png','33214.jpg','wp1965885.png']
        let i=0;
        function zmiana()
            {
                document.getElementById("obraz1").src=zdj[i];
                i++;
                if(i>=zdj.length)
                {
                    i=0;
                }
                
            }
        setInterval("zmiana()",5000);
    </script>
   
     <div id="next">dsadd</div>   
    
</body>
</html>