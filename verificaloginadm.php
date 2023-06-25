<?php
session_start();

if(!isset($_SESSION['useradm'])){ header("Location:login.php");}

?>