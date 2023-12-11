<?php
include '../../../scripts/security.php';
?>
<form action="scripts/invite/add.php" method="POST" class="text-white flex flex-col h-full gap-4 px-2 pb-8" enctype="multipart/form-data">
    <div class="sticky z-[10] top-0 bg-[#0e0e0e] flex flex-row items-center justify-between sm:px-0 px-4 border-b border-white/10">
      <h1 class="font-medium py-6">
        Dodaj kod zaproszenia
      </h1>
      <div class="text-center flex items-center">
            <button class="flex items-center rounded-md text-green-500 hover:text-green-700 px-4 duration-150 focus:outline-none focus:ring-2 theme-ring-focus focus:ring-offset-2">
              <span class="text-xs uppercase">Zapisz</span>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
              </svg>
            </button>
            <button onclick="popupInviteCloseConfirm()" type="button" class="rounded-md text-gray-300 hover:text-gray-500 hover:rotate-90 duration-150 focus:outline-none focus:ring-2 theme-ring-focus focus:ring-offset-2">
              <span class="sr-only">Zamknij</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
        </div>
    </div>
    <dl class="">
        <div class="grid md:grid-cols-6 gap-4">
            <div class="px-4 py-2 sm:px-0 md:col-span-4 grid grid-cols-8 gap-4">
                <div class="col-span-7">
                    <dt class="text-sm font-medium leading-6 text-gray-300">Kod zaproszenia</dt>
                    <input id="code" name="code" required type="text" value="" placeholder="Maksymalnie 20 znaków" class="w-full text-gray-400 text-sm focus:text-white bg-[#0e0e0e] focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150"></input>
                </div>
                <button onclick="generateRandomCode()" type="button" class="border border-white/10 mt-4 rounded-xl flex items-center justify-center text-gray-500 theme-bg-hover transition-all duration-150 hover:text-[#0e0e0e]">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M4.755 10.059a7.5 7.5 0 0112.548-3.364l1.903 1.903h-3.183a.75.75 0 100 1.5h4.992a.75.75 0 00.75-.75V4.356a.75.75 0 00-1.5 0v3.18l-1.9-1.9A9 9 0 003.306 9.67a.75.75 0 101.45.388zm15.408 3.352a.75.75 0 00-.919.53 7.5 7.5 0 01-12.548 3.364l-1.902-1.903h3.183a.75.75 0 000-1.5H2.984a.75.75 0 00-.75.75v4.992a.75.75 0 001.5 0v-3.18l1.9 1.9a9 9 0 0015.059-4.035.75.75 0 00-.53-.918z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            
            <div class="px-4 py-2 sm:px-0 md:col-span-2">
              <dt class="text-sm font-medium leading-6 text-gray-300">Liczba użyć</dt>
              <input name="max_uses" required type="number" value="" min="1" class="w-full text-gray-400 text-sm focus:text-white bg-[#0e0e0e] focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150"></input>
            </div>
        </div>
        <div class="col-span-5">
          <div class="grid md:grid-cols-6 gap-4">
            <div class="px-4 py-2 sm:px-0 md:col-span-4">
              <dt class="text-sm font-medium leading-6 text-gray-300">Szkoła</dt>
              <select name="" disabled class="mt-1 outline-none duration-150 capitalize relative w-full cursor-default rounded-md bg-[#0e0e0e] focus:text-white py-1.5 pl-3 pr-10 text-left text-gray-400 shadow-sm ring-1 ring-inset ring-[#3d3d3d] focus:outline-none focus:ring-2 theme-ring-focus sm:text-sm sm:leading-6" required>
                <?php
                          include "../../../scripts/database/conn_db.php";
                          $sql = "SELECT school_id FROM `users` where id=$_SESSION[login_id];";
                          $result = mysqli_query($conn, $sql);
                          $row = mysqli_fetch_assoc($result);
                          $school_id = $row['school_id'];
                          
                          $sql = "SELECT * FROM `schools` where school_id=$school_id;";
                          $result = mysqli_query($conn, $sql);
                          while($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="'.$row['school_id'].'" class="capitalize">'.$row['name'].'</option>';
                          }
                          ?>
                </select>
                <input type="hidden" name="school_id" value="<?=$school_id?>">
            </div>
            <div class="px-4 py-2 sm:px-0 md:col-span-2">
              <dt class="text-sm font-medium leading-6 text-gray-300">Rola</dt>
                <select name="role_id" class="mt-1 outline-none duration-150 capitalize relative w-full cursor-default rounded-md bg-[#0e0e0e] focus:text-white py-1.5 pl-3 pr-10 text-left text-gray-400 shadow-sm ring-1 ring-inset ring-[#3d3d3d] focus:outline-none focus:ring-2 theme-ring-focus sm:text-sm sm:leading-6" required>
                          <option value="" class="hidden" disabled selected>Wybierz</option>
                          <?php
                          $sql = "SELECT * FROM `user_roles` where id != 1;";
                          $result = mysqli_query($conn, $sql);
                          while($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="'.$row['id'].'" class="capitalize">'.$row['role'].'</option>';
                          }
                          ?>
                </select>
            </div>
          </div>          
        </div>
       </div>
    </dl>
</form>

<script>
    function generateRandomCode() {
    const length = 8;
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    let randomCode = '';

    for (let i = 0; i < length; i++) {
        const randomIndex = Math.floor(Math.random() * characters.length);
        randomCode += characters.charAt(randomIndex);
    }

    document.getElementById('code').value = randomCode;
    }
</script>

<section id="popupInviteCloseBg" class="fixed z-[50] h-0 opacity-0 top-0 left-0 w-full h-full bg-[#0000009e] transition-opacity duration-300"></section>
  <section id="popupInviteClose" onclick="popupInviteCloseConfirm()" class="z-[70] fixed scale-0 top-0 left-0 w-full h-full">
    <div class="flex items-center justify-center w-full h-full px-2">
      <div onclick="event.cancelBubble=true;" id="pupupFaqDeleteOutput">
        <div class="relative transform overflow-hidden rounded-lg bg-[#1c1c1c] px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
          <div class="absolute right-0 top-0 hidden pr-4 pt-4 sm:block">
            <button onclick="popupInviteCloseConfirm()" type="button" class="rounded-md text-gray-300 hover:text-gray-500 hover:rotate-90 duration-150 focus:outline-none focus:ring-2 theme-ring-focus focus:ring-offset-2">
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
            <button onclick="popupInviteOpenClose()" type="button" class="active:scale-95 duration-150 inline-flex w-full justify-center rounded-md bg-yellow-600 duration-150 px-3 py-2 text-sm font-medium text-white shadow-sm hover:bg-yellow-500 sm:ml-3 sm:w-auto">Nie zapisuj</button>
            <button onclick="popupInviteCloseConfirm()" type="button" class="active:scale-95 duration-150 mt-3 inline-flex w-full justify-center rounded-md px-3 py-2 text-sm font-medium text-gray-300 shadow-sm ring-inset ring-1 ring-[#3d3d3d] hover:bg-[#3d3d3d] duration-150 sm:mt-0 sm:w-auto">Zostań</button>
          </div>
        </div>
      </div>
    </div>
  </section>

    <script>
    function popupInviteCloseConfirm() {
        var popup = document.getElementById("popupInviteClose")
        var popupBg = document.getElementById("popupInviteCloseBg")
        popupBg.classList.toggle("opacity-0")
        popupBg.classList.toggle("h-0")
        popup.classList.toggle("scale-0")
        popup.classList.add("duration-200")
    }
</script>