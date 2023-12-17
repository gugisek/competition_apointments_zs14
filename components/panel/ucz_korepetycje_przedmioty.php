<div class="px-4 py-2 sm:px-0 md:col-span-2">
</div>
<div data-aos="fade-right" data-aos-delay="200" class="px-4 py-2 sm:px-0 md:col-span-6">
    <dt class="text-sm font-medium leading-6 text-gray-300">Przedmiot</dt>
    <select onchange="wynik()" name="zapis_przedmiot_id" id="zapis_przedmiot_id" class="mt-1 outline-none duration-150 capitalize relative w-full cursor-default rounded-md bg-[#0e0e0e] focus:text-white py-1.5 pl-3 pr-10 text-left text-gray-400 shadow-sm ring-1 ring-inset ring-[#3d3d3d] focus:outline-none focus:ring-2 theme-ring-focus sm:text-sm sm:leading-6" required>
                    <option value="" class="hidden" disabled selected>Wybierz</option>
                          <?php
                            include "../../scripts/database/conn_db.php";
                          $nau_id = $_GET['nau_id'];
                          //$sql = "SELECT przedmioty.name, przedmioty.przedmiot_id FROM `selected_przedmioty` join przedmioty on przedmioty.przedmiot_id=selected_przedmioty.przedmiot_id where user_id = $nau_id order by przedmioty.name asc;";
                          $sql = "SELECT przedmioty.name, 
                                        przedmioty.przedmiot_id, 
                                        COUNT(nadchodzace_korepetycje.korepetycje_id) AS liczba_nadchodzacych_korepetycji
                                    FROM `selected_przedmioty`
                                    JOIN przedmioty ON przedmioty.przedmiot_id = selected_przedmioty.przedmiot_id
                                    LEFT JOIN (
                                        SELECT korepetycje_id, przedmiot_id
                                        FROM korepetycje
                                        WHERE creator_id = $nau_id AND data >= CURDATE()
                                    ) AS nadchodzace_korepetycje ON nadchodzace_korepetycje.przedmiot_id = przedmioty.przedmiot_id
                                    WHERE selected_przedmioty.user_id = $nau_id
                                    GROUP BY przedmioty.przedmiot_id 
                                    ORDER BY przedmioty.name ASC;
                                    ";
                          $result = mysqli_query($conn, $sql);
                          while($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="'.$row['przedmiot_id'].'" class="capitalize">'.$row['name'].' ('.$row['liczba_nadchodzacych_korepetycji'].')</option>';
                          }
                          ?>
    </select>
</div>
