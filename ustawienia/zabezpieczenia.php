<!DOCTYPE html>
<html>
<head>
    <title>Gpoint</title>
    <meta charset="utf-8">
    <meta name="description" content="Zobacz najnowsze promocje na naszej stronie !">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <link rel="stylesheet" href="../menu.css" type="text/css">
    <link rel="stylesheet" href="../style/ustawienia.css" type="text/css">
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
        if(isset($_COOKIE["Clogin"]))//logowanie po zalogowaniu
        {
        echo "<a id='Zalogowany' data-tooltip='xd'>
         <div id='nick'>
         $rekord[1]
        </div>
        <div>
            <img src='../Zdjecia_gier/avatar/$rekord[2]' alt='awatar' width='45px'>
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
        <a href="../index.php">
        <div id="Logo">
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
<h2>ZMIEŃ HASŁO</h2>
<p>Ze względów bezpieczeństwa gorąco zalecamy wybranie takiego hasła, którego nie używasz w żadnym innym koncie internetowym.</p>
<?php
// pobieranie id
$login=$_COOKIE["Clogin"];
$connect=mysqli_connect("localhost","root","","strona_z_grami");
$id_uzytkownika="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login'";
$id_uzytkownika_W=mysqli_query($connect,$id_uzytkownika);
$id_uzytkownika_R=mysqli_fetch_array($id_uzytkownika_W);
//wyswitlanie rekordow 
 
$zapytanie="SELECT `Haslo`,`E-mail` FROM `dane_logowania` WHERE `id_uzytkownika`=$id_uzytkownika_R[0];";
$wynik=mysqli_query($connect,$zapytanie);
while($rekord_haslo=mysqli_fetch_array($wynik))
{
    $haslo_z_bazy=$rekord_haslo[0];
    $emial_z_bazy=$rekord_haslo[1];
}
 echo "<form action='' method='post'>";
    echo "aktualne hasło<br> <input  type='password' name='stare_haslo' placeholder='aktualne haslo' ><br>
    nowe haslo<br> <input type='password' name='nowe_haslo' placeholder='nowe haslo' ><br>
    powtórz nowe haslo<br> <input  type='password' name='nowe_hasloP' placeholder='powtórz nowe haslo' ><br>
    <input type='reset' value='odrzuć zmiany'><input type='submit' value='zmien'>";
 echo "</form>";
 if(isset($_POST['stare_haslo']) && isset($_POST['nowe_haslo'])&& isset($_POST['nowe_hasloP']))
 { 
 $aktualne_haslo=$_POST['stare_haslo'];
 $nowe_haslo=$_POST['nowe_haslo'];
 $nowe_hasloP=$_POST['nowe_hasloP'];
 $i=0;
 if($aktualne_haslo!=$haslo_z_bazy)
 {
     echo "wpisane aktualne haslo jest błędne<br>";
     $i++;
 }
 if($nowe_haslo!=$nowe_hasloP)
 {
     echo "Nowe hasła nie są takie same<br>";
     $i++;
 }
 if($nowe_haslo==$haslo_z_bazy)
 {
     echo "Te hasło już jest ustawiane na twoim koncie<br>";
     $i++;
 }
 if(strlen($nowe_haslo)<7)
 {
     echo "Nowe hasło jest za krótkie<br>";
     $i++;
 }
 $ile=0;
 $dlugosc=strlen($nowe_haslo);
 $ile=$dlugosc;
 for($e=0;$e<$dlugosc;$e++)
 {
    
    if($nowe_haslo[$e]=='0'||$nowe_haslo[$e]=='1'||$nowe_haslo[$e]=='2'||$nowe_haslo[$e]=='3'||$nowe_haslo[$e]=='4'||$nowe_haslo[$e]=='5'||$nowe_haslo[$e]=='6'||$nowe_haslo[$e]=='7'||$nowe_haslo[$e]=='8'||$nowe_haslo[$e]=='9')
     {
       $ile--;
         
     }    
 }
  if($ile==$dlugosc)
  {
      echo "Hasło nie posiada liczb";
      $i++;
  }
  if($i==0)
  {
    $zapytanie_zmiana_hasla="UPDATE `dane_logowania` SET `Haslo` = '$nowe_haslo' WHERE id_uzytkownika = $id_uzytkownika_R[0];";
    $wynik_zmiana_hasla=mysqli_query($connect,$zapytanie_zmiana_hasla);
    echo "udało sie zmienić hasło";
  }
  
 }
 
?>
<div id="prawa_bardziej">
<p>TWOJE HASŁO<br>
Twoje hasło musi mieć co najmniej 7 znaków<br>
Twoje hasło musi zawierać co najmniej 1 cyfrę<br>
Zalecane jest użycie znaków specjalnych<br></p>
</div>
</div>
</div>
<?php

?>

</body>
</html>