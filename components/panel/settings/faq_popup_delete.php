<?php
  include "../../../scripts/security.php";

  if($_SESSION['account_type'] != '1'){
    header('Location: ../../404.php');
    exit();
}

  $id = $_GET['id'];
  $type = $_GET['type'];
?>

    <form action="scripts/settings/delete_faq.php?id=<?=$id?>&type=<?=$type?>" method="POST" class="relative transform overflow-hidden rounded-lg bg-[#0e0e0e] px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
      <div>
        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-[#1c1c1c]">
          <svg
            class="h-6 w-6 text-red-600"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            aria-hidden="true"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M6 18L18 6M6 6l12 12"
            />  
          </svg>
        </div>
        <div class="mt-3 text-center sm:mt-5">
          <h3 class="text-base font-semibold leading-6 text-gray-200" id="modal-title">
            Czy na pewno chcesz usunąć?
          </h3>
          <div class="mt-2">
            <p class="text-sm text-gray-400">
              Usunięcie pytania jest nieodwracalne. 
            </p>
          </div>
        </div>
      </div>
      <div
        class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3"
      >
        <button
          type="submit"
          class="duration-150 transition-all inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:col-start-2"
        >
          Usuń
        </button>
        <button
          type="button"
          onclick="popupFaqDeleteOpenClose()"
          class="duration-150 transition-all mt-3 inline-flex w-full justify-center rounded-md bg-[#1c1c1c] px-3 py-2 text-sm font-semibold text-gray-300 shadow-sm ring-inset ring-gray-300 hover:bg-gray-500 sm:col-start-1 sm:mt-0"
        >
          Anuluj
        </button>
      </div>
    </form>
