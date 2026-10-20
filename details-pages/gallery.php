<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Gallery - CleanErgy Battery Installations & Setups</title>
    <meta name="description" content="Explore real-world CleanErgy LiFePO4 battery installations across marine yachts, RVs, home solar storage, and off-grid power systems.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,700;1,800;1,900&family=Playfair+Display:ital,wght@1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/dist/output.css?v=<?= filemtime(__DIR__ . '/../dist/output.css') ?>">
</head>
<body class="bg-white font-['Plus_Jakarta_Sans',sans-serif] text-slate-900 min-h-screen flex flex-col justify-between">

    <?php
    // Include Fixed Floating Navbar
    include __DIR__ . '/../components/navbar.php';

    // Gallery Items Collection
    $gallery_items = [
        [
            'id' => 1,
            'title' => 'Marine & Yacht Deep-Water Power Bank',
            'category' => 'marine',
            'category_name' => 'Marine & Boats',
            'image' => '/assets/yacht-faq.png',
            'specs' => '51.2V 105Ah Lithium Iron Phosphate Bank',
            'desc' => 'High-reliability dual battery bank installation powering luxury catamaran house loads, radar, winches, and navigation systems with zero fumes or maintenance.',
            'badge_color' => 'bg-[#12b3d6]'
        ],
        [
            'id' => 2,
            'title' => 'Off-Grid Adventure Van Boondocking Setup',
            'category' => 'rv',
            'category_name' => 'RVs & Campers',
            'image' => 'https://images.unsplash.com/photo-1523987355523-c7b5b0dd90a7?auto=format&fit=crop&w=1400&q=80',
            'specs' => '12.8V 300Ah High-Capacity System',
            'desc' => 'Custom campervan integration supporting high-draw induction cooktops, 12V air conditioning, and high-efficiency inverter charging during off-grid wilderness trips.',
            'badge_color' => 'bg-[#0ea5e9]'
        ],
        [
            'id' => 3,
            'title' => 'Residential Solar Clean Energy Storage Hub',
            'category' => 'solar',
            'category_name' => 'Solar & Home Energy',
            'image' => 'https://images.unsplash.com/photo-1509391365360-2e959784a276?auto=format&fit=crop&w=1400&q=80',
            'specs' => '48V Multi-Unit Wall Bank',
            'desc' => 'Seamless whole-home backup and net-metering energy storage system paired with rooftop solar arrays for uninterruptible power during outages.',
            'badge_color' => 'bg-[#239B52]'
        ],
        [
            'id' => 4,
            'title' => 'All-Weather Mountain Cabin Energy Station',
            'category' => 'offgrid',
            'category_name' => 'Off-Grid & Cabins',
            'image' => 'https://images.unsplash.com/photo-1510798831971-661eb04b3739?auto=format&fit=crop&w=1400&q=80',
            'specs' => 'Self-Heating Cold Weather LiFePO4 Units',
            'desc' => 'Sub-zero capable lithium system providing consistent 120V/240V split-phase power for remote winter cabins in Northern Michigan with solar and generator sync.',
            'badge_color' => 'bg-[#12b3d6]'
        ],
        [
            'id' => 5,
            'title' => 'Commercial Electric Golf Cart & Utility Fleet',
            'category' => 'fleet',
            'category_name' => 'Specialized & Fleet',
            'image' => 'https://images.unsplash.com/photo-1535131749006-b7f58c99034b?auto=format&fit=crop&w=1400&q=80',
            'specs' => '48V 105Ah Drop-In Conversion',
            'desc' => 'Lightweight lithium conversion replacing bulky 6V lead-acid batteries, achieving 3x runtime, faster acceleration, and quick 2.5-hour recharge cycles.',
            'badge_color' => 'bg-[#0284c7]'
        ],
        [
            'id' => 6,
            'title' => 'Professional Bass Fishing Trolling Motor Bank',
            'category' => 'marine',
            'category_name' => 'Marine & Boats',
            'image' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=1400&q=80',
            'specs' => '36V (3x 12V 100Ah Series) Setup',
            'desc' => 'Tournament-grade lightweight battery pack maintaining steady voltage throughout 12-hour fishing days without voltage drops or trolling sluggishness.',
            'badge_color' => 'bg-[#12b3d6]'
        ],
        [
            'id' => 7,
            'title' => 'Off-Road Overland Trailer Expedition Power',
            'category' => 'rv',
            'category_name' => 'RVs & Campers',
            'image' => 'https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?auto=format&fit=crop&w=1400&q=80',
            'specs' => '12V 200Ah Rugged Aluminum Cased Unit',
            'desc' => 'Heavy-duty vibration-resistant lithium configuration powering 12V fridge, water pumps, external LED camp lighting, and portable satellite internet.',
            'badge_color' => 'bg-[#0ea5e9]'
        ],
        [
            'id' => 8,
            'title' => 'Blue Water Offshore Sailboat Power Plant',
            'category' => 'marine',
            'category_name' => 'Marine & Boats',
            'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1400&q=80',
            'specs' => '24V 400Ah High-Current House Bank',
            'desc' => 'Long-range ocean passage lithium setup supporting continuous autopilot, watermakers, refrigeration, and hydro-generator input with Bluetooth telemetry.',
            'badge_color' => 'bg-[#12b3d6]'
        ],
        [
            'id' => 9,
            'title' => 'Agricultural Solar Water Pumping & Shed Power',
            'category' => 'solar',
            'category_name' => 'Solar & Home Energy',
            'image' => 'https://images.unsplash.com/photo-1497435334941-8c899ee9e8e9?auto=format&fit=crop&w=1400&q=80',
            'specs' => '48V Deep Cycle Renewable Setup',
            'desc' => 'Dedicated off-grid solar storage system powering automated irrigation controllers, security systems, and remote barn machinery without grid dependence.',
            'badge_color' => 'bg-[#239B52]'
        ]
    ];
    ?>

    <!-- 1. Hero Banner (Natural Image without Blue Overlay, Exact Match to Contact & FAQ) -->
    <section class="relative w-full min-h-[580px] sm:min-h-[660px] h-[92vh] sm:h-screen max-h-[1000px] overflow-hidden flex items-center justify-center text-center bg-slate-900">
        
        <!-- Clean Background Image (No blue tint / overlay) -->
        <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=2070&q=80" 
             alt="Clean Energy Water Background" 
             class="absolute inset-0 w-full h-full object-cover object-center">
        
        <!-- Subtle Neutral Tint for Clean Text Readability -->
        <div class="absolute inset-0 bg-black/25"></div>

        <!-- Big Centered "Our Gallery" Title -->
        <div class="relative z-10 px-4 pt-16">
            <h1 class="text-5xl sm:text-7xl lg:text-8xl font-black text-white italic tracking-wide drop-shadow-[0_4px_16px_rgba(0,0,0,0.5)]">
                Our Gallery
            </h1>
            <p class="text-white/90 text-base sm:text-xl font-medium max-w-2xl mx-auto mt-4 drop-shadow">
                Real-world installations, marine voyages, RV adventures & clean energy systems.
            </p>
        </div>
    </section>

    <!-- 2. Main Gallery Section -->
    <main class="flex-1 py-16 sm:py-20 lg:py-24 bg-white text-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16">
                <!-- Pill Badge -->
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#d7f3fb] text-slate-800 text-xs sm:text-sm font-semibold mb-4">
                    CleanErgy in Action
                </div>

                <!-- Main Heading -->
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 leading-tight tracking-tight mb-4">
                    Explore Real-World <span style="color: #12b3d6;">Battery Installations</span>
                </h2>

                <p class="text-slate-600 text-base sm:text-lg leading-relaxed">
                    Discover how CleanErgy lithium iron phosphate batteries deliver clean, durable, and uncompromising power across every application.
                </p>
            </div>

            <!-- Filter Tabs -->
            <div class="flex flex-wrap items-center justify-center gap-2.5 sm:gap-3 mb-12 sm:mb-14">
                <button type="button" 
                        class="gallery-filter-btn active px-5 sm:px-6 py-2.5 rounded-full text-xs sm:text-sm font-bold transition-all duration-200 bg-[#12b3d6] text-white shadow-md shadow-cyan-500/20"
                        data-filter="all">
                    All Installations
                </button>
                <button type="button" 
                        class="gallery-filter-btn px-5 sm:px-6 py-2.5 rounded-full text-xs sm:text-sm font-semibold transition-all duration-200 bg-slate-100 text-slate-700 hover:bg-slate-200"
                        data-filter="marine">
                    Marine & Boats
                </button>
                <button type="button" 
                        class="gallery-filter-btn px-5 sm:px-6 py-2.5 rounded-full text-xs sm:text-sm font-semibold transition-all duration-200 bg-slate-100 text-slate-700 hover:bg-slate-200"
                        data-filter="rv">
                    RVs & Campers
                </button>
                <button type="button" 
                        class="gallery-filter-btn px-5 sm:px-6 py-2.5 rounded-full text-xs sm:text-sm font-semibold transition-all duration-200 bg-slate-100 text-slate-700 hover:bg-slate-200"
                        data-filter="solar">
                    Solar & Home Energy
                </button>
                <button type="button" 
                        class="gallery-filter-btn px-5 sm:px-6 py-2.5 rounded-full text-xs sm:text-sm font-semibold transition-all duration-200 bg-slate-100 text-slate-700 hover:bg-slate-200"
                        data-filter="offgrid">
                    Off-Grid & Cabins
                </button>
                <button type="button" 
                        class="gallery-filter-btn px-5 sm:px-6 py-2.5 rounded-full text-xs sm:text-sm font-semibold transition-all duration-200 bg-slate-100 text-slate-700 hover:bg-slate-200"
                        data-filter="fleet">
                    Specialized & Fleet
                </button>
            </div>

            <!-- Gallery Cards Grid -->
            <div id="gallery-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 items-stretch">
                <?php foreach ($gallery_items as $index => $item): ?>
                    <div class="gallery-card group relative bg-white rounded-3xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-2xl transition-all duration-300 flex flex-col cursor-pointer"
                         data-category="<?= htmlspecialchars($item['category']) ?>"
                         data-index="<?= $index ?>">
                        
                        <!-- Image Container with Zoom Effect -->
                        <div class="relative w-full h-64 sm:h-72 overflow-hidden bg-slate-100">
                            <img src="<?= htmlspecialchars($item['image']) ?>" 
                                 alt="<?= htmlspecialchars($item['title']) ?>" 
                                 loading="lazy"
                                 class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-700">
                            
                            <!-- Category Badge -->
                            <div class="absolute top-4 left-4 z-10">
                                <span class="inline-block px-3.5 py-1 rounded-full text-white text-xs font-bold shadow-md <?= $item['badge_color'] ?>">
                                    <?= htmlspecialchars($item['category_name']) ?>
                                </span>
                            </div>

                            <!-- Click to Expand Hover Overlay -->
                            <div class="absolute inset-0 bg-slate-950/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/95 text-slate-900 text-xs sm:text-sm font-bold shadow-lg transform translate-y-2 group-hover:translate-y-0 transition-all duration-300">
                                    <svg class="w-4 h-4 text-[#12b3d6]" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7" />
                                    </svg>
                                    View Photo
                                </span>
                            </div>
                        </div>

                        <!-- Card Content -->
                        <div class="p-6 sm:p-7 flex-1 flex flex-col justify-between bg-white">
                            <div>
                                <span class="text-xs font-bold uppercase tracking-wider text-[#12b3d6] block mb-1.5">
                                    <?= htmlspecialchars($item['specs']) ?>
                                </span>
                                <h3 class="text-lg sm:text-xl font-bold text-slate-900 leading-snug group-hover:text-[#12b3d6] transition-colors mb-2.5">
                                    <?= htmlspecialchars($item['title']) ?>
                                </h3>
                                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed line-clamp-3">
                                    <?= htmlspecialchars($item['desc']) ?>
                                </p>
                            </div>

                            <div class="pt-5 mt-5 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-slate-500">
                                <span class="inline-flex items-center gap-1.5 text-emerald-600 font-bold">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                    Grade-A Prismatic Cells
                                </span>
                                <span class="text-[#12b3d6] group-hover:translate-x-1 transition-transform inline-flex items-center gap-1">
                                    Details &rarr;
                                </span>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Empty State (When filter has no matching items) -->
            <div id="gallery-empty-state" class="hidden text-center py-16">
                <p class="text-slate-500 text-base">No installations found in this category.</p>
            </div>

            <!-- Trust / Stats Bar -->
            <div class="mt-20 sm:mt-24 bg-[#f8fbfd] rounded-3xl p-8 sm:p-12 border border-slate-100">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 sm:gap-8 text-center">
                    <div>
                        <div class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#12b3d6] tracking-tight mb-1">5,000+</div>
                        <div class="text-xs sm:text-sm font-semibold text-slate-700">Deep Charge Cycles</div>
                    </div>
                    <div>
                        <div class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight mb-1">10 Years</div>
                        <div class="text-xs sm:text-sm font-semibold text-slate-700">Design Lifespan</div>
                    </div>
                    <div>
                        <div class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#239B52] tracking-tight mb-1">IP67</div>
                        <div class="text-xs sm:text-sm font-semibold text-slate-700">Waterproof Marine Grade</div>
                    </div>
                    <div>
                        <div class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight mb-1">100%</div>
                        <div class="text-xs sm:text-sm font-semibold text-slate-700">Smart BMS Protected</div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- 2.5 Call to Action Section (Full Width with #EDFAFC Background) -->
    <section class="w-full bg-[#EDFAFC] py-16 sm:py-20 px-4 sm:px-6 lg:px-8 text-center border-t border-cyan-100">
        <div class="max-w-4xl mx-auto text-center">
            <!-- Pill Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/90 text-[#0284c7] text-xs sm:text-sm font-bold tracking-wide uppercase mb-4 shadow-xs border border-cyan-100">
                Custom Energy Engineering
            </div>

            <!-- Main Heading -->
            <h3 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight mb-4">
                Ready to Power Your <span class="text-[#12b3d6]">Next Installation?</span>
            </h3>

            <!-- Subtitle -->
            <p class="text-slate-600 text-sm sm:text-base lg:text-lg leading-relaxed max-w-2xl mx-auto mb-8 font-normal">
                Whether outfitting a 50–foot yacht, an off-grid cabin, or a commercial vehicle fleet, our battery specialists will tailor the ideal LiFePO4 solution for your voltage and capacity needs.
            </p>

            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-5">
                <button type="button" 
                        data-open-enquiry="true"
                        class="w-full sm:w-auto inline-flex items-center justify-center px-9 sm:px-11 py-3.5 sm:py-4 rounded-full font-bold text-sm sm:text-base text-white bg-[#12b3d6] hover:bg-[#0ea5e9] shadow-md shadow-cyan-500/25 transition-all">
                    Get a Quote
                </button>
                <a href="/contact.php" 
                   class="w-full sm:w-auto inline-flex items-center justify-center px-9 sm:px-11 py-3.5 sm:py-4 rounded-full font-bold text-sm sm:text-base text-slate-800 bg-white hover:bg-slate-50 border border-slate-200 shadow-xs transition-all">
                    Contact Specialist
                </a>
            </div>
        </div>
    </section>

    <!-- 3. Photo Lightbox Modal -->
    <div id="gallery-lightbox" class="fixed inset-0 z-[100] bg-slate-950/90 backdrop-blur-md hidden items-center justify-center p-4 sm:p-6 transition-all duration-300">
        <!-- Close Button -->
        <button id="lightbox-close-btn" type="button" aria-label="Close Preview" class="absolute top-5 right-5 sm:top-8 sm:right-8 z-20 text-white/80 hover:text-white p-2.5 rounded-full bg-white/10 hover:bg-white/20 transition-all focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Previous Button -->
        <button id="lightbox-prev-btn" type="button" aria-label="Previous Photo" class="absolute left-3 sm:left-6 top-1/2 -translate-y-1/2 z-20 text-white/80 hover:text-white p-3 rounded-full bg-white/10 hover:bg-white/20 transition-all focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <!-- Next Button -->
        <button id="lightbox-next-btn" type="button" aria-label="Next Photo" class="absolute right-3 sm:right-6 top-1/2 -translate-y-1/2 z-20 text-white/80 hover:text-white p-3 rounded-full bg-white/10 hover:bg-white/20 transition-all focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </button>

        <!-- Modal Inner Content Box -->
        <div class="relative max-w-4xl w-full bg-slate-900 rounded-3xl overflow-hidden shadow-2xl border border-white/10 text-white flex flex-col max-h-[90vh]">
            <!-- Image Area -->
            <div class="relative w-full h-[320px] sm:h-[460px] bg-black flex items-center justify-center overflow-hidden">
                <img id="lightbox-img" src="" alt="Enlarged gallery photo" class="max-w-full max-h-full object-contain">
            </div>

            <!-- Details Bar -->
            <div class="p-5 sm:p-7 bg-slate-900 flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-t border-white/10">
                <div>
                    <span id="lightbox-category" class="inline-block px-3 py-0.5 rounded-full bg-[#12b3d6] text-white text-xs font-bold mb-2"></span>
                    <h4 id="lightbox-title" class="text-lg sm:text-xl font-bold text-white"></h4>
                    <p id="lightbox-specs" class="text-xs sm:text-sm text-cyan-300 font-semibold mt-1"></p>
                </div>
                <button type="button" 
                        data-open-enquiry="true"
                        class="px-6 py-2.5 rounded-full font-bold text-xs sm:text-sm text-white bg-[#12b3d6] hover:bg-[#0ea5e9] transition-all self-start sm:self-auto shrink-0 shadow-md">
                    Enquire Now
                </button>
            </div>
        </div>
    </div>

    <!-- Gallery Interaction Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const galleryItems = <?= json_encode($gallery_items, JSON_UNESCAPED_SLASHES) ?>;
        const filterBtns = document.querySelectorAll('.gallery-filter-btn');
        const cards = document.querySelectorAll('.gallery-card');
        const emptyState = document.getElementById('gallery-empty-state');

        // Lightbox Elements
        const lightbox = document.getElementById('gallery-lightbox');
        const lightboxImg = document.getElementById('lightbox-img');
        const lightboxTitle = document.getElementById('lightbox-title');
        const lightboxCategory = document.getElementById('lightbox-category');
        const lightboxSpecs = document.getElementById('lightbox-specs');
        const closeBtn = document.getElementById('lightbox-close-btn');
        const prevBtn = document.getElementById('lightbox-prev-btn');
        const nextBtn = document.getElementById('lightbox-next-btn');

        let currentIndex = 0;
        let activeFilteredIndices = galleryItems.map((_, i) => i);

        // Filter Logic
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                filterBtns.forEach(b => {
                    b.classList.remove('active', 'bg-[#12b3d6]', 'text-white', 'shadow-md', 'shadow-cyan-500/20');
                    b.classList.add('bg-slate-100', 'text-slate-700');
                });

                this.classList.add('active', 'bg-[#12b3d6]', 'text-white', 'shadow-md', 'shadow-cyan-500/20');
                this.classList.remove('bg-slate-100', 'text-slate-700');

                const filter = this.getAttribute('data-filter');
                let visibleCount = 0;
                activeFilteredIndices = [];

                cards.forEach(card => {
                    const cardCategory = card.getAttribute('data-category');
                    const idx = parseInt(card.getAttribute('data-index'), 10);

                    if (filter === 'all' || cardCategory === filter) {
                        card.classList.remove('hidden');
                        visibleCount++;
                        activeFilteredIndices.push(idx);
                    } else {
                        card.classList.add('hidden');
                    }
                });

                if (visibleCount === 0) {
                    emptyState?.classList.remove('hidden');
                } else {
                    emptyState?.classList.add('hidden');
                }
            });
        });

        // Open Lightbox
        function showPhoto(index) {
            if (!galleryItems[index]) return;
            currentIndex = index;
            const item = galleryItems[index];

            lightboxImg.src = item.image;
            lightboxImg.alt = item.title;
            lightboxTitle.textContent = item.title;
            lightboxCategory.textContent = item.category_name;
            lightboxSpecs.textContent = item.specs + ' — ' + item.desc;

            lightbox.classList.remove('hidden');
            lightbox.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closePhoto() {
            lightbox.classList.add('hidden');
            lightbox.classList.remove('flex');
            document.body.style.overflow = '';
        }

        cards.forEach(card => {
            card.addEventListener('click', function () {
                const idx = parseInt(this.getAttribute('data-index'), 10);
                showPhoto(idx);
            });
        });

        closeBtn?.addEventListener('click', closePhoto);

        lightbox?.addEventListener('click', function (e) {
            if (e.target === lightbox) {
                closePhoto();
            }
        });

        function showNext() {
            if (activeFilteredIndices.length === 0) return;
            let currentPos = activeFilteredIndices.indexOf(currentIndex);
            let nextPos = (currentPos + 1) % activeFilteredIndices.length;
            showPhoto(activeFilteredIndices[nextPos]);
        }

        function showPrev() {
            if (activeFilteredIndices.length === 0) return;
            let currentPos = activeFilteredIndices.indexOf(currentIndex);
            let prevPos = (currentPos - 1 + activeFilteredIndices.length) % activeFilteredIndices.length;
            showPhoto(activeFilteredIndices[prevPos]);
        }

        nextBtn?.addEventListener('click', function (e) {
            e.stopPropagation();
            showNext();
        });

        prevBtn?.addEventListener('click', function (e) {
            e.stopPropagation();
            showPrev();
        });

        document.addEventListener('keydown', function (e) {
            if (!lightbox.classList.contains('hidden')) {
                if (e.key === 'Escape') closePhoto();
                if (e.key === 'ArrowRight') showNext();
                if (e.key === 'ArrowLeft') showPrev();
            }
        });
    });
    </script>

    <?php
    // Include Footer
    include __DIR__ . '/../components/footer.php';
    ?>

</body>
</html>
