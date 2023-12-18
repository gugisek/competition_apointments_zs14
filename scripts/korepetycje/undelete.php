<?php
include '../security.php';

if($_SESSION['account_type'] != '3'){
    header('Location: ../../404.php');
    exit();
}

$korepetycja_id = $_GET['korepetycja_id'];
include '../database/conn_db.php';
    $sql = "update korepetycje set status_id = 1 where korepetycje_id = $korepetycja_id";
    $result = mysqli_query($conn, $sql);
    if($result){
        //log
                    $before = "";
                    $after = "Status: 3";
                    $object_id=$korepetycja_id;
                    $object_type="korepetycje";
                    $action_type="1";
                    $desc="Przywrócono korepetycje";
                    include "../../scripts/log.php";
        //log
        $_SESSION['alert'] = 'Pomyślnie przywrócono korepetycje';
        $_SESSION['alert_type'] = 'success';
    }else{
        $_SESSION['alert'] = 'Wystąpił błąd';
        $_SESSION['alert_type'] = 'error';
    }
header('Location: ../../panel.php');
?>