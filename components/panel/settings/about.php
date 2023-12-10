<?php
include "../../../scripts/database/conn_db.php";
$sql = "select * from informations;";
$result = mysqli_query($conn, $sql);
$i=0;
while ($row = $result->fetch_assoc()) {
    $info[$i] = $row['value'];
    $i++;
}
$php_version = phpversion();
$mysql_version = mysqli_get_server_info($conn);
?>
<form action="scripts/settings/edit_info.php" method="POST" class="divide-y divide-white/5" enctype="multipart/form-data">
    <div class="sm:px-6 lg:px-8 px-4">
    <div class="px-4 sm:px-0 mt-6">
        <h3 class="text-base font-semibold leading-7 text-white">Informacje o stronie</h3>
        <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-400"></p>
    </div>
    <div class="mt-6 border-t border-white/10">
        <dl class="divide-y divide-white/10">
            <p class="text-center text-gray-500 text-sm py-4">
                version: <?=$info[10]?><br>
                engine: PHP <?=$php_version?><br>
                database: MySQL <?=$mysql_version?><br>
                author: <a href="https://ui.gugisek.pl" class="theme-text-hover transition-all duration-100">gugisek</a><br>
                powered by <a href="https://rgbpc.pl/" target="_blank" class="theme-text-hover duration-300"><span class="text-red-600">R</span><span class="text-green-600">G</span><span class="text-blue-600">B</span>pc.pl
            </p>
        </dl>
    </div>
    </div>
</form>
<script>
    function imgPrev(type) {
        const file = document.getElementById(`fileToUpload${type}`).files[0];
        const reader = new FileReader();
        reader.onloadend = function() {
            //ustawienie dla wszystkich img o id popup_img_inpt src
            for (let i = 0; i < document.querySelectorAll(`#popup_img_inpt${type}`).length; i++) {
                document.querySelectorAll(`#popup_img_inpt${type}`)[i].src = reader.result;
            }
        }
        if (file) {
            reader.readAsDataURL(file);
        } else {
            document.getElementById(`popup_img_inpt${type}`).src = "";
        }
    }
</script>

