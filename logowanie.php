<!DOCTYPE html>
<html>
<head>
    <title>Gpoint</title>
    <meta charset="utf-8">
    <meta name="description" content="Zobacz najnowsze promocje na naszej stronie !">
        <link rel="stylesheet" href="logowanie.css" type="text/css">

</head>
<body>
        <div id="menu">
        <?php
        if(isset($_COOKIE["Clogin"]))//logowanie po zalogowaniu
        {
        echo "
        <div id='Zalogowany'>
            <img src='Zdjecia_gier/avatar/$rekord[2]' alt='awatar' width='60px'>
            $rekord[1]
            <a href='wyloguj.php'>wyloguj</a>
        </div>
        <style>
            #zalogowany{
                color: red;
            }
        </style>
        ";
        }
        else//przed zalogowaniem
            {
            echo "<a href='index.php'  id='Zaloguj'><div> 
            Powrót
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
    
    <div id="reje">
        <form action="" method="POST">
            Podaj login<input type="text" name="login"><br>
            Podaj hasło<input type="text" name="haslo"><br>
            <input type="reset" value="wyczyść">
            <input type="submit" value="zaloguj">
        </form>
        <a href="rejestracja.php">Jeżeli nie posiadasz konta, zarejestruj się!</a>   
    </div>
</body>

</html>
<?php
            $Clogin="Clogin";
            sleep(3);
            if(isset($_POST['login']) && isset($_POST['haslo']))
            {
                $login=$_POST['login'];
                $haslo=$_POST['haslo'];
                $connect=mysqli_connect("localhost","root","","strona_z_grami");
                $zapytanie="SELECT `Login`,`Haslo` FROM `dane_logowania`";
                $wynik=mysqli_query($connect,$zapytanie);
                while($rekord=mysqli_fetch_array($wynik))
                {
                    if($rekord[0]==$login && $rekord[1]==$haslo)
                    {    
                        setcookie($Clogin,$login,time()+(3600*24),"/");
                        echo "1";
                        mysqli_close($connect);
                        header("Location:index.php");
                    }
                }
                echo "Błędny login lub hasło";
                mysqli_close($connect);
            }
        ?>