<?php
include "../../../scripts/security.php";

if($_SESSION['account_type'] != '3'){
    header('Location: ../../404.php');
    exit();
}

include "../../../scripts/database/conn_db.php";
$id = $_GET['korepetycja'];
$sql = "SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(godzina, ' do ', 1), ' ', -1) AS time_od, SUBSTRING_INDEX(godzina, ' do ', -1) AS time_do, status_id, korepetycje.korepetycje_id, korepetycje.school_id, korepetycje.przedmiot_id, korepetycje.max_users, korepetycje.godzina, korepetycje.data, korepetycje.destiny, korepetycje.room_id, buildings.build_id FROM `korepetycje` left JOIN rooms on rooms.room_id=korepetycje.room_id left JOIN buildings on buildings.build_id=rooms.build_id where korepetycje.korepetycje_id=$id;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$time_od = $row['time_od'];
$time_do = $row['time_do'];
$status_id = $row['status_id'];
$korepetycje_id = $row['korepetycje_id'];
$school_id = $row['school_id'];
$przedmiot_id = $row['przedmiot_id'];
$max_users = $row['max_users'];
$godzina = $row['godzina'];
$data = $row['data'];
$class_id = $row['destiny'];
//zrobienie tablicy z class_id
$class_id = explode(",", $class_id);

$room_id = $row['room_id'];
$build_id = $row['build_id'];
//rozdzielenie godziny startu i końca która wygląda tak: "od xx:xx do yy:yy"


