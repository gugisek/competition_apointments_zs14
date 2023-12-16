<?php
include '../security.php';
$user_id = $_POST['user_id'];
$korepetycje_id = $_POST['korepetycje_id'];
$operation = $_POST['operation'];
include '../database/conn_db.php';
if($user_id != "" && $korepetycje_id != "") {
    if($operation=='kick'){
        $sql = "UPDATE `zapisy_korepetycje` SET `status_id` = '3' WHERE `zapisy_korepetycje`.`korepetycja_id` = $korepetycje_id AND `zapisy_korepetycje`.`users_id` = $user_id;";
        $result = mysqli_query($conn, $sql);
        //log
                $before = "";
                $after = "Status: 3<br/>, User: $user_id, Korepetycje: $korepetycje_id";
                $object_id=$korepetycje_id;
                $object_type="korepetycje";
                $action_type="1";
                $desc="Wyrzucono ucznia z korepetycji";
                include "../../scripts/log.php";
        //log
        $_SESSION['alert'] = 'Wyrzucono ucznia z korepetycji';
        $_SESSION['alert_type'] = 'success';
    }elseif($operation=='un_kick'){
        $sql = "UPDATE `zapisy_korepetycje` SET `status_id` = '1' WHERE `zapisy_korepetycje`.`korepetycja_id` = $korepetycje_id AND `zapisy_korepetycje`.`users_id` = $user_id;";
        $result = mysqli_query($conn, $sql);
        //log
                $before = "";
                $after = "Status: 1<br/>, User: $user_id, Korepetycje: $korepetycje_id";
                $object_id=$korepetycje_id;
                $object_type="korepetycje";
                $action_type="1";
                $desc="Przywrócono ucznia na korepetycje";
                include "../../scripts/log.php";
        //log
        $_SESSION['alert'] = 'Przywrócono ucznia na korepetycje';
        $_SESSION['alert_type'] = 'success';
    }
}else {
    $_SESSION['alert'] = 'Nie wprowadzono wszystkich danych';
    $_SESSION['alert_type'] = 'error';
}
header('Location: ../../panel.php');
?>