<section class="w-full py-6 px-6">
    <table class="w-full">
        <tr class="uppercase text-left text-xs text-gray-400 ">
            <th class="px-3 text-center md:w-auto md:table-cell hidden">ID</th>
            <th class="w-1/6">Użytkownik</th>
            <th class="text-center py-3 w-1/6">Data</th>
            <th class="w-[35%] md:table-cell hidden">Opis</th>
            <th class="w-[9%] text-center">ID obiektu</th>
            <th class="w-[9%] text-center">Typ obiektu</th>
            <th class="w-[9%] text-center">Typ rekordu</th>
        </tr>
        <?php
        $page_id = 1;
            include '../../../scripts/database/conn_db.php';
            if (isset($_POST['search'])) {
                $search = $_POST['search'];
                $role = $_POST['role'];
                $status = $_POST['status'];
            }
            else {
                $search = "";
                $role = "";
                $status = "";
            }
            $sql = "SELECT logs.id, users.name, users.sur_name, logs.when, logs.object_id, logs.object_type, log_types.type,logs.description FROM `logs` left join users on users.id=logs.user_id join log_types on log_types.id=logs.type order by id desc limit 20 offset ".($page_id - 1) * 20;
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {

                    echo "<tr class='hover:bg-[#3d3d3d] transition-all duration-150 border-t-[0.5px] border-b-[0.5px] border-[#3d3d3d]' style='cursor: pointer; cursor: hand;' onclick='openPopupLog(".$row['id'].")'>";
                        echo "<td class='py-3 text-gray-500 text-center text-sm md:table-cell hidden'>".$row['id']."</td>";
                        echo "<td class='py-3 text-gray-300 text-sm'>".$row['name']." ".$row['sur_name']."</td>";
                        echo "<td class='text-center capitalize text-sm text-gray-400'>".$row['when']."</td>";
                        $description = $row['description'];
                        if (strlen($description) > 50) {
                            $description = substr($description, 0, 50)."...";
                        }
                        echo "<td class='text-sm md:table-cell hidden text-gray-400'>".$description."</td>";
                        echo "<td class='text-center text-sm text-gray-500'>".$row['object_id']."</td>";
                        echo "<td class='text-center text-sm capitalize ";
                        if ($row['object_type'] == "users") {
                            echo " text-yellow-500";
                        }
                        else if ($row['object_type'] == "products") {
                            echo " text-purple-500";
                        }
                        else if ($row['object_type'] == "orders") {
                            echo " text-yellow-500";
                        }
                        else if ($row['object_type'] == "finances") {
                            echo " text-blue-500";
                        }
                        else if ($row['object_type'] == "user_roles") {
                            echo " text-red-500";
                        }
                        else if ($row['object_type'] == "user_status") {
                            echo " text-pink-500";
                        }
                        else if ($row['object_type'] == "log_types") {
                            echo " text-gray-500";
                        }else{
                            echo " text-gray-300";
                        }
                        echo "'>".$row['object_type']."</td>";
                        echo "<td class='text-center text-sm text-gray-500 capitalize ";
                        if ($row['type'] == "create") {
                            echo " text-green-500";
                        }
                        else if ($row['type'] == "modify") {
                            echo " text-blue-500";
                        }
                        else if ($row['type'] == "delete") {
                            echo " text-red-500";
                        }
                        echo "'>".$row['type']."</td>";
                    echo "</tr>";
                    ;
                }
            } else {
                echo "<tr class='border-t-[0.5px] border-b-[0.5px]'>";
                    echo "<td class='py-3 text-gray-800 leading-4 text-sm'>Brak wyników</td>";
                    echo "<td class='text-center capitalize text-sm text-gray-500'></td>";
                    echo "<td class='text-center capitalize text-sm text-gray-500'></td>";
                    echo "<td class='text-center text-sm text-gray-500'></td>";
                    echo "<td class='text-center text-sm'></td>";
                echo "</tr>";
            }
        ?>
    </table>
    <div class="w-full flex items-center justify-between mt-2 mb-[-16px]">
        <div class="w-1/3"></div>
                <div class="flex items-center">
            <?php if(isset($_GET['page_id'])) {
                $page_id = $_GET['page_id'];
            }else {
                $page_id = 1;
            } 
            include '../../../scripts/conn_db.php';
            $sql = "SELECT count(id) FROM logs";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_row($result);
            $total_records = $row[0];
            $total_pages = ceil($total_records / 20);
            ?>
        
            <form action="panel.php?page=archiwum&action=" method="GET" class="flex items-center">
                <input type="hidden" name="page" value="archiwum">
                <input type="hidden" name="action" value="">
                <input type="hidden" name="page_id" value="<?php if($page_id > 1) {
                    echo $page_id - 1;
                }else {
                    echo $page_id;
                } ?>">
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </button>
            </form>
            <form action="panel.php?page=archiwum&action=" method="GET">
                <input type="hidden" name="page" value="archiwum">
                <input type="hidden" name="action" value="">
                <input type="number" class=" px-2 rounded-md mx-1 text-center font-light outline-none focus:drop-shadow-[0_3px_10px_rgba(74,106,231,1)] transition-all duration-300" name="page_id" value="<?=$page_id?>" max="<?=$total_pages?>" min="1"> 
            </form>
            <form action="panel.php?page=archiwum&action=" method="GET" class="flex items-center">
                <input type="hidden" name="page" value="archiwum">
                <input type="hidden" name="action" value="">
                <input type="hidden" name="page_id" value="<?php if($page_id < $total_pages) {
                    echo $page_id + 1;
                }else {
                    echo $page_id;
                } ?>">
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>
            </form>
        </div>
        <span class="text-right w-1/3 text-sm text-gray-400">Strona <?=$page_id?> z <?=$total_pages?></span>   
    </div>
