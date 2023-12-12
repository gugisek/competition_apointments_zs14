<?php include 'scripts/security.php'; ?>
<!DOCTYPE html>
<html lang="pl">
    <?php include 'components/landing_page/header.php'; ?>
    <?php
        include "scripts/database/conn_db.php";
        $sql = "SELECT background_picture FROM users WHERE users.id = '$_SESSION[login_id]';";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $background_picture = $row['background_picture'];
        }
        if ($background_picture == "" || $background_picture == NULL) {
            $background_picture = "style='background-color:#0e0e0e; overflow-x: hidden;'";
            $bg_color = "";
        } else {
            $background_picture = "style='background-image:url(public/img/users/$background_picture);'";
            $bg_color = "bg-black/90";
        }
    ?>
    <body <?=$background_picture?> class="bg-cover bg-fixed bg-center bg-no-repeat">
        <div class="<?=$bg_color?> min-h-screen">
            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-50rem)]" aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-violet-800 to-red-800 opacity-20 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
            <?php include 'components/alert.php'; ?>
            <?php
            if( $_SESSION['account_status']==2){
                include 'components/panel/register.php';
            }
            ?>
            <?php include 'components/panel/hero.php'; ?>
        </div>
        <section id="popupProfileBg" class="fixed z-[50] h-0 opacity-0 top-0 left-0 w-full h-full bg-[#0000009e] transition-opacity duration-300"></section>
            <section id="popupProfile" onclick="popupProfileCloseConfirm()" class="z-[60] fixed scale-0 top-0 left-0 w-full h-full">
                <div class="flex items-center justify-center w-full h-full px-2">
                <div onclick="event.cancelBubble=true;" class="bg-[#0e0e0e] md:min-w-[800px] md:w-auto w-full max-w-[800px] max-h-[80vh] overflow-y-auto flex md:flex-row flex-col gap-4 rounded-2xl sm:px-6  -xl">
                    <div id="popupItself" class="flex h-auto w-full justify-between flex-col">
                        <div id="pupupProfileOutput"></div>
                    </div>
                </div>
                </div>
            </section>
            <script>
                function popupProfileOpenClose() {
                var popup = document.getElementById("popupProfile")
                var popupBg = document.getElementById("popupProfileBg")
                popupBg.classList.toggle("opacity-0")
                popupBg.classList.toggle("h-0")
                popup.classList.toggle("scale-0")
                popup.classList.add("duration-200")

                }
                function editMyProfile() {
                    var popupOutput = document.getElementById("pupupProfileOutput");
                    popupOutput.innerHTML = "<div class='w-full flex items-center justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-xl'><div class='lds-dual-ring'></div></div></div>";
                    popupProfileOpenClose();
                    const url = "components/panel/users/profile_popup.php?id=profile";
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
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
    </body>
</html>