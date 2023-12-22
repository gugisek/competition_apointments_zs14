<?php
include '../security.php';
$korepetycja_id = $_POST['korepetycja_id'];
$nau_id = $_POST['nau_id'];
$powod = $_POST['powod'];

include '../database/conn_db.php';
$sql_check = "select * from korepetycje where korepetycje_id = $korepetycja_id and creator_id = $nau_id;";
$result_check = mysqli_query($conn, $sql_check);
if(mysqli_num_rows($result_check) > 0){
    $sql_check_miejsca = "SELECT max_users, count(zapisy_korepetycje.zapis_id) as 'users' from korepetycje left JOIN zapisy_korepetycje on zapisy_korepetycje.korepetycja_id=korepetycje.korepetycje_id where korepetycje.korepetycje_id=$korepetycja_id group by korepetycje.korepetycje_id;";
    $result_check_miejsca = mysqli_query($conn, $sql_check_miejsca);
    $row_check_miejsca = mysqli_fetch_assoc($result_check_miejsca);
    if($row_check_miejsca['max_users'] > $row_check_miejsca['users']){
        $sql_check_zapis = "select * from zapisy_korepetycje where korepetycja_id = $korepetycja_id and users_id = $_SESSION[login_id];";
        $result_check_zapis = mysqli_query($conn, $sql_check_zapis);
        if(mysqli_num_rows($result_check_zapis) > 0){
            $_SESSION['alert'] = 'Już jesteś zapisany na tą korepetycje';
            $_SESSION['alert_type'] = 'warning';
        }else{
            $sql = "INSERT INTO `zapisy_korepetycje` (`zapis_id`, `korepetycja_id`, `users_id`, `status_id`, `kiedy`, `powod`) VALUES (NULL, '$korepetycja_id', '$_SESSION[login_id]', '1', CURRENT_TIMESTAMP, '$powod');";
            $result = mysqli_query($conn, $sql);
            $id = mysqli_insert_id($conn);
            //log
                    $before = "";
                    $after = "Korepetycja: $korepetycja_id <br/> User: $_SESSION[login_id] <br/> Status: 1 <br/> Powod: $powod";
                    $object_id=$id;
                    $object_type="zapisy";
                    $action_type="1";
                    $desc="Zapisano na korepetycje";
                    include "../../scripts/log.php";
            //log
            $_SESSION['alert'] = 'Zapisano na korepetycje';
            $_SESSION['alert_type'] = 'success';
        }
    }else{
        $_SESSION['alert'] = 'Brak wolnych miejsc';
        $_SESSION['alert_type'] = 'error';
    }    
}else{
    $_SESSION['alert'] = 'Nie masz uprawnień do tej korepetycji';
    $_SESSION['alert_type'] = 'error';
}
header('Location: ../../panel.php');