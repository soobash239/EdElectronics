<?php
session_start();// started session
session_unset();// unset session
session_destroy();//destroy sesstion

header('Location:index.php');//location index.php
?>

