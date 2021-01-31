<?php
$connect=mysqli_connect("localhost","root","","strona_z_grami");
if(isset($_POST['hidden'])){
    $id_gry=$_POST['hidden'];
    $Nazwa=$_POST['Nazwa'];
    $Opis=$_POST['Opis'];
    $Cena=$_POST['Cena'];
    $Tworcy=$_POST['Tworcy'];
    $Wydawca=$_POST['Wydawca'];
    $Data_wydania=$_POST['Data_wydania'];
    //Delete gry
    echo $id_gry;
    $Ban_gry_z="DELETE FROM `gry` WHERE `id`='$id_gry'";
    $Powod_bana_gry="INSERT INTO `lista_banow_gier` (`id`, `id_gry`,    `Nazwa`, `Opis`, `Cena`, `Tworcy`, `Wydawca`, `Data_wydania`) VALUES (NULL, '$id_gry', '$Nazwa', '$Opis', '$Cena', '$Tworcy', '$Wydawca', '$Data_wydania');";
    mysqli_query($connect,$Powod_bana_gry);
    mysqli_query($connect,$Ban_gry_z);
    header("Location:Ban_gry.php");
}
?>