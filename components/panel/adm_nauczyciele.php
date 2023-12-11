<?php include "../../scripts/security.php"; ?>

<section class="overflow-x-auto w-full py-8" data-aos="fade-right" data-aos-delay="100">
<div class="px-4 sm:px-6 lg:px-8">
  <div class="sm:flex sm:items-center pb-8">
    <div class="sm:flex-auto">
      <h1 class="text-base font-semibold leading-6 text-gray-300">Nauczyciele</h1>
      <p class="mt-2 text-sm text-gray-500">Lista wszystkich nauczycieli w Twojej szkole.</p>
    </div>
    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
        <button type="button" onclick="openPopupSchools('add')" class="active:scale-95 duration-150 md:mt-0 mt-4 inline-flex items-center gap-x-2 rounded-md theme-bg theme-bg-hover px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 duration-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Dodaj nauczyciela
        </button>
    </div>
  </div>
    <div class="">
        <table class="w-full">
            <tr class="uppercase text-left text-xs text-gray-400 border-b border-white/5">
                <th class="">Nauczyciel</th>
                <th class="px-3 py-3.5 sm:table-cell hidden">Status</th>
                <th class="px-3 py-3.5 sm:table-cell hidden">Rola</th>
                <th class="px-3 py-3.5 sm:table-cell hidden">Szkoła</th>
                <th class="px-3 py-3.5 sm:table-cell hidden">Data założenia</th>
            </tr>
            <?php        
                include "../../scripts/database/conn_db.php";
                $sql = "SELECT school_id FROM `users` where id=$_SESSION[login_id];";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $school_id = $row['school_id'];

                $sql = "SELECT users.id, users.name, users.sec_name, user_class.name as klasa, user_class.profile, users.description, users.mail, users.profile_picture, users.background_picture, schools.name as szkola, users.sur_name, user_roles.role, users.create_date, user_status.status, colors.name as status_color FROM `users` left join user_roles on users.role_id=user_roles.id left join user_status on user_status.id=users.status_id left join colors on colors.id=user_status.color_id left join schools on schools.school_id=users.school_id left join user_class on user_class.class_id=users.class_id where users.name != 'deleted_user' and role_id=3 and users.school_id='$school_id' order by users.id asc;";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0)
                {
                    //window.location=`?page=użytkownicy&action=edit&id='.$row['id'].'#edit`;
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $create_date = $row['create_date'];
                        if ($row['profile_picture'] == NULL) {
                            $row['profile_picture'] = 'default.png';
                        }
                        if ($row['background_picture'] == NULL) {
                            $row['background_picture'] = 'default.avif';
                        }
                        if ($row['description'] == NULL) {
                            $desc = 'Nic tu nie ma ciekawego...';
                        }else {
                            $desc = $row['description'];
                        }

                        echo '
                        <tr class="hover:bg-[#3d3d3d] transition-all duration-150" style="cursor: pointer; cursor: hand;" onclick="openPopupSchools('.$row['id'].')">
                            <td class="whitespace-nowrap py-4 text-sm">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full object-cover" src="public/img/users/'.$row['profile_picture'].'" alt="">
                                    </div>
                                    <div class="ml-4">
                                    <div class="font-medium text-gray-200 capitalize">'.$row['name'].' '.$row['sur_name'].'</div>
                                    <div class="text-gray-400">'.$row['mail'].'</div>
                                    </div>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 sm:table-cell hidden">
                                <span class="inline-flex rounded-full px-2 text-xs font-semibold leading-5 capitalize text-'.$row['status_color'].'-100 bg-'.$row['status_color'].'-500/50">'.$row['status'].'</span>
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-400 capitalize sm:table-cell hidden">'.$row['role'].'</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-400 capitalize sm:table-cell hidden">'.$row['szkola'].'<br/><span class="text-xs text-gray-500">'.$row['klasa'].' '.$row['profile'].'</span></td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-400 capitalize sm:table-cell hidden">'.substr($create_date, 0, strrpos($create_date, ' ', 0)).'</td>
                            <td></td>
                        </tr>
                        ';
                    }
                } else {
                    echo "<tr class='border-t-[0.5px] border-b-[0.5px] border-white/10'>";
                        echo "<td class='py-3 text-gray-500 leading-4 text-sm'>Nie ma tu jeszcze żadnych nauczycieli</td>";
                        echo "<td class='text-center capitalize text-sm text-gray-500'></td>";
                        echo "<td class='text-center capitalize text-sm text-gray-500'></td>";
                        echo "<td class='text-center text-sm text-gray-500'></td>";
                        echo "<td class='text-center text-sm'></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</div>
</section>

<section id="popupSchoolsBg" class="fixed z-[50] h-0 opacity-0 top-0 left-0 w-full h-full bg-[#0000009e] transition-opacity duration-300"></section>
  <section id="popupSchools" onclick="popupSchoolsCloseConfirm()" class="z-[60] fixed scale-0 top-0 left-0 w-full h-full">
    <div class="flex items-center justify-center w-full h-full px-2">
      <div onclick="event.cancelBubble=true;" class="bg-[#0e0e0e] md:min-w-[800px] md:w-auto w-full max-w-[800px] max-h-[80vh] overflow-y-auto flex md:flex-row flex-col gap-4 rounded-2xl sm:px-6  -xl">
        <div id="popupItself" class="flex h-auto w-full justify-between flex-col">
            <div id="pupupSchoolsOutput"></div>
        </div>
      </div>
    </div>
  </section>

    <script>
    function popupSchoolsOpenClose() {
       var popup = document.getElementById("popupSchools")
       var popupBg = document.getElementById("popupSchoolsBg")
       popupBg.classList.toggle("opacity-0")
       popupBg.classList.toggle("h-0")
       popup.classList.toggle("scale-0")
       popup.classList.add("duration-200")

    }
    function openPopupSchools(id) {
        var popupOutput = document.getElementById("pupupSchoolsOutput");
        popupOutput.innerHTML = "<div class='w-full flex items-center justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-xl'><div class='lds-dual-ring'></div></div></div>";
        popupSchoolsOpenClose();
        const url = "components/panel/adm_nauczyciele_popup.php?id="+id;
        fetch(url)
            .then(response => response.text())
            .then(data => {
            const parser = new DOMParser();
            const parsedDocument = parser.parseFromString(data, "text/html");

            // Wstaw zawartość strony (bez skryptów) do "panel_body"
            popupOutput.innerHTML = parsedDocument.body.innerHTML;

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