<?php
include "../../scripts/security.php";
include "../../scripts/database/conn_db.php";
$sql = "SELECT school_id FROM `users` where id=$_SESSION[login_id];";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$school_id = $row['school_id'];

?>
<form action="scripts/korepetycje/zapisz_sie.php" method="POST" class="text-white flex flex-col h-full gap-4 px-2 pb-8" enctype="multipart/form-data">
    <div class="sticky z-[10] top-0 bg-[#0e0e0e] flex flex-row items-center justify-between sm:px-0 px-4 border-b border-white/10">
      <h1 class="font-medium py-6">
        Zapisz się na korepetycje
      </h1>
      <div class="text-center flex items-center">
            <!-- <button class="flex items-center rounded-md text-green-500 hover:text-green-700 px-4 duration-150 focus:outline-none focus:ring-2 theme-ring-focus focus:ring-offset-2">
              <span class="text-xs uppercase">Zapisz</span>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
              </svg>
            </button> -->
            <button onclick="popupZapisKorepetycjeOpenClose()" type="button" class="rounded-md text-gray-300 hover:text-gray-500 hover:rotate-90 duration-150 focus:outline-none focus:ring-2 theme-ring-focus focus:ring-offset-2">
              <span class="sr-only">Zamknij</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
        </div>
    </div>
    <dl class="">
        <!-- <p class="border-b border-[#1c1c1c] text-gray-500 text-xs py-2 mb-2">
            Główne dane
        </p> -->
        <div data-aos="fade-right" data-aos-delay="200" class="grid md:grid-cols-10 gap-4">
            <div class="px-4 py-2 sm:px-0 md:col-span-2">
            </div>
            <div class="px-4 py-2 sm:px-0 md:col-span-6">
              <dt class="text-sm font-medium leading-6 text-gray-300">Nauczyciel</dt>
              <select onchange="przedmiot()" id="nau_id" name="nau_id" class="mt-1 outline-none duration-150 capitalize relative w-full cursor-default rounded-md bg-[#0e0e0e] focus:text-white py-1.5 pl-3 pr-10 text-left text-gray-400 shadow-sm ring-1 ring-inset ring-[#3d3d3d] focus:outline-none focus:ring-2 theme-ring-focus sm:text-sm sm:leading-6" required>
                    <option value="" class="hidden" disabled selected>Wybierz</option>
                          <?php
                          $sql = "SELECT id, concat(name, ' ', sur_name) as name FROM `users` where role_id=3 and school_id = $school_id;";
                          $result = mysqli_query($conn, $sql);
                          while($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="'.$row['id'].'" class="capitalize">'.$row['name'].'</option>';
                          }
                          ?>
                </select>
            </div>
       </div>
       <div id="body_przedmiot" class="grid md:grid-cols-10 gap-4">
            
       </div>
       <div id="body_wynik" class="grid md:grid-cols-10 gap-4">
            
       </div>
       <div id="body_powod" class="grid md:grid-cols-10 gap-4">
            
       </div>   
    </dl>
</form>

<script>
    function wyniki(wynik) {
        const borders = document.querySelectorAll(".wynik_border")
        borders.forEach(border => {
            border.classList.remove("theme-border")
        })
        const border = document.getElementById("wynik_border_"+wynik)
        border.classList.add("theme-border")
    }
</script>

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
    function przedmiot(){
    const build_id = document.getElementById("nau_id").value;
        document.getElementById("body_wynik").innerHTML = "";
        document.getElementById("body_powod").innerHTML = "";
          //document.getElementById("body_przedmiot").innerHTML = "<div></div><div></div><div></div><div></div><div data-aos='fade-in' data-aos-delay='200' class='col-span-2 scale-50 w-full flex items-center justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-xl'><div class='lds-dual-ring'></div></div></div>";



      const url = "components/panel/ucz_korepetycje_przedmioty.php?nau_id="+build_id;
      fetch(url)
        .then(response => response.text())
        .then(data => {
          const parser = new DOMParser();
          const parsedDocument = parser.parseFromString(data, "text/html");

          // Wstaw zawartość strony (bez skryptów) do "panel_body"
          document.getElementById("body_przedmiot").innerHTML = parsedDocument.body.innerHTML;

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
    function wynik(){
    const przedmiot_id = document.getElementById("zapis_przedmiot_id").value;
    const nau_id = document.getElementById("nau_id").value;
    document.getElementById("body_powod").innerHTML = "";
    document.getElementById("body_wynik").innerHTML = "<div></div><div></div><div></div><div></div><div data-aos='fade-in' data-aos-delay='200' class='col-span-2 scale-50 w-full flex items-center justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-xl'><div class='lds-dual-ring'></div></div></div>";

      const url = "components/panel/ucz_korepetycje_wynik.php?przedmiot_id="+przedmiot_id+"&nau_id="+nau_id;
      fetch(url)
        .then(response => response.text())
        .then(data => {
          const parser = new DOMParser();
          const parsedDocument = parser.parseFromString(data, "text/html");

          // Wstaw zawartość strony (bez skryptów) do "panel_body"
          document.getElementById("body_wynik").innerHTML = parsedDocument.body.innerHTML;

          // Przechodź przez znalezione skrypty i wykonuj je
          const scripts = parsedDocument.querySelectorAll("script");
          scripts.forEach(script => {
            const scriptElement = document.createElement("script");
            scriptElement.textContent = script.textContent;
            document.body.appendChild(scriptElement);
          });
        });
    }
    function powod(){
    //wybranie value z checkboxów o name korepetycja_id
    document.getElementById("body_powod").innerHTML = "";
    var korepetycja_id = [];
    $.each($("input[name='korepetycja_id']:checked"), function(){
        korepetycja_id.push($(this).val());
    });
    console.log(korepetycja_id);
    // document.getElementById("body_powod").innerHTML = "<div></div><div></div><div></div><div></div><div data-aos='fade-in' data-aos-delay='200' class='col-span-2 scale-50 w-full flex items-center justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-xl'><div class='lds-dual-ring'></div></div></div>";

      const url = "components/panel/ucz_korepetycje_powod.php?korepetycja_id="+korepetycja_id;
      fetch(url)
        .then(response => response.text())
        .then(data => {
          const parser = new DOMParser();
          const parsedDocument = parser.parseFromString(data, "text/html");

          // Wstaw zawartość strony (bez skryptów) do "panel_body"
          document.getElementById("body_powod").innerHTML = parsedDocument.body.innerHTML;

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