<!DOCTYPE html>
<html>
<head>
    <title>Gspot</title>
    <meta charset="utf-8">
    <meta name="description" content="Zobacz najnowsze promocje na naszej stronie !">
     <link rel="stylesheet" href="../style.css" type="text/css">
    <link rel="stylesheet" href="../menu.css" type="text/css">
      <style>body{
          background-color: #162d40;
        }</style>
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
        let wysuniete=0;
    function wysun()
        {
            wysuniete++;
            if(wysuniete==1){
                    document.getElementById("elwys1").innerHTML="<div id='elwys'><?php echo "<a id='elwys2'> Stan Konta:".$stan_konta_elwys_r[0]."zł</a><br>" ?><a href='../ustawienia/dane_osobowe.php' id='elwys2'>ustawienia</a><br><a href='../wyloguj.php' id='elwys2'>wyloguj</a><br></div>";
                }
            else if(wysuniete>1){
                    wysuniete=0;
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
    <div id="content">
    <?php
$connect=mysqli_connect("localhost","root","","strona_z_grami");
$gra=$_POST['gra'];
$login=$_COOKIE["Clogin"];

        
$czas=date("Y-m-d");//aktualny czas
        
$nazwa_gry="SELECT Nazwa FROM `gry` WHERE id=$gra";
$nazwa_gry_w=mysqli_query($connect,$nazwa_gry);
$nazwa_gry_r=mysqli_fetch_array($nazwa_gry_w);
        echo $nazwa_gry_r[0];
        
$uzytkownik="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login'";//pobieranie id uzytkownika
$wynik=mysqli_query($connect,$uzytkownik);
$rekord=mysqli_fetch_array($wynik);

$stan_konta="SELECT dane_logowania.Login,uzytkownicy.Stan_konta FROM `uzytkownicy` JOIN dane_logowania ON uzytkownicy.id=dane_logowania.id_uzytkownika where Login='$login'";//pobieranie stanu konta uzytkownika
$wynik2=mysqli_query($connect,$stan_konta);
$rekord2=mysqli_fetch_array($wynik2);

$cena_gry="SELECT Cena FROM `gry` WHERE id=$gra";//pobieranie ceny gry
$wynik3=mysqli_query($connect,$cena_gry);
$rekord3=mysqli_fetch_array($wynik3);

$posiadanie_gry="SELECT id_gry,id_uzytkownika FROM `biblioteka_gier` WHERE id_uzytkownika='$rekord[0]' AND id_gry='$gra'";//pobieranie zakupionych gier uzytkownika
$wynik10=mysqli_query($connect,$posiadanie_gry);
$rekord10=mysqli_fetch_array($wynik10);


        
echo "login: $login<br>";
echo "Id: $rekord[0]<br>";
echo "Gra: $gra<br>";
echo "stan konta: $rekord2[1]<br>";
echo "Cena gry: $rekord3[0]<br>";
if($rekord10[0]!=$gra && $rekord10[1]!=$rekord[0])
{
if($rekord2[1]>=$rekord3[0])
{
  $dodawanie_do_biblioteki="INSERT INTO `biblioteka_gier` (`id`, `id_gry`, `id_uzytkownika`) VALUES (NULL, '$gra', '$rekord[0]');";
      $wynik7=mysqli_query($connect,$dodawanie_do_biblioteki);
  $pobieranie_oplaty="UPDATE `uzytkownicy` SET `Stan_konta` = `Stan_konta`-$rekord3[0] WHERE `uzytkownicy`.`id` = '$rekord[0]';";
      $wynik8=mysqli_query($connect,$pobieranie_oplaty);
    $Tranzakcje_gry="INSERT INTO `tranzakcje` (`id`, `id_uzytkownika`, `kwota`, `metoda`, `czas`, `nazwa_gry`) VALUES (NULL, '$rekord[0]', '$rekord3[0]', '0', '$czas', '$nazwa_gry_r[0]');";
    $Tranzakcje_gry_w=mysqli_query($connect,$Tranzakcje_gry);
    header("Location:../sklep.php");
}
else{
    echo "za malo kasy<br>
    <a href='../sklep.php'>Wroc</a>
    ";
    
}}
else{
    echo "masz juz ta gre";
}
        mysqli_close($connect);
?>
    </div>
</body>
</html>