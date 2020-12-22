<?php
setcookie("Clogin", "", time() - 3600,"/");
header("Location:index.php");
?>