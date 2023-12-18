<?php
include "../security.php";

if($_SESSION['account_type'] != '2'){
    header('Location: ../../404.php');
    exit();
}

$sale = $_POST['sale'];
$build_id = $_POST['build_id'];
$school_id = $_POST['school_id'];

if($sale != '' && $build_id != '' && $school_id != '') {
    include "../database/conn_db.php";
    $sql_check = "SELECT name FROM `rooms` where name='$sale' and build_id='$build_id' and school_id='$school_id'";
    $result_check = mysqli_query($conn, $sql_check);
    if(mysqli_num_rows($result_check) > 0) {
        $_SESSION['alert'] = 'Podana sala już istnieje';
        $_SESSION['alert_type'] = 'error';
    }else{
        $sql = "INSERT INTO `rooms` (`room_id`, `name`, `build_id`, `school_id`) VALUES (NULL, '$sale', '$build_id', '$school_id');";
        mysqli_query($conn, $sql);
        $id = mysqli_insert_id($conn);
        $_SESSION['alert'] = 'Pomyślnie dodano sale';
        $_SESSION['alert_type'] = 'success';
        //log
            $before = "";
            $after = "Sala: ".$sale."<br/>Budynek: ".$build_id."<br/>Szkoła: ".$school_id."";
            $object_id=$id;
            $object_type="sale";
            $action_type="2";
            $desc="Dodano sale";
            include "../log.php";
        //log
    }
}else{
    $_SESSION['alert'] = 'Nie podano wszystkich danych';
    $_SESSION['alert_type'] = 'warning';
}
header("Location: ../../panel.php");