<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
else {
    $id = "";
}
include "../../../scripts/database/conn_db.php";
$sql = "SELECT logs.id, users.name, users.sur_name, logs.when, logs.object_id, logs.object_type, log_types.type,logs.description, logs.before, logs.after FROM `logs` join users on users.id=logs.user_id join log_types on log_types.id=logs.type where logs.id='$id';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$when = $row['when'];
$objectId = $row['object_id'];
$objectType = $row['object_type'];
$before = $row['before'];
$after = $row['after'];
$type = $row['type'];
$description = $row['description'];
if (isset($_GET['return'])) {
    $return = "panel.php?page=".$_GET['return']."&action=edit&id=".$objectId;
}
else {
    $return = "panel.php";
}
?>
   <section class="w-full rounded-3xl md:px-0 px-4 pb-4">
        <div class="w-full flex justify-between items-center">
            <h1 class="pb-2 font-medium text-gray-200">Szczegóły</h1>
            <a onclick="popupLogOpenClose()" class="cursor-pointer flex items-center justify-center space-x-2 text-gray-500 hover:text-red-600 transition-all duration-300">
                <p class="uppercase font-medium text-xs py-2">zamknij</p>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>

            </a>
        </div>
        <div class="flex flex-col md:flex-row md:space-x-4">
            <div class="flex flex-col w-full md:w-1/2">
                <div class="flex flex-col md:flex-row gap-2">
                    <div class="flex flex-col w-full md:w-1/2">
                        <div class="flex flex-col">
                            <label for="user_id" class="pb-2 pt-2 font-medium text-xs text-[#5d5d5d]">Użytkownik</label>
                            <input type="text" name="user_id" id="user_id" value="<?php echo $row['name']; echo " "; echo $row['sur_name'] ?>" class="capitalize text-sm bg-[#0e0e0e] text-gray-300 border border-[#3d3d3d] rounded-xl px-4 py-2 focus:outline-none focus:border-indigo-500 transition-all duration-500" disabled>
                        </div>
                    </div>
                    <div class="flex flex-col w-full md:w-1/2">
                        <div class="flex flex-col">
                            <label for="when" class="pb-2 pt-2 font-medium text-xs text-[#5d5d5d]">Kiedy</label>
                            <input type="text" name="when" id="when" value="<?php echo $when; ?>" class="text-sm border border-[#3d3d3d] bg-[#0e0e0e] text-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:border-indigo-500 transition-all duration-500" disabled>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col">
                    <label for="object_id" class="pb-2 font-medium pt-2 text-xs text-[#5d5d5d]">Id obiektu</label>
                    <input type="text" name="object_id" id="object_id" value="<?php echo $objectId; ?>" class="text-sm border border-[#3d3d3d] bg-[#0e0e0e] text-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:border-indigo-500 transition-all duration-500" disabled>
                </div>
                <div class="flex flex-col">
                    <label for="object_type" class="pb-2 pt-2 font-medium text-xs text-[#5d5d5d]">Typ obiektu</label>
                    <input type="text" name="object_type" id="object_type" value="<?php echo $objectType; ?>" class="text-sm border border-[#3d3d3d] bg-[#0e0e0e] text-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:border-indigo-500 transition-all
                    duration-500" disabled>
                </div>
                <div class="flex flex-col h-full">
                    <label for="before" class="pb-2 pt-2 font-medium text-xs text-[#5d5d5d]">Przed</label>
                    <div name="before" id="before" cols="30" rows="5" class="break-words h-full text-sm border border-[#3d3d3d] bg-[#0e0e0e] text-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:border-indigo-500 transition-all duration-500" disabled><?php echo $before; ?></div>
                </div>
            </div>
            <div class="flex flex-col w-full md:w-1/2">
                <div class="flex flex-col">
                    <label for="type" class="pb-2 font-medium text-xs pt-2 text-[#5d5d5d]">Nazwa obiektu</label>
                    <input type="text" name="type" id="type" value="<?php 
                    if ($objectType == "users") {$sql = "SELECT name, sur_name FROM `users` where id='$objectId';"; 
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo $row['name'];
                        echo " ";
                        echo $row['sur_name'];
                    } elseif ($objectType == "docs") {$sql = "SELECT name FROM `informations` where id='$objectId';"; 
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo $row['name'];
                    } elseif ($objectType == "zapisy" and $objectId != 0 and $type != 'delete') {$sql = "SELECT question FROM `zapisy` where id='$objectId';"; 
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo $row['question'];
                    } elseif ($objectType == "faq" and $objectId != 0 and $type != 'delete') {$sql = "SELECT question FROM `faq` where id='$objectId';"; 
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo $row['question'];
                    } elseif ($objectType == "teams" and $objectId != 0 and $type != 'delete') {$sql = "SELECT name FROM `teams` where team_id='$objectId';"; 
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo $row['name'];
                    }

                    ?>" class="border border-[#3d3d3d] bg-[#0e0e0e] rounded-xl text-gray-300 px-4 py-2 focus:outline-none focus:border-indigo-500 transition-all duration-500 text-sm" disabled>
                </div>
                <div class="flex flex-col">
                    <label for="type" class="pb-2 text-xs pt-2 font-medium text-[#5d5d5d]">Typ operacji</label>
                    <input type="text" name="type" id="type" value="<?php echo $type; ?>" class="
                    <?php if ($type == "create") {echo "bg-green-500 text-green-900";} elseif ($type == "delete") {echo "bg-red-400 text-red-900";} elseif ($type == "modify") {echo "bg-indigo-400 text-indigo-900";} ?>
                    border border-[#3d3d3d] bg-[#0e0e0e] font-semibold capitalize rounded-xl px-4 py-2 focus:outline-none focus:border-indigo-500 transition-all duration-500 text-sm" disabled>
                </div>
                <div class="flex flex-col">
                    <label for="description" class="pb-2 text-xs pt-2 font-medium text-[#5d5d5d]">Opis</label>
                    <textarea name="description" id="description" cols="30" rows="1" class="text-sm border border-[#3d3d3d] bg-[#0e0e0e] text-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:border-indigo-500 transition-all duration-500" disabled><?php echo $description; ?></textarea>
                </div>
                <div class="flex flex-col h-full">
                    <label for="after" class="pb-2 pt-2 font-medium text-xs text-[#5d5d5d]">Po</label>
                    <div name="after" id="after" cols="30" rows="5" class="break-words h-full text-sm border border-[#3d3d3d] bg-[#0e0e0e] text-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:border-indigo-500 transition-all duration-500" disabled><?php echo $after; ?></div>
                </div>
            </div>
        </div>
    </section>