<!DOCTYPE html>
<html >
<head>
    <link rel="stylesheet" href="../style/ustawienia.css" type="text/css">
    <link rel="stylesheet" href="../style/dane_osobowe.css" type="text/css">
    <?php include('../menu/head_2.php');?>
     <?php include('uprawnienia.php');?>
     <style>
     h2{
       font-size: 300%;
     }
     table{
       margin:0 auto;
     }
     table,tr,th,td{
      border: 2px solid black;
      border-collapse: collapse;
     }
     td,th{
       padding:0.5% 1%;
       margin:0 auto;
       text-align:center;
       font-size:200%;
     }
     td{

     }
     </style>
</head>
<body>
    <?php include('../menu/menu_2.php');?>
    <div style="position:absolute; top:10%;" id="content">
    <div id="lewa">
    <?php include('ustawienia_lewa.php');?>
    </div>
<div id="prawa">
<h2>Statystyki</h2>
<table style="width 100%;">
<thead>
      <tr>
         <th>Nazwa</th> <th>Cena Gry</th> <th>Ilość sprzedanych sztuk</th><th>Cały zarobek</th>
      </tr>
</thead>
<tbody>
<?php
    $zdj_avatara_p=$rekord[2];
// pobieranie id
$login=$_COOKIE["Clogin"];
$connect=mysqli_connect("localhost","root","","strona_z_grami");
$id_uzytkownika="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login'";
$id_uzytkownika_W=mysqli_query($connect,$id_uzytkownika);
$id_uzytkownika_R=mysqli_fetch_array($id_uzytkownika_W);
//wyswitlanie rekordow 
$statystyki="SELECT gry.Nazwa, gry.Cena ,statystyki.ilosc, statystyki.zarobek FROM `statystyki` JOIN `gry` ON statystyki.id_gry=gry.id WHERE `id_dodajacego`=$id_uzytkownika_R[0];";
$statystyki_W=mysqli_query($connect,$statystyki);
while($staty=mysqli_fetch_array($statystyki_W)){
  echo "<tr>
        <td>$staty[0]</td> <td>$staty[1]</td> <td>$staty[2]</td><td>$staty[3]</td>
        </tr>";
}

    mysqli_close($connect);
?>
</tbody>
</table>
</div>
</div>
</body>
</html>