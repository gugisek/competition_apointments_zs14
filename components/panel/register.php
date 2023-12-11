<?php
include 'scripts/database/conn_db.php';
$user_id = $_SESSION['login_id'];
$sql = "SELECT schools.school_id, schools.name, user_roles.role, users.role_id FROM `users` JOIN schools on schools.school_id=users.school_id JOIN user_roles on user_roles.id=users.role_id where users.id = $user_id;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$school_id = $row['school_id'];
$role_id = $row['role_id'];
$role = $row['role'];
$school = $row['name'];
?>
<section data-aos="fade-in" data-aos-delay="300" class="fixed z-[90] top-0 left-0 w-full h-full bg-[#0000009e] transition-opacity duration-300"></section>
  <section class="z-[100] fixed top-0 left-0 w-full h-full">
    <div class="flex items-center justify-center w-full h-full px-2">
      <div onclick="event.cancelBubble=true;" id="pupupFaqDeleteOutput">
        <form data-aos="fade-up" data-aos-delay="400" action="scripts/login/register_rest.php" method="POST" class="bg-[#0e0e0e] md:min-w-[800px] md:w-auto w-full max-w-[800px] max-h-[80vh] overflow-y-auto flex flex-col gap-4 rounded-2xl sm:px-8 px-4  -xl py-6">
          <input type="hidden" name="school_id" value="<?=$school_id?>">
          <input type="hidden" name="role_id" value="<?=$role_id?>">
          <div class="sm:flex sm:items-start">
            <div class="mt-3 text-center sm:mt-0 sm:text-left">
              <h3 class="text-base font-semibold leading-6 text-gray-200" id="modal-title">Zweryfikuj konto</h3>
              <div class="mt-2">
                <p class="text-sm text-gray-400">Musisz zweryfikować konto i podać więcej danych, aby kożystać z portalu.</p>
              </div>
            </div>
          </div>
          <div class="px-4 sm:px-6 lg:px-8 border-t border-white/10 pt-8">
                  <input type="hidden" name="id" value="<?=$id?>">
                  <div class="grid md:grid-cols-5 gap-4">
                    <div class="md:col-span-2">
                      <dt class="text-sm font-medium leading-6 text-gray-300">Imię</dt>
                      <input required type="text" name="name" class="capitalize mt-1 outline-none duration-150 relative w-full cursor-default rounded-md bg-[#0e0e0e] focus:text-white py-1.5 pl-3 pr-10 text-left text-gray-400 shadow-sm ring-1 ring-inset ring-[#3d3d3d] focus:outline-none focus:ring-2 theme-ring-focus sm:text-sm sm:leading-6">
                    </div>
                    <div class="md:col-span-2">
                      <dt class="text-sm font-medium leading-6 text-gray-300">Nazwisko</dt>
                      <input required type="text" name="sur_name" class="capitalize mt-1 outline-none duration-150 relative w-full cursor-default rounded-md bg-[#0e0e0e] focus:text-white py-1.5 pl-3 pr-10 text-left text-gray-400 shadow-sm ring-1 ring-inset ring-[#3d3d3d] focus:outline-none focus:ring-2 theme-ring-focus sm:text-sm sm:leading-6">
                    </div>
                    <div class="">
                      <dt class="text-sm font-medium leading-6 text-gray-300">Klasa</dt>
                      <select name="class_id" class="mt-1 outline-none duration-150 capitalize relative w-full cursor-default rounded-md bg-[#0e0e0e] focus:text-white py-1.5 pl-3 pr-10 text-left text-gray-400 shadow-sm ring-1 ring-inset ring-[#3d3d3d] focus:outline-none focus:ring-2 theme-ring-focus sm:text-sm sm:leading-6" required>
                          <option value="" class="hidden" disabled selected>Wybierz</option>
                          <option class="<?php if($role_id==4){echo 'hidden';}?>" value="0">Brak</option>
                          <?php
                          $sql = "SELECT class_id, user_class.name FROM `user_class`;";
                          $result = mysqli_query($conn, $sql);
                          while($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="'.$row['class_id'].'" class="capitalize">'.$row['name'].'</option>';
                          }
                          ?>
                        </select>
                    </div>
                  </div>
                  <div>
                      <dt class="text-sm font-medium leading-6 text-gray-300 mt-4">Kod zaproszenia dla: <span class="capitalize"><?=$role?> - <?=$school?></span></dt>
                      <input required type="text" name="code" class="mt-1 outline-none duration-150 relative w-full cursor-default rounded-md bg-[#0e0e0e] focus:text-white py-1.5 pl-3 pr-10 text-left text-gray-400 shadow-sm ring-1 ring-inset ring-[#3d3d3d] focus:outline-none focus:ring-2 theme-ring-focus sm:text-sm sm:leading-6">
                    </div>
          </div>
          <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
              <input type="hidden" name="id" value="<?=$id?>">
              <button class="active:scale-95 duration-150 inline-flex w-full justify-center rounded-md bg-green-600 duration-150 px-3 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Zapisz</button>
              <a href="scripts/logout.php" class="active:scale-95 duration-150 mt-3 inline-flex w-full justify-center rounded-md px-3 py-2 text-sm font-medium text-gray-300 shadow-sm ring-inset ring-1 ring-[#3d3d3d] hover:bg-[#3d3d3d] duration-150 sm:mt-0 sm:w-auto">Wyloguj się</a>
          </div>
        </form>
      </div>
    </div>
  </section>