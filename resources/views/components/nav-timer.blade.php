<div id="promoBanner" class="text-center bg-green-50 text-gray-700 h-28 lg:h-24 w-full relative">
    <!-- Close Button -->
    <button id="closeButton" class="absolute cursor-pointer mt-10 lg:mt-0 right-0 p-6" aria-label="Close Banner">
      <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="2em" viewBox="0 0 24 24">
        <g fill="none" fill-rule="evenodd">
          <path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"></path>
          <path fill="red" d="m12 14.122l5.303 5.303a1.5 1.5 0 0 0 2.122-2.122L14.12 12l5.304-5.303a1.5 1.5 0 1 0-2.122-2.121L12 9.879L6.697 4.576a1.5 1.5 0 1 0-2.122 2.12L9.88 12l-5.304 5.304a1.5 1.5 0 1 0 2.122 2.12z"></path>
        </g>
      </svg>
    </button>
    <div class="flex flex-col justify-center items-center h-full">
      <div>
        <span class="mr-2 my-2">
          <span class="font-bold">Upto 70% OFF</span> -
          On Limited Time Mega Sale! Time Left -
          <span class="font-bold">
            <span id="countdown" class="text-red-500">16h 0m 0s</span>
          </span>
          <hr class="pt-1 border-green-50" />
          <span class="mb-2">Use Discount Coupon
            <span class="p-1 px-2 mt-1 mb-2 border border-red-500 text-red-500 font-bold">MEGASALE</span>
          </span>
        </span>
      </div>
    </div>
  </div>

  <script>
    // Countdown timer configuration
    const countdownKey = 'megaleaseCountdownTarget';

    function updateCountdown() {
      let targetTime = localStorage.getItem(countdownKey);

      // If no target time is stored, set one for 16 hours from now
      if (!targetTime) {
        targetTime = new Date().getTime() + 16 * 60 * 60 * 1000; // 16 hours in ms
        localStorage.setItem(countdownKey, targetTime);
      } else {
        targetTime = parseInt(targetTime);
      }

      const now = new Date().getTime();
      let diff = targetTime - now;

      // If time is up or negative, reset target time to 16 hours from now
      if (diff <= 0) {
        targetTime = new Date().getTime() + 16 * 60 * 60 * 1000;
        localStorage.setItem(countdownKey, targetTime);
        diff = targetTime - now;
      }

      // Calculate hours, minutes, and seconds from diff
      const hours = Math.floor(diff / (1000 * 60 * 60));
      const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((diff % (1000 * 60)) / 1000);

      // Update the countdown element's text content
      document.getElementById('countdown').textContent = `${hours}h ${minutes}m ${seconds}s`;
    }

    // Update the countdown every second
    updateCountdown();
    setInterval(updateCountdown, 1000);

    // Close button event listener
    document.getElementById('closeButton').addEventListener('click', function() {
      document.getElementById('promoBanner').style.display = 'none';
    });
  </script>
