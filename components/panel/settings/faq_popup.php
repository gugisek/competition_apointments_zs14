<?php
$id = $_GET['id'];
$type = $_GET['type'];
if($id == "add"){
    $row['id'] = "add";
    $row['question'] = "";
    $row['answer'] = "";
}else{
    include "../../../scripts/conn_db.php";
    if ($type == "zapisy"){
        $sql = "SELECT * FROM zapisy where id=$id";
    }else{
        $sql = "SELECT * FROM faq where id=$id";
    }
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>
<form action="scripts/settings/edit_faq.php" method="POST" class="text-white flex flex-col h-full gap-4 pt-2 md:px-24 px-2">
    <input type="hidden" name="id" value="<?=$row['id']?>">
    <input type="hidden" name="type" value="<?=$type?>">
    <div class="flex flex-row gap-4 w-full">
        <div class="relative z-0 w-full">
            <input required type="text" id="question" name="question" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-[1px] border-gray-300 appearance-none text-gray-300 focus:text-white dark:border-gray-600 dark:focus:theme-border focus:outline-none focus:ring-0 theme-border-focus peer" value="<?=$row['question']?>" />
            <label for="question" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 theme-text-focus peer-focus:dark:text-[--text] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Pytanie</label>
        </div>
    </div>
        <div class="h-full max-h-[45vh] text-gray-400" id="editor-container-popup"><?=$row['answer']?></div>
        <input type="hidden" id="editorContent-faq" name="answer" value='<?=$row['answer']?>'>
    <div class="text-center">
            <?php
            if($id!='add'){
                echo '
                <button type="button" onclick="openPopupFaqDelete('.$row['id'].')" class="inline-flex items-center gap-x-2 rounded-md bg-red-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 duration-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Usnuń
            </button>
                ';
            }
            ?>
            <button type="button" onclick="popupFaqOpenClose()" class="mx-1 inline-flex items-center gap-x-2 rounded-md bg-gray-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 duration-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Anuluj
            </button>
            
            <button type="subbmit" class="inline-flex items-center gap-x-2 rounded-md bg-green-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 duration-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Zapisz
            </button>
        </div>
</form>

 <section id="popupFaqDeleteBg" class="fixed z-[50] h-0 opacity-0 top-0 left-0 w-full h-full bg-[#0000009e] transition-opacity duration-300"></section>
  <section id="popupFaqDelete" onclick="popupFaqDeleteOpenClose()" class="z-[70] fixed scale-0 top-0 left-0 w-full h-full">
    <div class="flex items-center justify-center w-full h-full px-2">
      <div onclick="event.cancelBubble=true;" id="pupupFaqDeleteOutput">
      </div>
    </div>
  </section>

<script>
  var quill = new Quill('#editor-container-popup', {
    theme: 'snow',
    placeholder: 'Tu wpisz treść...',
    modules: {
      toolbar: [
        [{ 'size': [ 'small', false, 'large', 'huge'] }],
        ['bold', 'italic', 'underline', 'strike'],  // Funkcje pogrubiania, kursywy, podkreślenia, przekreślenia
        // Dodaj niestandardową paletę kolorów
        ['link'],
        ['blockquote'],
        ['code'],
        [{ 'color': [false, 'var(--text)', '#ffffff', 'rgb(243 244 246)', 'rgb(229 231 235)', 'rgb(209 213 219)', 'rgb(156 163 175)', 'rgb(107 114 128)', 'rgb(75 85 99)', 'rgb(55 65 81)', 'rgb(31 41 55)', 'rgb(17 24 39)', 'rgb(3 7 18)', 'black'] }],
        // Inne opcje
        
      ],
    },
  });


  // Dodaj event listener do śledzenia zmian w treści
  quill.on('text-change', function(delta, oldDelta, source) {
    // Zaktualizuj ukryte pole lub wykonaj inne operacje po zmianie treści
    updateHiddenField();
  });

  // Funkcja aktualizująca ukryte pole
  function updateHiddenField() {
    var editorContent = document.getElementById('editorContent-faq');
    editorContent.value = quill.root.innerHTML;
  }
    function popupFaqDeleteOpenClose() {
        var popup = document.getElementById("popupFaqDelete")
        var popupBg = document.getElementById("popupFaqDeleteBg")
        popupBg.classList.toggle("opacity-0")
        popupBg.classList.toggle("h-0")
        popup.classList.toggle("scale-0")
        popup.classList.add("duration-200")
    }

    function openPopupFaqDelete(id) {
        var popupFaqDeleteOutput = document.getElementById("pupupFaqDeleteOutput");
        popupFaqDeleteOpenClose();
        const url = "components/panel/settings/faq_popup_delete.php?id="+id+"&type=<?=$type?>";
        fetch(url)
            .then(response => response.text())
            .then(data => {
            const parser = new DOMParser();
            const parsedDocument = parser.parseFromString(data, "text/html");

            // Wstaw zawartość strony (bez skryptów) do "panel_body"
            popupFaqDeleteOutput.innerHTML = parsedDocument.body.innerHTML;

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

