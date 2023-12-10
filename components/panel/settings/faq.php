<?php
include "../../../scripts/security.php";
?>
<div class="divide-y divide-white/5" enctype="multipart/form-data">
    <div class="sm:px-6 lg:px-8 px-4">
        <div class="px-4 mb-6 sm:px-0 mt-6 flex md:flex-row flex-col justify-between items-center">
            <div>
                <h3 class="text-base font-semibold leading-7 text-white">Często zadawane pytania</h3>
                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-400">Dodaj lub usuń pytania i odpowiedzi wyświetlane na stronie głównej.</p>
            </div>
            <button type="button" onclick="openPopupFaqAdd()" class="md:mt-0 mt-4 inline-flex items-center gap-x-2 rounded-md theme-bg theme-bg-hover px-5 py-2.5 text-sm font-semibold text-white shadow-sm duration-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Dodaj pytanie
            </button>
        </div>
            <?php
            include "../../../scripts/database/conn_db.php";
            $sql = "SELECT * FROM faq";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                if(mb_strlen($row['answer'], "UTF-8")>250){
                    $row['answer'] = substr($row['answer'], 0, 250)."...";
                    
                }
                echo '<div onclick="openPopupFaq('.$row['id'].')" class=" border-t border-white/10 hover:bg-[#3d3d3d] cursor-pointer duration-150">
                <dl class="divide-y divide-white/10">
                <div class="px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm flex items-center font-medium leading-6 py-4 text-white">'.$row['question'].'</dt>
                    <dd class="flex items-center text-sm text-gray-400 md:mt-0 md:mb-0 mb-2 sm:col-span-2"><div>'.$row['answer'].'</div></dd>
                </div>
                </dl>
            </div>';
            }
            ?>
        </div>
    </div>
</div>
 <section id="popupFaqBg" class="fixed z-[50] h-0 opacity-0 top-0 left-0 w-full h-full bg-[#0000009e] transition-opacity duration-300"></section>
  <section id="popupFaq" onclick="popupFaqOpenClose()" class="z-[60] fixed scale-0 top-0 left-0 w-full h-full">
    <div class="flex items-center justify-center w-full h-full px-2">
      <div onclick="event.cancelBubble=true;" class="bg-[#0e0e0e] md:min-w-[800px] md:w-auto w-full max-w-[800px] max-h-[80vh] overflow-y-auto flex md:flex-row flex-col gap-4 rounded-2xl py-6 sm:px-6  -xl">
        <div id="popupItself" class="flex h-auto w-full justify-between flex-col">
          <div class="w-full flex justify-between items-center sm:hidden">
            <span>  </span>
              <a onclick="popupFaqOpenClose()" class="-mt-2 pb-3 flex items-center space-x-2 text-gray-500 hover:text-red-600 transition-all duration-500">
                  <p class="uppercase font-medium text-xs">zamknij</p>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                  </svg>
              </a>
          </div>                        
            <div id="pupupFaqOutput"></div>
        </div>
      </div>
    </div>
  </section>
<script>
    function popupFaqOpenClose() {
        var popup = document.getElementById("popupFaq")
        var popupBg = document.getElementById("popupFaqBg")
        popupBg.classList.toggle("opacity-0")
        popupBg.classList.toggle("h-0")
        popup.classList.toggle("scale-0")
        popup.classList.add("duration-200")
    }
    function openPopupFaqAdd() {
        var popupFaqOutput = document.getElementById("pupupFaqOutput");
        popupFaqOutput.innerHTML =  "<div class='flex justify-center items-center'><div class='flex flex-col justify-center items-center'><div class='animate-spin rounded-full h-32 w-32 border-t-2 border-b-2 border-gray-900'></div><div class='text-white text-xl font-semibold mt-4'>Ładowanie...</div></div>";
        popupFaqOpenClose();
        const url = "components/panel/settings/faq_popup.php?id=add&type=faq";
        fetch(url)
            .then(response => response.text())
            .then(data => {
            const parser = new DOMParser();
            const parsedDocument = parser.parseFromString(data, "text/html");

            // Wstaw zawartość strony (bez skryptów) do "panel_body"
            popupFaqOutput.innerHTML = parsedDocument.body.innerHTML;

            // Przechodź przez znalezione skrypty i wykonuj je
            const scripts = parsedDocument.querySelectorAll("script");
            scripts.forEach(script => {
                const scriptElement = document.createElement("script");
                scriptElement.textContent = script.textContent;
                document.body.appendChild(scriptElement);
            });
            });
    }
    function openPopupFaq(id){
        var popupFaqOutput = document.getElementById("pupupFaqOutput");
        popupFaqOutput.innerHTML =  "<div class='flex justify-center items-center'><div class='flex flex-col justify-center items-center'><div class='animate-spin rounded-full h-32 w-32 border-t-2 border-b-2 border-gray-900'></div><div class='text-white text-xl font-semibold mt-4'>Ładowanie...</div></div>";
        popupFaqOpenClose();
        const url = "components/panel/settings/faq_popup.php?id="+id+"&type=faq";
        fetch(url)
            .then(response => response.text())
            .then(data => {
            const parser = new DOMParser();
            const parsedDocument = parser.parseFromString(data, "text/html");

            // Wstaw zawartość strony (bez skryptów) do "panel_body"
            popupFaqOutput.innerHTML = parsedDocument.body.innerHTML;

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

