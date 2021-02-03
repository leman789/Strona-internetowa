<!DOCTYPE html>
<html >
<head>
    <link rel="stylesheet" href="../style/ustawienia.css" type="text/css">
    <link rel="stylesheet" href="../style/dodaj_gre.css" type="text/css">
    <?php include('../menu/head_2.php');?>
</head>
<body>
    <?php include('../menu/menu_2.php');?>
    
    <div style="position:absolute; top:10%;" id="content">
    <div id="lewa">
     <a href="dane_osobowe.php"><div>Dane osobowe</div></a><br>
     <a href="doladuj.php"><div>Doladuj konto</div></a><br>
     <a href="transakcje.php"><div>Transakcje</div></a><br>
     <a href="zabezpieczenia.php"><div>Haslo i zabezpieczenia</div></a><br>
     <a href='dodaj_gre.php'><div>Dodaj własną grę</div></a><br>
    <a href='statystyki_gier.php'><div>Statystyki gier</div></a><br>
    <a href='panel_gier.php'><div>Panel gier</div></a><br>
    </div>
   
   
        <p id="wynik"></p>
<div id="prawa1">
<?php 
$id_gry=$_POST['id_gry'];
echo $id_gry;
$connect=mysqli_connect("localhost","root","","strona_z_grami");
$dane_gry="SELECT `Nazwa`,`Opis`,`Cena`,tworcy.Tworca,tworcy.Wydawca,`Data_wydania`,`Obrazek`,`Alt_obrazka`,specyfikacja.system_o,specyfikacja.procesor,specyfikacja.ram, specyfikacja.miejsce_dysku,specyfikacja.directx FROM `gry` JOIN specyfikacja ON specyfikacja.id=gry.id_specyfikacja JOIN tworcy on tworcy.id=gry.id_tworcy WHERE gry.id=$id_gry";
$dane_gry_W=mysqli_query($connect,$dane_gry);
while($dane_gry_R=mysqli_fetch_array($dane_gry_W))
{
  $nazwa=$dane_gry_R[0];
  $opis=$dane_gry_R[1];
  $cena=$dane_gry_R[2];
  $tworca=$dane_gry_R[3];
  $wydawca=$dane_gry_R[4];
  $data_wydania=$dane_gry_R[5];
  $obrazek=$dane_gry_R[6];
  $alt_obrazka=$dane_gry_R[7];
  $system=$dane_gry_R[8];
  $procesor=$dane_gry_R[9];
  $ram=$dane_gry_R[10];
  $miejsce=$dane_gry_R[11];
  $dex=$dane_gry_R[12];

}
echo "$nazwa";
 $gatunek="SELECT `fps`,`mmo`,`rpg`,`moba`,`inne`,gatunki_multi_single.multip,gatunki_multi_single.singlep FROM `gatunki` JOIN gatunki_multi_single ON gatunki_multi_single.id_gry=gatunki.id_gry WHERE gatunki.id_gry=$id_gry";
 $gatunek_W=mysqli_query($connect,$gatunek);
 while($gatunke_R=mysqli_fetch_array($gatunek_W))
 {
   $fps=$gatunek_R[0];
   $mmo=$gatunek_R[1];
   $rpg=$gatunek_R[2];
   $moba=$gatunek_R[3];
   $inne=$gatunek_R[4];
   $mulip=$gatunek_R[5];
   $singlep=$gatunek_R[6];
 }

 $gatunek_value="fps";
 $gatunek_m_s_value="multip";
 if($fps==1)
 $gatunek_value="fps";
 else if($mmo==1)
 $gatunek_value="mmo";
 else if($rpg==1)
 $gatunek_value="rpg";
 else if($moba==1)
 $gatunek_value="moba";
 else if($inne==1)
 $gatunek_value="inne";

  if($mulip==1)
  { 
 $gatunek_m_svalue="multip";
 $gatunek_m_svalue_1="Multiplayer";
  }
 else 
 { 
 $gatunek_m_svalue="singlep";
 $gatunek_m_svalue="singlep";
 }




 echo "<form action='../Zdjecia_gier/okladki/zmiana_w_grach.php' method='POST' ENCTYPE='multipart/form-data' runat='server'> ";
 echo  "<div id='prawa_1'>";
  echo '<h2>Dodaj włąsną grę</h2>';
 echo "<div>Nazwa gry:</div><input type='text' value='$nazwa' name='tytul'><br>";
 echo 'rodzaj rozgrywki';
 echo '<select name="rodzaj_g">';
echo " 
<option value='$gatunek_m_s_value'>$gatunek_m_s_value</option>
<option value='multip'>Multiplayer</option>
 <option value='singlep'>Singleplayer</option>

