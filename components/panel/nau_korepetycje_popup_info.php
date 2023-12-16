<?php
include '../../scripts/security.php';
$id = $_GET['id'];
$sql = "SELECT korepetycje.korepetycje_id as 'id', przedmioty.name as 'przedmiot', concat(users.name, ' ', users.sur_name) as 'nauczyciel', max_users, godzina, destiny, data, korepetycje_status.name as 'status', if(isnull(destiny), 'wszyscy', destiny) as 'dla', rooms.name as 'sala', concat(buildings.name, ' ', buildings.street) as 'budynek', count(zapisy_korepetycje.zapis_id) as 'uczniowie' from korepetycje join przedmioty on przedmioty.przedmiot_id=korepetycje.przedmiot_id join users on users.id=korepetycje.creator_id join korepetycje_status on korepetycje_status.status_id=korepetycje.status_id left join rooms on rooms.room_id=korepetycje.room_id left JOIN buildings on buildings.build_id=rooms.build_id left JOIN zapisy_korepetycje on zapisy_korepetycje.korepetycja_id=korepetycje.korepetycje_id where korepetycje.korepetycje_id = $id group by korepetycje.korepetycje_id order by korepetycje.data asc, korepetycje.godzina asc;";
include '../../scripts/database/conn_db.php';
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$destiny = $row['dla'];
if($row['dla'] != 'wszyscy'){
    $destiny = '';
    $sql2 = "select user_class.name from user_class where class_id in (10, 8, 1);";
    $result2 = mysqli_query($conn, $sql2);
    while($row2 = mysqli_fetch_assoc($result2)){
        $destiny .= "$row2[name] ";
    }
}
$przedmiot = $row['przedmiot'];
$nauczyciel = $row['nauczyciel'];
$godzina = $row['godzina'];
$data = $row['data'];
$uczniowie = $row['uczniowie'];
$sala = $row['sala'];
$budynek = $row['budynek'];
$status = $row['status'];

 $data = $row['data'];
            // Zamiana daty na obiekt DateTime
            $dateTime = new DateTime($data);

            // Ustalenie nazwy dnia tygodnia, dnia miesiąca i nazwy miesiąca
            $dzienTygodnia = $dateTime->format('l'); // nazwa dnia tygodnia
            $dzien = $dateTime->format('j'); // dzień miesiąca
            $miesiac = $dateTime->format('F'); // nazwa miesiąca

            // Tablice z polskimi nazwami dni tygodnia i miesięcy
            $dzienTygodniaPl = [
                'Monday' => 'poniedziałek',
                'Tuesday' => 'wtorek',
                'Wednesday' => 'środa',
                'Thursday' => 'czwartek',
                'Friday' => 'piątek',
                'Saturday' => 'sobota',
                'Sunday' => 'niedziela'
            ];

            $miesiacePl = [
                'January' => 'stycznia',
                'February' => 'lutego',
                'March' => 'marca',
                'April' => 'kwietnia',
                'May' => 'maja',
                'June' => 'czerwca',
                'July' => 'lipca',
                'August' => 'sierpnia',
                'September' => 'września',
                'October' => 'października',
                'November' => 'listopada',
                'December' => 'grudnia'
            ];

            // Zamiana na nazwy w języku polskim
            $dzienTygodniaPl = $dzienTygodniaPl[$dzienTygodnia];
            $miesiacPl = $miesiacePl[$miesiac];


