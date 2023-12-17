<?php
session_start();
if($_SESSION['account_type'] != '1'){
    header('Location: ../../404.php');
    exit();
}
?>
hujj