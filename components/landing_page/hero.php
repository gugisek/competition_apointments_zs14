<div class="bg-[#0e0e0e] w-full">
  <header class="absolute inset-x-0 top-0 z-50">
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
      <div class="flex lg:flex-1">
        <a href="/" class="-m-1.5 p-1.5 px-4">
          <img data-aos="fade-down" data-aos-delay="100" class="h-8 w-auto" src="public/img/logo.png" alt="">
        </a>
      </div>
      <div class="flex lg:hidden">
        <button onclick="openNavToggle()" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-400">
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>
      </div>
      <div class="hidden lg:flex lg:gap-x-12">
        <a data-aos="fade-down" data-aos-delay="200" href="#produkt" class="flex items-center justify-center"><span class="text-sm font-semibold leading-6 text-white hover:bg-violet-600/30 px-4 py-1 rounded-lg hover:text-violet-500 druation-150 active:scale-95 transition-all">Produkt</span></a>
        <a data-aos="fade-down" data-aos-delay="300" href="#oferta" class="flex items-center justify-center"><span class="text-sm font-semibold leading-6 text-white hover:bg-violet-600/30 px-4 py-1 rounded-lg hover:text-violet-500 druation-150 active:scale-95 transition-all">Oferta</span></a>
        <a data-aos="fade-down" data-aos-delay="400" href="#pytania" class="flex items-center justify-center"><span class="text-sm font-semibold leading-6 text-white hover:bg-violet-600/30 px-4 py-1 rounded-lg hover:text-violet-500 druation-150 active:scale-95 transition-all">Pytania</span></a>
        <a data-aos="fade-down" data-aos-delay="500" href="#kontakt" class="flex items-center justify-center"><span class="text-sm font-semibold leading-6 text-white hover:bg-violet-600/30 px-4 py-1 rounded-lg hover:text-violet-500 druation-150 active:scale-95 transition-all">Kontakt</span></a>
      </div>
      <div data-aos="fade-down" data-aos-delay="600" class="hidden lg:flex lg:flex-1 lg:justify-end">
        <a href="login" class="text-sm font-semibold leading-6 text-white hover:bg-violet-600/30 px-4 py-1 rounded-lg hover:text-violet-500 druation-150 active:scale-95 transition-all">Zaloguj się <span aria-hidden="true">&rarr;</span></a>
      </div>
    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div class="lg:hidden" role="dialog" aria-modal="true">
      <!-- Background backdrop, show/hide based on slide-over state. -->
      <!-- <div class="fixed inset-0 z-50"></div> -->
      <div id="sidenav_mobile" class="right-[-100%] transition-all duration-150 fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-[#0e0e0e] px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-white/10">
        <div class="flex items-center justify-between">
          <a href="/" class="-m-1.5 p-1.5 px-4">
          <img data-aos="fade-down" data-aos-delay="100" class="h-8 w-auto" src="public/img/logo_long.png" alt="">
        </a>
          <button onclick="openNavToggle()" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-400">
            <span class="sr-only">Close menu</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="mt-6 flow-root">
          <div class="-my-6 divide-y divide-gray-500/25">
            <div class="space-y-2 py-6">
              <a onclick="openNavToggle()" href="#produkt" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-violet-600/30 active:scale-95 transition-all duration-150">Produkt</a>
              <a onclick="openNavToggle()" href="#oferta" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-violet-600/30 active:scale-95 transition-all duration-150">Oferta</a>
              <a onclick="openNavToggle()" href="#pytania" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-violet-600/30 active:scale-95 transition-all duration-150">Pytania</a>
              <a onclick="openNavToggle()" href="#kontakt" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-violet-600/30 active:scale-95 transition-all duration-150">Kontakt</a>
            </div>
            <div class="py-6">
              <a href="login" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-white hover:bg-violet-600/30">Zaloguj się</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="relative isolate pt-14">
    <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
      <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-violet-800 to-red-800 opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
    <div class="py-24 sm:py-32 lg:pb-40">
      <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
          <h1 data-aos="fade-up" data-aos-delay="700" class="text-4xl font-bold tracking-tight text-white sm:text-6xl">Korepetycje z nami to nie problem</h1>
          <p data-aos="fade-up" data-aos-delay="800" class="mt-6 text-lg leading-8 text-gray-300">Przedstawiamy platformę dla uczniów oraz szkół do organizowania korepetycji i łatwego zapisywania się. Super nowoczesna platforma jest dostępna za darmo dla uczniów. <br/>Sprawdź czy Twoja szkoła przystąpiła do <a href="#oferta" class="theme-text theme-text-hover transition-all duration-150">programu EduKorepetycje</a>.</p>
          <div data-aos="fade-up" data-aos-delay="900" data-aos-anchor-placement="top-bottom" class="mt-10 flex items-center justify-center gap-x-6">
            <a href="register" class="rounded-md bg-violet-700 duration-150 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-violet-900  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-400">Zarejestruj się</a>
            <a href="#oferta" class="text-sm font-semibold leading-6 theme-text-hover text-white duration-150 transition-all">Oferta <span aria-hidden="true">→</span></a>
          </div>
        </div>
        <img data-aos="fade-up" data-aos-delay="100" id="produkt" src="public/img/landing_page/panel2.png" alt="App screenshot" width="2432" height="1442" class="mt-16 rounded-md bg-white/5 shadow-2xl ring-1 ring-white/10 sm:mt-24">
      </div>
    </div>
  </div>
</div>
<script>
function openNavToggle() {
  const backdrop = document.getElementById('backdrop');
  const sidenav = document.getElementById('sidenav_mobile');
  sidenav.classList.toggle('right-[-100%]');
  sidebar.classList.toggle('right-0');
}
</script>