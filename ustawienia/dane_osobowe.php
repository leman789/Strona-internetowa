<!DOCTYPE html>
<html >
<head>
    <title>Gpoint</title>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="Zobacz najnowsze promocje na naszej stronie !">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <link rel="stylesheet" href="../menu.css" type="text/css">
    <link rel="stylesheet" href="../style/ustawienia.css" type="text/css">
    <link rel="stylesheet" href="../style/dane_osobowe.css" type="text/css">
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
         $zdj_avatara_p=$rekord[2];
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
        <div id="Puste_pole1" class="Tlo"></div>
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
        <a href="../index.php" id="Logo">
        <div >
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
<h2>USTAWIENIA OGÓLNE</h2>
<?php
// pobieranie id
$login=$_COOKIE["Clogin"];
$connect=mysqli_connect("localhost","root","","strona_z_grami");
$id_uzytkownika="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login'";
$id_uzytkownika_W=mysqli_query($connect,$id_uzytkownika);
$id_uzytkownika_R=mysqli_fetch_array($id_uzytkownika_W);
//wyswitlanie rekordow 
 
$zapytanie="SELECT `Imie`,`Nazwisko`,`Wiek`,`Avatar` FROM `uzytkownicy` WHERE `id`=$id_uzytkownika_R[0];";
$wynik=mysqli_query($connect,$zapytanie);
//wypisywanie zakropkowanych


 echo "<form action='dane_osobowe1.php' method='post'>";
while($rekord=mysqli_fetch_array($wynik))
{
    $text="$rekord[0]";
$a=strlen($text);
$odejmowanie=$a;
$odejmowanie--;
$ostatnia=$text[$odejmowanie];
$d=$text[0];
$gwiazdki='';
$znak='*';
for($i=0;$i!=$a-2;$i++)
{  
    $gwiazdki=$gwiazdki.$znak;
}
$wszystko=$d.$gwiazdki.$ostatnia;

$text1="$rekord[1]";
$a1=strlen($text1);
$odejmowanie1=$a1;
$odejmowanie1--;
$ostatnia1=$text1[$odejmowanie1];
$d1=$text1[0];
$gwiazdki1='';
$znak1='*';
for($i1=0;$i1!=$a1-2;$i1++)
{  
    $gwiazdki1=$gwiazdki1.$znak1;
}
$wszystko1=$d1.$gwiazdki1.$ostatnia1;

    echo "<div>Imie:</div> <input type='text' name='imie' placeholder='$wszystko' autocomplete='off'><br>
    <div>Nazwisko:</div> <input type='text' name='nazwisko' placeholder='$wszystko1' autocomplete='off'><br>
    <div>Wiek:</div> <input type='number' name='wiek' placeholder='$rekord[2]'><br>
   <input type='submit' value='zmien' id='zmien'>";
    
   
}
 echo "</form>";
echo "<br><h2>Zmiana swojego avatara</h2><img src='../Zdjecia_gier/avatar/$zdj_avatara_p' alt='zjd_avatara' height='150px' width='180px' id='avatar'>";
 echo " <form action='../Zdjecia_gier/avatar/plik2.php' method='POST' ENCTYPE='multipart/form-data'>";
   echo   " <div class='file-input'>
  <input type='file' name='plik' id='file' class='file'>
  <label for='file'>
    Wybierz plik ...
    <p class='file-name'></p>
  </label>
</div>
   <br>";
      echo "  <input type='submit' value='zapisz' id='zmien1'></form>";
    mysqli_close($connect);
?>
</div>
</div>
</body>
</html>