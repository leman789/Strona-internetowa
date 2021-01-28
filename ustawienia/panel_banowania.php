<!DOCTYPE html>
<html >
<head>
    <link rel="stylesheet" href="../style/ustawienia.css" type="text/css">
    <link rel="stylesheet" href="../style/panel_banowania.css" type="text/css">
    <?php include('../menu/head_2.php');?>
        <?php include('uprawnienia.php');?>
</head>
<body>
    <?php include('../menu/menu_2.php');?>
    <div style="position:absolute; top:10%;" id="content">
    <div id="lewa">
     <a href="dane_osobowe.php"><div>Dane osobowe</div></a><br>
     <a href="doladuj.php"><div>Doladuj konto</div></a><br>
     <a href="transakcje.php"><div>Transakcje</div></a><br>
     <a href="zabezpieczenia.php"><div>Haslo i zabezpieczenia</div></a><br>
        <?php
        if($uprawnienia[0]!=0){
     echo "<a href='dodaj_gre.php'><div>Dodaj własną grę</div></a><br>";
     echo "<a href='statystyki_gier.php'><div>Statystyki gier</div></a><br>";
     echo "<a href='panel_gier.php'><div>Panel gier</div></a><br>";
        }?>
          <?php
        if($uprawnienia[0]==2){
             echo "<a href='panel_banowania.php'><div>Panel administratora</div></a><br>";
        }
    ?>
        
    </div>
    <p id="wynik"></p>
<div id="prawa1">
<?php
$login=$_COOKIE["Clogin"];
$connect=mysqli_connect("localhost","root","","strona_z_grami");
?>
<?php 
    //początek menu
    echo  "<div id='prawa_1'>";
    echo '<input type="button" value="Gracze" onClick="prawa1_dalej()" class="prawa_1_przycisk">';
    echo '<input type="button" value="Gry" onClick="prawa2_dalej()" id="Przycisk_gry" class="prawa_1_przycisk">';
    echo   "</div>";
    
    //Ban osoby
    echo  "<div id='prawa_2'>";
    echo  "<form action='Ban_osoby.php' method='post'>";
    echo '<p>Login osoby do zbanowania:</p><br> <input type="text" name="login_ofiary"><br>';
    echo '<p>Powod:</p><br> <textarea name="Powod_osoby" id="" cols="30" rows="3" maxlength="100"></textarea><br>';
    echo '<input type="button" value="wstecz" onClick="prawa2_wstecz()" class="przycisk">';
    echo '<input type="submit" value="zbanuj" id="zmien1" class="przycisk"></form>'; 
    
    echo   "</div>";

    //Ban gry
    echo  "<div id='prawa_3'>";
    echo  "<form action='Ban_gry.php' method='post'>";
    echo '<p>Nazwa gry do zbanowania:</p><br> <input type="text" name="Nazwa_gry"><br>';
    echo '<p>Powod:</p><br> <textarea name="Powod_gry" id="" cols="30" rows="3" maxlength="100"></textarea><br>';
    echo '<input type="button" value="wstecz" onClick="prawa2_wstecz()" class="przycisk">';
    echo '<input type="submit" value="zbanuj" id="zmien1" class="przycisk"></form>';
    
    
 echo   "</div>";
mysqli_close($connect);
?>
</div>
</div>
        <script>
    function prawa1_dalej(){
     document.getElementById("wynik").innerHTML="<style>#prawa_1{z-index: 1;}#prawa_2{z-index: 5;} #prawa_3{z-index: 1;}</style>";}
    function prawa2_dalej(){
     document.getElementById("wynik").innerHTML="<style>#prawa_1{z-index: 2;}#prawa_2{z-index: 1;} #prawa_3{z-index: 5;}</style>";}
    function prawa2_wstecz(){
         document.getElementById("wynik").innerHTML="<style>#prawa_1{z-index: 5;}#prawa_2{z-index: 1;} #prawa_3{z-index: 1;}</style>";}
    function prawa3_wstecz(){
         document.getElementById("wynik").innerHTML="<style>#prawa_1{z-index: 1;}#prawa_2{z-index: 5;} #prawa_3{z-index: 1;}</style>";}
</script>
</body>
</html>