?>
<form action="scripts/korepetycje/edit.php" method="POST" class="text-white flex flex-col h-full gap-4 px-2 pb-8" enctype="multipart/form-data">
    <div class="sticky z-[10] top-0 bg-[#0e0e0e] flex flex-row items-center justify-between sm:px-0 px-4 border-b border-white/10">
      <h1 class="font-medium py-6">
        Edytuj korepetycję
      </h1>
      <div class="text-center flex items-center">
            <?php
            if($status_id == 3) {
              echo '
              <button onclick="unDelete()" type="button" class="flex items-center rounded-md text-blue-500 hover:text-blue-700 gap-1 px-4 duration-150 focus:outline-none focus:ring-2 theme-ring-focus focus:ring-offset-2">
                <span class="text-xs uppercase">Przywróć</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                </svg>
              </button>
              ';
              
            }else{
              echo '
              <button onclick="popupKorepetycjeDelete()" type="button" class="flex items-center rounded-md text-red-500 hover:text-red-700 gap-1 px-4 duration-150 focus:outline-none focus:ring-2 theme-ring-focus focus:ring-offset-2">
                <span class="text-xs uppercase">Usuń</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                  <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd" />
                </svg>
              </button>
              ';
            }
            ?>
            <button class="flex items-center rounded-md text-green-500 hover:text-green-700 px-4 duration-150 focus:outline-none focus:ring-2 theme-ring-focus focus:ring-offset-2">
              <span class="text-xs uppercase">Zapisz</span>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
              </svg>
            </button>
            <button onclick="popupEditKorepetycjeCloseConfirm()" type="button" class="rounded-md text-gray-300 hover:text-gray-500 hover:rotate-90 duration-150 focus:outline-none focus:ring-2 theme-ring-focus focus:ring-offset-2">
              <span class="sr-only">Zamknij</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
        </div>
    </div>
    <input type="hidden" name="school_id" value="<?=$school_id?>">
    <input type="hidden" name="korepetycja_id" value="<?=$korepetycje_id?>">
    <dl class="">
        <p class="border-b border-[#1c1c1c] text-gray-500 text-xs py-2 mb-2">
            Główne dane
        </p>
        <div class="grid md:grid-cols-6 gap-4">
            <div class="px-4 py-2 sm:px-0 md:col-span-2">
              <dt class="text-sm font-medium leading-6 text-gray-300">Przedmiot</dt>
              <select name="przedmiot_id" class="mt-1 outline-none duration-150 capitalize relative w-full cursor-default rounded-md bg-[#0e0e0e] focus:text-white py-1.5 pl-3 pr-10 text-left text-gray-400 shadow-sm ring-1 ring-inset ring-[#3d3d3d] focus:outline-none focus:ring-2 theme-ring-focus sm:text-sm sm:leading-6" required>
                    <option value="" class="hidden" disabled selected>Wybierz</option>
                          <?php
                          $sql = "SELECT przedmioty.name, przedmioty.przedmiot_id FROM `selected_przedmioty` join przedmioty on przedmioty.przedmiot_id=selected_przedmioty.przedmiot_id where user_id = $_SESSION[login_id] order by przedmioty.name asc;";
                          $result = mysqli_query($conn, $sql);
                          while($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="'.$row['przedmiot_id'].'"';
                            if($row['przedmiot_id'] == $przedmiot_id) {
                              echo ' selected';
                            }
                            echo ' class="capitalize">'.$row['name'].'</option>';
                          }
                          ?>
                </select>
            </div>
            <div class="px-4 py-2 sm:px-0 md:col-span-2">
              <dt class="text-sm font-medium leading-6 text-gray-300">Dla:</dt>
                    <select name="class_id[]" class="js-example-basic-multiple" multiple="multiple" required>
                        <option value="wszyscy"
                        <?php
                        if(in_array("wszyscy", $class_id)) {
                          echo ' selected';
                        }
                        ?>
                        class="hidden">Wszystkich</option>
                        <?php
                          $sql = "select class_id, name from user_class where school_id=$school_id order by name asc;";
                          $result = mysqli_query($conn, $sql);
                          while($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="'.$row['class_id'].'" ';
                            if(in_array($row['class_id'], $class_id)) {
                              echo ' selected';
                            }
                            echo ' class="capitalize">'.$row['name'].'</option>';
                          }
                        ?>
                        
                    </select>
                    <script>
                        $(document).ready(function() {
                            $('.js-example-basic-multiple').select2();
                        });
                    </script>
            </div>
            <div class="px-4 py-2 sm:px-0 md:col-span-2">
              <dt class="text-sm font-medium leading-6 text-gray-300">Maksymalna liczba uczestników</dt>
              <input name="max_users" required type="number" min="1" value="<?=$max_users?>" placeholder="1" class="w-full text-gray-400 text-sm focus:text-white bg-[#0e0e0e] focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150"></input>
            </div>
        </div> 
       </div>
       <p class="border-b border-[#1c1c1c] text-gray-500 text-xs py-2 mb-2">
            Lokalizacja
        </p>
       <div class="grid md:grid-cols-6 gap-4">
            <div class="px-4 py-2 sm:px-0 md:col-span-3">
              <dt class="text-sm font-medium leading-6 text-gray-300">Budynek</dt>
              <select onchange="edit_sale()" name="build_id" id="build" class="mt-1 outline-none duration-150 capitalize relative w-full cursor-default rounded-md bg-[#0e0e0e] focus:text-white py-1.5 pl-3 pr-10 text-left text-gray-400 shadow-sm ring-1 ring-inset ring-[#3d3d3d] focus:outline-none focus:ring-2 theme-ring-focus sm:text-sm sm:leading-6" required>
                    <option value="" class="hidden" disabled selected>Wybierz</option>
                          <?php
                          $sql = "SELECT concat(buildings.name, ' ', buildings.street) as 'budynek', build_id FROM `buildings` where school_id=$school_id;";
                          $result = mysqli_query($conn, $sql);
                          while($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="'.$row['build_id'].'"';
                            if($row['build_id'] == $build_id) {
                              echo ' selected';
                            }
                            echo ' class="capitalize">'.$row['budynek'].'</option>';
                          }
                          ?>
                </select>
            </div>
            <div class="px-4 py-2 sm:px-0 md:col-span-3">
              <dt class="text-sm font-medium leading-6 text-gray-300">Sala lekcyjna</dt>
              <select name="sale_id" id="edit_sale_id" class="mt-1 outline-none duration-150 capitalize relative w-full cursor-default rounded-md bg-[#0e0e0e] focus:text-white py-1.5 pl-3 pr-10 text-left text-gray-400 shadow-sm ring-1 ring-inset ring-[#3d3d3d] focus:outline-none focus:ring-2 theme-ring-focus sm:text-sm sm:leading-6" required>
                    
              </select>
            </div>
       </div>
       <p class="border-b border-[#1c1c1c] text-gray-500 text-xs py-2 mb-2">
            Godzina i dzień
        </p>
       <div class="grid md:grid-cols-6 gap-4">
            <div class="md:col-span-3 grid grid-cols-2 gap-2">
                <div class="px-4 py-2 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-300">Od</dt>
                    <input name="time_od" required type="time" value="<?=$time_od?>" placeholder="" class="w-full text-gray-400 text-sm focus:text-white bg-[#0e0e0e] focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150"></input>
                </div>
                <div class="px-4 py-2 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-300">Do</dt>
                    <input name="time_do" required type="time" value="<?=$time_do?>" placeholder="" class="w-full text-gray-400 text-sm focus:text-white bg-[#0e0e0e] focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150"></input>
                </div>
            </div>
            <div class="px-4 py-2 sm:px-0 w-full md:col-span-3">
              <dt class="text-sm font-medium leading-6 text-gray-300">Data</dt>
              <input name="date" required type="date" value="<?=$data?>" placeholder="" class="w-full text-gray-400 text-sm focus:text-white bg-[#0e0e0e] focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150"></input>
            </div>
       </div>
       <!-- <p class="border-b border-[#1c1c1c] text-gray-500 text-xs py-2 mb-2 mt-2">
            Zakończenie zapisów
        </p>
       <div class="grid md:grid-cols-2 gap-4">
            
                <div class="px-4 py-2 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-300">Godzina</dt>
                    <input name="zapisy_time_end" required type="time" value="" placeholder="" class="w-full text-gray-400 text-sm focus:text-white bg-[#0e0e0e] focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150"></input>
                </div>
                <div class="px-4 py-2 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-300">Dzień</dt>
                    <input name="zapisy_date_end" required type="date" value="" placeholder="" class="w-full text-gray-400 text-sm focus:text-white bg-[#0e0e0e] focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150"></input>
                </div>
       </div> -->
    </dl>
