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
    <a href="pomoc.php"><div>Pomoc</div></a><br>