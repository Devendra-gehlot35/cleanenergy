<?php
// On-Load / Reload Lead Popup Modal
// Automatically displays when website reloads/loads
?>

<!-- Reload Lead Generation Popup Modal -->
<div id="website-reload-modal" 
     class="fixed inset-0 z-[9999] hidden items-center justify-center p-3 sm:p-5 bg-slate-950/65 backdrop-blur-sm transition-opacity duration-300"
     role="dialog" 
     aria-modal="true" 
     aria-labelledby="reload-modal-title">

    <!-- Modal Dialog Box -->
    <div id="reload-modal-card" 
         class="relative w-full max-w-4xl lg:max-w-5xl bg-white rounded-3xl shadow-2xl overflow-hidden border border-slate-100 transform transition-all duration-300 scale-95 opacity-0">
        
        <!-- Close Button (Top-Right) -->
        <button type="button" 
                onclick="closeReloadModal()" 
                aria-label="Close Modal" 
                class="absolute top-4 right-4 z-30 w-10 h-10 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 hover:text-slate-900 flex items-center justify-center transition-all shadow-sm focus:outline-none cursor-pointer">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <div class="grid grid-cols-1 md:grid-cols-12 items-stretch min-h-[520px]">
            
            <!-- Left Side: Full-bleed Battery Image (No padding, no white space) -->
            <div class="relative md:col-span-5 w-full h-full min-h-[280px] md:min-h-full overflow-hidden bg-slate-900">
                <img src="https://cdn.shopify.com/s/files/1/0739/1887/3849/files/51-2v-300ah-15-3kwh-lithium-phosphate-home-power-storage-battery-946.webp?v=1781768581" 
                     alt="CleanErgy Lithium Battery" 
                     class="w-full h-full object-cover object-center block">
            </div>

            <!-- Right Side: Contact Inputs Form -->
            <div class="md:col-span-7 p-6 sm:p-8 lg:p-10 flex flex-col justify-center bg-white">
                
                <div class="mb-5">
                    <div class="inline-flex items-center px-3 py-1 rounded-full bg-[#d7f3fb] text-slate-800 text-xs font-semibold mb-2.5">
                        Quick Enquiry
                    </div>
                    <h3 id="reload-modal-title" class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight leading-tight">
                        Get In Touch With Our Specialists
                    </h3>
                    <p class="text-slate-500 text-xs sm:text-sm mt-1">
                        Fill in your details below for custom sizing, quotes &amp; availability.
                    </p>
                </div>

                <!-- Form -->
                <form id="reload-enquiry-form" onsubmit="handleReloadSubmit(event)" class="space-y-3.5">
                    
                    <!-- Name Input -->
                    <div>
                        <label for="reload-name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                            Your Name <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" 
                               id="reload-name" 
                               name="name" 
                               required 
                               placeholder="e.g. John Anderson" 
                               class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-slate-900 text-sm focus:border-[#12b3d6] focus:ring-2 focus:ring-[#12b3d6]/20 outline-none transition-all">
                    </div>

                    <!-- Phone Number Input -->
                    <div>
                        <label for="reload-phone" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                            Phone Number <span class="text-rose-500">*</span>
                        </label>
                        <input type="tel" 
                               id="reload-phone" 
                               name="phone" 
                               required 
                               placeholder="e.g. +1 (555) 234-5678" 
                               class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-slate-900 text-sm focus:border-[#12b3d6] focus:ring-2 focus:ring-[#12b3d6]/20 outline-none transition-all">
                    </div>

                    <!-- Email Input -->
                    <div>
                        <label for="reload-email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                            Email <span class="text-rose-500">*</span>
                        </label>
                        <input type="email" 
                               id="reload-email" 
                               name="email" 
                               required 
                               placeholder="e.g. name@gmail.com" 
                               class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-slate-900 text-sm focus:border-[#12b3d6] focus:ring-2 focus:ring-[#12b3d6]/20 outline-none transition-all">
                    </div>

                    <!-- Product Dropdown Input -->
                    <div>
                        <label for="reload-product" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                            Select Battery Product <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <select id="reload-product" 
                                    name="product" 
                                    required 
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-slate-900 text-sm focus:border-[#12b3d6] focus:ring-2 focus:ring-[#12b3d6]/20 outline-none transition-all bg-white appearance-none cursor-pointer pr-10">
                                <option value="" disabled selected>-- Choose Battery Product --</option>
                                <option value="Sodium Ion Starting Battery 12V, 200Ah">Sodium Ion Starting Battery 12V, 200Ah ($251.95)</option>
                                <option value="51.2V 300Ah 15.3Kwh Lithium Phosphate Home Power Storage Battery">51.2V 300Ah 15.3Kwh Lithium Phosphate Home Storage ($1,792.45)</option>
                                <option value="Lithium Phosphate 51.2V 105Ah 5,460Wh">Lithium Phosphate 51.2V 105Ah 5,460Wh ($801.89)</option>
                                <option value="Lithium Phosphate 24V 100Ah 2,400Wh Battery">Lithium Phosphate 24V 100Ah 2,400Wh Battery ($518.87)</option>
                                <option value="Lithium Phosphate 12V 100Ah 1,200Wh Battery">Lithium Phosphate 12V 100Ah 1,200Wh Battery ($251.85)</option>
                                <option value="General Technical Inquiry">Other / Custom Battery Setup</option>
                            </select>
                            <!-- Dropdown arrow icon -->
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3.5 text-slate-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit" 
                                id="reload-submit-btn" 
                                class="w-full py-3 px-6 rounded-full bg-[#12b3d6] hover:bg-[#0ea5e9] text-white font-bold text-sm sm:text-base shadow-sm hover:shadow-md transition-all active:scale-[0.99] cursor-pointer flex items-center justify-center gap-2">
                            <span>Submit Enquiry</span>
                            <span>→</span>
                        </button>
                    </div>

                    <!-- Success Message Alert (Hidden by default) -->
                    <div id="reload-success-msg" class="hidden p-3 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs sm:text-sm font-semibold text-center">
                        ✓ Thank you! Your enquiry has been received. Our team will contact you shortly.
                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<!-- Reload Modal Control Logic (Runs ONLY on website reload/load) -->
<script>
function openReloadModal() {
    const modal = document.getElementById('website-reload-modal');
    const card = document.getElementById('reload-modal-card');
    if (!modal || !card) return;

    modal.classList.remove('hidden');
    modal.classList.add('flex');
    
    // Smooth transition
    requestAnimationFrame(() => {
        card.classList.remove('scale-95', 'opacity-0');
        card.classList.add('scale-100', 'opacity-100');
    });
}

function closeReloadModal() {
    // Record that the user closed the popup so it does not open again on reload
    try {
        localStorage.setItem('cleanergy_reload_popup_closed', 'true');
        sessionStorage.setItem('cleanergy_reload_popup_closed', 'true');
    } catch(err) {}

    const modal = document.getElementById('website-reload-modal');
    const card = document.getElementById('reload-modal-card');
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
    const modal = document.getElementById('website-reload-modal');
    if (modal && !modal.classList.contains('hidden') && e.target === modal) {
        closeReloadModal();
    }
});

// Close when pressing Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeReloadModal();
    }
});

// Auto open on page load/reload ONLY if not previously closed by user
window.addEventListener('load', function() {
    try {
        if (localStorage.getItem('cleanergy_reload_popup_closed') === 'true' || 
            sessionStorage.getItem('cleanergy_reload_popup_closed') === 'true') {
            return; // User has already closed it, do not show again
        }
    } catch(err) {}

    setTimeout(function() {
        openReloadModal();
    }, 600);
});

// Form Submission Handler
function handleReloadSubmit(e) {
    e.preventDefault();
    try {
        localStorage.setItem('cleanergy_reload_popup_closed', 'true');
        sessionStorage.setItem('cleanergy_reload_popup_closed', 'true');
    } catch(err) {}
    const btn = document.getElementById('reload-submit-btn');
    const successMsg = document.getElementById('reload-success-msg');
    
    if (btn) {
        btn.disabled = true;
        btn.innerHTML = 'Sending...';
    }

    setTimeout(() => {
        if (btn) btn.classList.add('hidden');
        if (successMsg) successMsg.classList.remove('hidden');

        // Automatically close after 2.5 seconds
        setTimeout(() => {
            closeReloadModal();
        }, 2500);
    }, 700);
}
</script>
