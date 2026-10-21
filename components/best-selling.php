
<?php
// ============================================
// BEST SELLING BATTERIES - PRODUCT DATA
// ============================================
require_once __DIR__ . '/../data/products.php';

$products = array_slice(array_values($all_products), 0, 4);
?>

<!-- ============================================
     BEST SELLING BATTERIES SECTION
============================================ -->

<section
    id="best-selling"
    class="bg-white py-16 sm:py-20 lg:py-24 text-slate-900 border-t border-slate-100"
>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- SECTION HEADER -->
        <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16">

            <!-- Heading Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#cbf4d8] text-slate-800 text-xs sm:text-sm font-medium mb-5">
                Best-Selling Batteries
            </div>

            <!-- Main Heading -->
            <h2 class="text-2xl sm:text-3xl lg:text-[38px] font-extrabold text-slate-900 leading-tight tracking-tight mb-4">

                Top LiFePO4 and sodium-ion picks

                <span class="text-[#82b89a] font-extrabold">
                    for every application
                </span>

            </h2>

            <!-- Subtitle -->
            <p class="text-slate-600 text-sm sm:text-base leading-relaxed">

                Compare selected battery systems for marine starting,
                fishing boats, RVs, golf carts, home energy storage
                and off-grid power.

            </p>

        </div>


        <!-- ========================================
             PRODUCTS GRID
        ========================================= -->

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12 sm:mb-16">

            <?php foreach ($products as $product): ?>

                <?php
                    $productUrl = '/product-detail.php?id='
                        . urlencode((string) $product['id']);

                    $safeUrl = htmlspecialchars(
                        $productUrl,
                        ENT_QUOTES,
                        'UTF-8'
                    );

                    $safeName = htmlspecialchars(
                        $product['name'],
                        ENT_QUOTES,
                        'UTF-8'
                    );

                    $safeImage = htmlspecialchars(
                        $product['image'],
                        ENT_QUOTES,
                        'UTF-8'
                    );
                ?>

                <!-- PRODUCT CARD -->
                <div class="bg-white rounded-3xl border border-[#239B52] p-4 flex flex-col justify-between shadow-xs hover:shadow-lg transition-all duration-300 group">

                    <!-- =================================
                         PRODUCT IMAGE CONTAINER (Full Size matching Gallery Cards)
                    ================================== -->
                    <div class="relative bg-[#f8fafc] rounded-2xl overflow-hidden mb-3.5 h-64 sm:h-72 flex items-center justify-center p-2">

                        <!-- Stock Badge -->
                        <span class="absolute top-2.5 right-2.5 z-10 px-2.5 py-1 rounded-full text-white text-[10px] font-extrabold uppercase tracking-wide shadow-xs" style="background-color: <?= $product['in_stock'] ? '#239B52' : '#DC3545' ?>;">
                            <?= $product['in_stock'] ? 'IN STOCK' : 'OUT OF STOCK' ?>
                        </span>

                        <a href="<?= $safeUrl ?>" class="w-full h-full flex items-center justify-center overflow-hidden">
                            <img
                                src="<?= $safeImage ?>"
                                alt="<?= $safeName ?>"
                                loading="lazy"
                                class="w-full h-full object-contain p-0 scale-105 group-hover:scale-115 transition-transform duration-300"
                            >
                        </a>

                    </div>

                    <!-- =================================
                         PRODUCT CONTENT
                    ================================== -->
                    <div class="flex flex-col flex-1 px-1 pt-2 pb-1">

                        <!-- Product Title -->
                        <h3 class="text-sm sm:text-base font-bold text-slate-900 leading-snug mb-3 min-h-[48px] hover:text-cyan-600 transition-colors">

                            <a href="<?= $safeUrl ?>">

                                <?= $safeName ?>

                            </a>

                        </h3>


                        <!-- =================================
                             PRICE AND RATING
                        ================================== -->

                        <div class="flex items-center justify-between gap-2 mb-5">

                            <!-- Price -->
                            <div class="flex flex-wrap items-baseline gap-2">

                                <!-- Current Price -->
                                <span class="text-base sm:text-lg font-extrabold text-[#239B52]">
                                    <?= htmlspecialchars($product['price']) ?>
                                </span>

                                <!-- Old Price -->
                                <span class="text-xs text-slate-400 line-through">
                                    <?= htmlspecialchars($product['original_price'] ?? $product['old_price']) ?>
                                </span>

                            </div>

                            <!-- Rating -->
                            <div class="flex items-center gap-1 text-xs font-bold text-slate-800 shrink-0">

                                <span class="text-[#f59e0b] text-sm">
                                    ★
                                </span>

                                <?= htmlspecialchars((string)($product['rating'] ?? '4.9')) ?>

                            </div>

                        </div>


                        <!-- =================================
                             ACTION BUTTONS
                        ================================== -->

                        <div class="flex items-center gap-2 mt-auto pt-1">

                            <?php if ($product['in_stock']): ?>

                                <!-- Buy Now -->
                                <a
                                    href="<?= $safeUrl ?>"
                                    class="flex-1 py-2.5 px-3 rounded-full bg-[#41aa57] hover:bg-[#36954b] text-white text-xs sm:text-sm font-semibold transition-colors text-center"
                                >

                                    Buy Now

                                </a>

                            <?php else: ?>

                                <!-- Sold Out -->
                                <span
                                    class="flex-1 py-2.5 px-3 rounded-full bg-gray-200 text-gray-500 text-xs sm:text-sm font-semibold text-center cursor-not-allowed"
                                >

                                    Sold Out

                                </span>

                            <?php endif; ?>


                            <!-- Enquiry -->
                            <a
                                href="/index.php#contact"
                                onclick="openEnquiryModal('<?= htmlspecialchars(addslashes($product['title'])) ?>', '<?= htmlspecialchars($product['image']) ?>'); return false;"
                                class="flex-1 py-2.5 px-3 rounded-full border border-[#41aa57] text-[#41aa57] hover:bg-emerald-50 text-xs sm:text-sm font-semibold transition-colors text-center cursor-pointer"
                            >

                                Enquiry

                            </a>

                        </div>

                    </div>

                </div>

                <!-- END PRODUCT CARD -->

            <?php endforeach; ?>

        </div>


        <!-- ========================================
             VIEW ALL BATTERIES BUTTON
        ========================================= -->

        <div class="text-center">

            <a
                href="/shop.php"
                class="inline-flex items-center justify-center px-10 py-3.5 rounded-full border border-[#41aa57] text-[#36954b] hover:bg-[#41aa57] hover:text-white font-medium text-base transition-all duration-200"
            >

                View All Batteries

            </a>

        </div>

    </div>

</section>

<!-- END BEST SELLING BATTERIES SECTION -->
