<?php
$connect=mysqli_connect("localhost","root","","strona_z_grami");
$zapytanie="SELECT id,Nazwa,Obrazek,Alt_obrazka FROM `gry`";
$wynik=mysqli_query($connect,$zapytanie);
while($rekord=mysqli_fetch_array($wynik))
{
    echo "
        $rekord[0]
        <form action='zakup.php' method='post'>
        <input type='hidden' name='id' value='$rekord[0]'>
        <input type='submit' value='Zobacz'>
        </form>";
}
?>