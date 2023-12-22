        <div class="px-4 py-2 sm:px-0 md:col-span-2">
        </div>
        <div data-aos="fade-right" data-aos-delay="200" class="px-4 py-2 sm:px-0 md:col-span-6">
            <fieldset>
                <legend class="sr-only">Server size</legend>
                <div class="space-y-4">
                    <?php
                    include "../../scripts/database/conn_db.php";
                    $nau_id = $_GET['nau_id'];
                    $przedmiot_id = $_GET['przedmiot_id'];
                    $sql = "SELECT korepetycje.korepetycje_id as 'id', przedmioty.name as 'przedmiot', concat(users.name, ' ', users.sur_name) as 'nauczyciel', users.profile_picture as 'profilowe', max_users, godzina, data, korepetycje_status.name as 'status', if(isnull(destiny), 'wszyscy', destiny) as 'dla', rooms.name as 'sala', buildings.street as 'budynek', count(zapisy_korepetycje.zapis_id) as 'uczniowie' from korepetycje join przedmioty on przedmioty.przedmiot_id=korepetycje.przedmiot_id join users on users.id=korepetycje.creator_id join korepetycje_status on korepetycje_status.status_id=korepetycje.status_id join rooms on rooms.room_id=korepetycje.room_id JOIN buildings on buildings.build_id=rooms.build_id left JOIN zapisy_korepetycje on zapisy_korepetycje.korepetycja_id=korepetycje.korepetycje_id where korepetycje.creator_id = '$nau_id' and korepetycje.przedmiot_id = '$przedmiot_id' and korepetycje.data >= CURDATE() group by korepetycje.korepetycje_id order by korepetycje.data asc, korepetycje.godzina asc;";
                    $result = mysqli_query($conn, $sql);
                    $is3 = false;
                    while($row = mysqli_fetch_assoc($result)) {
                        $is3 = true;
                         $data = $row['data'];
                            // Zamiana daty na obiekt DateTime
                            $dateTime = new DateTime($data);

                            // Ustalenie nazwy dnia tygodnia, dnia miesiąca i nazwy miesiąca
                            $dzienTygodnia = $dateTime->format('l'); // nazwa dnia tygodnia
                            $dzien = $dateTime->format('j'); // dzień miesiąca
                            $miesiac = $dateTime->format('F'); // nazwa miesiąca

                            // Tablice z polskimi nazwami dni tygodnia i miesięcy
                            $dzienTygodniaPl = [
                                'Monday' => 'poniedziałek',
                                'Tuesday' => 'wtorek',
                                'Wednesday' => 'środa',
                                'Thursday' => 'czwartek',
                                'Friday' => 'piątek',
                                'Saturday' => 'sobota',
                                'Sunday' => 'niedziela'
                            ];

                            $miesiacePl = [
                                'January' => 'stycznia',
                                'February' => 'lutego',
                                'March' => 'marca',
                                'April' => 'kwietnia',
                                'May' => 'maja',
                                'June' => 'czerwca',
                                'July' => 'lipca',
                                'August' => 'sierpnia',
                                'September' => 'września',
                                'October' => 'października',
                                'November' => 'listopada',
                                'December' => 'grudnia'
                            ];

                            // Zamiana na nazwy w języku polskim
                            $dzienTygodniaPl = $dzienTygodniaPl[$dzienTygodnia];
                            $miesiacPl = $miesiacePl[$miesiac];

                            $destiny = $row['dla'];
                            if($row['dla'] != 'wszyscy'){
                                $destiny = 'Tylko: ';
                                $sql2 = "select user_class.name from user_class where class_id in ($row[dla])";
                                $result2 = mysqli_query($conn, $sql2);
                                    while($row2 = mysqli_fetch_assoc($result2)){
                                    $destiny .= "$row2[name] ";
                                    }
                            }
                        echo '
                        <label class="active:scale-95 hover:bg-[#3d3d3d] tansition-all duration-150 relative block cursor-pointer rounded-lg ring-0 outline-none bg-[#1c1c1c] px-4 py-4 shadow-sm focus:outline-none sm:flex sm:justify-between">
                            <input onchange="wyniki('.$row['id'].')" type="radio" name="korepetycja_id" value="'.$row['id'].'" class="sr-only" aria-labelledby="server-size-0-label" aria-describedby="server-size-0-description-0 server-size-0-description-1" required>
                            <span class="flex items-center w-full">
                                <span class="flex flex-col text-sm w-full">
                                <div id="server-size-0-label" class="flex items-center gap-2 w-full font-medium text-gray-300 capitalize truncate">
                                    
                                    <span id="server-size-0-description-1" class=" flex text-sm sm:mt-0 sm:flex-col sm:text-right">
                                        <div class="rounded-full flex items-center justify-center gap-2 py-1 px-2 text-[11px] ring-1 ring-inset capitalize ';
                                        if($row['status'] == 'odwołane'){
                                            echo 'text-gray-400 bg-gray-400/10 ring-gray-400/20';
                                        }else{
                                            if($row['uczniowie'] >= $row['max_users']){
                                            echo 'text-red-400 bg-red-400/10 ring-red-400/20';
                                            }elseif($row['uczniowie'] >= $row['max_users'] * 0.65){
                                            echo 'text-yellow-400 bg-yellow-400/10 ring-yellow-400/20';
                                            }else{
                                                echo 'text-green-400 bg-green-400/10 ring-green-400/20';
                                            }
                                        }
                                        echo '">';
                                        if($row['status'] == 'odwołane'){
                                                        echo 'Odwołane';
                                                    }else{
                                                        if($row['uczniowie'] >= $row['max_users']){
                                                        echo 'Brak';
                                                        }elseif($row['uczniowie'] >= $row['max_users'] * 0.60){
                                                            echo 'Ostatnie';
                                                            }else{
                                                            echo 'Otwarte';
                                                        }
                                        }
                                        echo '<div class="flex items-center justify-center gap-1">
                                            '.$row['uczniowie'].'/'.$row['max_users'].'
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                            <path d="M10 9a3 3 0 100-6 3 3 0 000 6zM6 8a2 2 0 11-4 0 2 2 0 014 0zM1.49 15.326a.78.78 0 01-.358-.442 3 3 0 014.308-3.516 6.484 6.484 0 00-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 01-2.07-.655zM16.44 15.98a4.97 4.97 0 002.07-.654.78.78 0 00.357-.442 3 3 0 00-4.308-3.517 6.484 6.484 0 011.907 3.96 2.32 2.32 0 01-.026.654zM18 8a2 2 0 11-4 0 2 2 0 014 0zM5.304 16.19a.844.844 0 01-.277-.71 5 5 0 019.947 0 .843.843 0 01-.277.71A6.975 6.975 0 0110 18a6.974 6.974 0 01-4.696-1.81z" />
                                            </svg>
                                        </div>
                                        </div>
                                        
                                    </span>
                                    <div>
                                        
                                        <div class="flex flex-col">
                                            <span class="text-gray-500 text-xs font-medium mb-[-3px]">'.$destiny.'</span>
                                            <span class="text-gray-300 text-sm font-medium">'.$row['przedmiot'].'</span>
                                        </div>
                                    </div>
                                </div>
                                <span id="server-size-0-description-0" class="text-gray-500 mt-1">
                                    <span class="block sm:inline text-xs">Sala '.$row['sala'].'</span>
                                    <span class="hidden sm:mx-1 sm:inline" aria-hidden="true">&middot;</span>
                                    <span class="block sm:inline text-xs">'.$row['budynek'].'</span>
                                    <span class="hidden sm:mx-1 sm:inline" aria-hidden="true">&middot;</span>
                                    <span class="ml-1 text-gray-500 sm:ml-0 text-xs">'.$dzienTygodniaPl.', '.$dzien.' '.$miesiacPl.'</span>
                                    <span class="hidden sm:mx-1 sm:inline" aria-hidden="true">&middot;</span>
                                    <span class=" text-gray-500 text-xs leading-5">'.$row['godzina'].'</span>
                                </span>
                                </span>
                            </span>
                            
                            <span id="wynik_border_'.$row['id'].'" class="wynik_border pointer-events-none absolute -inset-px rounded-lg border border-[#3d3d3d] checked:border-red-500" aria-hidden="true"></span>
                        </label>
                        ';
                    }
                    if($is3 == false) {
                        echo '<p class="text-gray-400 text-sm">Brak korepetycji z tego przedmiotu</p>';
                    }else{
                        echo '
                            <div class="py-2 sm:px-0 md:col-span-6">
                                <dt class="text-sm font-medium leading-6 text-gray-300">Powód</dt>
                                <input type="text" id="powod" name="powod" class="mt-1 outline-none duration-150 relative w-full cursor-default rounded-md bg-[#0e0e0e] focus:text-white py-1.5 pl-3 pr-10 text-left text-gray-400 shadow-sm ring-1 ring-inset ring-[#3d3d3d] focus:outline-none focus:ring-2 theme-ring-focus sm:text-sm sm:leading-6" required>
                            </div>
                            <div class="w-full flex mt-2 items-center justify-center">
                                <button class="text-center active:scale-95 duration-150 md:mt-0 mt-4 inline-flex items-center gap-x-2 rounded-md border theme-border bg-[#1c1c1c] w-full justify-center theme-bg-hover px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 duration-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    Zapisz się
                                </button>
                            </div>
                        ';
                    }
                    ?>
                    
                </div>
            </fieldset>
        </div>