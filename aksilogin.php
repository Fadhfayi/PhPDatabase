<?php


setcookie('nama_login',$_POST['username']);

// echo var_dump($_POST);

header("Location: index.php");




?>