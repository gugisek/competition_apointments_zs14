<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <a href="index.php">
      <img data-aos="fade-right" data-aos-delay="0" class="mx-auto h-10 w-auto" src="public/img/logo.png" alt="EduKorepetycje">
    </a>
    <h2 data-aos="fade-right" data-aos-delay="100" class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-white">Zarejestruj się</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="scripts/login/register.php" method="POST">
      <div data-aos="fade-right" data-aos-delay="200">
        <label for="email" class="block text-sm font-medium leading-6 text-white">Adres email</label>
        <div class="mt-2">
          <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 bg-white/5 py-1.5 px-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-purple-500 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div data-aos="fade-right" data-aos-delay="300">
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-white">Twoja szkoła</label>
          <div class="text-sm">
            <a href="#" class="font-semibold theme-text theme-text-hover transition-all duration-150">Nie ma Twojej szkoły?</a>
          </div>
        </div>
        <div class="mt-2">
          <select id="school" name="school" required class="capitalize bg-[#1a1a1a] block w-full rounded-md border-0 px-4 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-purple-500 sm:text-sm sm:leading-6">
            <option value="" class="hidden" disabled selected>Wybierz</option>
            <?php
            include 'scripts/database/conn_db.php';
            $sql = "SELECT * FROM `schools`";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                echo '<option value="'.$row['school_id'].'" class="capitalize">'.$row['name'].'</option>';
            }
            ?>
          </select>
        </div>
      </div>

      <div data-aos="fade-right" data-aos-delay="400">
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-white">Rola</label>
        </div>
        <div class="mt-2">
          <select id="role_id" name="role_id" required class="capitalize bg-[#1a1a1a] block w-full rounded-md border-0 px-4 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-purple-500 sm:text-sm sm:leading-6">
            <option value="" class="hidden" disabled selected>Wybierz</option>
            <?php
            include 'scripts/database/conn_db.php';
            $sql = "SELECT id, role FROM `user_roles` where id = 3 or id = 4";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                echo '<option value="'.$row['id'].'" class="capitalize">'.$row['role'].'</option>';
            }
            ?>
          </select>
        </div>
      </div>

      <div data-aos="fade-right" data-aos-delay="500">
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-white">Hasło</label>
          <div class="text-sm">
            <!-- <a href="#" class="font-semibold text-indigo-400 hover:text-indigo-300">Forgot password?</a> -->
          </div>
        </div>
        <div class="mt-2">
          <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 px-4 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-purple-500 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div data-aos="fade-right" data-aos-delay="600" data-aos-anchor-placement="top-bottom">
        <button type="submit" class="flex w-full justify-center rounded-md bg-purple-700 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-purple-900 duration-150 transition-all focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Dalej</button>
      </div>
    </form>

    <p data-aos="fade-right" data-aos-delay="700" data-aos-anchor-placement="top-bottom" class="mt-10 text-center text-sm text-gray-400">
      Masz już konto?
      <a href="login.php" class="font-semibold leading-6 text-purple-500 druation-150 transition-all hover:text-violet-900">Zaloguj się</a>
    </p>
  </div>
</div>
