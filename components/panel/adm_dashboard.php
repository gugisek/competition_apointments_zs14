<?php
include '../../scripts/security.php';
include '../../scripts/database/conn_db.php';
$login_id = $_SESSION['login_id'];
$sql = "SELECT school_id FROM `users` where users.id='$login_id';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$school_id = $row['school_id'];
$sql = 'select count(korepetycje_id) as "all" from korepetycje where school_id='.$school_id.' and year(data)=year(now());';
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$all = $row['all'];
$sql = "select count(korepetycje_id) as 'all_yours' from korepetycje where school_id=$school_id and month(data)=month(now()) and year(data)=year(now());";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$all_month = $row['all_yours'];
$sql = "select count(zapisy_korepetycje.zapis_id) as 'l_uczniow' from korepetycje JOIN zapisy_korepetycje on zapisy_korepetycje.korepetycja_id=korepetycje.korepetycje_id where month(data)=month(now()) and year(data)=year(now()) and school_id=$school_id;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$l_uczniow = $row['l_uczniow'];
//skrypt liczący uczniów na korepetycjach w każdym miesiącu w tym roku i wrzucający wynik do stringa 12 cyfrowego z przecinkami oddzielającymi miesiące nawet jeśli w danym miesiącu nie było żadnych korepetycji to wstawia 0
$sql = "SELECT count(zapisy_korepetycje.zapis_id) as 'uczniow', month(data) as 'miesiac' from korepetycje JOIN zapisy_korepetycje on zapisy_korepetycje.korepetycja_id=korepetycje.korepetycje_id where year(data)=year(now()) group by month(data);";
$result = mysqli_query($conn, $sql);
$uczniow = array();
for($i=1; $i<=12; $i++){
    $uczniow[$i] = 0;
}
while($row = mysqli_fetch_assoc($result)){
    $uczniow[$row['miesiac']] = $row['uczniow'];
}
$uczniow = implode(',', $uczniow);

$sql = "SELECT count(zapisy_korepetycje.zapis_id) as 'uczniow', month(data) as 'miesiac' from korepetycje JOIN zapisy_korepetycje on zapisy_korepetycje.korepetycja_id=korepetycje.korepetycje_id where year(data)=year(now()) and creator_id=$login_id group by month(data);";

$result = mysqli_query($conn, $sql);
$twoi_uczniowie = array();
for($i=1; $i<=12; $i++){
    $twoi_uczniowie[$i] = 0;
}
while($row = mysqli_fetch_assoc($result)){
    $twoi_uczniowie[$row['miesiac']] = $row['uczniow'];
}
$twoi_uczniowie = implode(',', $twoi_uczniowie);
?>
<section data-aos="fade-right" data-aos-delay="100" class="overflow-x-hidden">
    <div>
        <dl class="grid grid-cols-1 divide-y divide-white/5 border-b border-white/5 overflow-hidden shadow md:grid-cols-3 md:divide-x md:divide-y-0">
            <div data-aos="fade-up" data-aos-delay="300" class="px-4 py-5 sm:p-6">
            <dt class="text-base font-normal text-gray-300">Wszystkie korepetycje</dt>
            <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                <div class="flex items-baseline text-2xl font-semibold theme-text">
                <?=$all?>
                <span class="ml-2 text-sm font-medium text-gray-500">w tym roku</span>
                </div>
            </dd>
            </div>
            <div data-aos="fade-up" data-aos-delay="400" class="px-4 py-5 sm:p-6">
            <dt class="text-base font-normal text-gray-300">Wszystkie korepetycje</dt>
            <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                <div class="flex items-baseline text-2xl font-semibold theme-text">
                <?=$all_month?>
                <span class="ml-2 text-sm font-medium text-gray-500">w tym miesiącu</span>
                </div>

            </dd>
            </div>
            <div data-aos="fade-up" data-aos-delay="500" class="px-4 py-5 sm:p-6">
            <dt class="text-base font-normal text-gray-300">Uczniów na zajęciach</dt>
            <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                <div class="flex items-baseline text-2xl font-semibold theme-text">
                <?=$l_uczniow?>
                <span class="ml-2 text-sm font-medium text-gray-500">w tym miesiącu</span>
                </div>

            </dd>
            </div>
        </dl>
        </div>
        <div class="grid md:grid-cols-3 divide-y divide-white/5 md:divide-x md:divide-y-0 h-ful">
            <div class="md:col-span-3">
                <canvas class="p-4 " id="korepetycje" width="400" height="180"></canvas>
                <script>
                    var ctx = document.getElementById('korepetycje').getContext('2d');
                    var chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ['Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Pażdziernik', 'Listopad', 'Grudzień'],
                            datasets: [
                                {
                                    label: 'Uczniów na korepetycjach',
                                    backgroundColor: '#c179f0aa',
                                    borderColor: '#9233d1',
                                    data: [<?=$uczniow?>]
                                }, {
                                    label: 'Uczniowie na Twoich korepetycjach',
                                    backgroundColor: '#9d9d9d',
                                    borderColor: '#3d3d3d',
                                    data: [<?=$twoi_uczniowie?>]
                                }
                            ]
                        },
                        options: {
                            legend: {
                                display: false
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        stepSize: 500,
                                    }
                                }],
                                xAxes: [{
                                    gridLines: {
                                        display: false
                                    }
                                }]
                            }
                        }
                    });
                </script>
            </div>

        </div>

</section>
      <section id="popupInfoKorepetycjeBg" class="fixed z-[50] h-0 opacity-0 top-0 left-0 w-full h-full bg-[#0000009e] transition-opacity duration-300"></section>
  <section id="popupInfoKorepetycje" onclick="popupInfoKorepetycjeOpenClose()" class="z-[60] fixed scale-0 top-0 left-0 w-full h-full">
    <div class="flex items-center justify-center w-full h-full px-2">
      <div onclick="event.cancelBubble=true;" class="bg-[#0e0e0e] md:min-w-[800px] md:w-auto w-full max-w-[800px] max-h-[80vh] overflow-y-auto flex md:flex-row flex-col gap-4 rounded-2xl sm:px-6  -xl">
        <div id="popupItself" class="flex h-auto w-full justify-between flex-col">
            <div id="pupupInfoKorepetycjeOutput"></div>
        </div>
      </div>
    </div>
  </section>

<script>
  function popupInfoKorepetycjeOpenClose() {
       var popup = document.getElementById("popupInfoKorepetycje")
       var popupBg = document.getElementById("popupInfoKorepetycjeBg")
       popupBg.classList.toggle("opacity-0")
       popupBg.classList.toggle("h-0")
       popup.classList.toggle("scale-0")
       popup.classList.add("duration-200")

    }

  function popup_info_korepetycje(id){
        var popupOutput = document.getElementById("pupupInfoKorepetycjeOutput");
        popupOutput.innerHTML = "<div class='w-full flex items-center justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-xl'><div class='lds-dual-ring'></div></div></div>";
        popupInfoKorepetycjeOpenClose()
        const url = "components/panel/nau_korepetycje_popup_info.php?id="+id;
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