<?php
$login=$_COOKIE["Clogin"];
$id=$_POST['id'];
$connect=mysqli_connect("localhost","root","","strona_z_grami");
echo $login;
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
print_r($id_gier);
$zapytanie="SELECT * FROM `gry` WHERE id='$id'";
$wynik=mysqli_query($connect,$zapytanie);
$rekord=mysqli_fetch_array($wynik);
    echo "$rekord[1]<br>
    $rekord[2]<br>$rekord[3]<br>$rekord[4]<br>$rekord[5]<br>$rekord[6]<br>$rekord[7]<br>$rekord[8]
    ";
$kup="kup";
$noniewiem="<input type='submit' value='$kup'>";
echo "<br>
<form action='zakup2.php' method='post'>
<input type='hidden' value='$id' name='gra'>";
foreach($id_gier as $value){
if($value==$rekord[0]){
    $kup="masz juz";
    $noniewiem="<a href='sklep.php'>$kup</a>";
}
}
    
echo "
    $noniewiem
    </form>
    <a href='sklep.php'>Wroc</a><br>";
?>