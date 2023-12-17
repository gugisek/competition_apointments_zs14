<div id="pytania">
  <div class="mx-auto max-w-7xl px-6 py-24 sm:pt-32 lg:px-8 lg:py-40">
    <div class="lg:grid lg:grid-cols-12 lg:gap-8">
      <div class="lg:col-span-5">
        <h2 data-aos="fade-right" data-aos-delay="100" class="text-3xl z-10 font-bold leading-10 tracking-tight text-white">Często zadawane pytania</h2>
        <p data-aos="fade-right" data-aos-delay="200" class="mt-4 text-base leading-7 text-white/60">Nie możesz znaleść odpopwiedzi na swoje pytanie? <br/><a href="#contact" class="theme-text theme-text-hover duration-150 transition-all">Skontaktuj</a> się z nami, by rozwiać wszystkie wątpliwości.</p>
      </div>
      <div class="mt-10 lg:col-span-7 lg:mt-0">
        <dl class="divide-y divide-white/10">

        <?php
        include "scripts/database/conn_db.php";
        $sql = "select * from faq";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        while($row = mysqli_fetch_assoc($result)){
          echo '
        <div data-aos="fade-left" data-aos-delay="'.$i.'00" data-aos-anchor-placement="center-bottom" class="z-[999]">
          <dt class="text-lg">
            <!-- Expand/collapse question button -->
            <button type="button" class="py-5 flex w-full items-start justify-between text-left text-gray-300" aria-controls="faq-'.$row['id'].'" aria-expanded="false">
              <span class="font-medium text-gray-200">'.$row['question'].'</span>
              <span class="ml-6 flex h-7 items-center">
                <svg class="rotate-0 duration-300 h-6 w-6 transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
              </span>
            </button>
          </dt>
          <dd style="scale: 0; height: 0;" class="duration-300 mt-2 pr-12" id="faq-'.$row['id'].'">
            <div class="text-base text-gray-400 pb-4">'.$row['answer'].'</div>
          </dd>
        </div>
          ';
          $i++;
        }
        ?>
        <!-- More questions... -->
      </dl>
      </div>
    </div>
  </div>
</div>

<script>
  // Pobierz wszystkie przyciski "Expand/collapse question"
  const questionButtons = document.querySelectorAll('button[aria-controls]');

  // Dodaj obsługę kliknięcia dla każdego przycisku
  questionButtons.forEach(button => {
    button.addEventListener('click', () => {
      const targetId = button.getAttribute('aria-controls');
      const target = document.getElementById(targetId);

      if (target) {
        const expanded = button.getAttribute('aria-expanded') === 'true';

        // Zmień stan aria-expanded na przeciwny (true na false, false na true)
        button.setAttribute('aria-expanded', !expanded);

        // Zmień ikonę rozwijania/zwijania
        const icon = button.querySelector('svg');
        if (icon) {
          icon.classList.toggle('rotate-0', expanded);
          icon.classList.toggle('-rotate-180', !expanded);
        }

        // Pokaż lub ukryj odpowiedź na pytanie
        if (expanded) {
          target.style.scale = '0';
          target.style.height = '0';
        } else {
          target.style.scale = '1';
            target.style.height = 'auto';
        }
      }
    });
  });
</script>