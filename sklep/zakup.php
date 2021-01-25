<!DOCTYPE html>
<html>
<head>
 
<meta charset="utf-8">
     <link rel="stylesheet" href="../style/zakup.css" type="text/css">
     <?php include('../menu/head_2.php');?>
</head>
<body>
    <?php include('../menu/menu_2.php');?>
    <div id="content">
    <?php
$connect=mysqli_connect("localhost","root","","strona_z_grami");
        if(isset($_POST['id2']))
           {
                $id2=$_POST['id2'];
                $pobieranie_id_gry_z="SELECT id_gry FROM `top_5` WHERE id=$id2";
                $pobieranie_id_gry_w=mysqli_query($connect,$pobieranie_id_gry_z);
                $pobieranie_id_gry=mysqli_fetch_array($pobieranie_id_gry_w);
                $id=$pobieranie_id_gry[0];
           }
        else{
            $id=$_POST['id'];
        }
$login=$_COOKIE["Clogin"];
$id_gier=[];
$i=0;
$uzytkownik="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login'";
$wynik=mysqli_query($connect,$uzytkownik);
$rekord=mysqli_fetch_array($wynik);
$gry="SELECT id_gry FROM `biblioteka_gier` WHERE id_uzytkownika='$rekord[0]'";
$wynik2=mysqli_query($connect,$gry);
while($rekord2=mysqli_fetch_array($wynik2))
{
    $id_gier[$i]=$rekord2[0];
    $i++;
}
$zapytanie="SELECT * FROM `gry` WHERE id='$id'";
$wynik=mysqli_query($connect,$zapytanie);
$rekord=mysqli_fetch_array($wynik);
    $tworca_z="SELECT * FROM `tworcy` where id='$rekord[4]'";
        $tworca_w=mysqli_query($connect,$tworca_z);
        $tworca=mysqli_fetch_array($tworca_w);
    echo "
        <div id='kupno'>
        <div id='obraz_z'><img src='../Zdjecia_gier/okladki/$rekord[6]' alt=' $rekord[7]' id='okladka_obraz'></div>
        <div id='prawa'>
        <div id='tytul' class='prawa_d'>Tytuł: $rekord[1]</div>
        <div id='opis'class='prawa_d'>Opis: $rekord[2]</div>
        <div id='tworca' class='prawa_d'>Tworca: $tworca[1]</div><div id='tworca' class='prawa_d'>Wydawca: $tworca[2]</div>
        <div id='data'class='prawa_d'>Data powstania: $rekord[5]</div>
        <div id='cena'class='prawa_d'>Cena: $rekord[3]zł</div>
        </div>
        <div id='przyciski'>
    ";
    $zapytanie_Specyfikacje="SELECT `system_o`,`procesor`,`ram`,`miejsce_dysku`,`directx` FROM `specyfikacja` WHERE`id_gry`=$id";
    $wynik=mysqli_query($connect,$zapytanie_Specyfikacje);
    while($rekord_s=mysqli_fetch_array($wynik))
    {
       $system= $rekord_s[0];
       $procesor=$rekord_s[1];
        $ram=$rekord_s[2];
        $miejsce=$rekord_s[3];
        $dirx=$rekord_s[4];
    }
    $w_system= "<input type='hidden' value='$system' id='system'>";
    $w_procesor="<input type='hidden' value='$procesor' id='procesor'>";
    $w_ram="<input type='hidden' value='$ram' id='ram'>";
    $w_miejsce="<input type='hidden' value='$miejsce' id='miejsce'>";
    $w_dirx="<input type='hidden' value='$dirx' id='dirx'>";
$wymagania="<input type='hidden' value='$rekord[7]' id='wynagania'>";
echo $w_procesor;
echo $w_ram;
echo $w_system;
echo $w_miejsce;
echo $w_dirx;
 echo $wymagania;
    

$kup="kup";
$noniewiem="<input type='submit' value='$kup' id='przycisk'>";
$action="zakup2.php";
foreach($id_gier as $value){
if($value==$rekord[0]){
    $action="pobierz.php";
$kup="pobierz";
$noniewiem="<a href='../gry_rar/download.php?path=$rekord[1].rar' id='przycisk'>$kup</a>";
}
}
echo "<br>
<form action='$action' method='post'>
<input type='hidden' value='$id' name='gra'>";
    
echo "
    $noniewiem
    </form>
   <a href='../sklep.php'><div id='przycisk3'>Wroc</div></a>";
    echo "<div id='wymagania1'><input type='button'  onclick='wymagania()' id='wymagania' value='pokaz wymagania'></div></div></div>";
    $informacje=$rekord[6];
    mysqli_close($connect);
?>
    </div>
    <script>
        var napis_startowy=document.getElementById("prawa").textContent;
        var napis=document.getElementById("wynagania").value;
        var system=document.getElementById("system").value;
        var procesor=document.getElementById("procesor").value;
        var ram=document.getElementById("ram").value;
        var miejsce=document.getElementById("miejsce").value;
        var dirx=document.getElementById("dirx").value;
              let wym=0;
        function wymagania(){
            wym++;
                if(wym==1){
                document.getElementById("prawa").innerHTML="<div id='opis_wymagan' >"+"<p id='zm1' class='prawa_d2'>System:<br>"+system+"</p><p id='zm2' class='prawa_d2'>Procesor:<br>"+procesor+"</p><p id='zm3' class='prawa_d2'>Ram:"+ram+"GB</p><p id='zm4' class='prawa_d2'>Miejsce:"+miejsce+"GB</p><p id='zm5' class='prawa_d2'>DirectX:"+dirx+"</p></div>";}
            else if(wym>1){
                wym=0;
                javascript:location.reload();
            }
        }
    </script>
</body>
    <!--document.getElementById("prawa").innerHTML="";-->
</html>