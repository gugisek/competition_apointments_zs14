<?php
include "../../scripts/security.php";
      include "../../scripts/database/conn_db.php";
      $sql = "SELECT school_id FROM `users` where id=$_SESSION[login_id];";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $school_id = $row['school_id'];
?>
<!-- drafty/ published czy coś i preview to łtwe będzie bo wystarczy dać publicyty_type i w publikach tylko publiki wyświetlać -->
<section data-aos="fade-right" data-aos-delay="100" class="sm:px-6 lg:px-8 px-4 pt-2">
    <div class="px-4 mb-6 sm:px-0 mt-6 flex md:flex-row flex-col justify-between items-center">
        <div>
            <h3 class="text-base font-semibold leading-7 text-white">Przedmioty</h3>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-400">Dodawaj i usuwaj przedmioty jakie są dostępne w Twojej szkole.</p>
        </div>
        <button type="button" onclick="openPopupInviteAdd()" class="active:scale-95 duration-150 md:mt-0 mt-4 inline-flex items-center gap-x-2 rounded-md theme-bg theme-bg-hover px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 duration-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Dodaj przedmiot
        </button>
    </div>

    <ol class="mt-2 divide-y divide-white/10 text-sm leading-6 text-gray-500">
      <?php

      $sql = "SELECT * FROM `przedmioty` where school_id=$school_id order by name asc;";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)) {
        echo '<li class="w-full">
        <div class="py-4 w-full flex items-center justify-between">
          <div class="flex flex-row w-full items-center gap-4 text-gray-300 capitalize leading-3">
            <p>
              '.$row['name'].'
              <br>
            </p>
          </div>
          <p class="flex-none sm:ml-6">
          <p onclick="openPopupInviteDelete('.$row['przedmiot_id'].')" class="hover:text-red-500 duration-150 transition-all cursor-pointer flex-none ml-6">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
            </svg>
          </p>
          </p>
        </div>
      </li>
      ';
        }
      ?>
    </ol>
  </section>
 <section id="popupTeamsDeleteBg" class="fixed z-[50] h-0 opacity-0 top-0 left-0 w-full h-full bg-[#0000009e] transition-opacity duration-300"></section>
  <section id="popupTeamsDelete" onclick="popupInviteDelete()" class="z-[70] fixed scale-0 top-0 left-0 w-full h-full">
    <div class="flex items-center justify-center w-full h-full px-2">
      <div onclick="event.cancelBubble=true;" id="popupInviteDeleteOutput">
        
      </div>
    </div>
  </section>

  <section id="popupSchoolsBg" class="fixed z-[50] h-0 opacity-0 top-0 left-0 w-full h-full bg-[#0000009e] transition-opacity duration-300"></section>
  <section id="popupSchools" onclick="popupInviteCloseConfirm()" class="z-[60] fixed scale-0 top-0 left-0 w-full h-full">
    <div class="flex items-center justify-center w-full h-full px-2">
      <div onclick="event.cancelBubble=true;" class="bg-[#0e0e0e] md:min-w-[800px] md:w-auto w-full max-w-[800px] max-h-[80vh] overflow-y-auto flex md:flex-row flex-col gap-4 rounded-2xl sm:px-6  -xl">
        <div id="popupItself" class="flex h-auto w-full justify-between flex-col">
            <div id="pupupSchoolsOutput"></div>
        </div>
      </div>
    </div>
  </section>


     <script>
    function popupInviteOpenClose() {
       var popup = document.getElementById("popupSchools")
       var popupBg = document.getElementById("popupSchoolsBg")
       popupBg.classList.toggle("opacity-0")
       popupBg.classList.toggle("h-0")
       popup.classList.toggle("scale-0")
       popup.classList.add("duration-200")

    }
    function openPopupInviteAdd() {
        var popupOutput = document.getElementById("pupupSchoolsOutput");
        popupOutput.innerHTML = "<div class='w-full flex items-center justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-xl'><div class='lds-dual-ring'></div></div></div>";
        popupInviteOpenClose()
        const url = "components/panel/przedmioty/add_popup.php";
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
    function popupInviteDelete() {
        var popup = document.getElementById("popupTeamsDelete")
        var popupBg = document.getElementById("popupTeamsDeleteBg")
        popupBg.classList.toggle("opacity-0")
        popupBg.classList.toggle("h-0")
        popup.classList.toggle("scale-0")
        popup.classList.add("duration-200")
    }
</script>

  <script>

    function openPopupInviteDelete(id) {
        var popupOutput = document.getElementById("popupInviteDeleteOutput");
        popupOutput.innerHTML = "<div class='w-full flex items-center justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-xl'><div class='lds-dual-ring'></div></div></div>";
        popupInviteDelete()
        const url = "components/panel/przedmioty/delete_popup.php?id="+id;
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