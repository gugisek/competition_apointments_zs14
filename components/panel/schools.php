<?php
include "../../scripts/security.php";
if($_SESSION['account_type'] != '1'){
    header('Location: ../../404.php');
    exit();
}
?>
<!-- drafty/ published czy coś i preview to łtwe będzie bo wystarczy dać publicyty_type i w publikach tylko publiki wyświetlać -->
<section data-aos="fade-right" data-aos-delay="100" class="sm:px-6 lg:px-8 px-4 pt-2">
    <div class="px-4 mb-6 sm:px-0 mt-6 flex md:flex-row flex-col justify-between items-center">
        <div>
            <h3 class="text-base font-semibold leading-7 text-white">Szkoły</h3>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-400">Dodawaj, edytuj i zarządzaj wszystkimi szkołami w serwisie.</p>
        </div>
        <button type="button" onclick="openPopupSchools('add')" class="active:scale-95 duration-150 md:mt-0 mt-4 inline-flex items-center gap-x-2 rounded-md theme-bg theme-bg-hover px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 duration-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Dodaj szkołę
        </button>
    </div>

    <ol class="mt-2 divide-y divide-white/10 text-sm leading-6 text-gray-500">
      <!-- <li class="py-4 sm:flex hover:bg-[#3d3d3d] duration-150 cursor-pointer">
        <p class="mt-2 flex-auto sm:mt-0 text-gray-300">Wielki Turniej CS:GO Szanajcy <span class="text-xs text-gray-500">Edycja pierwsza</span></p>
        <p class="flex-none sm:ml-6">1 grudnia 2023 - 2 luteń 2023</p>
      </li> -->
      <?php
      include "../../scripts/database/conn_db.php";
      $sql = "SELECT schools.school_id, schools.name, schools.logo, schools.addres, schools.city, count(users.id) as users_num from schools left join users on users.school_id=schools.school_id group by schools.school_id;";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)) {
        if($row['logo'] == "" || $row['logo'] == NULL) {
          $row['logo'] = "default.png";
        }
        $sql2 = "SELECT count(build_id) as buildings_num from buildings where school_id=".$row['school_id'].";";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $row['buildings_num'] = $row2['buildings_num']; 
        echo '<li class="w-full">
        <div onclick="openPopupSchools(`'.$row['school_id'].'`)" class="hover:bg-[#3d3d3d] duration-150 cursor-pointer py-4 w-full flex items-center justify-between">
          <div class="flex flex-row w-full items-center gap-4 text-gray-300 capitalize leading-3">
            <img src="public/img/schools/'.$row['logo'].'" class="w-10 h-10 rounded-full object-cover" alt="">
            <p>
              '.$row['name'].'
              <br>
              <span class="text-xs text-gray-500 capitalize">'.$row['addres'].' '.$row['city'].'</span>
            </p>
          </div>
          <p class="flex items-center justify-center gap-2">
            <span class="text-xs text-gray-500">'.$row['users_num'].'</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
              <path d="M10 9a3 3 0 100-6 3 3 0 000 6zM6 8a2 2 0 11-4 0 2 2 0 014 0zM1.49 15.326a.78.78 0 01-.358-.442 3 3 0 014.308-3.516 6.484 6.484 0 00-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 01-2.07-.655zM16.44 15.98a4.97 4.97 0 002.07-.654.78.78 0 00.357-.442 3 3 0 00-4.308-3.517 6.484 6.484 0 011.907 3.96 2.32 2.32 0 01-.026.654zM18 8a2 2 0 11-4 0 2 2 0 014 0zM5.304 16.19a.844.844 0 01-.277-.71 5 5 0 019.947 0 .843.843 0 01-.277.71A6.975 6.975 0 0110 18a6.974 6.974 0 01-4.696-1.81z" />
            </svg>
            <a class="flex items-center gap-1">
              <span class="text-xs text-gray-500">'.$row['buildings_num'].'</span>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
              </svg>
            </a>

          </p>
          <p class="flex-none sm:ml-6">
          </p>
        </div>
      </li>
      ';
        }
      ?>
    </ol>
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
        const url = "components/panel/schools/schools_popup.php?id="+id;
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