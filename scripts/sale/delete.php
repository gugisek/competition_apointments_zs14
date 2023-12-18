<?php
include '../security.php';

if($_SESSION['account_type'] != '2'){
    header('Location: ../../404.php');
    exit();
}

$id = $_POST['id'];
include '../database/conn_db.php';
if($id!=''){
    $sql_old = "select * from rooms where room_id='$id'";
    $result_old = $conn->query($sql_old);
    $row_old = mysqli_fetch_assoc($result_old);
    $sql = "DELETE FROM `rooms` WHERE `room_id` = $id";
    mysqli_query($conn, $sql);
    $_SESSION['alert'] = 'Pomyślnie usunięto sale';
    $_SESSION['alert_type'] = 'success';
    //log
        $before = "Sala: ".$row_old['name']."<br/>Budynek: ".$row_old['build_id']."<br/>Szkoła: ".$row_old['school_id']."";
        $after = "";
        $object_id=$id;
        $object_type="sale";
        $action_type="3";
        $desc="Usunięto sale";
        include "../log.php";
    //log
}else{
    $_SESSION['alert'] = 'Błąd usuwania sali';
    $_SESSION['alert_type'] = 'error';
}
header("Location: ../../panel.php");