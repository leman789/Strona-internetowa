<!DOCTYPE html>
<html>
<head>
    <?php include('menu/head_1.php');?>
    <meta charset="utf-8">
</head>
<body>
    <?php include('menu/menu_1.php');?>
  <img  id="obraz1" src="Zdjecia_gier/Top_gry/1.jpg" alt="zd_glowne">
  <!--<div id="napis2"></div>-->
<div id="stopka">
    <h3>Twórcy: <div id="napis"></div></h3>
    </div>
    <input type="button"  onclick="dodaj()" id="Kolejne_zdj">
    <input type="button"  onclick="odejmij()" id="Poprzednie_zdj">
    <script  src="zmianazdjzawartosc.js" defer>
    </script><!--dodanie pliku z zmianą obrazu i zawartosc-->
</body>
</html>