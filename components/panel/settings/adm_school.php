<?php
include "../../../scripts/security.php";
include "../../../scripts/database/conn_db.php";

if($_SESSION['account_type'] != '2'){
    header('Location: ../../404.php');
    exit();
}

$sql = "SELECT school_id FROM `users` where id=$_SESSION[login_id];";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$id = $row['school_id'];


  $sql = "SELECT schools.school_id, schools.name, schools.logo, schools.addres, schools.city, count(buildings.build_id) as buildings_num FROM schools left join buildings on buildings.school_id=schools.school_id WHERE schools.school_id=$id group by schools.school_id;";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0)
  {
    while($row = mysqli_fetch_assoc($result))
    {
      $name = $row['name'];
      $adres = $row['addres'];
      $city = $row['city'];
      $quantity = $row['buildings_num'];
      if($row['logo'] == "" || $row['logo'] == NULL) {
        $logo = 'default.png';
      }else {
        $logo = $row['logo'];
      }
    }
  }

?>
<form action="scripts/schools/back_schools.php" method="POST" class="sm:px-6 lg:px-8 text-white flex flex-col h-full gap-4 px-4 pb-8" enctype="multipart/form-data">
    <input type="hidden" name="school_id" value="<?=$id?>">
    <div class="sticky z-[10] top-0 flex flex-row items-center justify-between sm:px-0 px-4 border-b border-white/10">
      <h1 class="font-medium py-6">
        Edytuj szkołę
      </h1>
      <div class="text-center flex items-center">
            <button class="flex items-center rounded-md text-green-500 hover:text-green-700 px-4 duration-150 focus:outline-none focus:ring-2 theme-ring-focus focus:ring-offset-2">
              <span class="text-xs uppercase">Zapisz</span>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
              </svg>
            </button>
        </div>
    </div>
    <dl class="">
       <div class="grid grid-cols-8 gap-8">
        <div class="col-span-3 h-full flex flex-col justify-center items-center">
          <img id="popup_img_inptSchoolProfile" class="object-cover object-center rounded-xl aspect-square max-w-[90%]" src="public/img/schools/<?=$logo?>" alt="">
          <div class="flex items-center justify-between w-full">
            <label for="fileToUploadSchoolProfile" class="cursor-pointer text-xs theme-text-hover text-gray-500 py-2 duration-150">Zmień zdjęcie</label>
            <p class="text-xs text-gray-500">5MB - PNG, JPG, GIF</p>
          </div>
          <input onchange="imgPrev('SchoolProfile')" class="hidden" type="file" id="fileToUploadSchoolProfile" name="team_profile_img">
        </div>
        <div class="col-span-5">
          <div class="grid grid-cols-5 gap-4">
            <div class="px-4 py-2 sm:px-0 col-span-3">
              <dt class="text-sm font-medium leading-6 text-gray-300">Nazwa szkoły</dt>
              <input name="name" required type="text" value="<?=$name?>" class="capitalize w-full text-gray-400 text-sm focus:text-white bg-black/10 focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150"></input>
            </div>
            <div class="px-4 py-2 sm:px-0 col-span-2">
              <dt class="text-sm font-medium leading-6 text-gray-300">Ilość budynków</dt>
              <input onchange="buildings()" min="1" name="buildings_cuantity" id="buildings_cuantity" required type="number" value="<?=$quantity?>" class="capitalize w-full text-gray-400 text-sm focus:text-white bg-black/10 focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150"></input>
            </div>
          </div>
          <div class="px-4 py-2 sm:px-0 col-span-3">
              <dt class="text-sm font-medium leading-6 text-gray-300">Adres</dt>
              <input name="addres" required type="text" value="<?=$adres?>" class="capitalize w-full text-gray-400 text-sm focus:text-white bg-black/10 focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150"></input>
          </div>
          <div class="px-4 py-2 sm:px-0 col-span-3">
              <dt class="text-sm font-medium leading-6 text-gray-300">Miasto</dt>
              <input name="city" required type="text" value="<?=$city?>" class="capitalize w-full text-gray-400 text-sm focus:text-white bg-black/10 focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150"></input>
          </div>
          
        </div>
       </div>
       <div class="w-full" id="body_builds"></div>
    </dl>
</form>

