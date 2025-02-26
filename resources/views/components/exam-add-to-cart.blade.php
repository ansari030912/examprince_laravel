<hr class="-mt-20" style="border:2px solid #F5F6FA">
<div class="w-full lg:w-12/12 p-4">
    <div class="MuiGrid-root MuiGrid-container MuiGrid-spacing-xs-2 css-isbt42">
        <div class="MuiGrid-root MuiGrid-item MuiGrid-grid-xs-12 MuiGrid-grid-md-5 css-1r482s6">
            <div class="lg:pr-5 pt-1 pb-7">
                <button
                    class="rounded-full bg-red-600 hover:bg-red-500 cursor-pointer focus:ring-4 focus:ring-red-200 text-white font-semibold h-10 w-full px-7 py-4 flex items-center justify-center gap-2 transition duration-200"
                    type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24">
                        <g stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2">
                            <path fill="none" strokeDasharray="14" strokeDashoffset="14" d="M6 19h12">
                                <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.4s"
                                    values="14;0" />
                            </path>
                            <path fill="currentColor" d="M12 4 h2 v6 h2.5 L12 14.5M12 4 h-2 v6 h-2.5 L12 14.5">
                                <animate attributeName="d" calcMode="linear" dur="1.5s" keyTimes="0;0.7;1"
                                    repeatCount="indefinite"
                                    values="M12 4 h2 v6 h2.5 L12 14.5M12 4 h-2 v6 h-2.5 L12 14.5;M12 4 h2 v3 h2.5 L12 11.5M12 4 h-2 v3 h-2.5 L12 11.5;M12 4 h2 v6 h2.5 L12 14.5M12 4 h-2 v6 h-2.5 L12 14.5" />
                            </path>
                        </g>
                    </svg>
                    <span class="text-lg">Download Demo</span>
                </button>
            </div>
            <hr class="mb-4 mr-5" style="border:2px solid #F5F6FA">
            <p class="text-xl font-bold text-gray-700 mb-4">Select Product</p>
            <div class="MuiGrid-root MuiGrid-container MuiGrid-spacing-xs-2">
                @foreach ($examDetails['examPrices'] as $index => $product)
                    <div class="MuiGrid-root MuiGrid-item MuiGrid-grid-xs-12 css-q56oe5">
                        <div class="transition duration-300 ease-in-out transform hover:scale-105 MuiBox-root css-1npz1le product-item"
                            data-product-id="{{ $product->id }}">
                            <div class="MuiCardContent-root mb-4 css-1qw96cp">
                                @if ($product->off == 70)
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
                                        <p style="margin-bottom:20px;">
                                            @if ($product->title === 'Full Premium Bundle')
                                                PDF, Test Engine & Training Course Bundle
                                            @elseif($product->title === 'PDF & Test Engine Bundle')
                                                Printable PDF & Test Engine Bundle
                                            @elseif($product->title === 'Training Course Only')
                                                282 Lectures (23 Hours)
                                            @elseif($product->title === 'Test Engine Only')
                                                Test Engine File for 3 devices
                                            @elseif($product->title === 'PDF Only')
                                                Printable Premium PDF only
                                            @endif
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="MuiTypography-root MuiTypography-h6 css-1oir7cy">
                                            ${{ number_format($product->price, 2) }}
                                        </h6>
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
                <p class="text-xl mb-4 font-bold text-blue-600">Microsoft</p>
                <div class="MuiGrid-root MuiGrid-container MuiGrid-spacing-xs-2 css-o941x8">
                    <!-- Microsoft section content -->
                </div>
            </div>
            <hr style="border:1px solid #F5F6FA">
            <div
                class="MuiPaper-root MuiPaper-elevation MuiPaper-rounded MuiPaper-elevation1 MuiCard-root hidden lg:inline-block w-full css-xa7vfk">
                <p class="MuiTypography-root MuiTypography-body1 css-wesure">
                    <span style="color:#856404">Limited Time Mega Sale!</span>
                    <br>
                    <span style="color:#DC3545">(40-70% OFF)</span>
                </p>
                <p class="MuiTypography-root MuiTypography-body1 css-glm6n4">
                    Hurry up! offer ends in <span class="text-red-500" id="countdown">16h 0m 0s</span>
                </p>
            </div>
            <hr style="border:1px solid #F5F6FA;margin-bottom:20px">
            <div>
                <!-- Order summary section -->
                <span
                    class="font-heading text-lg my-4 pl-4 text-gray-600 font-semibold flex justify-between items-center">
                    Actual Amount :
                    <span style="position:relative;display:inline-block;color:red" class="text-xl">
                        $<span id="actualAmount">0</span>
                        <span
                            style="position:absolute;height:2px;width:100%;background-color:red;top:60%;left:0;transform:rotate(-5deg);transform-origin:left center"></span>
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
                    class="bg-green-600 rounded-full hover:bg-green-700 text-white font-semibold h-10 w-full px-7 py-4 flex items-center justify-center gap-2 transition duration-200">
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
        let selectedProduct = products[0];
        const productItems = document.querySelectorAll('.product-item');
        const actualAmountEl = document.getElementById('actualAmount');
        const discountPercentageEl = document.getElementById('discountPercentage');
        const totalAmountEl = document.getElementById('totalAmount');
        const addToCartBtn = document.getElementById('addToCartBtn');

        function updateOrderSummary() {
            if (!selectedProduct) return;

            // Convert string values to numbers before using toFixed
            const fullPrice = parseFloat(selectedProduct.full_price);
            const price = parseFloat(selectedProduct.price);

            // Update the summary section with selected product details
            actualAmountEl.textContent = fullPrice.toFixed(2);

            // Calculate discount percentage
            const discountPercentage = ((fullPrice - price) / fullPrice * 100).toFixed(0);
            discountPercentageEl.textContent = discountPercentage;

            // Update total amount
            totalAmountEl.textContent = price.toFixed(2);
        }

        function selectProduct(productId) {
            // Remove selection from all products first
            productItems.forEach(item => {
                item.classList.remove('ring-2', 'ring-red-400', 'shadow-xl');
                item.classList.remove('bg-gray-50');
            });

            // Find and select the new product
            selectedProduct = products.find(p => p.id === productId);

            // Add selection styling to the clicked product
            const selectedItem = document.querySelector(`[data-product-id="${productId}"]`);
            if (selectedItem) {
                selectedItem.classList.add('ring-2', 'ring-red-400', 'shadow-xl');
                selectedItem.classList.add('bg-gray-50');
            }

            // Update the summary
            updateOrderSummary();
        }

        // Add click event listeners to all product items
        productItems.forEach(item => {
            item.addEventListener('click', () => {
                const productId = parseInt(item.dataset.productId);
                selectProduct(productId);
            });
        });

        // Add to cart functionality
        addToCartBtn.addEventListener('click', () => {
            if (selectedProduct) {
                localStorage.setItem('cartItem', JSON.stringify(selectedProduct));
                alert('Product added to cart!');
            }
        });

        // Initialize with the first product selected
        if (products.length > 0) {
            selectProduct(products[0].id);
        }

        // Countdown timer functionality remains the same


    });
</script>
