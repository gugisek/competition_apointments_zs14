<?php
include "../../scripts/security.php";
?>
<!-- drafty/ published czy coś i preview to łtwe będzie bo wystarczy dać publicyty_type i w publikach tylko publiki wyświetlać -->
<section data-aos="fade-right" data-aos-delay="100" class="sm:px-6 lg:px-8 px-4 pt-8">
    <div class="px-4 mb-6 sm:px-0 flex md:flex-row flex-col justify-between items-center">
        <div>
            <h3 class="text-base font-semibold leading-7 text-white">Zaproszenia</h3>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-400">Wygeneruj i zarządzaj zaproszeniami dla szkół, uczniów i nauczycieli.</p>
        </div>
        <button type="button" onclick="openPopupInviteAdd()" class="active:scale-95 duration-150 md:mt-0 mt-4 inline-flex items-center gap-x-2 rounded-md theme-bg theme-bg-hover px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 duration-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Dodaj zaproszenie
        </button>
    </div>

    <ol class="mt-2 divide-y divide-white/10 text-sm leading-6 text-gray-500">
      <!-- <li class="py-4 sm:flex hover:bg-[#3d3d3d] duration-150 cursor-pointer">
        <p class="mt-2 flex-auto sm:mt-0 text-gray-300">Wielki Turniej CS:GO Szanajcy <span class="text-xs text-gray-500">Edycja pierwsza</span></p>
        <p class="flex-none sm:ml-6">1 grudnia 2023 - 2 luteń 2023</p>
      </li> -->
      <?php
      include "../../scripts/database/conn_db.php";
      $sql = "SELECT invitations.invite_id, invitations.code, schools.name, user_roles.role, invitations.uses, invitations.max_uses FROM `invitations` join schools ON schools.school_id=invitations.school_id join user_roles on user_roles.id=invitations.role_id;";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)) {
        echo '<li class="w-full">
        <div class="py-4 w-full flex items-center justify-between">
          <div class="flex flex-row w-full items-center gap-4 text-gray-300 capitalize leading-3">
            <p>
              '.$row['code'].'
              <br>
              <span class="text-xs text-gray-500 capitalize">'.$row['name'].'</span>
            </p>
          </div>
          <p style="white-space: nowrap;" class="capitalize px-2 text-xs">'.$row['role'].' </p>
          <p class="flex items-center justify-center gap-2">
            <span class="text-xs text-gray-500"> '.$row['uses'].'/'.$row['max_uses'].'</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
              <path d="M10 9a3 3 0 100-6 3 3 0 000 6zM6 8a2 2 0 11-4 0 2 2 0 014 0zM1.49 15.326a.78.78 0 01-.358-.442 3 3 0 014.308-3.516 6.484 6.484 0 00-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 01-2.07-.655zM16.44 15.98a4.97 4.97 0 002.07-.654.78.78 0 00.357-.442 3 3 0 00-4.308-3.517 6.484 6.484 0 011.907 3.96 2.32 2.32 0 01-.026.654zM18 8a2 2 0 11-4 0 2 2 0 014 0zM5.304 16.19a.844.844 0 01-.277-.71 5 5 0 019.947 0 .843.843 0 01-.277.71A6.975 6.975 0 0110 18a6.974 6.974 0 01-4.696-1.81z" />
            </svg>
          </p>

        <p onclick="printTemplate(`'.$row['code'].'`, `'.$row['role'].'`, `'.$row['name'].'`)" class="theme-text-hover duration-150 transition-all cursor-pointer flex-none ml-6">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                <path fill-rule="evenodd" d="M7.875 1.5C6.839 1.5 6 2.34 6 3.375v2.99c-.426.053-.851.11-1.274.174-1.454.218-2.476 1.483-2.476 2.917v6.294a3 3 0 003 3h.27l-.155 1.705A1.875 1.875 0 007.232 22.5h9.536a1.875 1.875 0 001.867-2.045l-.155-1.705h.27a3 3 0 003-3V9.456c0-1.434-1.022-2.7-2.476-2.917A48.716 48.716 0 0018 6.366V3.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM16.5 6.205v-2.83A.375.375 0 0016.125 3h-8.25a.375.375 0 00-.375.375v2.83a49.353 49.353 0 019 0zm-.217 8.265c.178.018.317.16.333.337l.526 5.784a.375.375 0 01-.374.409H7.232a.375.375 0 01-.374-.409l.526-5.784a.373.373 0 01.333-.337 41.741 41.741 0 018.566 0zm.967-3.97a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H18a.75.75 0 01-.75-.75V10.5zM15 9.75a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V10.5a.75.75 0 00-.75-.75H15z" clip-rule="evenodd" />
            </svg>
          </p>
          <p onclick="openPopupInviteDelete('.$row['invite_id'].')" class="hover:text-red-500 duration-150 transition-all cursor-pointer flex-none ml-6">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
            </svg>
          </p>
        </div>
      </li>
      ';
        }
      ?>
    </ol>
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

 <section id="popupTeamsDeleteBg" class="fixed z-[50] h-0 opacity-0 top-0 left-0 w-full h-full bg-[#0000009e] transition-opacity duration-300"></section>
  <section id="popupTeamsDelete" onclick="popupInviteDelete()" class="z-[70] fixed scale-0 top-0 left-0 w-full h-full">
    <div class="flex items-center justify-center w-full h-full px-2">
      <div onclick="event.cancelBubble=true;" id="popupInviteDeleteOutput">
        
      </div>
    </div>
  </section>
  <script>
    function printTemplate(code, role, school) {
  const template = `
    <!DOCTYPE html>
    <html>
      <head>
        <title>EduKorepetycje - portal ułatwiający naukę w oświacie</title>
        <link rel="icon" type="image/x-icon" href="public/img/logo.png">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
      </head>
      <body>
        <div class="py-4 w-full flex items-center justify-between border-t border-b border-white/30 my-2 px-4">
          <div class="flex flex-row w-full items-center gap-4 text-gray-900 capitalize leading-3">
            <p class="font-bold">
              ${code}<span class="text-xs font-medium lowercase"> - edukorepetycje.rgbpc.pl/register</span>
              <br>
              <span class="text-xs text-gray-500 font-normal">${school}</span>
            </p>
          </div>
          <p style="white-space: nowrap;" class="capitalize px-2 text-xs ">${role}</p>
        </div>
      </body>
    </html>`;



  const printWindow = window.open('', '_blank');
  printWindow.document.write(template);
  printWindow.document.close();
  printWindow.onload = function() {
    printWindow.print();
    printWindow.close();
  };
}

  </script>

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
        const url = "components/panel/invite/add_popup.php?";
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
        const url = "components/panel/invite/delete_popup.php?id="+id;
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