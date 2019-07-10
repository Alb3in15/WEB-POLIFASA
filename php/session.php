<?php
    session_start();
    $idtb=$_POST['val'];
    $_SESSION['consul']= $idtb;
    echo $idtb;
 ?>