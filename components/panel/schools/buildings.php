
<div class="border-t border-white/10 mt-8">
    <h1 class="font-semibold text-gray-300 py-6">Budynki</h1>
    <div class="grid md:grid-cols-4 sm:grid-cols-3 grid-cols-2 gap-4">
            <?php
            $quantity = $_GET['quantity'];
            $school_id = $_GET['school_id'];
            $i = 0;
            $saved_builds = 0;
            if($school_id=='add'){
                while($quantity>$i){
                echo '
                <div class="p-3 border border-[#3d3d3d] rounded-xl">
                    <dt class="text-sm font-medium leading-6 text-gray-300 text-xs text-center"></dt>
                    <input name="build_'.$i.'_name" type="text" value="" placeholder="Nazwa" class="placeholder:text-gray-600 capitalize w-full text-gray-400 text-sm focus:text-white bg-[#0e0e0e] focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150" required></input>
                    <input name="build_'.$i.'_street" type="text" value="" placeholder="Ulica" class="placeholder:text-gray-600 w-full text-gray-400 text-sm focus:text-white bg-[#0e0e0e] focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150" required></input>
                    <input name="build_'.$i.'_city" type="text" value="" placeholder="Miasto" class="placeholder:text-gray-600  w-full text-gray-400 text-sm focus:text-white bg-[#0e0e0e] focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150" required></input>
                </div>
                ';
                $i++;
            }
            echo '<input type="hidden" name="buildings_num" value="'.$quantity.'">';
            }else {
                include "../../../scripts/database/conn_db.php";
                $sql = "SELECT * FROM buildings where school_id='$school_id'";
                $result = mysqli_query($conn, $sql);
                while($row=mysqli_fetch_assoc($result)){
                    echo '
                    <div class="p-3 border border-[#3d3d3d] rounded-xl">
                        <dt class="text-sm font-medium leading-6 text-gray-300 text-xs text-center"></dt>
                        <input name="build_id_'.$i.'_id" type="hidden" value="'.$row['build_id'].'"></input>
                        <input name="build_id_'.$i.'_name" type="text" value="'.$row['name'].'" placeholder="Nazwa" class="placeholder:text-gray-600 capitalize w-full text-gray-400 text-sm focus:text-white bg-[#0e0e0e] focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150" required></input>
                        <input name="build_id_'.$i.'_street" type="text" value="'.$row['street'].'" placeholder="Ulica" class="placeholder:text-gray-600 w-full text-gray-400 text-sm focus:text-white bg-[#0e0e0e] focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150" required></input>
                        <input name="build_id_'.$i.'_city" type="text" value="'.$row['city'].'" placeholder="Miasto" class="placeholder:text-gray-600  w-full text-gray-400 text-sm focus:text-white bg-[#0e0e0e] focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150" required></input>
                    </div>
                    ';
                    $i++;
                    $saved_builds++;
                }
                if($saved_builds < $quantity) {
                    while($quantity>$i){
                        echo '
                        <div class="p-3 border border-[#3d3d3d] rounded-xl">
                            <dt class="text-sm font-medium leading-6 text-gray-300 text-xs text-center"></dt>
                            <input name="build_id_'.$i.'_name" type="text" value="" placeholder="Nazwa" class="placeholder:text-gray-600 capitalize w-full text-gray-400 text-sm focus:text-white bg-[#0e0e0e] focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150" required></input>
                            <input name="build_id_'.$i.'_street" type="text" value="" placeholder="Ulica" class="placeholder:text-gray-600 w-full text-gray-400 text-sm focus:text-white bg-[#0e0e0e] focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150" required></input>
                            <input name="build_id_'.$i.'_city" type="text" value="" placeholder="Miasto" class="placeholder:text-gray-600  w-full text-gray-400 text-sm focus:text-white bg-[#0e0e0e] focus:ring-0 focus:outline-0 border-b border-white/10 py-2 theme-border-focus duration-150" required></input>
                        </div>
                        ';
                        $i++;
                    }
                }
                echo '<input type="hidden" name="buildings_num" value="'.$quantity.'">';
            }
            ?>
    </div>
</div>