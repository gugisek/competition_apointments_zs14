
<?php
  include "scripts/database/conn_db.php";
  $sql = "SELECT background_picture FROM users WHERE users.id = '$_SESSION[login_id]';";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    $background_picture = $row['background_picture'];
  }
  if ($background_picture == "") {
    $background_picture = "style='background-color:#0e0e0e;'";
    $bg_color = "bg-[#0e0e0e]";
  } else {
    $background_picture = "style='background-image:url(public/img/users/$background_picture);'";
    $bg_color = "bg-black/90";
  }
?>


<!-- <div class="z-[-1]" style=" position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.9); pointer-events: none;"></div> -->
<div>
  <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
  <?php include 'components/panel/navbar_mobile.php'?>

  <!-- Static sidebar for desktop -->
  <div class="hidden xl:fixed xl:inset-y-0 xl:z-50 xl:flex xl:w-72 xl:flex-col">
    <!-- Sidebar component, swap this element with another sidebar if you like -->  
    <?php include 'components/panel/navbar.php'; ?>
  </div>

  <div class="xl:pl-72">
    <!-- Sticky search header -->
    <div <?=$background_picture?> class="xl:hidden sticky top-0 z-40 bg-cover bg-fixed bg-center bg-no-repeat">
      <div class="flex h-16 shrink-0 items-center gap-x-6 border-b border-white/5 <?=$bg_color?> px-4 shadow-sm sm:px-6 lg:px-8">
        <button id="nav_m_open_button" type="button" class="-m-2.5 p-2.5 text-white">
          <span class="sr-only">Open sidebar</span>
          <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10zm0 5.25a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
          </svg>
        </button>
      </div>
    </div>

    <div id="panel_body">
      
    </div>
  </div>
</div>

<script>
  var EventTempSettings = {};
  //skrypt otwiera podstrony panelu
function forOpen(site) {
  var panel_body = document.getElementById("panel_body");
  panel_body.innerHTML =  "<div data-aos='zoom-in' data-aos-delay='100' class='flex justify-center items-center h-[80vh]'><div class='flex flex-col justify-center items-center'><div class='animate-spin rounded-full h-32 w-32 border-t-2 border-b-2 border-gray-900'></div><div class='text-white text-xl font-semibold mt-4'>Ładowanie...</div></div>";
  const url = site;
  fetch(url)
    .then(response => response.text())
    .then(data => {
      const parser = new DOMParser();
      const parsedDocument = parser.parseFromString(data, "text/html");

      // Wstaw zawartość strony (bez skryptów) do "panel_body"
      panel_body.innerHTML = parsedDocument.body.innerHTML;

      // Przechodź przez znalezione skrypty i wykonuj je
      const scripts = parsedDocument.querySelectorAll("script");
      scripts.forEach(script => {
        const scriptElement = document.createElement("script");
        scriptElement.textContent = script.textContent;
        document.body.appendChild(scriptElement);
      });

      // Zapisz URL w localStorage
      localStorage.setItem("panelPage", site);
    });
}

  var sidenavButtons = document.querySelectorAll(".sidenav-button");
    function sidenavButtonsToggle() {
        for(var i = 0; i < sidenavButtons.length; i++) {  
            sidenavButtons[i].classList.remove("sidenav-button-active");
        }
    }
    for(var i = 0; i < sidenavButtons.length; i++) {  
    sidenavButtons[i].addEventListener("click", function() {
      sidenavButtonsToggle();
      this.classList.add("sidenav-button-active");
    });
  }
  // skrypt otwiera zapamiętaną ostatnią podstronę panelu
  var panelPage = localStorage.getItem("panelPage");
  if (panelPage == null) {
    forOpen('components/panel/dashboard.php');
  } else {
    
    forOpen(panelPage);
    var removeButtons = document.querySelectorAll("#dashboard");
    for (var i = 0; i < removeButtons.length; i++) {
      removeButtons[i].classList.remove("sidenav-button-active");
    }

    var activeButtons = document.querySelectorAll("#" + panelPage.replace("components/panel/", "").replace(".php", ""));
    for(var i = 0; i < activeButtons.length; i++) {  
      activeButtons[i].classList.add("sidenav-button-active");
    }
    
  }
</script>
 <script>
    const button = document.querySelector('#nav_m_close_button')
    const openButton = document.querySelector('#nav_m_open_button')
    const sidebar = document.querySelector('#sidenav_mobile')
    const backdrop = document.querySelector('#backdrop')

    function toggleNavMobile() {
      sidebar.classList.toggle('left-[-100%]')
      backdrop.classList.toggle('opacity-0')
      sidebar.classList.toggle('pointer-events-none')
      backdrop.classList.toggle('pointer-events-none')
    }
    button.addEventListener('click', () => {
      toggleNavMobile()
    })

    openButton.addEventListener('click', () => {
        toggleNavMobile()
    })
    </script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>