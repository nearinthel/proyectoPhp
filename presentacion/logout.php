<?php 

session_start();

$_SESSION["func"] = "";
$_SESSION["pass"] = "";

setcookie('fun',$reg,time() -1, "/");
setcookie('reg',$passi,time()-1 , "/");

session_destroy();


header("Location: ../index.html");
?>

