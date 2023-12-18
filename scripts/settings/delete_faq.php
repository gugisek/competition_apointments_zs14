<?php
include "../security.php";

if($_SESSION['account_type'] != '1'){
    header('Location: ../../404.php');
    exit();
}

$id = $_GET['id'];
$type = $_GET['type'];
include "../database/conn_db.php";
$sql = "DELETE FROM $type WHERE id = $id";
if(mysqli_query($conn, $sql)){
    $_SESSION['alert'] = 'Pomyślnie usunięto pytanie o id: '.$id.'';
    $_SESSION['alert_type'] = 'success';
    //log
    $object_id=$id;
    $object_type=$type;
    $before="Pytanie: ".$row['question'].",<br/> Odpowiedź: ".$row['answer'];
    $after=" ";
    $action_type="3";
    $desc="Usunięto pytanie";
    include "../log.php";
    //log
    header('Location: ../../panel.php');
    exit();
}
else{
    $_SESSION['alert'] = 'Wystąpił błąd podczas usuwania pytania';
    $_SESSION['alert_type'] = 'error';
    header('Location: ../../panel.php');
    exit();
}
?>