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
 echo "<form action='../Zdjecia_gier/okladki/dodaj_gre1.php' method='POST' ENCTYPE='multipart/form-data' runat='server'> ";
 echo  "<div id='prawa_1'>";
  echo '<h2>Dodaj włąsną grę</h2>';
 echo '<div>Nazwa gry:</div><input type="text" name="tytul"><br>';
  echo '<div>Cena:</div> <input type="number" name="cena"><br>';
  echo '<div>Data wydania</div> <input type="date" name="data"><br><br>';
  echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>';
  echo   "<div>Dodaj okładke:<br> </div><div class='file-input'>
       <input type='file' name='plik' id='file' class='file'>
       <label for='file'>
         Wybierz plik ...
         <p class='file-name'></p>
       </label>
       <img id='blah' src='#' alt='your image'  width='250px'/>
     </div>
        <br><br><br>";      
  echo '<div>Napisz opisz swojej gry do 250 znakow:</div><br>';
 echo' <textarea name="opis" id="" cols="80" rows="5"></textarea><br>';
    echo '<input type="button" value="dalej" onClick="prawa1_dalej()" class="przycisk">';
    echo   "</div>";
 echo  "<div id='prawa_2'>";
         echo '<h2>Dodaj włąsną grę</h2>';
        echo '<h3>Twórca gry</h3>';
        echo '<div>Twórca gry:</div><input type="text" name="Tworca"><br>';
     echo '<h3>Wydawca gry</h3>';
        echo '<div>Wydawca gry:</div><input type="text" name="Wydawca"><br>';
         echo '<input type="button" value="wstecz" onClick="prawa2_wstecz()" class="przycisk">';
        echo '<input type="button" value="dalej" onClick="prawa2_dalej()" class="przycisk">';
 echo   "</div>";

 echo  "<div id='prawa_3'>";
    echo '<h2>Dodaj włąsną grę</h2>';
    echo '<h3>Specyfikacje gry</h3>';
      echo '<div>System operacyjny:</div> <input type="text" name="Wydawca"><br>';
      echo '<div>Procesor:</div> <input type="text" name="Wydawca"><br>';
      echo '<div>Ram:</div> <input type="number" name="Wydawca"><br>';
      echo '<div>Miejsce na dysku:</div> <input type="number" name="Wydawca"><br>';
      echo '<div>DirectX:</div> <input type="number" name="Wydawca"><br>';
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