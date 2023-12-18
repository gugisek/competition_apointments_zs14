<?php
include '../security.php';

if($_SESSION['account_type'] != '2'){
    header('Location: ../../404.php');
    exit();
}

$id = $_GET['id'];
include '../database/conn_db.php';
if($id!=''){
    $sql_old = "select * from user_class where class_id='$id'";
    $result_old = $conn->query($sql_old);
    $row_old = mysqli_fetch_assoc($result_old);
    $sql = "DELETE FROM `user_class` WHERE `class_id` = $id";
    mysqli_query($conn, $sql);
    $_SESSION['alert'] = 'Pomyślnie usunięto klasę';
    $_SESSION['alert_type'] = 'success';
    //log
        $before = "Nazwa: ".$row_old['name']."<br/>Profil: ".$row_old['profile']."<br/>Rocznik: ".$row_old['rocznik']."<br/>Szkoła: ".$row_old['school_id']."";
        $after = "";
        $object_id=$id;
        $object_type="classes";
        $action_type="3";
        $desc="Usunięto klasę";
        include "../log.php";
    //log

}else{
    $_SESSION['alert'] = 'Błąd usuwania klasy';
    $_SESSION['alert_type'] = 'error';
}
header("Location: ../../panel.php");