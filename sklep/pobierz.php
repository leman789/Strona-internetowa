
<form action="" method="post">
<input type='hidden' value='2115' name='gra'>
    <button type="submit" style="background-color: white; /* Green */
  border: none;
  color: white;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;">
    <img src='../Zdjecia_gier/okladki/1215555469.jpg' alt='' width='150px' height='185px' id='okladka_obraz'/>
<div style="padding-top:10px;color:black;">xddd</div>
</button>
</form>
<?php
    $id=$_POST['gra'];
echo $id;
?>
<form action='sklep/zakup.php' method='post'>
        <div id='okladka'>
            <button type='submit'>
                <img src='Zdjecia_gier/okladki/$biblioteka_R[2]' alt='$biblioteka_R[3]' width='150px' height='185px' id='okladka_obraz'/>
                $biblioteka_R[1]
                </button>
            <input type='hidden' value='$biblioteka_R[0]' name='id'>
        </div>
</form>
<form action='sklep/zakup.php' method='post'>
    <button type='submit'>
    <img src='Zdjecia_gier/okladki/$biblioteka_R[2]' alt='$biblioteka_R[3]' width='150px' height='185px' id='okladka_obraz'><br>
        $biblioteka_R[1]
        $biblioteka_R[0]
        <input type='hidden' name='id' value='$biblioteka_R[0]'>
        $noniewiem 
    </button>
         </form>