</form>


<section id="popupEditKorepetycjeCloseBg" class="fixed z-[50] h-0 opacity-0 top-0 left-0 w-full h-full bg-[#0000009e] transition-opacity duration-300"></section>
  <section id="popupEditKorepetycjeClose" onclick="popupEditKorepetycjeCloseConfirm()" class="z-[70] fixed scale-0 top-0 left-0 w-full h-full">
    <div class="flex items-center justify-center w-full h-full px-2">
      <div onclick="event.cancelBubble=true;" id="pupupFaqDeleteOutput">
        <div class="relative transform overflow-hidden rounded-lg bg-[#1c1c1c] px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
          <div class="absolute right-0 top-0 hidden pr-4 pt-4 sm:block">
            <button onclick="popupEditKorepetycjeCloseConfirm()" type="button" class="rounded-md text-gray-300 hover:text-gray-500 hover:rotate-90 duration-150 focus:outline-none focus:ring-2 theme-ring-focus focus:ring-offset-2">
              <span class="sr-only">Zamknij</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
          <div class="sm:flex sm:items-start">
            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-[#3d3d3d] sm:mx-0 sm:h-10 sm:w-10">
              <svg class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
              </svg>
            </div>
            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
              <h3 class="text-base font-semibold leading-6 text-gray-200" id="modal-title">Masz niezapisane zmiany</h3>
              <div class="mt-2">
                <p class="text-sm text-gray-400">Czy na pewno chcesz wyjść mając niezapisane zmiany? Nie ma możliwości przywrócenia tych zmian.</p>
              </div>
            </div>
          </div>
          <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
            <button onclick="popupEditKorepetycjeOpenClose()" type="button" class="active:scale-95 duration-150 inline-flex w-full justify-center rounded-md bg-yellow-600 duration-150 px-3 py-2 text-sm font-medium text-white shadow-sm hover:bg-yellow-500 sm:ml-3 sm:w-auto">Nie zapisuj</button>
            <button onclick="popupEditKorepetycjeCloseConfirm()" type="button" class="active:scale-95 duration-150 mt-3 inline-flex w-full justify-center rounded-md px-3 py-2 text-sm font-medium text-gray-300 shadow-sm ring-inset ring-1 ring-[#3d3d3d] hover:bg-[#3d3d3d] duration-150 sm:mt-0 sm:w-auto">Zostań</button>
          </div>
        </div>
      </div>
    </div>
  </section>
 <section id="popupKorepetycjeDeleteBg" class="fixed z-[50] h-0 opacity-0 top-0 left-0 w-full h-full bg-[#0000009e] transition-opacity duration-300"></section>
  <section id="popupKorepetycjeDelete" onclick="popupKorepetycjeDelete()" class="z-[70] fixed scale-0 top-0 left-0 w-full h-full">
    <div class="flex items-center justify-center w-full h-full px-2">
      <div onclick="event.cancelBubble=true;" id="pupupFaqDeleteOutput">
        <div class="relative transform overflow-hidden rounded-lg bg-[#1c1c1c] px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
          <div class="absolute right-0 top-0 hidden pr-4 pt-4 sm:block">
            <button onclick="popupKorepetycjeDelete()" type="button" class="rounded-md text-gray-300 hover:text-gray-500 hover:rotate-90 duration-150 focus:outline-none focus:ring-2 theme-ring-focus focus:ring-offset-2">
              <span class="sr-only">Zamknij</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
          <div class="sm:flex sm:items-start">
            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-[#3d3d3d] sm:mx-0 sm:h-10 sm:w-10">
              <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
              </svg>
            </div>
            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
              <h3 class="text-base font-semibold leading-6 text-gray-200" id="modal-title">Usuń korepetycje</h3>
              <div class="mt-2">
                <p class="text-sm text-gray-400">Czy na pewno chcesz usunąć tą korepetycję? Nie ma możliwości przywrócenia tych danych.</p>
              </div>
            </div>
          </div>
          <form action="scripts/korepetycje/delete.php" method="POST" class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
            <input type="hidden" name="korepetycja_id" value="<?=$korepetycje_id?>">
            <button type="submit" class="active:scale-95 duration-150 inline-flex w-full justify-center rounded-md bg-red-600 duration-150 px-3 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Usuń</button>
            <button onclick="popupKorepetycjeDelete()" type="button" class="active:scale-95 duration-150 mt-3 inline-flex w-full justify-center rounded-md px-3 py-2 text-sm font-medium text-gray-300 shadow-sm ring-inset ring-1 ring-[#3d3d3d] hover:bg-[#3d3d3d] duration-150 sm:mt-0 sm:w-auto">Anuluj</button>
          </form>
        </div>
      </div>
    </div>
  </section>

<script>
  function unDelete(){
      window.location.href = 'scripts/korepetycje/undelete.php?korepetycja_id=<?=$korepetycje_id?>';
  }
</script>

  <script>
    function popupKorepetycjeDelete() {
        var popup = document.getElementById("popupKorepetycjeDelete")
        var popupBg = document.getElementById("popupKorepetycjeDeleteBg")
        popupBg.classList.toggle("opacity-0")
        popupBg.classList.toggle("h-0")
        popup.classList.toggle("scale-0")
        popup.classList.add("duration-200")
    }
</script>

<script>
      
    function popupEditKorepetycjeCloseConfirm() {
        var popup = document.getElementById("popupEditKorepetycjeClose")
        var popupBg = document.getElementById("popupEditKorepetycjeCloseBg")
        popupBg.classList.toggle("opacity-0")
        popupBg.classList.toggle("h-0")
        popup.classList.toggle("scale-0")
        popup.classList.add("duration-200")
    }
</script>

<script>
    edit_sale()
    function edit_sale(){
    const build_id = document.getElementById("build").value;
    if (build_id == "") {
      document.getElementById("edit_sale_id").innerHTML = "";
      return;
    } else {
      const url = "components/panel/nau_korepetycje_edit_przedmioty.php?build_id="+build_id+"&sale_id=<?=$room_id?>"
      fetch(url)
        .then(response => response.text())
        .then(data => {
          const parser = new DOMParser();
          const parsedDocument = parser.parseFromString(data, "text/html");

          // Wstaw zawartość strony (bez skryptów) do "panel_body"
          document.getElementById("edit_sale_id").innerHTML = parsedDocument.body.innerHTML;

          // Przechodź przez znalezione skrypty i wykonuj je
          const scripts = parsedDocument.querySelectorAll("script");
          scripts.forEach(script => {
            const scriptElement = document.createElement("script");
            scriptElement.textContent = script.textContent;
            document.body.appendChild(scriptElement);
          });
        });
    }
  }
</script>