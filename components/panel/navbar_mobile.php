<div class="relative z-50 xl:hidden" role="dialog" aria-modal="true">
    <div id="backdrop" class="opacity-0 pointer-events-none transition-opacity ease-linear duration-300 fixed inset-0 bg-black/80"></div>
    <div id="sidenav_mobile" class="left-[-100%] pointer-events-none duration-300 fixed inset-0 flex">
      <div class="relative mr-16 flex w-full max-w-xs flex-1">
        <div class="absolute left-full top-0 flex h-full w-full justify-center pt-5">
          <button id="nav_m_close_button" type="button" class="w-full flex -m-2.5 p-2.5">
            <span class="sr-only">Close sidebar</span>
            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <?php include 'components/panel/navbar.php'; ?>
      </div>
    </div>
  </div>
 