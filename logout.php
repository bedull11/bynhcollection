<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

// alihkan ke halaman login (index.php) dan berikan alert = 2
header('Location: index.php');
?>