<?php
// Product Enquiry Popup Modal
// Displays only when an "Enquiry" button is clicked
?>

<!-- Product Enquiry Popup Modal -->
<div id="website-enquiry-modal" 
     class="fixed inset-0 z-[9999] hidden items-center justify-center p-3 sm:p-5 bg-slate-950/65 backdrop-blur-sm transition-opacity duration-300"
     role="dialog" 
     aria-modal="true" 
     aria-labelledby="enquiry-modal-title">

    <!-- Modal Dialog Box -->
    <div id="enquiry-modal-card" 
         class="relative w-full max-w-4xl lg:max-w-5xl bg-white rounded-3xl shadow-2xl overflow-hidden border border-slate-100 transform transition-all duration-300 scale-95 opacity-0">
        
        <!-- Close Button (Top-Right) -->
        <button type="button" 
                onclick="closeEnquiryModal()" 
                aria-label="Close Modal" 
                class="absolute top-4 right-4 z-30 w-10 h-10 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 hover:text-slate-900 flex items-center justify-center transition-all shadow-sm focus:outline-none cursor-pointer">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <div class="grid grid-cols-1 md:grid-cols-12 items-stretch min-h-[500px]">
            
            <!-- Left Side: Dynamic Product Battery Image (Full-bleed, zero padding) -->
            <div class="relative md:col-span-5 w-full h-full min-h-[280px] md:min-h-full overflow-hidden bg-slate-900">
                <img id="enquiry-modal-img" 
                     src="https://cdn.shopify.com/s/files/1/0739/1887/3849/files/51-2v-300ah-15-3kwh-lithium-phosphate-home-power-storage-battery-946.webp?v=1781768581" 
                     data-default-src="https://cdn.shopify.com/s/files/1/0739/1887/3849/files/51-2v-300ah-15-3kwh-lithium-phosphate-home-power-storage-battery-946.webp?v=1781768581"
                     alt="CleanErgy Lithium Battery" 
                     class="w-full h-full object-cover object-center block">
            </div>

            <!-- Right Side: Contact Inputs Form -->
            <div class="md:col-span-7 p-6 sm:p-8 lg:p-10 flex flex-col justify-center bg-white">
                
                <!-- Heading & Selected Battery Name (No Quick Enquiry, No Subtext) -->
                <div class="mb-5">
                    <h3 id="enquiry-modal-title" class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight leading-tight">
                        Get In Touch With Our Specialists
                    </h3>
                    
                    <!-- Battery Name Directly Under Heading (Dot Removed) -->
                    <div class="mt-2.5 inline-flex items-center px-3.5 py-1.5 rounded-xl bg-emerald-50 border border-emerald-200/80 text-[#239B52] text-xs sm:text-sm font-bold">
                        <span id="enquiry-product-name-text">CleanErgy Battery System</span>
                    </div>
                </div>

                <!-- Form (Only Name, Mobile, Email - Dropdown Removed) -->
                <form id="enquiry-popup-form" onsubmit="handleEnquirySubmit(event)" class="space-y-4">
                    
                    <!-- Hidden input carrying the selected product name -->
                    <input type="hidden" name="product" id="enquiry-product-input" value="">

                    <!-- 1. Name Input -->
                    <div>
                        <label for="enquiry-name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Your Name <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" 
                               id="enquiry-name" 
                               name="name" 
                               required 
                               placeholder="e.g. John Anderson" 
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 text-slate-900 text-sm focus:border-[#12b3d6] focus:ring-2 focus:ring-[#12b3d6]/20 outline-none transition-all">
                    </div>

                    <!-- 2. Mobile Number Input -->
                    <div>
                        <label for="enquiry-phone" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Mobile Number <span class="text-rose-500">*</span>
                        </label>
                        <input type="tel" 
                               id="enquiry-phone" 
                               name="phone" 
                               required 
                               placeholder="e.g. +1 (555) 234-5678" 
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 text-slate-900 text-sm focus:border-[#12b3d6] focus:ring-2 focus:ring-[#12b3d6]/20 outline-none transition-all">
                    </div>

                    <!-- 3. Email Input -->
                    <div>
                        <label for="enquiry-email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Email <span class="text-rose-500">*</span>
                        </label>
                        <input type="email" 
                               id="enquiry-email" 
                               name="email" 
                               required 
                               placeholder="e.g. name@gmail.com" 
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 text-slate-900 text-sm focus:border-[#12b3d6] focus:ring-2 focus:ring-[#12b3d6]/20 outline-none transition-all">
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit" 
                                id="enquiry-submit-btn" 
                                class="w-full py-3.5 px-6 rounded-full bg-[#12b3d6] hover:bg-[#0ea5e9] text-white font-bold text-sm sm:text-base shadow-sm hover:shadow-md transition-all active:scale-[0.99] cursor-pointer flex items-center justify-center gap-2">
                            <span>Submit Enquiry</span>
                            <span>→</span>
                        </button>
                    </div>

                    <!-- Success Message Alert (Hidden by default) -->
                    <div id="enquiry-success-msg" class="hidden p-3.5 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs sm:text-sm font-semibold text-center">
                        ✓ Thank you! Your enquiry has been received. Our team will contact you shortly.
                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<!-- Enquiry Modal Control Script -->
<script>
function openEnquiryModal(productName = '', productImg = '') {
    const modal = document.getElementById('website-enquiry-modal');
    const card = document.getElementById('enquiry-modal-card');
    const form = document.getElementById('enquiry-popup-form');
    const btn = document.getElementById('enquiry-submit-btn');
    const successMsg = document.getElementById('enquiry-success-msg');
    const prodTitleEl = document.getElementById('enquiry-product-name-text');
    const prodInput = document.getElementById('enquiry-product-input');
    const modalImg = document.getElementById('enquiry-modal-img');

    if (!modal || !card) return;

    // Reset previous submit state
    if (btn) {
        btn.disabled = false;
        btn.classList.remove('hidden');
        btn.innerHTML = '<span>Submit Enquiry</span><span>→</span>';
    }
    if (successMsg) {
        successMsg.classList.add('hidden');
    }

    // Set Product Name under Heading and in hidden input
    const displayName = (productName || 'CleanErgy Battery System').trim();
    if (prodTitleEl) {
        prodTitleEl.textContent = displayName;
    }
    if (prodInput) {
        prodInput.value = displayName;
    }

    // Set specific product image on left side
    if (modalImg) {
        if (productImg && productImg.trim() !== '') {
            modalImg.src = productImg;
        } else if (modalImg.getAttribute('data-default-src')) {
            modalImg.src = modalImg.getAttribute('data-default-src');
        }
    }

    modal.classList.remove('hidden');
    modal.classList.add('flex');
    
    // Smooth transition
    requestAnimationFrame(() => {
        card.classList.remove('scale-95', 'opacity-0');
        card.classList.add('scale-100', 'opacity-100');
    });
}

function closeEnquiryModal() {
    const modal = document.getElementById('website-enquiry-modal');
    const card = document.getElementById('enquiry-modal-card');
    if (!modal || !card) return;

    card.classList.remove('scale-100', 'opacity-100');
    card.classList.add('scale-95', 'opacity-0');

    setTimeout(() => {
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }, 250);
}

// Close when clicking outside on backdrop
document.addEventListener('click', function(e) {
    const modal = document.getElementById('website-enquiry-modal');
    if (modal && !modal.classList.contains('hidden') && e.target === modal) {
        closeEnquiryModal();
    }
});

// Close when pressing Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeEnquiryModal();
    }
});

