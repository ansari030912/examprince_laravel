<div class="lg:pr-5 pt-1 pb-7">
    <button id="downloadDemoBtn"
        class="rounded-full bg-red-600 hover:bg-red-500 cursor-pointer focus:ring-4 focus:ring-red-200 text-white font-semibold h-10 w-full px-7 py-4 flex items-center justify-center gap-2 transition duration-200"
        type="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24">
            <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <path fill="none" stroke-dasharray="14" stroke-dashoffset="14" d="M6 19h12">
                    <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.4s" values="14;0" />
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

<!-- Modal for Demo Downloads -->
<div id="demoModalWrapper" class="hidden fixed inset-0 z-50">
    <!-- Outer container toggles hidden; inner container uses flex -->
    <div class="flex items-center justify-center h-full">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-transparent backdrop-blur-sm"></div>
        <!-- Modal Content Container -->
        <div class="relative z-10 bg-white rounded-lg shadow-lg w-full max-w-2xl p-4 mx-4">
            <!-- Modal Header -->
            <div class="flex justify-between items-center border-b pb-2">
                <h3 class="text-xl font-semibold text-purple-600">First Try Then Buy!</h3>
                <button id="modalCloseBtn" class="text-white bg-red-600 rounded-full p-2 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 32 32">
                        <path fill="currentColor"
                            d="M16 2C8.2 2 2 8.2 2 16s6.2 14 14 14 14-6.2 14-14S23.8 2 16 2m0 26C9.4 28 4 22.6 4 16S9.4 4 16 4s12 5.4 12 12-5.4 12-12 12" />
                        <path fill="currentColor"
                            d="M21.4 23L16 17.6 10.6 23 9 21.4l5.4-5.4L9 10.6l1.6-1.6 5.4 5.4L21.4 9l1.6 1.6-5.4 5.4 5.4 5.4z" />
                    </svg>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="mt-4">
                <div class="flex flex-col lg:flex-row items-center">
                    <div class="w-full flex justify-center mb-4 lg:mb-0">
                        <img src="{{ asset('package-small-min_optimized.png') }}" alt="Product"
                            style="max-width: 230px; margin-right: 20px;" />
                    </div>
                    <div class="w-full">
                        <ul class="list-none p-0 space-y-1">
                            <li>✔ Complimentary Regular Updates</li>
                            <li>✔ Validated by Certified IT Professionals</li>
                            <li>✔ Immediate Access to Downloads</li>
                            <li>✔ Current and Comprehensive Study Guides</li>
                            <li>✔ 99.5% Proven Success Rate</li>
                            <li>✔ Completely Accurate Answer Key</li>
                        </ul>
                    </div>
                </div>
                <!-- Email Input Form -->
                <div id="downloadFormWrapper" class="mt-4">
                    <input id="demoEmail" type="email" placeholder="Enter Your Email"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-200" />
                    <p id="demoEmailError" class="text-red-500 text-sm mt-1"></p>
                </div>
            </div>
            <!-- Modal Actions -->
            <div class="mt-4 flex flex-col space-y-2" id="demoActions">
                <button id="getDemoBtn"
                    class="bg-green-500 rounded-full hover:bg-green-700 cursor-pointer focus:ring-4 focus:ring-gray-200 text-white font-semibold h-10 w-full px-7 py-4 flex items-center justify-center gap-2 transition duration-200 border border-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                        <g stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path fill="none" stroke-dasharray="14" stroke-dashoffset="14" d="M6 19h12">
                                <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.4s"
                                    values="14;0" />
                            </path>
                            <path fill="white" d="M12 4 h2 v6 h2.5 L12 14.5M12 4 h-2 v6 h-2.5 L12 14.5">
                                <animate attributeName="d" calcMode="linear" dur="1.5s" keyTimes="0;0.7;1"
                                    repeatCount="indefinite"
                                    values="M12 4 h2 v6 h2.5 L12 14.5M12 4 h-2 v6 h-2.5 L12 14.5;M12 4 h2 v3 h2.5 L12 11.5M12 4 h-2 v3 h-2.5 L12 11.5;M12 4 h2 v6 h2.5 L12 14.5M12 4 h-2 v6 h-2.5 L12 14.5" />
                            </path>
                        </g>
                    </svg>
                    <span class="text-lg">Get Demo Downloads</span>
                </button>
                <div id="demoDownloadLinks" class="hidden flex flex-col space-y-2">
                    <a id="pdfDownloadLink" href="#" target="_blank"
                        class="bg-purple-600 rounded-full hover:bg-purple-800 focus:ring-4 focus:ring-gray-200 text-white font-semibold h-10 w-full px-7 py-4 flex items-center justify-center gap-2 transition duration-200">
                        Download PDF
                    </a>
                    <a id="teDownloadLink" href="#" target="_blank"
                        class="bg-purple-600 rounded-full hover:bg-purple-800 focus:ring-4 focus:ring-gray-200 text-white font-semibold h-10 w-full px-7 py-4 flex items-center justify-center gap-2 transition duration-200">
                        Download Test Engine
                    </a>
                </div>
            </div>
            <div class="px-3 pb-2">
                <p class="text-center text-base text-red-500">
                    (We will send your demo download links to your email address)
                </p>
                <p class="text-center text-base mt-2 text-red-500">
                    ** We value your privacy. We will not share your email address.
                </p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const downloadDemoBtn = document.getElementById('downloadDemoBtn');
        const demoModalWrapper = document.getElementById('demoModalWrapper');
        const modalCloseBtn = document.getElementById('modalCloseBtn');
        const getDemoBtn = document.getElementById('getDemoBtn');
        const demoEmailInput = document.getElementById('demoEmail');
        const demoEmailError = document.getElementById('demoEmailError');
        const demoDownloadLinks = document.getElementById('demoDownloadLinks');
        const downloadFormWrapper = document.getElementById('downloadFormWrapper');
        const pdfDownloadLink = document.getElementById('pdfDownloadLink');
        const teDownloadLink = document.getElementById('teDownloadLink');

        // Replace these constants with your actual API details
        const Base_URL = 'https://certsgang.com';
        const X_API_Key = 'b46279cb-13bb-4445-a6f9-6f252b61ae79';
        const exam_perma = "{{ $examDetails['exam']->exam_perma }}";

        // Open modal when Download Demo button is clicked
        downloadDemoBtn.addEventListener('click', function() {
            demoModalWrapper.classList.remove('hidden');
        });

        // Close modal when close button is clicked
        modalCloseBtn.addEventListener('click', function() {
            demoModalWrapper.classList.add('hidden');
        });

        // Validate email and call API to get demo download links
        getDemoBtn.addEventListener('click', async function() {
            const email = demoEmailInput.value.trim();
            if (!email) {
                demoEmailError.textContent = "Email is required";
                return;
            }
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                demoEmailError.textContent = "Please enter a valid email address";
                return;
            }
            demoEmailError.textContent = "";

            try {
                const response = await axios.post(`${Base_URL}/v1/demo`, {
                    email: email,
                    exam_perma: exam_perma,
                }, {
                    headers: {
                        "x-api-key": X_API_Key,
                    },
                });
                const demoLinks = response.data;
                const pdfLink = demoLinks.find(link => link.type === "pdf")?.link;
                const teLink = demoLinks.find(link => link.type === "te")?.link;
                // Reset email field and show download links, hide the Get Demo button
                demoEmailInput.value = "";
                downloadFormWrapper.classList.add('hidden');
                getDemoBtn.classList.add('hidden');
                demoDownloadLinks.classList.remove('hidden');
                pdfDownloadLink.href = `https://certsgang.com${pdfLink}`;
                teDownloadLink.href = `https://certsgang.com${teLink}`;
            } catch (error) {
                console.error("Error fetching demo download links:", error);
            }
        });
    });
</script>
