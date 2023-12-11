<?php
include "../security.php";

$name = $_POST['name'];
      include "../../scripts/database/conn_db.php";
      $sql = "SELECT school_id FROM `users` where id=$_SESSION[login_id];";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $school_id = $row['school_id'];

if($name != '' && $school_id != '') {
    include "../database/conn_db.php";
    $sql_check = "SELECT name FROM `przedmioty` where name='$name' and school_id='$school_id'";
    $result_check = mysqli_query($conn, $sql_check);
    if(mysqli_num_rows($result_check) > 0) {
        $_SESSION['alert'] = 'Podany przedmiot już istnieje';
        $_SESSION['alert_type'] = 'error';
    }else{
        $sql = "INSERT INTO `przedmioty` (`przedmiot_id`, `name`, `school_id`) VALUES (NULL, '$name', '$school_id');";
        mysqli_query($conn, $sql);
        $id = mysqli_insert_id($conn);
        $_SESSION['alert'] = 'Pomyślnie dodano przedmiot';
        $_SESSION['alert_type'] = 'success';
        //log
            $before = "";
            $after = "Przedmiot: ".$name."<br/>Szkoła: ".$school_id."";
            $object_id=$id;
            $object_type="przedmioty";
            $action_type="2";
            $desc="Dodano przedmiot";
            include "../log.php";
        //log
    }
}else{
    $_SESSION['alert'] = 'Nie podano wszystkich danych';
    $_SESSION['alert_type'] = 'warning';
}
header("Location: ../../panel.php");