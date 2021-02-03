<?php
$login=$_COOKIE["Clogin"];
$connect=mysqli_connect("localhost","root","","strona_z_grami");
$id_gry=$_POST['id_gry'];
$obrazek=$_POST['obrazek'];
$tytul=$_POST['tytul'];
$cena=$_POST['cena'];
$data=$_POST['data'];
$opis=$_POST['opis'];
$Tworca=$_POST['Tworca'];
$Wydawca=$_POST['Wydawca'];
$System=$_POST['System'];
$Procesor=$_POST['Procesor'];
$Ram=$_POST['Ram'];
$Miejsce=$_POST['Miejsce'];
$DirectX=$_POST['DirectX'];
$Gatunki=$_POST['gatunki'];
$Rodzaj_g=$_POST['rodzaj_g'];

$max_rozmiar = 1024*1024;
//id_towrycy 
$ogolne_zapytanie_gra="SELECT id,Nazwa,Opis,Cena,id_tworcy,Data_wydania,Obrazek,Alt_obrazka,id_specyfikacja,id_dodajacego FROM gry Where id=$id_gry";
$ogolne_zapytanie_gra_W=mysqli_query($connect,$ogolne_zapytanie_gra);
while($ogolne_zapytanie_gra_R=mysqli_fetch_array($ogolne_zapytanie_gra_W))
{
    $id_tworcy=$ogolne_zapytanie_gra_R[4];
    $id_specyfikacji=$ogolne_zapytanie_gra_R[8];
    $opis_baza_danych=$ogolne_zapytanie_gra_R[2];
}

if($_POST['opis']=="" || $_POST['opis']=='')
{
    $opis=$opis_baza_danych;
}
//id_uzytkownika  
$id_uzytkownika="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login'";
$id_uzytkownika_W=mysqli_query($connect,$id_uzytkownika);
$id_uzytkownika_R=mysqli_fetch_array($id_uzytkownika_W);

if(isset($_POST['tytul']) || isset($_POST['cena']) || isset($_POST['data']) || isset($_POST['Tworca']) || isset($_POST['Wydawca']) || isset($_POST['System']) || isset($_POST['Procesor']) || isset($_POST['Ram']) || isset($_POST['Miejsce']) || isset($_POST['DirectX']) || isset($_POST['gatunki']) || isset($_POST['rodzaj_g']) )
{


    if(is_uploaded_file($_FILES['plik']['tmp_name']))
    {
        if($_FILES['plik']['size'] > $max_rozmiar)
        {
            echo "za duży plik";
        }
        else
        {
            $nazwa=$_FILES['plik']['name'];
           
            if(isset($_FILES['plik']['type']))
            {
               
            }
            move_uploaded_file($_FILES['plik']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'/git/Strona-internetowa/Zdjecia_gier/okladki/'.$_FILES['plik']['name']);
        }
    }
    else
    {
        echo "błąd przy przesyłaniu danych";
    }
   
    echo "<img src='$nazwa' alt='zdj_avatara'>";
if($nazwa!=$obrazek)
{
    $obrazek=$nazwa;
}
$dodanie_gry="UPDATE gry SET Nazwa = '$tytul', Opis = '$opis', Cena = '$cena', Data_wydania = '$data', Obrazek = '$obrazek' WHERE gry.id = $id_gry;";
$dodanie_gry_W=mysqli_query($connect,$dodanie_gry);

if($Rodzaj_g=="singlep")
{ 
$dodanie_gatunku="UPDATE gatunki_multi_single SET multip = '0', singlep = '1' WHERE gatunki_multi_single.id_gry = $id_gry";
mysqli_query($connect,$dodanie_gatunku);
}
else
{ 
$dodanie_gatunku="UPDATE gatunki_multi_single SET multip = '1', singlep = '0' WHERE gatunki_multi_single.id_gry = 10;";
mysqli_query($connect,$dodanie_gatunku);
}


echo $Gatunki;
echo $Rodzaj_g;
echo "<br>";
echo $id_gry;
if($Gatunki=="fps")
$dodanie_gatunku_gry="UPDATE gatunki SET fps = '1', mmo = '0', rpg = '0', moba = '0', inne = '0' WHERE gatunki.id_gry = $id_gry";
else if($Gatunki=="mmo")
$dodanie_gatunku_gry="UPDATE gatunki SET fps = '0', mmo = '1', rpg = '0', moba = '0', inne = '0' WHERE gatunki.id_gry = $id_gry";
 else if($Gatunki=="rpg")
$dodanie_gatunku_gry="UPDATE gatunki SET fps = '0', mmo = '0', rpg = '1', moba = '0', inne = '0' WHERE gatunki.id_gry = $id_gry";
 else if($Gatunki=="moba")
 {
$dodanie_gatunku_gry="UPDATE gatunki SET fps = '0', mmo = '0', rpg = '0', moba = '1', inne = '0' WHERE gatunki.id_gry = $id_gry";
    }
else if ($Gatunki=="inne")
{ 
$dodanie_gatunku_gry="UPDATE gatunki SET fps = '0', mmo = '0', rpg = '0', moba = '0', inne = '1' WHERE gatunki.id_gry = $id_gry";
}
mysqli_query($connect,$dodanie_gatunku_gry);


//dodawanie tworcy
$dodanie_tworcy="UPDATE tworcy SET Tworca = '$Tworca', Wydawca = '$Wydawca' WHERE tworcy.id = $id_tworcy;";
$dodanie_tworcy_W=mysqli_query($connect,$dodanie_tworcy);
//id gry

 
 


$specyfikacja_Z="UPDATE specyfikacja SET system_o = '$System', procesor = '$Procesor', ram = '$Ram', miejsce_dysku = '$Miejsce', directx = '$DirectX' WHERE specyfikacja.id =$id_gry;";
$specyfikacja_W=mysqli_query($connect,$specyfikacja_Z);
//danie id
 



mysqli_query($connect,$dodanie_gatunku_gry1);
mysqli_query($connect,$dodanie_gatunku_gry2);
 echo "dziala";
}
else
echo "źle wypełniłeś formularz ";