</select><br>";
 echo " wybierz gatunek gry:";
 echo '<select name="gatunki">';
echo "
<option value='$gatunek_value'>$gatunek_value</option>
<option value='fps'>fps</option>
 <option value='mmo'>mmo</option>
 <option value='rpg'>rpg</option>
 <option value='moba'>moba</option>
 <option value='inne'>inne</option>
</select><br>";

  echo "<div>Cena:</div> <input type='number' value='$cena' name='cena'><br>";
  echo "<input type='hidden' name='id_gry' value='$id_gry'>
  <input type='hidden' name='obrazek' value='$obrazek'>";
  echo "<div>Data wydania</div> <input type='date' value='$data_wydania' name='data'><br><br>";
  echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>";
  echo "<div id='zdj_okladki'> Aktualna okładka<br><img src='../zdjecia_gier/okladki/$obrazek' alt='$alt_obrazka' width='150px' height='160px'></div>";
  echo  "<div>Dodaj okładke:<br> </div><div class='file-input'> 
       <input type='file' name='plik' id='file' class='file'>
       <label for='file'>
        
         <p class='file-name'></p>
       </label>
       <img id='blah' src='#' alt='your image'  width='250px'/>
     </div>
        <br><br><br>";      
  echo '<div>Napisz opisz swojej gry do 250 znakow:</div><br>';
 echo' <textarea name="opis" placeholder="Opis nie zostanie zmieniony jezeli nic nie zostanie wpisane" id="" cols="80" rows="5"></textarea><br>';
    echo '<input type="button" value="dalej" onClick="prawa1_dalej()" class="przycisk">';
    echo   "</div>";
 echo  "<div id='prawa_2'>";
         echo '<h2>Dodaj włąsną grę</h2>';
        echo '<h3>Twórca gry</h3>';
        echo "<div>Twórca gry:</div><input type='text' value='$tworca' name='Tworca'><br>";
     echo '<h3>Wydawca gry</h3>';
        echo "<div>Wydawca gry:</div><input type='text' value='$wydawca'name='Wydawca'><br>";
         echo '<input type="button" value="wstecz" onClick="prawa2_wstecz()" class="przycisk">';
        echo '<input type="button" value="dalej" onClick="prawa2_dalej()" class="przycisk">';
 echo   "</div>";

 echo  "<div id='prawa_3'>";
    echo '<h2>Dodaj włąsną grę</h2>';
    echo '<h3>Specyfikacje gry</h3>';
    
      echo "<div>System operacyjny:</div> <input type='text' value='$system' name='System'><br>";
    
      echo "<div>Procesor:</div> <input type='text' value='$procesor' name='Procesor'><br>";
    
      echo "<div>Ram:</div> <input type='number' value='$ram' name='Ram'><br>";
    
      echo "<div>Miejsce na dysku:</div> <input type='number' value='$miejsce' name='Miejsce'><br>";
    
      echo "<div>DirectX:</div> <input type='number' value='$dex' name='DirectX'><br>";
    
        echo '<input type="button" value="wstecz" onClick="prawa3_wstecz()" class="przycisk">';
        echo '<input type="submit" value="zapisz" id="zmien1" class="przycisk"></form>';
    
 echo   "</div>";
?>
<script>
 function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$("#file").change(function() {
  readURL(this);
});
</script>
<?php
// pobieranie id
$login=$_COOKIE["Clogin"];
$connect=mysqli_connect("localhost","root","","strona_z_grami");
$id_uzytkownika="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login'";
$id_uzytkownika_W=mysqli_query($connect,$id_uzytkownika);
$id_uzytkownika_R=mysqli_fetch_array($id_uzytkownika_W);



    mysqli_close($connect);
?>
    <script>
    function prawa1_dalej(){
     document.getElementById("wynik").innerHTML="<style>#prawa_1{z-index: 1;}#prawa_2{z-index: 5;} #prawa_3{z-index: 1;}</style>";}
    function prawa2_dalej(){
     document.getElementById("wynik").innerHTML="<style>#prawa_1{z-index: 1;}#prawa_2{z-index: 1;} #prawa_3{z-index: 5;}</style>";}
    function prawa2_wstecz(){
         document.getElementById("wynik").innerHTML="<style>#prawa_1{z-index: 5;}#prawa_2{z-index: 1;} #prawa_3{z-index: 1;}</style>";}
    function prawa3_wstecz(){
         document.getElementById("wynik").innerHTML="<style>#prawa_1{z-index: 1;}#prawa_2{z-index: 5;} #prawa_3{z-index: 1;}</style>";}
</script>
</div>
</div>
</body>
</html>