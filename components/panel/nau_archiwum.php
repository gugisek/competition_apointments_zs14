<?php
session_start();
if($_SESSION['account_type'] != '3'){
    header('Location: ../../404.php');
    exit();
}
?>
<main data-aos="fade-right" data-aos-delay="100" class="">
      <header class="flex items-center justify-between border-b border-white/5 px-4 sm:px-6 lg:px-8">
            <div class="w-full px-4 mb-6 sm:px-0 mt-6 flex md:flex-row flex-col justify-between items-center">
                <div>
                    <h3 class="text-base font-semibold leading-7 text-white">Archiwalne korepetycje</h3>
                    <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-400">Zobacz swoje wszystkie korepetycje, które już się odbyły.</p>
                </div>
            </div>
      </header>
      <!-- Deployment list -->
      <ul role="list" class="divide-y divide-white/5">
        <?php
        include "../../scripts/database/conn_db.php";
        $login_id = $_SESSION['login_id'];
        $sql = "SELECT korepetycje.korepetycje_id as 'id', przedmioty.name as 'przedmiot', concat(users.name, ' ', users.sur_name) as 'nauczyciel', max_users, godzina, destiny, data, korepetycje_status.name as 'status', if(isnull(destiny), 'wszyscy', destiny) as 'dla', rooms.name as 'sala', concat(buildings.name, ' ', buildings.street) as 'budynek', count(zapisy_korepetycje.zapis_id) as 'uczniowie' from korepetycje join przedmioty on przedmioty.przedmiot_id=korepetycje.przedmiot_id join users on users.id=korepetycje.creator_id join korepetycje_status on korepetycje_status.status_id=korepetycje.status_id left join rooms on rooms.room_id=korepetycje.room_id left JOIN buildings on buildings.build_id=rooms.build_id left JOIN zapisy_korepetycje on zapisy_korepetycje.korepetycja_id=korepetycje.korepetycje_id where korepetycje.creator_id = '$login_id' and korepetycje.data < CURDATE() group by korepetycje.korepetycje_id order by korepetycje.data asc, korepetycje.godzina asc;";
        $result = mysqli_query($conn, $sql);
        $is = false;
        while($row = mysqli_fetch_assoc($result)){
          $destiny = $row['destiny'];
            if($row['destiny'] != 'wszyscy'){
              $destiny = '';
              $sql2 = "select user_class.name from user_class where class_id in ($row[destiny])";
              $result2 = mysqli_query($conn, $sql2);
                 while($row2 = mysqli_fetch_assoc($result2)){
                  $destiny .= "$row2[name] ";
                 }
            }
            $is = true;
            //zamiana daty w formacie rok-miesiąc-dzień na nazwa dnia dzień nazwa miesiąca w języku polskim
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

            echo '
            <li onclick="popup_info_korepetycje(`'.$row['id'].'`)" class="hover:bg-[#3d3d3d]/70 transition-all duration-150 cursor-pointer relative flex md:flex-row flex-col items-center space-x-4 px-4 py-4 sm:px-6 lg:px-8">
          <div class="min-w-0 flex-auto">
            <div class="flex items-center gap-x-3">
              <div class="flex-none rounded-full p-1 ';
              if($row['status'] == 'odwołane'){
                echo 'text-gray-400 bg-gray-400/10 ring-gray-400/20';
              }else{
                if($row['uczniowie'] >= $row['max_users']){
                  echo 'text-gray-400 bg-gray-400/10 ring-gray-400/20';
                }elseif($row['uczniowie'] >= $row['max_users'] * 0.65){
                  echo 'text-gray-400 bg-gray-400/10 ring-gray-400/20';
                }else{
                    echo 'text-gray-400 bg-gray-400/10 ring-gray-400/20';
                }
              }
              echo ' ">
                <div class="h-2 w-2 rounded-full bg-current"></div>
              </div>
              <h2 class="min-w-0 text-sm font-semibold leading-6 text-white">
                <a class="flex flex-wrap gap-x-2">
                  <span class="truncate capitalize">'.$row['przedmiot'].'</span>
                  <span class="text-gray-400">/</span>
                  <span class="whitespace-nowrap">'.$destiny.'</span>
                  <span class="absolute inset-0"></span>
                </a>
              </h2>
            </div>
            <div class="mt-3 flex flex-wrap items-center gap-x-2.5 text-xs leading-5 text-gray-400">
              <p class="truncate">Sala '.$row['sala'].'</p>
              <svg viewBox="0 0 2 2" class="h-0.5 w-0.5 flex-none fill-gray-300">
                <circle cx="1" cy="1" r="1" />
              </svg>
              <p>'.$row['budynek'].'</p>
              <svg viewBox="0 0 2 2" class="h-0.5 w-0.5 flex-none fill-gray-300">
                <circle cx="1" cy="1" r="1" />
              </svg>
              <p class="whitespace-nowrap">'.$row['godzina'].'</p>
              <svg viewBox="0 0 2 2" class="h-0.5 w-0.5 flex-none fill-gray-300">
                <circle cx="1" cy="1" r="1" />
              </svg>
                 <p class="capitalize">'.$dzienTygodniaPl.', '.$dzien.' '.$miesiacPl.'</p>
            </div>
          </div>
          <div class="rounded-full flex items-center justify-center gap-2 py-1 px-2 text-xs font-medium ring-1 ring-inset capitalize md:mt-0 mt-4 ';
          if($row['status'] == 'odwołane'){
            echo 'text-gray-400 bg-gray-400/10 ring-gray-400/20';
          }else{
            if($row['uczniowie'] >= $row['max_users']){
              echo 'text-gray-400 bg-gray-400/10 ring-gray-400/20';
            }elseif($row['uczniowie'] >= $row['max_users'] * 0.65){
              echo 'text-gray-400 bg-gray-400/10 ring-gray-400/20';
            }else{
                echo 'text-gray-400 bg-gray-400/10 ring-gray-400/20';
            }
          }
          echo '">';
          if($row['status'] == 'odwołane'){
                        echo 'Odwołane';
                    }else{
                        if($row['uczniowie'] >= $row['max_users']){
                        echo 'Brak miejsc';
                        }elseif($row['uczniowie'] >= $row['max_users'] * 0.60){
                        echo 'Ostatnie miejsca';
                        }else{
                            echo 'Otwarte';
                        }
          }
          echo '<div class="flex items-center justify-center gap-1">
             '.$row['uczniowie'].'/'.$row['max_users'].'
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
              <path d="M10 9a3 3 0 100-6 3 3 0 000 6zM6 8a2 2 0 11-4 0 2 2 0 014 0zM1.49 15.326a.78.78 0 01-.358-.442 3 3 0 014.308-3.516 6.484 6.484 0 00-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 01-2.07-.655zM16.44 15.98a4.97 4.97 0 002.07-.654.78.78 0 00.357-.442 3 3 0 00-4.308-3.517 6.484 6.484 0 011.907 3.96 2.32 2.32 0 01-.026.654zM18 8a2 2 0 11-4 0 2 2 0 014 0zM5.304 16.19a.844.844 0 01-.277-.71 5 5 0 019.947 0 .843.843 0 01-.277.71A6.975 6.975 0 0110 18a6.974 6.974 0 01-4.696-1.81z" />
            </svg>
           </div>
          </div>
          <svg class="h-5 w-5 flex-none text-gray-400 md:block hidden" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          </svg>
        </li>

            ';
        }
        if($is == false){
            echo '<p class="text-center text-gray-500 py-8">Nie masz żadnych odbytych korepetycji</p>';
        }
        ?>

        <!-- More deployments... -->
      </ul>
    </main>
      <section id="popupInfoKorepetycjeBg" class="fixed z-[50] h-0 opacity-0 top-0 left-0 w-full h-full bg-[#0000009e] transition-opacity duration-300"></section>
  <section id="popupInfoKorepetycje" onclick="popupInfoKorepetycjeOpenClose()" class="z-[60] fixed scale-0 top-0 left-0 w-full h-full">
    <div class="flex items-center justify-center w-full h-full px-2">
      <div onclick="event.cancelBubble=true;" class="bg-[#0e0e0e] md:min-w-[800px] md:w-auto w-full max-w-[800px] max-h-[80vh] overflow-y-auto flex md:flex-row flex-col gap-4 rounded-2xl sm:px-6  -xl">
        <div id="popupItself" class="flex h-auto w-full justify-between flex-col">
            <div id="pupupInfoKorepetycjeOutput"></div>
        </div>
      </div>
    </div>
  </section>

<script>
  function popupInfoKorepetycjeOpenClose() {
       var popup = document.getElementById("popupInfoKorepetycje")
       var popupBg = document.getElementById("popupInfoKorepetycjeBg")
       popupBg.classList.toggle("opacity-0")
       popupBg.classList.toggle("h-0")
       popup.classList.toggle("scale-0")
       popup.classList.add("duration-200")

    }

  function popup_info_korepetycje(id){
        var popupOutput = document.getElementById("pupupInfoKorepetycjeOutput");
        popupOutput.innerHTML = "<div class='w-full flex items-center justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-xl'><div class='lds-dual-ring'></div></div></div>";
        popupInfoKorepetycjeOpenClose()
        const url = "components/panel/nau_korepetycje_popup_info.php?id="+id;
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