<div
    class="w-auto p-2 flex transition-all 2xl:hidden duration-1000 ease-out opacity-100 translate-y-0 max-h-screen overflow-hidden">
    <input
        class="appearance-none px-6 py-3 w-full text-sm text-gray-700 font-bold bg-gray-50 placeholder-gray-300 outline-none border border-gray-100 focus:ring-1 focus:ring-gray-100 rounded-full"
        id="search-input" type="text" placeholder="Search..." />
</div>

<div id="search-results" style="display: none;">
    <ul
        style="background-color: white; color: gray; padding: 0; margin: 0; list-style: none; position: absolute; left: 0; width: 100%; border-radius: 0px; z-index: 1000;">
        <div style="max-height: 500px; overflow-y: auto; padding: 10px;">
            <!-- We will dynamically inject items via JS -->
        </div>
    </ul>
</div>

<script>
    const searchInput = document.getElementById("search-input");
    const searchResultsContainer = document.getElementById("search-results");
    const resultsList = searchResultsContainer.querySelector("ul > div");

    searchInput.addEventListener("input", async function() {
        const searchValue = this.value.trim();

        if (!searchValue) {
            searchResultsContainer.style.display = "none";
            resultsList.innerHTML = "";
            return;
        }

        // Make an AJAX request to our /search route
        try {
            const response = await fetch(`/search?q=${encodeURIComponent(searchValue)}`);
            if (!response.ok) throw new Error("Network response was not ok");
            const data = await response.json();

            // Build the dynamic HTML for results
            renderResults(data, searchValue);
        } catch (error) {
            console.error("Error fetching search results:", error);
        }
    });

    // Renders the JSON data into HTML
    function renderResults(data, query) {
        let html = `
            <li style="padding: 10px; border: 1px solid #22C55E; text-align: center;">
                <b>See all search for "<span id="search-query">${query}</span>"</b>
            </li>
        `;

        // Exams
        html += `
            <li class="bg-green-500 text-white font-bold text-xl text-center"
                style="padding: 10px; border: 1px solid #22C55E;">
                Exams - <span id="exam-count">${data.exams.length}</span>
            </li>
        `;

        data.exams.forEach(exam => {
            html += `
                <li class="hover:bg-gray-200 flex"
                    style="padding: 10px; border: 1px solid #22C55E; cursor: pointer;">
                    <a href="/exam-questions/${exam.vendor_perma}/${exam.exam_perma}"
                        class="text-gray-700 font-bold hover:text-green-500"
                    >
                        <img src="/package-small-min_optimized.png" class="mr-3 mt-1"
                             style="width: 40px; height: 40px;" alt="Exam Image" />
                        <div>
                            ${exam.exam_title} (${exam.exam_code})
                        </div>
                    </a>
                </li>
            `;
        });

        // Vendors
        html += `
            <li class="bg-green-500 text-white font-bold text-xl text-center"
                style="padding: 10px; border: 1px solid #22C55E;">
                Vendors - <span id="vendor-count">${data.vendors.length}</span>
            </li>
        `;

        data.vendors.forEach(vendor => {
            html += `
                <li class="hover:bg-gray-200 flex"
                    style="padding: 10px; border: 1px solid #22C55E; cursor: pointer;">
                    <a href="/exam-provider/${vendor.vendor_perma}"
                        class="text-gray-700 font-bold hover:text-green-500"
                    >
                        <img src="/vendors/${vendor.vendor_perma}.png"
                             alt="${vendor.vendor_title}" class="mr-3 mt-1"
                             style="width: 40px; height: 40px;">
                        <div>${vendor.vendor_title}</div>
                    </a>
                </li>
            `;
        });

        // Certifications
        html += `
            <li class="bg-green-500 text-white font-bold text-xl text-center"
                style="padding: 10px; border: 1px solid #22C55E;">
                Certifications - <span id="certification-count">${data.certifications.length}</span>
            </li>
        `;

        data.certifications.forEach(cert => {
            if (cert.vendor_perma) {
                html += `
                    <li class="hover:bg-gray-200 flex"
                        style="padding: 10px; border: 1px solid #22C55E; cursor: pointer;">
                        <a href="/vendor-exam-questions/${cert.vendor_perma}/${cert.cert_perma}"
                            class="text-gray-700 font-bold hover:text-green-500"
                        >
                            <img src="/package-small-min_optimized.png" class="mr-3 mt-1"
                                style="width: 40px; height: 40px;" alt="Certification Image">
                            <div>
                                ${cert.cert_title} (${cert.vendor_title ?? ''})
                            </div>
                        </a>
                        <div>${cert.cert_name ?? ''}</div>
                    </li>
                `;
            }
        });

        // Insert into DOM
        resultsList.innerHTML = html;
        searchResultsContainer.style.display = "block";
    }

    // Hide results if clicking outside
    document.addEventListener("click", function(event) {
        if (!searchInput.contains(event.target) && !searchResultsContainer.contains(event.target)) {
            searchResultsContainer.style.display = "none";
        }
    });
</script>
