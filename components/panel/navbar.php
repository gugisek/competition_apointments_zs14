<?php 
include 'scripts/database/conn_db.php';
$id = $_SESSION['login_id'];
$sql = "SELECT profile_picture FROM users where id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
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
            <?php if($_SESSION['account_type'] == 4){
              echo '
              <ul role="list" class="-mx-2 space-y-1">
                <li data-aos="fade-right" data-aos-delay="200">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="dashboard" onclick="forOpen(`components/panel/dashboard.php`)" class="active:scale-95 duration-150 sidenav-button-active sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                      Strona główna
                  </a>
                </li>
                <li data-aos="fade-right" data-aos-delay="300">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="korepetycje" onclick="forOpen(`components/panel/korepetycje.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                      Zapisz się na korepetycję
                  </a>
                </li>
                <li data-aos="fade-right" data-aos-delay="400" class="active:scale-95 duration-150">
                  <a id="settings" onclick="forOpen(`components/panel/settings.php`)" class="sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Ustawienia
                  </a>
                </li>
              </ul>';
            }elseif($_SESSION['account_type'] == 1){
              echo '
              <ul role="list" class="-mx-2 space-y-1">
                <li data-aos="fade-right" data-aos-delay="200">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="dashboard_admin" onclick="forOpen(`components/panel/dashboard_admin.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                      Strona główna
                  </a>
                </li>

                <li data-aos="fade-right" data-aos-delay="300">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="users" onclick="forOpen(`components/panel/users.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                      Użytkownicy
                  </a>
                </li>
                <li data-aos="fade-right" data-aos-delay="400">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="invite" onclick="forOpen(`components/panel/invite.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>
                      Zaproszenia
                  </a>
                </li>
                <li data-aos="fade-right" data-aos-delay="500">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="schools" onclick="forOpen(`components/panel/schools.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                    </svg>
                      Szkoły
                  </a>
                </li>
                <li data-aos="fade-right" data-aos-delay="600">
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
              echo '
              <ul role="list" class="-mx-2 space-y-1">
                <li data-aos="fade-right" data-aos-delay="200">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="dashboard_admin" onclick="forOpen(`components/panel/dashboard_admin.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                      Strona główna
                  </a>
                </li>

                <li data-aos="fade-right" data-aos-delay="300">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="users" onclick="forOpen(`components/panel/users.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                      Uczniowie
                  </a>
                </li>
                <li data-aos="fade-right" data-aos-delay="300">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="users" onclick="forOpen(`components/panel/users.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                      Nauczyciele
                  </a>
                </li>
                <li data-aos="fade-right" data-aos-delay="300">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="users" onclick="forOpen(`components/panel/users.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                      Klasy
                  </a>
                </li>
                <li data-aos="fade-right" data-aos-delay="300">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="users" onclick="forOpen(`components/panel/users.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                      Przedmioty
                  </a>
                </li>
                <li data-aos="fade-right" data-aos-delay="400">
                  <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                  <a id="invite" onclick="forOpen(`components/panel/invite.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>
                      Zaproszenia
                  </a>
                </li>
                <li data-aos="fade-right" data-aos-delay="600">
                  <a id="settings" onclick="forOpen(`components/panel/settings.php`)" class="active:scale-95 duration-150 sidenav-button text-gray-400 hover:bg-[#3d3d3d] hover:text-white duration-150 cursor-pointer group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Ustawienia
                  </a>
                </li>
              </ul>';
            }
            ?>
          </li>

          <li class="-mx-6 mt-auto flex items-center">

            <a href="#" class="w-[75%] flex items-center gap-x-4 px-6 py-3 text-sm font-medium leading-6 text-white  hover:bg-[#3d3d3d] duration-150 cursor-pointer">
              <img class="w-9 rounded-full bg-gray-800 object-cover aspect-square" src="<?=$profile_picture?>" alt="">
              <span class="sr-only">Your profile</span>
              <span aria-hidden="true" class="text-xs leading-3">
                <?php echo $_SESSION['user']?><br/>
                <span class="text-xs text-gray-500 font-normal capitalize"><?=$_SESSION['account_type_name']?></span>
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
