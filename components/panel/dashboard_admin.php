<?php
session_start();
if($_SESSION['account_type'] != '1'){
    header('Location: ../../404.php');
    exit();
}
?>
<?php
include "../../scripts/database/conn_db.php";
$sql = "select count(*) as szkoly from schools";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$szkoly = $row['szkoly'];
$sql = "select count(*) as uczniowie from users where role_id = 4";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$uczniowie = $row['uczniowie'];
$sql = "select count(*) as nauczyciele from users where role_id = 3";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$nauczyciele = $row['nauczyciele'];
$sql = "select count(*) as korepetycje from korepetycje";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$korepetycje = $row['korepetycje'];
?>
<div class="py-24 sm:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl lg:max-w-none">
      <div class="text-center">
        <h2 data-aos="fade-up" data-aos-delay="100" class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Pamiętaj, jesteśmy zaufani przez szkoły w całej Polsce</h2>
        <p data-aos="fade-up" data-aos-delay="200" class="mt-4 text-lg leading-8 text-gray-300">Do naszego porogramu przystępuje większość placówek oświaty.</p>
      </div>
      <dl class="mt-16 grid grid-cols-1 gap-0.5 overflow-hidden rounded-2xl text-center sm:grid-cols-2 lg:grid-cols-4">
        <div data-aos="fade-up" data-aos-delay="300" class="flex flex-col bg-white/5 p-8">
          <dt class="text-sm font-semibold leading-6 text-gray-300">Placówek edukacji</dt>
          <dd class="order-first text-3xl font-semibold tracking-tight text-white"><?=$szkoly?></dd>
        </div>
        <div data-aos="fade-up" data-aos-delay="400" class="flex flex-col bg-white/5 p-8">
          <dt class="text-sm font-semibold leading-6 text-gray-300">Uczniów i studentów</dt>
          <dd class="order-first text-3xl font-semibold tracking-tight text-white"><?=$uczniowie?></dd>
        </div>
        <div data-aos="fade-up" data-aos-delay="500" class="flex flex-col bg-white/5 p-8">
          <dt class="text-sm font-semibold leading-6 text-gray-300">Nauczycieli i profesorów</dt>
          <dd class="order-first text-3xl font-semibold tracking-tight text-white"><?=$nauczyciele?></dd>
        </div>
        <div data-aos="fade-up" data-aos-delay="600" class="flex flex-col bg-white/5 p-8">
          <dt class="text-sm font-semibold leading-6 text-gray-300">Odbytych korepetycji</dt>
          <dd class="order-first text-3xl font-semibold tracking-tight text-white"><?=$korepetycje?></dd>
        </div>
      </dl>
    </div>
  </div>
</div>
