<?php
// Blog Detail Page
$id = isset($_GET['id']) ? (string)$_GET['id'] : '1';

// Articles repository
$articles = [
    '1' => [
        'id' => '1',
        'title' => 'How Many Ah Does an RV Battery Need? 100Ah vs 200Ah vs 300Ah LiFePO4 Guide',
        'subtitle' => 'A complete sizing guide to choosing the right lithium battery capacity for boondocking, appliances, and off-grid RV travel.',
        'date' => 'September 26, 2026',
        'category' => 'RV & Boondocking Guide',
        'image' => '/assets/blog-1.png',
        'overview' => '<strong>Short answer:</strong> A 100Ah LiFePO4 battery can be enough for light RV use and frequent recharging. A 200Ah battery bank is better for moderate appliance use and short off-grid trips, while 300Ah or more makes more sense for longer boondocking, larger inverters and heavier daily power consumption. The correct size depends on your daily watt-hours, battery voltage, charging sources and how many days you want to stay off-grid.',
        'intro' => 'If you are asking <strong>how many Ah an RV battery needs</strong>, whether <strong>100Ah is enough for an RV</strong>, or whether you should choose a <strong>200Ah or 300Ah LiFePO4 battery</strong>, this guide will help you calculate the right capacity instead of guessing.',
        'sections' => [
            [
                'heading' => 'What Does Ah Mean on an RV Battery?',
                'body' => '<strong>Amp-hours (Ah)</strong> describe how much electrical charge a battery can deliver over time. A 100Ah battery can theoretically provide 10 amps for 10 hours, while a 200Ah battery stores twice the amp-hour capacity at the same voltage. In energy terms, watt-hours (Wh) give an even clearer picture: a 12V 100Ah LiFePO4 pack stores 1,200Wh, a 200Ah stores 2,400Wh, and a 300Ah stores 3,600Wh of clean usable power.'
            ],
            [
                'heading' => '100Ah vs 200Ah vs 300Ah: Which Capacity Do You Need?',
                'body' => '<strong>100Ah LiFePO4:</strong> Perfect for weekend campers and lightweight travel trailers running LED lights, water pumps, mobile devices, and a small 12V compressor fridge with moderate solar.<br><br><strong>200Ah LiFePO4:</strong> The undisputed gold standard for off-grid boondocking. Easily powers residential 12V fridges, laptops, TV, CPAP machines, and microwave ovens through a 2,000W inverter.<br><br><strong>300Ah+ LiFePO4:</strong> Ideal for full-time RV living, digital nomads, induction cooktop usage, and running high-efficiency mini-split or rooftop air conditioners without running noisy generators.'
            ],
            [
                'heading' => 'Usable Capacity: Why LiFePO4 Beats Lead-Acid',
                'body' => 'Traditional lead-acid and AGM batteries should only be discharged to 50% depth of discharge (DoD) to avoid permanent sulfation and early failure. CleanErgy Grade-A LiFePO4 batteries deliver 100% of their rated capacity safely, maintain full 12.8V–13.2V operating voltage until nearly empty, charge 4x faster, and last over 10 years.'
            ],
            [
                'heading' => 'Charging Sources & System Sizing',
                'body' => 'To keep your battery bank topped up, pair your setup with 200W–600W of rooftop monocrystalline solar panels, a dedicated MPPT charge controller, and a DC-DC alternator charger to charge while driving your motorhome or towing vehicle.'
            ]
        ]
    ],
    '2' => [
        'id' => '2',
        'title' => 'Marine & Trolling Motor Battery Sizing: 12V vs 24V vs 36V Lithium Setup Guide',
        'subtitle' => 'Maximize thrust, reduce boat weight, and enjoy full-day continuous fishing on the open water.',
        'date' => 'October 04, 2026',
        'category' => 'Marine & Fishing Technology',
        'image' => '/assets/blog-2.png',
        'overview' => '<strong>Short answer:</strong> Trolling motors require matched voltage corresponding to motor thrust ratings: 12V for motors up to 55 lbs of thrust, 24V for 70 to 80 lbs, and 36V for 100+ lbs of heavy-duty offshore thrust. CleanErgy Marine Lithium batteries provide stable continuous discharge with 70% weight reduction compared to heavy lead-acid sets.',
        'intro' => 'Whether you are upgrading a tournament bass boat, center console, or kayak, choosing the correct marine battery configuration ensures your trolling motor never loses power against stiff winds and river currents.',
        'sections' => [
            [
                'heading' => 'Trolling Motor Voltage Requirements Explained',
                'body' => 'Motor voltage is directly tied to thrust requirements: <strong>12V systems</strong> power kayaks and small skiffs; <strong>24V systems</strong> are the standard for 17–20 ft bass boats; and <strong>36V systems</strong> are built for larger 21+ ft multi-species and offshore vessels that face heavy waves.'
            ],
            [
                'heading' => 'Weight Savings: How Dropping 150 lbs Transforms Boat Handling',
                'body' => 'Three traditional Group 31 AGM batteries weigh over 210 lbs at the front of your vessel. Replacing them with CleanErgy marine lithium drops your boat weight by over 140 lbs, increasing your top-end speed, hole shot, fuel efficiency, and draft clearance in shallow waters.'
            ],
            [
                'heading' => 'Constant Voltage Delivery vs Speed Drop-off',
                'body' => 'When lead-acid batteries drain, their voltage drops sharply, causing your trolling motor to slow down and struggle. CleanErgy marine batteries maintain steady 12.8V/25.6V/38.4V output throughout the entire day of fishing.'
            ],
            [
                'heading' => 'Marine Waterproofing and Battery Compartment Safety',
                'body' => 'CleanErgy marine units are enclosed in vibration-dampened, corrosion-resistant housings with internal cell clamping to endure heavy hull pounding and choppy waters without cell dislocation or circuit failure.'
            ]
        ]
    ],
    '3' => [
        'id' => '3',
        'title' => 'LiFePO4 vs Sodium-Ion in Cold Weather: Extreme Winter Temperature Performance',
        'subtitle' => 'Detailed engineering comparison of sub-zero discharge, cold-cranking amps, and winter storage protocols.',
        'date' => 'October 12, 2026',
        'category' => 'Cold Weather Engineering',
        'image' => '/assets/yacht-battery.png',
        'overview' => '<strong>Short answer:</strong> Sodium-ion batteries deliver exceptional sub-zero cranking down to -30°C (-22°F) without freezing risks or pre-heating requirements. Standard LiFePO4 batteries excel in longevity and energy density, but require intelligent BMS low-temp charge cutoff or internal heating pads when charging below freezing.',
        'intro' => 'If you operate off-grid cabins, snow vehicles, ice fishing equipment, or cold-climate marine vessels, understanding how cold temperatures affect battery chemistry is vital for system safety and reliability.',
        'sections' => [
            [
                'heading' => 'Why Freezing Temperatures Hurt Conventional Batteries',
                'body' => 'Sub-zero temperatures dramatically slow chemical reactions inside energy storage cells. While traditional lead-acid batteries lose over 50% of their cranking power in freezing conditions and risk cracked cases from frozen electrolyte, CleanErgy lithium and sodium-ion technologies provide reliable winter power.'
            ],
            [
                'heading' => 'Sodium-Ion Chemical Advantages in Sub-Zero Climates',
                'body' => 'CleanErgy Sodium-Ion starting batteries maintain superior discharge rates down to -30°C without the freezing damage risks of lead-acid. Sodium ions diffuse faster through low-temperature electrolytes, making them unbeatable for winter engine starting, snowmobiles, and unheated northern cabins.'
            ],
            [
                'heading' => 'LiFePO4 Cold Charging Safeguards & Internal Heaters',
                'body' => 'Standard LiFePO4 cells must not be charged below 0°C (32°F) to prevent lithium plating on the anodes. CleanErgy cold-weather series feature intelligent BMS sensors and automatic internal heating elements that warm the cells using incoming solar power before initiating charge cycles.'
            ],
            [
                'heading' => 'Winter Storage Best Practices',
                'body' => 'Store CleanErgy batteries disconnected at 50%–70% state of charge in a dry environment. Unlike lead-acid batteries that self-discharge rapidly and freeze, CleanErgy Grade-A cells lose only 2%–3% charge per month during winter layup.'
            ]
        ]
    ]
];

