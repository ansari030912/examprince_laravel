<hr class="-mt-20" style="border:2px solid #F5F6FA">
<div class="w-full lg:w-12/12 p-4">
    <div class="MuiGrid-root MuiGrid-container MuiGrid-spacing-xs-2 css-isbt42">
        <div class="MuiGrid-root MuiGrid-item MuiGrid-grid-xs-12 MuiGrid-grid-md-5 css-1r482s6">
            @include('components.download-demo')
            <hr class="mb-4 mr-5" style="border:2px solid #F5F6FA">
            <p class="text-xl font-bold text-gray-700 mb-4">Select Product</p>
            <div class="MuiGrid-root MuiGrid-container MuiGrid-spacing-xs-2">
                @foreach ($examDetails['examPrices'] as $index => $product)
                    <div class="MuiGrid-root MuiGrid-item MuiGrid-grid-xs-12 css-q56oe5">
                        <div class="transition duration-300 ease-in-out transform hover:scale-105 MuiBox-root css-1npz1le product-item"
                            data-product-id="{{ $product->id }}">
                            <div class="MuiCardContent-root mb-4 css-1qw96cp">
                                @if ($product->off >= 70)
                                    <p class="MuiTypography-root MuiTypography-body1 css-213zkn">
                                        <span>MOST POPULAR</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                            viewBox="0 0 512 512">
                                            <path fill="#ffaf24"
                                                d="m252.5 381l-128 49c-5.9 2.2-12.1-2.3-11.8-8.6l7-136.9c.1-2.1-.6-4.2-1.9-5.9L31.6 172c-4-4.9-1.6-12.2 4.5-13.9l132.4-35.6c2.1-.6 3.9-1.9 5-3.7L248.3 4c3.4-5.3 11.2-5.3 14.6 0l74.8 114.9c1.2 1.8 3 3.1 5 3.7l132.4 35.6c6.1 1.6 8.5 9 4.5 13.9l-86.1 106.6c-1.3 1.7-2 3.8-1.9 5.9l7 136.9c.3 6.3-5.9 10.8-11.8 8.6l-128-49c-2.1-.8-4.3-.8-6.3-.1" />
                                            <path fill="#ffb700"
                                                d="m456.1 51.7l-41-41c-1.2-1.2-2.8-1.7-4.4-1.5c-1.6.2-3.1 1.2-3.9 2.6l-42.3 83.3c-1.2 2.1-.8 4.6.9 6.3c1 1 2.4 1.5 3.7 1.5c.9 0 1.8-.2 2.6-.7L454.9 60c1.4-.8 2.4-2.2 2.6-3.9c.3-1.6-.3-3.2-1.4-4.4m-307 43.5l-42.3-83.3c-.8-1.4-2.2-2.4-3.9-2.6c-1.6-.2-3.3.3-4.4 1.5l-41 41c-1.2 1.2-1.7 2.8-1.5 4.4c.2 1.6 1.2 3.1 2.6 3.9l83.3 42.3c.8.5 1.7.7 2.6.7c1.4 0 2.7-.5 3.7-1.5c1.7-1.8 2-4.4.9-6.4m140.7 410l-29-88.8c-.2-.9-.7-1.7-1.3-2.3c-1-1-2.3-1.5-3.7-1.5c-2.4 0-4.4 1.6-5.1 3.9l-29 88.8c-.4 1.6-.1 3.3.9 4.6c1 1.3 2.5 2.1 4.2 2.1h57.9c1.6 0 3.2-.8 4.2-2.1c1.1-1.4 1.4-3.1.9-4.7" />
                                        </svg>
                                    </p>
                                @endif
                                <div class="flex items-center justify-between h-full w-full">
                                    <div>
                                        <div
                                            class="MuiTypography-root MuiTypography-h5 MuiTypography-gutterBottom css-ml0too">
                                            <b class="text-blue-600">{{ $product->title }}</b>
                                        </div>
                                        <p style="margin-bottom:20px;" class="text-gray-500">
                                            @if ($product->title === 'Full Premium Bundle')
                                                PDF, Test Engine & Training Course Bundle
                                            @elseif($product->title === 'PDF & Test Engine Bundle')
                                                Printable PDF & Test Engine Bundle
                                            @elseif ($product->title === 'Training Course Only')
                                                {{ $examDetails['exam']->exam_training_course['lectures'] ?? 'N/A' }}
                                                Lectures
                                                ({{ $examDetails['exam']->exam_training_course['duration'] ?? 'N/A' }})
                                            @elseif($product->title === 'Test Engine Only')
                                                Test Engine File for 3 devices
                                            @elseif($product->title === 'PDF Only')
                                                Printable Premium PDF only
                                            @endif
                                        </p>
                                    </div>
                                    <div>
                                        <strong class="MuiTypography-root MuiTypography-h6 css-1oir7cy">
                                            ${{ number_format($product->price, 2) }}
                                        </strong>
                                        <p class="MuiTypography-root MuiTypography-body2 css-f9vin7">
                                            <span
                                                style="text-decoration:line-through;color:#ff7043;font-size:0.8rem;text-align:right">
                                                ${{ number_format($product->full_price, 2) }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="MuiGrid-root MuiGrid-item MuiGrid-grid-xs-12 MuiGrid-grid-md-7 css-1ak9ift">
            <div class="hidden lg:inline-block">
                <p class="text-xl mb-4 font-bold text-blue-600"> {{ $examDetails['exam']->vendor_title }}</p>
                <div class="MuiGrid-root MuiGrid-container MuiGrid-spacing-xs-2 css-o941x8">
                    <!-- Microsoft section content -->
                </div>
            </div>
            <hr style="border:1px solid #F5F6FA">

            {{-- IF the exam is retired --}}
            @if ($examDetails['exam']->exam_retired)
                <div id="promoBanner"
                    style="background-color: #F8D7DA;
                   border: 1px solid red;
                   padding: 10px;
                   margin: 10px 0;
                   box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.5);">

                    <p style="font-size: 18px; font-weight: 600; color: red;">
                        <span class="text-gray-600" style="font-size: 22px;">
                            Note :
                        </span>
                        {{ $examDetails['exam']->exam_code }} ({{ $examDetails['exam']->exam_title }}) will not
                        receive any new updates.
                    </p>

                    @if (!empty($examDetails['exam']->exam_alternate['exam_alternate_code']))
                        <p class="text-gray-600" style="font-size: 16px; font-weight: 600; text-align: right;">
                            New exam code:
                            <a href="/exam-questions/{{ $examDetails['exam']->vendor_perma }}/{{ $examDetails['exam']->exam_alternate['exam_alternate_perma'] }}"
                                class="hover:text-blue-700 text-blue-600 hover:underline">
                                {{ $examDetails['exam']->exam_alternate['exam_alternate_code'] }}
                            </a>
                        </p>
                    @endif
                </div>
            @else
                {{-- Not retired => show normal Mega Sale box --}}
                <div class="MuiPaper-root MuiPaper-elevation MuiPaper-rounded MuiPaper-elevation1 MuiCard-root hidden lg:inline-block w-full css-xa7vfk"
                    id="promoBanner">
                    <p class="MuiTypography-root MuiTypography-body1 css-wesure">
                        <span style="color:#856404">Limited Time Mega Sale!</span>
                        <br>
                        <span style="color:#DC3545">(40-70% OFF)</span>
                    </p>
                    <p class="MuiTypography-root MuiTypography-body1 css-glm6n4">
                        Hurry up! Offer ends in
                        @include('components.time')
                    </p>
                </div>
            @endif

            <hr style="border:1px solid #F5F6FA;margin-bottom:20px">
            <div>
                <!-- Order summary section -->
                <span
                    class="font-heading text-lg my-4 pl-4 text-gray-600 font-semibold flex justify-between items-center">
                    Actual Amount :
                    <span style="position:relative;display:inline-block;color:red" class="text-xl">
                        $<span id="actualAmount">0</span>
                        <span
                            style="position:absolute;height:2px;width:100%;background-color:red;top:60%;left:0;transform:rotate(-5deg);transform-origin:left center">
                        </span>
                    </span>
                </span>
                <hr style="border:1px solid #F5F6FA">
                <span
                    class="font-heading text-lg my-4 pl-4 flex text-gray-600 font-semibold justify-between items-center">
                    <span>Discount :</span>
                    <span class="text-green-600"><span id="discountPercentage">0</span>%</span>
                </span>
                <hr style="border:1px solid #F5F6FA">
                <span
                    class="font-heading text-lg my-4 pl-4 flex text-gray-600 font-semibold justify-between items-center">
                    Total Amount : <span class="text-green-600 text-2xl">$<span id="totalAmount">0</span></span>
                </span>
                <hr style="border:1px solid #F5F6FA;margin-bottom:12px">
                <button id="addToCartBtn"
                    class="bg-green-600 cursor-pointer rounded-full hover:bg-green-700 text-white font-semibold h-10 w-full px-7 py-4 flex items-center justify-center gap-2 transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24"
                        fill="none">
                        <!-- SVG path data -->
                    </svg>
                    <span style="font-size:16px">Add To Cart</span>
                </button>
            </div>
        </div>
    </div>