?>
<form action="scripts/korepetycje/add.php" method="POST" class="text-white flex flex-col h-full px-2 pb-8" enctype="multipart/form-data">
    <div class="sticky z-[10] top-0 bg-[#0e0e0e] flex flex-row items-center justify-between sm:px-0 px-4 border-b border-white/10">
       <div class="py-6">
            <div class="flex items-center gap-x-3">
                    <div class="flex-none rounded-full p-1 text-green-500 bg-green-100/10">
                        <div class="h-2 w-2 rounded-full bg-current"></div>
                    </div>
                    <h2 class="min-w-0 text-sm font-semibold leading-6 text-white">
                        <a class="flex gap-x-2">
                        <span class="truncate capitalize"><?=$row['przedmiot']?></span>
                        <span class="text-gray-400">/</span>
                        <span class="whitespace-nowrap"><?=$destiny?></span>
                        </a>
                    </h2>
                    
            </div>
            <div class="mt-3 flex flex-wrap items-center gap-x-2.5 text-xs leading-5 text-gray-400">
                    <p class="truncate">Sala <?=$row['sala']?></p>
                    <svg viewBox="0 0 2 2" class="h-0.5 w-0.5 flex-none fill-gray-300">
                        <circle cx="1" cy="1" r="1" />
                    </svg>
                    <p><?=$row['budynek']?></p>
                    <svg viewBox="0 0 2 2" class="h-0.5 w-0.5 flex-none fill-gray-300">
                        <circle cx="1" cy="1" r="1" />
                    </svg>
                    <p class="whitespace-nowrap"><?=$row['godzina']?></p>
                    <svg viewBox="0 0 2 2" class="h-0.5 w-0.5 flex-none fill-gray-300">
                        <circle cx="1" cy="1" r="1" />
                    </svg>
                    <p class="capitalize"><?=$dzienTygodniaPl.', '.$dzien.' '.$miesiacPl?></p>
            </div>
       </div>
      <div class="text-center flex items-start h-full py-6">
            <button type="button" onclick="popupEditKorepetycje()" class="flex items-center rounded-md gap-2 text-blue-500 hover:text-blue-700 px-4 duration-150 focus:outline-none focus:ring-2 theme-ring-focus focus:ring-offset-2">
              <span class="text-xs uppercase">Edytuj</span>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
              </svg>

            </button>
            <button onclick="popupInfoKorepetycjeOpenClose()" type="button" class="rounded-md text-gray-300 hover:text-gray-500 hover:rotate-90 duration-150 focus:outline-none focus:ring-2 theme-ring-focus focus:ring-offset-2">
              <span class="sr-only">Zamknij</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
        </div>
        
    </div>
    <div class="border-b border-[#1c1c1c] text-gray-500 text-xs py-2 text-center items-center justify-between">
            <p class="flex items-center justify-center gap-1 py-5">
                Zapisani uczniowie
           <?=$row['uczniowie']?>/<?=$row['max_users']?>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                    <path d="M10 9a3 3 0 100-6 3 3 0 000 6zM6 8a2 2 0 11-4 0 2 2 0 014 0zM1.49 15.326a.78.78 0 01-.358-.442 3 3 0 014.308-3.516 6.484 6.484 0 00-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 01-2.07-.655zM16.44 15.98a4.97 4.97 0 002.07-.654.78.78 0 00.357-.442 3 3 0 00-4.308-3.517 6.484 6.484 0 011.907 3.96 2.32 2.32 0 01-.026.654zM18 8a2 2 0 11-4 0 2 2 0 014 0zM5.304 16.19a.844.844 0 01-.277-.71 5 5 0 019.947 0 .843.843 0 01-.277.71A6.975 6.975 0 0110 18a6.974 6.974 0 01-4.696-1.81z" />
                </svg>
            
            </p>
    </div>
    <table>
            <?php
            $sql = "SELECT users.name as 'imie', users.id, users.sur_name, users.profile_picture, user_class.name as class, user_class.profile, zapisy_status.name, zapisy_korepetycje.powod, concat(day(zapisy_korepetycje.kiedy), '.', month(zapisy_korepetycje.kiedy), ' ' , hour(zapisy_korepetycje.kiedy), ':', minute(zapisy_korepetycje.kiedy)) as 'kiedy'  FROM `zapisy_korepetycje`join users on users.id=zapisy_korepetycje.users_id left join user_class on user_class.class_id=users.class_id join zapisy_status on zapisy_status.status_id=zapisy_korepetycje.status_id where korepetycja_id = $id order by zapisy_korepetycje.kiedy desc;";
            $result = mysqli_query($conn, $sql);
            $is = false;
            while($row = mysqli_fetch_assoc($result)) {
                if ($row['profile_picture'] == NULL) {
                            $row['profile_picture'] = 'default.png';
                        }
                $is = true;
                echo '
                <tr class="';
                    if($row['name'] == 'odwołany' or $row['name'] == 'wyrzucony'){
                        echo 'grayscale cursor-not-allowed';
                    }
                    echo ' hover:bg-[#1c1c1c]/30 duration-150 py-4 w-full flex items-center justify-between">
                    <td class=" flex flex-row w-full items-center gap-4 text-gray-300 capitalize leading-3">
                        <img src="public/img/users/'.$row['profile_picture'].'" class="w-10 h-10 rounded-full object-cover" alt="">
                        <p class="text-sm">
                        '.$row['imie'].' '.$row['sur_name'].'
                        <br>
                        <span class="text-xs text-gray-500 capitalize">'.$row['class'].' '.$row['profile'].'</span>
                        </p>
                        <span class="text-xs text-gray-500 md:ml-4">'.$row['powod'].'</span>
                    </td>
                    <td class="min-w-[80px] text-xs text-gray-500">
                    '.$row['kiedy'].'
                    </td>
                    <td>
                        <span class="text-xs ';
                        if($row['name'] == 'zapisany'){
                            echo 'text-green-500';
                        }else if($row['name'] == 'odwołany'){
                            echo 'text-yellow-500';
                        }else if($row['name'] == 'wyrzucony'){
                            echo 'text-red-500';
                        }
                        
                    echo ' flex items-center grayscale-0">'.$row['name'].'</span>
                    </td>
                    ';
                    if($row['name'] == 'zapisany'){
                        echo '<td onclick="kick_user('.$row['id'].')" class="flex text-xs text-gray-500 hover:text-red-600 trnasition-all duration-150 cursor-pointer text-right pl-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                        </svg>
                    </td>';
                    }elseif($row['name'] == 'wyrzucony'){
                        echo '<td onclick="un_kick_user('.$row['id'].')" class="flex text-xs text-gray-500 hover:text-red-600 trnasition-all duration-150 cursor-pointer text-right pl-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                        </svg>

                    </td>';
                    }
                    echo '
                </tr>
                ';
            }
            if($is == false){
                echo '<p class="text-center text-gray-500 py-8">Nikt się jeszcze nie zapisał na te zajęcia.</p>';
            }
            ?>
    </table>
