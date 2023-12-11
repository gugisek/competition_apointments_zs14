<?php
include "../../../scripts/security.php";
      include "../../../scripts/database/conn_db.php";
      $sql = "SELECT school_id FROM `users` where id=$_SESSION[login_id];";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $school_id = $row['school_id'];
?>
<!-- drafty/ published czy coś i preview to łtwe będzie bo wystarczy dać publicyty_type i w publikach tylko publiki wyświetlać -->
<form method="POST" action="scripts/settings/nau_przedmioty_save.php" data-aos="fade-right" data-aos-delay="100" class="sm:px-6 lg:px-8 px-4 pt-2">
    <div class="px-4 mb-6 sm:px-0 mt-6 flex md:flex-row flex-col justify-between items-center">
        <div>
            <h3 class="text-base font-semibold leading-7 text-white">Twoje przedmioty</h3>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-400">Wybierz z jakich przedmiotów będziesz prowadził korepetycje.</p>
        </div>
        <button class="active:scale-95 duration-150 md:mt-0 mt-4 inline-flex items-center gap-x-2 rounded-md bg-green-600 hover:bg-green-400 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 duration-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
           Zapisz
        </button>
    </div>

    <ol class="mt-2 divide-y divide-white/10 text-sm leading-6 text-gray-500">
      <?php
      $sql2 = "select selected_przedmioty.przedmiot_id from selected_przedmioty where user_id=$_SESSION[login_id];";
      $result2 = mysqli_query($conn, $sql2);
      $sa = false;
      while($row2 = mysqli_fetch_assoc($result2)) {
        $selected_przedmioty[] = $row2['przedmiot_id'];
        $sa = true;
      }
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
          <p onclick="" class="hover:text-red-500 duration-150 transition-all cursor-pointer flex-none ml-6">
            <input name="selected_przedmioty[]" ';
            if($sa == true){
              if(in_array($row['przedmiot_id'], $selected_przedmioty)){
                echo 'checked';
              }
            }
            echo ' value="'.$row['przedmiot_id'].'" class="mt-1" type="checkbox">
          </p>
          </p>
        </div>
      </li>
      ';
        }
      ?>
    </ol>
  </form>