<?php 
include 'scripts/database/conn_db.php';
$id = $_SESSION['login_id'];
$sql = "SELECT profile_picture, user_class.name FROM users left join user_class on user_class.class_id = users.class_id where id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if($row['name'] == NULL){
  $name = '';
} else {
  $name = $row['name'];
}
if($row['profile_picture'] == NULL){
  $profile_picture = "public/img/users/default.png";
} else {
  $profile_picture = "public/img/users/" . $row['profile_picture'];
}
$sql = "SELECT value FROM informations WHERE informations.name = 'logo';";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
  $info[] = $row['value'];
}
// $sql = "SELECT COUNT(*) FROM events WHERE events.status_id = '1';";
// $result = $conn->query($sql);
// while ($row = $result->fetch_assoc()) {
//   $active_events = $row['COUNT(*)'];
// }
?>
<div class="flex grow flex-col gap-y-5 overflow-y-auto lg:bg-black/10 bg-[#0e0e0e] px-6 ring-1 ring-white/5">
      <div class="flex h-16 shrink-0 items-center">
        <a href="index.php" data-aos="fade-right" data-aos-delay="100"><img class="h-8 w-auto" src="public/img/logo_long.png" alt="logo"></a>
      </div>
      <nav class="flex flex-1 flex-col">
        <ul role="list" class="flex flex-1 flex-col gap-y-7">
          <li>
            <!-- do ustawień dla Pani Basi aby mogła sobie zaznaczyć jakich przemiotów uczy -->
            <?php if($_SESSION['account_type'] == 4){
              $sql = "SELECT count(zapis_id) FROM `zapisy_korepetycje` left join korepetycje on korepetycje.korepetycje_id=zapisy_korepetycje.korepetycja_id where users_id = $_SESSION[login_id] and zapisy_korepetycje.status_id=1 and korepetycje.data>=now();";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_array($result);
              $korepetycje = $row[0];
              // bolek aka uczeń
              echo '
              <ul role="list" class="-mx-2 space-y-1">
                <li onclick="mobileClose()" data-aos="fade-right" data-aos-delay="200">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="ucz_dashboard" onclick="forOpen(`components/panel/ucz_dashboard.php`)" class="dashboard active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                      Strona główna
                  </a>
                </li>
                <li onclick="mobileClose()" data-aos="fade-right" data-aos-delay="300">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="ucz_korepetycje" onclick="forOpen(`components/panel/ucz_korepetycje.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                      Korepetycje';
                      if($korepetycje > 0){
                        echo '<span class="ml-auto w-9 min-w-max whitespace-nowrap rounded-full bg-black/10 px-2.5 py-0.5 text-center text-xs font-medium leading-5 text-gray-500 border border-[#3d3d3d]" aria-hidden="true">'.$korepetycje.'</span>';
                      }
                  echo'</a>
                </li>
                <li onclick="mobileClose()" data-aos="fade-right" data-aos-delay="300">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="ucz_archiwum" onclick="forOpen(`components/panel/ucz_archiwum.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                    </svg>


                      Archiwum
                  </a>
                </li>
                <li onclick="mobileClose()" data-aos="fade-right" data-aos-delay="400" class="active:scale-95 duration-150">
                  <a id="ucz_settings" onclick="forOpen(`components/panel/ucz_settings.php`)" class="sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Ustawienia
                  </a>
                </li>
              </ul>';
            }elseif($_SESSION['account_type'] == 1){
              // administarator główny
              echo '
              <ul role="list" class="-mx-2 space-y-1">
                <li onclick="mobileClose()" data-aos="fade-right" data-aos-delay="200">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="dashboard_admin" onclick="forOpen(`components/panel/dashboard_admin.php`)" class="dashboard active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                      Strona główna
                  </a>
                </li>

                <li onclick="mobileClose()" data-aos="fade-right" data-aos-delay="300">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="users" onclick="forOpen(`components/panel/users.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                      Użytkownicy
                  </a>
                </li>
                <li onclick="mobileClose()" data-aos="fade-right" data-aos-delay="400">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="invite" onclick="forOpen(`components/panel/invite.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>
                      Zaproszenia
                  </a>
                </li>
                <li onclick="mobileClose()" data-aos="fade-right" data-aos-delay="500">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="schools" onclick="forOpen(`components/panel/schools.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                    </svg>
                      Szkoły
                  </a>
                </li>
                <li onclick="mobileClose()" data-aos="fade-right" data-aos-delay="600">
                  <a id="settings" onclick="forOpen(`components/panel/settings.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Ustawienia
                  </a>
                </li>
              </ul>';
            }elseif($_SESSION['account_type'] == 2){
              // administator szkolny
              echo '
              <ul role="list" class="-mx-2 space-y-1">
                <li onclick="mobileClose()" data-aos="fade-right" data-aos-delay="200">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="adm_dashboard" onclick="forOpen(`components/panel/adm_dashboard.php`)" class="dashboard active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                      Strona główna
                  </a>
                </li>

                <li onclick="mobileClose()" data-aos="fade-right" data-aos-delay="300">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="adm_uczniowie" onclick="forOpen(`components/panel/adm_uczniowie.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                      Uczniowie
                  </a>
                </li>
                <li onclick="mobileClose()" data-aos="fade-right" data-aos-delay="300">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="adm_nauczyciele" onclick="forOpen(`components/panel/adm_nauczyciele.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                    </svg>
                      Nauczyciele
                  </a>
                </li>
                <li onclick="mobileClose()" data-aos="fade-right" data-aos-delay="300">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="adm_klasy" onclick="forOpen(`components/panel/adm_klasy.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                    </svg>
                      Klasy
                  </a>
                </li>
                <li onclick="mobileClose()" data-aos="fade-right" data-aos-delay="300">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="adm_przedmioty" onclick="forOpen(`components/panel/adm_przedmioty.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                      Przedmioty
                  </a>
                </li>
                <li onclick="mobileClose()" data-aos="fade-right" data-aos-delay="300">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="adm_sale" onclick="forOpen(`components/panel/adm_sale.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                    </svg>
                      Sale lekcyjne
                  </a>
                </li>
                <li onclick="mobileClose()" data-aos="fade-right" data-aos-delay="400">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="adm_invite" onclick="forOpen(`components/panel/adm_invite.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>
                      Zaproszenia
                  </a>
                </li>
                <li onclick="mobileClose()" data-aos="fade-right" data-aos-delay="600">
                  <a id="adm_settings" onclick="forOpen(`components/panel/adm_settings.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Ustawienia
                  </a>
                </li>
              </ul>';
            }elseif($_SESSION['account_type'] == 3){
              $sql = "SELECT count(korepetycje_id) FROM `korepetycje` WHERE `creator_id` = '$_SESSION[login_id]' AND `status_id` = '1' and data >= NOW()";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_array($result);
              $korepetycje = $row[0];
              // nauczyciel
              echo '
              <ul role="list" class="-mx-2 space-y-1">
                <li onclick="mobileClose()" data-aos="fade-right" data-aos-delay="200">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="nau_dashboard" onclick="forOpen(`components/panel/nau_dashboard.php`)" class="dashboard active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                      Strona główna
                  </a>
                </li>

                <li onclick="mobileClose()" data-aos="fade-right" data-aos-delay="300">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="nau_korepetycje" onclick="forOpen(`components/panel/nau_korepetycje.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>

                      Korepetycje';
                      if($korepetycje > 0){
                        echo '<span class="ml-auto w-9 min-w-max whitespace-nowrap rounded-full bg-black/10 px-2.5 py-0.5 text-center text-xs font-medium leading-5 text-gray-500 border border-[#3d3d3d]" aria-hidden="true">'.$korepetycje.'</span>';
                      }
                  echo '</a>
                </li>
                <li onclick="mobileClose()" data-aos="fade-right" data-aos-delay="300">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="nau_archiwum" onclick="forOpen(`components/panel/nau_archiwum.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                    </svg>


                      Archiwum
                  </a>
                </li>
                <li onclick="mobileClose()" data-aos="fade-right" data-aos-delay="400">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="invite" onclick="openPopupAddKorepetycje()" class="active:scale-95 duration-150 text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                    </svg>
                      Utwórz korepetycję
                  </a>
                </li>
                <li onclick="mobileClose()" data-aos="fade-right" data-aos-delay="600">
                  <a id="nau_settings" onclick="forOpen(`components/panel/nau_settings.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Ustawienia
                  </a>
                </li>
              </ul>
              ';
            }
            ?>
          </li>

          <li class="-mx-6 mt-auto flex items-center">

            <a onmouseenter="profileInfo('navbar')" onmouseleave="profileInfo('navbar')" onclick="editMyProfile()" class="w-[75%] flex items-center gap-x-4 px-6 py-3 text-sm font-medium leading-6 text-white  hover:bg-[#3d3d3d] duration-150 cursor-pointer">
              <section id="hover_profile_info_navbar" class="w-[250px] pointer-events-none opacity-0 duration-500 transition-all fixed bottom-16">
                <?php
                $user_id = $_SESSION['login_id'];
                $sql = "SELECT concat(name,'',sur_name) as 'imie', mail, user_roles.role, users.description, profile_picture, background_picture FROM `users` join user_roles on user_roles.id=users.role_id WHERE users.id = '$user_id'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);

                $description_hover = $row['description'];
                $mail_hover = $row['mail'];

                if($row['background_picture'] == null){
                  $background_picture_hover = "class='bg-[#0e0e0e] rounded-xl shadow-xl'";
                }else{
                  $background_picture_hover = "style='background-image: url(public/img/users/".$row['background_picture']."); background-size: cover; background-position: center;' class='rounded-xl schadow-xl'";
                }
                ?>
                <div <?=$background_picture_hover?> class="">
                  <div class="bg-black/90 rounded-xl py-4 px-8">
                    <div class="flex items-center gap-4 justify-start">
                      <img class="w-12 rounded-full bg-gray-800 object-cover aspect-square" src="<?=$profile_picture?>" alt="">
                      <span aria-hidden="true" class="text-xs leading-3 capitalize">
                        <?php echo $_SESSION['user']?><br/>
                        <span class="text-xs text-gray-500 font-normal capitalize"><?=$_SESSION['account_type_name']?></span>
                      </span>
                    </div>
                    <hr class="my-2 border-white/5">
                    <div>
                      <div class="flex items-center gap-2 text-gray-500 ">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                          <path d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" />
                          <path d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" />
                        </svg>
                        <span class="text-xs font-normal"><?=$mail_hover?></span>
                      </div>
                    </div>
                    <hr class="my-2 border-white/5">
                    <div class="font-normal text-xs text-gray-400">
                      <?=$description_hover?>
                    </div>
                  </div>
                </div>
              </section>
              <img class="w-9 rounded-full bg-gray-800 object-cover aspect-square" src="<?=$profile_picture?>" alt="">
              <span class="sr-only">Your profile</span>
              <span aria-hidden="true" class="text-xs leading-3 capitalize">
                <?php echo $_SESSION['user']?><br/>
                <span class="text-xs text-gray-500 font-normal capitalize"><?=$_SESSION['account_type_name']?> <?=$name?></span>
              </span>
            </a>
            <a href="scripts/logout.php" class="w-[25%] h-full flex items-center justify-center gap-x-4 px-6 py-3 text-sm font-semibold leading-6 text-white  hover:bg-[#3d3d3d] duration-150 cursor-pointer">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
              </svg>
            </a>
          </li>
        </ul>
      </nav>
    </div>

 <script>
    function navpopupAddKorepetycjeOpenClose() {
       var popup = document.getElementById("navpopupAddKorepetycje")
        var popupBg = document.getElementById("navpopupAddKorepetycjeBg")
        popupBg.classList.toggle("opacity-0")
        popupBg.classList.toggle("h-0")
       popup.classList.toggle("scale-0")
       popup.classList.add("duration-200")

    }
    function navopenPopupAddKorepetycje() {
        var popupOutput = document.getElementById("navpupupAddKorepetycjeOutput");
        popupOutput.innerHTML = "<div class='w-full flex items-center justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-xl'><div class='lds-dual-ring'></div></div></div>";
        navpopupAddKorepetycjeOpenClose()
        const url = "components/panel/nau_korepetycje_popup_add.php";
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
      function profileInfo(where){
        const hover_profile_info = document.querySelectorAll('#hover_profile_info_'+where);
        for (var i = 0; i < hover_profile_info.length; i++) {
          hover_profile_info[i].classList.toggle('opacity-0');
          hover_profile_info[i].classList.toggle('opacity-100');
        }
      }
    </script>
