
<?php 
$connect=mysqli_connect("localhost","root","","strona_z_grami");
if(isset($_POST['hidden'])){
            $id_ofiary_z="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login_ofiary'";
            $id_ofiary_w=mysqli_query($connect,$id_ofiary_z);
            $id_ofiary=mysqli_fetch_array($id_ofiary_w);
            $hidden=$_POST['hidden'];
            $login=$_POST['login'];
            $imie=$_POST['imie'];
            $nazwisko=$_POST['nazwisko'];
            $opis_bana=$_POST['opis_bana'];
            $Ban_osoby_z="DELETE FROM `uzytkownicy` WHERE `id`=$hidden";
            $Powod_bana="INSERT INTO `lista_banow` (`id`, `id_uzytkownika`, `login`, `imie`, `nazwisko`, `opis_bana`) VALUES (NULL, '$hidden', '$login', '$imie', '$nazwisko', '$opis_bana');";
            mysqli_query($connect,$Powod_bana);
            mysqli_query($connect,$Ban_osoby_z);
            header("Location:panel_banowania.php");
        }
?>