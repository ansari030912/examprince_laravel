import './bootstrap';
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
    // The exam_perma is output by Blade
    const exam_perma = document.getElementById('downloadDemoBtn').dataset.examPerma;

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