// Global Click Delegation for all Enquiry & Get a Quote buttons across all pages
document.addEventListener('click', function(e) {
    const el = e.target.closest('a, button');
    if (!el) return;

    const text = (el.textContent || '').trim().toLowerCase();
    const href = el.getAttribute('href') || '';
    const isEnquiryOrQuoteBtn = el.hasAttribute('data-enquiry-btn') || 
                                el.hasAttribute('data-quote-btn') ||
                                text === 'enquiry' || 
                                text === 'enquiry now' || 
                                text === 'enquire' || 
                                text === 'enquire now' || 
                                text === 'get a quote' ||
                                text === 'get quote' ||
                                text.includes('get a quote') ||
                                text.includes('get quote') ||
                                href === '#quote' ||
                                href.includes('#quote') ||
                                (href.includes('#contact') && (text.includes('enquiry') || text.includes('quote')));

    if (isEnquiryOrQuoteBtn) {
        e.preventDefault();

        // Extract product name and image if within a card
        let prodName = el.getAttribute('data-product-title') || '';
        let prodImg = el.getAttribute('data-product-image') || '';

        if (!prodName) {
            const card = el.closest('article, .product-card, div.rounded-3xl, div.rounded-2xl, div.border');
            if (card) {
                const titleEl = card.querySelector('h2, h3, h4, .product-title');
                if (titleEl) prodName = titleEl.textContent.trim();

                const imgEl = card.querySelector('img');
                if (imgEl) prodImg = imgEl.src;
            }
        }

        if (!prodName) {
            if (text.includes('quote') || href.includes('quote')) {
                prodName = 'Custom Battery Quote';
            } else {
                prodName = 'CleanErgy Battery System';
            }
        }

        openEnquiryModal(prodName, prodImg);
    }
});

// Form Submission Handler
function handleEnquirySubmit(e) {
    e.preventDefault();
    const btn = document.getElementById('enquiry-submit-btn');
    const successMsg = document.getElementById('enquiry-success-msg');
    
    if (btn) {
        btn.disabled = true;
        btn.innerHTML = 'Sending...';
    }

    setTimeout(() => {
        if (btn) btn.classList.add('hidden');
        if (successMsg) successMsg.classList.remove('hidden');

        // Automatically close after 2.5 seconds
        setTimeout(() => {
            closeEnquiryModal();
        }, 2500);
    }, 700);
}
</script>
