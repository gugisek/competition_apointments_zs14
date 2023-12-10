<?php
  session_start();
  if(isset($_SESSION['logged']))
  {
    header('Location: panel.php');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="pl">
    <?php include 'components/landing_page/header.php'; ?>
    <body style="overflow-x: hidden;" class="bg-[#0e0e0e]">
    <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
      <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-violet-800 to-red-800 opacity-20 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
        <?php include 'components/alert.php'; ?>
        <?php include 'components/login/hero.php'; ?>
            <?php include 'components/landing_page/footer.php'; ?>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
    </body>
</html>