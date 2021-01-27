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
 echo "<form action='../Zdjecia_gier/okladki/dodaj_gre1.php' method='POST' ENCTYPE='multipart/form-data'>";
 echo  "<scroll-container><div id='prawa_1'>";
  echo '<h2>Dodaj włąsną grę</h2>';
 echo 'Nazwa gry<input type="text" name="tytul"><br>';
  echo 'Cena <input type="number" name="cena"><br>';
  echo 'Data wydania <input type="date" name="data"><br>';
  echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>';
  echo   "<h5>Dodaj okładke</h5><div class='file-input'>
        <form runat='server'>
       <input type='file' name='plik' id='file' class='file'>
       <label for='file'>
         Wybierz plik ...
         <p class='file-name'></p>
       </label>
       <img id='blah' src='#' alt='your image'  width='250px'/>
       </form>
     </div>
        <br><br><br>";      
  echo '<h5>napisz opisz swojej gry do 250 znakow</h5>';
 echo' <textarea name="opis" id="" cols="30" rows="10"></textarea><br>';
    echo '<input type="button" value="dalej" onClick="prawa1_dalej()">';
    echo   "</div></scroll-container>";
 echo  "<div id='prawa_2'>";
 //echo '<h2>Dodaj włąsną grę</h2>';
  //echo '<h2>specyfikacja gry</h2>';
 //echo '<input type="text" name="tytul"><br>';
 // echo 'Cena <input type="number" name="cena"><br>';
  //echo 'Data wydania <input type="date" name="data"><br>';
         echo '<input type="button" value="wstecz" onClick="prawa2_wstecz()">';
        echo '<input type="button" value="dalej" onClick="prawa2_dalej()">';
 echo   "</div>";

 echo  "<div id='prawa_3'>";
 //echo '<h2>Dodaj włąsną grę</h2>';
    echo '<input type="button" value="wstecz" onClick="prawa3_wstecz()">';
        echo " <input type='submit' value='zapisz' id='zmien1'></form>";
    
 echo   "</div>";

 

echo '</form>';
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