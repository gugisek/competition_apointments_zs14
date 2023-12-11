<?php
include '../security.php';
$selected_przedmioty = $_POST['selected_przedmioty'];
if(!empty($_POST['selected_przedmioty'])) {
    $selected_przedmioty = array_map('intval', $selected_przedmioty);
}else{
    $selected_przedmioty = array();
}
//$selected_przedmioty = implode(',', $selected_przedmioty);
$user_id = $_SESSION['login_id'];


include "../database/conn_db.php";
$sql = "DELETE FROM selected_przedmioty WHERE user_id=$_SESSION[login_id];";
$result = mysqli_query($conn, $sql);
//$sql = "INSERT INTO selected_przedmioty (user_id, przedmiot_id) VALUES ($_SESSION[login_id], $selected_przedmioty);";

$counter = 0;
$totalPrzedmioty = count($selected_przedmioty);

if($totalPrzedmioty > 0){
    $sql = "INSERT INTO selected_przedmioty (user_id, przedmiot_id) VALUES";
    while ($counter < $totalPrzedmioty) {
        $sql .= " ($user_id, {$selected_przedmioty[$counter]})";

        $counter++;
        if ($counter < $totalPrzedmioty) {
            $sql .= ",";
        } else {
            $sql .= ";";
        }
    }
    echo $sql;
    $result = mysqli_query($conn, $sql);

}
$_SESSION['alert'] = 'Zapisano przedmioty';
$_SESSION['alert_type'] = 'success';
header("Location: ../../panel.php");
?>