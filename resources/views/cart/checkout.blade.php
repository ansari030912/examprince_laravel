@extends('layouts.app')

@section('meta_title', 'ExamPrince - Reset Password')
@section('meta_description',
    'Examprince is a premium provider of Real and Valid Exam Question and Answers of IT
    certification Exams. Pass your certification exam easily with PDF and test engine dumps in 2025.')
@section('meta_robots', 'no-index')
@section('meta_referrer', 'no-referrer')
@section('meta_canonical', url()->current())

@section('main-content')
    <section class="pt-9 pb-16 bg-white" style="border-radius: 12px;">
        <div class="container mx-auto px-4">
            <!-- Breadcrumb Navigation -->
            <div class="flex flex-wrap gap-2 mb-8">
                <a class="group" href="/">
                    <div class="flex flex-wrap items-center">
                        <span class="text-xs text-gray-500 group-hover:text-gray-900 transition duration-200">Home</span>
                        <div class="text-gray-500 group-hover:text-gray-900 transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <path
                                    d="M12.9465 9.40832L8.22986 4.69999C8.15239 4.62188 8.06022 4.55989 7.95867 4.51758C7.85712 4.47527 7.7482 4.45349 7.63819 4.45349C7.52818 4.45349 7.41926 4.47527 7.31771 4.51758C7.21616 4.55989 7.124 4.62188 7.04653 4.69999C6.89132 4.85613 6.8042 5.06734 6.8042 5.28749C6.8042 5.50764 6.89132 5.71885 7.04653 5.87499L11.1715 10.0417L7.04653 14.1667C6.89132 14.3228 6.8042 14.534 6.8042 14.7542C6.8042 14.9743 6.89132 15.1855 7.04653 15.3417C7.12371 15.4204 7.21574 15.483 7.31731 15.526C7.41887 15.5689 7.52794 15.5912 7.63819 15.5917C7.74845 15.5912 7.85752 15.5689 7.95908 15.526C8.06064 15.483 8.15268 15.4204 8.22986 15.3417L12.9465 10.6333C13.0311 10.5553 13.0986 10.4606 13.1448 10.3552C13.191 10.2497 13.2148 10.1359 13.2148 10.0208C13.2148 9.90574 13.191 9.7919 13.1448 9.68648C13.0986 9.58107 13.0311 9.48636 12.9465 9.40832Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                    </div>
                </a>
                <a class="group" href="#">
                    <div class="flex flex-wrap items-center">
                        <span
                            class="text-xs text-gray-500 group-hover:text-gray-900 transition duration-200">Checkout</span>
                        <div class="text-gray-500 group-hover:text-gray-900 transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <path
                                    d="M12.9465 9.40832L8.22986 4.69999C8.15239 4.62188 8.06022 4.55989 7.95867 4.51758C7.85712 4.47527 7.7482 4.45349 7.63819 4.45349C7.52818 4.45349 7.41926 4.47527 7.31771 4.51758C7.21616 4.55989 7.124 4.62188 7.04653 4.69999C6.89132 4.85613 6.8042 5.06734 6.8042 5.28749C6.8042 5.50764 6.89132 5.71885 7.04653 5.87499L11.1715 10.0417L7.04653 14.1667C6.89132 14.3228 6.8042 14.534 6.8042 14.7542C6.8042 14.9743 6.89132 15.1855 7.04653 15.3417C7.12371 15.4204 7.21574 15.483 7.31731 15.526C7.41887 15.5689 7.52794 15.5912 7.63819 15.5917C7.74845 15.5912 7.85752 15.5689 7.95908 15.526C8.06064 15.483 8.15268 15.4204 8.22986 15.3417L12.9465 10.6333C13.0311 10.5553 13.0986 10.4606 13.1448 10.3552C13.191 10.2497 13.2148 10.1359 13.2148 10.0208C13.2148 9.90574 13.191 9.7919 13.1448 9.68648C13.0986 9.58107 13.0311 9.48636 12.9465 9.40832Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Order Summary -->
            <div class="flex flex-wrap -m-4 justify-center">
                <div class="w-full lg:w-8/12 p-4">
                    <div class="px-4 py-6 border border-gray-200 rounded-2xl">
                        <h6 class="mb-4 text-2xl font-semibold text-center">Your order</h6>
                        <!-- Container for processed cart items -->
                        <div id="orderItems">
                            <p class="text-center text-gray-500">Loading your order...</p>
                        </div>
                    </div>

                    <!-- Checkout Form Details and Order Totals -->
                    <div id="checkoutDetails">
                        <br>
                        <div class="py-6 border-b border-dashed">
                            <h6 class="mb-4 text-lg font-semibold">Enter Your Detail</h6>
                            <div class="flex flex-wrap gap-4 mb-4">
                                <input id="fullName"
                                    class="py-3 px-4 w-full text-sm placeholder-gray-500 bg-gray-50 outline-none focus:ring focus:ring-gray-100 border-gray-100 rounded-lg transition duration-200"
                                    placeholder="Full Name" type="text" name="fullName">
                                <input id="email"
                                    class="py-3 px-4 w-full text-sm placeholder-gray-500 bg-gray-50 outline-none focus:ring focus:ring-gray-100 border-gray-100 rounded-lg transition duration-200"
                                    placeholder="Email" type="text" name="email">
                            </div>
                            <h6 class="mb-4 text-lg font-semibold">Discount Code</h6>
                            <form method="POST" action="{{ route('cart.coupon') }}">
                                @csrf
                                <div class="flex items-center gap-2">
                                    <input
                                        class="py-3 px-4 w-full text-sm placeholder-gray-500 bg-gray-50 outline-none focus:ring focus:ring-gray-100 border-gray-100 rounded-lg transition duration-200"
                                        placeholder="Enter your voucher" type="text" name="coupon">
                                    <button type="submit"
                                        class="py-3 px-7 w-full lg:w-auto text-sm text-white font-semibold bg-gray-900 hover:bg-gray-800 focus:bg-gray-900 rounded-5xl focus:ring-4 focus:ring-gray-200 transition duration-300">
                                        Apply
                                    </button>
                                </div>
                            </form>
                            <br />
                            @if (session('message'))
                                <p class="mt-4 text-sm font-semibold text-green-600 text-center">
                                    {{ session('message') }}
                                </p>
                            @endif
                            <p class="text-sm font-semibold text-green-600">
                                Coupon <span id="appliedCoupon" class="text-red-500 font-bold"></span> is Applied
                                Successfully.
                            </p>
                        </div>

                        <!-- Order Totals -->
                        <div class="py-5 border-b border-dashed">
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Subtotal</span>
                                <span id="subtotal" class="font-semibold text-xl text-red-500">$0.00</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Off</span>
                                <span id="off" class="font-semibold text-green-500 text-xl">0%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Discount</span>
                                <span id="discount" class="font-semibold text-green-500 text-xl">$0.00</span>
                            </div>
                        </div>
                        <div class="pt-6 flex justify-between items-center">
                            <p class="font-semibold text-2xl">Total Price</p>
                            <p id="totalPrice" class="text-2xl font-semibold text-green-500">$0.00</p>
                        </div>
                        <br>
                        <label class="flex items-center">
                            <input class="mr-2" id="terms" type="checkbox">
                            <span>I agree to the <a class="text-blue-400" href="/terms-and-conditions">terms and
                                    conditions</a></span>
                        </label>
                        <button id="checkoutBtn"
                            class="py-3 px-7 mt-6 w-full text-sm text-white font-semibold bg-blue-500 hover:bg-blue-600 focus:bg-blue-500 rounded-5xl focus:ring-4 focus:ring-gray-200 transition duration-300">
                            Check Out
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Snackbar element -->
    <div id="snackbar"
        style="visibility: hidden; min-width: 250px; margin-left: -125px; background-color: #333; color: #fff; text-align: center; border-radius: 2px; padding: 16px; position: fixed; z-index: 9999; left: 50%; bottom: 30px;">
    </div>

    <!-- Script to handle coupon application and update order summary -->
    <script>
        // Function to display a snackbar message
        function showSnackbar(message) {
            const snackbar = document.getElementById('snackbar');
            snackbar.innerText = message;
            snackbar.style.visibility = 'visible';
            snackbar.style.opacity = '1';
            setTimeout(() => {
                snackbar.style.transition = 'opacity 0.5s ease-out';
                snackbar.style.opacity = '0';
                // Hide after fade-out
                setTimeout(() => {
                    snackbar.style.visibility = 'hidden';
                }, 500);
            }, 3000);
        }

        // Coupon form submission with snackbar update and refreshing order data.
        document.querySelector('form[action="{{ route('cart.coupon') }}"]').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch("{{ route('cart.coupon') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.appliedCoupon) {
                        document.getElementById("appliedCoupon").innerText = data.appliedCoupon;
                        showSnackbar(data.message);
                        // After coupon is applied, update order summary using the new coupon
                        updateOrderSummary();
                    }
                })
                .catch(error => {
                    console.error("Error applying coupon:", error);
                    showSnackbar("Error applying coupon.");
                });
        });

        // Update the order summary using processed cart data from the controller.
        function updateOrderSummary() {
            const cartData = localStorage.getItem('cart');
            const checkoutDetails = document.getElementById('checkoutDetails');
            // Get the applied coupon code from your displayed element.
            const appliedCoupon = document.getElementById("appliedCoupon").innerText.trim();

            if (cartData) {
                fetch("{{ route('cart.process') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            cartData: cartData,
                            coupon: appliedCoupon // Pass the applied coupon here.
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Update the applied coupon display with the response from the process API.
                        if (data.appliedCoupon) {
                            document.getElementById("appliedCoupon").innerText = data.appliedCoupon;
                        }

                        const orderItemsContainer = document.getElementById('orderItems');
                        if (data.cartData && data.cartData.length > 0) {
                            let itemsHtml = "";
                            let subtotal = 0;
                            let totalPrice = 0;
                            let maxOff = 0;

                            data.cartData.forEach((item, index, arr) => {
                                let fullPrice = parseFloat(item.full_price);
                                let price = parseFloat(item.price);
                                subtotal += fullPrice;
                                totalPrice += price;
                                maxOff = Math.max(maxOff, parseFloat(item.off));
                                const borderClasses = index === arr.length - 1 ? "" :
                                    "border-b-1 border-gray-300 mb-4";

                                itemsHtml += `
                                       <div class="flex -m-2 ${borderClasses}" data-id="${item.id}">
                                            <div class="w-auto hidden lg:inline-flex p-2">
                                                <img class="rounded-lg" src="/package-small-min_optimized.png" alt="" width="160px">
                                            </div>
                                            <div class="p-2 pl-5 lg:pl-0 w-full flex flex-col justify-center">
                                                <div class="flex justify-between">
                                                    <div>
                                                        <p class="mb-1.5 font-semibold text-gray-600 text-lg">${item.exam_code}</p>
                                                        <p class="mb-1.5 font-semibold text-blue-500 text-base">${item.exam_title}</p>
                                                        <p class="mb-1.5 text-sm text-green-600">${item.title}</p>
                                                    </div>
                                                    <button class="delete-btn cursor-pointer flex flex-col justify-center" data-id="${item.id}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                                                            <path fill="red" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12z"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="flex justify-between">
                                                    <p class="text-base">x1</p>
                                                    <span class="text-xl font-bold text-green-500">$${item.price} / <span class="text-gray-500 text-sm line-through">$${item.full_price}</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    `;
                            });
                            orderItemsContainer.innerHTML = itemsHtml;
                            attachDeleteListeners();

                            let discount = subtotal - totalPrice;
                            document.getElementById("subtotal").innerText = "$" + subtotal.toFixed(2);
                            document.getElementById("discount").innerText = "$" + discount.toFixed(2);
                            document.getElementById("off").innerText = maxOff + "%";
                            document.getElementById("totalPrice").innerText = "$" + totalPrice.toFixed(2);
                            checkoutDetails.style.display = "block";
                        } else {
                            orderItemsContainer.innerHTML = "<p class='text-center text-gray-500'>No items found.</p>";
                            checkoutDetails.style.display = "none";
                            document.getElementById("subtotal").innerText = "$0.00";
                            document.getElementById("discount").innerText = "$0.00";
                            document.getElementById("off").innerText = "0%";
                            document.getElementById("totalPrice").innerText = "$0.00";
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        document.getElementById('orderItems').innerHTML =
                            "<p class='text-center text-red-500'>Failed to load order details.</p>";
                    });
            } else {
                document.getElementById('orderItems').innerHTML =
                    "<p class='text-center text-gray-500'>No cart data found in localStorage.</p>";
                checkoutDetails.style.display = "none";
            }
        }

        // Checkout button event listener.
        document.getElementById('checkoutBtn').addEventListener('click', function() {
            const checkoutBtn = this;
            const originalBtnText = checkoutBtn.innerHTML;

            const fullName = document.getElementById('fullName').value.trim();
            const email = document.getElementById('email').value.trim();
            const termsChecked = document.getElementById('terms').checked;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            // Field validations.
            if (!fullName) {
                showSnackbar("Full Name is required.");
                return;
            }
            if (!email) {
                showSnackbar("Email is required.");
                return;
            }
            if (!emailRegex.test(email)) {
                showSnackbar("Please enter a valid email address.");
                return;
            }
            if (!termsChecked) {
                showSnackbar("You must agree to the terms and conditions.");
                return;
            }

            // Disable the button and show loading spinner.
            checkoutBtn.disabled = true;
            checkoutBtn.innerHTML = `<svg class="animate-spin inline -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                              </svg> Loading...`;

            // Set a timer to remove loading state after 10 seconds.
            const loadingTimer = setTimeout(() => {
                checkoutBtn.disabled = false;
                checkoutBtn.innerHTML = originalBtnText;
            }, 5000);

            // All validations passed. Get client IP.
            fetch("/get-client-ip")
                .then(response => response.json())
                .then(ipData => {
                    const clientIp = ipData.ip || "0.0.0.0";
                    const appliedCoupon = document.getElementById("appliedCoupon").innerText.trim() ||
                        "MEGASALE";
                    const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
                    const cartItemValues = cartItems.map(item => item.cart);

                    const checkoutData = {
                        name: fullName,
                        email: email,
                        ip: clientIp,
                        coupon: appliedCoupon,
                        IsInvoice: false,
                        invoice_perma: "",
                        cart_items: cartItemValues
                    };

                    // Call the secure checkout API endpoint.
                    fetch("{{ route('cart.checkout.payment') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify(checkoutData)
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success === true) {
                                showSnackbar("We are redirecting you for payment to prepwise.");
                                setTimeout(() => {
                                    window.location.href = data.redirect_link;
                                }, 2000);
                            } else {
                                checkoutBtn.disabled = false;
                                checkoutBtn.innerHTML = originalBtnText;
                                showSnackbar(data.message || "Payment initiation failed.");
                            }
                        })
                        .catch(error => {
                            console.error("Error during checkout:", error);
                            checkoutBtn.disabled = false;
                            checkoutBtn.innerHTML = originalBtnText;
                            showSnackbar("Error initiating payment.");
                        });
                })
                .catch(error => {
                    console.error("Error fetching client IP:", error);
                    checkoutBtn.disabled = false;
                    checkoutBtn.innerHTML = originalBtnText;
                    showSnackbar("Error determining client IP.");
                });
        });

        // Attach click event listeners to delete buttons to update localStorage and refresh the view.
        function attachDeleteListeners() {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const itemId = this.getAttribute('data-id');
                    let cart = JSON.parse(localStorage.getItem('cart')) || [];
                    cart = cart.filter(item => item.id != itemId);
                    localStorage.setItem('cart', JSON.stringify(cart));
                    window.dispatchEvent(new Event("cartChanged"));
                    updateOrderSummary();
                });
            });
        }

        // Update order summary on page load.
        document.addEventListener('DOMContentLoaded', updateOrderSummary);
    </script>
@endsection
