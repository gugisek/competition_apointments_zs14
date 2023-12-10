<?php
include '../security.php';
$id = $_POST['id'];
include '../database/conn_db.php';
if($id!=''){
    $sql_old = "select * from invitations where invite_id='$id'";
    $result_old = $conn->query($sql_old);
    $row_old = mysqli_fetch_assoc($result_old);
    $sql = "DELETE FROM `invitations` WHERE `invite_id` = $id";
    mysqli_query($conn, $sql);
    $_SESSION['alert'] = 'Pomyślnie usunięto zaproszenie';
    $_SESSION['alert_type'] = 'success';
    //log
        $before = "Kod: ".$row_old['code']."<br/>Rola: ".$row_old['role_id']."<br/>Szkoła: ".$row_old['school_id']."<br/>Użycia: ".$row_old['uses']."";
        $after = "";
        $object_id=$id;
        $object_type="invites";
        $action_type="3";
        $desc="Usunięto zaproszenie";
        include "../log.php";
    //log

}else{
    $_SESSION['alert'] = 'Błąd usuwania zaproszenia';
    $_SESSION['alert_type'] = 'error';
}
header("Location: ../../panel.php");