<section id="popupTeamsCloseBg" class="fixed z-[50] h-0 opacity-0 top-0 left-0 w-full h-full bg-[#0000009e] transition-opacity duration-300"></section>
  <section id="popupTeamsClose" onclick="popupSchoolsCloseConfirm()" class="z-[70] fixed scale-0 top-0 left-0 w-full h-full">
    <div class="flex items-center justify-center w-full h-full px-2">
      <div onclick="event.cancelBubble=true;" id="pupupFaqDeleteOutput">
        <div class="relative transform overflow-hidden rounded-lg bg-[#1c1c1c] px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
          <div class="absolute right-0 top-0 hidden pr-4 pt-4 sm:block">
            <button onclick="popupSchoolsCloseConfirm()" type="button" class="rounded-md text-gray-300 hover:text-gray-500 hover:rotate-90 duration-150 focus:outline-none focus:ring-2 theme-ring-focus focus:ring-offset-2">
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
            <button onclick="popupSchoolsOpenClose()" type="button" class="active:scale-95 duration-150 inline-flex w-full justify-center rounded-md bg-yellow-600 duration-150 px-3 py-2 text-sm font-medium text-white shadow-sm hover:bg-yellow-500 sm:ml-3 sm:w-auto">Nie zapisuj</button>
            <button onclick="popupSchoolsCloseConfirm()" type="button" class="active:scale-95 duration-150 mt-3 inline-flex w-full justify-center rounded-md px-3 py-2 text-sm font-medium text-gray-300 shadow-sm ring-inset ring-1 ring-[#3d3d3d] hover:bg-[#3d3d3d] duration-150 sm:mt-0 sm:w-auto">Zostań</button>
          </div>
        </div>
      </div>
    </div>
  </section>

<section id="popupTeamsDeleteBg" class="fixed z-[50] h-0 opacity-0 top-0 left-0 w-full h-full bg-[#0000009e] transition-opacity duration-300"></section>
  <section id="popupTeamsDelete" onclick="popupSchoolsDelete()" class="z-[70] fixed scale-0 top-0 left-0 w-full h-full">
    <div class="flex items-center justify-center w-full h-full px-2">
      <div onclick="event.cancelBubble=true;" id="pupupFaqDeleteOutput">
        <div class="relative transform overflow-hidden rounded-lg bg-[#1c1c1c] px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
          <div class="absolute right-0 top-0 hidden pr-4 pt-4 sm:block">
            <button onclick="popupSchoolsDelete()" type="button" class="rounded-md text-gray-300 hover:text-gray-500 hover:rotate-90 duration-150 focus:outline-none focus:ring-2 theme-ring-focus focus:ring-offset-2">
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
              <h3 class="text-base font-semibold leading-6 text-gray-200" id="modal-title">Usuń szkołę</h3>
              <div class="mt-2">
                <p class="text-sm text-gray-400">Czy na pewno chcesz usunąć tą szkołę? Nie ma możliwości przywrócenia tych danych.</p>
              </div>
            </div>
          </div>
          <form action="scripts/schools/delete_schools.php?id=<?=$id?>" method="POST" class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
            <button class="active:scale-95 duration-150 inline-flex w-full justify-center rounded-md bg-red-600 duration-150 px-3 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Usuń</button>
            <button onclick="popupSchoolsDelete()" type="button" class="active:scale-95 duration-150 mt-3 inline-flex w-full justify-center rounded-md px-3 py-2 text-sm font-medium text-gray-300 shadow-sm ring-inset ring-1 ring-[#3d3d3d] hover:bg-[#3d3d3d] duration-150 sm:mt-0 sm:w-auto">Anuluj</button>
          </form>
        </div>
      </div>
    </div>
  </section>

<script>
    buildings();
  function buildings(){
    const event_id = document.getElementById("buildings_cuantity").value;
    if (event_id == "") {
      document.getElementById("body_builds").innerHTML = "";
      return;
    } else {
      const url = "components/panel/schools/buildings.php?quantity="+event_id+"&school_id=<?=$id?>";
      fetch(url)
        .then(response => response.text())
        .then(data => {
          const parser = new DOMParser();
          const parsedDocument = parser.parseFromString(data, "text/html");

          // Wstaw zawartość strony (bez skryptów) do "panel_body"
          document.getElementById("body_builds").innerHTML = parsedDocument.body.innerHTML;

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

<script>
    function imgPrev(type) {
        const file = document.getElementById(`fileToUpload${type}`).files[0];
        const reader = new FileReader();
        reader.onloadend = function() {
            //ustawienie dla wszystkich img o id popup_img_inpt src
            for (let i = 0; i < document.querySelectorAll(`#popup_img_inpt${type}`).length; i++) {
                document.querySelectorAll(`#popup_img_inpt${type}`)[i].src = reader.result;
            }
        }
        if (file) {
            reader.readAsDataURL(file);
        } else {
            document.getElementById(`popup_img_inpt${type}`).src = "";
        }
    }
</script>

<script>
    function popupSchoolsCloseConfirm() {
        var popup = document.getElementById("popupTeamsClose")
        var popupBg = document.getElementById("popupTeamsCloseBg")
        popupBg.classList.toggle("opacity-0")
        popupBg.classList.toggle("h-0")
        popup.classList.toggle("scale-0")
        popup.classList.add("duration-200")
    }
</script>
<script>
    function popupSchoolsDelete() {
        var popup = document.getElementById("popupTeamsDelete")
        var popupBg = document.getElementById("popupTeamsDeleteBg")
        popupBg.classList.toggle("opacity-0")
        popupBg.classList.toggle("h-0")
        popup.classList.toggle("scale-0")
        popup.classList.add("duration-200")
    }
</script>
