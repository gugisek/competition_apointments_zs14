<?php
$conn = mysqli_connect("localhost", "root", "", "edukorepetycje");
if (!$conn) {
    die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
}
?>