</section>
 <section id="popupLogBg" class="fixed z-[50] h-0 opacity-0 top-0 left-0 w-full h-full bg-[#0000009e] transition-opacity duration-300"></section>
  <section id="popupLog" onclick="popupLogOpenClose()" class="z-[60] fixed scale-0 top-0 left-0 w-full h-full">
    <div class="flex items-center justify-center w-full h-full px-2">
      <div onclick="event.cancelBubble=true;" class="bg-[#0e0e0e] md:min-w-[800px] md:w-auto w-full max-w-[800px] max-h-[80vh] overflow-y-auto flex md:flex-row flex-col gap-4 rounded-2xl py-6 sm:px-6  -xl">
        <div id="popupItself" class="flex h-auto w-full justify-between flex-col">
                                 
            <div id="pupupLogOutput"></div>
        </div>
      </div>
    </div>
  </section>
  <script>
    function popupLogOpenClose() {
        var popup = document.getElementById("popupLog")
        var popupBg = document.getElementById("popupLogBg")
        popupBg.classList.toggle("opacity-0")
        popupBg.classList.toggle("h-0")
        popup.classList.toggle("scale-0")
        popup.classList.add("duration-200")
    }
    function openPopupLog(id){
        var popupLogOutput = document.getElementById("pupupLogOutput");
        popupLogOutput.innerHTML =  "<div class='flex justify-center items-center'><div class='flex flex-col justify-center items-center'><div class='animate-spin rounded-full h-32 w-32 border-t-2 border-b-2 border-gray-900'></div><div class='text-white text-xl font-semibold mt-4'>Ładowanie...</div></div>";
        popupLogOpenClose();
        const url = "components/panel/settings/log_popup.php?id="+id+"&type=faq";
        fetch(url)
            .then(response => response.text())
            .then(data => {
            const parser = new DOMParser();
            const parsedDocument = parser.parseFromString(data, "text/html");

            // Wstaw zawartość strony (bez skryptów) do "panel_body"
            popupLogOutput.innerHTML = parsedDocument.body.innerHTML;

            // Przechodź przez znalezione skrypty i wykonuj je
            const scripts = parsedDocument.querySelectorAll("script");
            scripts.forEach(script => {
                const scriptElement = document.createElement("script");
                scriptElement.textContent = script.textContent;
                document.body.appendChild(scriptElement);
            });
            });
    }
</script>