$article = $articles[$id] ?? $articles['1'];
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($article['title']) ?> - CleanErgy Blog</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,700;1,800;1,900&family=Playfair+Display:ital,wght@1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/dist/output.css?v=<?= filemtime(__DIR__ . '/dist/output.css') ?>">
</head>
<body class="bg-white font-['Plus_Jakarta_Sans',sans-serif] text-slate-900 min-h-screen flex flex-col justify-between">

    <?php
    // Include Fixed Floating Navbar
    include __DIR__ . '/components/navbar.php';
    ?>

    <!-- 1. Top Banner (Exact Same Size as Contact Us and All Other Pages) -->
    <section class="relative w-full min-h-[580px] sm:min-h-[660px] h-[92vh] sm:h-screen max-h-[1000px] overflow-hidden bg-slate-900 flex items-center">
        <img src="<?= htmlspecialchars($article['image']) ?>" 
             alt="<?= htmlspecialchars($article['title']) ?>" 
             class="w-full h-full object-cover object-center block">
    </section>

    <!-- 2. Content Area (H1 Heading, Date and All Content Strictly Left-Aligned) -->
    <main class="flex-1 w-full bg-white text-slate-900 py-10 sm:py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-left">
            
            <!-- Category Badge -->
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-[#d7f3fb] text-[#0e7490] text-xs font-bold mb-4">
                <span><?= htmlspecialchars($article['category']) ?></span>
            </div>

            <!-- H1 Heading (Left-Aligned in Content Area) -->
            <h1 class="text-3xl sm:text-4xl lg:text-[42px] font-extrabold text-slate-900 tracking-tight leading-[1.2] mb-4 text-left">
                <?= htmlspecialchars($article['title']) ?>
            </h1>

            <!-- Subtitle (Left-Aligned) -->
            <?php if (!empty($article['subtitle'])): ?>
                <p class="text-slate-600 text-base sm:text-lg leading-relaxed mb-6 text-left font-normal">
                    <?= htmlspecialchars($article['subtitle']) ?>
                </p>
            <?php endif; ?>

            <!-- Release Date with Clock Icon and Border Line (Exact Match to Screenshot) -->
            <div class="flex items-center gap-2 text-xs sm:text-[13px] uppercase tracking-wider text-slate-500 font-medium pb-4 border-b border-slate-200 mb-8">
                <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"/>
                    <polyline points="12 6 12 12 16 14"/>
                </svg>
                <span>RELEASE DATE: <?= htmlspecialchars(strtoupper($article['date'])) ?></span>
            </div>

            <!-- Overview / Short Answer Lead -->
            <?php if (!empty($article['overview'])): ?>
                <p class="text-slate-800 text-base sm:text-lg leading-relaxed mb-6 font-normal">
                    <?= $article['overview'] ?>
                </p>
            <?php endif; ?>

            <?php if (!empty($article['intro'])): ?>
                <p class="text-slate-700 text-base sm:text-lg leading-relaxed mb-8 font-normal">
                    <?= $article['intro'] ?>
                </p>
            <?php endif; ?>

            <!-- Article Sections (Left-Aligned Heading & Body) -->
            <div class="space-y-8 sm:space-y-10">
                <?php foreach ($article['sections'] as $sec): ?>
                    <div>
                        <h2 class="text-2xl sm:text-3xl lg:text-[34px] font-extrabold text-slate-900 tracking-tight mb-4 leading-tight">
                            <?= htmlspecialchars($sec['heading']) ?>
                        </h2>
                        
                        <p class="text-slate-700 text-base sm:text-lg leading-relaxed font-normal">
                            <?= $sec['body'] ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Back to All Guides Button (Left-Aligned) -->
            <div class="mt-14 sm:mt-16 pt-8 border-t border-slate-200">
                <a href="/blog.php" 
                   class="inline-flex items-center gap-2 px-8 py-3 rounded-full bg-[#12b3d6] hover:bg-[#0ea5e9] text-white font-bold text-sm transition-all duration-200 hover:shadow-md">
                    <span>← Back to All Guides</span>
                </a>
            </div>

        </div>
    </main>

    <?php
    // Include Footer
    include __DIR__ . '/components/footer.php';
    ?>

</body>
</html>
