<?php
include '../../../scripts/security.php';
include '../../../scripts/database/conn_db.php';
$user_id = $_GET['id'];
$korepetycje_id = $_GET['korepetycja'];
$sql = "select users.name, users.sur_name from users where users.id=".$user_id.";";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$sur_name = $row['sur_name'];
?>
        <div class="relative transform overflow-hidden rounded-lg bg-[#1c1c1c] px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
          <div class="absolute right-0 top-0 hidden pr-4 pt-4 sm:block">
            <button onclick="popupKickOpenClose()" type="button" class="rounded-md text-gray-300 hover:text-gray-500 hover:rotate-90 duration-150 focus:outline-none focus:ring-2 theme-ring-focus focus:ring-offset-2">
              <span class="sr-only">Zamknij</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
          <div class="sm:flex sm:items-start">
            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-[#3d3d3d] sm:mx-0 sm:h-10 sm:w-10">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
            </svg>


            </div>
            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
              <h3 class="text-base font-semibold leading-6 text-gray-200" id="modal-title">Przywróć <?=$name?> <?=$sur_name?> na korepetycję</h3>
              <div class="mt-2">
                <p class="text-sm text-gray-400">Czy na pewno chcesz przywrócić <?=$name?> <?=$sur_name?> na korepetycję?</p>
              </div>
            </div>
          </div>
          <form action="scripts/korepetycje/kick.php" method="POST" class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
              <input type="hidden" name="user_id" value="<?=$user_id?>">
              <input type="hidden" name="korepetycje_id" value="<?=$korepetycje_id?>">
              <input type="hidden" name="operation" value="un_kick">
              
              <button class="active:scale-95 duration-150 inline-flex w-full justify-center rounded-md bg-green-600 duration-150 px-3 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Przywróć</button>
              <button onclick="popupKickOpenClose()" type="button" class="active:scale-95 duration-150 mt-3 inline-flex w-full justify-center rounded-md px-3 py-2 text-sm font-medium text-gray-300 shadow-sm ring-inset ring-1 ring-[#3d3d3d] hover:bg-[#3d3d3d] duration-150 sm:mt-0 sm:w-auto">Anuluj</button>
          </form>
        </div>