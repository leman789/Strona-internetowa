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
    

  <img  id="obraz1" src="1.jpg" alt="zd_glowne"><!-- kod ktory zmienia zdj automatyczne trzeba tylko zmienic zdj-->
    <form action=""></form>
    <h2>ZOBACZ WIĘCEJ GIER </h2>
    <input type="button"  onclick="dodaj()" id="next">
    <input type="button"  onclick="odejmij()" id="back">
    <script>
        function dodaj()
        {
            i++;
            zmiana(0);
            
        }
         function odejmij()
        {
            i--;
            zmiana(0);
            
        }
        let zdj=['1.jpg','2.jpg','3.jpg','4.jpg','5.jpg']
         i=0;
        function zmiana(x)
            {
                y=x;
                if(y==1)
                    {
                        i++;
                        zmiana(0);
                        y=0;
                    }
                document.getElementById("obraz1").src=zdj[i];
                if(i>4){
                    i=0;
                   zmiana(0)
                }
                else if(i<0){
                    i=4;   
                   zmiana(0)
                }   
            }
        
        setInterval("zmiana(1)",5000);
    </script>
</body>
</html>