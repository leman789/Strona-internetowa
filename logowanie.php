<!DOCTYPE html>
<html>
<head>
    <title>Gpoint</title>
    <meta charset="utf-8">
    <meta name="description" content="Zobacz najnowsze promocje na naszej stronie !">
    <link rel="stylesheet" href="logowanie.css" type="text/css">

</head>
<body>
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
            sleep(3);
            if(!empty($_POST['login']) && !empty($_POST['haslo']));
            {
                $login=$_POST['login'];
                $haslo=$_POST['haslo'];
                $connect=mysqli_connect("localhost","root","","strona_z_grami");
                $zapytanie="SELECT `Login`,`Hasło` FROM `dane_logowania`";
                $wynik=mysqli_query($connect,$zapytanie);
                while($rekord=mysqli_fetch_array($wynik))
                {
                    if($rekord[0]==$login && $rekord[1]==$haslo)
                    {
                        echo "1";
                        mysqli_close($connect);
                        //header("Location:index.php");
                    }
                }
                echo "Błędny login lub hasło";
                mysqli_close($connect);
            }
        ?>