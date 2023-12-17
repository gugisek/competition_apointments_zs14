<?php
include '../security.php';
$korepetycja_id = $_POST['korepetycja_id'];
include '../database/conn_db.php';
$sql_check = "select * from zapisy_korepetycje where korepetycja_id = $korepetycja_id";
$result_check = mysqli_query($conn, $sql_check);
if(mysqli_num_rows($result_check) > 0){
    $sql = "update korepetycje set status_id = 3 where korepetycje_id = $korepetycja_id";
    $result = mysqli_query($conn, $sql);
    if($result){
        //log
                    $before = "";
                    $after = "Status: 3";
                    $object_id=$korepetycja_id;
                    $object_type="korepetycje";
                    $action_type="1";
                    $desc="Odwołano korepetycje";
                    include "../../scripts/log.php";
        //log
        $_SESSION['alert'] = 'Pomyślnie odwołano korepetycje';
        $_SESSION['alert_type'] = 'success';
    }else{
        $_SESSION['alert'] = 'Wystąpił błąd';
        $_SESSION['alert_type'] = 'error';
    }
}else{
    $sql_old = "select * from korepetycje where korepetycje_id = $korepetycja_id";
    $result_old = mysqli_query($conn, $sql_old);
    $row_old = mysqli_fetch_assoc($result_old);
    $sql = "delete from korepetycje where korepetycje_id = $korepetycja_id";
    $result = mysqli_query($conn, $sql);
    if($result){
        //log
                    $before = "Przedmiot: $row_old[przedmiot_id] <br/> Creator: $row_old[creator_id] <br/> Max users: $row_old[max_users] <br/> Godzina: $row_old[godzina] <br/> Data: $row_old[data] <br/> Status: $row_old[status_id] <br/> Destiny: $row_old[destiny] <br/> Room: $row_old[room_id] <br/> School: $row_old[school_id]";
                    $after = "";
                    $object_id=$korepetycja_id;
                    $object_type="korepetycje";
                    $action_type="3";
                    $desc="Usunięto korepetycje";
                    include "../../scripts/log.php";
        //log
        $_SESSION['alert'] = 'Pomyślnie usunięto korepetycje';
        $_SESSION['alert_type'] = 'success';
    }else{
        $_SESSION['alert'] = 'Wystąpił błąd';
        $_SESSION['alert_type'] = 'error';
    }
}
header('Location: ../../panel.php');
?>