</div>

@include('components.css-for-add-cart')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const products = @json($examDetails['examPrices']);
        const examDetails = @json($examDetails['exam']); // Get exam details
        let selectedProduct = products[0];
        const productItems = document.querySelectorAll('.product-item');
        const actualAmountEl = document.getElementById('actualAmount');
        const discountPercentageEl = document.getElementById('discountPercentage');
        const totalAmountEl = document.getElementById('totalAmount');
        const addToCartBtn = document.getElementById('addToCartBtn');

        function updateOrderSummary() {
            if (!selectedProduct) return;

            const fullPrice = parseFloat(selectedProduct.full_price);
            const price = parseFloat(selectedProduct.price);

            actualAmountEl.textContent = fullPrice.toFixed(2);
            discountPercentageEl.textContent = selectedProduct.off;
            totalAmountEl.textContent = price.toFixed(2);
        }

        function selectProduct(productId) {
            productItems.forEach(item => {
                item.classList.remove('ring-2', 'ring-red-400', 'shadow-xl', 'bg-gray-50');
            });

            selectedProduct = products.find(p => p.id === productId);

            const selectedItem = document.querySelector(`[data-product-id="${productId}"]`);
            if (selectedItem) {
                selectedItem.classList.add('ring-2', 'ring-red-400', 'shadow-xl', 'bg-gray-50');
            }

            updateOrderSummary();
        }

        if (products.length > 0) {
            selectProduct(products[0].id);
        }

        productItems.forEach(item => {
            item.addEventListener('click', () => {
                const productId = parseInt(item.dataset.productId);
                selectProduct(productId);
            });
        });

        function showSnackbar(message, isError = false) {
            let snackbar = document.createElement('div');
            snackbar.textContent = message;
            snackbar.classList.add(
                'fixed', 'bottom-5', 'right-5', 'px-6', 'py-3', 'rounded-lg', 'shadow-lg', 'text-white',
                'text-lg', 'font-semibold',
                'transition-all', 'duration-300', 'ease-in-out', 'z-50'
            );

            if (isError) {
                snackbar.classList.add('bg-red-600');
            } else {
                snackbar.classList.add('bg-green-600');
            }

            document.body.appendChild(snackbar);

            setTimeout(() => {
                snackbar.classList.add('opacity-0');
                setTimeout(() => {
                    snackbar.remove();
                }, 300);
            }, 3000);
        }

        addToCartBtn.addEventListener('click', () => {
            if (!selectedProduct) return;

            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            // Check if the product is already in the cart
            const productExists = cart.some(item => item.id === selectedProduct.id);

            if (productExists) {
                showSnackbar(`❌ "${selectedProduct.title}" is already in your cart!`, true);
                return;
            }

            // Save the full product object including exam & vendor details
            const cartItem = {
                id: selectedProduct.id,
                title: selectedProduct.title,
                full_price: selectedProduct.full_price,
                price: selectedProduct.price,
                off: selectedProduct.off,
                cart: selectedProduct.cart,
                vendor_perma: examDetails.vendor_perma,
                vendor_title: examDetails.vendor_title,
                exam_code: examDetails.exam_code,
                exam_title: examDetails.exam_title
            };

            cart.push(cartItem);
            localStorage.setItem('cart', JSON.stringify(cart));
            window.dispatchEvent(new Event("cartChanged"));
            showSnackbar(`✅ "${selectedProduct.title}" added to cart!`);
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Only run countdown if exam isn't retired.
        const isRetired = @json($examDetails['exam']->exam_retired);
        if (!isRetired) {
            // Get the countdown element by the new id "saleCountdown"
            const countdownEl = document.getElementById('saleCountdown');
            if (countdownEl) {
                const countdownKey = 'megaSaleCountdownTarget';

                function updateCountdown() {
                    // Retrieve target time and convert to a number
                    let targetTime = Number(localStorage.getItem(countdownKey));
                    const now = Date.now();

                    // If no valid target time stored, set one for 16 hours from now.
                    if (!targetTime || isNaN(targetTime)) {
                        targetTime = now + (16 * 60 * 60 * 1000);
                        localStorage.setItem(countdownKey, targetTime);
                    }

                    let diff = targetTime - now;

                    // If the countdown has expired, reset for the next 16 hours.
                    if (diff <= 0) {
                        targetTime = now + (16 * 60 * 60 * 1000);
                        localStorage.setItem(countdownKey, targetTime);
                        diff = targetTime - now;
                    }

                    const hours = Math.floor(diff / (1000 * 60 * 60));
                    const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((diff % (1000 * 60)) / 1000);

                    countdownEl.textContent = `${hours}h ${minutes}m ${seconds}s`;
                }

                // Run the update immediately and then every second.
                updateCountdown();
                setInterval(updateCountdown, 1000);
            }
        }
    });
</script>