</form>
 <section id="popupKickBg" class="fixed z-[50] h-0 opacity-0 top-0 left-0 w-full h-full bg-[#0000009e] transition-opacity duration-300"></section>
  <section id="popupKick" onclick="popupKickOpenClose()" class="z-[70] fixed scale-0 top-0 left-0 w-full h-full">
    <div class="flex items-center justify-center w-full h-full px-2">
      <div onclick="event.cancelBubble=true;" id="popupKickOutput">
        
      </div>
    </div>
  </section>


<section id="popupEditKorepetycjeBg" class="fixed z-[50] h-0 opacity-0 top-0 left-0 w-full h-full bg-[#0000009e] transition-opacity duration-300"></section>
  <section id="popupEditKorepetycje" onclick="popupInfoKorepetycjeOpenClose()" class="z-[60] fixed scale-0 top-0 left-0 w-full h-full">
    <div class="flex items-center justify-center w-full h-full px-2">
      <div onclick="event.cancelBubble=true;" class="bg-[#0e0e0e] md:min-w-[800px] md:w-auto w-full max-w-[800px] max-h-[80vh] overflow-y-auto flex md:flex-row flex-col gap-4 rounded-2xl sm:px-6  -xl">
        <div id="popupItself" class="flex h-auto w-full justify-between flex-col">
            <div id="popupEditKorepetycjeOutput"></div>
        </div>
      </div>
    </div>
  </section>
<script>
    function popupEditKorepetycjeOpenClose() {
       var popup = document.getElementById("popupEditKorepetycje")
       var popupBg = document.getElementById("popupEditKorepetycjeBg")
       popupBg.classList.toggle("opacity-0")
       popupBg.classList.toggle("h-0")
       popup.classList.toggle("scale-0")
       popup.classList.add("duration-200")

    }
    function popupEditKorepetycje(){
        var popupOutput = document.getElementById("popupEditKorepetycjeOutput");
        popupOutput.innerHTML = "<div class='w-full flex items-center justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-xl'><div class='lds-dual-ring'></div></div></div>";
        popupEditKorepetycjeOpenClose()
        const url = "components/panel/korepetycje/edit_popup.php?&korepetycja=<?=$id?>";
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
<script>
    function popupUnKickOpenClose() {
       var popup = document.getElementById("popupKick")
       var popupBg = document.getElementById("popupKickBg")
       popupBg.classList.toggle("opacity-0")
       popupBg.classList.toggle("h-0")
       popup.classList.toggle("scale-0")
       popup.classList.add("duration-200")

    }
    function un_kick_user(id){
        var popupOutput = document.getElementById("popupKickOutput");
        popupOutput.innerHTML = "<div class='w-full flex items-center justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-xl'><div class='lds-dual-ring'></div></div></div>";
        popupUnKickOpenClose()
        const url = "components/panel/korepetycje/un_kick_popup.php?id="+id+"&korepetycja=<?=$id?>";
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
<script>
    function popupKickOpenClose() {
       var popup = document.getElementById("popupKick")
       var popupBg = document.getElementById("popupKickBg")
       popupBg.classList.toggle("opacity-0")
       popupBg.classList.toggle("h-0")
       popup.classList.toggle("scale-0")
       popup.classList.add("duration-200")

    }
    function kick_user(id){
        var popupOutput = document.getElementById("popupKickOutput");
        popupOutput.innerHTML = "<div class='w-full flex items-center justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-xl'><div class='lds-dual-ring'></div></div></div>";
        popupKickOpenClose()
        const url = "components/panel/korepetycje/kick_popup.php?id="+id+"&korepetycja=<?=$id?>";
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