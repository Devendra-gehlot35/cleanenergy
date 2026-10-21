
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

    <style>
        /* Blurred, semi-transparent gallery backdrop */
        #gallery-lightbox {
            background: rgba(15, 23, 42, 0.20);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        /* Preview stays within 80% of the viewport */
        .gallery-preview-image {
            display: block;
            width: auto;
            height: auto;
            max-width: 80vw;
            max-height: 80vh;
            object-fit: contain;
            border-radius: 14px;
            background: transparent;
            box-shadow: 0 20px 70px rgba(0, 0, 0, 0.35);
        }

        /* Close button at the top-right of the screen */
        .gallery-close-button {
            position: absolute;
            top: 24px;
            right: 24px;
            z-index: 100;
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: #ffffff;
            color: #0f172a;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.2);
            transition: background 0.2s, color 0.2s, transform 0.2s;
        }

        .gallery-close-button:hover {
            background: #fef2f2;
            color: #dc2626;
            transform: scale(1.06);
        }

        /* Previous / next controls */
        .gallery-nav-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 50;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: rgba(15, 23, 42, 0.65);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.2s;
        }

        .gallery-nav-button:hover {
            background: rgba(15, 23, 42, 0.9);
        }

        .gallery-nav-prev {
            left: 24px;
        }

        .gallery-nav-next {
            right: 24px;
        }

        .gallery-card:focus-visible,
        .gallery-close-button:focus-visible,
        .gallery-nav-button:focus-visible {
            outline: 3px solid #12b3d6;
            outline-offset: 3px;
        }

        @media (max-width: 640px) {
            .gallery-preview-image {
                max-width: 80vw;
                max-height: 80vh;
                border-radius: 10px;
            }

            .gallery-close-button {
                top: 16px;
                right: 16px;
                width: 42px;
                height: 42px;
            }

            .gallery-nav-button {
                width: 38px;
                height: 38px;
            }

            .gallery-nav-prev {
                left: 5px;
            }

            .gallery-nav-next {
                right: 5px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .gallery-card,
            .gallery-card img,
            .gallery-close-button,
            .gallery-nav-button {
                transition: none !important;
            }
        }
    </style>
</head>

<body class="bg-white font-['Plus_Jakarta_Sans',sans-serif] text-slate-900 min-h-screen flex flex-col justify-between">

<?php
// Include fixed floating navbar
include __DIR__ . '/../components/navbar.php';

// Gallery collection loaded dynamically (Google Sheet integration with cache & fallback)
require_once __DIR__ . '/../data/gallery_loader.php';
$gallery_items = load_gallery_items();
?>

<!-- HERO BANNER -->
<section class="relative w-full min-h-[580px] sm:min-h-[660px] h-[92vh] sm:h-screen max-h-[1000px] overflow-hidden flex items-center justify-center text-center bg-slate-900">

    <img
        src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=2070&q=80"
        alt="Clean Energy Water Background"
        class="absolute inset-0 w-full h-full object-cover object-center">

    <div class="absolute inset-0 bg-black/25"></div>

    <div class="relative z-10 px-4 pt-16">
        <h1 class="text-5xl sm:text-7xl lg:text-8xl font-black text-white italic tracking-wide drop-shadow-[0_4px_16px_rgba(0,0,0,0.5)]">
            Our Gallery
        </h1>

        <p class="text-white/90 text-base sm:text-xl font-medium max-w-2xl mx-auto mt-4 drop-shadow">
            Real-world installations, marine voyages, RV adventures & clean energy systems.
        </p>
    </div>
</section>

<!-- MAIN GALLERY SECTION -->
<main class="flex-1 py-16 sm:py-20 lg:py-24 bg-white text-slate-900">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- SECTION HEADER -->
        <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16">

            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#d7f3fb] text-slate-800 text-xs sm:text-sm font-semibold mb-4">
                CleanErgy in Action
            </div>

            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 leading-tight tracking-tight mb-4">
                Explore Real-World
                <span style="color: #12b3d6;">Battery Installations</span>
            </h2>

            <p class="text-slate-600 text-base sm:text-lg leading-relaxed">
                Discover how CleanErgy lithium iron phosphate batteries deliver clean, durable, and uncompromising power across every application.
            </p>
        </div>

        <!-- FILTER TABS -->
        <div class="flex flex-wrap items-center justify-center gap-2.5 sm:gap-3 mb-12 sm:mb-14">

            <?php
            $gallery_filters = [
                'all' => 'All Installations',
                'marine' => 'Marine & Boats',
                'rv' => 'RVs & Campers',
                'solar' => 'Solar & Home Energy',
                'offgrid' => 'Off-Grid & Cabins',
                'fleet' => 'Specialized & Fleet'
            ];
            ?>

            <?php foreach ($gallery_filters as $filter_key => $filter_label): ?>
                <button
                    type="button"
                    data-filter="<?= htmlspecialchars($filter_key, ENT_QUOTES, 'UTF-8') ?>"
                    aria-pressed="<?= $filter_key === 'all' ? 'true' : 'false' ?>"
                    class="gallery-filter-btn px-5 sm:px-6 py-2.5 rounded-full text-xs sm:text-sm font-semibold transition-all duration-200 <?= $filter_key === 'all'
                        ? 'active bg-[#12b3d6] text-white shadow-md shadow-cyan-500/20'
                        : 'bg-slate-100 text-slate-700 hover:bg-slate-200' ?>">

                    <?= htmlspecialchars($filter_label, ENT_QUOTES, 'UTF-8') ?>
                </button>
            <?php endforeach; ?>

        </div>

        <!-- GALLERY IMAGE GRID -->
        <div id="gallery-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 items-stretch">

            <?php foreach ($gallery_items as $index => $item): ?>

                <button
                    type="button"
                    class="gallery-card group relative block w-full bg-slate-100 rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-300 h-64 sm:h-72 lg:h-80 cursor-pointer text-left"
                    data-category="<?= htmlspecialchars($item['category'], ENT_QUOTES, 'UTF-8') ?>"
                    data-index="<?= $index ?>"
                    aria-label="View <?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?>">

                    <img
                        src="<?= htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8') ?>"
                        alt="<?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?>"
                        loading="lazy"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">

                    <!-- HOVER OVERLAY -->
                    <span class="absolute inset-0 bg-slate-950/25 opacity-0 group-hover:opacity-100 group-focus-visible:opacity-100 transition-opacity duration-300 flex items-center justify-center">

                        <span class="w-12 h-12 rounded-full bg-white/95 text-slate-800 flex items-center justify-center shadow-xl transform scale-90 group-hover:scale-100 transition-all duration-300">

                            <svg
                                class="w-5 h-5 text-[#12b3d6]"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2.5"
                                viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/>
                            </svg>
                        </span>
                    </span>
                </button>

            <?php endforeach; ?>
        </div>

        <!-- EMPTY STATE -->
        <div id="gallery-empty-state" class="hidden text-center py-16">
            <p class="text-slate-500 text-base">
                No installations found in this category.
            </p>
        </div>
    </div>
</main>

<!-- CALL TO ACTION -->
<section class="w-full bg-[#EDFAFC] py-16 sm:py-20 px-4 sm:px-6 lg:px-8 text-center border-t border-cyan-100">

    <div class="max-w-4xl mx-auto text-center">

        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/90 text-[#0284c7] text-xs sm:text-sm font-bold tracking-wide uppercase mb-4 border border-cyan-100">
            Custom Energy Engineering
        </div>

        <h3 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight mb-4">
            Ready to Power Your
            <span class="text-[#12b3d6]">Next Installation?</span>
        </h3>

        <p class="text-slate-600 text-sm sm:text-base lg:text-lg leading-relaxed max-w-2xl mx-auto mb-8 font-normal">
            Whether outfitting a 50–foot yacht, an off-grid cabin, or a commercial vehicle fleet, our battery specialists will tailor the ideal LiFePO4 solution for your voltage and capacity needs.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-5">

            <button
                type="button"
                data-open-enquiry="true"
                class="w-full sm:w-auto inline-flex items-center justify-center px-9 sm:px-11 py-3.5 sm:py-4 rounded-full font-bold text-sm sm:text-base text-white bg-[#12b3d6] hover:bg-[#0ea5e9] shadow-md shadow-cyan-500/25 transition-all">
                Get a Quote
            </button>

            <a
                href="/contact.php"
                class="w-full sm:w-auto inline-flex items-center justify-center px-9 sm:px-11 py-3.5 sm:py-4 rounded-full font-bold text-sm sm:text-base text-slate-800 bg-white hover:bg-slate-50 border border-slate-200 transition-all">
                Contact Specialist
            </a>

        </div>
    </div>
</section>

<!-- BLURRED PHOTO LIGHTBOX -->
<div
    id="gallery-lightbox"
    role="dialog"
    aria-modal="true"
    aria-label="Gallery photo preview"
    aria-hidden="true"
    class="fixed inset-0 z-[9999] hidden items-center justify-center p-0">

    <!-- CLOSE BUTTON: TOP RIGHT -->
    <button
        id="lightbox-close-btn"
        type="button"
        aria-label="Close Preview"
        class="gallery-close-button">

        <svg
            width="23"
            height="23"
            fill="none"
            stroke="currentColor"
            stroke-width="2.5"
            viewBox="0 0 24 24">

            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>

    <!-- PREVIOUS BUTTON -->
    <button
        id="lightbox-prev-btn"
        type="button"
        aria-label="Previous Photo"
        class="gallery-nav-button gallery-nav-prev">

        <svg
            width="25"
            height="25"
            fill="none"
            stroke="currentColor"
            stroke-width="2.5"
            viewBox="0 0 24 24">

            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M15 19l-7-7 7-7"/>
        </svg>
    </button>

    <!-- CENTERED IMAGE: MAX 80% VIEWPORT -->
    <div class="relative z-10 flex items-center justify-center w-full mx-auto pointer-events-none">

        <img
            id="lightbox-img"
            src=""
            alt="Enlarged gallery photo"
            class="gallery-preview-image pointer-events-auto">
    </div>

    <!-- NEXT BUTTON -->
    <button
        id="lightbox-next-btn"
        type="button"
        aria-label="Next Photo"
        class="gallery-nav-button gallery-nav-next">

        <svg
            width="25"
            height="25"
            fill="none"
            stroke="currentColor"
            stroke-width="2.5"
            viewBox="0 0 24 24">

            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M9 5l7 7-7 7"/>
        </svg>
    </button>
</div>

<!-- GALLERY INTERACTION SCRIPT -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    const galleryItems = <?= json_encode(
        $gallery_items,
        JSON_HEX_TAG |
        JSON_HEX_AMP |
        JSON_HEX_APOS |
        JSON_HEX_QUOT |
        JSON_UNESCAPED_SLASHES |
        JSON_INVALID_UTF8_SUBSTITUTE
    ) ?>;

    const filterBtns = document.querySelectorAll('.gallery-filter-btn');
    const cards = document.querySelectorAll('.gallery-card');
    const emptyState = document.getElementById('gallery-empty-state');

    const lightbox = document.getElementById('gallery-lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const closeBtn = document.getElementById('lightbox-close-btn');
    const prevBtn = document.getElementById('lightbox-prev-btn');
    const nextBtn = document.getElementById('lightbox-next-btn');

    let currentIndex = 0;
    let activeFilteredIndices = galleryItems.map((_, index) => index);
    let previousFocus = null;
    let previousBodyOverflow = '';

    // FILTER LOGIC
    filterBtns.forEach(btn => {

        btn.addEventListener('click', function () {

            filterBtns.forEach(button => {

                button.classList.remove(
                    'active',
                    'bg-[#12b3d6]',
                    'text-white',
                    'shadow-md',
                    'shadow-cyan-500/20'
                );

                button.classList.add('bg-slate-100', 'text-slate-700');
                button.setAttribute('aria-pressed', 'false');
            });

            this.classList.remove('bg-slate-100', 'text-slate-700');

            this.classList.add(
                'active',
                'bg-[#12b3d6]',
                'text-white',
                'shadow-md',
                'shadow-cyan-500/20'
            );

            this.setAttribute('aria-pressed', 'true');

            const filter = this.dataset.filter;
            activeFilteredIndices = [];

            cards.forEach(card => {

                const category = card.dataset.category;
                const index = Number(card.dataset.index);
                const matches = filter === 'all' || category === filter;

                card.classList.toggle('hidden', !matches);

                if (matches) {
                    activeFilteredIndices.push(index);
                }
            });

            emptyState.classList.toggle(
                'hidden',
                activeFilteredIndices.length > 0
            );
        });
    });

    // OPEN / UPDATE PHOTO
    function showPhoto(index) {

        if (!galleryItems[index]) return;

        const wasClosed = lightbox.classList.contains('hidden');

        if (wasClosed) {
            previousFocus = document.activeElement;
            previousBodyOverflow = document.body.style.overflow;
        }

        currentIndex = index;

        lightboxImg.src = galleryItems[index].image;
        lightboxImg.alt = galleryItems[index].title;

        lightbox.classList.remove('hidden');
        lightbox.classList.add('flex');
        lightbox.setAttribute('aria-hidden', 'false');

        document.body.style.overflow = 'hidden';

        if (wasClosed) {
            closeBtn.focus();
        }
    }

    // CLOSE PHOTO
    function closePhoto() {

        if (lightbox.classList.contains('hidden')) return;

        lightbox.classList.add('hidden');
        lightbox.classList.remove('flex');
        lightbox.setAttribute('aria-hidden', 'true');

        document.body.style.overflow = previousBodyOverflow;
        lightboxImg.removeAttribute('src');

        if (previousFocus && previousFocus.isConnected) {
            previousFocus.focus();
        }

        previousFocus = null;
    }

    // OPEN ON IMAGE CLICK
    cards.forEach(card => {

        card.addEventListener('click', function () {
            showPhoto(Number(this.dataset.index));
        });
    });

    // CLOSE BUTTON
    closeBtn.addEventListener('click', function (event) {
        event.stopPropagation();
        closePhoto();
    });

    // CLOSE WHEN CLICKING OUTSIDE IMAGE
    lightbox.addEventListener('click', function (event) {

        if (event.target === lightbox) {
            closePhoto();
        }
    });

    // NEXT IMAGE
    function showNext() {

        if (activeFilteredIndices.length === 0) return;

        const currentPosition = activeFilteredIndices.indexOf(currentIndex);
        const nextPosition =
            (currentPosition + 1) % activeFilteredIndices.length;

        showPhoto(activeFilteredIndices[nextPosition]);
    }

    // PREVIOUS IMAGE
    function showPrev() {

        if (activeFilteredIndices.length === 0) return;

        const currentPosition = activeFilteredIndices.indexOf(currentIndex);
        const previousPosition =
            (currentPosition - 1 + activeFilteredIndices.length)
            % activeFilteredIndices.length;

        showPhoto(activeFilteredIndices[previousPosition]);
    }

    nextBtn.addEventListener('click', function (event) {
        event.stopPropagation();
        showNext();
    });

    prevBtn.addEventListener('click', function (event) {
        event.stopPropagation();
        showPrev();
    });

    // KEYBOARD NAVIGATION
    document.addEventListener('keydown', function (event) {

        if (lightbox.classList.contains('hidden')) return;

        if (event.key === 'Escape') {
            event.preventDefault();
            closePhoto();
        }

        if (event.key === 'ArrowRight') {
            event.preventDefault();
            showNext();
        }

        if (event.key === 'ArrowLeft') {
            event.preventDefault();
            showPrev();
        }

        if (event.key === 'Tab') {

            const focusable = [closeBtn, prevBtn, nextBtn];
            const currentPosition = focusable.indexOf(document.activeElement);

            event.preventDefault();

            const direction = event.shiftKey ? -1 : 1;

            const nextPosition =
                (currentPosition + direction + focusable.length)
                % focusable.length;

            focusable[nextPosition].focus();
        }
    });
});
</script>

<?php
include __DIR__ . '/../components/footer.php';
?>

</body>
</html>
