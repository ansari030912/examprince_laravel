<span class="text-red-500 saleCountdown">16h 0m 0s</span>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const countdownEls = document.querySelectorAll('.saleCountdown');
        if (countdownEls.length > 0) {
            const countdownKey = 'megaSaleCountdownTarget';

            function updateCountdown() {
                let targetTime = Number(localStorage.getItem(countdownKey));
                const now = Date.now();

                if (!targetTime || isNaN(targetTime)) {
                    targetTime = now + (16 * 60 * 60 * 1000);
                    localStorage.setItem(countdownKey, targetTime);
                }

                let diff = targetTime - now;
                if (diff <= 0) {
                    targetTime = now + (16 * 60 * 60 * 1000);
                    localStorage.setItem(countdownKey, targetTime);
                    diff = targetTime - now;
                }

                const hours = Math.floor(diff / (1000 * 60 * 60));
                const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((diff % (1000 * 60)) / 1000);

                // Update all countdown elements
                countdownEls.forEach(el => {
                    el.textContent = `${hours}h ${minutes}m ${seconds}s`;
                });
            }

            updateCountdown();
            setInterval(updateCountdown, 1000);
        }
    });
</script>
