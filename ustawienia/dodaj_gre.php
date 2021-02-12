<!DOCTYPE html>
<html >
<head>
  
    <link rel="stylesheet" href="../style/ustawienia.css" type="text/css">
    <link rel="stylesheet" href="../style/dodaj_gre.css" type="text/css">
    <?php include('../menu/head_2.php');?>
     <?php include('uprawnienia.php');?>
     <?php
     error_reporting(E_ALL ^ E_WARNING);
     $text=$_COOKIE["Blad"];
     ?>
</head>
<body>
    <?php include('../menu/menu_2.php');?>
    <div style="position:absolute; top:10%;" id="content">
    <div id="lewa">
    <?php include('ustawienia_lewa.php');?>
    </div>
        <p id="wynik"></p>
<div id="prawa1">
<?php 
 

  echo  "<div id='prawa_1'>";
  if(isset($text)){
    $blad="";
    echo "<div id='blad'>Podałeś błędne dane</div>";
    setcookie("Blad",$blad,time()+(60*2),"/");
  }
  echo '<h2>Dodaj włąsną grę</h2>';
  echo "<form action='../Zdjecia_gier/okladki/dodaj_gre1.php' method='POST' ENCTYPE='multipart/form-data' runat='server'> ";
 echo '<div>Nazwa gry:</div><input type="text" name="tytul"><br>';
 echo 'rodzaj rozgrywki';
 echo '<select name="rodzaj_g">';
echo ' <option value="multip">Multiplayer</option>
 <option value="singlep">Singleplayer</option>

</select><br>';
 echo " wybierz gatunek gry:";
 echo '<select  name="gatunki">';

echo ' <option value="fps">fps</option>
 <option value="mmo">mmo</option>
 <option value="rpg">rpg</option>
 <option value="moba">moba</option>
 <option value="inne">inne</option>
</select><br>';
  echo '<div>Cena:</div> <input type="number" name="cena"><br>';
  echo '<div>Data wydania</div> <input type="date" name="data"><br><br>';
  echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>';
  echo   "<div>Dodaj okładke:<br> </div><div class='file-input'>
       <input type='file' name='plik' id='file' class='file'>
       <label for='file'>
        
         <p class='file-name'></p>
       </label>
       <img id='blah' src='#' alt='your image'  width='250px'/>
     </div>
        <br><br><br>";
       
        echo "tutaj podaj plik swojej gry";
       
       echo   " <div class='file-input'>
       <input type='file' name='plik_gra' id='file' class='file'>
       <label for='file'>
       
        <p class='file-name'></p>
       </label>
       
         
       </div>
       <br>";    
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
    
      echo '<div>System operacyjny:</div> <input type="text" name="System"><br>';
    
      echo '<div>Procesor:</div> <input type="text" name="Procesor"><br>';
    
      echo '<div>Ram:</div> <input type="number" name="Ram"><br>';
    
      echo '<div>Miejsce na dysku:</div> <input type="number" name="Miejsce"><br>';
    
      echo '<div>DirectX:</div> <input type="number" name="DirectX"><br>';
    
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