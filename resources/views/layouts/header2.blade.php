@php
    use App\Models\Vendor;
    use App\Models\Exam;
    use App\Models\Certificate;
    use App\Models\ExamCertificate;

    $vendors = Vendor::all();
    $exams = Exam::all();
    $certifications = Certificate::all();

    foreach ($certifications as $certification) {
        $examCert = ExamCertificate::where('cert_id', $certification->cert_id)->first(); // Find matching exam certificate
        if ($examCert) {
            $vendor = Vendor::where('vendor_id', $examCert->vendor_id)->first(); // Find vendor
            if ($vendor) {
                $certification->vendor_title = $vendor->vendor_title;
                $certification->vendor_perma = $vendor->vendor_perma;
            }
        }
    }
@endphp

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
            <li style="padding: 10px; border: 1px solid #22C55E; text-align: center;">
                <b>See all search for "<span id="search-query"></span>"</b>
            </li>

            <!-- Exams -->
            <li class="bg-green-500 text-white font-bold text-xl text-center"
                style="padding: 10px; border: 1px solid #22C55E;">
                Exams - <span id="exam-count">0</span>
            </li>
            @foreach ($exams as $exam)
                <li class="exam-item hover:bg-gray-200 flex"
                    style="padding: 10px; border: 1px solid #22C55E; cursor: pointer;"
                    data-title="{{ strtolower($exam->exam_title) }}">
                    <a href="{{ url('exam-questions/' . $exam->vendor_perma . '/' . $exam->exam_perma) }}"
                        class="text-gray-700 font-bold hover:text-green-500">
                        <img src="{{ url('/package-small-min_optimized.png') }}" class="mr-3 mt-1"
                            style="width: 40px; height: 40px;" alt="Exam Image" />
                        <div>
                            {{ $exam->exam_title }} ({{ $exam->exam_code }})
                        </div>
                    </a>
                </li>
            @endforeach

            <!-- Vendors -->
            <li class="bg-green-500 text-white font-bold text-xl text-center"
                style="padding: 10px; border: 1px solid #22C55E;">
                Vendors - <span id="vendor-count">0</span>
            </li>
            @foreach ($vendors as $vendor)
                <li class="vendor-item hover:bg-gray-200 flex"
                    style="padding: 10px; border: 1px solid #22C55E; cursor: pointer;"
                    data-title="{{ strtolower($vendor->vendor_title) }}">
                    <a href="{{ url('exam-provider/' . $vendor->vendor_perma) }}"
                        class="text-gray-700 font-bold hover:text-green-500">
                        <img src="{{ asset('vendors/' . $vendor->vendor_perma . '.png') }}"
                            alt="{{ $vendor->vendor_title }}" class="mr-3 mt-1" style="width: 40px; height: 40px;">
                        <div>
                            {{ $vendor->vendor_title }}
                        </div>
                    </a>
                </li>
            @endforeach

            <!-- Certifications -->
            <li class="bg-green-500 text-white font-bold text-xl text-center"
                style="padding: 10px; border: 1px solid #22C55E;">
                Certifications - <span id="certification-count">0</span>
            </li>
            @foreach ($certifications as $certification)
                @if (!empty($certification->vendor_perma))
                    {{-- Ensure vendor data exists --}}
                    <li class="certification-item hover:bg-gray-200 flex"
                        style="padding: 10px; border: 1px solid #22C55E; cursor: pointer;"
                        data-title="{{ strtolower($certification->cert_title) }}">
                        <a href="{{ url('vendor-exam-questions/' . $certification->vendor_perma . '/' . $certification->cert_perma) }}"
                            class="text-gray-700 font-bold hover:text-green-500">
                            <img src="{{ url('/package-small-min_optimized.png') }}" class="mr-3 mt-1"
                                style="width: 40px; height: 40px;" alt="Certification Image">
                            <div>
                                {{ $certification->cert_title }} ({{ $certification->vendor_title }})
                            </div>
                        </a>
                        <div>{{ $certification->cert_name }}</div>
                    </li>
                @endif
            @endforeach
        </div>
    </ul>
</div>


<script>
    document.getElementById("search-input").addEventListener("input", function() {
        let searchValue = this.value.toLowerCase().trim();
        let searchResults = document.getElementById("search-results");
        let searchQuery = document.getElementById("search-query");
        let examItems = document.querySelectorAll(".exam-item");
        let vendorItems = document.querySelectorAll(".vendor-item");
        let certificationItems = document.querySelectorAll(".certification-item");
        let examCount = document.getElementById("exam-count");
        let vendorCount = document.getElementById("vendor-count");
        let certificationCount = document.getElementById("certification-count");

        if (searchValue.length === 0) {
            searchResults.style.display = "none";
            examCount.textContent = 0;
            vendorCount.textContent = 0;
            certificationCount.textContent = 0;
            return;
        }

        searchQuery.textContent = searchValue;
        let examVisible = 0;
        let vendorVisible = 0;
        let certificationVisible = 0;

        // Filter Exams (limit 50)
        examItems.forEach((item, index) => {
            let text = item.dataset.title;
            if (text.includes(searchValue) && examVisible < 50) {
                item.style.display = "block";
                examVisible++;
            } else {
                item.style.display = "none";
            }
        });

        // Filter Vendors (limit 20)
        vendorItems.forEach((item, index) => {
            let text = item.dataset.title;
            if (text.includes(searchValue) && vendorVisible < 20) {
                item.style.display = "block";
                vendorVisible++;
            } else {
                item.style.display = "none";
            }
        });

        // Filter Certifications (limit 30)
        certificationItems.forEach((item, index) => {
            let text = item.dataset.title;
            if (text.includes(searchValue) && certificationVisible < 30) {
                item.style.display = "block";
                certificationVisible++;
            } else {
                item.style.display = "none";
            }
        });

        examCount.textContent = examVisible;
        vendorCount.textContent = vendorVisible;
        certificationCount.textContent = certificationVisible;
        searchResults.style.display = (examVisible + vendorVisible + certificationVisible) > 0 ? "block" :
            "none";
    });

    document.addEventListener("click", function(event) {
        let searchBox = document.getElementById("search-input");
        let searchResults = document.getElementById("search-results");

        if (!searchBox.contains(event.target) && !searchResults.contains(event.target)) {
            searchResults.style.display = "none";
        }
    });
</script>
