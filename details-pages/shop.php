<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Batteries - CleanEnergy</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,700;1,800;1,900&family=Playfair+Display:ital,wght@1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/dist/output.css?v=<?= filemtime(__DIR__ . '/../dist/output.css') ?>">
</head>
<body class="bg-white font-['Plus_Jakarta_Sans',sans-serif] text-slate-900 min-h-screen flex flex-col justify-between">

    <?php
    // Include Fixed Floating Navbar
    include __DIR__ . '/../components/navbar.php';

    // Shared product catalog
    // Shared product catalog
    require_once __DIR__ . '/../data/products.php';

    // Normalize collection / category filter from URL
    $selectedCollection = '';
    if (!empty($_GET['collection'])) {
        $selectedCollection = normalize_collection_slug($_GET['collection']);
    } elseif (!empty($_GET['category'])) {
        $selectedCollection = normalize_collection_slug($_GET['category']);
    }

    $searchQuery = trim($_GET['q'] ?? '');

    // Active collection metadata
    $activeCollection = (!empty($selectedCollection) && isset($all_collections[$selectedCollection])) 
        ? $all_collections[$selectedCollection] 
        : null;

    // Calculate product counts per collection for the filter tabs
    $collectionCounts = [
        'all' => count($all_products)
    ];
    foreach ($all_collections as $slug => $col) {
        $c = 0;
        foreach ($all_products as $p) {
            if (in_array($slug, $p['collections'] ?? [])) {
                $c++;
            }
        }
        $collectionCounts[$slug] = $c;
    }

    // Filter products
    $filteredProducts = [];
    foreach ($all_products as $id => $prod) {
        $matchesCollection = true;
        if (!empty($selectedCollection)) {
            $prodCols = $prod['collections'] ?? [];
            $matchesCollection = in_array($selectedCollection, $prodCols)
                || (strpos(strtolower($prod['category'] ?? ''), str_replace('-', ' ', $selectedCollection)) !== false)
                || (strpos(strtolower($prod['title'] ?? ''), str_replace('-', ' ', $selectedCollection)) !== false);
        }

        $matchesSearch = true;
        if (!empty($searchQuery)) {
            $q = strtolower($searchQuery);
            $searchableText = strtolower(
                ($prod['title'] ?? '') . ' ' .
                ($prod['desc'] ?? '') . ' ' .
                ($prod['category'] ?? '') . ' ' .
                implode(' ', $prod['collections'] ?? [])
            );
            $matchesSearch = (strpos($searchableText, $q) !== false);
        }

        if ($matchesCollection && $matchesSearch) {
            $filteredProducts[$id] = $prod;
        }
    }
    $products = $filteredProducts;
    ?>

    <!-- 1. Hero Banner (Top Image matching all other pages) -->
    <section class="relative w-full min-h-[500px] sm:min-h-[580px] md:min-h-[640px] lg:min-h-[700px] h-auto sm:h-[90vh] md:h-screen md:max-h-[1000px] overflow-hidden bg-slate-900 flex items-center">
        <!-- Background Image Edge-to-Edge -->
        <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=2070&q=80" 
             alt="Clean Energy Battery Shop Banner" 
             class="absolute inset-0 w-full h-full object-cover object-center">
        
        <!-- Gradient Overlay matching Homepage Hero Slider -->
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/80 via-slate-900/50 to-transparent"></div>
        <div class="absolute inset-0 bg-black/20"></div>

        <!-- Banner Content with exact homepage slider padding & layout -->
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full z-10 pt-24 sm:pt-32 pb-16 sm:pb-24">
            <div class="max-w-3xl">
                <span class="inline-block text-[11px] sm:text-sm font-bold tracking-[0.2em] text-[#38bdf8] uppercase mb-2 sm:mb-3 drop-shadow">
                    CLEANENERGY BATTERY SHOP
                </span>
                
                <h1 class="text-2xl sm:text-4xl md:text-5xl lg:text-[62px] text-white leading-[1.15] sm:leading-[1.1] font-extrabold tracking-tight mb-3 sm:mb-5 drop-shadow-md">
                    <span class="italic block">Shop Premium LiFePO4 &</span>
                    <span class="italic font-['Playfair_Display',serif] font-semibold block text-slate-100">Sodium-Ion Batteries</span>
                </h1>

                <p class="text-xs sm:text-base lg:text-lg text-white/95 max-w-2xl font-normal leading-relaxed drop-shadow">
                    Find dependable, high-performance battery systems engineered specifically for marine, RV, solar energy and off-grid power applications.
                </p>
            </div>
        </div>
    </section>

    <!-- 2. Middle Section: Products Cards Grid with Interactive Collection Filter -->
    <main id="shop-catalog" class="flex-1 py-14 sm:py-18 lg:py-20 bg-white text-slate-900 scroll-mt-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Dynamic Section Header based on Selected Collection -->
            <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-12">
                <?php if ($activeCollection): ?>
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#d7f3fb] text-slate-800 text-xs sm:text-sm font-semibold mb-3">
                        Collection: <?= htmlspecialchars($activeCollection['title']) ?>
                    </div>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight mb-3">
                        <?= htmlspecialchars(str_replace(' Batteries', '', $activeCollection['title'])) ?> <span style="color: #12b3d6;">Batteries</span> In Stock
                    </h2>
                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                        <?= htmlspecialchars($activeCollection['desc']) ?>
                    </p>
                <?php elseif (!empty($searchQuery)): ?>
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#d7f3fb] text-slate-800 text-xs sm:text-sm font-semibold mb-3">
                        Search Query
                    </div>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight mb-3">
                        Batteries for <span style="color: #12b3d6;">"<?= htmlspecialchars($searchQuery) ?>"</span>
                    </h2>
                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                        Showing search results matching your search terms.
                    </p>
                <?php else: ?>
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#d7f3fb] text-slate-800 text-xs sm:text-sm font-semibold mb-3">
                        Cleanergy Store
                    </div>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight mb-3">
                        High-Performance <span style="color: #12b3d6;">Batteries</span> In Stock
                    </h2>
                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                        Explore our reliable LiFePO4 and sodium-ion starting and deep-cycle batteries built for boats, RVs, golf carts and off-grid systems.
                    </p>
                <?php endif; ?>
            </div>

            <!-- Horizontal Collection Filter Bar (Single Line Row) -->
            <div class="mb-8">
                <div class="flex items-center gap-2 sm:gap-2.5 overflow-x-auto pb-3 pt-1 scrollbar-none no-scrollbar flex-nowrap">
                    <!-- "All" Tab -->
                    <a href="/shop.php#shop-catalog" 
                       class="shrink-0 whitespace-nowrap px-3.5 sm:px-4 lg:px-4.5 py-2 sm:py-2.5 rounded-full text-xs sm:text-[13px] lg:text-sm font-bold transition-all shadow-xs <?= (empty($selectedCollection) && empty($searchQuery)) ? 'bg-[#00a8cc] text-white shadow-xs' : 'bg-[#f0f7fa] hover:bg-[#e2f3f8] text-slate-800' ?>">
                        All Batteries (<?= $collectionCounts['all'] ?>)
                    </a>

                    <!-- Each Collection Pill -->
                    <?php foreach ($all_collections as $slug => $col): ?>
                        <?php 
                            $isActive = ($selectedCollection === $slug);
                            $count = $collectionCounts[$slug] ?? 0;
                        ?>
                        <a href="/shop.php?collection=<?= urlencode($slug) ?>#shop-catalog" 
                           class="shrink-0 whitespace-nowrap px-3.5 sm:px-4 lg:px-4.5 py-2 sm:py-2.5 rounded-full text-xs sm:text-[13px] lg:text-sm font-semibold transition-all shadow-xs <?= $isActive ? 'bg-[#00a8cc] text-white font-bold shadow-xs' : 'bg-[#f0f7fa] hover:bg-[#e2f3f8] text-slate-800' ?>">
                            <?= htmlspecialchars($col['short_title']) ?> (<?= $count ?>)
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>


            <?php if (empty($products)): ?>
                <!-- Empty State -->
                <div class="text-center py-16 px-4 bg-slate-50 rounded-3xl border border-dashed border-slate-300 max-w-xl mx-auto my-8">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-[#d7f3fb] flex items-center justify-center text-[#12b3d6]">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg sm:text-xl font-bold text-slate-900 mb-2">No Batteries Found</h3>
                    <p class="text-slate-600 text-xs sm:text-sm mb-6 leading-relaxed">
                        We currently do not have batteries matching this exact criteria. Try selecting another collection or view our entire inventory.
                    </p>
                    <a href="/shop.php#shop-catalog" class="inline-flex items-center px-6 py-2.5 rounded-full bg-[#12b3d6] hover:bg-[#0ea5e9] text-white font-bold text-xs sm:text-sm transition-all shadow-sm">
                        View All Batteries
                    </a>
                </div>
            <?php else: ?>
                <!-- Product cards matching reference screenshot -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 items-stretch">
                    <?php foreach ($products as $prod): ?>
                        <?php
                            $safeTitle = htmlspecialchars($prod['title'], ENT_QUOTES, 'UTF-8');
                            $safeImage = htmlspecialchars($prod['image'], ENT_QUOTES, 'UTF-8');
                            $safePrice = htmlspecialchars($prod['price'], ENT_QUOTES, 'UTF-8');
                            $safeOriginalPrice = htmlspecialchars($prod['original_price'], ENT_QUOTES, 'UTF-8');
                            $detailUrl = '/product-detail.php?id=' . urlencode((string)$prod['id']);
                            $safeDetailUrl = htmlspecialchars($detailUrl, ENT_QUOTES, 'UTF-8');
                            $inStock = (bool)($prod['in_stock'] ?? false);
                        ?>
                        <article class="bg-white rounded-3xl border border-[#239B52] p-4 sm:p-5 flex flex-col justify-between shadow-xs hover:shadow-lg transition-all duration-300 group">
                            <div>
                                <!-- Inner Image Box (Full Size matching Gallery Cards) -->
                                <div class="relative bg-[#f8fafc] rounded-2xl p-2 flex items-center justify-center h-64 sm:h-72 mb-4 overflow-hidden">
                                    <!-- Stock Badge (Top Right) -->
                                    <span class="absolute top-3 right-3 z-10 inline-flex items-center px-3 py-1 rounded-full text-white text-[11px] font-extrabold uppercase tracking-wide shadow-xs" style="background-color: <?= $inStock ? '#239B52' : '#DC3545' ?>;">
                                        <?= $inStock ? 'IN STOCK' : 'NOT IN STOCK' ?>
                                    </span>

                                    <!-- Single Centered Clean Product Photo -->
                                    <a href="<?= $safeDetailUrl ?>" class="flex items-center justify-center w-full h-full overflow-hidden">
                                        <img src="<?= $safeImage ?>" 
                                             alt="<?= $safeTitle ?>" 
                                             loading="lazy"
                                             class="w-full h-full object-contain p-0 scale-105 transition-transform duration-300 group-hover:scale-115">
                                    </a>
                                </div>

                                <!-- Product Title -->
                                <h3 class="text-base sm:text-lg font-bold text-slate-900 leading-snug mb-2 hover:text-[#239B52] transition-colors">
                                    <a href="<?= $safeDetailUrl ?>"><?= $safeTitle ?></a>
                                </h3>

                                <!-- Price & Star Rating Row -->
                                <div class="flex items-center gap-2 mb-4">
                                    <span class="text-lg sm:text-xl font-extrabold text-[#239B52]"><?= $safePrice ?></span>
                                    <span class="text-xs sm:text-sm text-slate-400 line-through"><?= $safeOriginalPrice ?></span>
                                    <div class="ml-auto flex items-center gap-1 text-xs sm:text-sm font-bold text-slate-700">
                                        <span class="text-[#f59e0b]">★</span>
                                        <span><?= htmlspecialchars((string)($prod['rating'] ?? '4.9')) ?></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Buttons Row (Buy Now & Enquiry) -->
                            <div class="flex items-center gap-2.5 mt-auto pt-2">
                                <a href="<?= $safeDetailUrl ?>" class="flex-1 py-2.5 px-4 rounded-full bg-[#239B52] hover:bg-[#1e8244] text-white text-center font-bold text-xs sm:text-sm transition-colors shadow-sm">
                                    Buy Now
                                </a>
                                <a href="/index.php#contact" 
                                   onclick="openEnquiryModal('<?= htmlspecialchars(addslashes($prod['title'])) ?>', '<?= htmlspecialchars($prod['image']) ?>'); return false;"
                                   class="flex-1 py-2.5 px-4 rounded-full border border-[#239B52] text-[#239B52] hover:bg-emerald-50 text-center font-bold text-xs sm:text-sm transition-colors cursor-pointer">
                                    Enquiry
                                </a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>
    </main>

    <!-- 2.5 Battery Comparison Table Section (Exact Match to Design) -->
    <section class="w-full py-16 sm:py-20 lg:py-24 bg-white text-slate-900 border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-14">
                <span class="inline-block text-xs sm:text-sm font-bold tracking-widest text-[#12b3d6] uppercase mb-2 sm:mb-3">
                    BATTERY COMPARISON
                </span>
                
                <h2 class="text-2xl sm:text-4xl lg:text-[42px] font-extrabold text-slate-900 leading-tight tracking-tight mb-4">
                    Compare Cleanergy Battery Models
                </h2>

                <p class="text-slate-600 text-xs sm:text-sm md:text-base leading-relaxed">
                    Compare Cleanergy Battery's 12V, 24V and 51.2V LiFePO4 and sodium-ion battery systems by voltage, capacity, energy, chemistry and recommended application.
                </p>
            </div>

            <!-- Comparison Table Container -->
            <div class="w-full overflow-x-auto rounded-2xl sm:rounded-3xl shadow-sm border border-slate-200/80 bg-white">
                <table class="w-full text-left border-collapse min-w-[740px]">
                    <!-- Table Header -->
                    <thead class="bg-[#0f172a] text-white text-xs sm:text-sm font-semibold">
                        <tr>
                            <th class="py-4 px-5 sm:px-6 font-bold tracking-wide">Battery Model</th>
                            <th class="py-4 px-4 font-bold tracking-wide">Voltage</th>
                            <th class="py-4 px-4 font-bold tracking-wide">Capacity</th>
                            <th class="py-4 px-4 font-bold tracking-wide">Energy</th>
                            <th class="py-4 px-4 font-bold tracking-wide">Chemistry</th>
                            <th class="py-4 px-5 sm:px-6 font-bold tracking-wide">Best For</th>
                        </tr>
                    </thead>

                    <!-- Table Body -->
                    <tbody class="divide-y divide-slate-100 text-xs sm:text-sm">
                        <!-- Row 1 -->
                        <tr class="hover:bg-slate-50/60 transition-colors">
                            <td class="py-4 px-5 sm:px-6 font-bold text-slate-900 whitespace-nowrap sm:whitespace-normal">
                                12V 200Ah Sodium-Ion Starting Battery
                            </td>
                            <td class="py-4 px-4 text-slate-700 whitespace-nowrap font-medium">12V</td>
                            <td class="py-4 px-4 text-slate-700 whitespace-nowrap font-medium">200Ah</td>
                            <td class="py-4 px-4 text-slate-600">Confirm specs</td>
                            <td class="py-4 px-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-[#d7f3fb] text-[#0e7490]">
                                    Sodium-Ion
                                </span>
                            </td>
                            <td class="py-4 px-5 sm:px-6 text-slate-600 leading-snug">
                                Marine starting, vehicles and cold-weather use
                            </td>
                        </tr>

                        <!-- Row 2 -->
                        <tr class="hover:bg-slate-50/60 transition-colors">
                            <td class="py-4 px-5 sm:px-6 font-bold text-slate-900 whitespace-nowrap sm:whitespace-normal">
                                51.2V 300Ah 15.3kWh LiFePO4 Home Storage Battery
                            </td>
                            <td class="py-4 px-4 text-slate-700 whitespace-nowrap font-medium">51.2V</td>
                            <td class="py-4 px-4 text-slate-700 whitespace-nowrap font-medium">300Ah</td>
                            <td class="py-4 px-4 text-slate-600 whitespace-nowrap">15.3kWh</td>
                            <td class="py-4 px-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-[#d7f3fb] text-[#0e7490]">
                                    LiFePO4
                                </span>
                            </td>
                            <td class="py-4 px-5 sm:px-6 text-slate-600 leading-snug">
                                Home energy storage, solar backup and off-grid power
                            </td>
                        </tr>

                        <!-- Row 3 -->
                        <tr class="hover:bg-slate-50/60 transition-colors">
                            <td class="py-4 px-5 sm:px-6 font-bold text-slate-900 whitespace-nowrap sm:whitespace-normal">
                                51.2V 105Ah 5.46kWh LiFePO4 Battery
                            </td>
                            <td class="py-4 px-4 text-slate-700 whitespace-nowrap font-medium">51.2V</td>
                            <td class="py-4 px-4 text-slate-700 whitespace-nowrap font-medium">105Ah</td>
                            <td class="py-4 px-4 text-slate-600 whitespace-nowrap">5.46kWh</td>
                            <td class="py-4 px-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-[#d7f3fb] text-[#0e7490]">
                                    LiFePO4
                                </span>
                            </td>
                            <td class="py-4 px-5 sm:px-6 text-slate-600 leading-snug">
                                Golf carts, RVs and mobile power applications
                            </td>
                        </tr>

                        <!-- Row 4 -->
                        <tr class="hover:bg-slate-50/60 transition-colors">
                            <td class="py-4 px-5 sm:px-6 font-bold text-slate-900 whitespace-nowrap sm:whitespace-normal">
                                24V 100Ah 2.4kWh LiFePO4 Battery
                            </td>
                            <td class="py-4 px-4 text-slate-700 whitespace-nowrap font-medium">24V</td>
                            <td class="py-4 px-4 text-slate-700 whitespace-nowrap font-medium">100Ah</td>
                            <td class="py-4 px-4 text-slate-600 whitespace-nowrap">2.4kWh</td>
                            <td class="py-4 px-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-[#d7f3fb] text-[#0e7490]">
                                    LiFePO4
                                </span>
                            </td>
                            <td class="py-4 px-5 sm:px-6 text-slate-600 leading-snug">
                                Fishing boats, trolling motors, solar and off-grid systems
                            </td>
                        </tr>

                        <!-- Row 5 -->
                        <tr class="hover:bg-slate-50/60 transition-colors">
                            <td class="py-4 px-5 sm:px-6 font-bold text-slate-900 whitespace-nowrap sm:whitespace-normal">
                                12V 100Ah 1.2kWh LiFePO4 Battery
                            </td>
                            <td class="py-4 px-4 text-slate-700 whitespace-nowrap font-medium">12V</td>
                            <td class="py-4 px-4 text-slate-700 whitespace-nowrap font-medium">100Ah</td>
                            <td class="py-4 px-4 text-slate-600 whitespace-nowrap">1.2kWh</td>
                            <td class="py-4 px-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-[#d7f3fb] text-[#0e7490]">
                                    LiFePO4
                                </span>
                            </td>
                            <td class="py-4 px-5 sm:px-6 text-slate-600 leading-snug">
                                Marine, RV, backup power and portable energy applications
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Footer Disclaimer Note -->
            <p class="text-xs sm:text-sm text-slate-500 text-center max-w-2xl mx-auto mt-6 sm:mt-8 leading-relaxed">
                Specifications may vary by product model. Always review the product page or contact Cleanergy Battery before choosing a battery for your system.
            </p>

            <!-- Centered Action Button -->
            <div class="text-center mt-6 sm:mt-8">
                <a href="/index.php#contact" 
                   onclick="openEnquiryModal('Battery Model Consultation', ''); return false;"
                   class="inline-flex items-center justify-center px-8 sm:px-10 py-3.5 sm:py-4 rounded-full text-white font-semibold text-sm sm:text-base bg-[#12b3d6] hover:bg-[#0ea5e9] shadow-md shadow-cyan-500/25 transition-all duration-200 cursor-pointer">
                    Need Help Choosing a Battery?
                </a>
            </div>

        </div>
    </section>

    <!-- 3. Full-Width FAQ Section (#F3FFF4 edge-to-edge, matching product-detail & about us) -->
    <section class="w-full py-16 sm:py-20" style="background-color: #F3FFF4;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- FAQ Header -->
            <div class="mb-10 sm:mb-12 text-center sm:text-left">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#dcfce7] text-[#166534] text-xs sm:text-sm font-semibold mb-3">
                    FAQs
                </div>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight mb-2">
                    Frequently Asked Questions
                </h2>
                <p class="text-slate-600 text-sm sm:text-base">
                    Here are the answers to your most asked questions
                </p>
            </div>

            <div id="product-faq-list" class="space-y-4">
                
                <!-- FAQ 1 -->
                <div class="faq-item rounded-2xl bg-transparent overflow-hidden transition-all duration-300" style="border: 1.5px solid #71C179;">
                    <button type="button" onclick="toggleProductFaq(this)" class="w-full px-5 py-4 flex items-center justify-between text-left cursor-pointer bg-transparent">
                        <div class="flex items-center gap-3">
                            <span class="text-slate-900 font-bold">→</span>
                            <span class="font-bold text-slate-900 text-sm sm:text-base">What is a LiFePO4 battery?</span>
                        </div>
                        <svg class="faq-chevron w-5 h-5 text-slate-900 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="faq-content px-5 pb-5 text-slate-600 text-xs sm:text-sm bg-transparent hidden">
                        <p class="pl-6">LiFePO4 is an advanced lithium chemistry known for long cycle life, high thermal stability, and light weight.</p>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="faq-item rounded-2xl bg-transparent overflow-hidden transition-all duration-300" style="border: 1.5px solid #71C179;">
                    <button type="button" onclick="toggleProductFaq(this)" class="w-full px-5 py-4 flex items-center justify-between text-left cursor-pointer bg-transparent">
                        <div class="flex items-center gap-3">
                            <span class="text-slate-900 font-bold">→</span>
                            <span class="font-bold text-slate-900 text-sm sm:text-base">What applications are Cleanergy batteries designed for?</span>
                        </div>
                        <svg class="faq-chevron w-5 h-5 text-slate-900 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="faq-content px-5 pb-5 text-slate-600 text-xs sm:text-sm bg-transparent hidden">
                        <p class="pl-6">Engineered for marine vessels, RVs, solar homes, trolling motors, and backup power.</p>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="faq-item rounded-2xl bg-transparent overflow-hidden transition-all duration-300" style="border: 1.5px solid #71C179;">
                    <button type="button" onclick="toggleProductFaq(this)" class="w-full px-5 py-4 flex items-center justify-between text-left cursor-pointer bg-transparent">
                        <div class="flex items-center gap-3">
                            <span class="text-slate-900 font-bold">→</span>
                            <span class="font-bold text-slate-900 text-sm sm:text-base">What is the difference between LiFePO4 and lead-acid batteries?</span>
                        </div>
                        <svg class="faq-chevron w-5 h-5 text-slate-900 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="faq-content px-5 pb-5 text-slate-600 text-xs sm:text-sm bg-transparent hidden">
                        <p class="pl-6">LiFePO4 delivers 5x longer lifespan, 60% less weight, faster charging, and zero maintenance.</p>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="faq-item rounded-2xl bg-transparent overflow-hidden transition-all duration-300" style="border: 1.5px solid #71C179;">
                    <button type="button" onclick="toggleProductFaq(this)" class="w-full px-5 py-4 flex items-center justify-between text-left cursor-pointer bg-transparent">
                        <div class="flex items-center gap-3">
                            <span class="text-slate-900 font-bold">→</span>
                            <span class="font-bold text-slate-900 text-sm sm:text-base">What is a Battery Management System (BMS)?</span>
                        </div>
                        <svg class="faq-chevron w-5 h-5 text-slate-900 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="faq-content px-5 pb-5 text-slate-600 text-xs sm:text-sm bg-transparent hidden">
                        <p class="pl-6">An intelligent circuit that protects each cell against overcharging, deep discharge, high temperature, and short circuits.</p>
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="faq-item rounded-2xl bg-transparent overflow-hidden transition-all duration-300" style="border: 1.5px solid #71C179;">
                    <button type="button" onclick="toggleProductFaq(this)" class="w-full px-5 py-4 flex items-center justify-between text-left cursor-pointer bg-transparent">
                        <div class="flex items-center gap-3">
                            <span class="text-slate-900 font-bold">→</span>
                            <span class="font-bold text-slate-900 text-sm sm:text-base">How long do LiFePO4 batteries last?</span>
                        </div>
                        <svg class="faq-chevron w-5 h-5 text-slate-900 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="faq-content px-5 pb-5 text-slate-600 text-xs sm:text-sm bg-transparent hidden">
                        <p class="pl-6">Depending on usage and operating conditions, LiFePO4 batteries can provide thousands of charge cycles, often lasting several times longer than conventional lead-acid batteries.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <?php
    // Include Footer
    include __DIR__ . '/../components/footer.php';
    ?>

    <!-- Product FAQ Single Accordion Toggle (100% Transparent Background) -->
    <script>
    function toggleProductFaq(btn) {
        const currentItem = btn.closest('.faq-item');
        const currentContent = currentItem.querySelector('.faq-content');
        const currentChevron = currentItem.querySelector('.faq-chevron');
        const isCurrentlyOpen = !currentContent.classList.contains('hidden');

        document.querySelectorAll('#product-faq-list .faq-item').forEach(item => {
            const content = item.querySelector('.faq-content');
            const chevron = item.querySelector('.faq-chevron');
            if (content) content.classList.add('hidden');
            if (chevron) chevron.classList.remove('rotate-180');
        });

        if (!isCurrentlyOpen) {
            currentContent.classList.remove('hidden');
            currentChevron.classList.add('rotate-180');
        }
    }
    </script>

</body>
</html>
