<!DOCTYPE html>
<html>
<head>
    <title>Gspot</title>
    <meta charset="utf-8">
    <meta name="description" content="Zobacz najnowsze promocje na naszej stronie !">
        <link rel="stylesheet" href="logowanie.css" type="text/css">
        <link rel="stylesheet" href="menu/menu.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">

</head>
<body>
        <?php include('menu/menu_1.php');?>
    
    <div id="reje">
        <form action="" method="POST">
            <input type="text" name="login" id="login" placeholder="tu wpisz login" style="text-align: center; margin: 10px;" width="100" height="10"><br>
            <input type="text" name="haslo" id="haslo" placeholder="tu wpisz hasło" style="text-align: center; margin: 10px;"><br>
            <input type="reset" value="wyczyść" id="wyczysc">
            <input type="submit" value="zaloguj" id="zaloguj">
        </form>
        <a id="rejestracja" href="rejestracja.php">Jeżeli nie posiadasz konta, zarejestruj się!</a>   
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