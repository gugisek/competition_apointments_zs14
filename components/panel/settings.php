<section data-aos="fade-right" data-aos-delay="100">
    <main>
      <header class=" border-b border-white/5">
        <!-- Secondary navigation -->
        <nav class="flex overflow-x-auto py-4">
          <ul role="list" class="flex min-w-full flex-none gap-x-6 px-4 text-sm font-semibold leading-6 text-gray-400 sm:px-6 lg:px-8">
            <li class="active:scale-95 duration-150">
              <a onclick="forOpenSettings('components/panel/settings/about.php')" id="about" class="cursor-pointer settingsnav-buttons theme-text-hover duration-150">Informacje o stronie</a>
            </li>
            <li class="active:scale-95 duration-150">
              <a onclick="forOpenSettings('components/panel/settings/log.php')" id="log" class="cursor-pointer settingsnav-buttons theme-text-hover duration-150">Historia zmian</a>
            </li>
            <li class="active:scale-95 duration-150">
              <a onclick="forOpenSettings('components/panel/settings/faq.php')" id="faq" class="cursor-pointer settingsnav-buttons theme-text-hover duration-150">Faq</a>
            </li>
            
          </ul>
        </nav>
      </header>

      <!-- Settings forms -->
      <div id="loading"></div>
      <div id="settings_main" class="divide-y divide-white/5">
        
      </div>
      <script>
  //skrypt otwiera podstrony panelu
function forOpenSettings(site) {
  var settings_main = document.getElementById("settings_main");
  var loading = document.getElementById("loading");
  loading.innerHTML =  "<div class='w-full flex items-center justify-center mb-[-319px] mt-[201px] z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-xl'><div class='lds-dual-ring'></div></div></div>";
  
  const url = site;
  fetch(url)
    .then(response => response.text())
    .then(data => {
      const parser = new DOMParser();
      const parsedDocument = parser.parseFromString(data, "text/html");

      // Wstaw zawartość strony (bez skryptów) do "panel_body"
      settings_main.innerHTML = parsedDocument.body.innerHTML;

      // Przechodź przez znalezione skrypty i wykonuj je
      const scripts = parsedDocument.querySelectorAll("script");
      scripts.forEach(script => {
        const scriptElement = document.createElement("script");
        scriptElement.textContent = script.textContent;
        document.body.appendChild(scriptElement);
      });

      // Zapisz URL w localStorage
      localStorage.setItem("settingsPage", site);
    });
    setTimeout(function(){ loading.innerHTML = ""; }, 50);
}

  var settingsnavButtons = document.querySelectorAll(".settingsnav-buttons");
    function settingsnavButtonsToggle() {
        for(var i = 0; i < settingsnavButtons.length; i++) {  
            settingsnavButtons[i].classList.remove("theme-text");
        }
    }
    for(var i = 0; i < settingsnavButtons.length; i++) {  
    settingsnavButtons[i].addEventListener("click", function() {
      settingsnavButtonsToggle();
      this.classList.add("theme-text");
    });
  }
  // skrypt otwiera zapamiętaną ostatnią podstronę panelu
  var settingsPage = localStorage.getItem("settingsPage");
  if (settingsPage == null) {
    forOpenSettings('components/panel/settings/about.php');
  } else {
    forOpenSettings(settingsPage);
   document.getElementById("about").classList.remove("theme-text");
   document.getElementById(settingsPage.replace("components/panel/settings/", "").replace(".php", "")).classList.add("theme-text");
  }
</script>
    </main>
</section>