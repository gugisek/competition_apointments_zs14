<?php
include '../security.php';
$przedmiot_id = $_POST['przedmiot_id'];
//umieszczenie danych z multi selecta class_id do tablicy i wyświetlenie ich po przecinku
$class_id = $_POST['class_id'];
$class_id = implode(", ", $class_id);
$max_users = $_POST['max_users'];
$build_id = $_POST['build_id'];
$sale_id = $_POST['sale_id'];
$time_od = $_POST['time_od'];
$time_do = $_POST['time_do'];
$date = $_POST['date'];
$repeat = $_POST['repeat'];
$repeat = $repeat;

$creator_id = $_SESSION['login_id'];
include '../database/conn_db.php';
$sql = "SELECT school_id FROM `users` where id=$_SESSION[login_id];";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$school_id = $row['school_id'];

if($przedmiot_id != "" && $class_id != "" && $max_users != "" && $build_id != "" && $sale_id != "" && $time_od != "" && $time_do != "" && $date != "" && $repeat != ""){
    if($time_od < $time_do){
        $time = "od $time_od do $time_do";
        while($repeat >= 1){
            $sql = "INSERT INTO `korepetycje` (`korepetycje_id`, `przedmiot_id`, `creator_id`, `max_users`, `godzina`, `data`, `status_id`, `destiny`, `room_id`, `school_id`) VALUES (NULL, '$przedmiot_id', '$creator_id', '$max_users', '$time', '$date', '1', '$class_id', '$sale_id', '$school_id')";
            $result = mysqli_query($conn, $sql);
            $id = mysqli_insert_id($conn);
            $repeat--;
            //log
                    $before = "";
                    $after = "Przedmiot: $przedmiot_id <br/> Creator: $creator_id <br/> Max users: $max_users <br/> Godzina: $time <br/> Data: $date <br/> Status: 1 <br/> Destiny: $class_id <br/> Room: $sale_id <br/> School: $school_id";
                    $object_id=$id;
                    $object_type="korepetycje";
                    $action_type="2";
                    $desc="Dodano korepetycje";
                    include "../../scripts/log.php";
            //log
            $date = date('Y-m-d', strtotime($date. ' + 7 days'));
        }
        $_SESSION['alert'] = 'Dodano korepetycje';
        $_SESSION['alert_type'] = 'success';
    }else{
        $_SESSION['alert'] = 'Godzina rozpoczęcia nie może być większa niż godzina zakończenia';
        $_SESSION['alert_type'] = 'error';
    }
}else{
    $_SESSION['alert'] = 'Nie wprowadzono wszystkich danych';
    $_SESSION['alert_type'] = 'error';
}
header('Location: ../../panel.php');
?>