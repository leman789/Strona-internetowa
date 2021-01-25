<!DOCTYPE html>
<html>
<head>
      <link rel="stylesheet" href="../style/ustawienia.css" type="text/css">
    <link rel="stylesheet" href="../style/doladuj.css" type="text/css">
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
    </div>
<div id="prawa">
<h2>SPOSOBY PŁATNOŚCI</h2>
<p id="sprawdz"><a href="transakcje.php" style="color:white; text-decoration:none;text-align: center;">Sprawdź historię płatności i aktualny stan konta Gspot.</a></p><br>
<h2>DODAJ METODĘ PŁATNOŚCI</h2>
    <div id="m_p">
<button onclick='Karta_kredytowa(2),Play(3),PayPal(3)' id='karta' class="przycisk">
Karta kredytowa
</button>
<div id="karta_kredytowa1"></div>


<button onclick='Karta_kredytowa(3),Play(2),PayPal(3)' id='Play' class="przycisk">
Play
</button>
<div id="Play1"  class="przycisk_content"></div>
        
<button onclick='Karta_kredytowa(3),Play(3),PayPal(2)' id='PayPal' class="przycisk">PayPal
</button>
        
<div id="PayPal1"  class="przycisk_content"></div></div>
<?php
//pobieranie id;
$login=$_COOKIE["Clogin"];
$connect=mysqli_connect("localhost","root","","strona_z_grami");
$id_uzytkownika="SELECT id_uzytkownika FROM `dane_logowania` WHERE Login='$login'";
$id_uzytkownika_W=mysqli_query($connect,$id_uzytkownika);
$id_uzytkownika_R=mysqli_fetch_array($id_uzytkownika_W);
 //wstawianie reszty
$zapytanie="SELECT `nr_karty`,`miesiac`,`rok`,`cvv` FROM `konto_bankowe` WHERE `id_uzytkownika`=$id_uzytkownika_R[0]";
$wynik=mysqli_query($connect,$zapytanie);
while($rekord=mysqli_fetch_array($wynik))
{
    $nr_karty=$rekord[0];
    $miesiac=$rekord[1];
    $rok=$rekord[2];
    $cvv=$rekord[3];
}

$zapytanie="SELECT `nr_telefonu`,`kod` FROM `play` WHERE `id_uzytkownika`=$id_uzytkownika_R[0]";
$wynik=mysqli_query($connect,$zapytanie);
while($rekord=mysqli_fetch_array($wynik))
{
    $nr_tel=$rekord[0];
    $kod=$rekord[1];  
}
$zapytanie="SELECT `login_paypal`,`haslo_paypal` FROM `paypal` WHERE `id_uzytkownika`=$id_uzytkownika_R[0]";
$wynik=mysqli_query($connect,$zapytanie);
while($rekord=mysqli_fetch_array($wynik))
{
    $login_paypal=$rekord[0];
    $haslo_paypal=$rekord[1];  
}
error_reporting(0);
mysqli_close($connect);
?>
<script>
    x=1;
function Karta_kredytowa(a)
        {
         x=x*a;
            if(x==2){
                document.getElementById("karta_kredytowa1").innerHTML="<div id='elwysKarta'> <?php echo "<form action='doladuj1.php' method='post'>";  echo  "<div id='Pdiv'>kwota:</div><input type='text' name='ile' placeholder='*kwota doładowania' value=''><br>"; echo "<div id='Pdiv'>nr_konta:</div><input type='text' name='nr_karty'placeholder='nr_karty' maxlength='26' value='$nr_karty';><br>"; echo "<div id='Pdiv'>miesiąc:</div> <input type='number' name='miesiac'placeholder='miesiac' max='12' min='1' maxlength='2' value='$miesiac'><br>"; echo " <div id='Pdiv'> rok:</div> <input type='number' name='rok'placeholder='rok' min='1980' maxlength='4' value='$rok'><br>"; echo " <div id='Pdiv'>ccv:</div> <input type='number' name='cvv' placeholder='ccv'maxlength='3' value='$cvv'>";  echo "<br><input type='submit' value='wykonaj' id='wykonaj'>";echo "</form>";?></div>";
                }
            else if(x==1 || x>2){
                 x=1;
                document.getElementById("karta_kredytowa1").innerHTML="";
                }
        }
    y=1;
        function Play(b)
        {
            y=y*b;
            
            if(y==2){
                document.getElementById("Play1").innerHTML="<div id='elwysPlay'> <?php echo "<form action='doladuj2.php' method='post'>";  echo  "kwota:<input type='text' name='ile' placeholder='*kwota doładowania'><br>"; echo "numer telefonu: <input type='text' name='nr_tel' placeholder='*numer telefonu' value='$nr_tel'><br>"; echo "kod: <input type='number' name='kod' placeholder='*kod' value='$kod'>";  echo "<input type='submit' value='wykonaj'id='wykonaj'>";echo "</form>";?></div>";
                }
            else if(y==1 || y>2){
                  y=1;
                    document.getElementById("Play1").innerHTML="";
                }
        }
    z=1;
        function PayPal(c)
        {
            z=z*c;
            if(z==2){
                document.getElementById("PayPal1").innerHTML="<div id='elwysPayPal'> <?php echo "<form action='doladuj3.php' method='post'>";  echo  "kwota:<input type='text' name='ile' placeholder='*kwota doładowania'><br>"; echo "login:<input type='text' name='login_paypal' placeholder='*login paypal' value='$login_paypal'><br>"; echo "haslo: <input type='text' name='haslo_paypal' placeholder='*haslo PayPal' value='$haslo_paypal'>"; echo "<input type='submit' value='wykonaj'id='wykonaj'>";echo "</form>";?></div>";
                }
            else if(z==1 || z>2){
                  z=1;
                    document.getElementById("PayPal1").innerHTML="";
                }
        }

</script>
</div>
</div>
</body>
</html>