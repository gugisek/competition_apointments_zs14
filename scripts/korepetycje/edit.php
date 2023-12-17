<?php
include '../security.php';
$korepetycja_id = $_POST['korepetycja_id'];
$przedmiot_id = $_POST['przedmiot_id'];
$class_id = $_POST['class_id'];
$class_id = implode(", ", $class_id);
$max_users = $_POST['max_users'];
$sale_id = $_POST['sale_id'];
$time_od = $_POST['time_od'];
$time_do = $_POST['time_do'];
$date = $_POST['date'];

$time = "od $time_od do $time_do";

include '../database/conn_db.php';

if($przedmiot_id != "" && $class_id != "" && $max_users != "" && $sale_id != "" && $time_od != "" && $time_do != "" && $date != ""){
    $sql_old = "select * from korepetycje where korepetycje_id = $korepetycja_id";
    $result_old = mysqli_query($conn, $sql_old);
    $row_old = mysqli_fetch_assoc($result_old);
    if($przedmiot_id != $row_old['przedmiot_id'] || $class_id != $row_old['destiny'] || $max_users != $row_old['max_users'] || $sale_id != $row_old['room_id'] || $time != $row_old['godzina'] || $date != $row_old['data']){
        $sql = "update korepetycje set przedmiot_id = $przedmiot_id, max_users = $max_users, godzina = '$time', data = '$date', destiny = '$class_id', room_id = '$sale_id' where korepetycje_id = $korepetycja_id";
        $result = mysqli_query($conn, $sql);
        if($result){
            //log
                        $before = "Przedmiot: $row_old[przedmiot_id] <br/> Creator: $row_old[creator_id] <br/> Max users: $row_old[max_users] <br/> Godzina: $row_old[godzina] <br/> Data: $row_old[data] <br/> Status: $row_old[status_id] <br/> Destiny: $row_old[destiny] <br/> Room: $row_old[room_id] <br/> School: $row_old[school_id]";
                        $after = "Przedmiot: $przedmiot_id <br/> Creator: $creator_id <br/> Max users: $max_users <br/> Godzina: $time <br/> Data: $date <br/> Status: 1 <br/> Destiny: $class_id <br/> Room: $sale_id <br/> School: $school_id";
                        $object_id=$korepetycja_id;
                        $object_type="korepetycje";
                        $action_type="1";
                        $desc="Edytowano korepetycje";
                        include "../../scripts/log.php";
            //log
            $_SESSION['alert'] = 'Pomyślnie edytowano korepetycje';
            $_SESSION['alert_type'] = 'success';
        }else{
            $_SESSION['alert'] = 'Wystąpił błąd';
            $_SESSION['alert_type'] = 'error';
        }
    }else{
        $_SESSION['alert'] = 'Nie wprowadzono żadnych zmian';
        $_SESSION['alert_type'] = 'warning';
    }
}else{
    $_SESSION['alert'] = 'Nie wprowadzono wszystkich danych';
    $_SESSION['alert_type'] = 'error';
}
header('Location: ../../panel.php');
?>