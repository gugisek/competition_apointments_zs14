<div id="oferta" class="isolate overflow-hidden">
  <div class="flow-root pb-24 pt-24 sm:pt-32 lg:pb-0 pb-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8 pb-12">
      <div class="relative z-10">
        <h2 data-aos="fade-up" data-aos-delay="100" class="mx-auto max-w-4xl text-center text-5xl font-bold tracking-tight text-white">Nasza oferta dla każdego ucznia</h2>
        <p data-aos="fade-up" data-aos-delay="200" class="mx-auto mt-4 max-w-2xl text-center text-lg leading-8 text-white/60">Chętnie wspieramy edukację dlatego nasza oferta jest aż tak przystępna dla uczniów. <br/>Szkoły mogą ubiegać się o dofinansowanie z funduszy.</p>
        <div class="mt-16 flex justify-center">
          <fieldset data-aos="fade-up" data-aos-delay="300" class="grid grid-cols-2 gap-x-1 rounded-full bg-white/5 p-1 text-center text-xs font-semibold leading-5 text-white">
            <label onclick="rocznie()" id="rocznie" class="transition-all duration-150 theme-bg cursor-pointer rounded-full px-2.5 py-1">
              <input type="radio" name="frequency" value="monthly" class="sr-only">
              <span>Rocznie</span>
            </label>
            <label onclick="zawsze()" id="zawsze" class="transition-all duration-150 cursor-pointer rounded-full px-2.5 py-1">
              <input type="radio" name="frequency" value="annually" class="sr-only">
              <span>Na zawsze</span>
            </label>
          </fieldset>
        </div>
      </div>
      <div class="relative mx-auto mt-10 grid max-w-md grid-cols-1 gap-y-8 lg:mx-0 lg:max-w-none lg:grid-cols-3">
        <div class="hidden lg:absolute lg:inset-x-px lg:bottom-0 lg:top-4 lg:block lg:rounded-2xl lg:bg-[#0e0e0e]/80 lg:ring-1 lg:ring-white/10" aria-hidden="true"></div>
        <div data-aos="fade-up" data-aos-delay="100" class="relative rounded-2xl bg-[#0e0e0e]/80 ring-1 ring-white/10 lg:bg-transparent lg:pb-14 lg:ring-0">
          <div class="p-8 lg:pt-12 xl:p-10 xl:pt-14">
            <h3 id="tier-starter" class="text-sm font-semibold leading-6 text-white">Nauczyciel</h3>
            <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between lg:flex-col lg:items-stretch">
              <div class="mt-2 flex items-center gap-x-4">
                <p class="text-4xl font-bold tracking-tight text-white">Free</p>
                <div class="text-sm leading-5">
                  <p class="text-white">PLN</p>
                  <p id="rozliczanie" class="text-gray-400">Rozliczane rocznie</p>
                </div>
              </div>
              <a href="register.php" aria-describedby="tier-starter" class="rounded-md py-2 px-3 text-center text-sm font-semibold leading-6 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 bg-white/10 theme-bg-hover transition-all duration-150 focus-visible:outline-white">Zarejestruj się</a>
            </div>
            <div class="mt-8 flow-root sm:mt-10">
              <ul role="list" class="-my-2 divide-y border-t text-sm leading-6 lg:border-t-0 divide-white/5 border-white/5 text-white">
                <li class="flex gap-x-3 py-2">
                  <svg class="h-6 w-5 flex-none text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                  </svg>
                  Tworzenie zajęć
                </li>
                <li class="flex gap-x-3 py-2">
                  <svg class="h-6 w-5 flex-none text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                  </svg>
                  Zarządzanie uczniami na zajęciach
                </li>
                <li class="flex gap-x-3 py-2">
                  <svg class="h-6 w-5 flex-none text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                  </svg>
                  Wybieranie sal lekcyjnych i budynków
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div data-aos="fade-up" data-aos-delay="200" class="relative rounded-2xl z-10 bg-white shadow-xl ring-1 ring-gray-900/10">
          <div class="p-8 lg:pt-12 xl:p-10 xl:pt-14">
            <h3 id="tier-scale" class="text-sm font-semibold leading-6 text-gray-900">Uczeń</h3>
            <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between lg:flex-col lg:items-stretch">
              <div class="mt-2 flex items-center gap-x-4">
                <!-- Price, update based on frequency toggle state -->
                <p class="text-4xl font-bold tracking-tight text-gray-900">Free</p>
                <div class="text-sm leading-5">
                  <p class="text-gray-900">PLN</p>
                  <!-- Payment frequency, update based on frequency toggle state -->
                  <p id="rozliczanie" class="text-gray-500">Rozliczane rocznie</p>
                </div>
              </div>
              <a href="register.php" aria-describedby="tier-scale" class="rounded-md py-2 px-3 text-center text-sm font-semibold leading-6 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 theme-bg theme-bg-hover transition-all duration-150 shadow-sm focus-visible:outline-indigo-600">Zarejestruj się</a>
            </div>
            <div class="mt-8 flow-root sm:mt-10">
              <ul role="list" class="-my-2 divide-y border-t text-sm leading-6 lg:border-t-0 divide-gray-900/5 border-gray-900/5 text-gray-600">
                <li class="flex gap-x-3 py-2">
                  <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                  </svg>
                  Zapisywanie się na zajęcia
                </li>
                <li class="flex gap-x-3 py-2">
                  <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                  </svg>
                  Pełna kontrola nad swoim kontem
                </li>
                <li class="flex gap-x-3 py-2">
                  <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                  </svg>
                  Możliwość ustawienia własnego tła!
                </li>
                
              </ul>
            </div>
          </div>
        </div>
        <div data-aos="fade-up" data-aos-delay="300" class="relative rounded-2xl bg-[#0e0e0e]/80 ring-1 ring-white/10 lg:bg-transparent lg:pb-14 lg:ring-0">
          <div class="p-8 lg:pt-12 xl:p-10 xl:pt-14">
            <h3 id="tier-growth" class="text-sm font-semibold leading-6 text-white">Szkoła</h3>
            <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between lg:flex-col lg:items-stretch">
              <div class="mt-2 flex items-center gap-x-4">
                <!-- Price, update based on frequency toggle state -->
                <p id="cena" class="text-4xl font-bold tracking-tight text-white">150</p>
                <div class="text-sm leading-5">
                  <p class="text-white">PLN</p>
                  <!-- Payment frequency, update based on frequency toggle state -->
                  <p id="rozliczanie" class="text-gray-400">Rozliczane rocznie</p>
                </div>
              </div>
              <a href="#" aria-describedby="tier-growth" class="rounded-md py-2 px-3 text-center text-sm font-semibold leading-6 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 bg-white/10 theme-bg-hover transition-all duration-150 focus-visible:outline-white">Kontakt</a>
            </div>
            <div class="mt-8 flow-root sm:mt-10">
              <ul role="list" class="-my-2 divide-y border-t text-sm leading-6 lg:border-t-0 divide-white/5 border-white/5 text-white">
                <li class="flex gap-x-3 py-2">
                  <svg class="h-6 w-5 flex-none text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                  </svg>
                  Zarządznie uczniami i nauczycielami
                </li>
                <li class="flex gap-x-3 py-2">
                  <svg class="h-6 w-5 flex-none text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                  </svg>
                  Wiele budyńków szkolnych
                </li>
                <li class="flex gap-x-3 py-2">
                  <svg class="h-6 w-5 flex-none text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                  </svg>
                  Generowanie zaproszeń
                </li>
                <li class="flex gap-x-3 py-2">
                  <svg class="h-6 w-5 flex-none text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                  </svg>
                  Statystyki szkoły
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function rocznie() {
    document.getElementById("rocznie").classList.add("theme-bg");
    document.getElementById("zawsze").classList.remove("theme-bg");
    document.querySelectorAll("#rozliczanie").forEach(function(el) {
      el.innerHTML = "Rozliczane rocznie";
    });
    document.getElementById("cena").innerHTML = "150";
  }

  function zawsze() {
    document.getElementById("zawsze").classList.add("theme-bg");
    document.getElementById("rocznie").classList.remove("theme-bg");
    document.querySelectorAll("#rozliczanie").forEach(function(el) {
      el.innerHTML = "Jednorazowo";
    });
    document.getElementById("cena").innerHTML = "500";
  }
</script>