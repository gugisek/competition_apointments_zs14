<option value="" class="hidden" disabled selected>Wybierz</option>
<?php
    $build_id = $_GET['build_id'];
    include '../../scripts/database/conn_db.php';
    $sql = "SELECT room_id, name FROM rooms WHERE build_id=$build_id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
         echo '<option value="'.$row['room_id'].'" class="capitalize">'.$row['name'].'</option>';
    }
?>