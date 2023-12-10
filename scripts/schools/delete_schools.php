<?php
include "../security.php";
$id = $_GET['id'];
if($id != '') {
    include "../database/conn_db.php";
    $sql_old = "select * from schools where school_id='$id'";
    $result_old = $conn->query($sql_old);
    $row_old = mysqli_fetch_assoc($result_old);
    $sql = "DELETE FROM schools where school_id='$id'";
    mysqli_query($conn, $sql);
    //log
        $before = "Nazwa: ".$row_old['name']."<br/>Adres: ".$row_old['addres']."<br/>Miasto: ".$row_old['city'];
        $after = "";
        $object_id=$id;
        $object_type="schools";
        $action_type="3";
        $desc="Usunięto szkołę";
        include "../log.php";
    //log
    $_SESSION['alert'] = 'Pomyślnie usunięto szkołę';
    $_SESSION['alert_type'] = 'success';
}else {
    $_SESSION['alert'] = 'Błąd usuwania szkoły';
    $_SESSION['alert_type'] = 'error';
}
header("Location: ../../panel.php");
?>
