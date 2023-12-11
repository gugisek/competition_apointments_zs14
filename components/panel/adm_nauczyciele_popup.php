<?php
include '../../scripts/security.php';
include '../../scripts/database/conn_db.php';
$id = $_GET['id'];
if($id!='add'){
    $sql = "SELECT users.id, users.name, users.sec_name, users.sur_name, users.mail, user_class.class_id, users.role_id, user_roles.role, users.status_id, users.description, users.school_id, schools.name as school, users.profile_picture, users.background_picture FROM `users` join schools on schools.school_id=users.school_id join user_roles on user_roles.id=users.role_id left join user_class on user_class.class_id=users.class_id WHERE users.id='$id'";
    $result = mysqli_query($conn, $sql);
    while ($row=mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['name'];
        $sur_name = $row['sur_name'];
        $sec_name = $row['sec_name'];
        $mail = $row['mail'];
        $about = $row['description'];
        $profile_picture = $row['profile_picture'];
        if($profile_picture == NULL){
            $profile_picture = 'default.png';
        }
        $background_picture = $row['background_picture'];
        if($background_picture == NULL){
            $background_picture = 'default_bg.avif';
        }
        $status_id = $row['status_id'];
        $role_id = $row['role_id'];
        $school_id = $row['school_id'];
        $school = $row['school'];
        $role = $row['role'];
        $class_id = $row['class_id'];
    }

}else{
    $id = 'add';
    $name = '';
    $sur_name = '';
    $sec_name = '';
    $mail = '';
    $about = '';
    $profile_picture = 'default.png';
    $background_picture = 'default_bg.avif';
    $status_id = '0';
    $role_id = '3';
    $sql = "SELECT school_id FROM `users` where id=$_SESSION[login_id];";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $school_id = $row['school_id'];
    $school = '';
    $role = '';
    $class_id = '0';
}
?>    
    <div class="flex items-center justify-center w-full h-full px-2">
      <div onclick="event.cancelBubble=true;" class="bg-[#0e0e0e] md:min-w-[800px] md:w-auto w-full max-w-[800px] max-h-[80vh] overflow-y-auto flex flex-col gap-4 rounded-2xl sm:px-6  -xl">
        <form action="scripts/users/save_user.php" method="POST" enctype="multipart/form-data" id="popupItself" class="flex h-auto w-full justify-between flex-col">
          <div class="sticky z-[10] top-0 bg-[#0e0e0e] flex flex-row items-center justify-between sm:px-0 px-4 border-b border-white/10">
            <h1 class="font-medium py-6 text-gray-300">
              <?php
              if($id=='add'){
                  echo 'Dodaj nauczyciela';
              }else if($id!='edit'){
                  echo 'Edytuj nauczyciela';
              }
              ?>
            </h1>
            <div class="text-center flex items-center">
                  <?php
                  if($id!='add'){
                      echo '
                    <button onclick="popupSchoolsDelete()" type="button" class="flex items-center rounded-md text-red-500 hover:text-red-700 gap-1 px-4 duration-150 focus:outline-none focus:ring-2 theme-ring-focus focus:ring-offset-2">
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
                  <button onclick="popupSchoolsCloseConfirm()" type="button" class="rounded-md text-gray-300 hover:text-gray-500 hover:rotate-90 duration-150 focus:outline-none focus:ring-2 theme-ring-focus focus:ring-offset-2">
                    <span class="sr-only">Zamknij</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
              </div>
          </div>
          <div>
            <div>
              <img id="popup_img_inptbg" class="h-32 w-full object-cover lg:h-48" src="public/img/users/<?=$background_picture?>" alt="">
            </div>
            <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
              <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
                <div class="flex">
                  <img id="popup_img_inptprofile" class="h-24 w-24 rounded-full ring-4 ring-[#1c1c1c] sm:h-32 sm:w-32 object-cover" src="public/img/users/<?=$profile_picture?>" alt="">
                </div>
                <div class="mt-6 sm:flex sm:min-w-0 sm:flex-1 sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                  <div class="mt-6 min-w-0 flex-1 sm:hidden md:block">
                    <h1 id="popup_name" class="truncate text-2xl font-semibold text-gray-300 capitalize"><?=$name?> <?=$sec_name?> <?=$sur_name?></h1>
                    <p class="text-gray-500 capitalize text-sm"><?=$school?></p>
                  </div>
                  <div class="justify-stretch mt-6 flex flex-col space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">
                    <span id="popup_status" class="inline-flex items-center rounded-full px-4 py-2 text-xs font-medium text-gray-500 capitalize"><?=$role?></span>
                  </div>
                </div>
              </div>
              <input type="hidden" name="id" value="<?=$id?>">
              <div class="mt-6 hidden min-w-0 flex-1 sm:block md:hidden">
                <h1 id="popup_name_2" class="truncate text-2xl font-bold text-gray-300"<?=$name?> <?=$sec_name?> <?=$sur_name?>></h1>
              </div>
              <!-- detail section -->
              <div class="flex gap-2 text-gray-500 text-xs mt-3">
                <input type="file" name="profile" id="fileToUploadprofile" onchange="imgPrev('profile')" class="hidden">
                <input type="file" name="bg" id="fileToUploadbg" onchange="imgPrev('bg')" class="hidden">
                <label for="fileToUploadprofile" class="theme-text-hover duration-150 cursor-pointer">Zmień profilowe</label>
                <label for="fileToUploadbg" class="theme-text-hover duration-150 cursor-pointer">Zmień tło</label>
              </div>
              <div class="overflow-hidden bg-[#0e0e0e] mt-4">
                
                <div class="border-t border-white/10 py-5">
                  <dl class="grid grid-cols-1">
                    <div class="grid md:grid-cols-3 grid-cols-1 w-full gap-4">
                      <div class="px-4 py-2 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-300">Imię</dt>
                        <input name="name" required type="text" value="<?=$name?>" class="capitalize w-full text-gray-400 text-sm focus:text-white bg-[#0e0e0e] focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150"></input>
                      </div>
                      <div class="px-4 py-2 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-300">Drugie imie</dt>
                        <input name="sec_name" type="text" value="<?=$sec_name?>" class="capitalize w-full text-gray-400 text-sm focus:text-white bg-[#0e0e0e] focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150"></input>
                      </div>
                      <div class="px-4 py-2 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-300">Nazwisko</dt>
                        <input name="sur_name" required type="text" value="<?=$sur_name?>" class="capitalize w-full text-gray-400 text-sm focus:text-white bg-[#0e0e0e] focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150"></input>
                      </div>
                    </div>
                    <div class="grid md:grid-cols-3 grid-cols-1 w-full gap-4">
                      <div class="px-4 py-2 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-300">Email</dt>
                        <input name="mail" required type="email" autocomplete="email" value="<?=$mail?>" class="w-full text-gray-400 text-sm focus:text-white bg-[#0e0e0e] focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150"></input>
                      </div>
                      <div class="px-4 py-2 sm:px-0 col-span-2">
                        <dt class="text-sm font-medium leading-6 text-gray-300">Opis</dt>
                        <input name="desc" type="text" value="<?=$about?>" class="capitalize w-full text-gray-400 text-sm focus:text-white bg-[#0e0e0e] focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150"></input>
                      </div>
                    </div>
                    <div class="grid md:grid-cols-2 grid-cols-1 w-full gap-4">
                      <div class="px-4 py-2 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-300">Rola</dt>
                        <input type="hidden" name="role_id" value="<?=$role_id?>">
                        <select name="role_id" disabled class="mt-1 outline-none duration-150 capitalize relative w-full cursor-default rounded-md bg-[#0e0e0e] focus:text-white py-1.5 pl-3 pr-10 text-left text-gray-400 shadow-sm ring-1 ring-inset ring-[#3d3d3d] focus:outline-none focus:ring-2 theme-ring-focus sm:text-sm sm:leading-6" required>
                          <option value="" class="hidden" disabled selected>Wybierz</option>
                          <?php
                          $sql = "SELECT * FROM `user_roles` where id!=1";
                          $result = mysqli_query($conn, $sql);
                          while($row = mysqli_fetch_assoc($result)) {
                            echo '<option ';
                            if($row['id'] == $role_id) {
                              echo 'selected ';
                            }
                            echo ' value="'.$row['id'].'" class="capitalize">'.$row['role'].'</option>';
                          }
                          ?>
                        </select>
                      </div>
                      <div class="px-4 py-2 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-300">Status</dt>
                        <select name="status_id" class="mt-1 outline-none duration-150 capitalize relative w-full cursor-default rounded-md bg-[#0e0e0e] focus:text-white py-1.5 pl-3 pr-10 text-left text-gray-400 shadow-sm ring-1 ring-inset ring-[#3d3d3d] focus:outline-none focus:ring-2 theme-ring-focus sm:text-sm sm:leading-6" required>
                          <option value="" class="hidden" disabled selected>Wybierz</option>
                          <?php
                          $sql = "SELECT * FROM `user_status`";
                          $result = mysqli_query($conn, $sql);
                          while($row = mysqli_fetch_assoc($result)) {
                            echo '<option ';
                            if($row['id'] == $status_id) {
                              echo 'selected ';
                            }
                            echo ' value="'.$row['id'].'" class="capitalize">'.$row['status'].'</option>';
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="grid md:grid-cols-3 gap-4">
                      <div class="px-4 py-2 sm:px-0 md:col-span-2">
                        <dt class="text-sm font-medium leading-6 text-gray-300">Szkoła</dt>
                        <input type="hidden" name="school_id" value="<?=$school_id?>">
                        <select name="school_id" disabled class="mt-1 outline-none duration-150 capitalize relative w-full cursor-default rounded-md bg-[#0e0e0e] focus:text-white py-1.5 pl-3 pr-10 text-left text-gray-400 shadow-sm ring-1 ring-inset ring-[#3d3d3d] focus:outline-none focus:ring-2 theme-ring-focus sm:text-sm sm:leading-6" required>
                          <option value="" class="hidden" disabled selected>Wybierz</option>
                          <?php
                          $sql = "SELECT * FROM `schools`";
                          $result = mysqli_query($conn, $sql);
                          while($row = mysqli_fetch_assoc($result)) {
                            echo '<option ';
                            if($row['school_id'] == $school_id) {
                              echo 'selected ';
                            }
                            echo ' value="'.$row['school_id'].'" class="capitalize">'.$row['name'].'</option>';
                          }
                          ?>
                        </select>
                      </div>
                      <div class="px-4 py-2 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-300">Klasa</dt>
                        <select name="class_id" class="mt-1 outline-none duration-150 capitalize relative w-full cursor-default rounded-md bg-[#0e0e0e] focus:text-white py-1.5 pl-3 pr-10 text-left text-gray-400 shadow-sm ring-1 ring-inset ring-[#3d3d3d] focus:outline-none focus:ring-2 theme-ring-focus sm:text-sm sm:leading-6" required>
                          <option value="0" selected class="capitalize">Brak</option>
                        </select>
                      </div>
                    </div>
                  </dl>
                  <?php
                    if($id=='add'){
                            echo '
                  <div class="grid md:grid-cols-2 gap-4 mt-2">
                    <div>
                      <dt class="text-sm font-medium leading-6 text-gray-300">Login</dt>
                      <input type="email" autocomplete="email" name="login" class="mt-1 outline-none duration-150 relative w-full cursor-default rounded-md bg-[#0e0e0e] focus:text-white py-1.5 pl-3 pr-10 text-left text-gray-400 shadow-sm ring-1 ring-inset ring-[#3d3d3d] focus:outline-none focus:ring-2 theme-ring-focus sm:text-sm sm:leading-6" required>
                    </div>
                    <div>
                      <dt class="text-sm font-medium leading-6 text-gray-300">Hasło</dt>
                      <input type="text" name="pswd" class="mt-1 outline-none duration-150 relative w-full cursor-default rounded-md bg-[#0e0e0e] focus:text-white py-1.5 pl-3 pr-10 text-left text-gray-400 shadow-sm ring-1 ring-inset ring-[#3d3d3d] focus:outline-none focus:ring-2 theme-ring-focus sm:text-sm sm:leading-6" required>
                    </div>
                  </div>
          ';
                    }
                  ?>
                </div>
              </div>
            
            </div>
          </div>
        </form>
        <?php
        if($id=='add'){
                 
        }else if($id!='edit'){
          echo '
          <form action="scripts/users/change_login.php" method="POST" class="px-4 sm:px-6 lg:px-8 border-t border-white/10 py-8">
                  <input type="hidden" name="id" value="<?=$id?>">
                  <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                      <h1 class="text-base font-semibold leading-6 text-gray-300">Logowanie</h1>
                      <p class="mt-2 text-sm text-gray-500">Zmienisz tu tylko login i/lub hasło. <br/>Musisz oddzielnie zapisać zmiany danych i logowania.</p>
                    </div>
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <button class="active:scale-95 duration-150 md:mt-0 mt-4 inline-flex items-center gap-x-2 rounded-md theme-bg theme-bg-hover px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 duration-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Zapisz dane logowania
                        </button>
                    </div>
                  </div>
                  <div class="grid md:grid-cols-2 gap-4 mt-6">
                    <div>
                      <dt class="text-sm font-medium leading-6 text-gray-300">Login</dt>
                      <input type="email" autocomplete="email" name="login" class="mt-1 outline-none duration-150 relative w-full cursor-default rounded-md bg-[#0e0e0e] focus:text-white py-1.5 pl-3 pr-10 text-left text-gray-400 shadow-sm ring-1 ring-inset ring-[#3d3d3d] focus:outline-none focus:ring-2 theme-ring-focus sm:text-sm sm:leading-6">
                    </div>
                    <div>
                      <dt class="text-sm font-medium leading-6 text-gray-300">Hasło</dt>
                      <input type="text" name="pswd" class="mt-1 outline-none duration-150 relative w-full cursor-default rounded-md bg-[#0e0e0e] focus:text-white py-1.5 pl-3 pr-10 text-left text-gray-400 shadow-sm ring-1 ring-inset ring-[#3d3d3d] focus:outline-none focus:ring-2 theme-ring-focus sm:text-sm sm:leading-6">
                    </div>
                  </div>
          </form>
          ';
        }
        ?>
      </div>
    </div>
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
              <h3 class="text-base font-semibold leading-6 text-gray-200" id="modal-title">Usuń użytkownika</h3>
              <div class="mt-2">
                <p class="text-sm text-gray-400">Czy na pewno chcesz usunąć tego użytkownika? Nie ma możliwości przywrócenia tych danych.</p>
              </div>
            </div>
          </div>
          <form action="scripts/users/delete.php" method="POST" class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
              <input type="hidden" name="id" value="<?=$id?>">
              <button class="active:scale-95 duration-150 inline-flex w-full justify-center rounded-md bg-red-600 duration-150 px-3 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Usuń</button>
              <button onclick="popupSchoolsDelete()" type="button" class="active:scale-95 duration-150 mt-3 inline-flex w-full justify-center rounded-md px-3 py-2 text-sm font-medium text-gray-300 shadow-sm ring-inset ring-1 ring-[#3d3d3d] hover:bg-[#3d3d3d] duration-150 sm:mt-0 sm:w-auto">Anuluj</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  
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
