<?php
include "../../scripts/security.php";
include "../../scripts/database/conn_db.php";
$sql = "SELECT school_id FROM `users` where id=$_SESSION[login_id];";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$school_id = $row['school_id'];

?>
<form action="scripts/korepetycje/add.php" method="POST" class="text-white flex flex-col h-full gap-4 px-2 pb-8" enctype="multipart/form-data">
    <div class="sticky z-[10] top-0 bg-[#0e0e0e] flex flex-row items-center justify-between sm:px-0 px-4 border-b border-white/10">
      <h1 class="font-medium py-6">
        Dodaj korepetycję
      </h1>
      <div class="text-center flex items-center">
            <button class="flex items-center rounded-md text-green-500 hover:text-green-700 px-4 duration-150 focus:outline-none focus:ring-2 theme-ring-focus focus:ring-offset-2">
              <span class="text-xs uppercase">Zapisz</span>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
              </svg>
            </button>
            <button onclick="popupAddKorepetycjeCloseConfirm()" type="button" class="rounded-md text-gray-300 hover:text-gray-500 hover:rotate-90 duration-150 focus:outline-none focus:ring-2 theme-ring-focus focus:ring-offset-2">
              <span class="sr-only">Zamknij</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
        </div>
    </div>
    <input type="hidden" name="school_id" value="<?=$school_id?>">
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
                          $is2 = false;
                          while($row = mysqli_fetch_assoc($result)) {
                            $is2 = true;
                            echo '<option value="'.$row['przedmiot_id'].'" class="capitalize">'.$row['name'].'</option>';
                          }
                          if($is2 == false){
                            echo '<option value="" class="" selected>Dodaj przedmioty w ustawieniach</option>';
                          }
                          ?>
                </select>
            </div>
            <div class="px-4 py-2 sm:px-0 md:col-span-2">
              <dt class="text-sm font-medium leading-6 text-gray-300">Dla:</dt>
                    <select name="class_id[]" class="js-example-basic-multiple" multiple="multiple" required>
                        <option value="wszyscy" class="hidden">Wszystkich</option>
                        <?php
                          $sql = "select class_id, name from user_class where school_id=$school_id order by name asc;";
                          $result = mysqli_query($conn, $sql);
                          while($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="'.$row['class_id'].'" class="capitalize">'.$row['name'].'</option>';
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
              <input name="max_users" required type="number" min="1" value="" placeholder="1" class="w-full text-gray-400 text-sm focus:text-white bg-[#0e0e0e] focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150"></input>
            </div>
        </div> 
       </div>
       <p class="border-b border-[#1c1c1c] text-gray-500 text-xs py-2 mb-2">
            Lokalizacja
        </p>
       <div class="grid md:grid-cols-6 gap-4">
            <div class="px-4 py-2 sm:px-0 md:col-span-3">
              <dt class="text-sm font-medium leading-6 text-gray-300">Budynek</dt>
              <select onchange="sale()" name="build_id" id="build" class="mt-1 outline-none duration-150 capitalize relative w-full cursor-default rounded-md bg-[#0e0e0e] focus:text-white py-1.5 pl-3 pr-10 text-left text-gray-400 shadow-sm ring-1 ring-inset ring-[#3d3d3d] focus:outline-none focus:ring-2 theme-ring-focus sm:text-sm sm:leading-6" required>
                    <option value="" class="hidden" disabled selected>Wybierz</option>
                          <?php
                          $sql = "SELECT concat(buildings.name, ' ', buildings.street) as 'budynek', build_id FROM `buildings` where school_id=$school_id;";
                          $result = mysqli_query($conn, $sql);
                          while($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="'.$row['build_id'].'" class="capitalize">'.$row['budynek'].'</option>';
                          }
                          ?>
                </select>
            </div>
            <div class="px-4 py-2 sm:px-0 md:col-span-3">
              <dt class="text-sm font-medium leading-6 text-gray-300">Sala lekcyjna</dt>
              <select name="sale_id" id="sale_id" class="mt-1 outline-none duration-150 capitalize relative w-full cursor-default rounded-md bg-[#0e0e0e] focus:text-white py-1.5 pl-3 pr-10 text-left text-gray-400 shadow-sm ring-1 ring-inset ring-[#3d3d3d] focus:outline-none focus:ring-2 theme-ring-focus sm:text-sm sm:leading-6" required>
                    
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
                    <input name="time_od" required type="time" value="" placeholder="" class="w-full text-gray-400 text-sm focus:text-white bg-[#0e0e0e] focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150"></input>
                </div>
                <div class="px-4 py-2 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-300">Do</dt>
                    <input name="time_do" required type="time" value="" placeholder="" class="w-full text-gray-400 text-sm focus:text-white bg-[#0e0e0e] focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150"></input>
                </div>
            </div>
            <div class="px-4 py-2 sm:px-0 w-full md:col-span-3">
              <dt class="text-sm font-medium leading-6 text-gray-300">Data</dt>
              <input name="date" required type="date" value="" placeholder="" class="w-full text-gray-400 text-sm focus:text-white bg-[#0e0e0e] focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150"></input>
            </div>
       </div>
       <p class="border-b border-[#1c1c1c] text-gray-500 text-xs py-2 mb-4">
            Powtarzalość
        </p>
       <div class="gap-4">

                    <div class="col-span-2">
                        <dt class="text-sm font-medium leading-6 text-gray-300">Powtórz przez liczbę tygodni</dt>
                        <input name="repeat" required type="number" value="1" min="1" max="10" placeholder="" class="text-center w-full text-gray-400 text-sm focus:text-white bg-[#0e0e0e] focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150"></input>
                    </div>
                    <p class="col-span-1 flex items-end h-full text-xs text-gray-600 pb-2">Domyślnie 1 oznacza tylko pojedyńczą korepetycję.</p>
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


<section id="popupInviteCloseBg" class="fixed z-[50] h-0 opacity-0 top-0 left-0 w-full h-full bg-[#0000009e] transition-opacity duration-300"></section>
  <section id="popupInviteClose" onclick="popupAddKorepetycjeCloseConfirm()" class="z-[70] fixed scale-0 top-0 left-0 w-full h-full">
    <div class="flex items-center justify-center w-full h-full px-2">
      <div onclick="event.cancelBubble=true;" id="pupupFaqDeleteOutput">
        <div class="relative transform overflow-hidden rounded-lg bg-[#1c1c1c] px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
          <div class="absolute right-0 top-0 hidden pr-4 pt-4 sm:block">
            <button onclick="popupAddKorepetycjeCloseConfirm()" type="button" class="rounded-md text-gray-300 hover:text-gray-500 hover:rotate-90 duration-150 focus:outline-none focus:ring-2 theme-ring-focus focus:ring-offset-2">
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
            <button onclick="popupAddKorepetycjeOpenClose()" type="button" class="active:scale-95 duration-150 inline-flex w-full justify-center rounded-md bg-yellow-600 duration-150 px-3 py-2 text-sm font-medium text-white shadow-sm hover:bg-yellow-500 sm:ml-3 sm:w-auto">Nie zapisuj</button>
            <button onclick="popupAddKorepetycjeCloseConfirm()" type="button" class="active:scale-95 duration-150 mt-3 inline-flex w-full justify-center rounded-md px-3 py-2 text-sm font-medium text-gray-300 shadow-sm ring-inset ring-1 ring-[#3d3d3d] hover:bg-[#3d3d3d] duration-150 sm:mt-0 sm:w-auto">Zostań</button>
          </div>
        </div>
      </div>
    </div>
  </section>

    <script>
      
    function popupAddKorepetycjeCloseConfirm() {
        var popup = document.getElementById("popupInviteClose")
        var popupBg = document.getElementById("popupInviteCloseBg")
        popupBg.classList.toggle("opacity-0")
        popupBg.classList.toggle("h-0")
        popup.classList.toggle("scale-0")
        popup.classList.add("duration-200")
    }
</script>

<script>
    function sale(){
    const build_id = document.getElementById("build").value;
    if (build_id == "") {
      document.getElementById("sale_id").innerHTML = "";
      return;
    } else {
      const url = "components/panel/nau_korepetycje_przedmioty.php?build_id="+build_id;
      fetch(url)
        .then(response => response.text())
        .then(data => {
          const parser = new DOMParser();
          const parsedDocument = parser.parseFromString(data, "text/html");

          // Wstaw zawartość strony (bez skryptów) do "panel_body"
          document.getElementById("sale_id").innerHTML = parsedDocument.body.innerHTML;

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